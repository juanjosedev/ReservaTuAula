<?php

class Fecha(){

	private $dia;//int
	private $mes;//int
	private $anho;//int

	public function __construct($dia, $mes, $anho){

		$this->dia = $dia;
		$this->mes = $mes;
		$this->anho = $anho;

	}

	public function getDia(){
		return $this->dia;
	}
	public function setDia($dia){
		$this->dia = $dia;
	}

	public function getMes(){
		return $this->mes;
	}
	public function setMes($mes){
		$this->mes = $mes;
	}

	public function getAnho(){
		return $this->anho;
	}
	public function setAnho($anho){
		$this->anho = $anho;
	}

}

?>