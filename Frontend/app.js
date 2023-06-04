var map, directionsService, display;
var location = {}
async function initMap(){
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    directionsService = new google.maps.DirectionsService();
    display = new google.maps.DirectionsRenderer();

    map = new Map(document.getElementById("map"), {
    center: { lat: -26.2041, lng: 28.0473 },
    zoom: 15, 
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  });
let infoWindow = new google.maps.InfoWindow();
const locationButton = document.createElement("button");

locationButton.textContent = "Pan to Current Location";
locationButton.classList.add("custom-map-control-button");
map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
locationButton.addEventListener("click",()=>{
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };

                new google.maps.Marker({
                  position: pos,
                  map,
                  title: "You are here."
                })
                display.setMap(map);
                map.setCenter(pos);
              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } else {
            // If browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
        });
  };


  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );

    infoWindow.open(map);
  }

initMap();