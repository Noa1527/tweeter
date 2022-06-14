<?php

require('controllers/usersController.php');
$controller = new usersController();

if (isset($_COOKIE["user"])) {

    if (isset($_GET["p"])) {

        $page = $_GET["p"];

        if ($page == 'userAccount') {

            $controller->user_account($_COOKIE["user"], $_FILES);

        } elseif ($page == 'userHome') {

            $controller->userHome($_COOKIE["user"]);

        } elseif ($page == "getTweets") {

            $controller->getTweets($_COOKIE["user"]);

        } elseif ($page == "sendTweet") {

            $controller->sendTweet($_POST, $_COOKIE["user"]);
            
        } elseif ($page == "memberAccount") {

            $controller->memberAccount($_GET);

        } elseif ($page == "memberSubscription") {
            
            $controller->subscribeToMember($_GET, $_COOKIE["user"]);

        } elseif ($page == "searchHashtag") {

            $controller->searchHashtagedTweets($_GET, $_COOKIE["user"]);

        } elseif ($page == "logout") {

            $controller->disconnect($_COOKIE["user"]);

        } elseif ($page == "sendRetweet") {
            
            $controller->sendRetweet($_POST, $_COOKIE["user"]);

        } elseif ($page == "searchMember") {

            $controller->searchMember($_POST);

        } elseif ($page == "search") {
            
            $controller->search($_COOKIE["user"]);

        } elseif ($page == "getTweetWithContent") {
            
            $controller->getTweetWithContent($_POST);
            
        } elseif ($page == "messagePage"){

            $controller->userHomeMessage($_COOKIE["user"]);
            
        } elseif ($page == "getConversation") {
            
            $controller->getConversation($_GET, $_COOKIE["user"]);
            
        } elseif ($page == "sendMessage") {
            
            $controller->sendMessage($_POST, $_COOKIE["user"]);
            
        } elseif ($page == 'formToUpdate') {

            $controller->updateInfoUser($_COOKIE["user"], $_FILES, $_POST);

        } else {

            echo $page;
        }
    } else $controller->userHome($_COOKIE["user"]);
} else {

    if (isset($_GET["p"])) {

        $page = $_GET["p"];

        if ($page == 'connection') {

            $controller->userConnection($_POST);

        } elseif ($page == "subscription") {

            $controller->subscription($_POST);

        } else $controller->home();
    } else $controller->home();
}