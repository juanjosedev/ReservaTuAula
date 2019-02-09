<?php

	//require_once("../../modelo/listaReserva.php");
	require_once("../../modelo/listaAulas.php");
	//require_once("../../modelo/listaEstudiantes.php");
	require_once("../../modelo/Administrador.php");

	$listaReservas = new listaReservas(Null, "Todo");
	$listaEstudiantes = new listaEstudiantes();
	$listaAulas = new listaAulas();
	$Administrador = new Administrador(98102505948,"José","correo","123");

	if(isset($_POST["confirmar"])){
		$Administrador->confirmarReserva($_POST["id_reserva"]);
		header("Location: ../administrador/verificar.php");
	}
	if(isset($_POST["cancelar"])){
		$Administrador->cancelarReserva($_POST["id_reserva"]);
		header("Location: ../administrador/verificar.php");
	}
?>