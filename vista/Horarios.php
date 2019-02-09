<?php
	if($listaHorarios->esVacia()){
		echo "<h3>No hay aulas en el sistema</h3>";
	}else{	
?>
	<table class="table table-hover">
		<thead>
			<th><center><h5>BLOQUE</h5></center></th>
			<th><center><h5>AULA</h5></center></th>
			<th><center><h5>INFORMACIÓN</h5></center></th>
			<th><center><h5>MODIFICAR</h5></center></th>
			<th><center><h5>BLOQUEAR</h5></center></th>
		</thead>
<?php
	
		$aux = $listaHorarios->getCabeza();
		while ($aux != NULL) {
			include("../../templades/tablaHorarios.php");
			$aux = $aux->getLiga();
		}
	}
?>
	</table>