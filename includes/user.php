<?php

class user
{
    private $firstName;
    private $lastName;
    private $login;
    private $password;
    private $accountLocked;
    
    //  Setters...
    public function setFirstName($arg)
    {
        $this->firstName = $arg;
    }
    
    public function setLastName($arg)
    {
        $this->lastName = $arg;
    }
    public function setLogin($arg)
    {
        $this->login = $arg;
    }
    public function setPassword($arg)
    {
        $this->password = $arg;
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
    public function getLogin()
    {
        return $this->login;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAccountLocked()
    {
        return $this->accountLocked;
    }
    
}
?>
