<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		include('../../templades/enlaces.php'); 
		include("../../controlador/Verificar.php");
	?>
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
				<h2>Verificar </h2>
				<p>Sequi repellendus illo delectus vitae in natus deserunt quisquam consequatur nemo culpa perferendis ratione omnis ex maiores aspernatur est adipisci veniam minus aut voluptatibus quod nobis, nesciunt. Quo mollitia, non quos.</p>
			</div>
		</div>
		<br>
		<div class="row">
			<?php 
				include('../../templades/menuHorizontalAdmin.php');
				echo '<div class="col-md-12">'; 
				require_once("../../vista/Verificar.php");
				echo '</div>';
			?>	
		</div>
	</div>
	<br><br>
</body>
</html>