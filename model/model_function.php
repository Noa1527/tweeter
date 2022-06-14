<?php

require "db_connect.php";

class Model extends Connect_Db {

    public function __construct() {
        parent::__construct();
    }

    /**
     * CONNECT REQUEST
     */

    public function connect_form($mail, $password) {
        $check = $this->connection->prepare('SELECT id, mail, username, password FROM user WHERE mail = ? AND password = ?');
        $check->execute(array($mail, $password));
        $data = $check->fetch();

        if (!empty($data)) {
            return $data["id"];
        } else return false;
    }

    /**
     * SUBSCRIB REQUEST
     */

    public function sub_form($fname, $lname, $birthd, $mail, $pw, $phone, $user) {
        $insert = $this->connection->prepare("INSERT INTO user(firstname, lastname, birthdate, mail, password, phone, username) VALUES (:firstname, :lastname, :birthdate, :mail, :password, :phone, :username)");
        $insert->execute(array(
            "firstname" => htmlspecialchars($fname),
            "lastname" => htmlspecialchars($lname),
            "birthdate" => htmlspecialchars($birthd),
            "mail" => htmlspecialchars($mail),
            "password" => htmlspecialchars($pw),
            "phone" => htmlspecialchars($phone),
            "username" => htmlspecialchars($user)
        ));

        if (!empty($insert)) {
            return true;
        } else return false;
    }

    /**
     * USER PAGE
     */

