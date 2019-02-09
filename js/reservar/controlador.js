var pasoR1 = new Reservar('Paso 1:<small>Seleccionar la fecha</small>','<?php echo $barraProgreso; ?><div class="input-group date jj-date"><input type="text" class="form-control" readonly="readonly" name="fecha"><span class="input-group-addon"><i class="icon-calendar txt-indigo"></i></span></div>','<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>');

var pasoR2 = new Reservar('Paso 2:<small>Seleccionar la hora de inicio</small>','','')

var cabeza = new ListaDoble();
	
cabeza.agregar(pasoR1);
cabeza.agregar(pasoR2);