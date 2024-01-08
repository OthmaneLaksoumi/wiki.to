<?php

namespace Models;
use PDO;

class CategoriesDAO {

    private $db;

    public function __construct() {
        $conn = new database();
        $this->db = $conn->getConnection();
    }

    public function get_all_catg() {
        $query = "SELECT * FROM `categories`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categoriesObj = array();

        foreach($categories as $catg) {
            $categoriesObj[] = new Categories($catg['name']);
        }
        return $categoriesObj;
    }

    public function get_catg_for_wiki($wiki_id) {
        $query = "SELECT `name` FROM categories
        INNER JOIN wikis ON categories.name = wikis.catg_name
        WHERE wikis.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$wiki_id]);
        $result = $stmt->fetch();
        return new Categories($result['name']);
    }


}




?>