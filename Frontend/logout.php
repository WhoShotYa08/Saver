<?php 

    function logOut(){
        if(session_status() == PHP_SESSION_ACTIVE){
            session_destroy();
            header("Location: LoginPage.php");
            exit();
        }
    }

    if(isset($_POST["LogoutButton"])  == true){
        logOut();
    }
?>