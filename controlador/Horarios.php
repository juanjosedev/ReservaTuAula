<?php

	require_once("../../modelo/listaAulas.php");
	require_once("../../modelo/listaEstudiantes.php");

	$listaHorarios = new listaAulas();
	$listaEstudiantes = new listaEstudiantes();

	require_once("../../vista/Horarios.php");

?>