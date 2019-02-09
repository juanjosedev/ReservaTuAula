<?php 
	
	require_once("../../modelo/listaAulas.php");
	require_once("../../modelo/listaReserva.php");

	$listaHorarios = new listaAulas();
	$listaReservasEstudiante = new listaReservas($documento, "Estudiante");
	$estudiante = new Estudiante(98102505948, "correo", "José", "Gutierrez","123", "foto");	

	if(isset($_POST["cancelar"])){
		$estudiante->cancelarReserva($_POST["id_reserva"]);
		header("Location: ../usuario/historial.php");
	}
?>