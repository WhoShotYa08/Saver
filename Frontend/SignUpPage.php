<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="SignUpPage.css" />
    <script src="password.js" defer></script>
  </head>
  <body>
    <!-- SVG element to create a background shape -->
    <svg class="BackgroundShape" height="640" width="1280">
      <polygon id="SideTriangle" points="0, 0 1300, 645 0, 645"/>
  </svg>
  <!-- Sign-up form -->
  <div class="signup-box">     
    <form action="dBConnection.php" method="POST" >
      <!-- Heading for signup field -->
      <h2>Sign-Up</h2>
        
      <p> <?php $notRegistered; ?> </p>
      <!-- Full name input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="text" required placeholder="First Name" name="name">
          <!-- <label for="">Full name</label> -->
          
      </div>

      <!-- Surname input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="text" required placeholder="Surname" name="surname">
          <!-- <label for="">Surname</label> -->
      </div>

      <!-- Email address input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
          <input type="email" required placeholder="Email Address" name="email">
          <!-- <label for="">Email Address</label> -->
      </div>
      <!-- Cellphone number input field -->
      <div class="input-box">
        <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
        <input type="number" required placeholder="Phone Number" name="cellNumber">
      <!-- <label for="">Cellphone Number</label> -->
    </div>

    <!-- Password input field -->
    <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" required placeholder="Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" requird>
        <!-- <label for="">Password</label> -->

    </div>

    <div id="validators">
      <p id="capital" class="wrong">Uppercase letter</p>
      <p id="lower" class="wrong">Lowercase letter</p>
      <p id="miniChar" class="wrong">Minimum 8 characters</p>
      <p id="number" class="wrong">Number</p>
    </div>
      <!-- Confirm password input field -->
      <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" required placeholder="Confirm Password" name="confirmPassword" required>
        <!-- <label for="">Confirm Password</label> -->
    </div>



    <!-- Terms and Conditions checkbox -->
    <div class="Ts_Cs">
        <label for=""><input type="checkbox">I accept the <a href="Ts_Cs.html">Terms and Conditions</a></label>
        <!-- <p><?php //echo $error;?></p> -->
    </div>
    
    <!-- Sign-up button -->
    <button name="signUp" id="signUp"><a >Sign-Up</a> </button>
    <!-- Login page link -->
    <div class="loginPage-link">
        <p>Already have an account? <a href="LoginPage.php">Login here</a></p>
    </div>
    </form>
  </div>
   <!-- Ionicons script to display icons in input fields -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

  <?php 
    include "dBConnection.php";
    
  ?>
  </body>
</html>
