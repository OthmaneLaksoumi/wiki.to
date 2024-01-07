<?php

namespace Models;

class Tags {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}




?>