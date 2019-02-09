<?php 

class Usuario{

	private $documento;
	private $tipo;
	private $correo;
	private $estado;
	private $clave;
	private $nombre;
	private $apellidos;
	private $foto;

	public function __construct($correo){

		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");

		$consulta = $conexion->query("SELECT * FROM usuario WHERE correo='".$correo."';")->fetchAll(PDO::FETCH_OBJ);
		foreach ($consulta as $valor) {
			$this->documento = $valor->documento;
			$this->tipo = $valor->tipo;
			$this->correo = $valor->correo;
			$this->estado = $valor->estado;
			$this->clave = $valor->clave;
			$this->nombre = $valor->nombre;
			$this->apellidos = $valor->apellidos;
			$this->foto = $valor->foto;
		}

	}
	///////////////////////////////////////////////
	public function getDocumento(){
		return $this->documento;
	}
	public function setDocumento($documento){
		$this->documento = $documento;
	}

	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getClave(){
		return $this->clave;
	}
	public function setClave($clave){
		$this->clave = $clave;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellidos(){
		return $this->apellidos;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getFoto(){
		return $this->foto;
	}
	public function setFoto($foto){
		$this->foto = $foto;
	}

}

?>