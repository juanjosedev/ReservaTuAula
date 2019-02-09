<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('../../templades/enlaces.php'); ?>
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
				<h2>Reservar Aula</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quis fugit animi, vel quo delectus quos corporis voluptate dolore est, recusandae provident aspernatur iure, et voluptatibus. Accusamus omnis iure provident.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php 
					if($estado == 0){
						include('../../controlador/Reserva.php'); 
					}else{
						echo "<br><div class='alert alert-danger' role='alert'>Un administrador te ha bloqueado y no puedes reservar. <span class='icon-tongue2'></span></div>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>