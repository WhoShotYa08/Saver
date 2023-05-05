<?php 
        function validateUserInput($Input){
            $Input = trim($Input);
            $Input = stripslashes($Input);
            $Input = htmlspecialchars($Input);
            return $Input;
        }
?>