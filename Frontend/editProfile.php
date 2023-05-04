<?php 
    include "loginfile.php";
    $emailAdd = $_SESSION["loginEmail"];


    //Query database to get user details
    $getUser = "SELECT firstName, lastName, emailAddress, cellphoneNum FROM signUp_details WHERE emailAddress='$emailAdd'";
    $runGetUserQuery = mysqli_query($createConnection, $getUser);

    //storing query results in associative array
    $userResults = mysqli_fetch_assoc($runGetUserQuery);

    //storing results found in the database in the following variables
    $name = $userResults["firstName"];
    $surname = $userResults["lastName"];
    $emailCred = $userResults["emailAddress"];
    $cellNum = $userResults["cellphoneNum"];


    //function responsibel for updating profile details
    $fName = $lName = $userEmail = $userCellNumber = "";
    $updateSuccessful = "Your details have been updated";
    $updateFailed = "Update failed, please try again later";
    function editUserProfile($userResults, $fName, $lName, $userEmail, $userCellNumber, $createConnection, $updateSuccessful, $updateFailed){
        if(  $_SERVER["REQUEST_METHOD"]  ==  "POST"  ){
            $fName = $_POST["fname"];
            $lName = $_POST["lname"];
            $userEmail = $_POST["userEmail"];
            $userCellNumber = $_POST["userCellNumber"];

            //query to update the details after
            $updateDetails = "UPDATE signUp_details SET firstName = '$fName', lastName = '$lName',  emailAddress = '$userEmail', cellphoneNum = '$userCellNumber' ";
            $runUpdateDetailsQuery = mysqli_query($createConnection, $updateDetails);

            if( $runUpdateDetailsQuery == true ){
                $updateSuccessful;
            }
            else{
                $updateFailed;
            }
        }
    }

    if(isset($_POST["editButton"])){
        editUserProfile($userResults, $fName, $lName, $userEmail, $userCellNumber, $createConnection, $updateSuccessful, $updateFailed);
        header("Location: profile.php");
    }

    //function to delete an account
    function deleteAccount($createConnection, $emailAdd){
        if(  $_SERVER["REQUEST_METHOD"]  == "POST"  ){
            
        } 
    }
?>
