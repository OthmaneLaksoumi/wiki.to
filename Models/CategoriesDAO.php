<?php

namespace Models;
use PDO;
use PDOException;

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

    public function add_catg($catg) {
        $query = "INSERT INTO `categories` VALUES (?)";
        $stmt = $this->db->prepare($query);
        $filtred_name = htmlspecialchars($catg);
         try {
            $stmt->execute([$filtred_name]);
            return false;
         } catch(PDOException $e) {
            return true;
         }
    }

    public function edit_catg($old_catg, $new_catg) {
        $query = "UPDATE `categories` SET `name` = ? WHERE `name` = ?";
        $stmt = $this->db->prepare($query);
        $filtred_new_catg = htmlspecialchars($new_catg);
        $filtred_old_catg = htmlspecialchars($old_catg);
        $stmt->execute([$filtred_new_catg, $filtred_old_catg]);
    }

    public function delete_catg($catg_name) {
        $query = "DELETE FROM `categories` WHERE `name` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$catg_name]);
    }

}




?>