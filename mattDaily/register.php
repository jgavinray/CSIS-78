<?php
session_start();

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
$Password =md5(trim(mysql_real_escape_string($_POST['password'])));
}
//$_SESSION['first'] = 
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
//else if (isset($_POST['$Login']) && !empty($_POST['$Login']))
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
<<<<<<< HEAD
$_SESSION['isLoggedIn'] = TRUE;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    //$_SESSION['login'] = $loginCheck->getLogin();
    //$_SESSION['password'] = $loginCheck->getPassword();
    //$_SESSION['accountLocked'] = $loginCheck->getAccountLocked();

header("Location: ./indexConnectToDatabaseAndTableGeneration.php");

   
=======
     $_SESSION['login'] = $Login;
  // echo "Welcome ".$firstName." ".$lastName."! </i> <br> Username: <i>".$Login."</i> Password: <i>".$Password."</i>!";
    header("location: userhome.php");
}
else
{
    echo "Username already exists please go back to the registeration page. <a href='register.html'> here </a>";
}
}
//phpinfo();
>>>>>>> test
?>
