$('#agregar').click(function (e) {
	if($('#aula').val() == '' || $('#bloque').val() == '' || $('#capacidad').val() == ''){
		alert("Te faltan campos por llenar");
		e.preventDefault();
	}
	if(!/^([0-9])*$/.test($('#aula').val()) || !/^([0-9])*$/.test($('#capacidad').val())) {
		alert("Los campos aula y capacidad solo aceptan números");
		e.preventDefault();
	}
	if($('#otro_check_agregar')[0].checked){
		if($('#otro_valor_agregar').val() == ''){
			alert("Tienes que ingresar los otros implementos");
			e.preventDefault();
		}else{
			$('#otro_check_agregar').val($('#otro_valor_agregar').val());
		}
	}
});