<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		include('../../templades/enlaces.php');
		include('../../controlador/InicioAdmin.php'); 
	?>
	<script type="text/javascript" src="../../libs/GoogleCharts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
	    google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				["Element", "Reservas", { role: "style" } ],
				["Lunes", <?php echo $vector_grafica[0]; ?>, "#FF9800"],
				["Martes", <?php echo $vector_grafica[1]; ?>, "#FF5722"],
				["Miércoles", <?php echo $vector_grafica[2]; ?>, "#F44336"],
				["Jueves", <?php echo $vector_grafica[3]; ?>, "#E91E63"],
				["Viernes", <?php echo $vector_grafica[4]; ?>, "#9C27B0"],
				["Sábado", <?php echo $vector_grafica[5]; ?>, "#673AB7"]
			]);

			var view = new google.visualization.DataView(data);
			view.setColumns([0, 1,
				{ calc: "stringify",
				sourceColumn: 1,
				type: "string",
				role: "annotation" },
			2]);

			var options = {
				height: 300,
				bar: {groupWidth: "50%"},
				legend: { position: "none" },
			};

			var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
			chart.draw(view, options);

			function resize () {
				chart.draw(data, options);
			}
			if (window.addEventListener) {
				window.addEventListener('resize', resize);
			}
			else {
				window.attachEvent('onresize', resize);
			}

		}
	</script>
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
				<h2>Bienvenido(a)</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deserunt, vero laborum eveniet quasi ab libero hic fugit distinctio similique, nobis porro magni itaque, ut, ipsam molestias consequuntur? Laborum, similique!</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 text-center">
				<h4 class="text-uppercase">Total reservas de cada día</h4>
				<div id="columnchart_values" style="width: 100%"></div>
			</div>
			<br>
			<div class="col-md-3">
				<div class="panel bg-indigo">
					<div class="panel-heading fs-em-1 txt-blanco text-uppercase" style="background: url(../../img/Backgrounds/Campo.gif);background-position: center;background-size: cover;height: 200px;position: relative;"><h4 style="bottom: 0;position: absolute;">Administración</h4></div>
					<div class="panel-body txt-blanco"><p class="txt-trp-bl-8" style="margin:0;">No hagas todo el trabajo tu solo. ¡Agrega más administradores!</p></div>
					<div class="panel-footer text-uppercase"><h4><a href="" class="txt-blanco">AGREGAR</a></h4></div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<?php include('../../templades/menuHorizontalAdmin.php'); ?>
			<div class="col-md-3">
				<div class="panel bg-azul">
					<div class="panel-body text-center fs-em-6 txt-blanco"><?php echo $listaAulas->totalAulas(); ?></div>
					<div class="panel-footer text-center txt-trp-bl-7 text-uppercase"><h4 class="fw-400">Aulas del sistema</h4></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel bg-azul-claro">
					<div class="panel-body text-center fs-em-6 txt-blanco"><?php echo $listaAulas->totalAulasBloqueadas(); ?></div>
					<div class="panel-footer text-center txt-trp-bl-7 text-uppercase"><h4 class="fw-400">Aulas bloqueadas</h4></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel bg-cian">
					<div class="panel-body text-center fs-em-6 txt-blanco"><?php echo $listaReservas->reservasHoy(); ?></div>
					<div class="panel-footer text-center txt-trp-bl-7 text-uppercase"><h4 class="fw-400">Pedidos de hoy</h4></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel bg-verde-azul">
					<div class="panel-body text-center fs-em-6 txt-blanco"><?php echo $listaEstudiantes->totalEstudiantes(); ?></div>
					<div class="panel-footer text-center txt-trp-bl-7 text-uppercase"><h4 class="fw-400">Usuarios registrados</h4></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</body>
</html>