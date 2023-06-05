<?php 
    include "loginfile.php";
    include "forgotPassword.php";
    // include "facebookLogin.php";
    // include "logout.php";
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
    <script src="https://kit.fontawesome.com/6e07084945.js" crossorigin="anonymous"></script>
</head>
<body>

    <section>
        <!-- Login Box -->
        <div class="login-box">     
            <form action="" method="post" >
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
                <p>Or</p><br>
            </form>
            <form >
                <div class="login-with">
                        <button class="google-btn"><i class="fa-brands fa-google" id="google-icon" style="color: #000000;"></i>Login with google</button><br><br>
                        <button class="facebook-btn" onclick="logIn"><i class="fa-brands fa-facebook-f" id="facebook-icon" style="color: #000000;"></i>Login with facebook</button>
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
                <button name="LogoutButton" class="edit1" style="height: 40px; width:80px; background-color:red; border-radius:10px; border:none; font-weight:bold">Logout</button>
            </form>
        </div>
    </section>
    </div>
    <script>
            function logIn(){
                FB.login(function (response){
                    console.log(response);
                })
            }
        window.fbAsyncInit = function() {
            FB.init({
            appId            : '639342924737059',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v17.0'
            });
        };


</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
