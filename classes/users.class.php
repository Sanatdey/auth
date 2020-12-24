<?php
include 'db.class.php';
session_start();
class Users extends Db {
    public function getUsers() {
        $sql = 'SELECT * FROM users';
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function addUser($email,$pass,$name,$mobile) {
        $sql = "INSERT INTO users (email,pass,name,mobile) VALUES ( ? , ? , ?, ?)";
        $stmt = $this->con()->prepare($sql);
        return $stmt->execute([$email,$pass,$name,$mobile]);
    
    }

}

echo $_POST['email'].$_POST['password'];
// $user = new User();

// echo $user->addUser('Admin004','1234','Adminn','0+');
// echo $_SESSION['error'];