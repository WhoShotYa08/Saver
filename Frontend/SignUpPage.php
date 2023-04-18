<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="SignUpPage.css" />
  </head>
  <body>
  <?php
      include "validateInput.php";
      include "dBConnection.php";


      echo "<br>";
      $databaseName = "CREATE DATABASE UserDetails";
      
      $selectDB = mysqli_select_db($createConnection, "UserDetails");
      $createTable = "CREATE TABLE signUp_details(
      CustomerID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstName varchar(50) NOT NULL,
      lastName varchar(50) NOT NULL,
      emailAddress varchar(100) NOT NULL,
      cellphoneNum INT(10) NOT NULL,
      userPassword varchar(20) NOT NULL,
      otp INT(5),
      verified BOOLEAN DEFAULT false,
      timeReg TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      )";

      
      $checkUser = "SELECT * FROM signUp_details WHERE emailAddress='$emailAddress'";

      $runcheckUser = mysqli_query($createConnection, $checkUser);
      $rowCheck = mysqli_num_rows($runcheckUser);

      if($rowCheck == 0){
        if($passWord === $confirmPassword){
          $insertUserData = "INSERT INTO 'signUp_details' ('firstName', 'lastName', 'emailAddress', 'cellphoneNum', 'userPassword', 'timeReg' )VALUES('$name', '$surname', '$emailAddress', '$cellphoneNum', '$password')";

          $runInsert = mysqli_query($createConnection,  $insertUserData);
          if($runInsert == true){
            
          }
        }
      }

      
   ?>
    <!-- SVG element to create a background shape -->
    <svg class="BackgroundShape" height="640" width="1280">
      <polygon id="SideTriangle" points="0, 0 1300, 645 0, 645"/>
  </svg>
  <!-- Sign-up form -->
  <div class="signup-box">     
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
      <!-- Heading for signup field -->
      <h2>Sign-Up</h2>
            
      <!-- Full name input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="text" required placeholder="e.g Johnson" name="name" > <span value="<?php echo $nameError ?>"></span>
          <label for="">Full name</label>
      </div>

      <!-- Surname input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="text" required placeholder="e.g Smith" name="surname" value="<?php echo $surnameError ?>">
          <label for="">Surname</label>
      </div>

      <!-- Email address input field -->
      <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
          <input type="email" required placeholder="e.g JohnsonSmith@gmail.com" name="email">
          <label for="">Email Address</label>
      </div>
      <!-- Cellphone number input field -->
      <div class="input-box">
        <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
        <input type="number" required placeholder="e.g 000 000 0000" name="cellNumber">
        <label for="">Cellphone Number</label>
    </div>

    <!-- Password input field -->
    <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" required placeholder="e.g ********" name="password" minlength="8">
        <label for="">Password</label>
    </div>
      <!-- Confirm password input field -->
      <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
        <input type="password" required placeholder="e.g ********" name="confirmPassword" minlength="8">
        <label for="">Confirm Password</label>
    </div>

    <!-- Terms and Conditions checkbox -->
    <div class="Ts_Cs">
        <label for=""><input type="checkbox" name="TnCs">I accept the <a href="Ts_Cs.html">Terms and Conditions</a></label>
    </div>
    
    <!-- Sign-up button -->
    <button>Sign-Up</button>
    <!-- Login page link -->
    <div class="loginPage-link">
        <p>Already have an account? <a href="LoginPage.html">Login here</a></p>
    </div>
    </form>
  </div>
   <!-- Ionicons script to display icons in input fields -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

  </body>
</html>