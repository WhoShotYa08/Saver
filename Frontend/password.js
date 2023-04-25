var passwd = document.getElementById("password");


function verifyEmail(){
    let list = document.getElementsByTagName('li');
    if(passwd.focus()){
        for(let i = 0; i < 4; i++){
            if(includesCaptitals){
                console.log(list[0].innerHTML);
                list[0].setAttribute("class", "correct"); 
            }

            if(includeSpecialChar){
                console.log(list[1].innerHTML);
                list[1].setAttribute("class", "correct");
            }
        }
    }

}

function passwdVisbility(){
    let passwdElement = document.getElementById('password');
    let visible = document.getElementById("checkbox");
    
    if (visible.checked){
        passwdElement.type === "text";
    }
    else{
        passwdElement.type === "password";
    }


}

function includesCaptitals(){

    return /[A-Z]/.test(passwd.textContent);
}

function includeSpecialChar() {
    const specialChar = ['!@#$%^&*()_+:"<>?/\\']
    let password = passwd.value;

    for( let x = 0; x < specialChar.length; x++){
        if(password.includes(specialChar[x])){
            return true;
        }
    }
    return false;
}

function ListItem() {
    let li = document.createElement("li");

    return li
}


passwd.addEventListener("focus", verifyEmail());