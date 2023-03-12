<?php
//conservar los datos de inicio de sesion
session_start();
//verificación que sea un administrador
if($_SESSION['user_type']!="administrador"){
    header("location: index.php");
}
//conexion a la base de datos
include("conexion.php");
if($_POST){
	$username=$_POST['username'];
	$pasword=$_POST['password'];
	$tipo=$_POST['tipo'];
	$objconexion=new conexion();
	$sql="INSERT INTO `usuarios` (`id`, `username`, `password`, `tipo`) VALUES (NULL, '$username', '$pasword', '$tipo')";
	$objconexion->ejecutar($sql);
	$_SESSION['message'] = 'registrado';
	
}
$password = bin2hex(random_bytes(8));


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Refencias -->
	<link rel="stylesheet" href="./css/main.css">
	<link rel="icon" href="img/fevicon.png" type="image/gif" />
	<link rel="stylesheet" href="./css/styleAdmin.css">
	
</head>


<!-- Barra lateral izquierda inicio---->


<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				sabri <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="./assets/img/avatar.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles text-uppercase"><?php echo $_SESSION["user_type"]; ?> | <?php echo $_SESSION["user_name"]; ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="admin.php">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Nuevo Usuario
					</a>
				</li>
                <li>
                    <a href="adminlist.php">
                        <i class="zmdi zmdi-account zmdi-hc-fw"></i> Lista de Usuarios
                    </a>
                </li>
				
			</ul>
		</div>
	</section>


	<!---  Barra lateral izquierda final--->

	

	<!--- inicio de contenido de la página---->
	
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Nuevo Usuario <small>Admin</small></h1>
			</div>
			<p class="lead">Administrador registra Cobradores,vendedor Clientes.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li><a href="admin.php" data-toggle="tab">Nuevo Usuario</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="adminlist.php" method="post">
									    	<div class="form-group label-floating">
											  <label class="control-label">Usuario</label>
											  <input class="form-control" type="text" name="username" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
											  <input class="form-control" type="text" name="password" value="<?php echo $password; ?>" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Tipo</label>
													<select class="form-control" name="tipo">
														<option value="administrador">administrador</option>
														<option value="cobrador">cobrador</option>
														<option value="vendedor">vendedor</option>
														<option value="cliente">cliente</option>
													</select>
											</div>
										    <p class="text-center">
										    	<button type="submit" class="custom-btn btn-12" ><span><i class="zmdi zmdi-floppy"></i> Guardar</span><span>Continuar</span></button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>



	<!--====== Scripts
	Nota: El primer script será usado más tarde para las animaciones, no borrar.
	-->

	<script  src="./js/script.js"></script>

	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>

<?php if (isset($_SESSION['message'])) { 
?>
		<script>swal(
		    'Sabri le informa',
		    'Éxito',
		    'success'
		  )</script>

		  <?php
		
}
	
?>
<?php if (isset($_SESSION['message'])) { 

$_SESSION['message']=null;

		
}
	
?>
	
</body>
</html>