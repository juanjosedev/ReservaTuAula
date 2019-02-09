<?php

	session_start();

	include("modelo/Sesion.php");

	$sesion = new Sesion();

	if($sesion->verificarSesion()){
		$usuario = new Usuario($_SESSION["usuario"]);
		if ($usuario->getTipo() == "admin") {
			header("Location: sites/administrador/aulas.php");
		} else {
			header("Location: sites/usuario/reservar.php");
		}
		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/javascript.js"></script>
	<script src="js/reservar/modelo.js"></script>
	<script src="js/reservar/controlador.js"></script>
	<script src="js/reservar/vista.js"></script>
	<script src="libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/iconos/style.css">
	<link rel="stylesheet" href="fonts/fuentes/font-roboto.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
	<link rel="shortcut icon" href="img/Logo32x32.png">
	<title>Reserva Tu Aula</title></head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="controlador/Sesion.php" method="post">
					<h1 class="text-center">Reserva Tu Aula</h1>
					<div class="form-guti-grupo">
						<input type="text" class="form-guti" placeholder="Correo:" name="correo">
						<small>Correo</small>
					</div>
					<div class="form-guti-grupo">
						<input type="password" class="form-guti" placeholder="Contraseña:" name="pass">
						<small>Contraseña</small>
					</div>
						<div class="form-guti-grupo">
						<input type="submit" class="boton bg-indigo pull-right" value="Go!" name="enviar">
					</div>
				</form>
			</div>
		</div>
	</div> 
</body>
</html>