function init(){
	//Inicializamos el div de resultado no visible
	$("#resultado").hide();
}
function ocultar(){
	$("#contentCalculaimc").hide();
	$("#contentsection1").hide();
	$("#contentsection2").hide();
	$("#formimcprincipal").hide();
}
function mostrar(){
	$("#contentCalculaimc").show();
	$("#contentsection1").show();
	$("#contentsection2").show();
	$("#formimcprincipal").show();
}
function limpiar(){
	$("#valorPeso").val("");
	$("#valorAltura").val("");
}
function ocultarmensajes(){
	$("#delgado").hide();
	$("#normal").hide();
	$("#sobrepeso").hide();
	$("#obeso").hide();
}
function mostrarmensajes(){
	$("#delgado").show();
	$("#normal").show();
	$("#sobrepeso").show();
	$("#obeso").show();
}


function calcular(){
	var peso=$("#valorPeso").val();
	var talla=$("#valorAltura").val();

	//Validamos inicialmente

	if (peso!="" && peso>20 && peso<180 && talla<250 && talla>100 &&  talla!=""){

		//Mostramos el div de resultados
		$("#resultado").show();
		//Obtenemos los valores ingresados por el usuario
		

		//Calculamos el imc
		talla=talla/100;
		var imc=peso/(talla*talla);

		var estado="";

		if (imc<18){
			estado="Peso Bajo";
			ocultarmensajes();
			$("#delgado").show();
		}
		else if(imc>=18 && imc<25){
			estado="Peso Normal";
			ocultarmensajes();
			$("#normal").show();
		}
		else if(imc>=25 && imc<27){
			estado="Sobrepeso";
			ocultarmensajes();
			$("#sobrepeso").show();
		}
		else if(imc>=27 && imc<30){
			estado="Obesidad grado I";
			ocultarmensajes();
			$("#sobrepeso").show();
		}
		else if(imc>=30 && imc<40){
			estado="Obesidad grado II";
			ocultarmensajes();
			$("#sobrepeso").show();
		}
		else if(imc>=40 && imc<50){
			estado="Obesidad grado III";
			ocultarmensajes();
			$("#obeso").show();
		}
		else {
			estado="obesidad grado IV";
			ocultarmensajes();
			$("#obeso").show();
		}

        
		$("#imc").html(imc);
		$("#estado").html(estado);
		ocultar();
		
		//Mostramos los resultados
	}
	else{
		$("#resultado").hide();
		alert("inserte datos correctos o rellene todos los campos");
	}
}
function cancelar(){
	$("#resultado").hide();
	limpiar();
	mostrar();
}
init();