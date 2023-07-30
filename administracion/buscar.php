<?php
// Conexion y consulta a la base de datos (igual que en index.php)
include "../conexion.php";
$conectar = conexion();
$sql = "SELECT * FROM `usuarios`";

// Si se ha enviado un valor de búsqueda
if (isset($_POST['searchValue'])) {
    // Filtrar el valor de búsqueda para evitar inyección de SQL (puedes mejorar esta parte)
    $searchValue = mysqli_real_escape_string($conectar, $_POST['searchValue']);
    
    // Agregar una cláusula WHERE a la consulta para filtrar los resultados
    $sql .= " WHERE nombre LIKE '%$searchValue%' OR apellido LIKE '%$searchValue%' OR cargo LIKE '%$searchValue%' OR usuario LIKE '%$searchValue%' OR doc LIKE '%$searchValue%'";
}

$resultado = mysqli_query($conectar, $sql);

// Mostrar los resultados de la búsqueda
while ($row = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <th></th>
        <th><?php echo $row['nombre'] ?></th>
        <th><?php echo $row['apellido'] ?></th>
        <th><?php echo $row['cargo'] ?></th>
        <th><?php echo $row['usuario'] ?></th>
        <th><?php echo $row['doc'] ?></th>
        <th><a href="#" onclick="return edicion(<?php echo $row['id_usuario'] ?>)"><img src="../img/editar.png" class="accion"></a></th>
        <th><a href="#" onclick="return eliminacion(<?php echo $row['id_usuario'] ?>)"><img src="../img/eliminar.png" class="accion"></a></th>
    </tr>
<?php
}
?>
