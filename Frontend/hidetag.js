var pTag = document.getElementById("incorrectLogin");
var password = document.getElementById("EnterPassword");
var ConfirmPassword = document.getElementById("ConfirmPassword");

function hide(pTag, password, ConfirmPassword){
    if(password == ConfirmPassword){
        
        pTag.style.visibility = "hidden";
    }
    else{
        pTag.style.visibility = "visible";
    }
}

window.addEventListener("load", hide);