<?php 

class Aula{

	private $id;//int
	private $numero;//int 
	private $bloque;//String
	private $tipo;//String
	private $capacidad;//int
	private $implementos;//array
	private $estado;
	private $horario;//listaHorario
	private $historial;//listaHistotial

	public function __construct($id, $numero, $bloque, $tipo, $capacidad, $implementos){
		$this->id = $id;
		$this->numero = $numero; 
		$this->bloque = $bloque;
		$this->tipo = $tipo;
		$this->capacidad = $capacidad;
		$this->implementos = $implementos;
		$this->estado = 0;
		$this->horario = NULL;
		$this->historialAula = NULL;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function getBloque(){
		return $this->bloque;
	}

	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getCapacidad(){
		return $this->capacidad;
	}
	public function setCapacidad($capacidad){
		$this->capacidad = $capacidad;
	}

	public function getImplementos(){
		return $this->implementos;
	}
	public function setImplementos($implementos){
		$this->implementos = $implementos;
	}

	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getHorario(){
		return $this->horario;
	}
	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function getHistorialAula(){
		return $this->historialAula;
	}
	public function setHistorialAula($historialAula){
		$this->historialAula = $historialAula;
	}

	public function getTabla(){
		return $this->tabla;
	}

}

?>