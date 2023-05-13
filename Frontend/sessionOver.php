<?php 
    function sessionOver(){
        if(empty($_SESSION["loginEmail"])){
            header("Location: LoginPage.php");
            exit();
        }
    }
    sessionOver();
?>