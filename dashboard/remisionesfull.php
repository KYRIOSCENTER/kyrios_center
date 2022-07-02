<?php

require_once "../includes/pdf/lib/mpdf.php";
include '../includes/conexion.php';

//este archivo crea un pdf con todas las remisiones de la base de datos.

$numero="select * from ordenes";
$numero2=mysqli_query($conexion, $numero);
$numero3=mysqli_num_rows($numero2);

//$norden = $_POST["n"];
$norden = $numero3;

$mpdf = new mPDF('A4');

for ($i=1; $i<=$norden; $i++)
{
$sql1="SELECT * FROM ordenes WHERE codigo='$i'";
$sql2=mysqli_query($conexion, $sql1);
$rows=mysqli_fetch_array($sql2);


$PDFContent = '
<html>
					<head>
						<style>
							table.fecha
							{
								width: 23%;
								border-collapse: collapse;
								margin-left: 5px;
								margin-right: 5px;
								border: 1px solid 000000;
							}
							table.notas
							{
								width: 100%;
								border-collapse: collapse;
								margin-left: 5px;
								margin-right: 5px;
								border: 1px solid 000000;
							}
							tr.notas
							{
								border: 1px solid black;
							}
							td.notas
							{
								border: 1px solid black;
							}
							table.otra
							{
							  border-top: 1px hidden;
							  border-bottom: 1px hidden;
							  border-spacing:5px;
							  width: 100%;
							}

							tr.otra
							{
							  border-left: 1px hidden;
							  border-right: 1px hidden;
							}

							td.otra
							{
							  border: 1px solid #000000;
							  padding-top: 3px;
							  padding-left: 3px;
							  display: block; 
							  overflow: hidden;
							}
							td{
								padding: 5px;
							}
						@page {
							margin-top: 0.5cm;
							margin-left: 0.7cm;
							margin-right: 0.7cm;
							margin-bottom: 0.2cm;
							background-image: url("img/kyrios2.jpg");
							background-repeat: no-repeat;
							background-position: 50% 20%;
						}							
						</style>
					</head>
					<body>
						<div style="">
						<img src="img/kyrios.jpg" width="70%">
						</div>
						<div style="margin-top: -60px;">
						<table class="fecha" align="right">
							<tr class="notas">
								<td class="notas" align="center">
								<b>Orden No: </b> <font color="#ff0000" face="verdana" size="4">'.$rows["codigo"].'</font>
								</td>
							</tr>
							<tr class="notas">
								<td class="notas" align="center">
								<b>Fecha: </b>'.$rows["fecha"].'
								</td>
							</tr>
						</table>
						</div>
						<table class="otra" style="margin-top: 2px;">
							  <tr class="otra">
								<td class="otra" colspan="2">
									<b>Cliente: </b>'.$rows["nomcliente"].'
								</td>
								<td class="otra" colspan="2">
									<b>Celular: </b>'.$rows["celcliente"].'
								</td>
							  </tr>
							  <tr class="otra">
								<td class="otra">
									<b>Equipo: </b>'.$rows["equipo"].'
								</td>
								<td class="otra">
									<b>Marca: </b>'.$rows["marca"].'
								</td>
								<td class="otra">
									<b>Modelo: </b>'.$rows["modelo"].'
								</td>
								<td class="otra">
									<b>Serial: </b>'.$rows["serial"].'
								</td>
							  </tr>
						</table>
						<table class="notas">
							  <tr class="notas">
								<td align="center" class="notas">
									<b>Falla Reportada</b>
								</td>
							  </tr>
							  <tr class="notas">
								<td class="notas" height="65px;" valign="top" align="justify">
									'.$rows["notacliente"].'
								</td>
							  </tr>
						</table>
						<table class="notas" style="margin-top: 5px;">
							  <tr class="notas">
								<td align="center" class="notas">
									<b>Observaciones</b>
								</td>
							  </tr>
							  <tr class="notas">
								<td class="notas" height="65px;" valign="top" align="justify">
									'.$rows["observaciones"].'
								</td>
							  </tr>
						</table>	
						<table class="notas" style="margin-top: 5px;">
							  <tr class="notas">
								<td align="center" class="notas">
									<b>Informe Técnico</b>
								</td>
							  </tr>
							  <tr class="notas">
								<td class="notas" height="65px;" valign="top" align="justify">
									'.$rows["notatecnico"].' - <font color="#ff0000">'.$rows["estado"].' '.$rows["fechafin"].'</font>
								</td>
							  </tr>
						</table>
						<table class="otra">
							  <tr class="otra">
								<td class="otra" colspan="2"><b>Técnico</b><center><br><br>_________________________________<br>'.$rows["tecnico"].'</center></td>
								<td class="otra" colspan="2" ><b>Cliente</b><center><br><br>_________________________________<br>'.$rows["nomcliente"].'</center></td>
							  </tr>
							  <tr class="">
								<td class="" colspan="4" style="padding-top: -3px; padding-left: 0px;" align="justify">
									<p><font size="2"><i>
									Ley 1480 de 2011, Cap 2 Art 18 - El prestador del servicio lo requerir&aacute; para que lo retire dentro de los dos (2) meses siguientes a la remisi&oacute;n de la comunicaci&oacute;n.
									Si el consumidor no lo retira se entender&aacute; por ley que abandona el bien y el prestador del servicio deber&aacute; disponer del mismo conforme
									con la reglamentaci&oacute;n que expida el Gobierno Nacional para el efecto.
									</i></font></p>
								</td>
							  </tr>
						</table>
					</body>
';
$PDFContent = mb_convert_encoding($PDFContent, 'UTF-8', 'UTF-8');
$mpdf->WriteHTML($PDFContent);
if($i<$norden)
$mpdf->addpage();
}
$mpdf->Output('Ordenes del Nº 1 al '.$norden.'.pdf', 'I');
mysqli_close( $conexion );

?>