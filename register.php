//  Created by Matt Daily on 4/12/1
//  Last Update on 5/9/13 by Matt Daily
//  This file declares variables using POST to insert username, first name
//  last name, and passwords into a MySQL user database. 
//  It uses the trim function to ignore spaces, the mysql_real_escape_string for 
//  safer input of sql data
//  if statements check to make sure fields are not left blank
//  checks to ensure login names are not already in database 
//  password confirmation
//  Starts session

<?php

if (!isset($_SESSION)) 
{
  session_start();
}

include "./includes/database.php";
include "./includes/user.php";
if(isset($_POST['add']))
{
$firstName =trim(mysql_real_escape_string($_POST['firstName']));
$lastName =trim(mysql_real_escape_string($_POST['lastName']));
$Login =trim(mysql_real_escape_string($_POST['login']));
$Password =trim(mysql_real_escape_string($_POST['password']));
$Password2 =$_POST['password2'];
}
//Dialog Box checker
$error = false;
if (empty($Password))
    {
    $error = true;
    echo 'Password is either 0 or empty. Please enter a password. ';
}
if (empty($firstName))
        {
    $error = true;
    echo 'First name is either 0 or empty. Please enter a first name. ';
}
if (empty($lastName))
        {
    $error = true;
    echo 'Last name is either 0 or empty. Please enter a last name. ';
}
if (empty($Login))
        {
    $error = true;
    echo 'User name is either 0 or empty. Please enter a user name. ';
}
//password check
if ($_POST["password"] != $_POST["password2"])
        {
   $error = true;
   echo '<p>Passwords do not match. Please re-enter matching passwords. ';
      }
if ($error == true)
        {
   echo  "<p> <a href='register.html'> Return </a>";
        }
        
if(!$error)
{
$reg = new database();
$query = "SELECT * FROM `userdata` WHERE `login`='".$Login."'";
$reg->doQuery($query);
if(!$reg->getData())
{


$query = "INSERT INTO  `userdata` (
`firstName` ,
`lastName` ,
`login` ,
`password`
)
VALUES ('".$firstName."',  '".$lastName."',  '".$Login."',  '".$Password."'
);";
$reg->doQuery($query);

$_SESSION['isLoggedIn'] = TRUE;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    //$_SESSION['login'] = $loginCheck->getLogin();
    //$_SESSION['password'] = $loginCheck->getPassword();
    //$_SESSION['accountLocked'] = $loginCheck->getAccountLocked();

header("Location: ./indexConnectToDatabaseAndTableGeneration.php");
}
else
{
    echo "Username already exists please go back to the registeration page. <a href='register.html'> here </a>";
}
}


?>