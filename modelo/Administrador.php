<?php 

require_once("Conexion.php");

class Administrador{

	private $dni;
	private $nombre;
	private $correo;
	private $clave;

	public function __construct($dni, $nombre, $correo, $clave){
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->clave = $clave;
	}

	public function agregarAula($aula){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		if($aula->getId() == NULL){

			$consulta = $conexion->prepare('INSERT INTO aula (num_aula, num_bloque, tipo, capacidad, implementos) VALUES (:numero, :bloque, :tipo, :capacidad, :implementos)');

			$consulta->bindParam(':numero', $aula->getNumero());
			$consulta->bindParam(':bloque', $aula->getBloque());
			$consulta->bindParam(':tipo', $aula->getTipo());
			$consulta->bindParam(':capacidad',$aula->getCapacidad());
			$consulta->bindParam(':implementos',join(', ',$aula->getImplementos()));
			$consulta->execute();
			$conexion = null;
			
		}else{

			$consulta = $conexion->prepare('UPDATE aula SET tipo = :tipo, capacidad = :capacidad, implementos = :implementos WHERE id_aula = :id');

			$consulta->bindParam(':tipo', $aula->getTipo());
			$consulta->bindParam(':capacidad',$aula->getCapacidad());
			$consulta->bindParam(':implementos',join(', ',$aula->getImplementos()));
			$consulta->bindParam(':id',$aula->getId());
			$consulta->execute();
			$conexion = null;

		}
	}

	public function eliminarAula($id_aula){
		$conexion = new Conexion();
		$conexion->query('DELETE FROM aula WHERE id_aula="'.$id_aula.'";');
		$conexion->query('DELETE FROM horarios WHERE id_aula="'.$id_aula.'";');
		$conexion->query('DELETE FROM reservas WHERE id_aula="'.$id_aula.'";');
	}

	public function bloquearAula($id_aula){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE aula SET estado = 1 WHERE id_aula = "'.$id_aula.'";');
		$consulta->execute();
		$conexion = null;

	}

	public function desbloquearAula($id_aula){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE aula SET estado = 0 WHERE id_aula = "'.$id_aula.'";');
		$consulta->execute();
		$conexion = null;

	}

	public function agregarClase($clase){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('INSERT INTO horarios (id_aula, dia, hora_inicio, hora_fin, profesor, materia) VALUES (:id_aula, :dia, :hora_inicio, :hora_fin, :profesor, :materia)');

		$consulta->bindParam(':id_aula', $clase->getIdAula());
		$consulta->bindParam(':dia', $clase->getDia());
		$consulta->bindParam(':hora_inicio', $clase->getHoraInicio());
		$consulta->bindParam(':hora_fin', $clase->getHoraFin());
		$consulta->bindParam(':profesor',$clase->getMateria());
		$consulta->bindParam(':materia',$clase->getProfesor());
		$consulta->execute();
		$conexion = null;

	}

	public function eliminarClase($id_clase){
		$conexion = new Conexion();
		$conexion->query('DELETE FROM horarios WHERE id_clase="'.$id_clase.'";');
	}

	public function confirmarReserva($id_reserva){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE reservas SET estado = 4 WHERE id_reserva = "'.$id_reserva.'";');
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

	public function bloquearEstudiante($id_estudiante){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE usuario SET estado = 1 WHERE documento = "'.$id_estudiante.'";');
		$consulta->execute();
		$conexion = null;

	}

	public function desbloquearEstudiante($id_estudiante){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->prepare('UPDATE usuario SET estado = 0 WHERE documento = "'.$id_estudiante.'";');
		$consulta->execute();
		$conexion = null;

	}

	///////////////////////////////////////////////////////////////////////

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

	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getClave(){
		return $this->clave;
	}
	public function setClave($clave){
		$this->clave = $clave;
	}

}

?>