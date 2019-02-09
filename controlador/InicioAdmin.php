<?php
	
	date_default_timezone_set ("America/Bogota");

	require_once("../../modelo/listaAulas.php");
	require_once("../../modelo/listaEstudiantes.php");
	require_once("../../modelo/listaReserva.php");

	$listaAulas = new listaAulas();
	$listaEstudiantes = new listaEstudiantes();
	$listaReservas = new listaReservas(Null, "Todo");

	$vector_grafica = $listaReservas->totalReservasPorDia();

?>