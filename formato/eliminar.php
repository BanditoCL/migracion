<?php
require_once '../conexion.php';
$conectar = conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, imagen7, imagen8, imagen9, imagen10 FROM visita_tecnica WHERE id = $id";
    $resultado = mysqli_query($conectar, $query);
    $fila = mysqli_fetch_assoc($resultado);

    $cantidad_imagenes = 0;
    $rutas_imagenes = array();

    for ($i = 1; $i <= 10; $i++) {
        $nombre_columna = 'imagen' . $i;
        $ruta_imagen = $fila[$nombre_columna];

        if (!empty($ruta_imagen)) {
            $cantidad_imagenes++;
            $rutas_imagenes[] = $ruta_imagen;
        }
    }

    for ($i = 0; $i < $cantidad_imagenes; $i++) {
        unlink($rutas_imagenes[$i]);
    }

    $query = "DELETE FROM visita_tecnica WHERE id = $id";
    mysqli_query($conectar, $query);

    header('Location: datatables.php');
    exit;
}
?>