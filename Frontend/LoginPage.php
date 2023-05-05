<?php 
    include "loginfile.php";
    include "forgotPassword.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="LoginPage.css">
</head>
<body>
    <!-- Background Shape -->
    <svg class="BackgroundShape" height="640" width="1280">
        <polygon id="SideTriangle" points="0, 0 1300, 645 0, 645"/>
    </svg>

    <section>
        <!-- Login Box -->
        <div class="login-box">     
            <form action="loginfile.php" method="post" >
                <h2>Login</h2>
                

                <p id="incorrectLogin"> <?php $incorrectDetails; ?> </p>
                <!-- Input Box (Email) -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required placeholder="Email" name="loginEmail">
                    <!-- <label>Email</label> -->
                </div>

                <!-- Input Box (Password) -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required placeholder="Password" name="loginPassword">
                    <!-- <label>Password</label> -->
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="forgot-password">
                    <label><input type="checkbox">Remember me</label>
                    <span><a href="#" onclick="(popUp())">Forgot Password?</a></span>
                </div>

                <!-- Login Button -->
                <button id="login" name="submitLogin">Login</button>

                <!-- Register Link -->
                <div class="register-link">
                    <p>Don't have an account? <a href="SignUpPage.php">Register here</a></p>
                </div>
            </form>
        </div>
        <!-- Forgot password pop up -->
        <div id="forgotPopUp">
            <input type="button" id="cancelButton" value="X" onclick="popDown()">
            <form action="forgotPassword.php" method="post">
                <!-- Input Box (Email) -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required placeholder="Email" name="forgotEmailInput">
                    <!-- <label>Email</label> -->
                </div>
                <button id="resetPassword" name="resetPassword">Reset password</button>
    
                <!-- Login Button -->
                <!-- <button>Send OTP</button> -->
            </form>
        </div>
    </section>
    </div>


    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
