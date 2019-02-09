<?php
	
	echo phpversion();

	$fecha = isset($_GET["fecha"]) ? $_GET["fecha"] : "21/05/2018";
	$id_aula = isset($_GET["id_aula"]) ? $_GET["id_aula"] : 100;

	$anho = substr($fecha, 6,9);
	$mes = substr($fecha, 3,2);
	$dia = substr($fecha, 0,2);
	$fecha = $anho."-".$mes."-".$dia;

	require_once("../modelo/listaAulas.php");

	$listaAulas = new listaAulas();

	$aula = $listaAulas->buscarAula($id_aula);

	$horasDisponibles = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
	$tam = count($horasDisponibles);

	$horasDisponibles = $aula->getDato()->getHorario()->availableHoursVector($fecha, $horasDisponibles);


	$horasDisponibles = $aula->getDato()->getHistorialAula()->availableHoursVector($fecha, $horasDisponibles);

	$nuevoArreglo = array();	

	for ($i=0; $i < $tam ; $i++) { 
		if(isset($horasDisponibles[$i])){
			array_push($nuevoArreglo, $horasDisponibles[$i]);
		}
	}

	$obj = new stdClass();

	$i = 0;

	while ($i < count($nuevoArreglo)) {
		$obj->nuevoArreglo[$i] = $nuevoArreglo[$i];
		$i = $i + 1;
	}

	$obj->idAula = $aula->getDato()->getId();

	$json = json_encode($obj);

	echo $json;

?>