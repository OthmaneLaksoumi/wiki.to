<?php

namespace Controllers;

use Models\UsersDAO;

class AuteursController {



    public static function affiche_auteur() {
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $auteurs = $userDAO->get_all_users();
        include('Views/admin/affiche_auteurs.php');
    }


}




?>