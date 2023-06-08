<html>
  <head>
    <title>Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="services.css">
    <script type="module" src="app.js" defer></script>
  </head>
  <body>
  <header>
        <div class="navbar">
    
        <nav>
            <ul>
            <li><a href="./pnp.php" class="icons" id="logo"><img src="./1678467425782-thumbnail 1.jpg" alt="LOGO" style="height: 1em"></a></li>
                <li><a href="./Welcome_page.php">Home</a></li>
                
                <li><a href="./services.php">Services</a></li>
                <li><a href="./contact.php">Contact</a></li>

            </ul>
            <div class="profile_cart">
                    <a href="./profile.php" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a>
                    
                    <!-- shopping cart icon -->
                    <a href="./ProductBoxesDetails.php" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a>
            </div>
        </nav>
        
    </div>
    </header>


    <div class="container">
      <div id="map"></div>

      <div id="advert">
        <h1>Advertisments |<span style="color: brown;"><a href="./Welcome_page.php">Home</a></span></h1>
        <div class="main-advert">
          <iframe width="390" height="310" src="https://www.youtube.com/embed/8zq0VbgU5aA?autoplay=1&mute=1" frameborder="3"></iframe>
          </div>


          <div class="other-adverts">
            <iframe width="175" height="150" src="https://www.youtube.com/embed/c8d2lfUbG7I?autoplay=1&loop=1" frameborder="0"></iframe>
            <iframe width="175" height="150" src="https://www.youtube.com/embed/Lv8ekWAK_1Q?autoplay=1&mute=1&loop=1"frameborder="0"></iframe>
          </div>
            
          <div class="other-adverts">
            <iframe width="175" height="150" src="https://www.youtube.com/embed/RbQcozCkmNE?autoplay=1&mute=1" frameborder="0"></iframe>
            <iframe width="175" height="150" src="https://www.youtube.com/embed/R8dYZM9AdPo?autoplay=1&mute=1&loop=1"frameborder="0"></iframe>
          </div>
          
      </div>

    </div>


    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyCYwynf_JpRu1Oe2bkjDqfIRKKMMEWNpXM", v: "weekly"});</script>
  </body>
</html>