<?php 
  session_start();


    include "databaseCreation.php";

    //Generating OTP then storing it in database
    $otpCode = rand(10000, 99999);
    $name =  $surname = $emailAddress = $cellphoneNum = $password = $confirmPassword = "";

    $error = "Password do not match";
    function sendData($otpCode, $createConnection, $emailAddress, $cellphoneNum, $passWord, $name, $surname, $confirmPassword, $error){
      // $name =  $surname = $emailAddress = $cellphoneNum = $password = $confirmPassword = "";


  
      function clearInput($userInput){
        $userInput = trim($userInput);
        $userInput = stripslashes($userInput);
        $userInput = htmlspecialchars($userInput);
        return $userInput;
      }
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = clearInput($_POST["name"]);
        $surname = clearInput($_POST["surname"]);
        $emailAddress = clearInput($_POST["email"]);
        $cellphoneNum = clearInput($_POST["cellNumber"]);
        $passWord = clearInput($_POST["password"]);
        $confirmPassword = clearInput($_POST["confirmPassword"]);

        //queryin the database to see if email address entered by user is available in database
        $checkUser = "SELECT * FROM signUp_details WHERE emailAddress='{$emailAddress}'";
        
        $runcheckUser = mysqli_query($createConnection, $checkUser);
        //getting row number.....should return number greater than 0 if user exists
        $rowCheck = mysqli_num_rows($runcheckUser);

        if($rowCheck>0){
          
          // echo "<script>window.location.href = 'LoginPage.php';</script>";
          $error = "You are a registered user, please login";
          $_SESSION['error'] = $error;
          // $errMSG = $_SESSION['error'];
          header("Location: LoginPage.php");
          exit();
        }
        else{
          if($passWord == $confirmPassword){
            $encyrptedPassword = password_hash($passWord , PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO signUp_details (firstName, lastName, emailAddress, cellphoneNum, userPassword, otp) VALUES ('$name', '$surname', '$emailAddress', $cellphoneNum, '$encyrptedPassword', $otpCode)";
            include "sendEmail.php";
            if(mysqli_query($createConnection, $insertQuery) == true){
              $error =  "New record inserted successfully";
              $_SESSION["email"] = $emailAddress;
              header('Location: OTP.php');
              exit();
            }
            else{
              $error =  "No record inserted, Please try again".mysqli_error($createConnection);
              $_SESSION['error'] = $error;
            }
          }
          else{
            $error = "Password do not match";
            $_SESSION['error'] = $error;
          }
        }
      }
    }

    if(isset($_POST["signUp"]) == true){
      sendData($otpCode, $createConnection, $emailAddress, $cellphoneNum, $passWord, $name, $surname, $confirmPassword, $error);
      
    }

    

?>