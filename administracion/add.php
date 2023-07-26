<?php
session_start();

include_once('../conexion.php');
$conectar = conexion();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$doc = $_POST['doc'];
$cargo = $_POST['cargo'];
$contrasena = $_POST['contrasena'];

// Rutas
$ruta_db = "img/usuarios/"; // Ruta para la base de datos
$ruta_servidor = "../img/usuarios/"; // Ruta en el servidor

// Verificar si la carpeta de usuarios existe, y si no, crearla
if (!is_dir($ruta_servidor)) {
    if (!mkdir($ruta_servidor, 0755, true)) {
        echo "Error al crear la carpeta de usuarios.";
        exit();
    }
}

// Procesar la foto
if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto_nombre = $_FILES['foto']['name'];
    $foto_extension = pathinfo($foto_nombre, PATHINFO_EXTENSION);
    $foto_nueva_ruta = $ruta_servidor . $foto_nombre;

    if (move_uploaded_file($foto_temp, $foto_nueva_ruta)) {
        // Realizar la inserción del nuevo usuario en la tabla de usuarios
        $ruta_db_completa = $ruta_db . $foto_nombre;
        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, contrasena, foto, doc, cargo) 
                VALUES ('$nombre', '$apellido', '$usuario', '$contrasena', '$ruta_db_completa', '$doc', '$cargo')";

        if (!mysqli_query($conectar, $sql)) {
            echo "Error al insertar en la tabla 'Usuarios': " . mysqli_error($conectar);
            exit();
        }
    } else {
        echo "Error al mover el archivo de imagen.";
        exit();
    }
} else {
    echo "Debes seleccionar una foto.";
    exit();
}

echo "<script>alert('Insertado con Éxito')</script>";
echo "<script>setTimeout(\"location.href='trabajadores.php'\",1000)</script>";
?>
