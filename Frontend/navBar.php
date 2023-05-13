<?php
    function navBar($redirect){
       header("Location: $redirect");
       exit();
    }

    if(isset($_GET["urlRedirect"]) == true){
        $redirect = $_GET["urlRedirect"];
        navBar($redirect);
    }

?>