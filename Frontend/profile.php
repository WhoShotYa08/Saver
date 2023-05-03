<?php 
    session_start();
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
        <span class="profile_picture"><img src="https://th.bing.com/th/id/OIP.7bCUmrcoCLNF4utgNRm0-QAAAA?pid=ImgDet&rs=1" alt="profile picture icon" id="profile_picture" ><a href="#" id="edit_profile">Edit profile</a></span>
        <span></span>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="container">

        <div class="profile_info">
            <label for="name">Name</label><br>
            <input type="text" placeholder="Daniel"><br>
            <label for="surname">Surname</label><br>
            <input type="text" placeholder="Johnson"><br>
            <label for="email">Email</label><br>
            <input type="email" placeholder="DanielJohnson@gmail.com"><br>
            <label for="cellnumber">Cellphone number</label><br>
            <input type="tel" placeholder="071 223 1111"><br>
            <label for="address">Adresss</label><br>
            <input type="text" placeholder="12 bunting road, Johannesburg"><br>
        </div>

    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>