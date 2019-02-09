<section class="tarjeta" style="background: url(../../img/usuarios/<?php echo $aux->getDato()->getFoto();?>);">
	<span class="icon">
		<a href="#" title="Compartir"><img src="https://www.wardcnc.com/Content/_WardCncContent/Images/icon-share.svg" alt=""></a>
	</span>
	<div>
		<div class="head">
			<h3><?php echo $aux->getDato()->getNombre()." ".$aux->getDato()->getApellidos(); ?></h3>
		</div>
		<div class="body">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic culpa quas.</p>
		</div>
		<hr>
		<div class="footer">
			<a href="#eliminarAula<?php //echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-bin2"></span> <na class="hidden-xs">Eliminar</na></a>
		<div class="modal fade" id="eliminarAula<?php //echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php //echo $aux->getDato()->getBloque();?>-<?php //echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<div class="media">
							<div class="media-left">
								<span class="icon-bin2 icon-info-aula"></span>
							</div>
							<div class="media-body text-left">
								<h4 class="media-heading fw-400">Se perderán la información, el historial, y las reservas de este aula.</h4>
							    <i class="txt-gris">¿Eliminar?</i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<a href="../../controlador/Aulas.php?id_aula=<?php //echo $aux->getDato()->getId().'&eliminar=Eliminar'; ?>"><button type="button" class="boton boton-chico bg-cian btn-eliminar">Eliminar</button></a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>