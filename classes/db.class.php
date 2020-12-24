<?php 

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "test";

    public function con() {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

// $db = new Db();
// print_r($db);
