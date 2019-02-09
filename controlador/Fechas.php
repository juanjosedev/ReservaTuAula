<?php
	date_default_timezone_set ("America/Bogota");
	$fecha_reserva = "2018-06-01";
	$hora_final = "09:00:00";
	$fecha_actual = date("Y")."-".date("m")."-".date("d");
	$hora_actual = date("H").":00:00";
	echo "Fecha reserva: ".$fecha_reserva."<br>Fecha actual: ".$fecha_actual."<br>Hora final: ".$hora_final."<br>Hora actual: ".$hora_actual."<br>";
	echo $hora_final > $hora_actual;
?>