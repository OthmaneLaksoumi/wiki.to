<?php
namespace Models;

class Categories {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public function getName()
    {
        return $this->name;
    }
}


?>