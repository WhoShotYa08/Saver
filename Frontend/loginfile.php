<?php 
    session_start();
    include "databaseCreation.php";
    include "validateInput.php";

    echo "<br>";
    $loginEmail = $loginPassword = "";
    $notRegistered = "You are not a registered user, Please sign up";
    $notVerified = "Your account has not been verified.";
    $incorrectDetails = "Incorrect login details. Please try again";
    $error;

    

    function login($loginEmail, $loginPassword, $notRegistered, $createConnection, $notVerified, $incorrectDetails, $error ){
        if( $_SERVER['REQUEST_METHOD']  == 'POST' ){

            //Getting Form Data
            $emailAddress = validateUserInput($_POST["loginEmail"]);
            $loginPassword = validateUserInput($_POST["loginPassword"]);
    
            //get login values from database
            $getEmailAddress = "SELECT emailAddress, userPassword, verified FROM signUp_details WHERE emailAddress='$emailAddress'";
            
    
            //run query
            $runEmail = mysqli_query($createConnection, $getEmailAddress);

    
            $checkEmailAvailability = mysqli_num_rows($runEmail);
            

            //storing results in associative array
            $results = mysqli_fetch_assoc($runEmail);
            if($results == 0){
                // header("Location: LoginPage.php");
                $error = $notRegistered;
                header("Location: SignUpPage.php?error=" . urlencode($error));
                exit();
            }
            $email = $results["emailAddress"];
            $password = $results["userPassword"];
            $verified = $results["verified"];
            

            // password_verify($loginPassword, $password);
    
            if($checkEmailAvailability>0){
                if( $emailAddress == $email && password_verify($loginPassword, $password) && $verified == true ){
                    $_SESSION["loginEmail"] = $emailAddress;
                    $_SESSION["loginPassword"] = $loginPassword;
                    header("Location: pnp.php");
                    exit();
                }
                elseif($emailAddress == $email && password_verify($loginPassword, $password) && $verified == false ){
                    // header("Location: OTP.php");
                    $error = "Your account is not verified, please enter the OTP sent to your email";
                    $otpCode = rand(10000, 99999);
                    $updateOTP = "UPDATE signUp_details SET otp = '$otpCode' WHERE emailAddress = '$emailAddress'";
                    mysqli_query($createConnection, $updateOTP);
                    include "sendEmail.php";
                    $error = "You are a registered user, please login";
                    header("Location: OTP.php?error=" . urlencode($error));
                    exit();
                }
                elseif( ($emailAddress == $email && !password_verify($loginPassword, $password) && $verified == true) || ($emailAddress != $email && password_verify($loginPassword, $password) && $verified == true ) ){
                    
                    $error =  "Incorrect login details. Please try again";
                    echo '<script>
                    window.onload = function() {
                        var errorRepo = document.getElementById("errorRepo");
                        errorRepo.innerText = "'. $error .'";
                        };
                    </script>';
                    
                    // exit();
                }
                elseif($emailAddress == $email && !password_verify($loginPassword, $password) && $verified == true){
                    // header("Location: LoginPage.php");
                    $error = "Password is incorrect";
                    echo '<script>
                    window.onload = function() {
                        var errorRepo = document.getElementById("errorRepo");
                        errorRepo.innerText = "'. $error .'";
                        };
                    </script>';
                    exit();
                }

            }
            // elseif($checkEmailAvailability==0){
                
            // }
        }
    }

    if(  isset($_POST["submitLogin"]) == true  ){
        login($loginEmail, $loginPassword, $notRegistered, $createConnection, $notVerified, $incorrectDetails, $error );
    }
    
    
?>