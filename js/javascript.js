$(document).ready(function() {

	function getQueryVariable(variable) {//Sacado de StackOverFlow la mejor web de internet
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0; i < vars.length; i++) {
		   var pair = vars[i].split("=");
		   if(pair[0] == variable) {
		       return pair[1];
		   }
		}
		return false;
	}

	$('.hide-5').delay(3000).fadeOut(2000);

	function cargarTablaAulas(i){
		if(i < 5){
			$('#tablaAulas').load('../../controlador/Aulas.php');
			return i + cargarTablaAulas(i+1);
		}else{
			return 0;
		}
	}
	

	var datosClase = '?id_aula='+getQueryVariable("id_aula");
	$('#tablaAulas').load('../../controlador/Aulas.php',function(){
		$('.guardar').each(function(){
			$(this).click(function (e){
				if($(this).parents('#formulario_modificar').find('#capacidad').val() == ""){
					e.preventDefault();
				}
			});
		});
		$('.formulario_modificar_aula').each(function (){
			$(this).submit(function (){
				if($('#'+$(this).attr('id')).find('#otro_valor').val() != "" && $('#'+$(this).attr('id')).find('#otro')[0].checked){
					$('#'+$(this).attr('id')).find('#otro').val($('#'+$(this).attr('id')).find('#otro_valor').val());
				}
				var datosAula = $(this).serialize()+'&id='+$(this).attr('id')+'&guardar=Guardar';
				$.getJSON("../../controlador/Aulas.php", datosAula);
				location.reload();
			});
		});

	});
	
	if($(window).width() > 767){
		$('body').css('marginLeft','75px');
	}else{
		$('body').css('marginLeft','0px');
	}	
	$(window).resize(function(){
		if($(window).width() > 767){
			$('body').css('marginLeft','75px');
		}else{
			$('body').css('marginLeft','0px');
		}		
	});

	// Menú lateral
	$('#btng-menu').click(function() {
		var e = '-200px';
		var n = $('#menu').css('left') == e;
		if(n){
			$('#menu').stop().animate({left:'0px'},800);
	    	$('#icon').css("transform","rotate(360deg)");
	    	$('body').animate({marginLeft:'275px'},800);
		}else{
			$('#menu').stop().animate({left:e},1200,'easeOutBounce');
	    	$('#icon').css("transform","rotate(0deg)");
	    	$('body').animate({marginLeft:'75px'},1200,'easeOutBounce');
		}
	});
	// Fin Menú lateral

	$("#slt-hora-inicio").blur(function(){
		var numero = $(this).val();
		var i = parseInt(numero) + 1;
		$("#slt-hora-final").html("");
		while(i <= 19){
			$("#slt-hora-final").html($("#slt-hora-final").html()+"<option value='"+i+"'>"+i+":00</option>");
			i++;
		}
	});

	// Reservar Aula cambio de ventanas

	function procesarDatos(objetojson){
		
		var vecHorasInicio = objetojson.nuevoArreglo;
		var vecHorasFinales = [];

		for (var i = 0; i < vecHorasInicio.length; i++) {
			vecHorasFinales[vecHorasFinales.length] = vecHorasInicio[i] + 1;
		};
		var i = 0;
		var option_cadena = "";
		while(i < vecHorasInicio.length){
			option_cadena = option_cadena + "<option value='"+vecHorasInicio[i]+":00'>"+vecHorasInicio[i]+":00"+"</option>";
			i++;
		}
		$("#horaInicio"+objetojson.idAula).html(option_cadena);
		i = 0;
		option_cadena = "";
		while(i < vecHorasFinales.length){
			option_cadena = option_cadena + "<option value='"+vecHorasFinales[i]+":00'>"+vecHorasFinales[i]+":00"+"</option>";
			i++;
		}
		$("#horaFin"+objetojson.idAula).html(option_cadena);
		/*var i = 0;
		while(i < objetojson.nuevoArreglo.length){
			alert(objetojson.nuevoArreglo[i]);
			i++;
		}*/

	}

	$('.jj-date').datepicker({
	    format: "dd/mm/yyyy",
	    weekStart: 1,
	    maxViewMode: 3,
	    language: "es",
	    daysOfWeekDisabled: "0",
	    startDate: '+1d'
	});
	$('.paso2').hide();
	$('.cont2').hide();
	$('.atras2').hide();
	$('.paso3').hide();
	$('.cont3').hide();
	$('.atras3').hide();
	$('.paso4').hide();
	$('.conf4').hide();
	$('.atras4').hide();
	$('.tituloPaso2').hide();
	$('.tituloPaso3').hide();
	$('.tituloPaso4').hide();
	$('.cont1').each(function(){
		$(this).click(function (e) {
			if($(this).parent().parent().find(".fecha_reserva").val() != ''){
				
				var fecha = $(this).parent().parent().find(".fecha_reserva").val();
				var id_aula = parseInt($(this).attr("id").substring(5));
				var datosEnviar = "fecha="+fecha+"&id_aula="+id_aula;

				$.getJSON("../../controlador/ComprobarHoras.php", datosEnviar, procesarDatos);

				$(this).hide();
				$(this).parent().parent().find('.paso1').hide();
				$(this).parent().parent().find('.tituloPaso1').hide();
				$(this).parent().parent().find('.paso2').show();
				$(this).parent().parent().find('.cont2').show();
				$(this).parent().parent().find('.atras2').show();
				$(this).parent().parent().find('.tituloPaso2').show();
				$(this).parent().parent().find('.progress-bar').animate({'width':'50%','minWidth':'50%'},400);
			}
			else{
				alert("Elige una fecha");
			}
			e.preventDefault();
		});
	});
	$('.cont2').each(function(){
		$('.cont2').click(function (e) {
			$(this).hide();
			$(this).parent().parent().find('.paso2').hide();
			$(this).parent().parent().find('.atras2').hide();
			$(this).parent().parent().find('.tituloPaso2').hide();
			$(this).parent().parent().find('.paso3').show();
			$(this).parent().parent().find('.cont3').show();
			$(this).parent().parent().find('.atras3').show();
			$(this).parent().parent().find('.tituloPaso3').show();
			$(this).parent().parent().find('.progress-bar').animate({'width':'75%','minWidth':'75%'},400);
			e.preventDefault();
		});
	});
	$('.cont3').each(function(){
		$('.cont3').click(function (e){
			$(this).hide();
			$(this).parent().parent().find('.paso3').hide();
			$(this).parent().parent().find('.atras3').hide();
			$(this).parent().parent().find('.tituloPaso3').hide();
			$(this).parent().parent().find('.paso4').show();
			$(this).parent().parent().find('.conf4').show();
			$(this).parent().parent().find('.atras4').show();
			$(this).parent().parent().find('.tituloPaso4').show();
			$(this).parent().parent().find('.progress-bar').animate({'width':'100%','minWidth':'100%'},400);
			$(this).parent().parent().find('.fecha_confirmar').val($(this).parent().parent().find('.fecha_reserva').val());
			$(this).parent().parent().find('.hora_confirmar').val($(this).parent().parent().find('.horaInicio').val()+' - '+$(this).parent().parent().find('.horaFin').val());
			e.preventDefault();
		});
	});
	$('.atras2').each(function(){
		$('.atras2').click(function (e) {
			$(this).hide();
			$(this).parent().parent().find('.cont2').hide();
			$(this).parent().parent().find('.paso2').hide();
			$(this).parent().parent().find('.tituloPaso2').hide();
			$(this).parent().parent().find('.paso1').show();
			$(this).parent().parent().find('.cont1').show();
			$(this).parent().parent().find('.tituloPaso1').show();
			$(this).parent().parent().find('.progress-bar').animate({'width':'25%','minWidth':'25%'},400);
			e.preventDefault();
		});		
	});
	$('.atras3').each(function(){
		$('.atras3').click(function (e) {
			$(this).hide();
			$(this).parent().parent().find('.paso3').hide();
			$(this).parent().parent().find('.cont3').hide();
			$(this).parent().parent().find('.tituloPaso3').hide();
			$(this).parent().parent().find('.paso2').show();
			$(this).parent().parent().find('.atras2').show();
			$(this).parent().parent().find('.cont2').show();
			$(this).parent().parent().find('.tituloPaso2').show();
			$(this).parent().parent().find('.progress-bar').animate({'width':'50%','minWidth':'50%'},400);
			e.preventDefault();
		});
	});
	$('atras4').each(function(){
		$('.atras4').click(function (e) {
			$(this).hide();
			$(this).parent().parent().find('.paso4').hide();
			$(this).parent().parent().find('.conf4').hide();
			$(this).parent().parent().find('.tituloPaso4').hide();
			$(this).parent().parent().find('.paso3').show();
			$(this).parent().parent().find('.atras3').show();
			$(this).parent().parent().find('.cont3').show();
			$(this).parent().parent().find('.tituloPaso3').show();
			$(this).parent().parent().find('.progress-bar').animate({'width':'75%','minWidth':'75%'},400);

			e.preventDefault();
		});
	});
	$('.frmReservar').each(function(){
		$(this).submit(function (e) {
			/*var altoBody = $('#contenidoReserva').height() + $('#contenidoReservaHeader').height();
			$('.contenidoReserva').hide();
			$('.contenidoReservaHeader').animate({height: altoBody+'px'},800);
			$(this).hide();
			$('.atras4').hide();
			$('.tituloPaso4').hide();
			$('.contenidoReservaHeader h3').html('Aula Reservada '+'<span class="icon-checkmark">');*/
		});
	});

	// Fin Reservar Aula cambio de ventanas
	
	//AgregarAula

	$('#formulario_agregar').submit(function (){
		if($('#otro_valor_agregar').val() != "" && $('#otro_check_agregar')[0].checked){
			$('#otro_check_agregar').val($('#otro_valor_agregar').val());
		}
		var datosAula = $(this).serialize()+'&agregar=Agregar';
		$.getJSON("../../controlador/Aulas.php", datosAula);
		var n = cargarTablaAulas(0);
		document.getElementById("formulario_agregar").reset();
		return false;
	});

	//Fin AgregarAula
});