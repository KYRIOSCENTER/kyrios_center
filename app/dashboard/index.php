<?php
include '../includes/conexion.php';
$nombre=NULL;
if(isset($_POST["nombre"])){ 
  $nombre= $_POST["nombre"];
  $email= $_POST["email"];
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
  
</head>
<body>

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
			$numero="select * from ordenes where estado='ENTREGADO'";
			$numero2=mysqli_query($conexion, $numero);
			$numero3=mysqli_num_rows($numero2);
			echo $numero3;
			?></h2>
			</center></td>
			<td style="background-color: #11a0f8; color: white;" class="col-sm-4"><center>
			ORDENES PENDIENTES
			<h2 style="margin-top: 3px;">
			<?php
			$numero="select * from ordenes where estado='PENDIENTE'";
			$numero2=mysqli_query($conexion, $numero);
			$numero3=mysqli_num_rows($numero2);
			echo $numero3;
			?></h2>
			</center></td>
		</tr>
	</table>
	
	<?php	

		$sql1="SELECT * FROM ordenes WHERE estado='PENDIENTE' ORDER BY codigo DESC";
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
						<a href="pdfnum.php?n='.$fila[0].'" class="btn btn-info"><span class="glyphicon glyphicon-file"></span></a>
					</td>
					<td>
						<a href="finalizar.php?n='.$fila[0].'&nombre='.$nombre.'&email='.$email.'" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
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