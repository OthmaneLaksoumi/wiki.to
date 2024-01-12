<?php

namespace Controllers;


use Models\UsersDAO;
use Models\TagsDAO;


class TagsController {
    
    public static function affiche_tags()
    {
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $tagsDAO = new TagsDAO();
        $tags = $tagsDAO->get_all_tags();
        include('Views/admin/affiche_tags.php');
    }

    public static function add_tag_action() {
        extract($_POST);
        if (isset($tag)) {
            $userDAO = new UsersDAO();
            $user = $userDAO->get_user_by_email($_SESSION['user']);
            $tagsDAO = new TagsDAO();
            $tags = $tagsDAO->get_all_tags();
            $tag_exist = $tagsDAO->add_tag($tag);
            if (!$tag_exist) {
                header('location: index.php?action=affiche_tags');
                exit();
            } else {
                include('Views/admin/affiche_tags.php');
            }
        } else {
            header('location: index.php?action=affiche_tags');
            exit;
        }
    }

    public static function edid_tag_action()
    {
        extract($_POST);
        $catgsDAO = new TagsDAO();
        $catgsDAO->edit_tag($old_catg, $new_catg);
        header('location: index.php?action=affiche_tags');
        exit();
    }

    public static function delete_tag_action() {
        extract($_GET);
        $tagsDAO = new TagsDAO();
        $tagsDAO->delete_tag($tag_name);
        header('location: index.php?action=affiche_tags');
        exit();
    }
}






?>