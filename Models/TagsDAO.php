<?php

namespace Models;

use PDO;
use PDOException;


class TagsDAO
{
    private $db;

    public function __construct()
    {
        $conn = new database();
        $this->db = $conn->getConnection();
    }

    public function get_all_tags()
    {
        $query = "SELECT * FROM `tags`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tagsObj = array();

        foreach ($tags as $tag) {
            $tagsObj[] = new Tags($tag['name']);
        }
        return $tagsObj;
    }

    public function add_tag($tag)
    {
        $query = "INSERT INTO `tags` VALUES (?)";
        $stmt = $this->db->prepare($query);
        $filtred_tag = htmlspecialchars($tag);
        try {
            $stmt->execute([$filtred_tag]);
            return false;
        } catch (PDOException $e) {
            return true;
        }
    }

    public function edit_tag($old_tag, $new_tag)
    {
        $query = "UPDATE `tags` SET `name` = ? WHERE `name` = ?";
        $stmt = $this->db->prepare($query);
        $filtred_new_tag = htmlspecialchars($new_tag);
        $filtred_old_tag = htmlspecialchars($old_tag);
        $stmt->execute([$filtred_new_tag, $filtred_old_tag]);
    }

    public function delete_tag($tag)
    {
        $query = "DELETE FROM `tags` WHERE `name` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$tag]);
    }

    //     public function get_tags_for_wiki($wiki_id) {
    //         $query = "SELECT * FROM `wiki_tags` WHERE wiki"
    //     }

}
