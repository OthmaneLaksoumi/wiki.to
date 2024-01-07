<?php
namespace Controllers;
use Models\UsersDAO;

require('autoloader.php');


class loginController {


    public static function add_user() {
        extract($_POST);
        $userDAO = new UsersDAO();
        if(!$userDAO->add_user($email, $name, $password)) {
            $user_existence = false;
            include('Views/signUp.php');
        } else {
            header('location: index.php');
        }
    }

    public static function check_user() {
        extract($_POST);
        $userDAO = new UsersDAO();
        if(!$userDAO->check_user($email, $password)) {
            $user_existence = false;
            include('Views/login.php');
        } else {
            $_SESSION['user'] = $email;
            header('location: index.php');
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();
        header('location: index.php');
    }

}











?>