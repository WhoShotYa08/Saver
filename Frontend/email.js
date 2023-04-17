var passwd = document.getElementById("password");


setInterval(1000);
function verifyEmail(){
    

    if(passwd.focus()){
        console.log("focused")
    }
    else{
        console.log("not focused")
    }
}

document.addEventListener("focus", "password");