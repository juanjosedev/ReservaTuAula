<tr>
	<td><?php echo $aux->getDato()->getDni(); ?></td>
	<td><?php echo $aux->getDato()->getNombre(); ?></td>
	<td><?php echo $aux->getDato()->getApellidos(); ?></td>
	<td>
		<a href="#perfil<?php echo $aux->getDato()->getDni(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-info"></span> <na class="hidden-xs">Información</na></a>
		<div class="modal fade" id="perfil<?php echo $aux->getDato()->getDni(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="fw-300 modal-header-title"><?php echo $aux->getDato()->getNombre()." ".$aux->getDato()->getApellidos(); ?></small></h3>
					<!-- <div class="pull-right">-->
						<div class="bg-profile-image" style="background: #3F51B5;background: linear-gradient(to right, #3F51B5 0%, #03A9F4 100%);">
							<div style="background:url(../../img/usuarios/<?php echo $aux->getDato()->getFoto();?>);width: 100%;height: 100%;background-position: center;background-size: cover;border-radius: 50%;"></div>
						</div>	
					<!-- </div>  -->
					</div>
					<div class="modal-body text-left">
						<div role="tabpanel">
							<div class="panelPills">
								<ul class="nav nav-pills" role="tablist">
									<li role="presentation" class="active pills-li">
										<a href="#infoPersonal<?php echo $aux->getDato()->getDni(); ?>" aria-controls="infoPersonal<?php echo $aux->getDato()->getDni(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
											Información
										</a>
									</li>
									<li role="presentation" class="pills-li">
										<a href="#reservas<?php echo $aux->getDato()->getDni(); ?>" aria-controls="reservas<?php echo $aux->getDato()->getDni(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
											Reservas
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="infoPersonal<?php echo $aux->getDato()->getDni(); ?>">
									<div class="media">
										<div class="media-left">
											<span class="icon-user icon-info-aula"></span>
										</div>
										<div class="media-body text-left">
											<h4 class="media-heading fw-400"><?php echo $aux->getDato()->getNombre()." ".$aux->getDato()->getApellidos(); ?></h4>
										    <i class="txt-gris">Nombre</i>
										</div>
									</div>
									<hr>
									<div class="media">
										<div class="media-left">
											<span class="icon-profile icon-info-aula"></span>
										</div>
										<div class="media-body text-left">
											<h4 class="media-heading fw-400"><?php echo $aux->getDato()->getDni();?></h4>
										    <i class="txt-gris">Documento</i>
										</div>
									</div>
									<hr>
									<div class="media">
										<div class="media-left">
											<span class="icon-envelop icon-info-aula"></span>
										</div>
										<div class="media-body text-left">
											<h4 class="media-heading fw-400"><?php echo $aux->getDato()->getCorreo(); ?></h4>
										    <i class="txt-gris">Correo</i>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="reservas<?php echo $aux->getDato()->getDni(); ?>">
									<?php 
										$auxReservas = $aux->getDato()->getHistorialEstudiante()->getCabeza();
										if($auxReservas == Null){
											echo '<div class="container-fluid hide-5">
													<br><div class="alert alert-danger" role="alert">El estudiante no ha hecho ninguna reserva</div>
												</div>';
										}else{
									?>
									<div class="table-responsive text-center">
										<table class="table table-hover">
											<thead>
												<th><center><h5>FECHA</h5></center></th>
												<th><center><h5>HORA</h5></center></th>
												<th><center><h5>BLOQUE</h5></center></th>
												<th><center><h5>AULA</h5></center></th>
												<th><center><h5>ESTADO</h5></center></th>
											</thead>
									<?php		
											while ($auxReservas != Null) {
												include("../../templades/tablaHistorialEstudiante.php");
												$auxReservas = $auxReservas->getLiga();
											}		
										}
									?>
										</table>
									</div>		
								</div>
							</div>
						</div>		
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td>
		<?php 
			if($aux->getDato()->getEstado() == 0){
		?>
		<a href="#bloquearEstudiante<?php echo $aux->getDato()->getDni(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-lock"></span> <na class="hidden-xs">Bloquear</na></a>
		<div class="modal fade" id="bloquearEstudiante<?php echo $aux->getDato()->getDni(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title"><?php echo $aux->getDato()->getNombre()." ".$aux->getDato()->getApellidos(); ?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-lock icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">El estudiante no podrá reservar ningún aula de clase.</h4>
							    <i class="txt-gris">¿Bloquear?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
							<a href="../../controlador/Aulas.php?id_estudiante=<?php echo $aux->getDato()->getDni().'&bloquearEstudiante=BloquearEstudiante'; ?>"><button type="button" class="boton boton-chico bg-cian">Bloquear</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<a href="#bloquearEstudiante<?php echo $aux->getDato()->getDni(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-unlocked"></span> <na class="hidden-xs">Desbloquear</na></a>
		<div class="modal fade" id="bloquearEstudiante<?php echo $aux->getDato()->getDni(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title"><?php echo $aux->getDato()->getNombre()." ".$aux->getDato()->getApellidos(); ?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-unlocked icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">El estudiante podrá volver a reservar un espacio.</h4>
							    <i class="txt-gris">¿Desbloquear?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<a href="../../controlador/Aulas.php?id_estudiante=<?php echo $aux->getDato()->getDni().'&desbloquearEstudiante=DesbloquearEstudiante'; ?>"><button type="button" class="boton boton-chico bg-cian">Desbloquear</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</td>
</tr>