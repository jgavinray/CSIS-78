<?php
    $myArray[0] = 'Gavin';
    $myArray[1] = 'John';
    $myArray[2] = 'Luis';
    $myArray[3] = 'Sancho';
    $myArray[4] = 'Ashley';
    $myArray[5] = 'Emiliana';
    $myArray[6] = 'Jeffery Paige';
    
    $checkIfNameIsFound = 0;
    $checkName = $_POST['checkName'];
    
        
    for ($count = 0; $count <= 6; ++$count)
        {
            if ($myArray[$count] == $checkName)
            {
                echo $checkName." was found in element #".$count." in myArray.";
                $checkIfNameIsFound = 1;
            }
                
        }
        if ($checkIfNameIsFound == 0)
        {
            echo $checkName." was not found in the Array.";
        }
        
?>
