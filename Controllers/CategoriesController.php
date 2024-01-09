<?php

namespace Controllers;

use Models\UsersDAO;
use Models\CategoriesDAO;
use Models\Categories;

class CategoriesController
{
    public static function affiche_catgs()
    {
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $catgsDAO = new CategoriesDAO();
        $catgs = $catgsDAO->get_all_catg();
        include('Views/admin/affiche_catgs.php');
    }


    public static function add_catg_action()
    {
        extract($_POST);
        if (isset($catg)) {
            $userDAO = new UsersDAO();
            $user = $userDAO->get_user_by_email($_SESSION['user']);
            $catgsDAO = new CategoriesDAO();
            $catgs = $catgsDAO->get_all_catg();
            $catg_exist = $catgsDAO->add_catg($catg);
            if (!$catg_exist) {
                header('location: index.php?action=affiche_catgs');
                exit();
            } else {
                include('Views/admin/affiche_catgs.php');
            }
        } else {
            header('location: index.php?action=affiche_catgs');
            exit;
        }
    }

    public static function edid_catg_action()
    {
        extract($_POST);
        $catgsDAO = new CategoriesDAO();
        $catgsDAO->edit_catg($old_catg, $new_catg);
        header('location: index.php?action=affiche_catgs');
        exit();
    }

    public static function delete_catg()
    {
        extract($_GET);
        $catgsDAO = new CategoriesDAO();
        $catgsDAO->delete_catg($catg_name);
        header('location: index.php?action=affiche_catgs');
        exit();
    }
}
