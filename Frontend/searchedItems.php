<?php 
    include "dBConnection.php";
    $itemsTable = "CREATE TABLE SearchedItem(
        CustomerID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Mall_Name varchar(50),
        Item_Price decimal(20, 2),
        Discount_Price decimal(20, 2),
        Shop_Name varchar(50),
        CONSTRAINT Foreign Key (CustomerID) references signUp_details(CustomerID)
    )";

    // $runtable = mysqli_query($createConnection, $itemsTable);
    // if($runtable==true){
    //     echo "successfull CREATION";
    // }
    // else{
    //     echo "Failed".mysqli_error($createConnection);
    // }

    // $updateItems = "ALTER TABLE SearchedItem ADD Image_Link varchar(240)";
    // if(mysqli_query($createConnection, $updateItems)){
    //     echo "update successful";
    // }
    // else{
    //     echo "update failed";
    // }

    $itemName = "ALTER TABLE SearchedItem ADD Item_Name varchar(100)";
    mysqli_query($createConnection, $itemName);
    
?>