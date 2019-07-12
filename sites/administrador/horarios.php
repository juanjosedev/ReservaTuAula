<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('../../templades/enlaces.php'); ?>
</head>
<body>
	<?php include('../../templades/menuVerticalAdmin.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10">
				<?php include("../../templades/informacionSesion.php"); ?>
			</div>
			<div class="col-xs-2">
				<br>
				<img src="../../img/Logo128x129.png" class="pull-right" height="50px" alt="">
			</div>
		</div>
		<div class="row">	
			<div class="col-md-12">
				<h2>Horarios</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit porro, debitis, accusamus architecto soluta molestiae dolorum! Cumque rerum cum sint aspernatur voluptatibus facilis quae ut tempora distinctio explicabo, quam.</p>
			</div>
		</div>
		<div class="row">
			<?php include('../../templades/menuHorizontalAdmin.php'); ?>
			<div class="col-md-12">
				<div class="table-responsive text-center">
					<?php include('../../controlador/Horarios.php'); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>