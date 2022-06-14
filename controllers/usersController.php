<?php

require("./model/model_function.php");
require("otherOpt.php");

class UsersController extends otherOptions {

    public function __construct() {
        parent:: generateOptionsMonths();
        parent:: generateOptionsDays();
        parent:: generateOptionsYears();
    }

    public function home() {
        $js = ["<script src='./public/JS/signInPopup.js' type='module' defer></script>", "<script src='./public/JS/signOnPopup.js' type='module' defer></script>"];
        require('./views/pages/home.php');
    }

    public function userHome($userId) {

        $model = new Model;
        $infos = $model->infoUser($userId);

        $js = ["<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/handleTweetInput.js' type='module' defer></script>", "<script src='./public/JS/linkHashtags.js' type='module' defer></script>", "<script src='./public/JS/sendRetweet.js' type='module' defer></script>", "<script src='./public/JS/sendTweet.js' type='module' defer></script>", "<script src='./public/JS/logoutPopup.js' type='module' defer></script>", "<script src='./public/JS/getTweets.js' type='module' defer></script>", "<script src='./public/JS/userHome.js' type='module' defer></script>"];
        ob_start();
        require("./views/pages/tweetViews.php");
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    public function userHomeMessage($userId) {

        if (isset($userId)) {

            $model = new Model;
            $conversations = $model->get_subscriptions($userId);
            $infos = $model->infoUser($userId);

            $js = ["<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/getTweets.js' type='module' defer></script>", "<script src='./public/JS/messagePage/messagePage.js' type='module' defer></script>", "<script src='./public/JS/logoutPopup.js' type='module' defer></script>"];

            print_r($userId);
            ob_start();
            require("./views/pages/messagePage.php");
            $content = ob_get_clean();
            require("./views/template/template.php");
        } 
    }

    /**
     * TRAITEMENT DU PASSWORD
    */

    public function hashPassword($password) {
        $passPhrase = "vive le projet tweet_academy";
        $hash = hash('ripemd160', $password . $passPhrase);

        return $hash;
    }

    public function checkPasswords($password1, $password2) {
        if ($password1 == $password2) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * TRAITEMENT DE LA CONNECTION
    */

    public function formSignIn() {

        ob_start();
        require('./views/pages/formSignIn.php');
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    public function userConnection(array $datas) {

        if (!empty($datas["email"]) && !empty($datas["password"])) {

            $model = new Model;
            $password = $this->hashPassword($datas["password"]);
            $idUser = $model->connect_form($datas["email"], $password);

            if ($idUser) {

                setcookie("user", $idUser, time() + 86400);
                header(("Location: index.php?p=userHome"));
                $js = ["<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/sendTweet.js' type='module' defer></script>"];
                ob_start();
                require("./views/pages/tweetViews.php");
                $content = ob_get_clean();
                require("./views/template/template.php");

            } else {

                $error = "Email ou mot de passe inconnu.";
                ob_start();
                require("./views/pages/errorPage.php");
                $content = ob_get_clean();
                require("./views/template/template.php");

            }
        } else {

            $error = "Une ou plusieurs informations sont manquante pour vous connecter.";
            ob_start();
            require("./views/pages/errorPage.php");
            $content = ob_get_clean();
            require("./views/template/template.php");
        }
    }

    /**
     * TRAITEMENT DE L'INSCRIPTION
    */

    public function formSignOn() {
        $optionsMonths = $this->generateOptionsMonths();
        $optionsYears = $this->generateOptionsYears();
        $optionsDays = $this->generateOptionsDays();

        ob_start();
        require('./views/pages/formSignOn.php');
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    public function subscription($datas) {

        if (
            !empty($datas["lastname"]) && !empty($datas["firstname"])
            && !empty($datas["phonnbr"])
            && !empty($datas["email"]) && !empty($datas["day"])
            && !empty($datas["month"]) && !empty($datas["year"])
            && !empty($datas["password"]) && !empty($datas["confirmedPassword"])
            && !empty($datas["pseudo"])
        ){

            if ($this->checkPasswords($datas["password"], $datas["confirmedPassword"])) {

                $datas["pseudo"] = "@" . $datas["pseudo"];
                $model = new Model;
                $date = $datas["year"] . "-" . $datas['month'] . "-" . $datas["day"];
                $password = $this->hashPassword($datas["password"]);
                $model->sub_form($datas["firstname"], $datas["lastname"], $date, $datas["email"], $password, $datas["phonnbr"], $datas["pseudo"]);
                $idUser = $model->connect_form($datas["email"], $password);

                setcookie("user", $idUser, time() + 86400);

                header(("Location: index.php?p=userHome"));

                $js = ["<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/sendTweet.js' type='module' defer></script>"];

                ob_start();
                require("./views/pages/tweetViews.php");
                $content = ob_get_clean();
                require("./views/template/template.php");
                
            } else {
                $error = "Les mots de passe que vous avez entrés ne sont pas les mêmes.";
                ob_start();
                require("./views/pages/errorPage.php");
                $content = ob_get_clean();
                require("./views/template/template.php");
            }
        } else {
            $error = "Il manque des informations pour pouvoir vous abonner.";
            ob_start();
            require("./views/pages/errorPage.php");
            $content = ob_get_clean();
            require("./views/template/template.php");
        }
    }

    /**
     * TRAITEMENT DES TWEET
    */

    public function sendTweet($data, $userId) {
        if (isset($data["content"]) && isset($userId)) {
            if (!empty($data["content"])) {
                $model = new Model;
                if ( $model->add_tweet_to_db($data["content"], $userId)) {
                    echo "1";
                } else {
                    echo "0";
                }
            }
        }
    }

    public function getTweets($userId) {
        if (isset($userId)) {
            if (!empty($userId)) {

                $model = new Model;
                $subscribedTweets = $model->get_subscribed_tweets($userId);
                $selfTweets = $model->get_self_tweet($userId);
                $retweets = $model->get_retweets($userId);
                $tweets = [];

                $tweets = [...$subscribedTweets, ...$selfTweets, ...$retweets];

                $this->sortArrayByDate($tweets);
                echo json_encode($tweets);
            }
        }
    }

    public function searchHashtagedTweets($datas, $userId) {

        if (isset($datas["hashtag"])) {

            $model = new Model;
            $conversations = $model->get_subscriptions($userId);
            $infos = $model->infoUser($userId);
            $hashtag = "#" . $datas["hashtag"];
            $tweets = $model->search_hashtaged_tweets($hashtag);
            $js = ["<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/ajaxFetch.js' type='module' defer></script>", "<script src='./public/JS/linkHashtags.js' type='module'></script>", "<script src='./public/JS/hashtagedTweets.js' type='module' defer></script>", "<script src='./public/JS/logoutPopup.js' type='module' defer></script>" ];

            ob_start();
            require('./views/pages/hashtagedTweets.php');
            $content = ob_get_clean();
            require("./views/template/template.php");
        }
    }

    public function sendRetweet($data, $userId) {
        
        if (isset($data["id_tweet"]) && isset($userId)) {
            
            if (!empty($data["id_tweet"])) {

                $model = new Model;

                if ( $model->add_retweet_to_db($data["id_tweet"], $userId)) {
                    echo "1";
                } else {
                    echo "0";
                }
            } 
        }
    }

    public function getTweetWithContent($data) {

        if (isset($data["content"])) {

            $model = new Model;

            $tweets = $model->get_tweet_with_content($data["content"]);

            echo json_encode($tweets);
        }
    }

    /**
     * TRAITEMENT DES MEMBRES
    */

    public function memberAccount($datas) {

        if (isset($datas["memberId"])) {

            $model = new Model;
            $id = $datas["memberId"];
            $infos = $model->infoUser($id);
            $selfTweets = $model->get_self_tweet($id);
            $infos["tweets"] = $selfTweets;
            $js = ["<script src='./public/JS/subscribeToMember.js' type='module' defer></script>"];
            ob_start();
            require("./views/pages/memberAccount.php");
            $content = ob_get_clean();
            require("./views/template/template.php");
        }
    }

    public function subscribeToMember($data, $userId) {

        $model = new Model;
        $memberId = $data["memberId"];
        $userFollows = $model->get_user_follows($userId);
        
        foreach ($userFollows as $follow) {
            
            if ($follow["id_followed"] == $memberId) {

                echo "Already abonned";
                return;
            }
        }

        $output = $model->subscribe_to_member($memberId, $userId);
        
        if ($output) {

            echo "Success";

        } else {

            echo "Fail";
        }
    }

    public function searchMember($datas) {

        if (isset($datas["member"])) {

            if (!empty($datas["member"])) {

                $model = new Model;
                $members = $model->search_member($datas["member"]);

                echo json_encode($members);
            }
        }
    }

    /**
     * FONCTION DE DECONNEXION
    */

    public function disconnect($userId) {

        setcookie("user", $userId, time() - 3600);
        unset($_COOKIE['user']);
        header("Location: index.php");
    }

    /**
     * FONCTION POUR LA PAGE MEMBRE
    */
    
    public function user_account($userId, $files) {

        $model = new Model;
        $img = null;
        $banner = null;

        if (isset($files["profile_image"]) || isset($files["banner_image"])) {

            if (isset($files["profile_image"])) {

                if (is_uploaded_file($files["profile_image"]["tmp_name"])) {

                    $img = file_get_contents($files["profile_image"]["tmp_name"]);
                }
            } 

            if (isset($files["profile_banner"])) {

                if (is_uploaded_file($files["profile_banner"]["tmp_name"])) {

                    $banner = file_get_contents($files["profile_banner"]["tmp_name"]);
                }
            }
            $model->upload_profile_img($userId, $img, $banner);
        }

        $infos = $model->infoUser($userId);
        $selftweet = $model->get_self_tweet($userId);

        $css = ['<link rel="stylesheet" href="views/resources/accountStyle.css">'];
        $js = ["<script src='./public/JS/logoutPopup.js' type='module' defer></script>"];
        ob_start();
        require("./views/pages/userAccount.php");
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    public function updateInfoUser($userId, $files, $datas) {
       
        $model = new Model;
        
        if(isset($datas["update"])) {
            $updateInfo = $model->update_info_user($userId, $datas["pseudo"], $datas["bio"], $datas["city"], $datas["phone"], $datas["mail"]);
        }
        
        if (isset($files["update_image"])) {

            if (is_uploaded_file($files["update_image"]["tmp_name"])) {

                $img = file_get_contents($files["update_image"]["tmp_name"]);
                $model->update_profile_image($userId, $img);
            }
        } 

        if (isset($files["update_banner"])) {

            if (is_uploaded_file($files["update_banner"]["tmp_name"])) {

                $banner = file_get_contents($files["update_banner"]["tmp_name"]);
                $model->update_profile_banner($userId, $banner);
            }
        }

        $infos = $model->infoUser($userId);
        $css = ['<link rel="stylesheet" href="views/resources/formToUpdateStyle.css">'];
        $js = ["<script src='./public/JS/logoutPopup.js' type='module' defer></script>"];
        
        ob_start();
        require("./views/pages/formToUpdate.php");
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    /**
     * PAGE DE RECHERCHE
    */

    public function search($userId) {

        $model = new Model;
        $infos = $model->infoUser($userId);

        $js = ["<script src='./public/JS/search/search.js' type='module' defer></script>", "<script src='./public/JS/linkHashtags.js' type='module' defer></script>", "<script src='./public/JS/getTweets.js' type='module' defer></script>", "<script src='./public/JS/logoutPopup.js' type='module' defer></script>"];
        $css = ['<link rel="stylesheet" href="views/resources/styleSearch.css">'];

        ob_start();
        require("./views/pages/search.php");
        $content = ob_get_clean();
        require("./views/template/template.php");
    }

    /**
     * Fonctions des messages.
     */

    public function getConversation($datas, $userId) {

        if (isset($datas["receiverId"]) && isset($userId)) {

            $model = new Model;
            $conversation = $model->get_conversation($datas["receiverId"], $userId);

            echo json_encode($conversation, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public function sendMessage($datas, $expediterId) {

        if (isset($datas["content"]) && isset($datas["id_receiver"])) {
            
            if (!empty($datas["content"]) && !empty($datas["id_receiver"])) {
                
                $model = new Model;
                $output = $model->send_message($datas["content"], $datas["id_receiver"], $expediterId);

                if ($output) {
                    
                    echo 1;

                } else {

                    echo 0; 
                }
            }
        }
    }
}