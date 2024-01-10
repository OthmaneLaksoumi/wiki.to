<?php
namespace Controllers;
use Models\UsersDAO;
use Models\WikisDAO;
use Models\TagsDAO;
use Models\CategoriesDAO;

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

    public static function affiche_statistics() {
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $allAuteur = count($userDAO->get_all_users('auteur'));

        $wikisDAO = new WikisDAO();
        $allWikis = count($wikisDAO->get_all_wikis_for_admin());
        $NoArchiveWikis = count($wikisDAO->get_all_wikis());
        $archiveWikis = $allWikis - $NoArchiveWikis;
        
        $tagsDAO = new TagsDAO();
        $allTags = count($tagsDAO->get_all_tags());

        $catgsDAO = new CategoriesDAO();
        $allCatgs = count($catgsDAO->get_all_catg());
        include('Views/admin/statistics.php');
    }

    public static function logout() {
        session_unset();
        session_destroy();
        header('location: index.php');
    }

}











?>