    public function infoUser($userId) {
        $db = $this->connection->query("SELECT user.id as 'id_user', username, firstname, lastname, birthdate, mail, phone,  creation, content, image, banner, bio, city,
                                        COUNT(content) AS 'nb_tweet',  upvote, 
                                        COUNT(follow.id_user) AS 'followers', 
                                        COUNT(id_followed) AS 'follows' FROM user 
                                        LEFT JOIN tweet ON user.id = tweet.id_user 
                                        LEFT JOIN follow ON user.id = follow.id_user 
                                        LEFT JOIN profile_image ON user.id = profile_image.user_id WHERE user.id = '$userId' group by content");
        $userId = $db->fetch();
        
        return $userId;
    }

    /**
     *  TRAITEMENT DES IMAGES 
     */

    public function upload_profile_img($userId, $img, $banner) {
        $insert = $this->connection->prepare("INSERT INTO profile_image(user_id, image, banner) VALUES (:user_id, :image, :banner)");
        $data = $insert->execute(array(
            ':user_id' => $userId,
            ':image' => $img,
            ':banner' => $banner
        ));
        return $data;
    }

    public function download_profil_img($userId) {
        $request = $this->connection->query("SELECT image, banner FROM profile_image WHERE id = $userId");
        $userImg = $request->fetchAll(PDO::FETCH_ASSOC);

        return $userImg;
    }

    public function update_profile_image($userId, $image) {
        $update = $this->connection->prepare("UPDATE profile_image SET image = :image WHERE user_id = :user_id");
        $data = $update->execute(array(
            ':user_id' => $userId,
            ':image' => $image,
        ));
        return $data;
    }

    public function update_profile_banner($userId, $banner) {
        $update = $this->connection->prepare("UPDATE profile_image SET banner = :banner WHERE user_id = :user_id");
        $data = $update->execute(array(
            ':user_id' => $userId,
            ':banner' => $banner
        ));
        return $data;
    }

    /**
     *  MODIFICATION DES INFOS USER
     */

    public function update_info_user($userId, $username, $bio, $city, $phone, $mail) {

        $update = $this->connection->prepare("UPDATE user SET username = :username, bio = :bio, city = :city, phone = :phone, mail = :mail WHERE user.id = :user_id");
        $data = $update->execute(array(
            ':user_id' => $userId,
            ':username' => $username,
            ':bio' => $bio,
            ':city' => $city,
            ':phone' => $phone,
            ':mail' => $mail,
        ));
        return $data;
    }


    /**
     * TRAITEMENT DES TWEET DANS LA DB
     */

    function add_tweet_to_db($content, $userId) {
        $insert = $this->connection->prepare("INSERT INTO tweet(id_user, content) VALUES (:id_user, :content)");
        $output = $insert->execute(array(
            ":content" => $content,
            ":id_user" => $userId
        ));
        return $output;
    }

    function add_retweet_to_db($tweetId, $userId) {
        $insert = $this->connection->prepare("INSERT INTO retweet(id_tweet, id_user) VALUES (:id_tweet, :id_user)");
        $output = $insert->execute(array(
            ":id_tweet" => $tweetId,
            ":id_user" => $userId
        ));
        return $output;
    }

    function get_subscribed_tweets($userId) {
        $insert = $this->connection->prepare("SELECT tweet.id, tweet.content, tweet.creat_tweet, tweet.upvote, tweet.retweet, user.id as 'id_user', user.username, user.lastname, user.username from follow left join tweet on follow.id_followed = tweet.id_user left join user on follow.id_followed = user.id where follow.id_user = :id_user order by tweet.creat_tweet desc");
        $insert->execute(array(
            ":id_user" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    function get_self_tweet($userId) {
        $insert = $this->connection->prepare("SELECT user.id as 'id_user', user.username, user.firstname, user.lastname, tweet.id, tweet.content, tweet.creat_tweet, tweet.upvote, tweet.retweet from tweet inner join user on tweet.id_user = user.id where id_user = :id_user");
        $insert->execute(array(
            ":id_user" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    function get_retweets($userId) {
        $insert = $this->connection->prepare("SELECT author.firstname, author.lastname, author.username, author.id as 'id_user', currentuser.id as 'real_id_user', currentuser.username as 'user_username', currentuser.firstname as 'user_firstname', currentuser.lastname as 'user_lastname', tweet.id, tweet.content, tweet.creat_tweet, tweet.upvote, tweet.retweet, '1' as 'is_retweet' from retweet left join tweet on retweet.id_tweet = tweet.id left join user author on tweet.id_user = author.id left join user currentuser on retweet.id_user = currentuser.id where retweet.id_user = :id_user");
        $insert->execute(array(
            ":id_user" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    function search_hashtaged_tweets($hashtag) {

        $insert = $this->connection->prepare("SELECT tweet.id, id_user, content, creat_tweet, upvote, retweet, user.firstname, user.lastname, user.username from tweet left join user on tweet.id_user = user.id where content like concat('%', :hashtag, '%')");
        $insert->execute(array(
            ":hashtag" => $hashtag
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    function get_tweet_with_content($content) {

        $insert = $this->connection->prepare("SELECT id, id_user, content, creat_tweet, upvote, retweet from tweet where content like concat('%', :content, '%')");
        $insert->execute(array(
            ":content" => "$content"
        ));

        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }


    /**
     * Get all the members followed by the user.
     */

    function get_user_follows($userId) {
        $insert = $this->connection->prepare("SELECT id_followed from follow where id_user = :id_user");
        $insert->execute(array(
            ":id_user" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    function subscribe_to_member($memberId, $userId) {

        $insert = $this->connection->prepare("INSERT INTO follow (id_user, id_followed) VALUES (:id_user, :id_followed)");
        $output = $insert->execute(array(
            ":id_user" => $userId,
            ":id_followed" => $memberId
        ));
        return $output;
    }

    function search_member($username) {

        $insert = $this->connection->prepare("SELECT id, username, firstname, lastname from user where username like concat('%', :username, '%')");
        $insert->execute(array(
            ":username" => $username
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    public function get_conversations($userId) {

        $insert = $this->connection->prepare("SELECT messagery.content, messagery.id_receiver, receiver.username, receiver.firstname, receiver.lastname from messagery inner join (select max(date_post) maxtime from messagery group by id_receiver) latest on messagery.date_post = latest.maxtime inner join user receiver on messagery.id_receiver = receiver.id where id_expediter = :user_id or id_receiver = :user_id");
        $insert->execute(array(
            ":user_id" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    public function get_conversation($receiverId, $userId) {

        $insert = $this->connection->prepare("SELECT content, id_receiver, id_expediter, date_post from messagery where (id_expediter = :user_id and id_receiver = :receiver_id) or (id_expediter = :receiver_id and id_receiver = :user_id) order by date_post DESC");
        $insert->execute(array(
            ":user_id" => $userId,
            ":receiver_id" => $receiverId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    public function get_subscriptions($userId) {
        $insert = $this->connection->prepare("SELECT id, firstname, lastname, username, id_receiver from follow inner join user on follow.id_followed = user.id left join messagery on user.id = messagery.id_receiver where follow.id_user = :user_id group by user.id");
        $insert->execute(array(
            ":user_id" => $userId
        ));
        $datas = $insert->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    public function send_message($content, $id_receiver, $id_expediter) {
        $insert = $this->connection->prepare("INSERT INTO messagery (id_expediter, id_receiver, content, date_post) VALUES (:id_expediter, :id_receiver, :content, NOW())");
        $output = $insert->execute(array(
            ":id_expediter" => $id_expediter,
            ":id_receiver" => $id_receiver,
            ":content" => $content
        ));
        return $output;
    }
}