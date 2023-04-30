<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="groceryList.css">
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
                    <div class="toggle" onclick="this.classList.toggle('open')">
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
    
                    <!-- search bar for the grocery list -->
                    <li><input type="text" id="searchGrocery" placeholder=" &#xf002   search in grocery list"></li>
    
                    <!-- profile icon -->
                    <li> <a href="#" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a></li>
    
                    <!-- shopping cart icon -->
                    <li><a href="#" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a></li>
                </ul>
            </div>
        </nav>
    </header>
    

    <div class="container">
        <h2>My Grocery List</h2><br>
    
        <!-- The grocery cart section -->
        <div class="cart">
            <!-- First item in the grocery cart -->
            <div class="items">
                <img src="https://th.bing.com/th/id/R.84177936ac6e4a80e1008d64e44ed62b?rik=36aOc%2fUJMs0f2w&pid=ImgRaw&r=0" alt="banana">
                <div class="banana">
                    <h2>Banana</h2>
                    <!-- Select dropdown for the weight -->
                    <select class="item-weight" id="item1-weight">
                        <option value="2kg">2kg</option>
                        <option value="3kg">3kg</option>
                        <option value="4kg">4kg</option>
                        <option value="5kg">5kg</option>
                    </select>
                    <span><b>Price:  R18.99</b></span>
                    <span><b>Discount Price:  R12.99</b></span>
                </div>
                <!-- Input field for the quantity -->
                <input type="number" placeholder="Quantity" min="0" >
            </div>
    
            <br>
    
            <!-- Second item in the grocery cart -->
            <div class="items">
                <img src="https://th.bing.com/th/id/OIP.RyDdyLIbfAX5L-j4BWbtCAHaE7?pid=ImgDet&rs=1" alt="potatoes">
                <div class="potatoes">
                    <h2>Potatoes</h2>
                    <!-- Select dropdown for the weight -->
            <select class="item-weight" id="item2-weight">
                <option value="2kg">2kg</option>
                <option value="3kg">3kg</option>
                <option value="4kg">4kg</option>
                <option value="5kg">5kg</option>
            </select>
            <span><b>Price:  R27.99</b></span>
            <span><b>Discount Price:  R21.99</b></span>
            </div>
            <!-- Input field for the quantity -->
            <input type="number" placeholder="Quantity" min='0'>
            </div>
            
            <br>
            <!-- Third item in the grocery cart -->
            <div class="items">
            <img src="https://th.bing.com/th/id/OIP._Pz9FOMUEcVYXM8L_NPEiwHaFS?w=256&h=183&c=7&r=0&o=5&dpr=1.5&pid=1.7" alt="orange">
            <div class="oranges">
            <h2>Oranges</h2>
            <!-- Select dropdown for the weight -->
            <select class="item-weight" id="item3-weight">
                <option value="2kg">2kg</option>
                <option value="3kg">3kg</option>
                <option value="4kg">4kg</option>
                <option value="5kg">5kg</option>
            </select>
            <span><b>Price:  R50.99</b></span>
            <span><b>Discount Price:  R39.99</b></span>
            </div>
            <!-- Input field for the quantity -->
            <input type="number" placeholder="Quantity" min="0">
            </div>
            
        </div>
        <br>
        <div class="checkout">
            <span>Total Price: <span id="total_price">R200.50</span></span>
            <span>Saving Price: <span id="saving_price">R50.75</span></span>

            <div class="buttons">
                <button id="send_to_me">Send to me</button>
                <button id="location">View Nearby Location</button>
            </div>
            
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>