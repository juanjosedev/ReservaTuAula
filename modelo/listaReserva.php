<?php 

require_once("Conexion.php");
require_once("listaEstudiantes.php");
require_once("Nodo.php");
require_once("Reserva.php");

class listaReservas{

	private $cabeza;

	public function __construct($id, $especificacion){//Argumentos: (id, "Tipo")
	/*
		Los argumentos pueden ser de tres tipo:
			1) (id_aula, "Aula") Recibe el id del aula, se especifica que se trata de un aula
			2) (id_estudiante, "Estudiante") Recibe el id (id = dni) del estudiante se especifica que se trata de un estudiante
			3) (Null, "Todo") Recibe Null, se especifica "Todo" para mostrar toda la tabla de reservas
	*/
		
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		

		if($especificacion == "Aula"){
			$sentencia = "SELECT * FROM reservas WHERE id_aula=".$id." ORDER BY fecha, hora_inicio, estado";
		}elseif ($especificacion == "Estudiante") {
			$sentencia = "SELECT * FROM reservas WHERE num_documento=".$id." ORDER BY fecha, hora_inicio, estado";
		}else{
			$sentencia = "SELECT * FROM reservas ORDER BY fecha, estado";
		}
		$registros_reservas = $conexion->query($sentencia)->fetchAll(PDO::FETCH_OBJ);

		date_default_timezone_set ("America/Bogota");
		$fecha_actual = date("Y")."-".date("m")."-".date("d");
		$hora_actual = date("H").":00:00";

		foreach ($registros_reservas as $reserva) {

			//traer objeto estudiante, y aula

			$nuevaReserva = new Reserva($reserva->id_reserva, $reserva->num_documento, $reserva->id_aula, $reserva->fecha, $reserva->hora_inicio, $reserva->hora_fin, $reserva->estado);

			$fecha_reserva = $reserva->fecha;
			$hora_final_reserva = $reserva->hora_fin;
			$estado_reserva = $reserva->estado;

			if($fecha_reserva == $fecha_actual){
				if($hora_final_reserva < $hora_actual && $estado_reserva == 1){
					$consulta = $conexion->prepare('UPDATE reservas SET estado = 3 WHERE id_reserva = "'.$reserva->id_reserva.'";');
					$consulta->execute();
					$nuevaReserva->setEstado(3);
				}
			}

			$this->agregarReserva($nuevaReserva);
		}

		$conexion = NULL;

	}

	public function agregarReserva($reserva){

		$nodoReserva = new Nodo($reserva);

		if($this->esVacia()){
			$this->cabeza = $nodoReserva;
		}else{
			$aux = $this->cabeza;
			while ($aux->getLiga() != NULL) {
				$aux = $aux->getLiga();
			}
			$aux->setLiga($nodoReserva);
		}
		
	}

	public function availableHoursVector($fecha, $arreglo){
		$horasDisponibles = $arreglo;
		if($this->esVacia()){
			return $horasDisponibles;
		}else{
			$aux = $this->cabeza;
			while($aux != Null){
				/*echo $fecha."<br>";
				echo $aux->getDato()->getFecha()."<br>";*/
				if($aux->getDato()->getFecha() == $fecha) {
					if($aux->getDato()->getEstado() == 1){
						$i = $aux->getDato()->getHoraInicio();
						while($i < $aux->getDato()->getHoraFinal()) {
							$horasDisponibles = array_diff($horasDisponibles, array((int)$i));
							$i = $i + 1;
						}
					}
				}
				$aux = $aux->getLiga();
			}
			return $horasDisponibles;
		}
	}

	public function totalReservas(){
		if($this->esVacia()){
			return 0;
		}else{
			$aux = $this->cabeza;
			$contador = 0;
			while ($aux != Null) {
				$contador = $contador + 1;
				$aux = $aux->getLiga();
			}
			return $contador;
		}
	}

	public function reservasHoy(){
		if($this->esVacia()){
			return 0;
		}else{
			$aux = $this->cabeza;
			$contador = 0;
			$fecha_actual = date("Y")."-".date("m")."-".date("d");
			while ($aux != Null) {
				if($aux->getDato()->getFecha() == $fecha_actual){
					$contador = $contador + 1;
				}
				$aux = $aux->getLiga();
			}
			return $contador;
		}
	}

	public function estudianteTieneReservas(){
		return !$this->esVacia();
	}

	public function aulaTieneReservas(){
		return !$this->esVacia();
	}

	public function totalReservasPorDia(){
		$arreglo = [0,0,0,0,0,0];
		if($this->esVacia()){
			return $arreglo;
		}else{
			$aux = $this->cabeza;
			while ($aux != Null) {
				$dia_semana = date('N', strtotime($aux->getDato()->getFecha()));
				switch ($dia_semana) {
					case 1:
						$arreglo[0] = $arreglo[0] + 1;
						break;
					case 2:
						$arreglo[1] = $arreglo[1] + 1;
						break;
					case 3:
						$arreglo[2] = $arreglo[2] + 1;
						break;
					case 4:
						$arreglo[3] = $arreglo[3] + 1;
						break;	
					case 5:
						$arreglo[4] = $arreglo[4] + 1;
						break;							
					default:
						$arreglo[5] = $arreglo[5] + 1;	
						break;
				}
				$aux = $aux->getLiga();
			}
			return $arreglo;
		}
	}

	public function imprimirReservas(){

		if($this->esVacia()){
			echo "El aula no tiene horario<br>";
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {

				echo "id: ".$aux->getDato()->getId()."<br>";
				echo "Estudiante: ".$aux->getDato()->getEstudiante()."<br>";
				echo "Aula: ".$aux->getDato()->getAula()."<br>";
				echo "Fecha: ".$aux->getDato()->getFecha()."<br>";
				echo "Hora: ".$aux->getDato()->getHoraInicio()." - ".$aux->getDato()->getHoraFinal()."<br>";
				echo "<br>";

				$aux = $aux->getLiga();
			}
		}
	}

	public function esVacia(){

		return $this->cabeza == NULL;

	}

	////////////////////////////////////////////////

	public function getCabeza(){
		return $this->cabeza;
	}
	public function setCabeza($cabeza){
		$this->cabeza = $cabeza;
	}

}	
/*	$objeto = new listaReservas(Null, "Todo");
	$objeto->imprimirReservas();
	$horasDisponibles = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
	$horasDisponibles = $objeto->availableHoursVector("2018-05-28", $horasDisponibles);

	echo join(" - ", $objeto->totalReservasPorDia());
*/	

?>
