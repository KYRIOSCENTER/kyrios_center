<?php
	
include '../includes/conexion.php';
include '../includes/encriptar.php';
	
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$telefono= $_POST["telefono"];
$pass= $_POST["pass"];
$pass2 = openCypher('encrypt',$pass);


$sql1= "UPDATE perfiles SET nombre='$nombre', telefono='$telefono', pass='$pass2' WHERE correo='$email'";
$sql2=mysqli_query($conexion, $sql1);

mysqli_close( $conexion );

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
			<form name="miformulario" action="profile.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
?>