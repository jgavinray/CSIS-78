<?php
include "./includes/html.php";
include "./includes/database.php";
include "./includes/user.php";

$newDocument = new HTML;
$loginFromHTML = $_POST['login'];
$passwordFromHTML = $_POST['password'];
$loginCheck = new user();


// Begin HTML Formatting

$loginCheck->searchDBByLogin($loginFromHTML); 

if ($loginFromHTML === $loginCheck->getLogin())
    {
        if  ($passwordFromHTML === $loginCheck->getPassword())
            {
                echo "Welcome Back <i>".$loginCheck->getFirstName()." ".$loginCheck->getLastName()."</i>!";
            }
        else
            {
                echo "Please re-enter your login and password.";
                return;
                
            }
    }
else
    {
        echo "Please re-enter your login and password.";
        return;
    }
    

$newDocument->endHtml();
?>
