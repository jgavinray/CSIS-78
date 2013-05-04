<?php
//  Created by J. Gavin Ray on 2/13/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  Last Update on 3/18/13 by J. Gavin Ray

// Session stuffs as of 4/23/13

if (!isset($_SESSION)) 
{
  session_start();
}
if (!isset($_SESSION['isLoggedIn'])) 
{
    header("Location: ./");
}


$cssFile = "./CSS/Axiom.css";
echo "<link rel='stylesheet' href='" . $cssFile . "'>\n";

echo "Welcome Back <i>".$_SESSION['firstName']." ".$_SESSION['lastName']."</i>! ";
echo '<a href="logout.php" target="_blank">Logout</a><br>';
echo '<div class="topbar">';
$link = mysqli_connect("localhost", "root", "", "product");
//$link = mysqli_connect("localhost", "root", "", "users");
/* check connection */



if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//else
//    echo 'Great Success... '.mysqli_get_host_info($link)."\n"; 
echo '</div>';
//  Opening and Closing the HTML Tag for the Navigation
echo '<div class="navigation">'."Sort By<br><br>";
echo "Time<br><br>";
echo "<select>";
echo "<option>Choose Day:</option>\n";
echo "<option>Monday</option>\n";
echo "<option>Tuesday</option>\n";
echo "<option>Wednesday</option>\n";
echo "<option>Thursday</option>\n";
echo "<option>Friday</option>\n";
echo "<option>Saturday</option>\n";
echo "<option>Sunday</option>\n";
echo "</select><br><br>\n";
echo "Show All<br><br>";
echo "Lot Search<br><br>";
echo "Name Search<br><br>";
echo "</div>\n";

//  Opening the HTML Tag for the Content
/*
echo '<div class="content">';

if (mysqli_query($link, "CREATE TEMPORARY TABLE productDetailDuplicate LIKE productDetails") === TRUE) {    // Creates a temporary table in memory
//if (mysqli_query($link, "CREATE TABLE secondTest LIKE Test") === TRUE) {      // This creates a permanent tables
    printf("<p>Table productDetailDuplicate successfully created.</p>\n");
}
else
    printf("<br>Failure creating the table\n");
*/
//  Auto generating a table via MySQL by J. Gavin Ray on 3/16/2013

//  Also I should probably do away completely with the table and implement CSS
//  styles in place so that they can be easier modified and adjusted.
echo '<div class="content">';
/* Select queries return a resultset */
if ($result = mysqli_query($link, "SELECT * FROM productDetails")) {    // This if check is looking to see if the query is TRUE.
//if ($result = mysqli_query($link, "SELECT * FROM userData")) {    // This if check is looking to see if the query is TRUE.
    
    $info = mysqli_fetch_array($result);
    $howManyFieldsInDatabase = mysqli_num_fields($result);
    
    
    printf("<p><table border=1>\n<tr>");
   
    while ($fieldInfo = mysqli_fetch_field($result)) {

        printf("<td>%s</td>\n", $fieldInfo->name);

    }
     
    /* free result set */
    mysqli_free_result($result);
}
else
    printf("<br>Failure selecting rows\n");
    
// New stuffs about multi_query - Experiment
//if (mysqli_multi_query($link, "SELECT * FROM userData ORDER BY login")) {
if (mysqli_multi_query($link, "SELECT * FROM productDetails ORDER BY ID")) {

    do {
        
        /* store first result set */
        if ($result = mysqli_use_result($link)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("<tr>\n");
            for ($i = 0; $i < $howManyFieldsInDatabase; $i++) {
                printf("<td>%s</td>", $row[$i]);
            }
            printf("\n</tr>\n");
            }
            mysqli_free_result($result);
        }
        printf("</table></p>\n");
        /* print divider */
        if (mysqli_more_results($link)) {
            printf("-----------------\n");
        }
    } while (mysqli_next_result($link));
}
 


/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
/*
 
//  For some reason this method keep throwing an error, so I've diabled it for the
//  time being to make sure it isn't interfering with any other sections of the
//  code in the program.    -- J. Gavin Ray 3/16/2013
if ($result = mysqli_query($link, "SELECT ID FROM productDetails", MYSQLI_USE_RESULT)) {

    if (!mysqli_query($link, "SET @a:='this will not work'")) {
        printf("<br>Error: %s\n", mysqli_error($link));
    }
    mysqli_free_result($result);
}
*/
mysqli_close($link);
//  Closing the HTML Tag for the Content
echo '</div>'; 
?>
