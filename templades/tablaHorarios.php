<tr>
	<td><?php echo $aux->getDato()->getBloque();?></td>
	<td><?php echo $aux->getDato()->getNumero();?></td>
	<td>
		<a href="#infoAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-info"></span> <na class="hidden-xs">Información</na></a>
		<div class="modal fade" id="infoAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getNumero()." - ".$aux->getDato()->getBloque();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div role="tabpanel">
							<div class="panelPills">
								<ul class="nav nav-pills" role="tablist">
									<li role="presentation" class="active pills-li">
										<a href="#horario<?php echo $aux->getDato()->getId(); ?>" aria-controls="horario<?php echo $aux->getDato()->getId(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
											Horario
										</a>
									</li>
									<li role="presentation" class="pills-li">
										<a href="#reservas<?php echo $aux->getDato()->getId(); ?>" aria-controls="reservas<?php echo $aux->getDato()->getId(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
											Reservas
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="horario<?php echo $aux->getDato()->getId(); ?>">
									<?php
										$aux2 = $aux->getDato()->getHorario()->getCabeza();
										if($aux2 != NULL){	
									?>
									<div class="table-responsive text-center">
										<table class="table table-hover">
											<thead>
												<th><center><h5>DÍA</h5></center></th>
												<th><center><h5>HORA</h5></center></th>
												<th><center><h5>MATERIA</h5></center></th>
												<th><center><h5>PROFESOR</h5></center></th>
											</thead>
											<?php 
												while ($aux2 != NULL) {

													echo "<tr><td>".$aux2->getDato()->numberToDia($aux2->getDato()->getDia())."</td>";
													echo "<td>".$aux2->getDato()->getHoraInicio()." - ".$aux2->getDato()->getHoraFin()."</td>";
													echo "<td>".$aux2->getDato()->getMateria()."</td>";
													echo "<td>".$aux2->getDato()->getProfesor()."</td></tr>";

													$aux2 = $aux2->getLiga();
												}
												$aux2 = NULL;
											?>
										</table>
									</div>
									<?php 
										}else{
											echo "<br><div class='alert alert-danger' role='alert'>Al parecer el aula no ningún tiene horario asignado <span class='icon-tongue2'></span></div>";
										}
									?>
								</div>
								<div role="tabpanel" class="tab-pane" id="reservas<?php echo $aux->getDato()->getId(); ?>">
									<?php
										$aux2 = $aux->getDato()->getHistorialAula()->getCabeza();
										if(!$aux->getDato()->getHistorialAula()->aulaTieneReservas()){
											echo "<br><div class='alert alert-danger' role='alert'>¡Ups! parece que no se encontró ninguna reserva para este aula <span class='icon-tongue2'></span></div>";
										}else{
									?>
										<div class="table-responsive text-center">
											<table class="table table-hover">
												<thead>
													<th><center><h5>FECHA</h5></center></th>
													<th><center><h5>HORA</h5></center></th>
													<th><center><h5>DOCUMENTO</h5></center></th>
													<th><center><h5>NOMBRE</h5></center></th>
													<th><center><h5>ESTADO</h5></center></th>
												</thead>
									<?php
										
											while ($aux2 != NULL) {
												
												include("../../templades/tablaHistorialAula.php");	
												$aux2 = $aux2->getLiga();
											}
									?>
											</table>
										</div>
									<?php 
										}
									?>	
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td>
		<a href="modificarHorarioAula.php?id_aula=<?php echo $aux->getDato()->getId().'&num_aula='.$aux->getDato()->getNumero().'&bloque='.$aux->getDato()->getBloque(); ?>" class="txt-indigo"><span class="icon-pencil2"></span> <na class="hidden-xs">Modificar</na></a>
	</td>
	<td>
		<?php 
			if($aux->getDato()->getEstado() == 0){
		?>
		<a href="#bloquearAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-lock"></span> <na class="hidden-xs">Bloquear</na></a>
		<div class="modal fade" id="bloquearAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-lock icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">El aula no estará disponible para la reserva de los usuarios.</h4>
							    <i class="txt-gris">¿Bloquear?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
							<a href="../../controlador/Aulas.php?id_aula=<?php echo $aux->getDato()->getId().'&bloquear=Bloquear'; ?>"><button type="button" class="boton boton-chico bg-cian">Bloquear</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<a href="#bloquearAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-unlocked"></span> <na class="hidden-xs">Desbloquear</na></a>
		<div class="modal fade" id="bloquearAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-unlocked icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">El aula pasará a estar disponible para que los usuarios la reserven.</h4>
							    <i class="txt-gris">¿Desbloquear?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
					
							<a href="../../controlador/Aulas.php?id_aula=<?php echo $aux->getDato()->getId().'&desbloquear=Desbloquear'; ?>"><button type="button" class="boton boton-chico bg-cian">Desbloquear</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</td>
</tr>	