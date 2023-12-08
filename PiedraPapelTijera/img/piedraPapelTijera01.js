// Este array no se puede modificar,
var posibilidades = ["piedra", "papel", "tijera"];
//    //


//Creamos un array para las diferentes imagenes de la maquina
imgMaquina =new Array();
for(let i = 0;i<posibilidades.length;i++){
	imgMaquina[i] = ['./img/'+posibilidades[i]+'Ordenador.png'];	
}

//Creamos un array para las diferentes imagenes del jugador
imgUsuario =new Array();
for(let i = 0;i<posibilidades.length;i++){
	imgUsuario[i] = ['./img/'+posibilidades[i]+'Jugador.png'];
}


var nombre;
var partidas;

var userNumber;
var machineNumber;

var partidaEmpezada = false;
var contador = 0;

var nombreCorrecto = false;
var partidaCorrecta = false;

var opcionUsuario;
var opcionMaquina;

const EMPATA = 0;
const GANA = 1;
const PIERDE = 2;

var jugar = document.getElementsByTagName('button')[0];
var ya = document.getElementsByTagName('button')[1];
var reset = document.getElementsByTagName('button')[2];

var textos = document.getElementsByTagName('input');
var todasImagenes = document.getElementsByTagName('img');
var actual = document.getElementById('actual');
var total = document.getElementById('total');
var lista = document.getElementById('historial');


//al inicio tenemos deshabilitados los botones reset y ya
reset.disabled=true;
ya.disabled=true;


//funcion reiniciar que se ejecuta cuando se pulsa el botos reset
function reiniciar(){
	//habilita los dos textbox
	for(let i = 0;i<textos.length;i++){
		textos[i].disabled = false;
	}
	//inicializa las diferentes variables de control
	nombreCorrecto = false;
	partidaCorrecta = false;
	actual.innerHTML = 0;
	total.innerHTML = 0;
	todasImagenes[3].src ="./img/defecto.png";
	alert("Nueva partida");
	textos[1].value = 0;
	textos[1] = 0;
	contador = 0;
	reset.disabled=true;
	ya.disabled=true;
	jugar.disabled = false;
	lista.innerHTML += "Nueva partida";
}

