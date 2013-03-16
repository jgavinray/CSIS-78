<?php
//  Created by J. Gavin Ray on 3/11/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  This file is a sample of how to connect to a MySQL databse
//  directly into the PHP documents


//  The database parameter's were implemented by J. Gavin Ray.

//$mysqli = new mysqli("localhost", "root", "", "product");

//$newLink = mysqli_connect("localhost", "root", "", "product");    // New object to acces the product database
$link = mysqli_connect("localhost", "root", "", "product");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else
    echo 'Great Success... '.mysqli_get_host_info($link)."<p>\n"; 


if (mysqli_query($link, "CREATE TEMPORARY TABLE productDetailDuplicate LIKE productDetails") === TRUE) {    // Creates a temporary table in memory
//if (mysqli_query($link, "CREATE TABLE secondTest LIKE Test") === TRUE) {      // This creates a permanent tables
    printf("<br>Table productDetailDuplicate successfully created.\n");
}
else
    printf("<br>Failure creating the table\n");

/* Select queries return a resultset */
if ($result = mysqli_query($link, "SELECT * FROM productDetails")) {    // This if check is looking to see if the query is TRUE.
    $info = mysqli_fetch_array($result);
    
 //   foreach($info as $element)
    for ($i = 0; $i <= 7; $i++)
{ 
        echo '<br>Contents of $info['.$i.']'." are: ".$info[$i];      
}
//   $info = mysqli_fetch_array($result);  // Original location
    printf("<p>ID: %s", $info['ID']);
    printf("<br>Name: %s", $info['name']);
    printf("<br>Lot: %s", $info['lot']);
    printf("<br>Batch Size: %s", $info['batchSize']);
    printf("<br>Number in Batch: %s", $info['numberInBatch']);
    printf("<br>Target Weight: %s", $info['targetWeight']);
    printf("<br>Actual Weight: %s", $info['actualWeight']);
    printf("<br>Time: %s", $info['dateTime']);
    printf("<br>Select returned %d rows.\n", mysqli_num_rows($result));
    printf("<br>Select returned %d fields.\n", mysqli_num_fields($result));


    /* free result set */
    mysqli_free_result($result);
}
else
    printf("<br>Failure selecting rows\n");
    

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

 ?>
