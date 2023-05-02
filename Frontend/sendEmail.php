<?php 
    // include "dBConnection.php";
    // include "vendor/autoload.php";
    require_once('vendor/autoload.php');

    use PHPMailer\PHPMailer\PHPMailer;
    function sendMail($otpCode, $emailAddress){
        $mail = new PHPMailer();

        // Set SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp-bobdsw.alwaysdata.net';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'bobdsw@alwaysdata.net';
        $mail->Password = 'connection.php1';
        $mail->SMTPSecure = "tls";

        // Set email content
        $mail->setFrom('toj9934@gmail.com', 'Your Name');
        $mail->addAddress($emailAddress);
        $mail->Subject = 'Your OTP for specials';
        $mail->Body = $otpCode;

        // Send email
        if ($mail->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    }
    sendMail($otpCode, $emailAddress);
    

?>