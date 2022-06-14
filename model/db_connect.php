<?php

class Connect_Db {

    function __construct() {
        $this->user = 'root';
        $this->password = '';

        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=common-database;charset=utf8', $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            print "Error ".$e->getMessage()."\n";
            die();
        }
    }
}