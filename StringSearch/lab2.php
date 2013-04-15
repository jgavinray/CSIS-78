<?php
$myArray = array("Gavin", "Carlos", "Thomas", "Anna");
//$serchName = "Thomas";
$searchName = $_POST['nameFromHTML'];
$i = 0;
$found = true;
foreach($myArray as $element)
{
  
    if ($element === $searchName)
    {
        echo "<h2>Found name in index ".$i."</h2>";
        $found = true;
        break 1;
    }
    else
    {   

        $found = false;
    }
    $i++;   
}
if ($found == false)
    echo "name not fond";
?>