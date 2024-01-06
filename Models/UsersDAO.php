<?php
namespace Models;
use PDO;
use PDOException;

require('autoloader.php');


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
            $user_existence = true;
        }catch(PDOException $e) {
            if(str_contains($e->errorInfo[2], 'Duplicate')) {
                $user_existence = false;
            }
        }
        return $user_existence;
    }

    public function check_user($email, $password) {
        $query = "SELECT * FROM `users` WHERE `email` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) { // Check if the email exist
            return false; 
        } else { // Check if the password is correct
            if(!password_verify($password, $result['password'])) {
                return false;
            } 
        }
        return true; // Si on passe a cette ligne alors mot de passe est vraie
    }

    public function get_user_by_email($email) {
        $query = "SELECT * FROM `users` WHERE `email` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC)[0];
    }

    public function get_all_users($role = "auteur") {
        $query = "SELECT * FROM `users` WHERE `role` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($role));
    }
}


?>