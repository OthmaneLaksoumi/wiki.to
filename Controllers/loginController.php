<?php
namespace Controllers;
use Models\UsersDAO;

require('autoloader.php');

class loginController {


    public static function add_user() {
        extract($_POST);
        $userDAO = new UsersDAO();
        $userDAO->add_user($email, $name, $password);
        if(!$exit_user) {
            header('location: index.php');
        }
    }


}











?>