<?php
namespace Models;

class Wikis {
    private $id;
    private $auteur; /* */
    private $title;
    private $contenu;
    private $img;
    private $catg;/* */
    private $created_at;
    private $state;

    public function __construct($id, $auteur, $title, $contenu, $img, $catg, $created_at, $state = 1) {
        $this->id = $id;
        $this->auteur = $auteur;
        $this->title = $title;
        $this->contenu = $contenu;
        $this->img = $img;
        $this->catg = $catg;
        $this->created_at = $created_at;
        $this->state = $state;
    }
 
    public function toArray() {
        $toArray = get_object_vars($this);
        $toArray['auteur'] = $toArray['auteur']->toArray();
        $toArray['catg'] = $toArray['catg']->toArray();
        return $toArray;
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function getAuteur()
    {
        return $this->auteur;
    }
 
    public function getTitle()
    {
        return $this->title;
    }
 
    public function getContenu()
    {
        return $this->contenu;
    }
 
    public function getImg()
    {
        return $this->img;
    }
 
    public function getCatg()
    {
        return $this->catg;
    }
 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    
    public function getState()
    {
        return $this->state;
    }
}


?>