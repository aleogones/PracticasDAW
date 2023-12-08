$(document).ready(function(){
	//Creamos el array con las direcciones de las imagenes
	cochesImg = new Array();
	cochesImg[0] = ['./img/car1.png'];
	cochesImg[1] = ['./img/car2.png'];
	cochesImg[2] = ['./img/car3.png'];
	cochesImg[3] = ['./img/car4.png'];
	cochesImg[4] = ['./img/car5.png'];
	cochesImg[5] = ['./img/car6.png'];
	cochesImg[6] = ['./img/car7.png'];
	cochesImg[7] = ['./img/car8.png'];
	cochesImg[8] = ['./img/car9.png'];

	//Calculamos el ancho de la pantalla donde estemos abriendo el navegador
	//Le restamos 75 que es el ancho que hemos dado a las imagenes en el CSS
	var ancho = (screen.width)-75;

	//Mostramos la longitud que deben recorrer los coches
	$("#titulin").html("La línea de meta se encuentra a " + (ancho+75) + " pixeles");
	//Al ser el inicio de la aplicacion, ocultamos el boton reiniciar
	$("#boton2").hide();



	$("#desplegable").change(function() {
		//Guardamos el valor que se seleccione en el desplegable
		let participante = $("#desplegable").val();
		
		//Ponemos el contenedor donde se generan los coches vacio cada vez que modificamos el valor del desplegable	
		document.getElementById('cont-prin').innerHTML = "";
		//Vamos generando elementos div.carretera donde vamos incluyendo los coches.
		for (i=0;i<participante;i++){
		
			document.getElementById('cont-prin').innerHTML += "<div class='carretera' ><img class='caja' id = 'coche" + i +"' src="+cochesImg[i]+"></div>";	
		

		}


	});


	
	$("#boton1").click(function() {
			
			//Creamos variable para el primer clasificado
			var pos = 1;

			//la funcion va devolviendo la posicion y va incrementando tal como van llegando
			function meta(){
				var pos1 = pos;
				pos += 1;
				return pos1;
			}

			//vamos recorriendo los elementos img que hemos creado			
			$("img").each(function(index, element){
				//generamos el tiempo con el metodo random
				var velocidad = ((Math.random() * 10) + 1).toFixed(2)*1000;
				//vamos usando el metodo animate para cada uno de los elementos
				//Incluimos el metodo swing para que se note la aceleracion
				$(element).animate({left:ancho},velocidad,"swing", function(){
					res = meta();
					/*$('#resultado').html(res);*/
					//Incluimos con etiquetas <li> tal como van terminando los coches
					//incluimos los datos de la carrera de cada coche
					document.getElementById('resultado').innerHTML +="<li>Coche" + (index + 1) + " ha llegado en la posicion " + res + 
																	" y ha tardado " + (velocidad/1000) + " segundos en recorrer los " + (ancho+75) + 
																	" pixeles</li>";

				});
				
			});
	
			//Como hemos empezado la carrera, ocultamos el boton de inicio y mostramos el de parar
			$("#boton1").hide();
			$("#boton2").show();

	});


	
	$("#boton2").click(function() {
		//Todos los elementos coche tienen incluida la clase caja
		//Paramos todos los coches
		$(".caja").stop();
		//enviamos a todos los coches al inicio de la pista a la vez
		$(".caja").animate({left:"0px"},2000);
		//Borramos los datos dentro de la lista ordenada
		document.getElementById('resultado').innerHTML ="";
		//mostramos el boton inicio y ocultamos el de parada
		$("#boton1").show();
		$("#boton2").hide();
	});


		
});