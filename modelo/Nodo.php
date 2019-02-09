<?php 

class Nodo{

	private $dato;//Object
	private $liga;//Nodo

	public function __construct($dato){

		$this->dato = $dato;
		$this->liga = NULL;

	}

	public function implementoYaExiste($nodo, $implemento){
		$aux = $nodo;
		$sw = false;
		$implementos = $aux->getDato()->getImplementos();
		if (preg_match('/'.$implemento.'/i', $implementos)) {
    		$sw = true;
		}
		return $sw;
	}
	
	/////////////////////////////////////////////////////

	public function getDato(){
		return $this->dato;
	}
	public function setDato($dato){
		$this->dato = $dato;
	}

	public function getLiga(){
		return $this->liga;
	}
	public function setLiga($liga){
		$this->liga = $liga;
	}

}

?>