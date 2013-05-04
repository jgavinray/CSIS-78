!<DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel='stylesheet' href="./CSS/Axiom.css">
        <title></title>
    </head>
    <body>
        <p align="center"><b>Passing Name</b></p>
        The purpose of this simple program/form is to pass data from here 
        to another page to be used as a variable.  In this example its just passing a name
        into the next page so that PHP can capture the variable and display it on the next
        web page.<p>
        
       <form name ="lab" Method ="POST" action ="lab2.php">
           <label> First Name: </label> <input type ="text" name ="firstName"> <br>
           <label> Last Name: </label> <input type ="text" name ="lastName"> <br>
           <input  type="image" src="./graphics/loginButton.png" name="loginButton" width="150" height="60" value="Pass Name">
        
    </body>
</html>
