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
	<?php
		echo '
			<form action="creaorden.php" method="post">
				<div class="form-group col-sm-4">
					<label>Orden Nº</label>
					<input type="text" class="form-control" value='.$cuenta.' readonly>
				</div>
				<div class="form-group col-sm-4">
					<label>Fecha</label>
					<input type="text" class="form-control" value='.$fechasys.' readonly>
				</div>
				<div class="form-group col-sm-4">
					<label>Técnico</label>
					<input type="text" class="form-control" value="'.$nombre.'" readonly>
				</div>
				<div class="form-group col-sm-6">
					<label>Nombre del Cliente</label>
					<input type="text" name="nomcliente" class="form-control" maxlength="35" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-6">
					<label>Celular del Cliente</label>
					<input type="text" name="celcliente" class="form-control" maxlength="10" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-4">
					<label>Equipo</label>
					<input type="text" name="equipo" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-4">
					<label>Marca</label>
					<input type="text" name="marca" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-4">
					<label>Modelo</label>
					<input type="text" name="modelo" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				 <div class="form-group col-sm-3">
					<label>Serial</label>
					<input type="text" name="serial" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-3">
					<label>Cargador</label>
					<input type="text" name="cargador" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
                <div class="form-group col-sm-3">
					<label>Bateria</label>
					<input type="text" name="bateria" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-3">
					<label>Otros</label>
					<input type="text" name="otros" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-12">
					<label>Falla Reportada</label>
					<textarea name="falla" class="form-control" rows="3" maxlength="230" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</div>
				<div class="form-group col-sm-10">
					<label>Observaciones</label>
					<textarea name="observaciones" class="form-control" maxlength="230" rows="3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</div>
				<div class="form-group col-sm-2">
					<label>Valor Negociado</label>
					<Input name="valor" type="text" class="form-control" maxlength="20" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</div>
				<div class="form-group col-sm-2">
					<input type="hidden" name="nombre" value="'.$nombre.'">
					<input type="hidden" name="email" value="'.$email.'">
					<button class="btn btn-success form-control">Crear Orden de Trabajo</button>
				</div>
			</form>
		';
		mysqli_close( $conexion );
	?>
		<br><br>
</div>

<div class="footer">
  2019 © Marco Alberto Coronado Baquero
</div>

</body>
</html>