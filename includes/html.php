<?php
//  Written by J. Gavin Ray on 4/15/13
//  Updated by J. Gavin Ray on 5/18/13
class HTML
{
    

    public function __construct() 
    {
        
        if (!isset($_SESSION)) 
        {
          session_start();
        }
        
        if (!isset($_SESSION['isLoggedIn'])) 
        {
            header("Location: ./");
        }
        
        $cssFile = "./CSS/Axiom.css";
        
        echo "<DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
        echo "<link rel='stylesheet' href='" . $cssFile . "'>";
        echo "<title>Team Axiom's Live Inventory System</title>";
        echo "<body>";
        
     }
    
    public function navigationBar()
    {
        echo '<div class="navigation">';
        echo "Sort By<br><br>";
        /*
        echo "Time<br><br>";
        
        echo '<form  method="get" action="search.php"  id="searchform">'; 
        echo "<select name='dweek'>";
        echo "<option>Choose Day:</option>\n";
        echo "<option value='1'>Monday</option>\n";
        echo "<option value='2'>Tuesday</option>\n";
        echo "<option value='3'>Wednesday</option>\n";
        echo "<option value='4'>Thursday</option>\n";
        echo "<option value='5'>Friday</option>\n";
        echo "<option value='6'>Saturday</option>\n";
        echo "<option value='7'>Sunday</option>\n";
        echo "</select><br><br>\n";
        echo '<input  type="submit" name="submit" value="Search"></form> ';
*/
        echo '<form  method="get" action="search.php"  id="searchform"> 
	 
	      <input  type="submit" name="all" value="Show All"> 
	    </form> ';
        //echo "Show All<br><br>";
        /*
        echo "Lot Search<br><br>";
        echo "Name Search<br><br>";
        */
        /*
        echo "Date Search<br><br>";
        echo '<form  method="get" action="search.php"  id="searchform"> 
	      <input  type="text" name="date"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> ';
        */
        echo "Lot Search<br><br>";
        echo '<form  method="get" action="search.php"  id="searchform"> 
                  <input  type="text" name="lot"> 
                  <input  type="submit" name="submit" value="Search"> 
                </form> ';

        echo "Name Search<br><br>";
        echo '<form  method="get" action="search.php"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> ';

        echo '<a href="logout.php">Logout</a><br><br>';
        echo "</div>\n";
    }

    public function adminBar()
    {
        if ($_SESSION['isAdmin'] < 1)
        {
            echo "";
        }
        else
        {
        //echo '<div=class ".speclink">';
        echo "<table align=center border=1>\n<tr>";
        echo '<td><a href="importFile.php">Import File</td>';
        echo '<td><a href="addProduct.php">Input Data</a></td>';
//        echo '<td><a href="manageTables.php">Manage Tables</a></td>';
//        echo '<td><a href="showUsers.php">Show Users</a></td>';
        echo '<td><a href="showUsers.php">Manage Users</a></td>';
        echo '<td><a href="exportPDF.php">Export Displayed Data</td>';
        echo "</tr>\n</table>";
        echo "<br>";
        //echo "</div>";
        echo '<div class="topbar">';
        echo '</div>';
        }
        
    }
    
    public function startContent()
    {
        echo '<div class="content">';
        echo "Logged in as: <i>".$_SESSION['firstName']." ".$_SESSION['lastName']."</i>.<br> ";
    
    }
    
    public function endContent()
    {
        echo '</div>'; 
    }

