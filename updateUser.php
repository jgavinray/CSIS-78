<?php

include "./includes/html.php";          // Please read this class, it contains all of
                                        // the objects and methods needed to speed build
                                        // a page for the website.
include "./includes/database.php";
include "./includes/user.php";

$thisPage = new HTML;                   // This method handles all of the opening HTML tags, and ensures that
                                        // sessions are activated.

$thisPage->connectToProductDatabase();  // This method handles the connection to the database
                                        // if the connection fails, it will display the error and
                                        // stop the further methods from being called.

$thisPage->adminBar();                  // This method calls a .css styled topbar and populates it
                                        // with the links and buttons that is bestowed on an admin user.

$thisPage->navigationBar();             // This method generates the left side navigation bar, adjustments
                                        // to the layout and style of this bar can be made by modifying
                                        // this method.

$thisPage->startContent();              // This method begins the main content of the page, somewhat similar
                                        // to the body.

//  This is the content section, good for passing query information.
$ID = $_SESSION['workingID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$login = $_POST['login'];
$password = $_POST['password'];

//echo "$ID";
//echo "$firstName";
//echo "$lastName";
//echo "$login";
//echo "$password";

//$query = "UPDATE `userData` SET `userData`.`firstName`='$firstName' WHERE `userData`.`ID` LIKE '$ID'";
//$query = "REPLACE INTO `users`.`userData` (`ID`, `firstName` , `lastName` , `login` , `password`, `accountLocked` , `accessibleDatabase`) VALUES ('NULL', '$firstName', '$lastName', '$login' , '$password', '','0' ) WHERE '$ID' LIKE ID;";

$link = mysqli_connect("localhost", "root", "", "users");
mysqli_query($link, "UPDATE `userData` SET `userData`.`firstName`='$firstName' WHERE `userData`.`ID` LIKE '$ID'") or die(mysql_error()); 
mysqli_query($link, "UPDATE `userData` SET `userData`.`lastName`='$lastName' WHERE `userData`.`ID` LIKE '$ID'") or die(mysql_error()); 
mysqli_query($link, "UPDATE `userData` SET `userData`.`login`='$login' WHERE `userData`.`ID` LIKE '$ID'") or die(mysql_error()); 
mysqli_query($link, "UPDATE `userData` SET `userData`.`password`='$password' WHERE `userData`.`ID` LIKE '$ID'") or die(mysql_error()); 


//$thisPage->queryAllProductDatabase();   // The query methods require a call of the connectToXDatabase()
                                        // method before it can be used.

$thisPage->showAllUsers();

$thisPage->manageUsers();

$thisPage->endContent();                // This closes the content section of the page.

$thisPage->endHtml();                   // Closes the HTML tags and general cleanup.

?>