//Funciones para comprobar inputs
//COmprueba el nombre pasado por parametro y lo valida cambiando la clase fondoRojo
function compruebaNombre(nombre){
	
	let nombrePrueba = nombre.value;
	if(validaNombre(nombrePrueba)==true){
		//console.log("Correcto");
		nombre.classList.remove('fondoRojo');
		nombreCorrecto = true;
	}else {
		//console.log("Incorrecto");
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
		
		if(partidasPrueba==0){
			//console.log("Incorrecto");
			partida.classList.add('fondoRojo');
			alert("El numero de partidas tiene que ser un numero mayor a 0");				
			textos[1].disabled=false;
		}else {
			//console.log("Correcto");
			partida.classList.remove('fondoRojo');	
			partidaCorrecta = true;
			textos[1].disabled=true;
		}
		
	}else {
		//console.log("Incorrecto");
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

//incluye los src de las diferentes imagenes
function incluyeImagenesJugador(){
	for(let i=0;i<posibilidades.length;i++){
		todasImagenes[i].src = imgUsuario[i];	
	}
}

	
//Funciones asociadas a los listener de las imagenes
function piedra(){
	opcionUsuario = posibilidades[0];
	//console.log(opcionUsuario);
	userNumber=0;
	piedraElegida();
}

function papel(){
	opcionUsuario = posibilidades[1];
	//console.log(opcionUsuario);
	userNumber=1;
	papelElegido();
}

function tijera(){
	opcionUsuario = posibilidades[2];
	//console.log(opcionUsuario);
	userNumber=2;
	tijeraElegida();
}

function piedraElegida(){
	todasImagenes[0].classList.add('seleccionado');
	todasImagenes[1].classList.add('noSeleccionado');
	todasImagenes[2].classList.add('noSeleccionado');

	todasImagenes[0].classList.remove('noSeleccionado');
	todasImagenes[1].classList.remove('seleccionado');
	todasImagenes[2].classList.remove('seleccionado');
}

function papelElegido(){
	todasImagenes[0].classList.add('noSeleccionado');
	todasImagenes[1].classList.add('seleccionado');
	todasImagenes[2].classList.add('noSeleccionado');

	todasImagenes[0].classList.remove('seleccionado');
	todasImagenes[1].classList.remove('noSeleccionado');
	todasImagenes[2].classList.remove('seleccionado');
}

function tijeraElegida(){
	todasImagenes[0].classList.add('noSeleccionado');
	todasImagenes[1].classList.add('noSeleccionado');
	todasImagenes[2].classList.add('seleccionado');

	todasImagenes[0].classList.remove('seleccionado');
	todasImagenes[1].classList.remove('seleccionado');
	todasImagenes[2].classList.remove('noSeleccionado');
}

//Funciones para calcular las tiradas

function calcula(usuarioTirada, maquinaTirada){
	let ultimaPosicion = posibilidades.length;
	if(usuarioTirada == maquinaTirada){
		return EMPATA;
	}
}

//calcula la tirada de la maquina devolviendo el valor dentro del array de posibilidades
function tiradaMaquina() {
	let tiradaMaquina = Math.floor(Math.random()*posibilidades.length);
	opcionMaquina = posibilidades[tiradaMaquina];
	machineNumber = tiradaMaquina;
	return posibilidades[tiradaMaquina];
}

//Devuelve la seleccion de la maquina e incluye la imagen correspondiente
function eleccionMaquina(){
	var seleccionMaquina = tiradaMaquina();
	todasImagenes[3].src = './img/'+seleccionMaquina+'Ordenador.png'
	return seleccionMaquina;
}


//calcula el resultado
function calculaResultado(userOption, machineOption){
	if(userOption === machineOption){
		return EMPATA;
	}else if(userOption === posibilidades[0]) {
		if(machineOption === posibilidades[1]) return PIERDE;
		if(machineOption === posibilidades[2]) return GANA;
	}else if(userOption === posibilidades[1]){
		if(machineOption === posibilidades[0]) return GANA;
		if(machineOption === posibilidades[2]) return PIERDE;
	}else if(userOption === posibilidades[2]){
		if(machineOption === posibilidades[0]) return PIERDE;
		if(machineOption === posibilidades[1]) return GANA;
	}
}

/*Funcion asociada al boton JUGAR. Comprueba si los inputs son correctos y si lo son
activa los listener para las imagenes
*/
function comprobaciones(){
	partidaEmpezada = true;
	//alert("El nombre debe comenzar por una letra y tener 4 o mas caracteres");
	compruebaNombre(textos[0]);
	nombre = textos[0].value;
	//console.log(nombre);
	//console.log(nombreCorrecto);
	//alert("El numero de partidas tiene que ser un numero mayor a 0");	
	compruebaPartidas(textos[1]);
	partidas=textos[1].value;
	//console.log(partidas);
	//console.log(partidaCorrecta);

	if((nombreCorrecto==true)&&(partidaCorrecta==true)==true){
		for(let i = 0;i<textos.length;i++){
			textos[i].disabled = true;
		}
		total.innerHTML = partidas;
		incluyeImagenesJugador();
		todasImagenes[0].addEventListener('click', piedra);
		todasImagenes[1].addEventListener('click', papel);
		todasImagenes[2].addEventListener('click', tijera);
		reset.disabled=false;
		ya.disabled=false;
		jugar.disabled=true;
	}
}

//va incluyendo los valores en la lista del html
function pintaResultado(resultado){
	if(resultado == 0){
		lista.innerHTML += "<li>Empate</li>";
	}else if(resultado == 1) {
		lista.innerHTML += "<li>Gana "+nombre+"</li>";
	}else if(resultado == 2){
		lista.innerHTML += "<li>Gana la máquina</li>";
	}
}

//funcion asociada al boton YA 
function tirada(){
	//console.log(contador);
	eleccionMaquina();
	//console.log(opcionUsuario);
	console.log(opcionMaquina);
	var resultado = calculaResultado(opcionUsuario, opcionMaquina);
	//console.log(resultado);
	pintaResultado(resultado);
	contador +=1;
	actual.innerHTML = contador;
	finPartida();
}

function finPartida(){
	partidaEmpezada = false;
	if(actual.innerHTML==total.innerHTML){
		ya.disabled=true;
		//alert("Si quieres una nueva partida, pulsa reset e introduce el nuevo numero de tiradas.")	
		todasImagenes[0].removeEventListener('click', piedra);
		todasImagenes[1].removeEventListener('click', papel);
		todasImagenes[2].removeEventListener('click', tijera);
		piedraElegida();
	}
}



reset.addEventListener('click', reiniciar);

jugar.addEventListener('click', comprobaciones);

ya.addEventListener('click', tirada);


