<?php

namespace Models;

class Users {
    private $id;
    private $email;
    private $name;
    private $password;
    private $role;

    public function __construct($id, $email, $name, $password, $role){
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
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
}




?>