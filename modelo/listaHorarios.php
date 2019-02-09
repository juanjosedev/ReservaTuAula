<?php

require_once("Conexion.php");
require_once("Horario.php");
require_once("Nodo.php");

class listaHorario{

	private $cabeza;

	public function __construct($id_aula){
		
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		
		$registros_horarios = $conexion->query("SELECT * FROM horarios WHERE id_aula=".$id_aula)->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($registros_horarios as $horario) {
			$nuevaClase = new Horario($horario->id_clase,$horario->id_aula,$horario->dia, $horario->hora_inicio, $horario->hora_fin, $horario->materia, $horario->profesor);
			$this->agregarClase($nuevaClase);
		}

		$conexion = NULL;

	}

	public function esVacia(){

		return $this->cabeza == NULL;

	}

	public function agregarClase($aula){

		$nodoAula = new Nodo($aula);

		if($this->esVacia()){
			$this->cabeza = $nodoAula;
		}else{
			$aux = $this->cabeza;
			while ($aux->getLiga() != NULL) {
				$aux = $aux->getLiga();
			}
			$aux->setLiga($nodoAula);
		}
		
	}

	public function inRange($rangoInicial, $rangoFinal, $valor){
		if((int)$valor > (int)$rangoInicial && (int)$valor < (int)$rangoFinal){
			return true;
		}
		return false;
	}

	public function availableHoursVector($fecha, $arreglo){
		$horasDisponibles = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
		if($this->esVacia()){
			return $horasDisponibles;
		}else{
			$aux = $this->cabeza;
			while($aux != Null){
				if($aux->getDato()->getDia() == date('N', strtotime($fecha))) {
					$i = $aux->getDato()->getHoraInicio();
					while($i < $aux->getDato()->getHoraFin()) {
						$horasDisponibles = array_diff($horasDisponibles, array((int)$i));
						$i = $i + 1;
					}
				}
				$aux = $aux->getLiga();
			}
			return $horasDisponibles;
		}
	}

	public function yaExiste($dia, $horaInicio, $horaFin){
		if(!$this->esVacia()){
			$aux = $this->cabeza;
			while ($aux != NULL) {
				if($dia == $aux->getDato()->getDia()){
					if($this->inRange($aux->getDato()->getHoraInicio(), $aux->getDato()->getHoraFin(), $horaInicio) || $this->inRange($aux->getDato()->getHoraInicio(), $aux->getDato()->getHoraFin(), $horaFin)){
						return True;
					}elseif ($this->inRange($horaInicio, $horaFin, $aux->getDato()->getHoraInicio()) || $this->inRange($horaInicio, $horaFin, $aux->getDato()->getHoraFin())) {
						return True;
					}elseif ($horaInicio == $aux->getDato()->getHoraInicio() && $horaFin == $aux->getDato()->getHoraFin()) {
						return True;
					}
					if ((int)$horaInicio == (int)$aux->getDato()->getHoraInicio() && (int)$horaFin == (int)$aux->getDato()->getHoraFin()) {
						return True;
					}
				}
				$aux = $aux->getLiga();
			}
			return false;
		}else{
			return false;
		}
	}

	public function imprimirHorario(){

		if($this->esVacia()){
			echo "El aula no tiene horario<br>";
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {
				echo "Dia: ".$aux->getDato()->numberToDia($aux->getDato()->getDia())."<br>Profesor: ".$aux->getDato()->getProfesor()."<br>Materia:".$aux->getDato()->getMateria()."<br>Hora:".$aux->getDato()->getHoraInicio()." - ".$aux->getDato()->getHoraFin()."<br><br>";

				$aux = $aux->getLiga();
			}
			echo "<hr>";
		}
		
	}

	////////////////////////////////////////////////

	public function getCabeza(){
		return $this->cabeza;
	}
	public function setCabeza($cabeza){
		$this->cabeza = $cabeza;
	}

}
	
	/*$listaHorario = new listaHorario(99);
	$listaHorario->imprimirHorario();
	if(isset($_GET["enviar"])){
		echo "Horas disponibles para el dia ".$_GET["fecha"]." aula 98: <br>".join(" - ", $listaHorario->availableHoursVector($_GET["fecha"]));	
	}*/

?>