<?php

use Models\WikisDAO;
use Models\TagsDAO;
use Models\CategoriesDAO;
use Models\UsersDAO;

session_start();
include('../../autoloader.php');
$wikisDAO = new WikisDAO();
$tagsDAO = new TagsDAO();
$catgsDAO = new CategoriesDAO();
$userDAO = new UsersDAO();

// if (isset($_GET['wiki_id'])) {
//     $id = $_GET['wiki_id'];
//     $wiki = $wikisDAO->get_wiki_by_id($id);
//     echo json_encode($wiki->toArray());
// }

if (isset($_GET['search'])) {
    if ($_GET['search'] !== '') {
        $search = $_GET['search'];

        if (isset($_SESSION['user'])) {
            $user = $userDAO->get_user_by_email($_SESSION['user']);
            if ($user->getRole() === 'auteur') {
                $wikis = $wikisDAO->get_all_wikis();
            } else if ($user->getRole() === 'admin') {
                $wikis = $wikisDAO->get_all_wikis_for_admin();
            }
        } else {
            $wikis = $wikisDAO->get_all_wikis();
        }

        $tags = $tagsDAO->get_all_tags();

        $catgs = $catgsDAO->get_all_catg();

        $json_result = [];

        foreach ($wikis as $wiki) {
            if (stristr($wiki->getTitle(), $search)) {
                $json_result[] = $wiki->getId();
            }
        }

        foreach ($tags as $tag) {
            if (stristr($tag->getName(), $search)) {
                $wikis_for_tags = array_merge($wikisDAO->get_wikis_for_tag($tag->getName(), 0), $wikisDAO->get_wikis_for_tag($tag->getName(), 1));
                foreach ($wikis_for_tags as $wiki) {
                    $json_result[] = $wiki->getId();                }
            }
        }

        foreach($catgs as $catg) {
            if (stristr($catg->getName(), $search)) {
                $wikis_for_catgs = $wikisDAO->get_wikis_for_catg($catg->getName());
                foreach ($wikis_for_catgs as $wiki) {
                    $json_result[] = $wiki->getId();
                }
            }
        }

        echo json_encode($json_result);
    }
}
