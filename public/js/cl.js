/* BEGIN public/js/cl.js */
const BOARD_DIMENSIONS = 3;

function getBoard()
{
    var table = document.createElement('table');

    for (var i=0; i<BOARD_DIMENSIONS; i++) {
        var tr = document.createElement('tr');

        for (var j=0; j<BOARD_DIMENSIONS; j++) {

            var td = document.createElement('td');

            td.innerHTML = i + ":" + j;

            tr.appendChild(td)

        }
        table.appendChild(tr);
    }
}

function checkBoard(pass, attempt)
{
    for (var i=0; i<BOARD_DIMENSIONS; i++) {
        for (var j=0; j<BOARD_DIMENSIONS; j++) {

        }
    }
}


function f() {
    var pass = getBoard();
    var attempt = getBoard();



}
/* END public/js/cl.js */