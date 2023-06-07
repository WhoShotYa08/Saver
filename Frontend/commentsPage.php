<?php 
    include "databaseCreation.php";
    include "sessionOver.php";
    $reportMsg = "";
    if(isset($_POST["submitComments"])){
        $cust_Name = $_POST["name"];
        $cust_EmailAddress = $_POST["email"];
        $cust_Comments = $_POST["comment"];

        $insertComments = "INSERT INTO `comments`(`CustomerName`, `emailAddress`, `CommentsText`) VALUES ('$cust_Name','$cust_EmailAddress','$cust_Comments')";
        $runInsert = mysqli_query($createConnection, $insertComments);
        if($runInsert == true){
            $reportMsg = "Thank you for reviewing Special4U";
        }
        else{
            $reportMsg = "Your review was not submitted, please try again later";
        }
    }
?>