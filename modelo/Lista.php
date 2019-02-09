<?php 

require_once("Nodo.php");

class lista{

	private $cabeza;

	public function __construct(){
		$cabeza = Null;
	}

	public function getCabeza(){
		return $this->cabeza;
	}

	public function setCabeza($cabeza;){
		$this->cabeza = $cabeza;
	}

	public function agregarNodo($nodo){
		$aux = $this->cabeza;
		if($this->cabeza == Null){
			$this->cabeza = $nodo;
		}else{
			while($aux != Null){
				$aux = $aux->getLiga();
			}
		}
	}

}

?>