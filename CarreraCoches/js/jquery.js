$(document).ready(function(){

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

	var ancho = (screen.width)-75;
	$("#titulin").html("La línea de meta se encuentra a " + ancho + " pixeles");

	$("#boton2").hide();



	$("#desplegable").change(function() {
		let participante = $("#desplegable").val();
		
		document.getElementById('cont-prin').innerHTML = "";
		/*document.getElementById('posiciones').innerHTML += "Posicion";*/
		/*document.getElementById('posiciones').innerHTML += "<table><tr><th>Coche</th><th>Posicion</th></tr>";	*/
		for (i=0;i<participante;i++){
		document.getElementById('cont-prin').innerHTML += "<div class='carretera'><img class='caja' id = 'coche" + i +"' src="+cochesImg[i]+"></div>";	
		
		}


	});


	
	$("#boton1").click(function() {
			
			
			var pos = 1;

			function meta(){
				var pos1 = pos;
				pos += 1;
				return pos1;
			}

			
			$("img").each(function(index, element){

				var velocidad = ((Math.random() * 10) + 1).toFixed(2)*1000;
				$(element).animate({left:ancho},velocidad,"swing", function(){
					res = meta();
					/*$('#resultado').html(res);*/
					document.getElementById('resultado').innerHTML +="<li>Coche" + (index + 1) + " ha llegado en la posicion " + res + " y ha tardado " + (velocidad/1000) + " segundos en recorrer los " + ancho + " pixeles</li>";

				});
				
			});
	

			$("#boton1").hide();
			$("#boton2").show();

	});


	
	$("#boton2").click(function() {
		$(".caja").stop();
		$(".caja").animate({left:"0px"},2000);
		document.getElementById('resultado').innerHTML ="";
		$("#boton1").show();
		$("#boton2").hide();
	});


	$("#velocidad").html(ancho);

	
});