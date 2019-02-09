<tr>
	<td><?php echo $aux->getDato()->getNumero(); ?></td>
	<td><?php echo $aux->getDato()->getBloque(); ?></td>
	<td>
		<a href="#infoAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-info"></span> <na class="hidden-xs">Información</na>
		</a>
		<div class="modal fade" id="infoAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque()." - ".$aux->getDato()->getNumero(); ?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="row">
							<div class="col-md-12">
								<?php include('../../templades/informacionAula.php'); ?>
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
		<a href="#reservarAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-profile"></span> <na class="hidden-xs">Reservar</na></a>
		<?php include('ventanaReservar.php'); ?>
	</td>
</tr>	
