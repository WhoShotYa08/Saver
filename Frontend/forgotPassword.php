<?php 
    include "databaseCreation.php";
    $notRegUser = "You are not registered, please sign up";
    function forgotPassword($createConnection, $notRegUser){
        $emailAddress = "";
        if( $_SERVER["REQUEST_METHOD"] == "post" ){
            $emailAddress = $_POST["forgotEmailInput"];

            //run query to check if user is registered or not
            $checkEmail = "SELECT emailAddress FROM signUp_details WHERE emailAddress='$emailAddress'";
            $runEmailQuery = mysqli_query($createConnection, $checkEmail);
            $rowCheck = mysqli_num_rows($runEmailQuery);

            if( $rowCheck == 0 ){
                header("Location: SignUpPage.php");
                echo "<p id='errormsg'>".$notRegUser."</p>";
                exit();
            }
            else{
                
            }
        }
        
    }
?>