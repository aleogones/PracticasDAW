// Este array no se puede modificar,
var posibilidades = ["piedra", "papel", "tijera"];
//    //
const Options = {
    Rock : 0,
    Paper : 1,
    Scissors : 2
}
const history = [];
var playerOption = 0;
var computerOption = 0;

//declaro una variable para el nombre del jugador
var inputName;

var counter = 0;
//Obtemos el objeto que encapsula el número de partidas totales, y lo renderiza en el contador de partidas.
var total = document.getElementById('total');
var current = document.getElementById('actual');
var move;
var inputGames;
//lo que hemos hecho aquí es obtener todos los elementos del html con el tag "button"
let buttons = document.getElementsByTagName('button');
let images = document.getElementsByTagName('img');

//creamos las variables que contienen el acceso a cada "botón"
var playButton = buttons[0];
var goButton = buttons[1];
var resetButton = buttons[2];
var totalGames = 0;

var rock = images[0];
rock.addEventListener('click', 
    function(){
        paper.classList.remove('seleccionado');
        paper.classList.add('noSeleccionado');
        scissors.classList.remove('seleccionado');
        scissors.classList.add('noSeleccionado');
        rock.classList.remove('noSeleccionado');
        rock.classList.add('seleccionado');
        playerOption = Options.Rock;
    });

var paper = images[1];
paper.addEventListener('click', 
function(){
    rock.classList.remove('seleccionado');
    rock.classList.add('noSeleccionado');
    scissors.classList.remove('seleccionado');
    scissors.classList.add('noSeleccionado');
    paper.classList.remove('noSeleccionado');
    paper.classList.add('seleccionado');
    playerOption = Options.Paper;
});

var scissors = images[2];
scissors.addEventListener('click', 
function(){
    rock.classList.remove('seleccionado');
    rock.classList.add('noSeleccionado');
    paper.classList.remove('seleccionado');
    paper.classList.add('noSeleccionado');
    scissors.classList.remove('noSeleccionado');
    scissors.classList.add('seleccionado');
    playerOption = Options.Scissors;
});

var computerMove = images[3];

/* Esto es una comprobación de que el array que hemos obtenido correctamente los botones y que se le ha asignado correctamente funcionalidad)
playButton.onclick=play;
//playButton.addEventListener('click', play)
goButton.onclick=go;
resetButton.onclick=reset;
function play(){
    console.log('Jugando');
};

function go(){
    console.log('Go');
};

function reset(){
    console.log('Reset');
};
*/

//Si las funciones llevan "()" una vez llegue a esa linea se ejecutan automáticamente es por eso que no lo llevan.
playButton.onclick=play;
goButton.onclick=go;
goButton.disabled = true;
resetButton.onclick=reset;
resetButton.disabled = true;

//inicializamos el juego comprobando que se cumplen los requisitos y configurando variables e imágenes.
function play(){
    inputGames = parseInt(document.getElementsByName('partidas')[0].value);
    inputName = document.getElementsByName('nombre')[0].value;
    if(validateName(inputName)){
        if(validateGames(inputGames)) {
    if (counter < inputGames){
        clearInterval(move);
        playerOption = Options.Rock;
        computerOption = Options.Rock;
        computerMove.src = './img/piedraOrdenador.png';

        //Desabilitamos el botón de jugar y habilitamos el de reset.
        playButton.disabled = true;
        resetButton.disabled = false;


                totalGames = inputGames;
                //Cambiamos el valor de textContent, que es el valor dentro de los tags del total de partidas, por el valor indicado
                total.textContent = totalGames;
                current.textContent = counter+1;

                rock.src='./img/piedraJugador.png';
                paper.src='./img/papelJugador.png';
                scissors.src='./img/tijeraJugador.png';

                startComputerTurn();
                goButton.disabled = false;
    } else {
        goButton.disabled = true;
        clearInterval(move);
    }
} else {
    alert('El número de partidas debe ser superior a 0');
    document.getElementsByTagName('input')[1].classList.add('fondoRojo');
}
}
else {
alert('El nombre del jugador no cumple con los requisitos');
document.getElementsByTagName('input')[0].classList.add('fondoRojo'); 
}
};

