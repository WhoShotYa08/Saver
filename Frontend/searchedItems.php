<?php 
    include "dBConnection.php";
    $itemsTable = "CREATE TABLE SearchedItem(
        CustomerID INT(10) AUTO_INCREMENT PRIMARY KEY,
        Mall_Name varchar(50),
        Item_Price decimal(20, 2),
        Discount_Price decimal(20, 2),
        Shop_Name varchar(50),
        Foreign Key (CustomerID) references signUp_details(CustomerID)
    )";

    $runtable = mysqli_query($createConnection, $itemsTable);
    if($runtable==true){
        echo "successfull CREATION";
    }
    else{
        echo "Failed".mysqli_error($createConnection);
    }
?>