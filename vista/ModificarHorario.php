<?php
	if($listaHorarioAula->esVacia()){
		echo "<br><div class='alert alert-danger' role='alert'>El aula no tiene horario <span class='icon-tongue2'></span></div>";

	}else{	
?>
	<table class="table table-hover">
		<thead>
			<th><center><h5>DÍA</h5></center></th>
			<th><center><h5>HORA</h5></center></th>
			<th><center><h5>MATERIA</h5></center></th>
			<th><center><h5>PROFESOR</h5></center></th>
			<th><center><h5>ELIMINAR</h5></center></th>
		</thead>
<?php
	
		$aux = $listaHorarioAula->getCabeza();
		while ($aux != NULL) {
			include("../../templades/tablaModificarHorarios.php");
			$aux = $aux->getLiga();
		}
	}
?>
	</table>