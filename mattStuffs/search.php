<?php 

	  $name=$_POST['name']; 
$link = mysqli_connect("localhost", "root", "", "product") or die ('I cannot connect to the database  because: ' . mysql_error());
$query = "SELECT * FROM `product` WHERE `name` LIKE '%".$name."%'";
$result=mysql_query($query) or die('failed');
while($fieldInfo = mysqli_fetch_field($result))
{
 echo "<ul>\n"; 
      echo "<li>" . "<a  href=\"search.php\">"   .$name . "</a></li>\n"; 
      echo "</ul>";
}


          ?> 
