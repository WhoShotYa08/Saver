<?php 
    //creating connection to database
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
    //creating table to database
    $databaseName = "CREATE DATABASE UserDetails";
    //same as use UserDetails in ms sql server
    $selectDB = mysqli_select_db($createConnection, "UserDetails");

    //creating table called signUp_details in database UserDetails
    $createTable = "CREATE TABLE signUp_details(
    CustomerID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    emailAddress varchar(100) NOT NULL,
    cellphoneNum INT(10) NOT NULL,
    userPassword varchar(20) NOT NULL,
    otp INT(5),
    timeReg TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


    

    //Generating OTP then storing it in database
    $otpCode = rand(10000, 99999);
    
    function sendData($otpCode, $createConnection){
      $name =  $surname = $emailAddress = $cellphoneNum = $password = $confirmPassword = "";
  
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
          $name = "You are a registered user, please login";
        }
        else{
          if($passWord == $confirmPassword){
            $insertQuery = "INSERT INTO signUp_details (firstName, lastName, emailAddress, cellphoneNum, userPassword, otp) VALUES ('$name', '$surname', '$emailAddress', $cellphoneNum, '$passWord', $otpCode)";

            if(mysqli_query($createConnection, $insertQuery) == true){
              echo "New record inserted successfully";
            }
            else{
              echo "No record inserted, Please try again".mysqli_error($createConnection);
            }
          }
        }
      }
    }

    if(isset($_POST["signUp"]) == true){
      sendData($otpCode, $createConnection);
      header('Location: OTP.php');
      exit();
    }

?>