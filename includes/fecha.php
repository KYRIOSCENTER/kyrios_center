<?php
define('TIMEZONE', 'America/Bogota'); date_default_timezone_set(TIMEZONE);
$hoy= getdate();
//print_r($hoy);
$dia= $hoy['mday'];
$mes= $hoy['mon'];
$año= $hoy['year'];
echo $estado;
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

function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 
  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2]; 
  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es válida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es válida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 
}
//$primera = "30/12/2018";
//$segunda = "21/01/2019";
//$diasfechas= compararFechas ($primera,$segunda);
//$diasfechas=abs($diasfechas);
//echo $diasfechas;
?>