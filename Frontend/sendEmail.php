<?php 
    include "dBConnection.php";
    include "Saver/vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp-relay.sendinblue.com";
    $mail->SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "toj9934@gmail.com";
    $mail->Password = "teamofjohn";

    $fromEmail = "toj9934@gmail.com";
    $mail->setFrom($fromEmail, "Team of John");
    $mail->addAddress($emailAddress, $name);

    $mail->Subject = "Complete Verification From TEAM OF JOHN";
    $mail->Body = $otpCode;

    $mail->send();
?>