<?php
include "./includes/database.php";
include "./includes/user.php";

$loginFromHTML = $_POST['login'];
$passwordFromHTML = $_POST['password'];
$loginCheck = new database();
$checkUser = new user();

$loginCheck->getNumberOfRecords();
echo $loginFromHTML;
$checkUser->searchDBByLogin($loginFromHTML);       

?>
