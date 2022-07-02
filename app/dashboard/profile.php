<?php

include '../includes/conexion.php';
include '../includes/encriptar.php';

$nombre=NULL;
if(isset($_POST["nombre"])){ 
  $nombre= $_POST["nombre"];
  $email= $_POST["email"];

$sql1="SELECT * FROM perfiles WHERE correo='$email'";
$sql2=mysqli_query($conexion, $sql1);
$rows=mysqli_fetch_array($sql2);
$pass2= openCypher('decrypt',$rows["pass"]);
 
echo 
' 
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
			  <ul class="nav navbar-nav">
				<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=index">Panel de Control</a></li>
				<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=profile">Perfil de Usuario</a></li>
				<li><a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=ordentrabajo">Ordenes de Trabajo</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
			  </ul>
		</div>
	  </div>
	</nav>
	  
	<div class="container">
		<form class="form-group" action="actualizarperfil.php" method="post">
			<center><img src="img/user.jpg" class="img-responsive" width="25%"></center>
			<br>
			<label>Nombre Completo</label>
			<br>
			<input type="text" name="nombre" value="'.$rows["nombre"].'" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly maxlength="24">
			<br>
			<label>Correo Electronico</label>
			<br>
			<input type="text" name="email" value="'.$rows["correo"].'" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength="24">
			<br>
			<label>Contraseña</label>
			<br>
			<input type="password" name="pass" value="'.$pass2.'" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
			<br>
			<label>Celular</label>
			<br>
			<input type="text" name="telefono" value="'.$rows["telefono"].'" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength="10">
			<br>
			<button type="submit" class="form-control btn btn-success">Actualizar Perfil</button>
	</form>
	<br><br>
	</div>

	<div class="footer">
	  2019 © Marco Alberto Coronado Baquero
	</div>

	</body>
	</html>
';

  
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
			</form>
		</body>
		</html>
		';
}
?>