<div class="modal fade" id="reservarAula<?php echo $aux->getDato()->getId(); ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" class="frmReservar">
				<div class="modal-header" id="contenidoReservaHeader">
					<div class="modal-header-title">
						<h3 class="fw-300">Reservar Aula: <small><?php echo $aux->getDato()->getBloque()." - ".$aux->getDato()->getNumero();?></small></h3>
						<h4 id="" class="fw-300 tituloPaso1">
							Paso 1:<small>Seleccionar la fecha</small>
						</h4>
						<h4 id="" class="fw-300 tituloPaso2">
							Paso 2:<small>Seleccionar la hora de inicio</small>
						</h4>
						<h4 id="" class="fw-300 tituloPaso3">
							Paso 3:
							<small>Seleccionar la hora final</small>
						</h4>
						<h4 id="" class="fw-300 tituloPaso4">
							Paso 4:
							<small>Confirmar datos</small>
						</h4>
					</div>
				</div>
				<div class="modal-body text-left" id="contenidoReserva">
					<div class="row paso1" id="">
						<div class="col-xs-12">
							<?php echo $barraProgreso; ?>
							<div class="input-group date jj-date">
								<input type="text" class="form-control fecha_reserva" readonly="readonly" name="fecha_reserva" id="fecha_reserva">
								<span class="input-group-addon fecha_reserva"><i class="icon-calendar txt-indigo"></i></span>
							</div>
						</div>
					</div>	
					<div class="row paso2" id="">
						<div class="col-xs-12">
							
							<?php echo $barraProgreso; ?>
							
							<select class="form-guti-select horaInicio" name="horaInicio" id="horaInicio<?php echo $aux->getDato()->getId(); ?>">
								<?php 
									$i = 7;
									while ($i <= 18) {		
								?>
								<option value="<?php echo $i ?>"><?php echo $i.":00" ?></option>
								<?php
										$i++; 
									}
								?>
							</select>
						</div>
					</div>
					<div class="row paso3" id="">
						<div class="col-xs-12">
							<?php echo $barraProgreso; ?>
							<select class="form-guti-select horaFin" name="horaFin" id="horaFin<?php echo $aux->getDato()->getId(); ?>">
								<?php 
									$i = 8;
									while ($i <= 19) {		
								?>
								<option value="<?php echo $i ?>"><?php echo $i.":00" ?></option>
								<?php
										$i++; 
									}
								?>
							</select>
							
						</div>
					</div>
					<div class="row paso4" id="">
						<div class="col-xs-12">
							<!-- Lo más machetero en esta life -->
							<input type="text" class="dy-n" name="id_usuario" value="<?php echo $documento; ?>">
							<input type="text" class="dy-n" name="id_aula" value="<?php echo $aux->getDato()->getId(); ?>">
							<div class="form-group">
								<?php echo $barraProgreso; ?>
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo $nombre.' '.$apellidos; ?>" disabled>
									<span class="input-group-addon"><span class="icon-user txt-indigo"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo $aux->getDato()->getBloque()." - ".$aux->getDato()->getNumero();?>" disabled>
									<span class="input-group-addon"><span class="icon-calendar txt-indigo"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control fecha_confirmar" value="editwithJS" id="fecha_confirmar" disabled>
									<span class="input-group-addon"><span class="icon-calendar txt-indigo"></span></span>
								</div>
							</div>
							<div class="input-group">
								<input type="text" class="form-control hora_confirmar" value="editwithJS" id="hora_confirmar" disabled>
								<span class="input-group-addon"><span class="icon-clock2 txt-indigo"></span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
					<button id="cont1<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo pull-right cont1">Continuar</button>
					<button id="cont2<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo pull-right cont2">Continuar</button>
					<button id="atras2<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo mr-5 pull-right atras2">Atrás</button>
					<button id="cont3<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo pull-right cont3">Continuar</button>
					<button id="atras3<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo mr-5 pull-right atras3">Atrás</button>
					<input type="submit" id="conf4<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo pull-right conf4" name="Reservar" value="Confirmar">
					<button id="atras4<?php echo $aux->getDato()->getId(); ?>" class="boton boton-chico bg-indigo mr-5 pull-right atras4">Atrás</button>
				</div>
			</form>
		</div>
	</div>
</div>