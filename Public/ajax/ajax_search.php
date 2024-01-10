<?php



// require_once("../../Models/db_config.php");

// class database {
//     private $db;

//     public function __construct() {
//         $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
//     }

//     public function getConnection() {
//         return $this->db;
//     }
// }
// class Wikis {
//     private $id;
//     private $auteur; 
//     private $title;
//     private $contenu;
//     private $img;
//     private $catg;
//     private $created_at;
//     private $state;

//     public function __construct($id, $auteur, $title, $contenu, $img, $catg, $created_at, $state = 1) {
//         $this->id = $id;
//         $this->auteur = $auteur;
//         $this->title = $title;
//         $this->contenu = $contenu;
//         $this->img = $img;
//         $this->catg = $catg;
//         $this->created_at = $created_at;
//         $this->state = $state;
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function getAuteur()
//     {
//         return $this->auteur;
//     }

//     public function getTitle()
//     {
//         return $this->title;
//     }

//     public function getContenu()
//     {
//         return $this->contenu;
//     }

//     public function getImg()
//     {
//         return $this->img;
//     }

//     public function getCatg()
//     {
//         return $this->catg;
//     }

//     public function getCreated_at()
//     {
//         return $this->created_at;
//     }


//     public function getState()
//     {
//         return $this->state;
//     }
// }


// $db = new database();


// namespace Models;
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

if (isset($_GET['wiki_id'])) {
    $id = $_GET['wiki_id'];
    $wiki = $wikisDAO->get_wiki_by_id($id);
    echo json_encode($wiki->toArray());
}

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
                    $json_result[] = $wiki->getId();
                }
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
        // echo $user->getRole();
    }
    // else {
    //     echo false;
    // }
}
