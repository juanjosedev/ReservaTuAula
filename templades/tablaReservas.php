<?php

	$aux_estudiante = $listaEstudiantes->buscarEstudiante($aux->getDato()->getEstudiante())->getDato();
	$aux_aula = $listaAulas->buscarAula($aux->getDato()->getAula())->getDato();

	$nombreEstudiante = $aux_estudiante->getNombre()." ".$aux_estudiante->getApellidos();
	$fecha = $aux->getDato()->getHoraInicio()." - ".$aux->getDato()->getHoraFinal();
?>
<tr>
	<td><?php echo $aux->getDato()->getFecha() ?></td>
	<td><?php echo $aux_aula->getBloque() ?></td>
	<td><?php echo $aux_aula->getNumero() ?></td>
	<td><?php 
		echo $aux_estudiante->getDni(); 
	?></td>
	<td>
		<a href="#verificar<?php echo $aux->getDato()->getId() ?>" data-toggle="modal" class="txt-indigo"><span class="icon-user-check"></span> <na class="hidden-xs">Verificar</na></a>
		<div class="modal fade" id="verificar<?php echo $aux->getDato()->getId() ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Verificar Pedido</h3>
					</div>
					<div class="modal-body text-left">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Documento</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $aux_estudiante->getDni(); ?>" type="text" disabled>
										<span class="input-group-addon"><span class="icon-profile txt-indigo"></span></span>
									</div>
								</div>
								<div class="form-group">
									<h5>Aula</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $aux_aula->getNumero(); ?>" type="text" disabled>
										<span class="input-group-addon"><span class=" icon-book txt-indigo"></span></span>
									</div>
								</div>
								<div class="form-group">
									<h5>Fecha</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $aux->getDato()->getFecha() ?>" type="text" disabled>
										<span class="input-group-addon"><span class="icon-calendar txt-indigo"></span></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Solicitante</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $nombreEstudiante ?>" type="text" disabled>
										<span class="input-group-addon"><span class="icon-user txt-indigo"></span></span>
									</div>
								</div>
								<div class="form-group">
									<h5>Bloque</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $aux_aula->getBloque(); ?>" type="text" disabled>
										<span class="input-group-addon"><span class="icon-office txt-indigo"></span></span>
									</div>
								</div>
								<div class="form-group">
									<h5>Hora</h5>
									<div class="input-group">
										<input class="form-control" value="<?php echo $fecha ?>" type="text" disabled>
										<span class="input-group-addon"><span class="icon-clock2 txt-indigo"></span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<?php

						if($aux->getDato()->getEstado() == 1):

						?>
						<form action="" method="post" class="dy-ig">
							<!-- Lo más machetero x2 -->
							<input type="text" class="dy-n" name="id_reserva" value="<?php echo $aux->getDato()->getId(); ?>">
							<input type="submit" class="boton boton-chico bg-cian" value="Cancelar" name="cancelar">
						</form>
						<form action="" method="post" class="dy-ig">
							<!-- Lo más machetero x2 -->
							<input type="text" class="dy-n" name="id_reserva" value="<?php echo $aux->getDato()->getId(); ?>">
							<input type="submit" class="boton boton-chico bg-indigo" value="Confirmar" name="confirmar">
						</form>
						<?php

						endif;
						
						?>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td><?php echo $aux->getDato()->EstadoToIcon($aux->getDato()->getEstado()); ?></td>
</tr>		