function finPartida(){
    history.push('Nueva Partida');
    for(let i=0;i<history.length;i++){
        document.getElementById('historial').innerHTML = history[i];
    }
}

//Se ejecuta cuando pulsamos el botón ya
function go(){
    if (counter < inputGames){
        validateTurn();
        renderResults();

        play();
    }
};
//habilitamos el botón de jugar para volver a empezar y deshabilitamos el de reset-
function reset(){
    clearInterval(move);
    computerMove.src = 'img/defecto.png';
    playButton.disabled = false;
    resetButton.disabled = true;
    //Reiniciamos el valor que se muestra en el contador de partidas.
    total.textContent = 0;
    current.textContent = 0;
    counter = 0;//Inicializamos el contador de partidas por si pudiera estar de partidas anteriores.
    rock.src='./img/defecto.png';
    paper.src='./img/defecto.png';
    scissors.src='./img/defecto.png';

    
    let resultList = document.getElementById('historial');
    resultList.innerHTML = '';
    

    finPartida();
};

//Comienza el comportamiento de la máquina cambiando la imagen que dispone y el valor de esta
function startComputerTurn(){
    let option = 1;

    move = setInterval(() => {
            switch(option){
                case 1:
                    computerMove.src = './img/piedraOrdenador.png';
                    computerOption = Options.Rock;
                    option++;
                    break;
                case 2:
                    computerMove.src = './img/papelOrdenador.png';
                    computerOption = Options.Paper;
                    option++;
                    break;
                case 3:
                    computerMove.src = './img/tijeraOrdenador.png';
                    computerOption = Options.Scissors;
                    option=1;
                    break;
            }
        }, 3000);
};

//Valida el resultado una vez finalizado el turno
function validateTurn(){
    let result;

    if(playerOption == computerOption ) {
        result = '!!ohhh, empate!!';
    }
    else {
        switch(computerOption){
            case Options.Rock:
                if (playerOption == Options.Paper) {
                    result = inputName + ' gana!!';
                }
                else {
                    result = inputName + ' pierde!!';
                }
                break;
            case Options.Paper:
                if (playerOption == Options.Rock) {
                    result = inputName + ' pierde!!';
                }
                else {
                    result = inputName + ' gana!!';
                }
                break;
            case Options.Scissors:
                if (playerOption == Options.Rock) {
                    result = inputName + ' gana!!';
                }
                else {
                    result = inputName + ' pierde!!';
                }
                break;
        }
    }

    history.push({result});
    counter++;

    if (counter == inputGames){
        showWinner();
    }
};

//Muestra los resultados de la partida
function renderResults(){
    if(history!=null && history.length > 0) {
        let resultList = document.getElementById('historial');
        resultList.innerHTML = '';
        let li;

        for(let i=0; i<history.length; i++){
            li = document.createElement("li");
            li.appendChild(document.createTextNode(history[i].result));
            resultList.appendChild(li);
        }
    }
}

function showWinner(){
    let totalWinPlayer = history.filter(x => x.result.includes('Jugador gana!!')).length;
    let totalWinMachine = history.filter(x => x.result.includes('Jugador pierde!!')).length;

    if (totalWinMachine == totalWinPlayer) {
        alert('Se ha producido un empate');
    } else {
        alert(`${(totalWinPlayer > totalWinMachine) ? 'Ha ganado el jugador' : 'Ha ganado la máquina'}`);
    }
}

//comprobamos que la longitud del nombre es mayor que 3 y que no empieza por número.
function validateName(name){
    let result = (name.trim().length >3)&& (isNaN(name.charAt(0)));
    return result;
};

//comprobamos que son más de 0 partidas
function validateGames(games){
    return games>0;
}

