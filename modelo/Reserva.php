<?php

class Reserva{
	
	private $id;//int
	private $estudiante;//estudiante
	private $aula;//aula
	private $fecha;//fecha
	private $hora_inicio;//int
	private $hora_final;//int
	private $estado;//String

	public function __construct($id, $estudiante, $aula, $fecha, $hora_inicio, $hora_final, $estado){

		$this->id = $id;
		$this->estudiante = $estudiante;
		$this->aula = $aula;
		$this->fecha = $fecha;
		$this->hora_inicio = $hora_inicio;
		$this->hora_final = $hora_final;
		$this->estado = $estado;

	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getEstudiante(){
		return $this->estudiante;
	}
	public function setEstudiante($estudiante){
		$this->estudiante = $estudiante;
	}

	public function getAula(){
		return $this->aula;
	}
	public function setAula($aula){
		$this->aula = $aula;
	}

	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getHoraInicio(){
		return $this->hora_inicio;
	}
	public function setHoraInicio($hora_inicio){
		$this->hora_inicio = $hora_inicio;
	}

	public function getHoraFinal(){
		return $this->hora_final;
	}
	public function setHoraFinal($hora_final){
		$this->hora_final = $hora_final;
	}

	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function EstadoToIcon($estado){
		switch ($estado) {
			case '2':
				return '<span class="icon-blocked txt-indigo" title="Cancelado"></span>';
			case '3':
				return '<span class="icon-cross txt-indigo" title="No confirmado"></span>';
			case '4':
				return '<span class="icon-checkmark txt-indigo" title="Confirmado"></span>';
			default:
				return '<span class="icon-hour-glass txt-indigo" title="Espera"></span>';
		}
	}
}

?>