<tr>
	<td><?php echo $aux->getDato()->numberToDia($aux->getDato()->getDia()); ?></td>
	<td><?php echo $aux->getDato()->getHoraInicio()." - ".$aux->getDato()->getHoraFin(); ?></td>
	<td><?php echo $aux->getDato()->getMateria(); ?></td>
	<td><?php echo $aux->getDato()->getProfesor(); ?></td>
	<td>
		<a href="#eliminarClase<?php echo $aux->getDato()->getIdClase(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-bin2"></span> <na class="hidden-xs">Eliminar</na></a>
		<div class="modal fade" id="eliminarClase<?php echo $aux->getDato()->getIdClase(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Eliminar clase <small></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-bin2 icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">Se perderá la información, y las horas pasarán a estar disponibles.</h4>
							    <i class="txt-gris">¿Eliminar?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<a href="<?php echo 'modificarHorarioAula.php?id_aula='.$aux->getDato()->getIdAula().'&num_aula='.$_GET["num_aula"].'&bloque='.$_GET["bloque"].'&id_clase='.$aux->getDato()->getIdClase().'&eliminar=true'; ?>"><button type="button" class="boton boton-chico bg-cian btn-eliminar">Eliminar</button></a>
					</div>
				</div>
			</div>
		</div>
	</td>
</tr>