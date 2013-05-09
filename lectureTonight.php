<?php

// file_get_contents()

//<?php
//$homepage = file_get_contents('http://www.example.com/');
//echo "$homepage";
//? >


// file_put_contents()





// file_exists()
/*
    <?php
    
        $tempfilename = $_SERVER['DOCUMENT_ROOT'].'/recentjokes/tempindex.html';
    
        if(file_exists($tempfilename))
        {
            unlink($tempfilename);
        }
    
    ?>
 
 */



// Copy()


//<?php
//    echo copy("source.txt", "target.txt");
// ? >


// Unlink()


//<?php
//    unlink($filename);
// ? >

// Read a file line by line

// $file = fopen("welcome.txt", "r") or exit("Unable to open file!");
// Output a line of the file until the end is reached
// while(!feof($file))
//{
//echo fgets($file)."<br>";
//}
//fclose($file);


// substr
// trim

// explode

// list($substr1, $substr2) = explode($delimiter, $string);

//list($string1, $string2, $string3, $string4, $string5) = explode(" ", $name);

/*
get file
while{
read it line by line until EOF
filter out chars
explode line
save line to db
}
*/
?>
<form action="index.php" method="post" enctype="multipart/form-data">
  <div><label for="upload">Select file to upload:
    <input type="file" id="upload" name="upload"></label></div>
  <div>
    <input type="hidden" name="action" value="upload">
    <input type="submit" value="Submit">
  </div>
</form>