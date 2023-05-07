slides = new Array('https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/agra_fort.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/ajanta_ellora.jpeg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/akshardham_temple.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/gateway_of_india.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/hawa_mahal.jpeg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/mehrangarh_fort.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/mysore_palace.jpeg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/qutub_minar.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/sun_temple.jpg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/taj_mahal.jpeg','https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW9.images/victoria_memorial.jpg');

let intervalID;

currIdx = 1;
currStatus = 0;
let myInterval;

function runSlides(){
    if (currStatus==0){
        myInterval = setInterval(function(){ document.getElementById("slides").setAttribute('src', slides[currIdx]);
        currIdx++;
        if (currIdx >=slides.length){
            currIdx = 0;
        }}, 3000);
       
    }
    else {
        clearInterval(myInterval);

    }
}

document.getElementById("start").addEventListener("click", function(){
    runSlides();
})
document.getElementById("end").addEventListener("click", function(){
    clearInterval(myInterval);
})
