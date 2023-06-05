<?php 
    // session_start();
    include "dBConnection.php";
    include "logout.php";
    $otp ="";
    $invalidOTP = "Please Enter valid OTP";
    $accVerified = "Your Account has been verified, you may now login";
    // $emailAddress = "";

    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $otp = $_POST["otp"];
        $intOTP = (int)$otp;
        // $emailAddress = $_POST["email"];
        echo $_SESSION["email"];
        verifyOTP($intOTP, $invalidOTP, $createConnection, $_SESSION["email"], $accVerified, $otpCode);
    }
    function verifyOTP($intOTP, $invalidOTP, $createConnection, $emailAddress, $accVerified, $otpCode){
        $getOTP = "SELECT `otp` FROM `signUp_details` WHERE `emailAddress` = '$emailAddress'";

        $runOTP = mysqli_query($createConnection, $getOTP);
        if($runOTP && mysqli_num_rows($runOTP) > 0){
            $numRows = mysqli_fetch_assoc($runOTP);
            $otpKey = $numRows["otp"];
            if($intOTP == $otpKey){
                $updateBool = "UPDATE signUp_details SET verified = true WHERE emailAddress = '$emailAddress'";
                $updateOTP = "UPDATE signUp_details SET otp = 00000 WHERE emailAddress = '$emailAddress'";
                mysqli_query($createConnection, $updateBool);
                mysqli_query($createConnection, $updateOTP);
                echo  $accVerified;
                header("Location: LoginPage.php");
                exit();
            }
            else{
                echo $invalidOTP;
            }
        }
        else{
            echo "Error";
        }
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

    <form action="" method="POST">
        <div class="container">
            <div id="phone_icon"><ion-icon name="phone-portrait-outline"></ion-icon></div><br>
            <h2>Verification</h2><br>
            <p> <?php $notVerified; ?> </p>
            <p>Enter <b>OTP code</b> sent to your number:</p><br>
            <input type="password" id="otp_code" placeholder="Enter OTP here" name="otp"><br>
            <p><?php echo $invalidOTP;?></p>
            <button name="submitOTP"><a href="LoginPage.php"><b>Verify</b></a></button>
            <br>
        </div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>