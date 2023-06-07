<?php 
  session_start();
  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo '<script>
        window.onload = function() {
            var errorRepo = document.getElementById("errorRepo");
            errorRepo.innerText = "'. $error .'";
        };
    </script>';
}

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

        if($rowCheck == 0){
          if($passWord == $confirmPassword){
            $encyrptedPassword = password_hash($passWord , PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO signUp_details (firstName, lastName, emailAddress, cellphoneNum, userPassword, otp) VALUES ('$name', '$surname', '$emailAddress', $cellphoneNum, '$encyrptedPassword', $otpCode)";
            include "sendEmail.php";
            
            if(mysqli_query($createConnection, $insertQuery) == true){
              $_SESSION["email"] = $emailAddress;
              // $error =  "New record inserted successfully";
              header("Location: OTP.php");
              exit();
            }
            else{
              $error =  "No record inserted, Please try again".mysqli_error($createConnection);
              echo '<script>
                    window.onload = function() {
                        var errorRepo = document.getElementById("errorRepo");
                        errorRepo.innerText = "'. $error .'";
                    };
                </script>';
                }
          }
          else{
            $error = "Passwords do not match";
            echo '<script>
                window.onload = function() {
                    var errorRepo = document.getElementById("errorRepo");
                    errorRepo.innerText = "'. $error .'";
                };
            </script>';
          }
        }
        else{
          $error = "You are a registered user, please login";
          header("Location: LoginPage.php?error=" . urlencode($error));
          exit();
        }
      }
    }

    if(isset($_POST["signUp"]) == true){
      sendData($otpCode, $createConnection, $emailAddress, $cellphoneNum, $passWord, $name, $surname, $confirmPassword, $error);
      
    }

    

?>