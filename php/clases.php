<?php 

class Conexion extends PDO{

	private $tipo_de_base = 'mysql' ;
	private $host =  'localhost';
	private $nombre_de_base = 'reservatuaula' ;
	private $usuario =  'root';
	private $contrasena =  '';	

	public function __construct(){
		try {
			parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
		} catch (PDOException $e) {
			echo "Error: <br>".$e->getMessage();
			exit;
		}
	}
}

class Administrador{
	
	private $cabeza;
	private $dni;
	private $nombre;
	private $correo;
	private $clave;

	public function __construct(){

		$this->cabeza = NULL;

		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		
		$registros = $conexion->query("SELECT * FROM aula ORDER BY num_bloque, num_aula")->fetchAll(PDO::FETCH_OBJ);

		foreach ($registros as $aula) {
			$nuevoAula = new Aula($aula->id_aula,$aula->num_aula, $aula->num_bloque, $aula->tipo, $aula->capacidad, $aula->implementos);
			$this->agregarAulaLista($nuevoAula);
		}
		$conexion = null;
	}

	public function esVacia(){
		if($this->cabeza == NULL){
			return true;
		}else{
			return false;
		}
	}

	public function agregarAulaLista($aula){

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

	public function agregarAula($aula){
		
		$conexion = new Conexion();

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		if($aula->getId() == NULL){

			$consulta = $conexion->prepare('INSERT INTO aula (num_aula, num_bloque, tipo, capacidad, implementos) VALUES (:numero, :bloque, :tipo, :capacidad, :implementos)');

			$consulta->bindParam(':numero', $aula->getNumero());
			$consulta->bindParam(':bloque', $aula->getBloque());
			$consulta->bindParam(':tipo', $aula->getTipo());
			$consulta->bindParam(':capacidad',$aula->getCapacidad());
			$consulta->bindParam(':implementos',join(', ',$aula->getImplementos()));
			$consulta->execute();
			$conexion = null;
		}else{

			$consulta = $conexion->prepare('UPDATE aula SET tipo = :tipo, capacidad = :capacidad, implementos = :implementos WHERE id_aula = :id');

			$consulta->bindParam(':tipo', $aula->getTipo());
			$consulta->bindParam(':capacidad',$aula->getCapacidad());
			$consulta->bindParam(':implementos',join(', ',$aula->getImplementos()));
			$consulta->bindParam(':id',$aula->getId());
			$consulta->execute();
			$conexion = null;
		}


	}

	public function eliminarAula($id_aula){
		$conexion = new Conexion();
		$conexion->query('DELETE FROM aula WHERE id_aula="'.$id_aula.'";');
	}

	public function imprimirAulas(){
		if(!$this->esVacia()){
			$aux = $this->cabeza;
?>
		<table class="table table-hover">
			<thead>
				<th><center><h5>AULA</h5></center></th>
				<th><center><h5>BLOQUE</h5></center></th>
				<th><center><h5>ACCIÓN</h5></center></th>
				<th><center><h5>ELIMINAR</h5></center></th>
			</thead>
<?php
			while ($aux != NULL) {
				include('../templades/tablaAulas.php');
				$aux = $aux->getLiga();
			}
?>
		</table>
<?php			
		}else{
			echo "<center><h3>Aquí irían las aulas del sistema</h3></center>";
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

	public function imprimirHorariosAulas(){
		
	}

	public function getCabeza(){
		return $this->cabeza;
	}
	public function setCabeza($cabeza){
		$this->cabeza = $cabeza;
	}
}
class Nodo{
	
	private $dato;
	private $liga;

	public function __construct(Aula $dato){
		$this->dato = $dato;
		$this->liga = NULL;
	}
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
	public function implementoYaExiste($nodo, $implemento){
		$aux = $nodo;
		$sw = false;
		$implementos = $aux->getDato()->getImplementos();
		if (preg_match('/'.$implemento.'/i', $implementos)) {
    		$sw = true;
		}
		return $sw;
	}
}
class Aula{

	private $id;
	private $numero;
	private $bloque;
	private $tipo;
	private $capacidad;
	private $implementos;
	private $horario;
	private $historialAula;
	private $tabla;

	public function __construct($id, $numero, $bloque, $tipo, $capacidad, $implementos){
		if(isset($id)){
			$this->id = $id;
		}else{
			$this->id = NULL;
		}
		if(isset($numero)){
			$this->numero = $numero; 
		}else{
			$this->numero = NULL;
		}
		if(isset($bloque)){
			$this->bloque = $bloque;
		}else{
			$this->bloque = NULL;
		}
		$this->tipo = $tipo;
		$this->capacidad = $capacidad;
		$this->implementos = $implementos;
		$this->horario = NULL;
		$this->historialAula = NULL;
		$this->tabla = 'aula';
	}

	public function getId(){
		return $this->id;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function getBloque(){
		return $this->bloque;
	}
	public function setBloque($bloque){
		$this->bloque = $bloque;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getCapacidad(){
		return $this->capacidad;
	}
	public function setCapacidad($capacidad){
		$this->capacidad = $capacidad;
	}
	public function getImplementos(){
		return $this->implementos;
	}
	public function setImplementos($implementos){
		$this->implementos = $implementos;
	}
	public function getHorario(){
		return $this->horario;
	}
	public function setHorario($horario){
		$this->horario = $horario;
	}
	public function getHistorialAula(){
		return $this->historialAula;
	}
	public function setHistorialAula($historialAula){
		$this->historialAula = $historialAula;
	}
	public function getTabla(){
		return $this->tabla;
	}

}
class Horario{

	private $id;
	private $dia;
	private $horaInicio;
	private $horaFin;
	private $materia;
	private $profesor;

	public function __construct($id, $dia, $horaInicio, $horaFin, $materia, $profesor){
		if(isset($id)){
			$this->id = $id;
		}else{
			$this->id = NULL;
		}
		$this->dia = $dia ;
		$this->horaInicio = $horaInicio ;
		$this->horaFin = $horaFin ;
		$this->materia = $materia ;
		$this->profesor = $profesor ;		
	}

	//get & set properties

}
////////////////////////////////////////////////////////////////////////////

?>