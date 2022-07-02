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
  
  $sql1="SELECT * FROM perfiles WHERE correo='$email'";
  $sql2=mysqli_query($conexion, $sql1);
  $rows=mysqli_fetch_array($sql2);
  $rol=$rows["rol"];
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>kyrios Center</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
window.onload = function () {
        document.onkeydown = function (e) {
            return (e.which || e.keyCode) != 116;
        };
    }
</script>

</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo">
                        <!-- Logo icon image, you can use font-icon also --><b>
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <img src="../plugins/images/admin-text-dark2.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10" method="post" action="cambio.php">
                            <input type="hidden" name="destino" value="pdf">
							<?php echo '<input type="hidden" name="nombre" value="'.$nombre.'">
									   <input type="hidden" name="email" value="'.$email.'"> '; ?>
							<input type="text" placeholder="Buscar Remisi&oacute;n" class="form-control" name="n" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="estado" class="form-control">
                              <option value="ENTREGADO" selected>Finalizadas</option> 
                              <option value="PENDIENTE">Pendientes</option>
                            </select>&nbsp;&nbsp;
							<button class="btn btn-warning">Buscar</button>&nbsp;&nbsp;
							</form>
							
                    </li>
                    <li>
                        <?php echo '
						<a class="profile-pic" href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=profile"><b class="hidden-xs">'.$nombre.'</b></a>';?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav navbar-nav navbar-right" id="side-menu">
                 <?php
				echo '
                    <li style="padding: 70px 0 0;">
                        <a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=index" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i>Panel de Control</a>
                    </li>
                    <li>
                        <a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=profile" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Perfil de Usuario</a>
                    </li>
                    <li>
                        <a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=ordentrabajo" class="waves-effect"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>Ordenes de Trabajo</a>
                    </li>
					<li>
                        <a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=bodega" class="waves-effect"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>Gestion de Bodega</a>
                    </li>
					';
					if ($rol=="ADMIN")
					{
						echo '
						<li>
							<a href="../admin/" target="_blank" class="waves-effect"><i class="fa  fa-users fa-fw" aria-hidden="true"></i>Crear Usuario</a>
						</li>
						<li>
							<a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=bloquearusuario" class="waves-effect"><i class="fa  fa-ban fa-fw" aria-hidden="true"></i>Bloquear Usuario</a>
						</li>
						<li>
							<a href="cambio.php?nombre='.$nombre.'&email='.$email.'&destino=editaorden" class="waves-effect"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Editar Orden</a>
						</li>
						<li>
							<a href="remisionesfull.php" class="waves-effect" target="_blank"><i class="fa fa-file-pdf-o  fa-fw"></i>Descargar Ordenes</a>
						</li>
						';
					}
					echo '
					<li>
                        <a href="../index.php" class="waves-effect"><i class="fa  fa-power-off fa-fw" aria-hidden="true"></i>Salir</a>
                    </li>
					';
				?>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Ordenes de Trabajo</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Crear Orden</h3> 
							<?php
							echo '<br>
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
								<input type="text" name="nomcliente" class="form-control" maxlength="70" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
							  </div>
							  <div class="form-group col-sm-6">
								<label>Celular del Cliente</label>
								<input type="text" name="celcliente" class="form-control" maxlength="30" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
							  </div>
							  <div class="form-group col-sm-3">
								<label>Equipo</label>
								<input type="text" name="equipo" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
							  </div>
							  <div class="form-group col-sm-3">
								<label>Marca</label>
								<input type="text" name="marca" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
							  </div>
							  <div class="form-group col-sm-3">
								<label>Modelo</label>
								<input type="text" name="modelo" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
							  </div>
							  <div class="form-group col-sm-3">
								<label>Serial</label>
								<input type="text" name="serial" class="form-control" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
							  <div class="form-group">
								<input type="hidden" name="nombre" value="'.$nombre.'">
								<input type="hidden" name="email" value="'.$email.'">
								<button class="btn btn-success" style="margin-left:16px;">Crear Orden de Trabajo</button>
							  </div>
							</form>
							';
							mysqli_close( $conexion );
							?>
						</div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Marco Alberto Coronado Baquero </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
