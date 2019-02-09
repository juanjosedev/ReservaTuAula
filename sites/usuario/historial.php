<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('../../templades/enlaces.php'); ?>
	<?php include('../../controlador/HistorialEstudiante.php'); ?>
</head>
<body>
	<?php include('../../templades/menuVertical.php'); ?>
	<?php include('../../templades/menuHorizontal.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10">
				<?php include("../../templades/informacionSesion.php"); ?>
			</div>
			<div class="col-xs-2">
				<br>
				<img src="../../img/Logo128x128.png" class="pull-right" height="50px" alt="">
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">
				<h2>Historial</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis illo velit aspernatur, rem placeat, aut reprehenderit quis. Cumque, nisi dolorem quos possimus accusantium nam consequuntur. Provident aliquam, nobis et doloribus.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php require_once("../../vista/HistorialEstudiante.php"); ?>
			</div>
		</div>
	</div>
</body>
</html>