<?php
require_once '../conexion.php';
$conectar = conexion();
$id = $_REQUEST['id'];

// Obtener las imágenes relacionadas con el registro de rendimiento
$query = "SELECT `facturas`.`imagen`, `rendimiento`.`id`
FROM `facturas` 
	LEFT JOIN `rendimiento` ON `facturas`.`id_rendimiento` = `rendimiento`.`id`
WHERE `rendimiento`.`id` = '$id'";
$resultado = mysqli_query($conectar, $query);

// Eliminar las imágenes del servidor si existen
while ($datos = mysqli_fetch_assoc($resultado)) {
    $nombreArchivo = $datos['imagen'];
    $rutaImagen = $nombreArchivo; // Reemplaza esta ruta con la ruta correcta en tu servidor
    if (file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }
}

// Eliminar la fila de la tabla 'rendimiento' de la base de datos
$query = "DELETE FROM rendimiento WHERE id = $id";
mysqli_query($conectar, $query);

header('Location: datatables.php');
exit;
?>
