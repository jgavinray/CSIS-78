<?php

class user
{
    private $firstName;
    private $lastName;
    private $login;
    private $password;
    
    //  Setters...
    public function setFirstName($arg)
    {
        $this->firstName = $arg;
    }
    
    public function setLastName($arg)
    {
        $this->lastName = $arg;
    }
    
    //  Getters...
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
}
?>
