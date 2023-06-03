<html>
  <head>
    <title>Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" href="style.css" />
    <script type="module" src="app.js" defer></script>
  </head>
  <body>

    <div class="container">
      <div id="map"></div>

      <div id="advert">
        <h1>Advertisments</h1>
        <iframe width="415" height="155" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1" frameborder="0"></iframe>
        <iframe width="205" height="155" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1" frameborder="0"></iframe>
      </div>

    </div>


    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyCYwynf_JpRu1Oe2bkjDqfIRKKMMEWNpXM", v: "weekly"});</script>
  </body>
</html>