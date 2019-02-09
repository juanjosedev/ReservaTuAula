<?php 
	if($listaReservas->esVacia()){
		echo "<div class='alert alert-danger' role='alert'>No hay pedidos en el sistema <span class='icon-confused2'></span></div>";
	}else{	
?>
<div class="table-responsive text-center">
	<table class="table table-hover">
		<thead>
			<th><center><h5>FECHA</h5></center></th>
			<th><center><h5>BLOQUE</h5></center></th>
			<th><center><h5>AULA</h5></center></th>
			<th><center><h5>DOCUMENTO</h5></center></th>
			<th><center><h5>VERIFICAR</h5></center></th>
			<th><center><h5>ESTADO</h5></center></th>
		</thead>
	<?php 

		$aux = $listaReservas->getCabeza();
		while ($aux != NULL) {
			include("../../templades/tablaReservas.php");
			$aux = $aux->getLiga();
		}
	}
	?>	
	</table>
</div>		