<?php

if (!isset($_SESSION)) 
{
  session_start();
}

include "./includes/database.php";
include "./includes/user.php";

$firstName =$_POST['firstName'];
$lastName =$_POST['lastName'];
$Login =$_POST['login'];
$Password =$_POST['password'];

$reg = new database();
$query = "INSERT INTO  `users`.`userData` (
`ID` ,
`firstName` ,
`lastName` ,
`login` ,
`password` ,
`accountLocked` ,
`accessibleDatabase`
)
VALUES (
NULL ,  '$firstName',  '$lastName',  '$Login',  '$Password',  '',  ''
);";
$reg->doQuery($query);
$_SESSION['isLoggedIn'] = TRUE;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    //$_SESSION['login'] = $loginCheck->getLogin();
    //$_SESSION['password'] = $loginCheck->getPassword();
    //$_SESSION['accountLocked'] = $loginCheck->getAccountLocked();

header("Location: ./indexConnectToDatabaseAndTableGeneration.php");

   
?>
