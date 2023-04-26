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

    <form action="dBConnection.php" method="post">
        <div class="container">
            <div id="phone_icon"><ion-icon name="phone-portrait-outline"></ion-icon></div><br>
            <h2>Verification</h2><br>
            <p>Enter <b>OTP code</b> sent to your number:</p><br>
            <input type="password" id="otp_code" placeholder="Enter OTP here" name="otp"><br>
            <p><?php //echo $invalidOTP;?></p>
            <!-- <p><?php //echo $success;?></p> -->
            <button name="submitOTP"><a href="#"><b>Verify</b></a></button>
        </div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <?php 
        include "dBConnection.php";
        
        
        $otp = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $otp = $_POST["otp"];

        }
        $invalidOTP = "Please Enter valid OTP";
        function verifyOTP($otp, $invalidOTP, $createConnection, $emailAddress, ){
            $getOTP = "SELECT `otp` FROM `signUp_details`";
            $runOTP = mysqli_query($createConnection, $getOTP);
            if($otp == 00000){
                // if(isset($_POST["submitOTP"]) == true){
                    
                // }
                // else{
                //     echo "<script> $"
                // }
                $invalidOTP;
                
            }
            else{
                if($otp == $runOTP){
                    $verified = "UPDATE `signUp_details` SET `verified`= 'true' WHERE `emailAddress`='$emailAddress'";
                    $setOTP = "UPDATE `signUp_details` SET `otp`= '00000' WHERE `emailAddress`='$emailAddress'";
                    mysqli_query($createConnection, $verified);
                    mysqli_query($createConnection, $setOTP);
                    $success = "You have successfully created your account, you may now login using your credentials";
                }
                else{
                    echo $invalidOTP;
                }
            }
        }
        verifyOTP($otp, $invalidOTP, $createConnection, $emailAddress )
    ?>
</body>
</html>