<?php

	require_once("../modelo/Administrador.php");
	require_once("../modelo/Aula.php");
	require_once("../modelo/listaAulas.php");

	$listaAulas = new listaAulas();
	$Administrador = new Administrador(98102505948,"José","correo","123");

	if(isset($_GET['agregar'])){
		if(!$listaAulas->yaExiste((int)$_GET['aula'], $_GET['bloque'])){
			$nuevaAula = new Aula(NULL,(int)$_GET['aula'],$_GET['bloque'],$_GET['tipo'],(int)$_GET['capacidad'],$_GET['implementos']);
			$Administrador->agregarAula($nuevaAula);
		}
		//header('Location: ../sites/administrador/aulas.php');
	}
	if(isset($_GET['eliminar'])){
		$Administrador->eliminarAula($_GET['id_aula']);
		header('Location: ../sites/administrador/aulas.php');
	}
	if(isset($_GET['bloquear'])){
		$Administrador->bloquearAula($_GET['id_aula']);
		header('Location: ../sites/administrador/horarios.php');
	}
	if(isset($_GET['desbloquear'])){
		$Administrador->desbloquearAula($_GET['id_aula']);
		header('Location: ../sites/administrador/horarios.php');
	}

	if(isset($_GET['bloquearEstudiante'])){
		$Administrador->bloquearEstudiante($_GET['id_estudiante']);
		header('Location: ../sites/administrador/usuarios.php');
	}
	if(isset($_GET['desbloquearEstudiante'])){
		$Administrador->desbloquearEstudiante($_GET['id_estudiante']);
		header('Location: ../sites/administrador/usuarios.php');
	}

	if(isset($_GET['guardar'])){
		$nuevaAula = new Aula($_GET['id'],NULL,NULL,$_GET['tipo'],(int)$_GET['capacidad'],$_GET['implementos']);
		$Administrador->agregarAula($nuevaAula);
		header('Location: ../sites/administrador/aulas.php');
	}

	require_once("../vista/Aulas.php");

?>