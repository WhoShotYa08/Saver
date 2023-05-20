 const http = new XMLHttpRequest();
 let result = document.getElementById("result");

 document.getElementById("share").addEventListener("click",()=>{
    findCurrentPosition();
 })

function findCurrentPosition(){

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(
            (position)=> {
                console.log(position.coords.latitude, position.coords.longitude);
            },
            (err)=>{
                alert(err.message);
            }
        )
    } else{
        alert("Geolocation not supported by browser");
    }
}