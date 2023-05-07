var img_src = new Array ("https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/GalaxyCluster.jpg", "https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/M104.jpg", "https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/NGC1300.jpg", "https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/InteractingGalaxies.jpg", "https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/M51.jpg", "https://www.cs.utexas.edu/~bulko/2023spring/Images/329E.HW8.images/NGC6217.jpg");
var picCap = new Array ("Galaxy Cluster", "M 104", "NGC 1300", "Interacting Galaxies", "M 51", "NGC 6217");

var currIdx = 0;

function get_Img(){
    currIdx = Math.trunc(Math.random() * img_src.length);
    return img_src[currIdx];
}

function changeImg(){
    var new_img = get_Img();
    document.getElementById("galaxies").setAttribute("src", new_img);
    document.getElementById("picCap").innerHTML = picCap[currIdx];
    
}
