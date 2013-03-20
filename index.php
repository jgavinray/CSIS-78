<DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel='stylesheet' href="./CSS/Axiom.css">
        <title>Team Axiom's Live Inventory System</title>
    </head>
    <body>
<!--
<img class="right" src="http://www.gavwebclass.com/fall2011/jray/gav.gif" alt="Gavilan College Logo" height="91" width="75"> 
-->
        <!--
        <p class="right">

        </p>
      
        <p align="center"><b>Please Enter your Login</b></p>
       -->
 <!--       
        The purpose of this simple program/form is to pass data from here 
        to another page to be used as a variable.  In this example its just passing a name
        into the next page so that PHP can capture the variable and display it on the next
        web page.<p>
 -->       
 
       <form align="center" name ="lab" Method ="POST" action ="login.php">
           <label>Login: </label> <input size="20" type ="text" name ="login"> <br>
           <label> Password: </label> <input type ="text" name ="password"> <br><br><br>          
           <input  type="image" src="./graphics/loginButton.png" name="loginButton" width="200" height="75" value="Pass Name">
          
    </body>
</html>
