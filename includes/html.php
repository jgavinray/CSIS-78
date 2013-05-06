<?php
//  Written by J. Gavin Ray on 4/15/13
//  Updated by J. Gavin Ray on 5/5/13
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
        echo "<link rel='stylesheet' href='" . $cssFile . "'>\n";
        echo "<title>Team Axiom's Live Inventory System</title>";
        echo "<body>";
        
     }
    
    public function navigationBar()
    {
        echo '<div class="navigation">'."Sort By<br><br>";
        echo "Time<br><br>";
        echo "<select>";
        echo "\t<option>Choose Day:</option>\n";
        echo "\t<option>Monday</option>\n";
        echo "\t<option>Tuesday</option>\n";
        echo "\t<option>Wednesday</option>\n";
        echo "\t<option>Thursday</option>\n";
        echo "\t<option>Friday</option>\n";
        echo "\t<option>Saturday</option>\n";
        echo "\t<option>Sunday</option>\n";
        echo "</select><br><br>\n";
        echo "Show All<br><br>";
        echo "Lot Search<br><br>";
        echo "Name Search<br><br>";
        echo "</div>\n";
    }

    public function adminBar()
    {
        echo "Welcome Back <i>".$_SESSION['firstName']." ".$_SESSION['lastName']."</i>! ";
        echo '<a href="logout.php" target="_blank">Logout</a><br><br>';
        echo '<div class="topbar">';
        echo '</div>';
        
    }
    
    public function startContent()
    {
        echo '<div class="content">';
    }
    
    public function endContent()
    {
        echo '</div>'; 
    }
    
//  By J. Gavin Ray on 5/5/13 -- Needs testing.
/*
    public function queryAllProductDatabase()
    {
        $link = mysqli_connect("localhost", "root", "", "product");
        if ($result = mysqli_query($link, "SELECT * FROM productDetails")) 
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
    }
*/    
    public function endHtml()
    {
        echo "</body>";
        echo "</html>";
    }
}
?>
