<?php 

class Horario{

	private $id_clase;//int
	private $id_aula;//int
	private $dia;//fecha
	private $hora_inicio;//int
	private $hora_fin;//int
	private $materia;//String
	private $profesor;//String

	public function __construct($id_clase, $id_aula, $dia, $hora_inicio, $hora_fin, $materia, $profesor){
		$this->id_clase = $id_clase;
		$this->id_aula = $id_aula;
		$this->dia = $dia;
		$this->hora_inicio = $hora_inicio;
		$this->hora_fin = $hora_fin;
		$this->materia = $materia;
		$this->profesor = $profesor;		
	}

	public function numberToDia($numero_dia){
		$dia = "";
		switch ($numero_dia) {
			case 1:
				$dia = "Lunes";
				break;
			case 2:
				$dia = "Martes";
				break;
			case 3:
				$dia = "Miércoles";
				break;
			case 4:
				$dia = "Jueves";
				break;
			case 5:
				$dia = "Viernes";
				break;
			case 6:
				$dia = "Sábado";
			break;
			case 7:
				$dia = "Domingo";
			break;
		}
		return $dia;
	}

	public function getIdAula(){
		return $this->id_aula;
	}
	public function setIdAula($id_aula){
		$this->id_aula = $id_aula;
	}

	public function getIdClase(){
		return $this->id_clase;
	}
	public function setIdClase($id_clase){
		$this->id_clase = $id_clase;
	}

	public function getDia(){
		return $this->dia;
	}
	public function setDia($dia){
		$this->dia = $dia;
	}

	public function getHoraInicio(){
		return $this->hora_inicio;
	}
	public function setHoraInicio($hora_inicio){
		$this->hora_inicio = $hora_inicio;
	}

	public function getHoraFin(){
		return $this->hora_fin;
	}
	public function setHoraFin($hora_fin){
		$this->hora_fin = $hora_fin;
	}

	public function getMateria(){
		return $this->materia;
	}
	public function setMateria($materia){
		$this->materia = $materia;
	}

	public function getProfesor(){
		return $this->profesor;
	}
	public function setProfesor($profesor){
		$this->profesor = $profesor;
	}

}

?>