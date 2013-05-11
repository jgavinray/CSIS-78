<?php 
$cssFile = "./CSS/Axiom.css";
echo "<link rel='stylesheet' href='" . $cssFile . "'>\n";

include "./includes/database.php";
 $mysqli = new mysqli("localhost", "root", "", "product");
 if (mysqli_connect_errno()){
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
 }
 $query = "SELECT * FROM productDetails";

 
 if (isset($_GET['lot'])){
 $query .= " WHERE `lot` LIKE '".  mysql_real_escape_string($_GET['lot'])."'";
 $fsearch = $_GET['lot'];
 }

 else if (isset($_GET['date'])){
 $query .= " WHERE `dateTime` LIKE '".  mysql_real_escape_string($_GET['date'])."'";
  $fsearch = $_GET['date'];
 }
 
  else if (isset($_GET['name'])){
 $query .= " WHERE `name` LIKE '%".  mysql_real_escape_string($_GET['name'])."%'";
 $fsearch = $_GET['name'];
 }

       if ($result=$mysqli->query($query)) {
               
                echo "<p><table border=1>\n";
                while ($row= $result->fetch_array()){
                 
                     $howManyFieldsInDatabase = mysqli_num_fields($result);
                       echo "<tr>";
                    for ($i = 0; $i < $howManyFieldsInDatabase; $i++) 
                    {
                    
                    printf("<td>%s</td>", $row[$i]);
                    }
                     echo "</tr>";
              
        }
         echo"</table></p>"; 
       
       }
     if (empty($howManyFieldsInDatabase))
{
    echo 'No results found for ' . $fsearch;
}
   
           $mysqli->close();


          ?> 
