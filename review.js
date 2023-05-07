var dom, x, y, finalx = 300, finaly = 300;

// initialize the x and y coordinates of the current position of the text to be moved,
// and then call the mover function

function initText() {
  dom = document.getElementById('theText').style;

// Get the current position of the text */
  var x = dom.left;
  var y = dom.top;

// Convert the string values of left and top to numbers by stripping off the units
  x = x.match(/\d+/);
  y = y.match(/\d+/);

  moveText(x, y);
}

// move the text from its original position to (finalx, finaly)

function moveText(x, y) {

  if (x > finalx)
     x--;
  else if (x < finalx)
     x++;

  if (y > finaly)
     y--;
  else if (y < finaly)
     y++;

// As long as the text is not at the destination, all the mover with the current position
  if ((x != finalx) || (y != finaly)) {

     // Put the units back on the coordinates before assigning them to the properties to cause the move
     dom.left = x + "px";
     dom.top = y + "px";

     // Recursive call, after a 1-millisecond delay
     setTimeout("moveText(" + x + "," + y + ")", 1);
   }

}
