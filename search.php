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
 $query .= " WHERE `date` LIKE '".  mysql_real_escape_string($_GET['date'])."'";
  $fsearch = $_GET['date'];
 }
 
  else if (isset($_GET['time'])){
 $query .= " WHERE `time` LIKE '".  mysql_real_escape_string($_GET['time'])."'";
  $fsearch = $_GET['time'];
 }
 
  else if (isset($_GET['name'])){
 $query .= " WHERE `name` LIKE '%".  mysql_real_escape_string($_GET['name'])."%'";
 $fsearch = $_GET['name'];
 }
   else if (isset($_GET['dweek'])){
       $weekday1 = date("N");
       
       $date1 = date("m/d/Y");
       for($i = 1; $weekday1!=$_GET['dweek']; $i++)//starting with todays date checks if it is the same day of the week as requested. If not go back a day.
       {
 
$date1 = date("m/d/Y", strtotime("-".$i." day"));
$weekday1 = date('N', strtotime($date1)); // note: first arg to date() is lower-case L 
}
 $query .= " WHERE `date` = '". $date1 ."'";
 $fsearch = $_GET['dweek'];
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
