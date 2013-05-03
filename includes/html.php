<?php
//  Written by J. Gavin Ray on 4/15/13
class HTML
{
    

    public function __construct() 
        {
        echo "<DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
        echo "<link rel='stylesheet' href='./CSS/Axiom.css'>";
        echo "<title>Team Axiom's Live Inventory System</title>";
        echo "<body>";


        }
        
    public function endHtml()
        {
        echo "</body>";
        echo "</html>";
        }
}
?>
