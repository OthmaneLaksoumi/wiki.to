<?php

namespace Models;

use PDO;
use PDOException;


// require('autoloader.php');


class WikisDAO
{
    private $db;

    public function __construct()
    {
        $conn = new database();
        $this->db = $conn->getConnection();
    }

    public function get_all_wikis()
    {
        $query = "SELECT * FROM `wikis`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikisObj = array();
        $userDAO = new UsersDAO();
        foreach ($wikis as $wiki) {
            $user = $userDAO->get_user_by_id($wiki['id']);
            $catg = new Categories($wiki['catg_name']);
            $wikisObj[] = new Wikis($wiki['id'], $user, $wiki['title'], $wiki['contenu'], $wiki['img'], $catg, $wiki['created_at']);
        }
        return $wikisObj;
    }

    public function get_wiki_by_id($id)
    {
        $query = "SELECT * FROM `wikis` WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($id));
        $wiki = $stmt->fetch(PDO::FETCH_ASSOC);
        $userDAO = new UsersDAO();
        $user = $userDAO->get_user_by_id($wiki['id']);
        $catg = new Categories($wiki['catg_name']);
        return new Wikis($wiki['id'], $user, $wiki['title'], $wiki['contenu'], $wiki['img'], $catg, $wiki['created_at']);
    }

    public function get_tags_for_wiki($wiki_id) {
        $query = "SELECT * FROM `wiki_tags` WHERE `wiki_id` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$wiki_id]);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tagsObj = array();

        foreach($tags as $tag) {
            $tagsObj[] = new Tags($tag['tag_name']);
        }

    }
}
