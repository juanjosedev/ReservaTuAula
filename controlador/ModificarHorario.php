<?php 
	
	require_once("../../modelo/Administrador.php");
	require_once("../../modelo/listaHorarios.php");
	require_once("../../modelo/Horario.php");

	$listaHorarioAula = new listaHorario($_GET["id_aula"]);
	$Administrador = new Administrador(98102505948,"José","correo","123");

	if(isset($_POST["agregarClase"])){
		if(!$listaHorarioAula->yaExiste($_POST["dia"], $_POST["horaInicio"], $_POST["horaFin"])) {
			$nuevaClase = new Horario(NULL,$_GET["id_aula"],$_POST["dia"],(int)$_POST["horaInicio"].":00:00", (int)$_POST["horaFin"].":00:00",$_POST["profesor"],$_POST["materia"]);
			$Administrador->agregarClase($nuevaClase);
			header('Location: modificarHorarioAula.php?id_aula='.$_GET["id_aula"].'&num_aula='.$_GET["num_aula"].'&bloque='.$_GET["bloque"]);
		} else {
			echo '<div class="container-fluid hide-5">
					<br><div class="alert alert-danger" role="alert">La clase no se asignó porque se cruza con otra ya registrada</div>
				</div>';
		}
	}
	if (isset($_GET["eliminar"])) {
		$Administrador->eliminarClase($_GET["id_clase"]);
		header('Location: modificarHorarioAula.php?id_aula='.$_GET["id_aula"].'&num_aula='.$_GET["num_aula"].'&bloque='.$_GET["bloque"]);
	}

?>