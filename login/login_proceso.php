<?php 
require "../conexion.php";
session_start();

$prueba = conexion();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT id_usuario FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($prueba, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['id_usuario'] = $fila['id_usuario'];
    echo 'success';
} else {
    echo 'error';
}
?>
