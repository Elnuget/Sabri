<?php
//conservar los datos de inicio de sesion
session_start();
//verificación que sea un administrador
if($_SESSION['user_type']!="administrador"){
    header("location: index.php");
}
//conexion a la base de datos
include("conexion.php");


$objconexion=new conexion();
$id = $_POST['id'];
$resultado = $objconexion->consultar("SELECT * FROM `usuarios` WHERE id = $id");

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
	
	
</head>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Actualizar Usuario <small>Admin</small></h1>
			</div>
			<p class="lead">Administrador registra Cobradores,vendedor Clientes.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li><a href="admin.php" data-toggle="tab">Actualizar Usuario</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="actualizara1.php" method="post">
                                        <?php foreach($resultado as $proyecto){ ?>
									    	<div class="form-group label-floating">
                                            <input type="hidden" name="id" value="<?php echo $proyecto['id']; ?>">

											  <label class="control-label">Usuario</label>
											  <input class="form-control" type="text" name="username" value="<?php echo $proyecto['username']; ?>" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
											  <input class="form-control" type="text" name="password" value="<?php echo $proyecto['password']; ?>" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Tipo</label>
                                                <label class="control-label">Tipo</label>
                                                    <select class="form-control" name="tipo">
                                                        <option value="administrador" <?php if ($proyecto['tipo'] == 'administrador') { echo 'selected'; } ?>>administrador</option>
                                                        <option value="cobrador" <?php if ($proyecto['tipo'] == 'cobrador') { echo 'selected'; } ?>>cobrador</option>
                                                        <option value="vendedor" <?php if ($proyecto['tipo'] == 'vendedor') { echo 'selected'; } ?>>vendedor</option>
                                                        <option value="cliente" <?php if ($proyecto['tipo'] == 'cliente') { echo 'selected'; } ?>>cliente</option>
                                                    </select>

											</div>
										    <p class="text-center">
										    	<button type="submit" class="btn btn-secondary btn-raised btn-sm" ><i class="zmdi zmdi-floppy"></i> Guardar</button>
										    </p>

                                            <?php } ?>
									    </form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>

	
	<!--====== Scripts -->
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
	

	
</body>
</html>