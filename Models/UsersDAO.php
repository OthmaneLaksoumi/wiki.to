<?php

require('Models/database.php');
require('Users.php');

class UsersDAO {

    private $db;

    public function __construct(){
        try{
            $conn = new database();
            $this->db = $conn->getConnection();
        }catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function add_user($email, $name, $password) {
        $query = "INSERT INTO users (`email`, `name`, `password`) 
                    VALUES (?,?,?)";
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare($query);
        try {
            $stmt->execute(array(
                $email,
                $name,
                $password_hashed
            ));
            $exit_user = false;
        }catch(PDOException $e) {
            if(str_contains($e->errorInfo[2], 'Duplicate')) {
                $exit_user = true;
            }
            include('Views/signUp.php');
        }
    
    }

    public function get_user_by_email($email) {
        $query = "SELECT * FROM `users` WHERE `email` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC)[0];
        // $resultObj = new Users($resultArray->getId(), );
    }

    public function get_all_users($role = "auteur") {
        $query = "SELECT * FROM `users` WHERE `role` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($role));
    }
}


?>