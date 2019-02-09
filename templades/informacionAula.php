<div class="media">
	<div class="media-left">
		<span class="icon-library icon-info-aula"></span>
	</div>
	<div class="media-body text-left">
		<h4 class="media-heading fw-400"><?php echo $aux->getDato()->getTipo();?></h4>
	    <i class="txt-gris">Tipo</i>
	</div>
</div>
<hr>
<div class="media">
	<div class="media-left">
		<span class="icon-stats-bars2 icon-info-aula"></span>
	</div>
	<div class="media-body text-left">
		<h4 class="media-heading fw-400"><?php echo $aux->getDato()->getCapacidad();?> personas</h4>
	    <i class="txt-gris">Capacidad</i>
	</div>
</div>
<hr>
<div class="media">
	<div class="media-left">
		<span class="icon-price-tag icon-info-aula"></span>
	</div>
	<div class="media-body text-left">
		<h4 class="media-heading fw-400"><?php echo join(", ", $aux->getDato()->getImplementos());?></h4>
	    <i class="txt-gris">Implementos</i>
	</div>
</div>