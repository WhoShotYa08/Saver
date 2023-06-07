<?php 
    session_start();


    //including file databaseCreation.php to get connection to database
    include "databaseCreation.php";
    $currentEmail = $_SESSION["userEmail"];
    $password = $confirmPassword = "";

    $passwordChangeSuccess = "You have successfully changed your password. You can now ogin using your new password";
    $incorrectDetails = "Make sure your passwords match";

    //geting values from textbox
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $password = $_POST["EnterPassword"];
        $confirmPassword = $_POST["ConfirmPassword"];

        changePassword($createConnection, $currentEmail, $password, $confirmPassword, $passwordChangeSuccess, $incorrectDetails);
    }

    function changePassword($createConnection, $currentEmail, $password, $confirmPassword, $passwordChangeSuccess, $incorrectDetails){
        if( $password == $confirmPassword ){
            header("Location: LoginPage.php");

            $encryptedChangePassword = password_hash($password, PASSWORD_DEFAULT);
            //updating password in database
            $updatePassword = "UPDATE signUp_details SET userPassword = '$encryptedChangePassword' WHERE emailAddress='$currentEmail'";
            mysqli_query($createConnection, $updatePassword);

            echo "<p class='changePassword' > $passwordChangeSuccess </p>";
            exit();
        }
        else{
            header("Location: changePassword.php");
            // echo $incorrectDetails;
            echo "wrong password";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <script src="login.js" defer></script> -->
    <!-- <script src="hidetag.js"></script> -->
    <link rel="stylesheet" href="LoginPage.css">
</head>
<body>
    <style>
            @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }
    </style>

    <header>
        <nav>
            <a href="./Welcome_page.html" class="icons" id="logo"><img src="./1678467425782-thumbnail 1.jpg" alt="LOGO" style="height: 3.5em"></a>
        </nav>
    </header>

    <section>
        <!-- Login Box -->
        <div class="login-box"  style="animation: fadeIn 1s ease;">     
            <form action="changePassword.php" method="post" >
                <h2>Change Password</h2>
                

                <p id="incorrectLogin"> <?php  $incorrectDetails; ?> </p>
                <!-- Input Box (Email) -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required placeholder="Password" name="EnterPassword" id="EnterPassword">
                    <!-- <label>Email</label> -->
                </div>


                <!-- Input Box (Password) -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required placeholder="Confirm Password" name="ConfirmPassword" id="ConfirmPassword">
                    <!-- <label>Password</label> -->
                </div>


                <button id="login" name="changePassword">Submit</button>

            </form>
        </div>

    </section>
    </div>


    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
