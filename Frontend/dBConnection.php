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
    
    ?>
</body>
</html>