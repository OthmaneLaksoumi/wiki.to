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

        include('Views/home.php');
    }

    public static function affiche_one_wiki()
    {
        $wikisDAO = new WikisDAO();
        if ($wikisDAO->get_wiki_by_id($_GET['wiki_id']) == NULL) {
            include('Views/wiki_not_found.php');
        } else {
            $wiki = $wikisDAO->get_wiki_by_id($_GET['wiki_id']);
            include('Views/wiki_page.php');
        }
    }

    public static function add_wiki()
    {
        $categoriesDAO = new CategoriesDAO();
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
        // } else if(!in_array($_FILES['img']['type'], $allowed_images_type)){
        //     $image_type = true;
        //     header('location: index.php?action=add_wiki');
        //     // include('Views/add_wiki.php');
        // } else {
        // }

        foreach ($tags as $tag) {
            $wikiDAO->add_wiki_tags($last_inset, $tag);
        }
        header('location: index.php');
    }
}
