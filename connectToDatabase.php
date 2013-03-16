<?php
//  Created by J. Gavin Ray on 3/11/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  This file is a sample of how to connect to a MySQL databse
//  directly into the PHP documents


//  The database parameter's were implemented by J. Gavin Ray.

//$mysqli = new mysqli("localhost", "root", "", "product");

//$newLink = mysqli_connect("localhost", "root", "", "product");    // New object to acces the product database
$link = mysqli_connect("localhost", "root", "", "test");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else
    echo 'Great Success... '.mysqli_get_host_info($link)."\n"; 

/* Create table doesn't return a resultset */
if (mysqli_query($link, "CREATE TEMPORARY TABLE secondTest LIKE Test") === TRUE) {
//if (mysqli_query($link, "CREATE TABLE secondTest LIKE Test") === TRUE) {
    printf("<br>Table secondTest successfully created.\n");
}
else
    printf("<br>Failure creating the table\n");

/* Select queries return a resultset */
if ($result = mysqli_query($link, "SELECT * FROM Test LIMIT 10")) {
    
   
    do {
        /* store first result set */
        if ($result = mysqli_store_result($link)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s\n", $row[0]);
            }
            mysqli_free_result($result);
        }
        /* print divider */
        if (mysqli_more_results($link)) {
            printf("-----------------\n");
        }
    } while (mysqli_next_result($link));
}
//    printf("<br>Select returned %d rows.\n", mysqli_num_rows($result));
//    printf("<br>Select returned %d fields.\n", mysqli_num_fields($result));
//    printf("<br>%s", $result);    // Tried to show the results as a string, its not happy

    /* free result set */
//    mysqli_free_result($result);
//}
else
    printf("<br>Failure selecting rows\n");
    

/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
if ($result = mysqli_query($link, "SELECT ID FROM Test", MYSQLI_USE_RESULT)) {

    /* Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error */
    if (!mysqli_query($link, "SET @a:='this will not work'")) {
        printf("<br>Error: %s\n", mysqli_error($link));
    }
    mysqli_free_result($result);
}

mysqli_close($link);
/*
 * 
 
$sql = 'SELECT * FROM productDetails'; 
$link = mysqli_connect('localhost','root','','product');

$result = mysqli_query($link, $sql);
 
 if (!$link)
 {
     die('Connect Error('.myspli_connect_errno().')'.myspli_connect_error());
 }
 
 echo 'Great Success... '.mysqli_get_host_info($link)."\n"; 
*/
 ?>
