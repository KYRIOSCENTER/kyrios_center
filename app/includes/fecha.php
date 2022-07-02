<?php
define('TIMEZONE', 'America/Bogota'); date_default_timezone_set(TIMEZONE);
$hoy= getdate();
//print_r($hoy);
$dia= $hoy['mday'];
$mes= $hoy['mon'];
$año= $hoy['year'];
if ($dia<=9)
{
	$dia="0".$dia;
}
if ($mes<=9)
{
	$mes="0".$mes;
}
$fechasys= $dia."/".$mes."/".$año;
//echo $fechasys;
?>