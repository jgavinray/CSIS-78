<?php
//  Created by J. Gavin Ray on 3/11/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  This file is a sample of how to connect to a MySQL databse
//  directly into the PHP documents

//  The following code is from Mr. Luis Barreto:
//  The database parameter's were implemented by J. Gavin Ray.
 $link = mysqli_connect('localhost','root','','product');
 
 if (!$link)
 {
     die('Connect Error('.myspli_connect_errno().')'.myspli_connect_error());
 }
 
 echo 'Great Success... '.mysqli_get_host_info($link)."\n";
 
  
 $query = "SELECT ID, name, lot, batchSize, numberInBatch, targetWeight, actualWeight, dateTime FROM product details";

if ($result = mysqli_query($link,$query))
{
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result))
    {
        printf("%s(%s)\n", $row["ID"],$row["name"],$row["lot"],$row["batchSize"],$row["numberInBatch"],$row["targetWeight"],$row["actualWight"],$row["dateTime"]);
    }
}
// End Luis Barreto Contribution
?>
