<?php

class user
{
    private $ID;
    private $firstName;
    private $lastName;
    private $login;
    private $password;
    private $accountLocked;
    private $accessibleDatabase;
    
    
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
    public function getID()
    {
        return $this->ID;
    }

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
            $DB = new database();
//            $query = "SELECT * FROM `userData` WHERE `login` LIKE '$searchLogin' and `password` LIKE '$searchPassword'";
            $query = "SELECT * FROM `userData` WHERE `login` LIKE '$searchLogin'";
            $DB->doQuery($query);
            $resultSet = $DB->getData();
            
            // Check to see if the $searchLogin variable returns Null
            if (!$resultSet)
                {
                    $DB->destroy();
                    return;
                }
            // If Something is returned, load the data into the object instance.
            else 
                {
                    foreach($resultSet as $record)
                        {
                            $id                     = $record['ID'];
                            $firstName              = $record['firstName'];
                            $lastName               = $record['lastName'];
                            $login                  = $record['login'];
                            $password               = $record['password'];
                            $accountLocked          = $record['accountLocked'];
                            $accessibleDatabase     = $record['accessibleDatabase'];

                            $this->ID                   = $id;
                            $this->firstName            = $firstName;
                            $this->lastName             = $lastName;
                            $this->login                = $login;
                            $this->password             = $password;
                            $this->accountLocked        = $accountLocked;
                            $this->accessibleDatabase   = $accessibleDatabase;
                            
                        }
            }
            $DB->destroy();

        }
        
    public function validateLogin($searchLogin, $searchPassword)
    {
        $loginCheck = new user();
        $loginCheck->searchDBByLogin($searchLogin); 
            if ($searchLogin === $loginCheck->getLogin())
               {
                   if  ($searchPassword === $loginCheck->getPassword())
                       {
                            return TRUE;

                       }
                   else
                       {
                   
                           return FALSE;

                       }
               }
           else
               {
                   
                   return FALSE;
               }
      
        
    }
    
    public function printData()
        {
            echo "<br>$this->ID";
            echo "<br>$this->firstName";
            echo "<br>$this->lastName";
            echo "<br>$this->login";
            echo "<br>$this->password";
        }
    

    
}
?>
