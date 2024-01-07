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


}




?>