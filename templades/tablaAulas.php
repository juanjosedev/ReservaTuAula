<tr>
	<td><?php echo $aux->getDato()->getBloque();?></td>
	<td><?php echo $aux->getDato()->getNumero();?></td>
	<td>
		<a href="#modificarAula<?php echo $aux->getDato()->getId(); ?>" data-toggle="modal" class="txt-indigo"><span class="icon-pencil2"></span> <na class="hidden-xs">Acción</na></a>
		<div class="modal fade" id="modificarAula<?php echo $aux->getDato()->getId(); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-header-title">Aula <small><?php echo $aux->getDato()->getBloque();?>-<?php echo $aux->getDato()->getNumero();?></small></h3>
					</div>
					<form action="../../controlador/Aulas.php" method="get" id="formulario_modificar_<?php echo $aux->getDato()->getId(); ?>" class="formulario_modificar_aula">
						<input type="text" style="display:none;" value="<?php echo $aux->getDato()->getId(); ?>" name="id">
						<div class="modal-body text-left">
							<div role="tabpanel">
								<div class="panelPills">
									<ul class="nav nav-pills" role="tablist">
										<li role="presentation" class="active pills-li">
											<a href="#informacion<?php echo $aux->getDato()->getId(); ?>" aria-controls="informacion<?php echo $aux->getDato()->getId(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
												Información
											</a>
										</li>
										<li role="presentation" class="pills-li">
											<a href="#guardar_seccion<?php echo $aux->getDato()->getId(); ?>" aria-controls="guardar_seccion<?php echo $aux->getDato()->getId(); ?>" data-toggle="tab" role="tab" class="txt-indigo">
												Modificar
											</a>
										</li>
									</ul>
								</div>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="informacion<?php echo $aux->getDato()->getId(); ?>">
										<div class="row">
											<div class="col-md-12">
												<?php include('../templades/informacionAula.php'); ?>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="guardar_seccion<?php echo $aux->getDato()->getId(); ?>">
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

															if(in_array("Tablero", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array('Tablero'));;
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
															if(in_array("Sillas", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array('Sillas'));;
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

															if(in_array("Pc's", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Pc's"));
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

															if(in_array("Portátiles", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Portátiles"));
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

															if(in_array("Tablets", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Tablets"));
															}					
															?>>
														</span>
													</div>
												</div>
												<div class="input-group">
													<input class="form-control" value="Televisor" type="text" disabled>
													<span class="input-group-addon">
														<input type="checkbox" id="televisor" name="implementos[]" value="Televisor"<?php 

															if(in_array("Televisor", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Televisor"));
															}				
															?>>
													</span>
												</div>
											</div>
											<br>
											<div class="col-md-6">
												<div class="form-group">
													<div class="input-group">
														<input class="form-control" value="Video beam" type="text" disabled>
														<span class="input-group-addon">
															<input type="checkbox" id="video_beam" name="implementos[]" value="Video beam"<?php 

															if(in_array("Video beam", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Video beam"));
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

															if(in_array("Implementos de aseo", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Implementos de aseo"));
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

															if(in_array("Instrumentos musicales", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Instrumentos musicales"));
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

															if(in_array("Instrumentos de laboratorio", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Instrumentos de laboratorio"));
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
															if(in_array("Instrumentos de ferretería", $implementos)){
																echo "checked";
																$implementos = array_diff($implementos, array("Instrumentos de ferretería"));
															}					
															?>>
														</span>
													</div>
												</div>
												<div class="input-group">
													<input class="form-control" placeholder="Otro ¿Cuál?" type="text" id="otro_valor" value="<?php 
													echo join(', ', $implementos);
													?>">
													<span class="input-group-addon">
														<input type="checkbox" id="otro" name="implementos[]" 
														<?php
															if($implementos != Null){
																echo 'checked';
															} 
														?>
														>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="boton boton-chico pull-left" data-dismiss="modal">Cerrar</button>
							<input type="submit" class="boton boton-chico bg-indigo pull-right guardar" name="guardar" value="Guardar">
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
						<a href="../../controlador/Aulas.php?id_aula=<?php echo $aux->getDato()->getId().'&eliminar=Eliminar'; ?>"><button type="button" class="boton boton-chico bg-cian btn-eliminar">Eliminar</button></a>
					</div>
				</div>
			</div>
		</div>
	</td>
</tr>