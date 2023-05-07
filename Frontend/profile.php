<?php 
    include "editProfile.php";
    include "logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="groceryList.js" defer></script>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <header>
        
        <!-- Navigation bar with a class of "navigation" -->
        <nav class="navigation">
            <!-- Navigation bar content within a div with class "navBar" -->
            <div class="navBar">
                <!-- Unordered list with a class of "navlist" -->
                <ul class="navlist">
                    <!-- The hamburger toggle button for the menu -->
                    <div class="toggle" id="toggle">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
    
                    <!-- The menu that will be displayed -->
                    <div class="menu">
                        <a href="">Home</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                    </div>
    
                    <!-- logo icon -->
                    <li><a href="#" class="icons" id="logo"><ion-icon name="logo-html5"></ion-icon></ion-icon></a></li>
    
                    <div class="profile_cart">
                        <a href="#" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a>
    
                        <!-- shopping cart icon -->
                        <a href="#" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a>
                    </div>
                </ul>
                <!-- profile icon -->
                
            </div>
        </nav>
    </header>

    <div class="border">
        <span>.</span>
        <span class="profile_picture"><img src="https://th.bing.com/th/id/OIP.7bCUmrcoCLNF4utgNRm0-QAAAA?pid=ImgDet&rs=1" alt="profile picture icon" id="profile_picture" ><a href="#" id="edit_profile" name="editProfile" >Edit profile</a></span>
        <span></span>
    </div>
    <br><br><br><br><br><br><br><br>

    <form action="" method="post">
        <div class="container">
                <div class="floatingMSG" id="floatMSG"> <?php $updateSuccessful; ?> </div>
                <div class="profile_info">
                    <label for="name">Name</label><br>
                    <input type="text" placeholder="Daniel" value=" <?php echo $name;?>" class="proInput" name="fname" ><br>
                    <label for="surname">Surname</label><br>
                    <input type="text" placeholder="Johnson" value=" <?php echo $surname;?>" class="proInput" name="lname" ><br>
                    <label for="email">Email</label><br>
                    <input type="email" placeholder="DanielJohnson@gmail.com" value=" <?php echo $emailCred;?>" class="proInput" name="userEmail" ><br>
                    <label for="cellnumber">Cellphone number</label><br>
                    <input type="tel" placeholder="071 223 1111" value=" <?php echo '0'.$cellNum;?>" class="proInput"  name="userCellNumber" ><br>
                    <label for="address">Adresss</label><br>
                    <input type="text" placeholder="12 bunting road, Johannesburg" class="proInput" ><br>
                    <button name="editButton" class="edit1" style="height: 40px; width:80px; background-color:orange; border-radius:10px; border:none; font-weight:bold">Update</button>
                    <button name="deleteButton" class="edit1" style="height: 40px; width:80px; background-color:rgba(184, 29, 29, 0.705); border-radius:10px; border:none; font-weight:bold; position:relative; left: 85%; bottom: 8%; ">Delete</button>
                    <button name="LogoutButton" class="edit1" style="height: 40px; width:80px; background-color:red; border-radius:10px; border:none; font-weight:bold">Logout</button>
                    <br>
                    <br>
                </div>
                
        </div>
        
    </form>
    



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script src="disableValue.js"></script> -->
</body>
</html>