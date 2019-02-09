<?php

require_once("Conexion.php");

class Estudiante{

	private $dni;//String
	private $correo;//String
	private $estado;//Int
	private $nombre;//String
	private $apellidos;//String
	private $clave;//String
	private $foto;//String
	private $historial;//historial

	public function __construct($dni, $correo, $nombre, $apellidos, $clave, $foto){

		$this->dni = $dni;
		$this->correo = $correo;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->clave = $clave;
		$this->foto = $foto;
		$this->estado = 0;
		$this->historial = NULL;

	}

	///////////////////////////////////////////////////////////////////
	public function reservarAula($reserva){

		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('INSERT INTO reservas (id_aula, num_documento, fecha, hora_inicio, hora_fin) VALUES (:id_aula, :num_documento, :fecha, :hora_inicio, :hora_fin)');

		$consulta->bindParam(':id_aula', $reserva->getAula());
		$consulta->bindParam(':num_documento', $reserva->getEstudiante());
		$consulta->bindParam(':fecha', $reserva->getFecha());
		$consulta->bindParam(':hora_inicio',$reserva->getHoraInicio());
		$consulta->bindParam(':hora_fin', $reserva->getHoraFinal());
		$consulta->execute();
		$conexion = null;

	}

	public function cancelarReserva($id_reserva){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE reservas SET estado = 2 WHERE id_reserva = "'.$id_reserva.'";');
		$consulta->execute();
		$conexion = null;
	}

	public function getDni(){
		return $this->dni;
	}
	public function setDni($dni){
		$this->dni = $dni;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellidos(){
		return $this->apellidos;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getClave(){
		return $this->clave;
	}
	public function setClave($clave){
		$this->clave = $clave;
	}

	public function getFoto(){
		return $this->foto;
	}
	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getHistorialEstudiante(){
		return $this->historial;
	}
	public function setHistorialEstudiante($historial){
		$this->historial = $historial;
	}

}

?>