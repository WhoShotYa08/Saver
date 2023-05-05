<?php 
    //OPEN FORGOTPASSOWRDOTP AND FIGURE OUT A WAY TO BRING THE EMAIL VARIABLE FROM FORGOTPASSWORD
    //NB --------- NB -------------NB  NB -------------NB  NB -------------NB NB -------------NB

        session_start();
        include "validateInput.php";
        include "databaseCreation.php";
        // include "forgotPassword.php";
        $wrongOTP = "Invalid pin, please try again";
        $emailAddress = $_SESSION["userEmail"];
        function checkOTP($createConnection, $wrongOTP, $emailAddress){
            $otp = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $otp = validateUserInput($_POST["otp"]);
                $getOTP = "SELECT * FROM signUp_details WHERE  emailAddress='$emailAddress'";
                $runQuery = mysqli_query($createConnection, $getOTP);

                $results = mysqli_fetch_assoc($runQuery);
                $otpCode = $results["otp"];

                if($otp == $otpCode){

                    $updateOTP = "UPDATE signUp_details SET otp=00000 WHERE emailAddress='$emailAddress'";
                    mysqli_query($createConnection, $updateOTP);
                    header("Location: changePassword.php");
                    exit();
                }
                else{
                    $wrongOTP;
                }
            }
        }

        if(  isset($_POST["pwOTP"]) == true  ){
            checkOTP($createConnection, $wrongOTP, $emailAddress);
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./OTP.css">
</head>
<body>

    <form action="forgotPasswordOTP.php" method="POST">
        <div class="container">
            <div id="phone_icon"><ion-icon name="phone-portrait-outline"></ion-icon></div><br>
            <h2>Verification</h2><br>
            <p> <?php $wrongOTP; ?> </p>
            <p>Enter <b>OTP code</b> sent to your number:</p><br>
            <input type="password" id="otp_code" placeholder="Enter OTP here" name="otp"><br>
            <p><?php //echo $invalidOTP;?></p>
            <button name="pwOTP"><a href=""><b>Verify</b></a></button>
        </div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>