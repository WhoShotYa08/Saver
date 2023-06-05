<?php 
    include "loginfile.php";
    include "forgotPassword.php";
    // include "facebookLogin.php";
    // include "logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="contact.js" defer></script>
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/6e07084945.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <header>
        
         Navigation bar with a class of "navigation" 
        <nav class="navigation">
            Navigation bar content within a div with class "navBar"
            <div class="navBar">
                 Unordered list with a class of "navlist" 
                <ul class="navlist">
                     The hamburger toggle button for the menu 
                    <div class="toggle" id="toggle">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>

                    The menu that will be displayed 
                    <div class="menu">
                        <a href="">Home</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                    </div>

                </ul>
            </div>
        </nav>
    </header> -->

    <header>
        <div class="navbar">
    
            <nav>
                <ul>
                    <li><a href="#" class="icons" id="logo"><ion-icon name="logo-html5"></ion-icon></ion-icon></a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="./services.php">Service</a></li>
                    <li><a href="./contact.php">Contact</a></li>

                </ul>
                <div class="profile_cart">
                        <a href="./profile.php" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a>
                        
                        <!-- shopping cart icon -->
                        <a href="#" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a>
                </div>
            </nav>
            
        </div>
    </header>

    <div class="border">
        <span>.</span>
    </div>

    <section class="section">
    <div class="login-box">
        <form action="" method="post">
        <h2>Contact</h2> <br>
        <div class="box">
            <div class="grid-container">
            <div class="input-container">
                <input type="text" id="name" placeholder="Name">
            </div>
            <div class="input-container">
                <input type="text" id="email" placeholder="Email Address">
            </div>
            <div class="input-container">
                <input type="text" id="comment" placeholder="Comment">
            </div>
            </div>
            <div class="p-container">
            <p>Address <br>732 Coster Avenue <br>Johannesburg South <br>2998 <br><br> <b>Email:</b><br>special4You@business.co.za <br><br>Phone: <br> 0723567891</p>
            </div>
        </div>
        <button>Submit</button>
        </form>
    </div>
    </section>

    <section class="section2">
    <div id="advert" style="display: none;">
        <h1>Advertisements</h1>
        <div class="main-advert">
            <iframe class="video" width="250" height="280" src="https://www.youtube.com/embed/8zq0VbgU5aA?autoplay=1&mute=1&loop=1" frameborder="3"></iframe>
        </div>
        <div class="other-adverts">
            <iframe class="video" width="125" height="170" src="https://www.youtube.com/embed/Spt_V04IWKg?autoplay=1&mute=1&loop=1" frameborder="0"></iframe>
            <iframe class="video" width="125" height="170" src="https://www.youtube.com/embed/Lv8ekWAK_1Q?autoplay=1&mute=1&loop=1" frameborder="0"></iframe>
        </div>
        <div> 
            <iframe class="video" width="125" height="170" src="https://www.youtube.com/embed/QvZXYpnBGp0?autoplay=1&mute=1&loop=1" frameborder="0"></iframe>
            <iframe class="video" width="125" height="170" src="https://www.youtube.com/embed/7liDJhV2yZY?autoplay=1&mute=1&loop=1" frameborder="0"></iframe>
        </div>
    </div>
    </section>

      <script>
    setTimeout(function() {
        var advertSection = document.getElementById("advert");
        advertSection.style.display = "block";
    }, 3000);
</script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./contact.js"></script>
</body>
</html>
