<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('../../templades/enlaces.php');
	
		$idAula = $_GET["id_aula"];
		$numeroAula = $_GET["num_aula"];
		$bloqueAula = $_GET["bloque"];
		
		include('../../controlador/ModificarHorario.php');

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
				<img src="../../img/Logo128x128.png" class="pull-right" height="50px" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Horarios <small>MODIFICAR AULA <?php echo $bloqueAula." - ".$numeroAula; ?> </small></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit porro, debitis, accusamus architecto soluta molestiae dolorum! Cumque rerum cum sint aspernatur voluptatibus facilis quae ut tempora distinctio explicabo, quam.</p>
			</div>
		</div>
		<div class="row">
			<?php include('../../templades/menuHorizontalAdmin.php'); ?>
			<div class="col-md-12">
				<div class="table-responsive text-center">
					<div id="tablaHorariosAula"></div>
					<?php 
						require_once("../../vista/ModificarHorario.php");
					?>
				</div>
			</div>
		</div>
	</div>
	<a href="#agregarClase" data-toggle="modal" class="pos-abs dw-rg"><button class="boton boton-mediano bg-indigo"><span class="icon-plus visible-xs"></span><na class="hidden-xs">Agregar</na></button></a>
	<div class="modal fade" id="agregarClase">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-header-title">Agregar Clase</h3>
				</div>
				<form action="" method="post" id="agregar_clase">
					<div class="modal-body text-left">
						<h5>Día</h5>
						<div class="form-guti-grupo">
							<select class="form-guti-select" name="dia">
								<option value="1">Lunes</option>
								<option value="2">Martes</option>
								<option value="3">Miércoles</option>
								<option value="4">Jueves</option>
								<option value="5">Viernes</option>
								<option value="6">Sábado</option>
							</select>
						</div>
						<div class="form-group">
							<h5>Hora de inicio</h5>
							<div class="form-guti-grupo">
								<select class="form-guti-select" name="horaInicio" id="slt-hora-inicio">
									<?php 
										$i = 7;
										while ($i <= 18) {		
									?>
									<option value="<?php echo $i ?>"><?php echo $i.":00" ?></option>
									<?php
											$i++; 
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<h5>Hora final</h5>
							<div class="form-guti-grupo">
								<select class="form-guti-select" name="horaFin" id="slt-hora-final">
									<?php 
										$i = 8;
										while ($i <= 19) {		
									?>
									<option value="<?php echo $i ?>"><?php echo $i.":00" ?></option>
									<?php
											$i++; 
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<h5>Profesor</h5>
							<div class="input-group">
								<input class="form-control" placeholder="Nombre" type="text" name="profesor">
								<span class="input-group-addon"><span class="icon-user-tie txt-indigo"></span></span>
							</div>
						</div>	
						<h5>Materia</h5>
						<div class="input-group">
							<input class="form-control" placeholder="Materia" type="text" name="materia">
							<span class="input-group-addon"><span class="icon-books txt-indigo"></span></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<input type="submit" class="boton boton-chico bg-indigo" value="Agregar" name="agregarClase">
					</div>
				</form>
			</div>
		</div>
	</div>
	<br><br><br><br>
</body>
</html>