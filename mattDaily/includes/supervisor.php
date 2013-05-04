<?php

class supervisor extends user
{
    private $login;
    
    
    function __construct()
    {

        echo "A Supervisor class was created!";
    }
    
    public function setLogin($arg)
    {
        $this->login = $arg;
    }
    
    public function getLogin()
    {
        return $this->login; 
    }
    
}
?>
