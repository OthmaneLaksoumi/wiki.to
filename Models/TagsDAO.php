<?php
namespace Models;

use PDO;


class TagsDAO {
    private $db;

    public function __construct() {
        $conn = new database();
        $this->db = $conn->getConnection();
    }

    public function get_all_tags() {
        $query = "SELECT * FROM `tags`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tagsObj = array();

        foreach($tags as $tag) {
            $tagsObj[] = new Categories($tag['name']);
        }
        return $tagsObj;
    }
}




?>