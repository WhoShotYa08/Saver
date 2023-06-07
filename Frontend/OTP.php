<?php 
    // session_start();
    include "dBConnection.php";
    include "logout.php";
    $otp ="";
    $invalidOTP = "Please Enter valid OTP";
    $accVerified = "Your Account has been verified, you may now login";

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $otp = $_POST["otp"];
        $intOTP = (int)$otp;
        // $emailAddress = $_POST["email"];
        // echo $_SESSION["email"];
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
                $updateBool1 = mysqli_query($createConnection, $updateBool);
                $updateOTP1 = mysqli_query($createConnection, $updateOTP);
                if($updateBool1 == true && $updateOTP1 == true){
                    $error =  $accVerified;
                    header("Location: LoginPage.php?error=" . urlencode($error));
                    exit();
                }
                else{
                    $error =  "<p>Data not inserted</p>";
                    echo '<script>
                        window.onload = function() {
                            var errorRepo = document.getElementById("errorRepo");
                            errorRepo.innerText = "'. $error .'";
                        };
                    </script>';
                }

            }
            else{
                $error =  $invalidOTP;
                echo '<script>
                    window.onload = function() {
                        var errorRepo = document.getElementById("errorRepo");
                        errorRepo.innerText = "'. $error .'";
                    };
                </script>';
            }
        }
        else{
            $error =  "Error";
            echo '<script>
                window.onload = function() {
                    var errorRepo = document.getElementById("errorRepo");
                    errorRepo.innerText = "'. $error .'";
                };
            </script>';
        }


        if(isset($_POST["resendEmail"])){
            $otpCode = rand(10000, 99999);
            
            $updateNewOTP = "UPDATE `signup_details` SET `otp`='$otpCode' WHERE emailAddress = '$emailAddress'";
            include "sendEmail.php";
            mysqli_query($createConnection, $updateNewOTP);
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
    
    <style>
        .container {
    /* ...existing styles... */
    opacity: 0; /* Set initial opacity to 0 */
    animation: fade-in 3s forwards; /* Apply the fade-in animation */
}

@keyframes fade-in {
    0% {
        opacity: 0; /* Start with opacity 0 */
    }
    100% {
        opacity: 1; /* End with opacity 1 */
    }
}

    </style>
</head>
<body>

    <form action="" method="POST">
        <div class="container">
            <div id="phone_icon"><ion-icon name="phone-portrait-outline"></ion-icon></div><br>
            <h2>Verification</h2><br>
            <p>Enter <b>OTP code</b> sent to your number:</p><br>
            <input type="password" id="otp_code" placeholder="Enter OTP here" name="otp"><br>
            <p id="errorRepo"></p>
            <button name="submitOTP"><a href="LoginPage.php"><b>Verify</b></a></button><br><br>
             <button id="resendEmail" name="resendEmail" style="width: 10em;">Resend Email</button>
            <br>
        </div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>