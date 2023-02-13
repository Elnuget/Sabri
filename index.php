<!--Probandoooooo12345-->
<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="img/fevicon.png" type="image/gif" />
	<link rel="stylesheet" href="./css/main.css">
	
</head>
<body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">
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
