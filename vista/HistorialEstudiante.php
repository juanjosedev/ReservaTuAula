<?php
	if($listaReservasEstudiante->esVacia()){
		echo "<h3>Aún no has hecho ninguna reserva <span class='icon-wondering'></span> 1</h3>";
	}elseif ($listaReservasEstudiante->estudianteTieneReservas($documento)) {
?>
	<div class="table-responsive text-center">
		<table class="table table-hover">
			<thead>
				<th><center><h5>BLOQUE</h5></center></th>
				<th><center><h5>AULA</h5></center></th>
				<th><center><h5>HORA</h5></center></th>
				<th><center><h5>FECHA</h5></center></th>
				<th><center><h5>CANCELAR</h5></center></th>
				<th><center><h5>ESTADO</h5></center></th>
			</thead>
<?php
	
		$aux = $listaReservasEstudiante->getCabeza();
		while ($aux != NULL) {
			
			if($aux->getDato()->getEstudiante() == $documento){
				include("../../templades/tablaHistorial.php");	
			}

			$aux = $aux->getLiga();
		}
?>
		</table>
	</div>
<?php 
	}else{
		echo "<h3>Aún no has hecho ninguna reserva <span class='icon-wondering'></span> 2</h3>";
	}
?>	