<?php

require_once("Conexion.php");
require_once("Usuario.php");

class Sesion{

	private $usuario;

	public function __construct(){
		$this->usuario = Null;
	}

	public function verificarUsuario($correo, $clave){
		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->query("SELECT * FROM usuario WHERE correo='".$correo."' AND clave='".$clave."'")->fetchAll(PDO::FETCH_OBJ);
		
		return $consulta != Null;
	}
	public function iniciarSesion(){
		session_start();
	}
	public function cerrarSesion(){
		session_start();
		session_destroy();
		header("Location: ../../");
	}
	public function verificarSesion(){
		return isset($_SESSION["usuario"]);
	}

}
?>