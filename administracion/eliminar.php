<?php
require_once '../conexion.php';
$conectar = conexion();
$id = $_REQUEST['id'];

// Obtener las imágenes relacionadas con el registro de rendimiento
$query = "SELECT * FROM `usuarios` WHERE id_usuario = '$id'";
$resultado = mysqli_query($conectar, $query);

// Eliminar las imágenes del servidor si existen
while ($datos = mysqli_fetch_assoc($resultado)) {
    $nombreArchivo = $datos['foto'];
    $rutaImagen = $nombreArchivo; // Reemplaza esta ruta con la ruta correcta en tu servidor
    if (file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }
}

// Eliminar la fila de la tabla 'rendimiento' de la base de datos
$query = "DELETE FROM usuarios WHERE id_usuario = $id";
mysqli_query($conectar, $query);

header('Location: trabajadores.php');
exit;
?>
