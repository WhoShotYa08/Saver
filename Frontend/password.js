var passwdElement = document.getElementById("password");
var number = document.getElementById("number");
var lower = document.getElementById('lower');
var capital = document.getElementById('capital');
var miniChar = document.getElementById('miniChar');
var text = document.getElementById("validators");



function passwdVisbility(){
    let visible = document.getElementById("checkbox");

    if (visible.checked){
        passwdElement.type === "text";
    }
    else{
        passwdElement.type === "password";
    }
}


 passwdElement.onkeyup = function(){
    // checks whether the password includes uppercase letter
    if(passwdElement.value.match(/[A-Z]/g)) {
         capital.classList.remove("wrong");
         capital.classList.add("correct");
       } else {
         capital.classList.remove("correct");
         capital.classList.add("wrong");
       }

    // checks whether the password includes lowercase letters
    if(passwdElement.value.match(/[a-z]/g)) {
        lower.classList.remove("wrong");
        lower.classList.add("correct");
    } else {
        lower.classList.remove("correct");
        lower.classList.add("wrong");
    }
    // checks whether the password includes numbers
    if(passwdElement.value.match(/[0-9]/g)) {
        number.classList.remove("wrong");
        number.classList.add("correct");
    } else {
        number.classList.remove("correct");
        number.classList.add("wrong");
    }

    // checks whether the password's length is greater or equal to 8
    if(passwdElement.value.length >= 8) {
        miniChar.classList.remove("wrong");
        miniChar.classList.add("correct");
    } else {
        miniChar.classList.remove("correct");
        miniChar.classList.add("wrong");
    }

    if(passwdElement.value.match(/^[!@#\$%\^\&*\)\(+=._-]+$/g)) {
        special.classList.remove("wrong");
        special.classList.add("correct");
    } else {
        special.classList.remove("correct");
        special.classList.add("wrong");
    }
 }

//display the password requirements
passwdElement.onfocus = function(){
    text.style.display = 'block';
}

passwdElement.onblur = function(){
    text.style.display = "none";
}
