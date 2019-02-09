<?php
	if($listaAulas->esVacia()){
		echo "<h3>No hay aulas en el sistema</h3>";
	}else{	
?>
	<table class="table table-hover">
		<thead>
			<th><center><h5>BLOQUE</h5></center></th>
			<th><center><h5>AULA</h5></center></th>
			<th><center><h5>ACCIÓN</h5></center></th>
			<th><center><h5>ELIMINAR</h5></center></th>
		</thead>
<?php
	
		$aux = $listaAulas->getCabeza();
		while ($aux != NULL) {
			include("../templades/tablaAulas.php");
			$aux = $aux->getLiga();
		}
	}
?>
	</table>