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

    public function searchDBByLogin($searchLogin)
        {

 // New Stuffs       
        $link = mysqli_connect("localhost", "root", "", "users");            




 // End New Stuffs

//echo $searchLogin;
            $DB = new database();
            $query = "SELECT * FROM `userData` WHERE `login` LIKE '$searchLogin'";
            $DB->doQuery($query);
            $resultSet = $DB->getData();
            foreach($resultSet as $record)
            {
                $id     = $record['ID'];
                $firstName = $record['firstName'];
                $lastName  = $record['lastName'];
                $login  = $record['login'];
                $password = $record['password'];
                $account = $record['accountLocked'];
                $accessible = $record['accessibleDatabase'];
                
                
                echo "$id";
                echo "$login";
                echo "$firstName";
                echo "$lastName";
                echo "$password";
                echo "$account";
                echo "$accessible";
                
            }
            
            $DB->destroy();

        }
    
    public function printData()
        {
            echo "<br>".$this->ID;
            echo "<br>".$this->firstName;
            echo "<br>".$this->lastName;
            echo "<br>".$this->login;
            echo "<br>".$this->password;
        }


    
}
?>
