<?php
        $operand1=$_POST['firstoperand'];
        $operand2=$_POST['secondoperand'];
        $operator=$_POST['operator'];
        $result = 0;
        switch ($operator)
        {
            case "+":
              $result = $operand1 + $operand2;
                echo "<p>Result: ".$result."</p>";
             break;
         case "-":
              $result = $operand1 - $operand2;
             echo "<p>Result: ".$result."</p>"; 
             break;
            case "*":
              $result = $operand1 * $operand2;
             echo "<p>Result: ".$result."</p>"; 
             break;
         case "/":
             if ($operand2 == 0)
             {
                 echo "<p>Cannot divide by 0!</p>";
             }
             else
             {
              $result = $operand1 / $operand2;
             echo "<p>Result: ".$result."</p>";
             }
             break;
         default:
             echo "<p>Sorry, you entered the wrong type of operator! Acceptable Operators are +, -, *, /</p>";
             
        }
?>
    