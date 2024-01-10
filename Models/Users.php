<?php

namespace Models;

class Users {
    private $id;
    private $email;
    private $name;
    private $password;
    private $role;

    private $added_at;
    public function __construct($id, $email, $name, $password, $role, $added_at){
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
        $this->added_at = $added_at;
    }

    public function toArray() {
        return get_object_vars($this);
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the value of added_at
     */ 
    public function getAdded_at()
    {
        return $this->added_at;
    }
}




?>