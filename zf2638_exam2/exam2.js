var counter = 0;
currentPlayer = "X";
var playerX = 0;
var playerO = 0;


function play(event) {
    theElement = event.currentTarget;

    if (theElement.value != "") {
        console.log("You selected it before!");
    }
    else if (counter == 0 || currentPlayer == "X") {
        theElement.value = "X";
        counter += 1;
        currentPlayer = "O";
        gameResult();
    }
    else if (currentPlayer == "O") {
        theElement.value = "O";
        counter += 1;
        currentPlayer = "X";
        gameResult();
    }

}

function gameResult() {
    targetResults = new Array([0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6])

    buttons = document.getElementsByClassName("buttons");

    currentBoard = new Array();
    for (i = 0; i < 9; i++) {
        currentBoard[i] = buttons[i].value;
    }

    for (j = 0; j < targetResults.length + 1; j++) {
        if (currentBoard[targetResults[j][0]] == currentBoard[targetResults[j][1]] && currentBoard[targetResults[j][1]] == currentBoard[targetResults[j][2]] && currentBoard[targetResults[j][0]] != "") {

            winner = currentBoard[targetResults[j][0]];
            alert("'" + winner + "' has won the game! ");
            if (winner =="X"){playerX += 1}else{playerO +=1};
            document.getElementById("X").innerHTML = playerX;
            document.getElementById("O").innerHTML = playerO;
            break;
        }

    }
}

function restart() {
    buttons = document.getElementsByClassName("buttons");
    for(i=0;i<10;i++){
        buttons[i].value = "";
    }
}
