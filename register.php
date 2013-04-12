<?php

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

   echo "Welcome ".$firstName." ".$lastName."! </i> <br> Username: <i>".$Login."</i> Password: <i>".$Password."</i>!";
?>
