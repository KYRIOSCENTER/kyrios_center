<?php

include 'includes/conexion.php';
include 'includes/encriptar.php';
	
$nombre=NULL;
$email= $_POST["email"];
$pass= $_POST["pass"];
$pass2 = openCypher('encrypt',$pass);

$sql1="SELECT * FROM perfiles WHERE correo='$email'";
$sql2=mysqli_query($conexion, $sql1);
$rows=mysqli_fetch_array($sql2);
if ($rows["correo"] == $email && $rows["pass"] == $pass2)
	{
		$nombre=$rows["nombre"];
		//echo "usuario y contraseña validos";
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
			<form name="miformulario" action="dashboard/index.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
	}
else{
echo '
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
				  position: absolute;
				  left: 0;
				  bottom: 0;
				  width: 100%;
				  background-color: #222;
				  color: white;
				  text-align: center;
				  padding: 5px;
				}
				
				.centrar{
					  float: none; 
					  margin: auto;
					  margin-top: 50px;
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
			
			<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				   <div class="modal-dialog">
					  <div class="modal-content">
					 <div class="modal-body" style="text-align:center;">
							Usuario y/o Contrase&ntilde;a <font color="bb6699">Incorrectos</font>.   
					 </div>
					</div>
				   </div>
			</div>

			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Kyrios Center</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				</div>
			  </div>
			</nav>
			  
			<div class="container">
			  
			    <div class="col-sm-3 text-left centrar"> 
					  <form class="form-group" action="ingresar.php" method="post">
						<center><img src="img/logo.png" class="img-responsive" width="80%"></center>
						<br><br>
						<label>Usuario</label>
						<input class="form-control" name="email" type="email" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
						<br>
						<label>Contraseña</label>
						<input class="form-control" name="pass" type="password" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
						<br>
						<button type="submit" class="form-control btn btn-success">Iniciar Sesión</button>
					  </form>
				</div>
			  
			</div>

			<div class="footer">
			  2019 © Marco Alberto Coronado Baquero
			</div>

			</body>
			</html>
			';
	
}
mysqli_close( $conexion );
?>