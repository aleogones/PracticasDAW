// Este array no se puede modificar,
var posibilidades = ["piedra", "papel", "tijera"];
//    //

//DECLARACION DE VARIABLES A USAR
var longitud = posibilidades.length;
var jugar = document.getElementsByTagName('button')[0];
var ya = document.getElementsByTagName('button')[1];
var reset = document.getElementsByTagName('button')[2];

var partidaEmpezada = false;
var contador = 0;

var opcionUsuario;
var opcionMaquina;

var nombreCorrecto = false;
var partidaCorrecta = false;

var actual = document.getElementById('actual');
var total = document.getElementById('total');
var lista = document.getElementById('historial');
var textos = document.getElementsByTagName('input');
var todasImagenes = document.getElementsByTagName('img');

var nombre;
var partidas;

//Creamos un array para las diferentes direcciones de las imagenes de la maquina
imgMaquina =new Array();
for(let i = 0;i<longitud;i++){
    imgMaquina[i] = ['./img/'+posibilidades[i]+'Ordenador.png'];    
}

//Creamos un array para las diferentes direcciones de las imagenes del jugador
imgUsuario =new Array();
for(let i = 0;i<longitud;i++){
    imgUsuario[i] = ['./img/'+posibilidades[i]+'Jugador.png'];
}

//Al inicio de la aplicacion reset y ya deshabilitados.
reset.disabled=true;
ya.disabled=true;


//funcion para restablecer los valores para empezar de nuevo salvo el nombre introducido al principio
//y el historico de partidas.
function reiniciar(){
    lista.innerHTML += 'Nueva partida';
    for(let i=0;i<textos.length;i++){
        textos[i].disabled=false;
    }
    textos[1]=0;
    textos[1].value=0;
    actual.innerHTML = 0;
    total.innerHTML = 0;
    todasImagenes[3].src ="./img/defecto.png";
    jugar.disabled = false;
    contador = 0;
    nombreCorrecto = false;
    partidaCorrecta = false;
    reset.disabled=true;
    ya.disabled=true;
}

//Funciones para comprobar inputs
//COmprueba el nombre pasado por parametro y lo valida cambiando la clase fondoRojo
function compruebaNombre(nombre){
    
    let nombrePrueba = nombre.value;
    if(validaNombre(nombrePrueba)==true){
        nombre.classList.remove('fondoRojo');
        nombreCorrecto = true;
    }else {
        nombre.classList.add('fondoRojo');
        alert("El nombre debe comenzar por una letra y tener 4 o mas caracteres");
        
    }
}

//Valida el nombre en funcion a la expresion regular y devuelve un booleano
function validaNombre(nombre){
    const expresion = /^\D{1}[\w.\-]{3,}/g;
    return expresion.test(nombre);
}

//comprueba si el numero introducido es un numero mayor a 0 asignando la clase fondoRojo
function compruebaPartidas(partida){
    let partidasPrueba = partida.value;
    
    if(validaPartidas(partidasPrueba)==true) {
        
        if(partidasPrueba<=0){
            partida.classList.add('fondoRojo');
            alert("El numero de partidas tiene que ser un numero mayor a 0");               
            textos[1].disabled=false;
        }else {
            partida.classList.remove('fondoRojo');  
            partidaCorrecta = true;
            textos[1].disabled=true;
        }
        
    }else {
        partida.classList.add('fondoRojo');
        alert("El numero de partidas tiene que ser un numero mayor a 0");   
        textos[1].disabled=false;
    }
}

//Aunque el input es type number, esta funcion valida que solo pueda ser un digito numerico
function validaPartidas(numero){
    const expresion = /[0-9]*/;
    return expresion.test(numero);
}

//ponemos todas las imagenes con la clase noSeleccionado
function incluyeImagenesJugador(){
    for(let i=0;i<longitud;i++){
        todasImagenes[i].src = imgUsuario[i]; 
        todasImagenes[i].classList.remove('seleccionado');
        todasImagenes[i].classList.remove('noSeleccionado');
        todasImagenes[i].classList.add('noSeleccionado');
    }
}

//se obtiene la tirada aleatoria de la maquina y se elige la imagen correspondiente
function tiradaMaquina() {
    opcionMaquina = Math.floor(Math.random()*longitud);
    let seleccionMaquina = posibilidades[opcionMaquina];
    todasImagenes[3].src = './img/'+seleccionMaquina+'Ordenador.png'
}

//Comprobamos el nombre y el numero de partidas y si es correcto se desactivan los textbox y nos permite seleccionar una imagen
function comprobaciones(){
    partidaEmpezada = true;
    compruebaNombre(textos[0]);
    nombre = textos[0].value;
    compruebaPartidas(textos[1]);
    partidas=textos[1].value;

    if((nombreCorrecto==true)&&(partidaCorrecta==true)==true){
        for(let i = 0;i<textos.length;i++){
            textos[i].disabled = true;
        }
        total.innerHTML = partidas;
        incluyeImagenesJugador();
        for(let i=0;i<longitud;i++){
            
            todasImagenes[i].onclick=function(){
                opcionUsuario = i;
                incluyeImagenesJugador();
                console.log(opcionUsuario);
                todasImagenes[i].classList.remove('noSeleccionado');          
                todasImagenes[i].classList.add('seleccionado');
            }
        }

        reset.disabled=false;
        ya.disabled=false;
        jugar.disabled=true;
    }
}

/*
Para calcular el resultado, si son iguales empate; si se elige el primero siempre pierde salvo que el oponente tenga la eleccion mas alta.
El resultado lo incluye en la lista de historial
*/
function calculaResultado(user, machine){
    if(user == machine){
        return lista.innerHTML += "<li>Empate</li>";
    }else if((user == 0) && (machine ==(longitud-1))){
        lista.innerHTML += "<li>Gana "+nombre+"</li>";
    }else if((user == (longitud-1)) && (machine == 0)){
        lista.innerHTML += "<li>Gana la máquina</li>";
    }else if(user>machine){
        lista.innerHTML += "<li>Gana "+nombre+"</li>";
    }else if(user<machine){
        lista.innerHTML += "<li>Gana la máquina</li>";
    }
}

//realizamos la tirada de la maquina y realizamos la llamada a calculaResultado
function tirada(){
    tiradaMaquina();
    calculaResultado(opcionUsuario, opcionMaquina);
    contador +=1;
    actual.innerHTML = contador;
    finPartida();
}

//si el numero de partidas actual coincide con el total, solo nos deja pulsar Reset para comenzar una nueva.
function finPartida(){
    partidaEmpezada = false;
    if(actual.innerHTML==total.innerHTML){
        ya.disabled=true;
    }
}

//Listener de los 3 botones que aparecen
reset.addEventListener('click', reiniciar);
jugar.addEventListener('click', comprobaciones);
ya.addEventListener('click', tirada);