<?php 
    
    include "loginfile.php";
    include "forgotPassword.php"; 
    // include "facebookLogin.php";
    // include "logout.php";
    if(isset($_POST["userID"])){
        $_SESSION["userID"] = $_POST["userID"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["first_name"] = $_POST["first_name"];
        $_SESSION["last_name"] = $_POST["last_name"];

        $firstName = $_SESSION["first_name"];
        $lastName = $_SESSION["last_name"];
        $email = $_SESSION["email"];
        $insertFbDetails = "INSERT INTO `signup_details`(`firstName`, `lastName`, `emailAddress`) VALUES ('$firstName', '$lastName', '$email')";
        mysqli_query($createConnection, $insertFbDetails);

        exit("Success");
    }

    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo '<script>
          window.onload = function() {
              var errorRepo = document.getElementById("errorRepo");
              errorRepo.innerText = "'. $error .'";
          };
      </script>';
  }
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
      <a href="./Welcome_page.html" class="icons" id="logo"><img src="./1678467425782-thumbnail 1.jpg" alt="LOGO" style="height: 3em"></a>
      </nav>
    </header>

    <section>
        <!-- Login Box -->
        <div class="login-box"  style="animation: fadeIn 1s ease;">     
            <form action="" method="post" >
                <h2>Login</h2>
                <p id="errorRepo"></p>
                <p><?php $error ?></p>
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
                        
                        <button class="facebook-btn" onclick="logIn()"><i class="fa-brands fa-facebook-f" id="facebook-icon" style="color: #000000;"></i>Login with facebook</button>
                </div>
            </form>
        </div>
        <!-- Forgot password pop up -->
        
        <div id="forgotPopUp">
            
            <input type="button" id="cancelButton" value="X" onclick="popDown()">
            <form action="" method="post">
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
    <script>
            var user = { userID: "", name: "", accessToken: "", first_name: "", last_name: "", email: "" };
      function logIn() {
        FB.login(function (response) {
          if (response.status === "connected") {
            user.userID = response.authResponse.userID;
            user.accessToken = response.authResponse.accessToken;
            
            FB.api("/me?fields=id,email,first_name,last_name", function (userData) {
              user.name = userData.name;
              user.email = userData.email;
              user.first_name = userData.first_name;
              user.last_name = userData.last_name;

              $.ajax({
                url: "LoginPage.php",
                method: "post",
                dataType: "text",
                success: function (serverResponse) {
                  if (serverResponse == "success") {
                    window.location = "profile.php";
                  }
                }
              });
            });
          }
        }, { scope: "email,public_profile" });
      }
      window.fbAsyncInit = function () {
        FB.init({
          appId: '639342924737059',
          autoLogAppEvents: true,
          xfbml: true,
          version: 'v17.0'
        });
      };
      //end of facebook login

</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
