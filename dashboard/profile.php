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
    <title>Kyrios Center</title>
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
                        <h4 class="page-title">Perfil de Usuario</h4> </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img2.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <img src="../plugins/images/users/genu2.jpg" class="thumb-lg img-circle" alt="img">
                                        <h4 class="text-white">
										<?php
										echo $rows["nombre"];
										?>
										</h4>
                                        <h5 class="text-white">
										<?php
										echo $rows["correo"];
										?>
										</h5> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="actualizarperfil.php" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Nombre Completo</label>
                                    <div class="col-md-12">
									<?php
									echo '
                                        <input type="text" class="form-control form-control-line" requerid value="'.$rows["nombre"].'" maxlength="24" requerid name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly> </div>
										';
									?>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Correo Electronico</label>
                                    <div class="col-md-12">
									<?php
									echo '
                                        <input type="email" class="form-control form-control-line" requerid name="email" id="example-email" value="'.$rows["correo"].'" maxlength="24" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> </div>
										';
									?>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Contrase&ntilde;a</label>
                                    <div class="col-md-12">
									<?php
									echo '
                                        <input type="password" value="'.$pass2.'" class="form-control form-control-line" required name="pass" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> </div>
										';
									?>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Celular</label>
                                    <div class="col-md-12">
									<?php
									echo '
                                        <input type="text" value="'.$rows["telefono"].'" class="form-control form-control-line" required name="telefono" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> </div>
										';
										mysqli_close( $conexion );
									?>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Marco Alberto Coronado Baquero </footer>
        </div>
        <!-- /#page-wrapper -->
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
