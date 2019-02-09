<?php
	if($listaEstudiantes->esVacia()){
		echo "<h3>No hay usuarios en el sistema</h3>";
	}else{	
?>
	<div class="table-responsive text-center">
		<table class="table table-hover">
			<thead>
				<th><center><h5>DOCUMENTO</h5></center></th>
				<th><center><h5>NOMBRE</h5></center></th>
				<th><center><h5>APELLIDOS</h5></center></th>
				<th><center><h5>INFORMACIÓN</h5></center></th>
				<th><center><h5>BLOQUEAR</h5></center></th>
			</thead>
<?php
	
		$aux = $listaEstudiantes->getCabeza();
		while ($aux != NULL) {
			include("../../templades/tablaUsuarios.php");
			$aux = $aux->getLiga();
		}
	}
?>
		</table>
	</div>	