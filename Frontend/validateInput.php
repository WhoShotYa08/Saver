<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $name = "";
        $surname = "";
        $emailAddress = "";
        $cellphoneNum = "";
        $password = "";
        $confirmPassword = "";

        $nameError = "";
        $surnameError = "";

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
  
            if(preg_match("/^[a-zA-Z-' ]*$/", $name)){
              $nameError = "Only letters and space allowed";
              $surnameError = "Only letters and space allowed";
            }
  
  
          }
    ?>
</body>
</html>