    public function connectToProductDatabase()
    {
        $link = mysqli_connect("localhost", "root", "", "product");
        
        if (mysqli_connect_errno()) 
        {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

    }
    
    public function connectToUsersDatabase()
    {
        $link = mysqli_connect("localhost", "root", "", "user");
        
        if (mysqli_connect_errno()) 
        {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

    }

//  By J. Gavin Ray on 5/5/13 -- Needs testing.

    public function queryAllProductDatabase()
    {
        $_SESSION['currentDB'] = "product";
        $link = mysqli_connect("localhost", "root", "", "product");
        $query = "SELECT * FROM productDetails";
        $_SESSION['currentQuery'] = $query;
        if ($result = mysqli_query($link, $query)) 
        {
        
            $info = mysqli_fetch_array($result);
            $howManyFieldsInDatabase = mysqli_num_fields($result);
    
    
            printf("<p><table border=1>\n<tr>");
   
            while ($fieldInfo = mysqli_fetch_field($result)) 
            {

                printf("<td>%s</td>\n", $fieldInfo->name);

            }
     
        // free result set
        mysqli_free_result($result);
        
        
        }
        
        else
            printf("<br>Failure selecting rows\n");
 
        if (mysqli_multi_query($link, "SELECT * FROM productDetails ORDER BY ID")) 
        {

            do 
            {
        
                // store first result set 
                if ($result = mysqli_use_result($link)) 
                {
                    while ($row = mysqli_fetch_row($result)) 
                    {
                        printf("<tr>\n");
                        for ($i = 0; $i < $howManyFieldsInDatabase; $i++) 
                        {
                            printf("<td>%s</td>", $row[$i]);
                        }
                        printf("\n</tr>\n");
                    }
                    mysqli_free_result($result);
                }
                printf("</table></p>\n");
                // print divider 
                if (mysqli_more_results($link)) 
                {
                    printf("-----------------\n");
                }
            } 
            while (mysqli_next_result($link));
        }
    
        mysqli_close($link);
    }

    public function showAllUsers()
    {
        $_SESSION['currentDB'] = "users";
        $query = "SELECT * FROM userData";
        $_SESSION['currentQuery'] = $query;
        $link = mysqli_connect("localhost", "root", "", "users");
        if ($result = mysqli_query($link, $query)) 
        {
        
            $info = mysqli_fetch_array($result);
            $howManyFieldsInDatabase = mysqli_num_fields($result);
    
    
            printf("<p><table border=1>\n<tr>");
   
            while ($fieldInfo = mysqli_fetch_field($result)) 
            {

                printf("<td>%s</td>\n", $fieldInfo->name);

            }
     
        // free result set
        mysqli_free_result($result);
        
        
        }
        
        else
            printf("<br>Failure selecting rows\n");
 
        if (mysqli_multi_query($link, "SELECT * FROM userData ORDER BY ID")) 
        {

            do 
            {
        
                // store first result set 
                if ($result = mysqli_use_result($link)) 
                {
                    while ($row = mysqli_fetch_row($result)) 
                    {
                        printf("<tr>\n");
                        for ($i = 0; $i < $howManyFieldsInDatabase; $i++) 
                        {
                            printf("<td>%s</td>", $row[$i]);
                        }
                        printf("\n</tr>\n");
                    }
                    mysqli_free_result($result);
                }
                printf("</table></p>\n");
                // print divider 
                if (mysqli_more_results($link)) 
                {
                    printf("-----------------\n");
                }
            } 
            while (mysqli_next_result($link));
        }
    
        mysqli_close($link);
    }
    public function searchForAndEditUsers()
    {
        $_SESSION['workingID'] = $_POST['ID'];
        $ID = $_POST['ID'];
         $link = mysqli_connect("localhost", "root", "", "users");
        if ($result = mysqli_query($link, "SELECT * FROM userData")) 
        {
        
            $info = mysqli_fetch_array($result);
            $howManyFieldsInDatabase = mysqli_num_fields($result);
    
    
            printf("<p><table border=1>\n<tr>");
   
            while ($fieldInfo = mysqli_fetch_field($result)) 
            {

                printf("<td>%s</td>\n", $fieldInfo->name);

            }
     
        // free result set
        mysqli_free_result($result);
        
        
        }
        
        else
            printf("<br>Failure selecting rows\n");
 
        if (mysqli_multi_query($link, "SELECT * FROM userData WHERE `ID` LIKE $ID")) 
        {

            do 
            {
        
                // store first result set 
                if ($result = mysqli_use_result($link)) 
                {
                    while ($row = mysqli_fetch_row($result)) 
                    {
                        printf("<tr>\n");
                        for ($i = 0; $i < $howManyFieldsInDatabase; $i++) 
                        {
                            printf("<td>%s</td>", $row[$i]);
                        }
                        printf("\n</tr>\n");
                    }
                    mysqli_free_result($result);
                }
           
            echo '<form name ="lab" Method ="POST" action ="updateUser.php">';
            echo '<tr><td></td>';
            echo '<td><input type ="text" name ="firstName"></td>';
            echo '<td><input type ="text" name ="lastName"></td>';
            echo '<td><input type ="text" name ="login"></td>';
            echo '<td><input type ="text" name ="password"></td>';
            echo '<td><input type ="text" name ="isAdmin"></td>';
            echo '<td><input type ="text" name ="accountLocked"></td>';
            printf("</table>");
            echo '<input type="Submit" value="Save Changes">';
            echo '</form>';
            printf("</p>\n");
            
            
            
            /*
                    echo '<form name ="lab" Method ="POST" action ="login.php">';
            echo '<tr><td><input type ="text" name ="login"></td></tr>';
            echo '</td></tr><input type ="password" name ="password"></td></tr>';
            echo '<input type="Submit" value="Save Changes">';
         echo '</form></p>';
*/
                // print divider 
                if (mysqli_more_results($link)) 
                {
                    printf("-----------------\n");
                }
            } 
            while (mysqli_next_result($link));
        }
       // }
        /*
        if(isset($_POST['Delete']))
        {
           $delete = $POST['Delete'];
           $query = "DELETE FROM `users`.`userData` WHERE `userData`.`ID` = $delete";
           $link = mysqli_connect("localhost", "root", "", "users");
           mysqli_multi_query($link, $query);
           mysqli_close($link);
           
        }
         */
        mysqli_close($link);
    }

    public function manageUsers()
    {
       echo '<form name="manageUsers" method="POST" action="manageUsers.php">';
       echo '<label>User ID #</label><input type="text" name="ID"/><br/>';
       echo '<input type="submit" name="edit" value="Edit">';
       echo '<input type="submit" name="delete" value="Delete">';
       echo '</form>';
    }
    
    public function importFile()
    {
        echo '<form action="uploadFile.php" method="post" enctype="multipart/form-data">';
        echo '<div><label for="upload">Select file to upload:';
        echo '    <input type="file" id="upload" name="upload"></label></div>';
        echo '  <div>';
        echo '    <input type="hidden" name="action" value="upload">';
        echo '    <input type="submit" value="Submit">';
        echo '  </div>';
        echo '</form>';

    }
    
    public function processUpload()
    {

        if(is_uploaded_file($_FILES['upload']['tmp_name']))
        {
           $DB = new database;
           $file = fopen($_FILES['upload']['tmp_name'], "r");

            while(!feof($file))
           {
                $i = $i + 1;

               list($string1, $string2, $string3, $string4, $string5, $string6) = explode(",", fgets($file));
               $query = "INSERT INTO  `product`.`productDetails` (
        `ID` ,
        `name` ,
        `lot` ,
        `batchSize` ,
        `numberInBatch`,
        `targetWeight`,
        `actualWeight`,
        `dateTime`
        )
        VALUES (
        NULL ,  '$string1',  '$string2',  '$string3',  '$string4', '$string5', '$string6', 'Now'
        );";
                /*
               $i = $i + 1;

               echo "Interation: ".$i."<br>";
               list($string1, $string2, $string3, $string4) = explode(":", fgets($file));
               echo "First Name: ".$string1."<br>";
               echo "Last Name: ".$string2."<br>";
               echo "Email: ".$string3."<br>";
               echo "Phone #: ".$string4."<br><br>";
               $query = "INSERT INTO  `users`.`test` (
        `ID` ,
        `fname` ,
        `lname` ,
        `email` ,
        `phone`
        )
        VALUES (
        NULL ,  '$string1',  '$string2',  '$string3',  '$string4'
        );";
*/
               $DB->doQuery($query);
            }
            echo "File Uploaded<br>";
            echo $i." rows were added to the table.<br>";
            $this->queryAllProductDatabase();
            fclose($file);
        }
        else
            echo "No File Uploaded";
    }
    public function endHtml()
    {
        
        echo "</body>\n";
        echo "</html>\n";
    }
}
?>
