<?php 
    session_start();
    include "databaseCreation.php";
    include "validateInput.php";

    // function validateUserInput($Input){
    //     $Input = trim($Input);
    //     $Input = stripslashes($Input);
    //     $Input = htmlspecialchars($Input);
    //     return $Input;
    // }

    // echo $_SERVER["REQUEST_METHOD"];

    echo "<br>";
    $loginEmail = $loginPassword = "";
    $notRegistered = "You are not a registered user, Please sign up";
    $notVerified = "Your account has not been verified.";
    $incorrectDetails = "Incorrect login details. Please try again";
    function login($loginEmail, $loginPassword, $notRegistered, $createConnection, $notVerified, $incorrectDetails ){
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

            $email = $results["emailAddress"];
            $password = $results["userPassword"];
            $verified = $results["verified"];

            // password_verify($loginPassword, $password);
    
            if($checkEmailAvailability>0){
                if( $emailAddress == $email && password_verify($loginPassword, $password) && $verified == true ){
                    $_SESSION["loginEmail"] = $emailAddress;
                    $_SESSION["loginPassword"] = $loginPassword;
                    header("Location: pnp.php");
                    // header("Location:Saver/groceryList.php");
                    exit();
                }
                elseif($emailAddress == $email && password_verify($loginPassword, $password) && $verified == false ){
                    header("Location: OTP.php");
                    $otpCode = rand(10000, 99999);
                    $updateOTP = "UPDATE signUp_details SET otp = '$otpCode' WHERE emailAddress = '$emailAddress'";
                    mysqli_query($createConnection, $updateOTP);
                    include "sendEmail.php";
                    $notVerified;
                    exit();
                }
                elseif( ($emailAddress == $email && password_verify($loginPassword, $password) && $verified == true) || ($emailAddress != $email && $loginPassword == $password && $verified == true ) ){
                    echo $incorrectDetails;
                    header("Location: LoginPage.php");
                    exit();
                }

            }
            else{
                $notRegistered;
                header("Location: SignUpPage.php");
            }
        }
    }

    if(  isset($_POST["submitLogin"]) == true  ){
        login($loginEmail, $loginPassword, $notRegistered, $createConnection, $notVerified, $incorrectDetails );
    }
    
?>