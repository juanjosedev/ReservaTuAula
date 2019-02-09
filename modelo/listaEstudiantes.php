<?php

require_once("Conexion.php");
require_once("Estudiante.php");
require_once("listaReserva.php");
require_once("Nodo.php");

class listaEstudiantes{

	private $cabeza;

	public function __construct(){
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$registros_estudiantes = $conexion->query("SELECT * FROM usuario WHERE tipo = 'comun' ORDER BY documento DESC;")->fetchAll(PDO::FETCH_OBJ);

		foreach ($registros_estudiantes as $estudiante) {
			
			$nuevoEstudiante = new Estudiante($estudiante->documento, $estudiante->correo, $estudiante->nombre, $estudiante->apellidos, $estudiante->clave, $estudiante->foto);
			$listaReserva = new listaReservas($nuevoEstudiante->getDni(), "Estudiante");

			$nuevoEstudiante->setHistorialEstudiante($listaReserva);
			$nuevoEstudiante->setEstado($estudiante->estado);

			$this->agregarEstudiante($nuevoEstudiante);
		}
		$conexion = NULL;
	}

	public function esVacia(){

		return $this->cabeza == NULL;

	}

	public function agregarEstudiante($Estudiante){

		$nodoEstudiante = new Nodo($Estudiante);

		if($this->esVacia()){
			$this->cabeza = $nodoEstudiante;
		}else{
			$aux = $this->cabeza;
			while ($aux->getLiga() != NULL) {
				$aux = $aux->getLiga();
			}
			$aux->setLiga($nodoEstudiante);
		}
		
	}

	public function buscarEstudiante($documento){
		if($this->esVacia()){
			return Null;
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {
				if($aux->getDato()->getDni() == $documento){
					return $aux;
				}
				$aux = $aux->getLiga();
			}
			return Null;
		}
	}

	public function totalEstudiantes(){
		if($this->esVacia()){
			return 0;
		}else{
			$contador = 0;
			$aux = $this->cabeza;
			while ($aux != NULL) {
				$contador = $contador + 1;
				$aux = $aux->getLiga();
			}
			return $contador;
		}
	}

	public function imprimirEstudiantes(){

		if($this->esVacia()){
			echo "No hay aulas en el sistema<br>";
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {
				echo "Doc: ".$aux->getDato()->getDni()."<br>";
				echo "Nombre: ".$aux->getDato()->getNombre()."<br>";
				echo "Apellidos: ".$aux->getDato()->getApellidos()."<br><br>";
				$aux = $aux->getLiga();
			}
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

	/*$lista = new listaEstudiantes();

	echo $lista->imprimirEstudiantes();

	echo $lista->buscarEstudiante(2000)->getDato()->getDni();*/

?>