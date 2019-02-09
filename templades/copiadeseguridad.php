<tr>
	<td><?php echo $aux->getDato()->getNumero();?></td>
	<td><?php echo $aux->getDato()->getBloque();?></td>
	<td>
		<a href="<?php echo '#infoAula'.$aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-info"></span> <na class="hidden-xs">Información</na></a>
		<div class="modal fade" id="<?php echo 'infoAula'.$aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<?php include('../templades/informacionAula.php'); ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td>
		<a href="#modificarAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-pencil2"></span> <na class="hidden-xs">Modificar</na></a>
		<div class="modal fade" id="modificarAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<form action="../../controlador/Aulas.php" method="get" id="formulario_modificar_<?php echo $aux->getDato()->getId(); ?>" class="formulario_modificar_aula">
						<input type="text" style="display:none;" value="<?php echo $aux->getDato()->getId(); ?>" name="id">
						<div class="modal-body text-left">
							<div class="row">
								<div class="col-md-6">
									<h5 class="txt-indigo">Tipo de aula</h5>
									<select class="form-guti-select" id="tipo" name="tipo">
										<?php 
											switch ($aux->getDato()->getTipo()) {
												case 'Aula de sistemas':
													echo '
														<option value="Aula de sistemas">Aula de sistemas</option>
														<option value="Aula normal">Aula normal</option>
														<option value="Aula interactiva">Aula interactiva</option>
													';
													break;
												case 'Aula interactiva':
													echo '
														<option value="Aula interactiva">Aula interactiva</option>
														<option value="Aula normal">Aula normal</option>
														<option value="Aula de sistemas">Aula de sistemas</option>
													';
													break;
												default:
													echo '
														<option value="Aula normal">Aula normal</option>
														<option value="Aula de sistemas">Aula de sistemas</option>
														<option value="Aula interactiva">Aula interactiva</option>
													';
													break;
											}
										?>	
									</select>
								</div>
								<div class="col-md-6">
									<h5 class="txt-indigo">Capacidad</h5>
									<div class="input-group">
										<input type="text" class="form-control" id="capacidad" name="capacidad" placeholder="Ejemplo: 35" value="<?php echo $aux->getDato()->getCapacidad();?>">
										<span class="input-group-addon"><span class="icon-users txt-indigo"></span></span>
									</div>
								</div>	
								<div class="col-md-12">
									<h5 class="txt-indigo">Implementos</h5>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Tablero" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" name="implementos[]" value="Tablero" id="tablero"
												<?php 
												$implementos = $aux->getDato()->getImplementos();

												if($aux->implementoYaExiste($aux, 'Tablero')){
													echo "checked";
													$implementos = str_replace ( 'Tablero' , '' , $implementos);
												}					
												?>
												>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Sillas" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" name="implementos[]" value="Sillas" id="sillas"<?php 

												if($aux->implementoYaExiste($aux, 'Sillas')){
													echo "checked";
													$implementos = str_replace ( 'Sillas' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Pc's" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="pc" name="implementos[]" value="Pc's"<?php 

												if($aux->implementoYaExiste($aux, "Pc's")){
													echo "checked";
													$implementos = str_replace ( "Pc's" , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Portátiles" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="portatil" name="implementos[]" value="Portátiles"<?php 

												if($aux->implementoYaExiste($aux, 'Portátiles')){
													echo "checked";
													$implementos = str_replace ( 'Portátiles' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Tablets" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="tablet" name="implementos[]" value="Tablets"<?php 

												if($aux->implementoYaExiste($aux, 'Tablets')){
													echo "checked";
													$implementos = str_replace ( 'Tablets' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="input-group">
										<input class="form-control" value="Televisor" type="text" disabled>
										<span class="input-group-addon">
											<input type="checkbox" id="televisor" name="implementos[]" value="Televisor"<?php 

												if($aux->implementoYaExiste($aux, 'Televisor')){
													echo "checked";
													$implementos = str_replace ( 'Televisor' , '' , $implementos);
												}					
												?>>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Video beam" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="video_beam" name="implementos[]" value="Video beam"<?php 

												if($aux->implementoYaExiste($aux, 'Video beam')){
													echo "checked";
													$implementos = str_replace ( 'Video beam' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Implementos de aseo" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="aseo" name="implementos[]" value="Implementos de aseo"<?php 

												if($aux->implementoYaExiste($aux, 'Implementos de aseo')){
													echo "checked";
													$implementos = str_replace ( 'Implementos de aseo' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Instrumentos musicales" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="musica" name="implementos[]" value="Instrumentos musicales"<?php 

												if($aux->implementoYaExiste($aux, 'Instrumentos musicales')){
													echo "checked";
													$implementos = str_replace ( 'Instrumentos musicales' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Instrumentos de laboratorio" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="laboratorio" name="implementos[]" value="Instrumentos de laboratorio"<?php 

												if($aux->implementoYaExiste($aux, 'Instrumentos de laboratorio')){
													echo "checked";
													$implementos = str_replace ( 'Instrumentos de laboratorio' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" value="Instrumentos de ferretería" type="text" disabled>
											<span class="input-group-addon">
												<input type="checkbox" id="ferreteria" name="implementos[]" value="Instrumentos de ferretería"<?php 

												if($aux->implementoYaExiste($aux, 'Instrumentos de ferretería')){
													echo "checked";
													$implementos = str_replace ( 'Instrumentos de ferretería' , '' , $implementos);
												}					
												?>>
											</span>
										</div>
									</div>
									<div class="input-group">
										<input class="form-control" placeholder="Otro ¿Cuál?" type="text" id="otro_valor" value="<?php echo str_replace ( ', ' , '' , $implementos); ?>">
										<span class="input-group-addon">
											<input type="checkbox" id="otro" name="implementos[]" 
											<?php
												if($implementos != ''){
													echo 'checked';
												} 
											?>
											>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
							<input type="submit" class="boton boton-chico bg-verde pull-right guardar" name="guardar" value="Guardar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</td>
	<td>
		<a href="#eliminarAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-bin2"></span> <na class="hidden-xs">Eliminar</na></a>
		<div class="modal fade" id="eliminarAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<div class="modal-body text-left">
						<ul>
							<li><span class="icon-bin2 txt-rosa"></span><b> ¿Eliminar?</b> - Si eliminas el aula se perderán la información, el historial, y las reservas de este aula</li>
						</ul>	
					</div>
					<div class="modal-footer">
						<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
						<a href="../../controlador/Aulas.php?id_aula=<?php echo $aux->getDato()->getId().'&eliminar=Eliminar'; ?>"><button type="button" class="boton boton-chico bg-rosa btn-eliminar">Eliminar</button></a>
					</div>
				</div>
			</div>
		</div>
	</td>
</tr>
