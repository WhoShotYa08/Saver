<?php 
    // include "dBConnection.php";
    // include "vendor/autoload.php";
    require_once('vendor/autoload.php');
    echo "";

    use PHPMailer\PHPMailer\PHPMailer;
    function sendMail($otpCode, $emailAddress){
        $mail = new PHPMailer();

        // Set SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp-specials4u.alwaysdata.net';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'specials4u@alwaysdata.net';
        $mail->Password = 'teamofjohn2023';
        $mail->SMTPSecure = "tls";

        // Set email content
        $mail->setFrom('toj9934@gmail.com', 'Specials4U');
        $mail->addAddress($emailAddress);
        $mail->Subject = 'Your OTP for specials';
        $mail->Body = "Please enter this One Time Pin at Specials4U to verify your account: $otpCode ";

        // Send email
        if ($mail->send()) {
            echo '';
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    }
    sendMail($otpCode, $emailAddress);
    

?>