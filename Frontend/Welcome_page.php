<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="WelcomePage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .navclass{
            color: black;
            text-decoration: none;
            z-index: 20;
        }
        .navclass:hover {
            color: whitesmoke;
            text-decoration: underline;
        }
    </style>

<header>

    <nav class="HeaderOne">
        <a href="./Welcome_page.php" class="navclass">Home</a>
        <a href="./services.php" class="navclass">services</a>
        <a href="./contact.php" class="navclass">Contact</a>
    </nav>

    <nav class="HeaderTwo">
        <a href="./LoginPage.php" style="color: white;">Login</a>
        <button type="button" id="redirectButton">Sign Up</button>
    </nav>

</header>


<div class = "content">
    <h1>Its Not Just Checking For<br> Specials Its An<br> Experience</h1>
    <p>It is as simple as a click of a button and you get<br> to see and get updates on specials on your<br> favourite items at your favourite grocery shops</p>
</div> 


<div class="image">
    <img src="DeliveryMan.png" alt="DeliveryMan" width="500vw" height="500vh" id="img1">
</div> 



<script>
    const redirectButton = document.getElementById("redirectButton");
    redirectButton.addEventListener("click", function() {
      window.location.href = "SignUpPage.php";
    });
</script>

</body>
</html>