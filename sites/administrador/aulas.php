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
				<img src="../../img/../../img/Logo64x65.png.png" class="pull-right" height="50px" alt="">
			</div>
		</div>
		<div class="row">	
			<div class="col-md-12">
				<h2>Aulas</h2>
				<p>Las aulas de la institución son importantes ya que serán los espacios que los profesores y muchos estudiantes usarán. ¡Aquí puedes registrar cada una con su respectiva información!</p>
			</div>
		</div>
		<div class="row">
			<?php include('../../templades/menuHorizontalAdmin.php'); ?>
			<div class="col-md-12">
				<div class="table-responsive text-center">
					<div id="tablaAulas"></div>
				</div>	
			</div>
		</div>
	</div>
	<a href="#agregarAula" data-toggle="modal" class="pos-abs dw-rg"><button class="boton boton-mediano bg-indigo"><span class="icon-plus visible-xs"></span><na class="hidden-xs">Agregar</na></button></a>
	<div class="modal fade" id="agregarAula">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-header-title">Agregar Aula</h3>
				</div>
				<form action="../../controlador/Aulas.php" method="get" id="formulario_agregar">
					<div class="modal-body text-left">
						<div class="row">
							<div class="col-md-6">
								<h5 class="txt-indigo">Aula</h5>
								<div class="input-group">
									<input class="form-control" type="text" id="aula" name="aula" placeholder="Ejemplo: 101">
									<span class="input-group-addon"><span class="icon-book txt-indigo"></span></span>
								</div>
							</div>
							<div class="col-md-6">
								<h5 class="txt-indigo">Bloque</h5>
								<div class="input-group">
									<input class="form-control" type="text" id="bloque" name="bloque" placeholder="Ejemplo: 01">
									<span class="input-group-addon"><span class="icon-office txt-indigo"></span></span>
								</div>
							</div>
							<div class="col-md-6">
								<h5 class="txt-indigo">Tipo de aula</h5>
								<select class="form-guti-select" id="tipo" name="tipo">
									<option value="Aula normal">Aula normal</option>
									<option value="Aula de sistemas">Aula de sistemas</option>
									<option value="Aula interactiva">Aula interactiva</option>
								</select>
							</div>
							<div class="col-md-6">
								<h5 class="txt-indigo">Capacidad</h5>
								<div class="input-group">
									<input type="text" class="form-control" id="capacidad" name="capacidad" placeholder="Ejemplo: 35">
									<span class="input-group-addon"><span class="icon-users txt-indigo"></span></span>
								</div>
							</div>	
							<div class="col-md-12">
								<h5 class="txt-indigo">Implementos</h5>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Tablero" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" name="implementos[]" value="Tablero" id="tablero" checked>
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Sillas" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" name="implementos[]" value="Sillas" id="sillas" checked>
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Pc's" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="pc" name="implementos[]" value="Pc's">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Portátiles" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="portatil" name="implementos[]" value="Portátiles">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Tablets" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="tablet" name="implementos[]" value="Tablets">
										</span>
									</div>
								</div>
								<div class="input-group">
									<input class="form-control" value="Televisor" type="text" disabled>
									<span class="input-group-addon">
										<input type="checkbox" id="televisor" name="implementos[]" value="Televisor">
									</span>
								</div>
							</div>
							<br>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Video beam" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="video_beam" name="implementos[]" value="Video beam">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Implementos de aseo" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="aseo" name="implementos[]" value="Implementos de aseo" checked>
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Instrumentos musicales" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="musica" name="implementos[]" value="Instrumentos musicales">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Instrumentos de laboratorio" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="laboratorio" name="implementos[]" value="Instrumentos de laboratorio">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" value="Instrumentos de ferretería" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="ferreteria" name="implementos[]" value="Instrumentos de ferretería">
										</span>
									</div>
								</div>
								<div class="input-group">
									<input class="form-control" placeholder="Otro ¿Cuál?" type="text" id="otro_valor_agregar">
									<span class="input-group-addon">
										<input type="checkbox" id="otro_check_agregar" name="implementos[]">
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<input type="submit" class="boton boton-chico bg-indigo" id="agregar" name="agregar" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<script src="../../js/validaciones/Aula.js"></script>
</body>
</html>