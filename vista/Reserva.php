<?php 
	$barraProgreso = '<div class="progress"><div class="progress-bar progress-bar-success" role="progressbar" style=" width:25%;min-width:25%;">25%</div><span class="sr-only">25%</span></div>';
	if($listaAulas->esVacia()){
		echo "<h3>No hay aulas en el sistema</h3>";
	}else{	
?>
<div class="table-responsive text-center">
	<table class="table table-hover">
		<thead>
			<th><center><h5>AULA</h5></center></th>
			<th><center><h5>BLOQUE</h5></center></th>
			<th><center><h5 class="hidden-xs">INFORMACIÓN</h5><h5 class="visible-xs">INF</h5></center></th>
			<th><center><h5>RESERVAR</h5></center></th>
		</thead>
	<?php 

		$aux = $listaAulas->getCabeza();
		while ($aux != NULL) {
			if($aux->getDato()->getEstado() == 0){
				include("../../templades/tablaReservar.php");
			}
			$aux = $aux->getLiga();
		}
	}
	?>	
	</table>
</div>		