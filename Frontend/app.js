const http = new XMLHttpRequest();
let result = document.getElementById("result");
var coordinates = new Object();


async function initMap(){
      //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: -28.479, lng: 24.672 },
    zoom: 6, 
  });
  let infoWindow = new google.maps.InfoWindow();
  document.getElementById("share").addEventListener("click",()=>{
    findCurrentPosition();
  });

  infoWindow.setPosition(coordinates);
  infoWindow.setContent("Location found.");
  infoWindow.open(map);
  map.setCenter(coordinates);

}

function findCurrentPosition(){

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(
            (position)=> {
                coordinates["latitude"] = position.coords.latitude;
                coordinates["longitude"] = position.coords.longitude;
            },
            (err)=>{
                alert(err.message);
            }
        )
    } else{
        alert("Geolocation not supported by browser");
    }
}


initMap();