var toggle = document.getElementById("toggle");
var container = document.getElementById("container");


toggle.onclick = function(){
    toggle.classList.toggle('open');
    
    if (toggle.classList.contains("open")){
        toggle.style.zIndex = 10;
        container.style.zIndex = -10;
        
    }

    else{
        toggle.style.zIndex = 0;
        container.style.zIndex = 10;
    }

}