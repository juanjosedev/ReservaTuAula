<?php
//ESTE NO ES EL CONTROLADOR OFICIAL
	require_once('clases.php');
	$cabeza = new Administrador();

	if(isset($_GET['agregar'])){
		
		if(!$cabeza->yaExiste((int)$_GET['aula'], $_GET['bloque'])){
			$nuevaAula = new Aula(NULL,(int)$_GET['aula'],$_GET['bloque'],$_GET['tipo'],(int)$_GET['capacidad'],$_GET['implementos']);
			$cabeza->agregarAula($nuevaAula);
		}
	}
	if(isset($_GET['eliminar'])){
		$cabeza->eliminarAula($_GET['id_aula']);
		header('Location: ../sites/administrador/aulas.php');
	}
	if(isset($_GET['guardar'])){
		$nuevaAula = new Aula($_GET['id'],NULL,NULL,$_GET['tipo'],(int)$_GET['capacidad'],$_GET['implementos']);
		$cabeza->agregarAula($nuevaAula);
		header('Location: ../sites/administrador/aulas.php');
	}
	$cabeza->imprimirAulas();

?>