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
  <link rel="stylesheet" href="./css/styleAdmin.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="icon" href="img/fevicon.png" type="image/gif" />
	
	

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
<link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>


</head>
<body>
	<!-- SideBar -->
	<!-- partial:index.partial.html -->
<div class="layout has-sidebar fixed-sidebar fixed-header">
      <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
          <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
         
          <div class="sidebar-content">


          <div class="sidebar-header">
            <div class="pro-sidebar-logo">
              <div>S</div>
              <h5>PROYECTO SABRI</h5>
            </div>
          </div>
          
            <div class="full-box dashboard-sideBar-UserInfo">
              <figure class="full-box">
                <img src="./assets/img/avatar.jpg" alt="UserIcon">
                <figcaption class="text-center text-titles text-uppercase"><br><?php echo $_SESSION["user_type"]; ?> <br> <?php echo $_SESSION["user_name"]; ?></figcaption>
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

            
                   

            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-header"><span> GENERAL </span></li>
                <li class="menu-item">
                  <a href="admin.php">
                    <span class="menu-icon">
                        <i class="ri-user-add-line"></i>
                    </span>
                    <span class="menu-title">Nuevo Usuario</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="adminlist.php">
                    <span class="menu-icon">
                      <i class="ri-folder-user-line"></i>
                    </span>
                    <span class="menu-title">Lista de Usuarios</span>
                  </a>
                </li>

<!-- Para agregar MÁS OPCIONES a futuros

                <li class="menu-item sub-menu">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-shopping-cart-fill"></i>
                    </span>
                    <span class="menu-title">E-commerce</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Products</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Orders</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">credit card</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="menu-item sub-menu">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-global-fill"></i>
                    </span>
                    <span class="menu-title">Maps</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Google maps</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Open street map</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="menu-item sub-menu">
                  <a href="#">
                    <span class="menu-icon">
                     <i class="ri-paint-brush-fill"></i>
                    </span>
                    <span class="menu-title">Theme</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Dark</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Light</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                
-->

                <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>


<!-- Para uso de CONTENIDO EXTRA

                <li class="menu-item">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">Documentation</span>
                    <span class="menu-suffix">
                      <span class="badge secondary">Beta</span>
                    </span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-calendar-fill"></i>
                    </span>
                    <span class="menu-title">Calendar</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-service-fill"></i>
                    </span>
                    <span class="menu-title">Examples</span>
                  </a>
                </li>

-->

              </ul>
            </nav>
          </div>
          
        </div>
      </aside>

      <!---Fin de la barra lateral
                  Inicio de la página principal-->

      <div id="overlay" class="overlay"></div>
      <div class="layout">
        <main class="">
          
          
          <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
              <li class="pull-left">
                <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
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
                            <div>
                              <p class="text-center">
										    	        <button type="submit" class="custom-btn btn-12" ><span><i class="zmdi zmdi-floppy"></i> Guardar</span><span>Continuar</span></button>
										          </p>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>



          <footer class="footer">
            <small style="margin-bottom: 20px; display: inline-block">
              © 2023 hecho con
              <span style="color: red; font-size: 18px">&#10084;</span> por -
              <a target="_blank">Su Servilleta </a>
            </small>
            <br />    
          </footer>
        </main>
        <div class="overlay"></div>
      </div>
    </div>

	
	<!--====== Scripts -->

  <script  src="./js/script.js"></script>

  <script src='https://unpkg.com/@popperjs/core@2'></script>

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