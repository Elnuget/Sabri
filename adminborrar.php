<?php
// Conservar los datos de inicio de sesión
session_start();

// Verificación que sea un administrador
if ($_SESSION['user_type'] != "administrador") {
    header("location: index.php");
}

// Conexión a la base de datos
include("conexion.php");

// Verificar si se ha enviado un ID por POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Eliminar el registro con el ID especificado
    $sql = "DELETE FROM `usuarios` WHERE `id` = $id";
    $objconexion = new conexion();
    $objconexion->ejecutar($sql);
    
    // Redirigir a la página anterior con un mensaje de éxito
    $_SESSION['message'] = 'borrado';
    header('Location: adminlist.php');
} else {
    // Si no se ha enviado un ID por POST, redirigir a la página anterior con un mensaje de error
    $_SESSION['message'] = 'error';
    header('Location: adminlist.php');
}
?>
