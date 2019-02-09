<?php 

	include("../../modelo/listaAulas.php");

	$estudiante = new Estudiante(98102505948, "correo", "José", "Gutierrez","123", "foto");	

	$listaAulas = new listaAulas();

	if(isset($_POST["Reservar"])){
		$id_usuario = $_POST["id_usuario"];
		$id_aula = $_POST["id_aula"];
		$fecha = $_POST["fecha_reserva"];
		$horaInicio = $_POST["horaInicio"];
		$horaFin = $_POST["horaFin"];

		$anho = substr($fecha, 6,9);
		$mes = substr($fecha, 3,2);
		$dia = substr($fecha, 0,2);

		$fecha = $anho."-".$mes."-".$dia;

		$nuevaReserva = new Reserva(Null, $id_usuario, $id_aula, $fecha, $horaInicio.":00:00", $horaFin.":00:00", 1);

		$estudiante->reservarAula($nuevaReserva);

		echo '<div class="hide-5">
					<br><div class="alert alert-success" role="alert">Se reservó el aula. Te invitamos a que estés al tanto de tu pedido</div>
				</div>';
		unset($_POST["Reservar"]);
	}

	include("../../vista/Reserva.php");

?>