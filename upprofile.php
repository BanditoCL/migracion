<?php
session_start();

include_once('conexion.php');
$conectar = conexion();

$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Procesar la foto
if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto_nombre = $_FILES['foto']['name'];
    $foto_extension = pathinfo($foto_nombre, PATHINFO_EXTENSION);
    $foto_nueva_ruta = "img/usuarios/" . uniqid() . "." . $foto_extension;

    if (move_uploaded_file($foto_temp, $foto_nueva_ruta)) {
        // Actualizar la ruta de la foto en la tabla de usuarios
        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', contrasena='$contrasena', foto='$foto_nueva_ruta' WHERE id_usuario = '$id_usuario'";

        if (!mysqli_query($conectar, $sql)) {
            echo "Error al actualizar en la tabla 'Usuarios': " . mysqli_error($conectar);
            exit();
        }
    } else {
        echo "Error al mover el archivo de imagen.";
        exit();
    }
} else {
    // No se ha seleccionado una nueva foto, solo actualizar los demás campos
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', contrasena='$contrasena' WHERE id_usuario = '$id_usuario'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'Usuarios': " . mysqli_error($conectar);
        exit();
    }
}

echo "<script>alert('Actualizado con Exito') </script>";
echo "<script>setTimeout(\"location.href='profile.php'\",1000)</script>";
?>
