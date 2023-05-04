var editProfile = document.getElementById("edit1");
function disableInput(){
    var inputTags = document.getElementsByClassName("proInput");
    inputTags[0].value.disabled = true;
    inputTags[1].value.disabled = true;
    inputTags[2].value.disabled = true;
    inputTags[3].value.disabled = true;

}

window.addEventListener("load", disableInput);

function editUserCred(){
    var inputTags = document.getElementsByClassName("proInput");
    inputTags[0].value.disabled = false;
    inputTags[1].value.disabled = false;
    inputTags[2].value.disabled = false;
    inputTags[3].value.disabled = false;
}

// editProfile.addEventListener("click", editUserCred);


