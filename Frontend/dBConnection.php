<?php 
  include "validateInput.php";
  
  $serverName = "localhost";
  $userName = "root";
  $passWord = "";
    
  $createConnection = mysqli_connect($serverName, $userName, $passWord);
    
  if($createConnection == false){
    echo "Connection Failed"; 
    die("Connection Failed".mysqli_connect_error());
  }
  else{
    echo "Connection Successful";
  }


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

  function insertData($rowCheck, $passWord, $confirmPassword, $emailAddress, $name, $surname, $cellphoneNum, $createConnection){
    $otpCode = rand(10000, 99999);
    if($rowCheck == 0){
      if($passWord === $confirmPassword){
        $insertUserData = "INSERT INTO `signUp_details` (`firstName`, `lastName`, `emailAddress`, `cellphoneNum`, `userPassword`, `otp`) VALUES ('$name', '$surname', '$emailAddress', '$cellphoneNum', '$passWord', '$otpCode')";
        $sendMail = mail($emailAddress, "OTP", $otpCode);
        // if($sendMail == true){
        //   echo "trueuu";
        // }
        // else{
        //   echo "falseee";
        // }
        if(mysqli_query($createConnection, $insertUserData)==true){
          echo "Data inserted into table successfully";
        }
        else{
          echo "Data insertion failed".mysqli_error($createConnection);
        }
      }
      mysqli_close($createConnection);
      
    }
  }

  insertData($rowCheck, $passWord, $confirmPassword, $emailAddress, $name, $surname, $cellphoneNum, $createConnection);


?>