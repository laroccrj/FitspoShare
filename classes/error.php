<?php
    
    class Error {
        
        function checkError($form, $field){
            if(ISSET($_SESSION["errors"][$form][$field]["error"]))
                echo '<span style="color:#FF0000">'.$_SESSION["errors"][$form][$field]["error"].'</span>';
        }
        
        function checkValue($form, $field){
            if(ISSET($_SESSION["errors"][$form][$field]["value"]))
                echo $_SESSION["errors"][$form][$field]["value"];
        }
        
    }