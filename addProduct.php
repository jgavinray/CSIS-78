<?php
//Written by Matt Daily 5/18/13

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

$thisPage->startContent();              // This method begins the main content of the page, somewhat similar
                                        // to the body.

                                        // this method.(ID, name, lot, batchSize, numberInBatch, targetWeight, actualWeight, date, time)

mysql_connect("localhost", "root", "", "product");
 if (mysqli_connect_errno()){
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
 }
 $link = mysqli_connect("localhost", "root", "", "product");
        if ($result = mysqli_query($link, "SELECT * FROM productDetails")) 
        {
        
            $info = mysqli_fetch_array($result);
            $howManyFieldsInDatabase = mysqli_num_fields($result);
    
    
            printf("<p><table border=1>\n<tr>");
   
            while ($fieldInfo = mysqli_fetch_field($result)) 
            {

                printf("<td>%s</td>\n", $fieldInfo->name);

            }
     
        // free result set
        mysqli_free_result($result);
        
        
        }   
      echo '<form name ="lab" Method ="POST" action ="addProduct.php">';
            echo '<tr><td></td>';
            echo '<td><input type ="text" name ="name"></td>';
            echo '<td><input type ="text" name ="lot"></td>';
            echo '<td><input type ="text" name ="batchSize"></td>';
            echo '<td><input type ="text" name ="numberInBatch"></td>';
            echo '<td><input type ="text" name ="targetWeight"></td>';
            echo '<td><input type ="text" name ="actualWeight"></td>';
    
            printf("</table>");
            echo '<input type="Submit" value="Add">';
            echo '</form>';
            printf("</p>\n");
            
        

$name = $_POST['name'];
$lot = $_POST['lot'];
$batchSize = $_POST['batchSize'];
$numberInBatch = $_POST['numberInBatch'];
$targetWeight = $_POST['targetWeight'];
$actualWeight = $_POST['actualWeight'];


/*
echo "$name"." ";
echo "$lot"." "." ";
echo "$batchSize"." ";
echo "$numberInBatch"." ";
echo "$targetWeight"." ";
echo "$actualWeight"." ";
*/
   
         
$add = new database();
$query = "INSERT INTO `product`.`productdetails` (
`ID` ,
`name` ,
`lot` ,
`batchSize` ,
`numberInBatch` ,
`targetWeight` ,
`actualWeight`

)
VALUES (NULL, '$name', '$lot', '$batchSize', '$numberInBatch', '$targetWeight', '$actualWeight');"; 


$add->doQuery($query);


$thisPage->endContent();                // This closes the content section of the page.

$thisPage->endHtml();                   // Closes the HTML tags and general cleanup.

?>