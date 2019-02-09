<tr>
	<td><?php echo $auxReservas->getDato()->getFecha(); ?></td>
	<td><?php echo $auxReservas->getDato()->getHoraInicio()." - ".$auxReservas->getDato()->getHoraFinal() ?></td>
	<td><?php echo $listaAulas->buscarAula($auxReservas->getDato()->getAula())->getDato()->getBloque(); ?></td>
	<td><?php echo $listaAulas->buscarAula($auxReservas->getDato()->getAula())->getDato()->getNumero(); ?></td>
	<td><?php echo $auxReservas->getDato()->EstadoToIcon($auxReservas->getDato()->getEstado()); ?></td>
</tr>	