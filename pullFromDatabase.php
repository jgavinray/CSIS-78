<?php
//  Created by J. Gavin Ray on 3/10/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.
//  This file is a sample of how to pull from the MySQL databse
//  directly into the PHP documents

//  A majority of the following code is from Mr. Luis Barreto:
 $link = mysqli_connect('localhost','root','','product');
 
 if (!$link)
 {
     die('Connect Error('.myspli_connect_errno().')'.myspli_connect_error());
 }
 
 echo 'Great Success... '.mysqli_get_host_info($link)."\n";
 // End Luis Barreto Contribution
?>
