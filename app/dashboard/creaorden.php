<?php

include '../includes/conexion.php';
include '../includes/fecha.php';

$numero="select * from ordenes";
$numero2=mysqli_query($conexion, $numero);
$numero3=mysqli_num_rows($numero2);
$cuenta=$numero3+1;


$nombre=NULL;
if(isset($_POST["nombre"])){ 
  $nombre= $_POST["nombre"];
  $email= $_POST["email"];
  
  $cliente= $_POST["nomcliente"];
  $cel= $_POST["celcliente"];
  $equipo= $_POST["equipo"];
  $marca= $_POST["marca"];
  $modelo= $_POST["modelo"];
  $serial= $_POST["serial"];
  $falla= $_POST["falla"];
  $observaciones= $_POST["observaciones"];
  $valor= $_POST["valor"];
   
  $insertar="INSERT INTO ordenes (fecha, tecnico, nomcliente, celcliente, equipo, marca, modelo, serial, notacliente, observaciones, valor) VALUES ('$fechasys', '$nombre', '$cliente', '$cel', '$equipo', '$marca', '$modelo', '$serial', '$falla', '$observaciones', '$valor')";
  mysqli_query($conexion,$insertar);
}
else
{
	echo '
		<!DOCTYPE html>
		<html lang="es">
		<head>
			<script>
				window.onload=function(){
					// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
				}		
			</script>
		</head>
		
		<body>
			<form name="miformulario" action="../index.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">				
			</form>
		</body>
		</html>
		';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Kyrios Center</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
	.footer {
	  position: fixed;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	  background-color: #222;
	  color: white;
	  text-align: center;
	  padding: 5px;
	}
   </style>
   
   <script>
	  $(document).ready(function()
	  {
		 $("#mostrarmodal").modal("show");
	  });
	</script>
  
</head>
<body>

<?php
	echo '
		<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		   <div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" style="text-align:center;">
						<form method="post" action="pdfnum.php" target="_blank">
							Orden Nº '.$cuenta.' Creada <font color="66bb99">Correctamente</font>.
							<br><br>
							<input type="hidden" value="'.$cuenta.'" name="n">
							<button class="btn btn-success">Ver PDF <i class="fa fa-file-pdf-o"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	 ';
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Kyrios Center</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php
	  echo
	  '
		  <ul class="nav navbar-nav">
			<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=index">Panel de Control</a></li>
			<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=profile">Perfil de Usuario</a></li>
			<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=ordentrabajo">Ordenes de Trabajo</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
		  </ul>
	  ';
	  ?>
    </div>
  </div>
</nav>
  
<div class="container">
	<h4>ORDENES DE TRABAJO</h4>
	<table  class="table table-striped table-responsive separar">
		<tr>
			<td style="background-color: #7ace4c; color: white;" class="col-sm-4"><center>
			TOTAL ORDENES
			<h2 style="margin-top: 3px;">
			<?php
			$numero="select * from ordenes";
			$numero2=mysqli_query($conexion, $numero);
			$numero3=mysqli_num_rows($numero2);
			echo $numero3;
			?></h2>
			</center></td>
			<td style="background-color: #7460ee; color: white;" class="col-sm-4"><center>
			ORDENES FINALZADAS
			<h2 style="margin-top: 3px;">
			<?php
			$numero="select * from ordenes where estado is not null";
			$numero2=mysqli_query($conexion, $numero);
			$numero3=mysqli_num_rows($numero2);
			echo $numero3;
			?></h2>
			</center></td>
			<td style="background-color: #11a0f8; color: white;" class="col-sm-4"><center>
			ORDENES PENDIENTES
			<h2 style="margin-top: 3px;">
			<?php
			$numero="select * from ordenes where estado is null";
			$numero2=mysqli_query($conexion, $numero);
			$numero3=mysqli_num_rows($numero2);
			echo $numero3;
			?></h2>
			</center></td>
		</tr>
	</table>
	
	<?php	

		$sql1="SELECT * FROM ordenes WHERE estado is null ORDER BY codigo DESC";
		$sql2=mysqli_query($conexion, $sql1);

		echo '
				<h4>ORDENES PENDIENTES</h4>
				<br>
				<table class="table table-striped table-responsive">
				<tr>
					<td><b>Orden</b></td>
					<td><b>Fecha</b></td>
					<td><b>PDF</b></td>
					<td><b>Finalizar</b></td>
				</tr>
							  
				';
		 while ($fila = mysqli_fetch_row($sql2)) {
								 
			echo'
				 <tr>
					<td>'.$fila[0].'</td>
					<td>'.$fila[1].'</td>
					<td>
						<a href="pdfnum.php?n='.$fila[0].'" class="btn btn-success"><span class="glyphicon glyphicon-file"></span></a>
					</td>
					<td>
						<form role="search" class="app-search hidden-sm hidden-xs m-r-10" method="post" action="finalizar.php">
							<input type="hidden" name="nombre" value="'.$nombre.'">
							<input type="hidden" name="email" value="'.$email.'">
							<input type="hidden" name="n" value="'.$fila[0].'">
							<button class="btn btn-success"><i class="fa fa-check-square"></i></button>
						</form>
					</td>
				</tr>
			';
		}
		echo '</table>';
		mysqli_close( $conexion );
		?>
		<br><br>
</div>

<div class="footer">
  2019 © Marco Alberto Coronado Baquero
</div>

</body>
</html>