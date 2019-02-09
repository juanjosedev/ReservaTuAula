<?php
	
	session_start();

	if(isset($_POST["enviar"])){
		require_once("../modelo/Sesion.php");
		require_once("../modelo/Usuario.php");
	}else{
		require_once("../../modelo/Sesion.php");
		require_once("../../modelo/Usuario.php");
	}

	$sesion = new Sesion();

	if(isset($_GET["cerrar_sesion"])){
		$sesion->cerrarSesion();
	}
	if(isset($_POST["enviar"])){
		if ($sesion->verificarUsuario($_POST["correo"],$_POST["pass"])) {
			$usuario = new Usuario($_POST["correo"]);
			$sesion->iniciarSesion();
			$_SESSION["usuario"] = $_POST["correo"];
			if($usuario->getTipo() == 'admin'){
				header('Location: ../sites/administrador/');
			} elseif ($usuario->getTipo() == 'comun') {
				header('Location: ../sites/usuario/reservar.php');
			}
		} else {
			echo "No existe";
		}
	}

	if($sesion->verificarSesion()){
		
		$usuario = new Usuario($_SESSION["usuario"]);
		
		$documento = $usuario->getDocumento();
		$tipo = $usuario->getTipo();
		$correo = $usuario->getCorreo();
		$estado = $usuario->getEstado();
		$nombre = $usuario->getNombre();
		$apellidos = $usuario->getApellidos();
		$foto = $usuario->getFoto();

	}else{
		$sesion->cerrarSesion();
	}

?>