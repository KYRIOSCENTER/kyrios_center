<?php

require_once "../includes/pdf/lib/mpdf.php";
include '../includes/conexion.php';



$norden = $_POST["n"];
//norden = 2;

if(isset($_POST["nombre"])){ 
  $nombre= $_POST["nombre"];
  $email= $_POST["email"];

} 

if(isset($_GET["nombre"])){ 
 $nombre= $_GET["nombre"];
 $email= $_GET["email"];
 $norden = $_GET["n"];
}  

if(is_numeric($norden))
{

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
			<h4>FINALIZAR ORDEN DE TRABAJO</h4>
			';
					$sql1="SELECT * FROM ordenes WHERE codigo='$norden' ORDER BY codigo DESC";
					$sql2=mysqli_query($conexion, $sql1);

							 while ($fila = mysqli_fetch_row($sql2)) {
								 echo '
								 <form action="finorden.php" method="post">
								  <div class="form-group col-sm-4">
									<label>Orden Nº</label>
									<input type="text" class="form-control" name="orden" value="'.$fila[0].'" readonly>
								  </div>
								  <div class="form-group col-sm-4">
									<label>Fecha</label>
									<input type="text" class="form-control" value="'.$fila[1].'" readonly>
								  </div>
								  <div class="form-group col-sm-4">
									<label>Técnico</label>
									<input type="text" class="form-control" value="'.$fila[2].'" readonly>
								  </div>
								  <div class="form-group col-sm-6">
									<label>Nombre del Cliente</label>
									<input type="text" name="nomcliente" class="form-control" value="'.$fila[3].'" maxlength="35" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-6">
									<label>Celular del Cliente</label>
									<input type="text" name="celcliente" class="form-control" value="'.$fila[4].'" maxlength="10" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-3">
									<label>Equipo</label>
									<input type="text" name="equipo" class="form-control" required value="'.$fila[5].'" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-3">
									<label>Marca</label>
									<input type="text" name="marca" class="form-control" required value="'.$fila[6].'" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-3">
									<label>Modelo</label>
									<input type="text" name="modelo" class="form-control" required value="'.$fila[7].'" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-3">
									<label>Serial</label>
									<input type="text" name="serial" class="form-control" required value="'.$fila[8].'" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
								  </div>
								  <div class="form-group col-sm-6">
									<label>Falla Reportada</label>
									<textarea name="falla" class="form-control" rows="3" maxlength="230" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>'.$fila[9].'</textarea>
								  </div>
								  <div class="form-group col-sm-6">
									<label>Observaciones</label>
									<textarea name="observaciones" class="form-control" maxlength="230"  rows="3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>'.$fila[10].'</textarea>
								  </div>
								  <div class="form-group col-sm-10">
									<label>Informe Técnico</label>
									<textarea name="notatecnico" class="form-control" maxlength="230"  rows="3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
								  </div>
								  <div class="form-group col-sm-2">
									<label>Valor Negociado</label>
									<Input name="valor" type="text" class="form-control" maxlength="20" value="'.$fila[12].'" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
								  </div>
								  <div class="form-group col-sm-2">
									<input type="hidden" name="estado" value="ENTREGADO">
									<input type="hidden" name="nombre" value="'.$nombre.'">
									<input type="hidden" name="email" value="'.$email.'">
									<button class="btn btn-success form-control">Finalizar Orden de Trabajo</button>
								  </div>
								</form>';
				
		mysqli_close( $conexion );
		echo ' 
		<br><br>
		</div>

		<div class="footer">
		  2019 © Marco Alberto Coronado Baquero
		</div>

		</body>
		</html>
';
}
}