var popupDiv = document.getElementById('forgotPopUp');

function popUp(){
    popupDiv.style.display = 'flex';
}

function popDown(){
    popupDiv.style.display = 'none';
}

function popUp() {
    document.getElementById("forgotPopUp").style.display = "flex";
    document.getElementById("forgotPopUp").style.opacity = 1;
}

function popDown() {
    document.getElementById("forgotPopUp").style.opacity = 0;
    setTimeout(function () {
        document.getElementById("forgotPopUp").style.display = "none";
    }, 300);
}
