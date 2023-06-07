<?php 
        //creating connection to database
        $serverName = "localhost";
        $userName = "root";
        $passWord = "";
        
        $createConnection = mysqli_connect($serverName, $userName, $passWord);
          
        // if($createConnection == false){
        //   echo "Connection Failed"; 
        //   die("Connection Failed".mysqli_connect_error());
        // }
        // else{
        //   echo "Connection Successful";
        // }
    
        echo "<br>";
        //creating table to database
        $databaseName = "CREATE DATABASE UserDetails";
    
        // if(mysqli_query($createConnection, $databaseName) == true){
        //   echo "DB created";
        // }
        // else{
        //   echo "DB created failed";
        // }
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
    
        // $alterTAble = "ALTER TABLE signUp_details ADD verified BOOLEAN DEFAULT false";
        // if(mysqli_query($createConnection, $alterTAble)){
        //   echo "TAble Altered";
        // }
        // else{
        //   echo "table alter failed";
        // }
    
    
        //Uncomment the following to code to see if the table has been created
        // if(mysqli_query($createConnection, $createTable) == true){
        //   echo "Table successfully created";
        // }
        // else{
        //   echo "Error 404";
        // }

        // $alterEmail = "ALTER TABLE signUp_details ADD CONSTRAINT uc_emailAddress UNIQUE (emailAddress)";
        // mysqli_query($createConnection, $alterEmail);
        
    
    
        // $modifyPassword = "ALTER TABLE signUp_details MODIFY userPassword varchar(100)";
        // mysqli_query($createConnection, $modifyPassword);

        $createCommentsTable = "CREATE TABLE Comments(
        CustomerID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        CustomerName varchar(255),
        emailAddress varchar(255),
        CommentsText varchar(1000),
        CONSTRAINT Foreign Key (CustomerID) references signUp_details (CustomerID)
        );";

        // $drop = "DROP TABLE Comments";


        // mysqli_query($createConnection, $createCommentsTable);
    
?>