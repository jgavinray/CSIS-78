<?php

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
?>
