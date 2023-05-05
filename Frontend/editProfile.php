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
    function editUserProfile($userResults, $fName, $lName, $userEmail, $userCellNumber, $createConnection, $updateSuccessful, $updateFailed, $emailAdd){
        if(  $_SERVER["REQUEST_METHOD"]  ==  "POST"  ){
            $fName = $_POST["fname"];
            $lName = $_POST["lname"];
            $userEmail = $_POST["userEmail"];
            $userCellNumber = $_POST["userCellNumber"];

            //query to update the details after
            $updateDetails = "UPDATE signUp_details SET firstName = '$fName', lastName = '$lName',  emailAddress = '$userEmail', cellphoneNum = '$userCellNumber' WHERE emailAddress = '$emailAdd'";
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
        editUserProfile($userResults, $fName, $lName, $userEmail, $userCellNumber, $createConnection, $updateSuccessful, $updateFailed, $emailAdd);
        header("Location: profile.php");
    }

    //function to delete an account
    $deleteSuccess = "You have successfully deleted your account";
    $deleteFailed = "We can't delete your account at this time, please try again later";
    function deleteAccount($createConnection, $emailAdd, $deleteSuccess, $deleteFailed){
        if(  $_SERVER["REQUEST_METHOD"]  == "POST"  ){
            $deleteAccount = "DELETE FROM signUp_details WHERE emailAddress='$emailAdd'";
            $runDeleteQuery = mysqli_query($createConnection, $deleteAccount);
            if( $runDeleteQuery == true){
                header("Location: SignUpPage.php");
                echo $deleteSuccess;
                exit();
            }
            else{
                header("Location: profile.php");
                echo $deleteFailed;
            }
        } 
    }

    if(isset($_POST["deleteButton"])){
        deleteAccount($createConnection, $emailAdd, $deleteSuccess, $deleteFailed);
    }
?>
