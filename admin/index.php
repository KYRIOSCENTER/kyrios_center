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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="creausuario.php" method="post">
					<span class="login100-form-title p-b-48">
					<img class="img-fluid" src="../images/logo.png">	
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
