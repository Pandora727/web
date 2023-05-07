puzzleIdx = Math.floor(Math.random() * 3 + 1)
order = new Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12").sort((a, b) => 0.5 - Math.random());

curr = document.querySelectorAll(".pieces");
for (i = 0; i < curr.length; i++) {
   curr[i].setAttribute("src", "/cs329e-bulko/zf2638/HW11/images/puzzle" + puzzleIdx + "/img" + puzzleIdx + "-" + order[i] + ".jpg");
};

function grabber(event) {

   theElement = event.currentTarget;
   event.preventDefault();
   posX = parseInt(theElement.style.left);
   posY = parseInt(theElement.style.top);

   diffX = event.clientX - posX;
   diffY = event.clientY - posY;

   document.addEventListener("mousemove", mover, true);
   document.addEventListener("mouseup", dropper, true);

}
function mover(event) {
   theElement.style.left = (event.clientX - diffX) + "px";
   theElement.style.top = (event.clientY - diffY) + "px";

}

function dropper(event) {

   document.removeEventListener("mousemove", mover, true);
   document.removeEventListener("mouseup", dropper, true);

}