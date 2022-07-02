<?php
	
include '../includes/conexion.php';
include '../includes/encriptar.php';
	
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$telefono= $_POST["telefono"];
$pass= $_POST["pass"];


$sql1="SELECT * FROM perfiles WHERE correo='$email'";
$sql2=mysqli_query($conexion, $sql1);
$rows=mysqli_fetch_array($sql2);
if ($rows["correo"] == $email)
	{
		$modal=1;
	}
else
    {
			$pass2 = openCypher('encrypt',$pass);
			$sql3="INSERT INTO perfiles (nombre, correo, telefono, pass, estado) VALUES ('$nombre', '$email', '$telefono', '$pass2', 'ACTIVO')";
			$sql4=mysqli_query($conexion, $sql3);
			$modal=2;
	}

mysqli_close( $conexion );
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Kyrios Center</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
   </script>
<!--===============================================================================================-->
</head>
<body>

<!--===============================================================================================-->
<?php

if ($modal == 1)
{
	echo '
		<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		   <div class="modal-dialog">
			  <div class="modal-content">
			 <div class="modal-body" style="text-align:center;">
					El usuario <font color="bb6699">'.$email.' </font>ya existe.   
			 </div>
			</div>
		   </div>
		</div>';
		
echo '
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="creausuario.php" method="post">
					<span class="login100-form-title p-b-48">
					<img class="img-fluid" src="../images/logo.png" width="80%" height="80%">	
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Digite su Nombre">
						<input class="input100" type="text" name="nombre" maxlength="24" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="Nombre Completo"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Digite su Correo">
						<input class="input100" type="email" name="email" maxlength="25" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="Correo Electr&oacute;nico"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Digite su numero de Celular">
						<input class="input100" type="tel" name="telefono" maxlength="10" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="N&uacute;mero Celular"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite su Contrase&ntilde;a">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="Contrase&ntilde;a"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Crear Usuario
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
';
	
}
if ($modal == 2)
{
		echo '
		<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		   <div class="modal-dialog">
			  <div class="modal-content">
			 <div class="modal-body" style="text-align:center;">
					El usuario <font color="66bb99">'.$email.' </font>se creo corecctamente.   
			 </div>
			</div>
		   </div>
		</div>';
		
echo '
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../ingresar.php" method="post">
					<span class="login100-form-title p-b-48">
					<img class="img-fluid" src="../images/logo.png" width="80%" height="80%">	
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email" maxlength="25" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
						<span class="focus-input100" data-placeholder="Contrase&ntilde;a"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ingresar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
';
}
?>
<!--===============================================================================================-->
	

	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>