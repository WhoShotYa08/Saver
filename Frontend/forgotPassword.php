<?php 
    include "databaseCreation.php";
    $notRegUser = "You are not registered, please sign up";
    $emailAddress = "";
    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            
        $emailAddress = $_POST["forgotEmailInput"];
        forgotPassword($createConnection, $notRegUser, $emailAddress);

    }
    function forgotPassword($createConnection, $notRegUser, $emailAddress){
            $checkEmail = "SELECT emailAddress FROM signUp_details WHERE emailAddress='$emailAddress'";
            $runEmailQuery = mysqli_query($createConnection, $checkEmail);
            $rowCheck = mysqli_num_rows($runEmailQuery);

            if( $rowCheck > 0 ){
                
                // echo $emailAddress."yes";
                header("Location: forgotPasswordOTP.php");
                $otpCode = rand(10000, 99999);
                $emailAddress;

                session_start();
                $_SESSION["userEmail"] = $emailAddress;
                $updateOTP = "UPDATE signUp_details SET otp = '$otpCode' WHERE emailAddress = '$emailAddress'";
                mysqli_query($createConnection, $updateOTP);
                include "sendEmail.php";
                exit();
            }
            else{
                
                header("Location: LoginPage.php");
                exit();
            }
    }


    // if(isset($_POST["resetPassword"])  == true){
    //     // $_SESSION["userEmail"] = $emailAddress;
    //     forgotPassword($createConnection, $notRegUser, $emailAddress);
        
    // }
?>