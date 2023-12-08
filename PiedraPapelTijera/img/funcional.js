// Este array no se puede modificar,
var posibilidades = ["piedra", "papel", "tijera"];
//    //


imgMaquina =new Array();
imgMaquina[0] = ['./img/'+posibilidades[0]+'Ordenador.png'];
imgMaquina[1] = ['./img/'+posibilidades[1]+'Ordenador.png'];
imgMaquina[2] = ['./img/'+posibilidades[2]+'Ordenador.png'];

imgUsuario =new Array();
imgUsuario[0] = ['./img/'+posibilidades[0]+'Jugador.png'];
imgUsuario[1] = ['./img/'+posibilidades[1]+'Jugador.png'];
imgUsuario[2] = ['./img/'+posibilidades[2]+'Jugador.png'];

const EMPATA = 0;
const GANA = 1;
const PIERDE = 2;

nombreCorrecto = false;
partidaCorrecta = false;

var opcionUsuario;
var opcionMaquina;
var contador = 0;
var partidaEmpezada = false;
var jugar = document.getElementsByTagName('button')[0];
var ya = document.getElementsByTagName('button')[1];
var reset = document.getElementsByTagName('button')[2];

var todasImagenes = document.getElementsByTagName('img');


var numeroPartidas = document.getElementsByTagName('input')[1];
var nombreUsuario = document.getElementsByTagName('input')[0];

var actual = document.getElementById('actual');
var total = document.getElementById('total');
var lista = document.getElementById('historial');

//VALIDAR NOMBRE Y PARTIDAS

function compruebaNombre(nombre) {
	let nombreUsuario = nombre.value;
	if (validaNombre(nombreUsuario)==true){
		console.log("Correcto");
		nombre.classList.remove('fondoRojo');
		nombreCorrecto = true;
	} else {
		console.log("Incorrecto");
		nombre.classList.add('fondoRojo');
		
		alert("El nombre debe comenzar por una letra y tener 4 o mas caracteres");
		
	}
}

function validaNombre(nombre){
	console.log(nombre);
	const expresion = /^\D{1}[\w.\-]{3,}/;
	
	return expresion.test(nombre);
}

function compruebaNumPartidas(numero) {
	numeroPartidas = numero.value;
	//total.innerHTML = numeroPartidas;
	if(validaPartidas(numeroPartidas)==true) {
		
		if(numeroPartidas==0){
			console.log("Incorrecto");
			numero.classList.add('fondoRojo');
			alert("El numero de partidas tiene que ser un numero mayor a 0");		
			
		}else {
			console.log("Correcto");
			numero.classList.remove('fondoRojo');	
			partidaCorrecta = true;
		}
		
	}else {
		console.log("Incorrecto");
		numero.classList.add('fondoRojo');
		alert("El numero de partidas tiene que ser un numero mayor a 0");	
		
	}
}

function validaPartidas(numero){
	console.log(numero);
	const expresion = /[0-9]*/;
	
	return expresion.test(numero);
}



//EMPEZAR Y REINICIAR PARTIDA
function empezarPartida(){
	todasImagenes[0].src = imgUsuario[0];
	todasImagenes[1].src = imgUsuario[1];
	todasImagenes[2].src = imgUsuario[2];
	
	actual.innerHTML = contador;
	total.innerHTML = numeroPartidas;
	//historial.innerHTML += "<li>Nueva partida</li>"
}

function reiniciar(){
	nombreCorrecto = false;
	partidaCorrecta = false;
	nombreUsuario.disabled = false;
	numeroPartidas.disabled = false;
	//nombreUsuario.innerHTML = 0;
	numeroPartidas.value = 0;
	actual.innerHTML = 0;
	total.innerHTML = 0;
	jugar.style.visibility = 'visible';
	numeroPartidas.value='0';
	lista.innerHTML += "<li>Nueva partida</li>";
	
	
	todasImagenes[3].src = './img/defecto.png';
	
}


