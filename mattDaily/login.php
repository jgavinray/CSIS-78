<?php


//  Written by J. Gavin Ray on 4/1/13
//  Latest revision on 4/15/13
include "./includes/html.php";
include "./includes/database.php";
include "./includes/user.php";


$loginFromHTML = $_POST['login'];
$passwordFromHTML = $_POST['password'];
$isLoggedIn = $_SESSION['isLoggedIn'];
$loginCheck = new user();

if (!isset($_POST['login']))
{
   header("Location: ./");
   return;
}
if (!isset($_POST['password']))
{
   header("Location: ./");
   return;
}
if (!isset($_SESSION)) 
{
  session_start();
}


// Begin HTML Formatting
//$newDocument = new HTML;
 //              echo "Welcome Back <i>".$loginCheck->getFirstName()." ".$loginCheck->getLastName()."</i>!";



$loginCheck->searchDBByLogin($loginFromHTML); 

if ($loginFromHTML === $loginCheck->getLogin())
    {
        if  ($passwordFromHTML === $loginCheck->getPassword())
            {
                $_SESSION['isLoggedIn'] = TRUE;
                $isLoggedIn = TRUE;
             //   echo "Welcome Back <i>".$loginCheck->getFirstName()." ".$loginCheck->getLastName()."</i>!";
            }
        else
            {
  //              echo "Please re-enter your login and password";
                header("Location: ./");
                exit;
                //  Destroy the initialized object and database connection.    
                return;
                
            }
    }
else
    {
        //echo "Please re-enter your login and password";
        header("Location: ./");
        //  Destroy the initialized object and database connection.    
        return;
    }

if (isset($_SESSION['isLoggedIn'])) 
//if (isset($isLoggedIn)) 
{
    $_SESSION['ID'] = $loginCheck->getID();
    $_SESSION['firstName'] = $loginCheck->getFirstName();
    $_SESSION['lastName'] = $loginCheck->getLastName();
    //$_SESSION['login'] = $loginCheck->getLogin();
    //$_SESSION['password'] = $loginCheck->getPassword();
    $_SESSION['accountLocked'] = $loginCheck->getAccountLocked();
//    $_SESSION['accessibleDatabase'] = $loginCheck->getAccessibleDatabase();
    header("Location: ./indexConnectToDatabaseAndTableGeneration.php");
}


// End HTML Formatting
//    $newDocument->endHtml();

?>
