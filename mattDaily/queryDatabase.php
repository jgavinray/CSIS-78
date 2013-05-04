<?php
//  Created by J. Gavin Ray on 3/10/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  This file is a sample of how to execute a query from
//  an MySQL database directly from a PHP document.

//  A majority of the following code is from Mr. Luis Barreto:
//  The database parameter's were implemented by J. Gavin Ray.
$query = "SELECT ID, name, lot, batchSize, numberInBatch, targetWeight, actualWeight, dateTime FROM product";

if ($result = mysqli_query($link,$query))
{
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result))
    {
        printf("%s(%s)%s(%s)%s(%s)%s(%s)\n", $row["ID"],$row["name"],$row["lot"],$row["batchSize"],$row["numberInBatch"],$row["targetWeight"],$row["actualWight"],$row["dateTime"]);
    }
}
?>
