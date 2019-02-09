<?php

require_once("Aula.php");
require_once("Conexion.php");
require_once("listaHorarios.php");
require_once("listaReserva.php");
require_once("Nodo.php");

class listaAulas{

	private $cabeza;

	public function __construct(){
		
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		
		$registros_aulas = $conexion->query("SELECT * FROM aula ORDER BY num_bloque, num_aula")->fetchAll(PDO::FETCH_OBJ);

		foreach ($registros_aulas as $aula) {

			$implementos = explode(", ",$aula->implementos);
			$nuevoAula = new Aula($aula->id_aula, $aula->num_aula, $aula->num_bloque, $aula->tipo, $aula->capacidad, $implementos);
			$nuevoAula->setEstado($aula->estado);
			$this->agregarAula($nuevoAula);
			$listaHorario = new listaHorario($nuevoAula->getId());
			$nuevoAula->setHorario($listaHorario);
			$listaReserva = new listaReservas($nuevoAula->getId(), "Aula");
			$nuevoAula->setHistorialAula($listaReserva);

		}

		$conexion = NULL;

	}

	public function esVacia(){

		return $this->cabeza == NULL;

	}

	public function agregarAula($aula){

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

	public function yaExiste($numero, $bloque){
		if(!$this->esVacia()){
			$aux = $this->cabeza;
			while ($aux != NULL) {
				if($numero == $aux->getDato()->getNumero() && $bloque == $aux->getDato()->getBloque()){
					return true;
				}
				$aux = $aux->getLiga();
			}
			return false;
		}else{
			return false;
		}
	}

	public function buscarAula($id_aula){
		if($this->esVacia()){
			return Null;
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {
				if($aux->getDato()->getId() == $id_aula){
					return $aux;
				}
				$aux = $aux->getLiga();
			}
		}
	}

	public function totalAulas(){
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

	public function totalAulasBloqueadas(){
		if($this->esVacia()){
			return 0;
		}else{
			$contador = 0;
			$aux = $this->cabeza;
			while ($aux != NULL) {
				if($aux->getDato()->getEstado() == 1){
					$contador = $contador + 1;
				}
				$aux = $aux->getLiga();
			}
			return $contador;
		}
	}

	public function imprimirAulas(){

		if($this->esVacia()){
			echo "No hay aulas en el sistema<br>";
		}else{
			$aux = $this->cabeza;
			while ($aux != NULL) {
				echo "id: ".$aux->getDato()->getId()."<br>";
				
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

	/*$lis = new listaAulas();
	$lis->imprimirAulas();
*/
?>