function pintaResultado(resultado){
	if(resultado == 0){
		lista.innerHTML += "<li>Empate</li>"
	}else if(resultado == 1) {
		lista.innerHTML += "<li>Gana "+nombreUsuario.value+"</li>"
	}else if(resultado == 2){
		lista.innerHTML += "<li>Gana la máquina</li>"
	}
}


//ELECCION MAQUINA Y JUGADOR
function eleccionMaquina(){
	var seleccionMaquina = tiradaMaquina();
	todasImagenes[3].src = './img/'+seleccionMaquina+'Ordenador.png'
	return seleccionMaquina;

}

function tiradaMaquina() {
	let tiradaMaquina = Math.floor(Math.random()*3);
	opcionMaquina = posibilidades[tiradaMaquina];
	return posibilidades[tiradaMaquina];
}



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


function piedraElegida(){
	todasImagenes[0].classList.add('seleccionado');
	todasImagenes[1].classList.add('noSeleccionado');
	todasImagenes[2].classList.add('noSeleccionado');

	todasImagenes[0].classList.remove('noSeleccionado');
	todasImagenes[1].classList.remove('seleccionado');
	todasImagenes[2].classList.remove('seleccionado');
	
}

function piedra(){
	opcionUsuario = posibilidades[0];
	console.log(opcionUsuario);
	piedraElegida();
}

function papelElegido(){
	todasImagenes[0].classList.add('noSeleccionado');
	todasImagenes[1].classList.add('seleccionado');
	todasImagenes[2].classList.add('noSeleccionado');

	todasImagenes[0].classList.remove('seleccionado');
	todasImagenes[1].classList.remove('noSeleccionado');
	todasImagenes[2].classList.remove('seleccionado');
	
}

function papel(){
	opcionUsuario = posibilidades[1];
	console.log(opcionUsuario);
	papelElegido();
}

function tijeraElegida(){
	todasImagenes[0].classList.add('noSeleccionado');
	todasImagenes[1].classList.add('noSeleccionado');
	todasImagenes[2].classList.add('seleccionado');

	todasImagenes[0].classList.remove('seleccionado');
	todasImagenes[1].classList.remove('seleccionado');
	todasImagenes[2].classList.remove('noSeleccionado');
	
}

function tijera(){
	opcionUsuario = posibilidades[2];
	console.log(opcionUsuario);
	tijeraElegida();
}

nombreUsuario.addEventListener('blur', function(){
	compruebaNombre(this);
});

numeroPartidas.addEventListener('blur', function(){
	compruebaNumPartidas(this);

});

reset.addEventListener('click', function(){
	reiniciar();
	partidaEmpezada = false;
	todasImagenes[0].removeEventListener('click', piedra);
	todasImagenes[1].removeEventListener('click', papel);
	todasImagenes[2].removeEventListener('click', tijera);
	piedraElegida();
});


jugar.addEventListener('click', function(){
	


	if((nombreCorrecto==true) && (partidaCorrecta==true)){
		partidaEmpezada = true;
		nombreUsuario.disabled = true;
		numeroPartidas.disabled = true;

		if(partidaEmpezada=true){
			empezarPartida();
			jugar.disabled = true;

			todasImagenes[0].addEventListener('click', piedra);
			todasImagenes[1].addEventListener('click', papel);
			todasImagenes[2].addEventListener('click', tijera);
		} 
		
	}
	
	ya.disabled = false;
	
});


ya.addEventListener('click', function(){
		
	if(contador<numeroPartidas){
		eleccionMaquina();
		console.log(opcionUsuario);
		console.log(opcionMaquina);
		var resultado = calculaResultado(opcionUsuario, opcionMaquina);
		console.log(resultado);
		pintaResultado(resultado);
		contador += 1;
		console.log("contador"+contador);
		console.log("numeroPartidas" + numeroPartidas);
		actual.innerHTML = contador;
		numeroPartidas.disabled = true;
		
	} else{
		
		alert("Inrtoduce el nuevo numero de partidas y pulsa jugar");
		contador = 0;
		actual.innerHTML = contador;
		//historial.innerHTML += "<li>Nueva partida</li>"
		numeroPartidas.disabled = false;
		jugar.disabled = false;
		ya.disabled = true;
		//empezarPartida();
	}
	
});

