<?php 

class Historial{

	private $reserva;//reserva
	private $estudiante;//estudiante
	private $aula;//aula
	private $fecha;//fecha
	private $hora_inicio;//int
	private $hora_final;//int

	public function __construct($reserva, $estudiante, $aula, $fecha, $hora_inicio, $hora_final){

		$this->reserva = $reserva;
		$this->estudiante = $estudiante;
		$this->aula = $aula;
		$this->fecha = $fecha;
		$this->hora_inicio = $hora_inicio;
		$this->hora_final = $hora_final;		
	} 

	public function getReserva(){
		return $this->reserva;
	}
	public function setReserva($reserva){
		$this->reserva = $reserva;
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

}

?>