<?php
// cambio paginas post


if(isset($_POST["nombre"])){ 
  $nombre= $_POST["nombre"];
  $email= $_POST["email"];
  $n= $_POST["n"];
  $estado= $_POST["estado"];
  $destino= $_POST["destino"];
} 

if(isset($_GET["nombre"])){ 
 $nombre= $_GET["nombre"];
 $email= $_GET["email"];
 $destino= $_GET["destino"];
}  



if (!empty($nombre)) { // <= false

    // No está vacía (true)
	if ($destino == "profile")
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
			<form name="miformulario" action="profile.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "index")
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
			<form name="miformulario" action="index.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "ordentrabajo")
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
			<form name="miformulario" action="ordentrabajo.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "bodega")
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
			<form name="miformulario" action="bodega.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "pdf")
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
			<form name="miformulario" action="pdf.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
				<input type="hidden" name="destino" value="'.$destino.'">
				<input type="hidden" name="n" value="'.$n.'">
				<input type="hidden" name="estado" value="'.$estado.'">
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "bloquearusuario")
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
			<form name="miformulario" action="bloquearusuario.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
				<input type="hidden" name="destino" value="'.$destino.'">				
			</form>
		</body>
		</html>
		';
	}
	elseif ($destino == "editaorden")
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
			<form name="miformulario" action="editaorden.php" method="post">
				<input type="hidden" name="nombre" value="'.$nombre.'">
				<input type="hidden" name="email" value="'.$email.'">
				<input type="hidden" name="destino" value="'.$destino.'">				
			</form>
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
				<input type="hidden" name="nombre" value="">
			</form>
		</body>
		</html>
		';	
	}
	
} 

else {

    // Está vacía (false)
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
				<input type="hidden" name="nombre" value="">
			</form>
		</body>
		</html>
		';
	
}

?>