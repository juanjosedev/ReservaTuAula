<tr>
	<td><?php echo $aux2->getDato()->getFecha() ?></td>
	<td><?php echo $aux2->getDato()->getHoraInicio()." - ".$aux2->getDato()->getHoraFinal() ?></td>
	<td><?php echo $listaEstudiantes->buscarEstudiante($aux2->getDato()->getEstudiante())->getDato()->getDni() ?></td>
	<td><?php echo $listaEstudiantes->buscarEstudiante($aux2->getDato()->getEstudiante())->getDato()->getNombre()." ".$listaEstudiantes->buscarEstudiante($aux2->getDato()->getEstudiante())->getDato()->getApellidos() ?></td>
	<td><?php echo $aux2->getDato()->EstadoToIcon($aux2->getDato()->getEstado()); ?></td>
</tr>	