<?php 
    include "editProfile.php";
    include "logout.php";
    // include "Saver/groceryList.php"
    include "navBar.php";
    include "sessionOver.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="profile.js" defer></script>
    <link rel="stylesheet" href="NavigationBarStyles.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <style>
        .edit_btn:hover {
        color: white;
    }

    #logo {
    font-size: .5em;
    }

    @keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideIn {
    from {
        transform: translateX(-50%);
    }
    to {
        transform: translateX(0);
    }
}


    </style>

    
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
                        <a href="./pnp.php">Home</a>
                        <a href="./services.php">Services</a>
                        <a href="./contact.php">Contact</a>
                        <form action="" method="post">
                            <button name="LogoutButton" style= "width: 6em; padding: 1em; color: white; cursor: pointer; background-color: red; border: none; border-radius: 2em" >Logout</button>
                        </form>

                        <!-- <button name="LogoutButton" class="edit1" style="height: 40px; width:80px; color:white; background-color:red; border-radius:10px; border:none; font-weight:bold">Logout</button> -->
                    </div>
    
                    <!-- logo icon -->
                    <li><a href="./pnp.php" class="icons" id="logo"><img src="./1678467425782-thumbnail 1.jpg" alt="LOGO" style="margin-top: -1em; height: 7.5em"></a></li>

    
                    <div class="profile_cart">
                        <a href="./profile.php" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a>
                        
                        <!-- shopping cart icon -->
                        <a href="./ProductBoxesDetails.php" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a>
                        
                    </div>
                </ul>
                
            </div>
        </nav>
    </header>

    <div class="border">
        <span>.</span>
    <div class="position_picture">
    <img id="preview" src="https://png.pngtree.com/png-vector/20191103/ourmid/pngtree-handsome-young-guy-avatar-cartoon-style-png-image_1947775.jpg" alt="Preview of uploaded image" class="profile_picture" style="animation: fadeIn 3s ease;">

        </div>
        <div class="position_picture choose_picture">
            <input type="file" id="image" onchange="previewImage()">
            <button type="button" onclick="changeEditability()" class="edit_btn button" >Edit Profile</button>
    </div>
    </div>

    <br><br>
    

    <script>
        function previewImage() {
            var input = document.getElementById('image');
            var preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function changeEditability() {
            var inputs = document.querySelectorAll('.proInput');
            inputs.forEach(function(input) {
                input.readOnly = !input.readOnly;
            });
        }
    </script>

    <br><br><br>

    <form action="" method="post">
        <div class="container">
                <div class="floatingMSG" id="floatMSG"> <?php $updateSuccessful; ?> </div>
                <div class="profile_info" style="animation: slideIn 2s ease;">
                    <label for="name">Name</label><br>
                    <input type="text" placeholder="Daniel" value=" <?php echo $name;?>" class="proInput" name="fname" readonly ><br>
                    <label for="surname">Surname</label><br>
                    <input type="text" placeholder="Johnson" value=" <?php echo $surname;?>" class="proInput" name="lname" readonly><br>
                    <label for="email">Email</label><br>
                    <input type="email" placeholder="DanielJohnson@gmail.com" value=" <?php echo $emailCred;?>" class="proInput" name="userEmail" readonly ><br>
                    <label for="cellnumber">Cellphone number</label><br>
                    <input type="tel" placeholder="071 223 1111" value=" <?php echo '0'.$cellNum;?>" class="proInput"  name="userCellNumber" readonly ><br>
                    <button name="editButton" class="edit1 button" style="height: 40px; width:80px; background-color:orange; border-radius:10px; border:none; font-weight:bold">Update</button>
                    <button name="deleteButton" class="edit1 button" style="height: 40px; width: 85px; margin-top:-8px; background-color:rgba(184, 29, 29, 0.705); border-radius:10px; border:none; font-weight:bold; position:relative; left: 85%; bottom: 8%; ">Delete</button>
                    
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