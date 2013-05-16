<?php
/*
include "./includes/database.php";
//$fileData = $_FILES['upload']['tmp_name'];
//$file = fopen($fileData, "r");



if(is_uploaded_file($_FILES['upload']['tmp_name']))
{
   $DB = new database;
   $file = fopen($_FILES['upload']['tmp_name'], "r");
  
    while(!feof($file))
   {
       $i = $i + 1;

       echo "Interation: ".$i."<br>";
       list($string1, $string2, $string3, $string4) = explode(":", fgets($file));
       echo "First Name: ".$string1."<br>";
       echo "Last Name: ".$string2."<br>";
       echo "Email: ".$string3."<br>";
       echo "Phone #: ".$string4."<br><br>";
       $query = "INSERT INTO  `users`.`test` (
`ID` ,
`fname` ,
`lname` ,
`email` ,
`phone`
)
VALUES (
NULL ,  '$string1',  '$string2',  '$string3',  '$string4'
);";

       $DB->doQuery($query);
    }
    echo "EOF was found";
    fclose($file);
}
else
    echo "No File Uploaded";
*/

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
$thisPage->processUpload();

$thisPage->endContent();                // This closes the content section of the page.

$thisPage->endHtml();                   // Closes the HTML tags and general cleanup.

?>
