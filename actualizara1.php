<?php
// Conservar los datos de inicio de sesión
session_start();

// Verificación que sea un administrador
if ($_SESSION['user_type'] != "administrador") {
    header("location: index.php");
}

// Conexión a la base de datos
include("conexion.php");

// Verificar si se ha enviado un ID y los nuevos datos por POST
if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['tipo'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    // Actualizar el registro con los nuevos datos
    $sql = "UPDATE `usuarios` SET `username` = '$username', `password` = '$password', `tipo` = '$tipo' WHERE `id` = $id";
    $objconexion = new conexion();
    $objconexion->ejecutar($sql);

    // Redirigir a la página anterior con un mensaje de éxito
    $_SESSION['message'] = 'actualizado';
    header('Location: adminlist.php');
} else {
    // Si no se ha enviado un ID o los nuevos datos por POST, redirigir a la página anterior con un mensaje de error
    $_SESSION['message'] = 'error';
    header('Location: adminlist.php');
}
?>
