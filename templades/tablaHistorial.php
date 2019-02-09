<tr>
	<td><?php echo $listaHorarios->buscarAula($aux->getDato()->getAula())->getDato()->getNumero(); ?></td>
	<td><?php echo $listaHorarios->buscarAula($aux->getDato()->getAula())->getDato()->getBloque(); ?></td>
	<td><?php echo $aux->getDato()->getHoraInicio()." - ".$aux->getDato()->getHoraFinal() ?></td>
	<td><?php echo $aux->getDato()->getFecha() ?></td>
	<td>
	<?php if($aux->getDato()->getEstado() == 1){ ?>
		<a href="#cancelarReserva<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-blocked"></span> <na class="hidden-xs">Cancelar</na></a>
		<div class="modal fade" id="cancelarReserva<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Reserva <small><?php echo $aux->getDato()->getFecha() ?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-blocked icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">Ya no podrás hacer efectiva la prestación del aula.</h4>
							    <i class="txt-gris">¿Cancelar?</i>
							</div>
						</div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<form action="" method="post" class="dy-ig">
							<!-- Lo más machetero x2 -->
							<input type="text" class="dy-n" name="id_reserva" value="<?php echo $aux->getDato()->getId(); ?>">
							<input type="submit" class="boton boton-chico bg-cian" value="Cancelar" name="cancelar">
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php }else{
		echo "<Strong class='txt-indigo'>No disponible</Strong>";
	} ?>	
	</td>
	<td><?php echo $aux->getDato()->EstadoToIcon($aux->getDato()->getEstado()); ?></td>
</tr>	