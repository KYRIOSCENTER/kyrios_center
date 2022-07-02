<?php

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
				  position: fixed;
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
			   
			  
			</head>
			<body>

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
?>