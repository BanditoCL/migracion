<?php
include "../conexion.php";
$conectar = conexion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="img/logo/logo.png" rel="icon">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../main.php">
        <div class="sidebar-brand-icon">
          <img src="../img/logo/Logotipo.png">
        </div>
        <div class="sidebar-brand-text mx-3">MetalRaid Peru</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="../main.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Formularios
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Visitas Tenicas</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="../formato/form.php">LLenar Formulario</a>
            <a class="collapse-item" href="#">Eventualidades</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Rendimientos</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="form.php">Nuevo Rendimiento</a>
            <a class="collapse-item" href="#">Eventualidades</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Horas Hombre</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="#">LLenar Formato</a>
            <a class="collapse-item" href="#">Eventualidades</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Vistas
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Tablas</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ver Tabla</h6>
            <a class="collapse-item" href="../formato/datatables.php">Visitas Tecnicas</a>
            <a class="collapse-item" href="datatables.php">Rendimientos</a>
            <a class="collapse-item" href="../horas/datatables.php">Horas Hombre</a>

          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

<?php
// Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
$usuario = $_SESSION['id_usuario'];
$resultado = mysqli_query($conectar, "SELECT cargo FROM usuarios WHERE id_usuario = '$usuario'");
if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $rol = $fila['cargo'];
    // Verificar si el usuario es administrador o Progrmaador
    if ($rol == 'Administrador' || $rol == 'Programador') {
        // El usuario es administrador o Programador Entonces
?>
<div class="sidebar-heading">
Administración
</div>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
    aria-controls="collapseAdmin">
    <i class="fas fa-fw fa-columns"></i>
    <span>Opciones</span>
</a>
<div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Ver Tabla</h6>
        <a class="collapse-item" href="../administracion/trabajadores.php">Trabajadores</a>
        <a class="collapse-item" href="../administracion/agregar.php">Agregar Personal</a>
        <a class="collapse-item" href="#">Reportes</a>
    </div>
</div>
</li>
<?php
} 
}
?>

      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
      <!-- Sidebar -->
      </div>