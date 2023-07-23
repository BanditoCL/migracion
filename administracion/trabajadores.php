<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="../img/logo/Logotipo.png" rel="icon">
<title>Rendimiento-Metal Raid Peru</title>
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/ruang-admin.min.css" rel="stylesheet">
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css?<?=date('Y-m-d H:i:s')?>" type="text/css">
</head>

<body id="page-top">
<div id="wrapper">
<?php include ("sidebar.php"); ?>
<?php
// Conexión a la base de datos

$usuario = $_SESSION['id_usuario'];
$resultado = mysqli_query($conectar, "SELECT cargo FROM usuarios WHERE id_usuario = '$usuario'");
if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $rol = $fila['cargo'];
    // Verificar si el usuario es administrador o Progrmaador
    if ($rol == 'Administrador' || $rol == 'Programador') {
        // El usuario es administrador o Programador Entonces
?>
<?php
// Consulta SQL
$sql = "SELECT * FROM `usuarios`";  
$resultado = mysqli_query($conectar, $sql); ?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <?php include ("header.php"); ?>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trabajadores</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Administracion</li>
            <li class="breadcrumb-item active" aria-current="page">Pesonal</li>
        </ol>
        </div>
        <!-- Row -->
        <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Administrar Personal</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th></th>
                    <th><th>
                    </tr>

                </thead>
                <tfoot>
                    <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th></th>
                    <th></th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
while($row=mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <th><?php  echo $row['id_usuario']?></th>
                    <th><?php  echo $row['nombre']?></th>
                    <th><?php  echo $row['apellido']?></th>
                    <th><?php  echo $row['cargo']?></th>
                    <th><?php  echo $row['usuario']?></th>
                    <th><?php  echo $row['doc']?></th>
                    <th><a href="#" onclick="return edicion(<?php echo $row['id_usuario'] ?>)"><img src="../img/editar.png" class="accion"></a></th>
                    <th><a href="#" onclick="return eliminacion(<?php echo $row['id_usuario'] ?>)"><img src="../img/eliminar.png" class="accion"></a></th>
                </tr>
<?php 
            }
        ?>
    </tbody>

    <script>
    function edicion(id) {
    if (confirm("¿Estás seguro que deseas Editar Al Trabajador #" + id + "?")) {
        window.location.href = "editar.php?id=" + id;  reporte
        return true;
    } else {
        return false;
    }
}
    function eliminacion(id) {
    if (confirm("¿Estás seguro que deseas Eliminar al Trabajador #" + id + "?")) {
        window.location.href = "eliminar.php?id=" + id;  reporte
        return true;
    } else {
        return false;
    }
}
</script>

<?php
}
}
?>

</table>
                </div>
            </div>
            </div>
        </div>

        <!--Row-->
        
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
            <b><a href="#" target="_blank">Sebitas &hearts;	</a></b>
            <b><a href="#" target="_blank">Willian &hearts;	</a></b>
        </span>
        </div>
    </div>
    </footer>
    <!-- Footer -->

    <!---Container Fluid-->

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
});
</script>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="../login/salir.php" class="btn btn-primary">Logout</a>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>