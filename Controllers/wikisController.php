<?php

namespace Controllers;

use Models\WikisDAO;
use Models\CategoriesDAO;
use Models\TagsDAO;

class WikisController
{


    public static function affiche_all_wiki()
    {
        $wikisDAO = new WikisDAO();
        $wikis = $wikisDAO->get_all_wikis();
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

    public static function add_wiki(){
        $categoriesDAO = new CategoriesDAO();
        $categories = $categoriesDAO->get_all_catg();
        $tagsDAO = new TagsDAO();
        $tags = $tagsDAO->get_all_tags();
        include('Views/add_wiki.php');

    }
}
