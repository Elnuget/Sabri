
<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="img/fevicon.png" type="image/gif" />
	<link rel="stylesheet" href="./css/main.css">

	<!--- links para el acceso a css/style.css y animación del login--->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/style.css">
	
</head>

<?php
include("conexion.php");
$objconexion=new conexion();
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $objconexion->consultar($sql);

    // Verificar si se han devuelto resultados
    if (count($result) >= 1) {
        // Usuario encontrado, obtener información del usuario
        $user = $result[0];
		$_SESSION["user_name"]=$username;

        // Verificar si el usuario es un administrador, cobrador, vendedor o cliente
        if ($user["tipo"] == "administrador") {
			
            $_SESSION["user_type"] = "administrador";
            $_SESSION["user_id"] = $user["id"];
            header("Location: admin.php");
        } elseif ($user["tipo"] == "cobrador") {
            $_SESSION["user_type"] = "cobrador";
            $_SESSION["user_id"] = $user["id"];
            header("Location: collector.php");
        } elseif ($user["tipo"] == "vendedor") {
            $_SESSION["user_type"] = "vendedor";
            $_SESSION["user_id"] = $user["id"];
            header("Location: seller.php");
        } elseif ($user["tipo"] == "cliente") {
            $_SESSION["user_type"] = "cliente";
            $_SESSION["user_id"] = $user["id"];
            header("Location: client.php");
        }
    }else{
        echo "<script> Swal.fire('Datos Incorrectos') </script>";
    }
}

?>


<!---
----Antiguo login, antes de la actualización de la tercera semana de febrero del 2023
--->

<!--

	<form action="index.php" method="post" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>

		
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Usuario</label>
		  <input class="form-control" name="username">
		  <p class="help-block">Número de Cédula</p>
		</div>

		
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input class="form-control"  name="password">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>

		
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-secondary">
		</div>
	</form>

---->



<!---
-----Nuevo login, con características que nos ayudan a animarlo (tercera semana de febrero de 2023
--->


<div class="section" action="index.php" method="post">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
							<!--Zona superior con referencia a inicio de sesión y registro, además de la fecha movible que está debajo de las mismas--->
                            <h6 class="mb-0 pb-3"><span>Inicio de sesión </span><span>Registrarse</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
										<!--Zona que comprende el inio de sesion y las secciones hasta la zona de olvido de contraseña--->
										<form action="index.php" method="post" autocomplete="off">
                                            <div class="section text-center">
												<!--Título de "Inicio de sesión" hasta la zona que comprende el inico de sesión--->
                                                <h4 class="mb-4 pb-3">Inicio de sesión </h4>
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-style" placeholder="Tu usuario" id="username" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>	
												<!--Zona que comprende la contraseña--->
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Tu contraseña" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<!--Botón de confirmar--->
												<input type="submit" value="Iniciar sesión" class="btn mt-4">
												<!--Botón para redirigir a otro formulario en caso de olvido de contraseña--->
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">¿Olvidaste tu contraseña?</a></p>
                                            </div>

											</form>

                                        </div>
                                    </div>

									<!--Zona que comprende desde el Registro de Usuario hasta el botón de Confirmar--->
                                    <div class="card-back">
                                        <div class="center-wrap">

										<form action="index.php" method="post" autocomplete="off">

                                            <div class="section text-center">
												<!--Título de "Registrarse" y casilla de usuario--->
                                                <h4 class="mb-4 pb-1">Registarse</h4>
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-style" placeholder="Tu Usuario" id="username" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>	
												<!--Casilla de Email--->
                                                <div class="form-group mt-2">
                                                    <input type="email" name="logemail" class="form-style" placeholder="Tu Email" id="logemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
												<!---Casilla de contraseña-->
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Tu Contraseña" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<!--Casilla de confirmar contraseña-->
												<div class="form-group mt-2">
                                                    <input type="password" name="password2" class="form-style" placeholder="Vuelve a escribir la contraseña" id="password2" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<!--Botón de confirmar--->
                                                <a href="#" class="btn mt-4">Confirmar</a>
                                            </div>

											</form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


	<!--====== Scripts -->

	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
