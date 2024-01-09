<?php

namespace Controllers;

use Models\WikisDAO;
use Models\CategoriesDAO;
use Models\TagsDAO;
use Models\Wikis;
use Models\UsersDAO;

class WikisController
{


    public static function affiche_all_wiki()
    {
        $wikisDAO = new WikisDAO();
        $wikis = $wikisDAO->get_all_wikis();
        $tags = [];
        foreach ($wikis as $wiki) {
            $tags[$wiki->getId()] = array();
            foreach ($wikisDAO->get_tags_for_wiki($wiki->getId()) as $tag) {
                $tags[$wiki->getId()][] = $tag->getName();
            }
        }
        $userDAO = new UsersDAO();
        if(isset($_SESSION['user'])) $user = $userDAO->get_user_by_email($_SESSION['user']);

        include('Views/home.php');
    }

    public static function affiche_one_wiki()
    {
        $wikisDAO = new WikisDAO();
        if ($wikisDAO->get_wiki_by_id($_GET['wiki_id']) == NULL) {
            include('Views/wiki_not_found.php');
        } else {
            $wiki = $wikisDAO->get_wiki_by_id($_GET['wiki_id']);
            $user = $wiki->getAuteur();
            $date = strtotime($wiki->getCreated_at());
            $date_posted = date("Y-m-d", $date);
            $catg = $wiki->getCatg()->getName();
            $tags = $wikisDAO->get_tags_for_wiki($_GET['wiki_id']);
            include('Views/wiki_page.php');
        }
    }

    public static function add_wiki()
    {
        $categoriesDAO = new CategoriesDAO();
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $categories = $categoriesDAO->get_all_catg();
        $tagsDAO = new TagsDAO();
        $tags = $tagsDAO->get_all_tags();
        include('Views/add_wiki.php');
    }

    public static function add_wiki_action()
    {
        extract($_POST);
        extract($_FILES['img']);
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $imageName = uniqid() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $wiki = new Wikis(NULL, $user->getId(), $title, $content, "public/images/" . $imageName, $categorie, NULL);
        $wikiDAO = new WikisDAO();
        $last_inset = $wikiDAO->add_wiki($wiki); // this method add wiki and return the last id inserted
        $allowed_images_type = ['image/jpeg', 'image/png'];
        $allowed_images_size = 5 * 1024 * 1024;
        move_uploaded_file($_FILES['img']['tmp_name'], 'Public/images/' . $imageName);

        // if($_FILES['img']['size'] > $allowed_images_size) {
        //     $image_size = true;
        //     // include('Views/add_wiki.php');
        //     header('location: index.php?actio=add_wiki&image_size=true');
        //      exit();
        // } else if(!in_array($_FILES['img']['type'], $allowed_images_type)){
        //     $image_type = true;
        //     header('location: index.php?action=add_wiki');
        //      exit();
        //     // include('Views/add_wiki.php');
        // } else {
        // }

        foreach ($tags as $tag) {
            $wikiDAO->add_wiki_tags($last_inset, $tag);
        }
        header('location: index.php');
        exit();
    }


    public static function my_wikis()
    {
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);
        $wikisDAO = new WikisDAO();
        $wikis = $wikisDAO->get_wikis_for_user();
        $tagsDAO = new TagsDAO();
        $tags = [];
        foreach ($wikis as $wiki) {
            $tags[$wiki->getId()] = array();
            foreach ($wikisDAO->get_tags_for_wiki($wiki->getId()) as $tag) {
                $tags[$wiki->getId()][] = $tag->getName();
            }
        }

        include('Views/my_wikis.php');
    }

    public static function edit_wiki()
    {
        $wiki_id = $_GET['wiki_id'];
        $wikisDAO = new WikisDAO();
        $wiki_selected = $wikisDAO->get_wiki_by_id($wiki_id);
        $tags_selected = $wikisDAO->get_tags_for_wiki($wiki_id);
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_email($_SESSION['user']);

        $categoriesDAO = new CategoriesDAO();
        $categories = $categoriesDAO->get_all_catg();
        $tagsDAO = new TagsDAO();
        $tags = $tagsDAO->get_all_tags();
        $catgDAO = new CategoriesDAO();
        $catg_selected = $catgDAO->get_catg_for_wiki($wiki_id);
        include('Views/edit_wiki.php');
    }

    public static function edit_wiki_action()
    {
        extract($_POST);
        extract($_FILES);
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // echo '</pre>';
        $wikisDAO = new WikisDAO();
        $old_wiki = $wikisDAO->get_wiki_by_id($wiki_id);
        if ($_FILES['img']['name'] == "") {
            $wikisDAO->edit_wiki($wiki_id, $title, $content, $categorie);
        } else {
            $imageName = uniqid() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $wikisDAO->edit_wiki($wiki_id, $title, $content, $categorie, "public/images/" . $imageName);
            move_uploaded_file($_FILES['img']['tmp_name'], 'Public/images/' . $imageName);
        }
        /* Update tags for wiki selectec */
        $wikisDAO->delete_wiki_tags($wiki_id);
        foreach ($tags as $tag) {
            $wikisDAO->add_wiki_tags($wiki_id, $tag);
        }

        header('location: index.php?action=my_wikis');
        exit();
    }

    public static function delete_wiki()
    {
        $wiki_id = $_GET['wiki_id'];
        $wikisDAO = new WikisDAO();
        $wikisDAO->delete_wiki($wiki_id);
        header('location: index.php?action=my_wikis');
        exit();
    }
}
