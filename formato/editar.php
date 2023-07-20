<?php
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login/login.php");
    exit;
}

require_once '../conexion.php';
$conectar = conexion();

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM visita_tecnica WHERE id='$id'";
  $query = mysqli_query($conectar, $sql);

  if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_array($query);

    $descripcion = $row['descripcion'];
    $objetivo = $row['objetivo'];
    $area = $row['area'];
    $persona =  $row['persona']; 
    $logistico =  $row['logistico'];
    $ubicacion = $row['ubicacion'];
    $tiempo = $row['tiempo'];
    $trabajo = $row['trabajo'];
    $prioridad = $row['prioridad'];
    $accesibilidad = $row['accesibilidad'];
    $accesibilidadSeparada = explode(' - ', $accesibilidad);
    $disponibilidad = $row['disponibilidad'];
    $horario = $row['horario'];
    $anticorrupcion = $row['anticorrupcion'];
    $valorizacion = $row['valorizacion'];

    $negocio = $row['negocio']; //GENENERALES CAMBIAR ESO EN EL ORIGINAL Y QUITAR ID = "MYFORM" DE FROMULARIO
    $alcance = $row['alcance'];
    $alcanceSeparada = explode(' - ', $alcance);
    $mano = $row['mano'];
    $manoSeparada = explode(' - ', $mano);
    $mano_certificacion = $row['mano_certificacion'];
    $mano_empresa = $row['mano_empresa'];
    $materiales = $row['materiales'];
    $servicios = $row['servicios'];
    $cliente = $row['cliente'];
    $clienteSeparada = explode(' - ', $cliente);
    $cliente_estacionamiento = $row['cliente_estacionamiento'];
    $cliente_electrica = $row['cliente_electrica'];
    $cliente_aire = $row['cliente_aire'];
    $cliente_otros = $row['cliente_otros'];

    $tipotrabajo = $row['tipotrabajo'];
    $tipotrabajoSeparada = explode(' - ', $tipotrabajo);
    $epp = $row['epp'];
    $equipos = $row['equipos'];
    $procedimientos = $row['procedimientos'];
    $jefe = $row['jefe'];
    $riesgos = $row['riesgos'];
    $observaciones = $row['observaciones'];
    // print_r($manoSeparada);

    $imagenRutas = array();
    for ($i = 1; $i <= 10; $i++) {
        $imagenColumna = "imagen" . $i;
        $imagenRuta = $row[$imagenColumna];
        if (!empty($imagenRuta)) {
            $imagenRutas[] = $imagenRuta;
        }
    }
    $hayImagenes = (count($imagenRutas) > 0); // Verificar si hay imágenes almacenadas
  }
}

if (isset($_POST['update'])){
  $id = $_GET['id'];
  $descripcion = $_POST['descripcion'];
  $objetivo = $_POST['objetivo'];
  $area = $_POST['area'];
  $persona =  $_POST['persona']; 
  $logistico =  $_POST['logistico'];    
  $ubicacion = $_POST['ubicacion'];
  $tiempo = $_POST['tiempo'];
  $trabajo = $_POST['trabajo'];
  $prioridad = $_POST['prioridad'];
  $accesibilidad = isset($_POST['accesibilidad']) ? implode(" - ", $_POST['accesibilidad']) : "";
  $disponibilidad = $_POST['disponibilidad'];
  $horario = $_POST['horario'];
  $anticorrupcion = $_POST['anticorrupcion'];
  $valorizacion = $_POST['valorizacion'];

  $negocio = $_POST['negocio'];
  $alcance = isset($_POST['alcance']) ? implode(" - ", $_POST['alcance']) : "";
  $mano = isset($_POST['mano']) ? implode(" - ", $_POST['mano']) : "";
  $mano_certificacion = $_POST['mano_certificacion'];
  $mano_empresa = $_POST['mano_empresa'];
  $materiales = $_POST['materiales'];
  $servicios = $_POST['servicios'];
  $cliente = isset($_POST['cliente']) ? implode(" - ", $_POST['cliente']) : "";
  $cliente_estacionamiento = $_POST['cliente_estacionamiento'];
  $cliente_electrica = $_POST['cliente_electrica'];
  $cliente_aire = $_POST['cliente_aire'];
  $cliente_otros = $_POST['cliente_otros'];

  $tipotrabajo = isset($_POST['tipotrabajo']) ? implode(" - ", $_POST['tipotrabajo']) : "";
  $epp = $_POST['epp'];
  $equipos = $_POST['equipos'];
  $procedimientos = $_POST['procedimientos'];
  $jefe = $_POST['jefe'];
  $riesgos = $_POST['riesgos'];
  $observaciones = $_POST['observaciones'];

  $consulta = "UPDATE visita_tecnica SET descripcion = '$descripcion', objetivo = '$objetivo', area = '$area', persona = '$persona', logistico = '$logistico', ubicacion = '$ubicacion', tiempo = '$tiempo', trabajo = '$trabajo', 
  trabajo = '$trabajo', prioridad = '$prioridad', accesibilidad = '$accesibilidad', disponibilidad = '$disponibilidad', horario = '$horario', anticorrupcion = '$anticorrupcion',  valorizacion = '$valorizacion', negocio ='$negocio',
  alcance = '$alcance', mano = '$mano', mano_certificacion = '$mano_certificacion', mano_empresa = '$mano_empresa', materiales = '$materiales', servicios = '$servicios', cliente = '$cliente',  
  cliente_estacionamiento = '$cliente_estacionamiento', cliente_electrica = '$cliente_electrica', cliente_aire = '$cliente_aire', cliente_otros = '$cliente_otros', tipotrabajo = '$tipotrabajo', epp = '$epp', equipos = '$equipos',
  procedimientos = '$procedimientos', jefe = '$jefe', riesgos = '$riesgos', observaciones = '$observaciones' WHERE id = $id";
  mysqli_query($conectar, $consulta);

  // Recuperar las rutas actuales de las imágenes desde la base de datos
  $sql = "SELECT imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, imagen7, imagen8, imagen9, imagen10 FROM visita_tecnica WHERE id='$id'";
  $query = mysqli_query($conectar, $sql);
  $row = mysqli_fetch_array($query);

  // Crear un array para almacenar las nuevas rutas de las imágenes
  $nuevasRutasImagenes = array();

// Verificar si se seleccionaron nuevas imágenes
if (!empty($_FILES['imagen']['name'][0])) {
  // Eliminar las imágenes anteriores de la carpeta "files" y sus rutas en la base de datos
  for ($i = 1; $i <= 10; $i++) {
      $imagenColumna = "imagen" . $i;
      $rutaAnterior = $row[$imagenColumna];
      if (!empty($rutaAnterior)) {
          // Eliminar la imagen anterior de la carpeta "files"
          if (file_exists($rutaAnterior)) {
              unlink($rutaAnterior);
          }
          // Actualizar la ruta en la base de datos a NULL
          $sqlUpdate = "UPDATE visita_tecnica SET $imagenColumna = NULL WHERE id = '$id'";
          $resultadoUpdate = mysqli_query($conectar, $sqlUpdate);
          if (!$resultadoUpdate) {
              echo "Error al actualizar las rutas de las imágenes anteriores: " . mysqli_error($conectar);
          }
      }
  }
  
  // Guardar las nuevas imágenes en la carpeta "files"
  $imagenValida = true;
  $nuevasRutasImagenes = array();
  for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {
      $nombreImagen = $_FILES['imagen']['name'][$i];
      $imagenTemporal = $_FILES['imagen']['tmp_name'][$i];
      $imagenTipo = $_FILES['imagen']['type'][$i];
      if ($imagenTipo == "image/jpeg" || $imagenTipo == "image/png") {
          $imagenNombre = uniqid() . "_" . $nombreImagen;
          $imagenRuta = "files/" . $imagenNombre;
          $nuevasRutasImagenes[] = $imagenRuta;
          move_uploaded_file($imagenTemporal, "files/" . $imagenNombre);
      } else {
          $imagenValida = false;
          break;
      }
  }

  // Si todas las imágenes son válidas, actualizar las rutas en la base de datos
  if ($imagenValida) {
      // Actualizar las rutas de las imágenes en la base de datos
      for ($i = 1; $i <= 10; $i++) {
          $imagenColumna = "imagen" . $i;
          if (!empty($nuevasRutasImagenes[$i - 1])) {
              $nuevaRuta = $nuevasRutasImagenes[$i - 1];
              $sqlUpdate = "UPDATE visita_tecnica SET $imagenColumna = '$nuevaRuta' WHERE id = '$id'";
              $resultadoUpdate = mysqli_query($conectar, $sqlUpdate);
              if (!$resultadoUpdate) {
                  echo "Error al actualizar las rutas de las imágenes: " . mysqli_error($conectar);
              }
          }
      }
      echo "Las imágenes se han actualizado correctamente.";
  } else {
      echo "Error: Las imágenes deben ser de tipo JPEG o PNG.";
  }
} else {
  echo "No se seleccionaron nuevas imágenes.";
}
  header("Location: lista.php");
}

if (isset($_POST['eliminar_imagenes'])) {
  $id = $_GET['id'];

  // Recuperar las rutas actuales de las imágenes desde la base de datos
  $sql = "SELECT imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, imagen7, imagen8, imagen9, imagen10 FROM visita_tecnica WHERE id='$id'";
  $query = mysqli_query($conectar, $sql);
  $row = mysqli_fetch_array($query);

  // Crear un array para almacenar las rutas de las imágenes que se eliminarán
  $rutasAnteriores = array();
  for ($i = 1; $i <= 10; $i++) {
      $imagenColumna = "imagen" . $i;
      $rutaImagen = $row[$imagenColumna];
      if (!empty($rutaImagen)) {
          $rutasAnteriores[] = $rutaImagen;
      }
  }

  // Eliminar las imágenes anteriores de la carpeta "files"
  foreach ($rutasAnteriores as $rutaAnterior) {
      if (file_exists($rutaAnterior)) {
          unlink($rutaAnterior);
      }
  }

  // Vaciar las rutas en la base de datos
  $sqlUpdate = "UPDATE visita_tecnica SET imagen1 = NULL, imagen2 = NULL, imagen3 = NULL, imagen4 = NULL, imagen5 = NULL, imagen6 = NULL, imagen7 = NULL, imagen8 = NULL, imagen9 = NULL, imagen10 = NULL WHERE id = '$id'";
  $resultadoUpdate = mysqli_query($conectar, $sqlUpdate);
  if (!$resultadoUpdate) {
      echo "Error al eliminar las imágenes anteriores: " . mysqli_error($conectar);
  } else {
      echo "Las imágenes anteriores se han eliminado correctamente.";
  }

  header("Location: lista.php");
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMATO DE VISITA TECNICA - METAL RAID PERU S.A.C</title>
    <link rel="icon" href="../img/icono-MRP.png">
    <link rel="stylesheet" href="../css/header.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      body {
        font-family: 'Roboto', sans-serif;
      } 

      .form-group{
        font-family: 'Roboto', sans-serif;
      }

      h1{
        text-transform: uppercase;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
      }

      h2, h3 {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
      }
    </style>
  </head>

  <body class="mrp-body"> 
    <header class="mrp-header">
      <div class="mrp-logo">
        <img src="../img/Logotipo.png" alt="Logo metalraid" class="mrp-logo-img">
        <h2 class="mrp-logo-nombre">Metal Raid Peru</h2>
      </div>  
      <nav class="mrp-nav">
        <button id="menu-toggle" class="mrp-toggle-label">&#9776;&nbsp;&nbsp;MENU</button>
        <div class="mrp-nav-links">
          <a href="../formato/form.php" class="mrp-nav-link">Visita Tecnica</a>
          <a href="../rendimiento/form.php" class="mrp-nav-link">Rendimiento</a>
          <a href="../formato/lista.php" class="mrp-nav-link">Lista</a>
          <a href="../login/salir.php" class="mrp-nav-link">Salir</a>
        </div>
      </nav>
    </header>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <form action="editar.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
          
          <h2 class="text-center mt-5">INFORMACIÓN GENERAL DEL TRABAJO</h2>
          
          <hr>

          <div class="form-group my-3">
              <label for="descripcion">Descripción de Trabajo<span>:</span></label>
              <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
          </div>

          <div class="form-group my-3">
              <label for="objetivo">Objetivo de Trabajo<span>:</span></label>
              <input type="text" name="objetivo" id="objetivo" class="form-control" value="<?php echo $objetivo; ?>">
          </div>

          <div class="form-group my-3">
              <label for="area">Área de trabajo de Cliente<span>:</span></label>
              <input type="text" name="area" id="area" class="form-control" value="<?php echo $area; ?>">
          </div>

          <div class="form-group my-3">
              <label for="persona">Persona de Contacto Usuario Final<span>:</span></label>
              <input type="text" name="persona" id="persona" class="form-control" value="<?php echo $persona; ?>">
          </div>

          <div class="form-group my-3">
              <label for="logistico">Persona de Contacto Logístico<span>:</span></label>
              <input type="text" name="logistico" id="logistico" class="form-control" value="<?php echo $logistico; ?>">
          </div>
      
          <div class="form-group my-3">
              <label for="ubicacion">Ubicación / Localización<span>:</span></label>
              <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="<?php echo $ubicacion; ?>">
          </div>

          <div class="form-group my-3">
              <label for="tiempo">Tiempo de Entrega de Valorización<span>:</span></label>
              <input type="text" name="tiempo" id="tiempo" class="form-control" value="<?php echo $tiempo; ?>">
          </div>

          <div class="form-group my-3">
              <label for="trabajo">Tiempo de Entrega de Trabajo<span>:</span></label>
              <input type="text" name="trabajo" id="trabajo" class="form-control" value="<?php echo $trabajo; ?>">
          </div>          

          <div class="form-group my-3">
            <label for="prioridad">Prioridad de Ejecución<span>:</span></label>
            <select id="prioridad" onchange="generarInputEditar()" name="prioridad" class="form-control">
              <option value="-" <?php if ($prioridad == '-') echo 'selected'; ?>>-</option>
              <option value="Emergencia" <?php if ($prioridad == 'Emergencia') echo 'selected'; ?>>Emergencia</option>
              <option value="Programado" <?php if ($prioridad == 'Programado') echo 'selected'; ?>>Programado</option>
              <option value="Otros" <?php if ($prioridad != '-' && $prioridad != 'Emergencia' && $prioridad != 'Programado') echo 'selected'; ?>>Otros</option>
            </select>   
            <div class="my-1" id="contenedor"></div>
          </div>

          <script>
            var selectPrioridad = document.getElementById("prioridad");
            var prioridad = selectPrioridad.options[selectPrioridad.selectedIndex].value;
            var GuardadoPrioridad = "<?php echo $prioridad; ?>";

            function generarInputEditar() {
              var opcionSeleccionada = selectPrioridad.options[selectPrioridad.selectedIndex].value;
              var contenedor = document.getElementById("contenedor");
              contenedor.innerHTML = '';

              if (opcionSeleccionada === "Otros") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "prioridad";
                input.value = (prioridad === "Otros") ? GuardadoPrioridad : "";
                input.placeholder = "Especificar";
                contenedor.appendChild(input);
              }
            }
            generarInputEditar();
          </script>

          <div class="form-group my-3">
            <label for="accesibilidad">Accesibilidad a área de Trabajo<span>:</span></label>
            <div id="accesibilidad">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-peatonal" value="Peatonal" name="accesibilidad[]" <?php if (in_array('Peatonal', $accesibilidadSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="accesibilidad-peatonal">Peatonal</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-coche" value="Coche de trabajo" name="accesibilidad[]" <?php if (in_array('Coche de trabajo', $accesibilidadSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="accesibilidad-coche">Coche de trabajo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-camioneta" value="Vehicular con camioneta" name="accesibilidad[]" <?php if (in_array('Vehicular con camioneta', $accesibilidadSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="accesibilidad-camioneta">Vehicular con camioneta</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-grua" value="Vehicular con Grúa" name="accesibilidad[]" <?php if (in_array('Vehicular con Grúa', $accesibilidadSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="accesibilidad-grua">Vehicular con Grúa</label>
              </div>
              <div class="form-check">
                  <?php
                    function validacionAccesibilidad($accesibilidadSeparada) {
                        $valoresDiferentes = ['Peatonal', 'Coche de trabajo', 'Vehicular con camioneta', 'Vehicular con Grúa'];
                        
                        foreach ($accesibilidadSeparada as $elemento) {
                            if (!in_array($elemento, $valoresDiferentes)) {
                                return true; // Si se encuentra un elemento diferente, se devuelve true
                            }
                        }
                        return false; // Si no se encuentran elementos diferentes, se devuelve false
                    }
                  ?>
                <input class="form-check-input" type="checkbox" id="accesibilidad-otros" onchange="generarInputEditar2()" <?php if (!empty($accesibilidadSeparada) && (!empty($accesibilidadSeparada[0]) && validacionAccesibilidad($accesibilidadSeparada))) echo 'checked'; ?>>
                <label class="form-check-label" for="accesibilidad-otros">Otros</label>
                <div class="my-1" id="contenedor2"></div>
              </div>
            </div>
          </div>

          <script>
            function generarInputEditar2() {
              var checkboxAccesibilidad = document.getElementById("accesibilidad-otros");
              var checkboxSeleccionado = checkboxAccesibilidad.checked;
              var contenedor2 = document.getElementById("contenedor2");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "accesibilidad[]";
                input.placeholder = "Especificar";
                <?php
                  $valoresExcluidos = ['Peatonal', 'Coche de trabajo', 'Vehicular con camioneta', 'Vehicular con Grúa'];
                  $elementoDiferente = "";
                  foreach ($accesibilidadSeparada as $elemento) {
                    if (!in_array($elemento, $valoresExcluidos)) {
                      $elementoDiferente = $elemento;
                      break;
                    }
                  }
                ?>
                input.value = "<?php echo $elementoDiferente; ?>";
                contenedor2.appendChild(input);
              } else {
                contenedor2.innerHTML = ''; 
              }
            }
            generarInputEditar2();
            </script>

          <div class="form-group my-3">
              <label for="disponibilidad">Disponibilidad de área, equipo, unidad de trabajo<span>:</span></label>
              <select id="disponibilidad" onchange="generarInputEditar3()" name="disponibilidad" class="form-control">
                <option value="-" <?php if ($disponibilidad == '-') echo 'selected'; ?>>-</option>
                <option value="Trabaja las 24 horas" <?php if ($disponibilidad == 'Trabaja las 24 horas') echo 'selected'; ?>>Trabaja las 24 horas</option>
                <option value="Tiene paradas de mantenimiento semanal" <?php if ($disponibilidad == 'Tiene paradas de mantenimiento semanal') echo 'selected'; ?>>Tiene paradas de mantenimiento semanal</option>
                <option value="Tiene paradas de mantenimiento quincenal" <?php if ($disponibilidad == 'Tiene paradas de mantenimiento quincenal') echo 'selected'; ?>>Tiene paradas de mantenimiento quincenal</option>
                <option value="Tiene paradas de mantenimiento anual" <?php if ($disponibilidad == 'Tiene paradas de mantenimiento anual') echo 'selected'; ?>>Tiene paradas de mantenimiento anual</option>
                <option value="Otros" <?php if ($disponibilidad != '-' && $disponibilidad != 'Trabaja las 24 horas' && $disponibilidad != 'Tiene paradas de mantenimiento semanal' && $disponibilidad != 'Tiene paradas de mantenimiento quincenal' && $disponibilidad != 'Tiene paradas de mantenimiento anual') echo 'selected'; ?>>Otros</option>
              </select>
              <div class="my-1" id="contenedor3"></div>
          </div>

          <script>
            var selectDisponibilidad = document.getElementById("disponibilidad");
            var disponibilidad = selectDisponibilidad.options[selectDisponibilidad.selectedIndex].value;
            var GuardadoDisponibilidad = "<?php echo $disponibilidad; ?>";

            function generarInputEditar3() {
              var opcionSeleccionada = selectDisponibilidad.options[selectDisponibilidad.selectedIndex].value;
              var contenedor3 = document.getElementById("contenedor3");
              contenedor3.innerHTML = '';

              if (opcionSeleccionada === "Otros") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "disponibilidad";
                input.value = (disponibilidad === "Otros") ? GuardadoDisponibilidad : "";
                input.placeholder = "Especificar";
                contenedor3.appendChild(input);
              }
            }
            generarInputEditar3();
          </script>
          
          <div class="form-group my-3">
              <label for="horario">Horario de trabajo para trabajo del cliente<span>:</span></label>
              <select id="horario" onchange="generarInputEditar4()" name="horario" class="form-control">
                <option value="-" <?php if ($horario == '-') echo 'selected'; ?>>-</option>
                <option value="Lunes a sábado diurno" <?php if ($horario == 'Lunes a sábado diurno') echo 'selected'; ?>>Lunes a sábado diurno</option>
                <option value="Lunes a sábado nocturno" <?php if ($horario == 'Lunes a sábado nocturno') echo 'selected'; ?>>Lunes a sábado nocturno</option>
                <option value="Domingo" <?php if ($horario == 'Domingo') echo 'selected'; ?>>Domingo</option>
                <option value="Feriados" <?php if ($horario == 'Feriados') echo 'selected'; ?>>Feriados</option>
                <option value="Otros" <?php if ($horario != '-' && $horario != 'Lunes a sábado diurno' && $horario != 'Lunes a sábado nocturno' && $horario != 'Domingo' && $horario != 'Feriados') echo 'selected'; ?>>Otros</option>
              </select>
              <div class="my-1" id="contenedor4"></div>
          </div>    

          <script>
            var selectHorario = document.getElementById("horario");
            var horario = selectHorario.options[selectHorario.selectedIndex].value;
            var GuardadoHorario = "<?php echo $horario; ?>";

            function generarInputEditar4() {
              var opcionSeleccionada = selectHorario.options[selectHorario.selectedIndex].value;
              var contenedor4 = document.getElementById("contenedor4");
              contenedor4.innerHTML = '';

              if (opcionSeleccionada === "Otros") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "horario";
                input.value = (horario === "Otros") ? GuardadoHorario : "";
                input.placeholder = "Especificar";
                contenedor4.appendChild(input);
              }
            }
            generarInputEditar4();
          </script>

          <div class="form-group my-3">
              <label for="anticorrupcion">Anticorrupción<span>:</span></label>
              <select id="anticorrupcion"onchange="generarInputEditar5()" name="anticorrupcion" class="form-control">
                <option value="-" <?php if ($anticorrupcion == '-') echo 'selected'; ?>>-</option>
                <option value="Logístico es transparente con la información" <?php if ($anticorrupcion == 'Logístico es transparente con la información') echo 'selected'; ?>>Logístico es transparente con la información</option>
                <option value="Jefe de área producción  es transparente con la información" <?php if ($anticorrupcion == 'Jefe de área producción  es transparente con la información') echo 'selected'; ?>>Jefe de área producción  es transparente con la información</option>
                <option value="Jefe de mantenimiento  es transparente con la información" <?php if ($anticorrupcion == 'Jefe de mantenimiento  es transparente con la información') echo 'selected'; ?>>Jefe de mantenimiento  es transparente con la información</option>
                <option value="Otros indicios de hostigamiento a proveedor" <?php if ($anticorrupcion != '-' && $anticorrupcion != 'Logístico es transparente con la información' && $anticorrupcion != 'Jefe de área producción  es transparente con la información' && $anticorrupcion != 'Jefe de mantenimiento  es transparente con la información') echo 'selected'; ?>>Otros indicios de hostigamiento a proveedor</option>
              </select>
          <div class="my-1" id="contenedor5"></div>

          <script>
            var selectAnticorrupcion = document.getElementById("anticorrupcion");
            var anticorrupcion = selectAnticorrupcion.options[selectAnticorrupcion.selectedIndex].value;
            var GuardadoAnticorrupcion = "<?php echo $anticorrupcion; ?>";

            function generarInputEditar5() {
              var opcionSeleccionada = selectAnticorrupcion.options[selectAnticorrupcion.selectedIndex].value;
              var contenedor5 = document.getElementById("contenedor5");
              contenedor5.innerHTML = '';

              if (opcionSeleccionada === "Otros indicios de hostigamiento a proveedor") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "anticorrupcion";
                input.value = (anticorrupcion === "Otros indicios de hostigamiento a proveedor") ? GuardadoAnticorrupcion : "";
                input.placeholder = "Especificar";
                contenedor5.appendChild(input);
              }
            }
            generarInputEditar5();
          </script> 

          <div class="form-group my-3">
              <label for="valorizacion">Tipo de Valorización<span>:</span></label>
              <select id="valorizacion" onchange="generarInputEditar6()" name="valorizacion" class="form-control">
                <option value="-" <?php if ($valorizacion == '-') echo 'selected'; ?>>-</option>
                <option value="Concursable" <?php if ($valorizacion == 'Concursable') echo 'selected'; ?>>Concursable</option>
                <option value="Exploración de precios" <?php if ($valorizacion == 'Exploración de precios') echo 'selected'; ?>>Exploración de precios</option>
                <option value="Otros" <?php if ($valorizacion != '-' && $valorizacion != 'Concursable' && $valorizacion != 'Exploración de precios') echo 'selected'; ?>>Otros</option>
              </select>
          <div class="my-1" id="contenedor6"></div>
          </div> 

          <script>
            var selectValorizacion = document.getElementById("valorizacion");
            var valorizacion = selectValorizacion.options[selectValorizacion.selectedIndex].value;
            var GuardadoValorizacion = "<?php echo $valorizacion; ?>";

            function generarInputEditar6() {
              var opcionSeleccionada = selectValorizacion.options[selectValorizacion.selectedIndex].value;
              var contenedor6 = document.getElementById("contenedor6");
              contenedor6.innerHTML = '';

              if (opcionSeleccionada === "Otros") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "valorizacion";
                input.value = (valorizacion === "Otros") ? GuardadoValorizacion : "";
                input.placeholder = "Especificar";
                contenedor6.appendChild(input);
              }
            }
            generarInputEditar6();
          </script> 

          


          <hr>
          <h2 class="text-center">INFORMACIÓN ESPECIFICA DEL TRABAJO</h2>
          <hr>

          <div class="form-group my-3">
              <label for="negocio">Línea de Negocio<span>:</span></label>
              <select id="negocio" onchange="generarInputEditar7()" name="negocio" class="form-control">
                <option value="-" <?php if ($negocio == '-') echo 'selected'; ?>>-</option>
                <option value="Proyecto" <?php if ($negocio == 'Proyecto') echo 'selected'; ?>>Proyecto</option>
                <option value="Mantenimiento" <?php if ($negocio == 'Mantenimiento') echo 'selected'; ?>>Mantenimiento</option>
                <option value="Fabricación" <?php if ($negocio == 'Fabricación') echo 'selected'; ?>>Fabricación</option>
                <option value="Servicios Generales" <?php if ($negocio == 'Servicios Generales') echo 'selected'; ?>>Servicios Generales</option> 
                <option value="Otros" <?php if ($negocio != '-' && $negocio != 'Proyecto' && $negocio != 'Mantenimiento' && $negocio != 'Fabricación' && $negocio != 'Servicios Generales') echo 'selected'; ?>>Otros</option>           
              </select>
          <div class="my-1" id="contenedor7"></div>
          </div>

          <script>
            var selectNegocio = document.getElementById("negocio");
            var negocio = selectNegocio.options[selectNegocio.selectedIndex].value;
            var GuardadoNegocio = "<?php echo $negocio; ?>";

            function generarInputEditar7() {
              var opcionSeleccionada = selectNegocio.options[selectNegocio.selectedIndex].value;
              var contenedor7 = document.getElementById("contenedor7");
              contenedor7.innerHTML = '';

              if (opcionSeleccionada === "Otros") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "negocio";
                input.value = (negocio === "Otros") ? GuardadoNegocio : "";
                input.placeholder = "Especificar";
                contenedor7.appendChild(input);
              }
            }
            generarInputEditar7();
          </script>

          <div class="form-group my-3">
            <label for="alcance">Tipo de Documentación de alcance de servicio<span>:</span></label>
            <div id="alcance">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-bosquejo" value="Bosquejo" name="alcance[]" <?php if (in_array('Bosquejo', $alcanceSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="alcance-bosquejo">Bosquejo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-memoria" value="Memoria de Cálculo" name="alcance[]" <?php if (in_array('Memoria de Cálculo', $alcanceSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="alcance-memoria">Memoria de Cálculo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-planos" value="Planos de Detalle" name="alcance[]" <?php if (in_array('Planos de Detalle', $alcanceSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="alcance-planos">Planos de Detalle</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-informacion" value="Información Verbal" name="alcance[]" <?php if (in_array('Información Verbal', $alcanceSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="alcance-informacion">Información Verbal</label>
              </div>
              <div class="form-check">
                  <?php
                    function validacionAlcance($alcanceSeparada) {
                        $valoresDiferentes = ['Bosquejo', 'Memoria de Cálculo', 'Planos de Detalle', 'Información Verbal'];
                        
                        foreach ($alcanceSeparada as $elemento) {
                            if (!in_array($elemento, $valoresDiferentes)) {
                                return true; // Si se encuentra un elemento diferente, se devuelve true
                            }
                        }
                        return false; // Si no se encuentran elementos diferentes, se devuelve false
                    }
                  ?>
                <input class="form-check-input" type="checkbox" id="alcance-otros" onchange="generarInputEditar8()" <?php if (!empty($alcanceSeparada) && (!empty($alcanceSeparada[0]) && validacionAlcance($alcanceSeparada))) echo 'checked'; ?>>
                <label class="form-check-label" for="alcance-otros">Otros</label>
                <div class="my-1" id="contenedor8"></div>
              </div>
            </div>
          </div>

          <script>
            function generarInputEditar8() {
              var checkboxAlcance = document.getElementById("alcance-otros");
              var checkboxSeleccionado = checkboxAlcance.checked;
              var contenedor8 = document.getElementById("contenedor8");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "alcance[]";
                input.placeholder = "Especificar";
                <?php
                  $valoresExcluidos = ['Bosquejo', 'Memoria de Cálculo', 'Planos de Detalle', 'Información Verbal'];
                  $elementoDiferente = "";
                  foreach ($alcanceSeparada as $elemento) {
                    if (!in_array($elemento, $valoresExcluidos)) {
                      $elementoDiferente = $elemento;
                      break;
                    }
                  }
                ?>
                input.value = "<?php echo $elementoDiferente; ?>";
                contenedor8.appendChild(input);
              } else {
                contenedor8.innerHTML = ''; 
              }
            }
            generarInputEditar8();
          </script>

          <div class="form-group my-3">
            <label for="mano">Mano de Obra<span>:</span></label>
            <div id="mano">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-tecnicos" value="Técnicos" name="mano[]" <?php if (in_array('Técnicos', $manoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="mano-tecnicos">Técnicos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-ingenieria" value="Ingeniería" name="mano[]" <?php if (in_array('Ingeniería', $manoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="mano-ingenieria">Ingeniería</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-certificacion" onchange="generarInputEditarCertificacion()" <?php echo !empty($mano_certificacion) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="mano-certificacion">Mano de obra con certificación especial</label>
                <div class="my-1" id="contenedorCertificacion"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-empresa" onchange="generarInputEditarEmpresa()" <?php echo !empty($mano_empresa) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="mano-empresa">Certificaciones de empresa específicos</label>
                <div class="my-1" id="contenedorEmpresa"></div>
              </div>
            </div>
          </div>

          <script>
            function generarInputEditarCertificacion() {
              var checkCertificacion = document.getElementById("mano-certificacion");
              var checkboxSeleccionado = checkCertificacion.checked;
              var contenedorCertificacion = document.getElementById("contenedorCertificacion");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "mano_certificacion";
                input.placeholder = "Especificar";
                input.value = "<?php echo $mano_certificacion; ?>";
                contenedorCertificacion.appendChild(input);
              } else {
                contenedorCertificacion.innerHTML = ''; 
              }
            }
            generarInputEditarCertificacion();
          </script>

          <script>
            function generarInputEditarEmpresa() {
              var checkEmpresa = document.getElementById("mano-empresa");
              var checkboxSeleccionado = checkEmpresa.checked;
              var contenedorEmpresa = document.getElementById("contenedorEmpresa");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "mano_empresa";
                input.placeholder = "Especificar";
                input.value = "<?php echo $mano_empresa; ?>";
                contenedorEmpresa.appendChild(input);
              } else {
                contenedorEmpresa.innerHTML = ''; 
              }
            }
            generarInputEditarEmpresa();
          </script>

          <div class="form-group my-3">
              <label for="materiales">Materiales<span>:</span></label>
              <select id="materiales" onchange="generarInputEditar10()" name="materiales" class="form-control">
                <option value="-" <?php if ($materiales == '-') echo 'selected'; ?>>-</option>
                <option value="Materiales especiales" <?php if ($materiales != '-') echo 'selected'; ?>>Materiales especiales</option>          
              </select>
          <div class="my-1" id="contenedor10"></div>
          </div>

          <script>
            var selectMateriales = document.getElementById("materiales");
            var materiales = selectMateriales.options[selectMateriales.selectedIndex].value;
            var GuardadoMateriales = "<?php echo $materiales; ?>";

            function generarInputEditar10() {
              var opcionSeleccionada = selectMateriales.options[selectMateriales.selectedIndex].value;
              var contenedor10 = document.getElementById("contenedor10");
              contenedor10.innerHTML = '';

              if (opcionSeleccionada === "Materiales especiales") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "materiales";
                input.value = (materiales === "Materiales especiales") ? GuardadoMateriales : "";
                input.placeholder = "Especificar";
                contenedor10.appendChild(input);
              }
            }
            generarInputEditar10();
          </script>

          <div class="form-group my-3">
              <label for="servicios">Servicios<span>:</span></label>
              <select id="servicios" onchange="generarInputEditar11()" name="servicios" class="form-control">
                <option value="-" <?php if ($servicios == '-') echo 'selected'; ?>>-</option>
                <option value="Servicios externos especiales" <?php if ($servicios != '-') echo 'selected'; ?>>Servicios externos especiales</option>          
              </select>
          <div class="my-1" id="contenedor11"></div>
          </div>

          <script>
            var selectServicios = document.getElementById("servicios");
            var servicios = selectServicios.options[selectServicios.selectedIndex].value;
            var GuardadoServicios = "<?php echo $servicios; ?>";

            function generarInputEditar11() {
              var opcionSeleccionada = selectServicios.options[selectServicios.selectedIndex].value;
              var contenedor11 = document.getElementById("contenedor11");
              contenedor11.innerHTML = '';

              if (opcionSeleccionada === "Servicios externos especiales") {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "servicios";
                input.value = (servicios === "Servicios externos especiales") ? GuardadoServicios : "";
                input.placeholder = "Especificar";
                contenedor11.appendChild(input);
              }
            }
            generarInputEditar11();
          </script>
                
          <div class="form-group my-3">
            <label>Servicios compartidos con Cliente:</label>
            <div id="cliente">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-agua" value="Agua" name="cliente[]" <?php if (in_array('Agua', $clienteSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="cliente-agua">Agua</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-comedor" value="Comedor" name="cliente[]" <?php if (in_array('Comedor', $clienteSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="cliente-comedor">Comedor</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-higienicos" value="Servicios Higiénicos" name="cliente[]" <?php if (in_array('Servicios Higiénicos', $clienteSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="cliente-higienicos">Servicios Higiénicos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-estacionamiento" onchange="generarInputEditarEstacionamiento()" <?php echo !empty($cliente_estacionamiento) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="cliente-estacionamiento">Estacionamiento Interno y Externo</label>
                <div class="my-1" id="contenedorEstacionamiento"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-electrica" onchange="generarInputEditarElectrica()" <?php echo !empty($cliente_electrica) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="cliente-electrica">Energía Eléctrica</label>
                <div class="my-1" id="contenedorElectrica"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-aire" onchange="generarInputEditarAire()" <?php echo !empty($cliente_aire) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="cliente-aire">Aire Comprimido</label>
                <div class="my-1" id="contenedorAire"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-otros" onchange="generarInputEditarOtrosCliente()" <?php echo !empty($cliente_otros) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="cliente-otros">Otros</label>
                <div class="my-1" id="contenedorOtros"></div>
              </div>
            </div>
          </div>

          <script>
            function generarInputEditarEstacionamiento() {
              var checkEstacionamiento = document.getElementById("cliente-estacionamiento");
              var checkboxSeleccionado = checkEstacionamiento.checked;
              var contenedorEstacionamiento = document.getElementById("contenedorEstacionamiento");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "cliente_estacionamiento";
                input.placeholder = "Especificar";
                input.value = "<?php echo $cliente_estacionamiento; ?>";
                contenedorEstacionamiento.appendChild(input);
              } else {
                contenedorEstacionamiento.innerHTML = ''; 
              }
            }
            generarInputEditarEstacionamiento();
          </script>

          <script>
            function generarInputEditarElectrica() {
              var checkElectrica = document.getElementById("cliente-electrica");
              var checkboxSeleccionado = checkElectrica.checked;
              var contenedorElectrica = document.getElementById("contenedorElectrica");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "cliente_electrica";
                input.placeholder = "Especificar voltaje y distancia de punto de energía";
                input.value = "<?php echo $cliente_electrica; ?>";
                contenedorElectrica.appendChild(input);
              } else {
                contenedorElectrica.innerHTML = ''; 
              }
            }
            generarInputEditarElectrica();
          </script>

          <script>
            function generarInputEditarAire() {
              var checkAire = document.getElementById("cliente-aire");
              var checkboxSeleccionado = checkAire.checked;
              var contenedorAire = document.getElementById("contenedorAire");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "cliente_aire";
                input.placeholder = "Especificar presión y distancia a punto de energía";
                input.value = "<?php echo $cliente_aire; ?>";
                contenedorAire.appendChild(input);
              } else {
                contenedorAire.innerHTML = ''; 
              }
            }
            generarInputEditarAire();
          </script>

          <script>
            function generarInputEditarOtrosCliente() {
              var checkOtros = document.getElementById("cliente-otros");
              var checkboxSeleccionado = checkOtros.checked;
              var contenedorOtros = document.getElementById("contenedorOtros");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "cliente_otros";
                input.placeholder = "Especificar";
                input.value = "<?php echo $cliente_otros; ?>";
                contenedorOtros.appendChild(input);
              } else {
                contenedorOtros.innerHTML = ''; 
              }
            }
            generarInputEditarOtrosCliente();
          </script>

          <hr>
          <h2 class="text-center">SEGURIDAD INDUSTRIAL</h2>
          <hr>

          <div class="form-group my-3">
            <label for="tipotrabajo">Tipo de Trabajo<span>:</span></label>
            <div id="tipotrabajo">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-caliente" value="Trabajo en Caliente" name="tipotrabajo[]" onchange="generarInputEditarEppEquipos()" <?php if (in_array('Trabajo en Caliente', $tipotrabajoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="trabajo-caliente">Trabajo en Caliente</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-electrico" value="Trabajo Eléctrico" name="tipotrabajo[]" onchange="generarInputEditarEppEquipos()" <?php if (in_array('Trabajo Eléctrico', $tipotrabajoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="trabajo-electrico">Trabajo Eléctrico</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-altura" value="Trabajo en Altura" name="tipotrabajo[]" onchange="generarInputEditarEppEquipos()" <?php if (in_array('Trabajo en Altura', $tipotrabajoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="trabajo-altura">Trabajo en Altura</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-izaje" value="Trabajo de Maniobras de Izaje" name="tipotrabajo[]" onchange="generarInputEditarEppEquipos()" <?php if (in_array('Trabajo de Maniobras de Izaje', $tipotrabajoSeparada) !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="trabajo-izaje">Trabajo de Maniobras de Izaje</label>
              </div>
              <div class="form-check">
                  <?php
                    function validacionTipotrabajo($tipotrabajoSeparada) {
                        $valoresDiferentes = ['Trabajo en Caliente', 'Trabajo Eléctrico', 'Trabajo en Altura', 'Trabajo de Maniobras de Izaje'];
                        
                        foreach ($tipotrabajoSeparada as $elemento) {
                            if (!in_array($elemento, $valoresDiferentes)) {
                                return true; // Si se encuentra un elemento diferente, se devuelve true
                            }
                        }
                        return false; // Si no se encuentran elementos diferentes, se devuelve false
                    }
                  ?>
                <input class="form-check-input" type="checkbox" id="trabajo-otros" onchange="generarInputEditarTrabajo()" <?php if (!empty($tipotrabajoSeparada) && (!empty($tipotrabajoSeparada[0]) && validacionTipotrabajo($tipotrabajoSeparada))) echo 'checked'; ?>>
                <label class="form-check-label" for="trabajo-otros">Otros</label>
                <div id="OtrosinputContainer"></div>
              </div>
            </div>
          </div>

          <script>
            function generarInputEditarTrabajo() {
              var checkboxTrabajoOtros = document.getElementById("trabajo-otros");
              var checkboxSeleccionado = checkboxTrabajoOtros.checked;
              var OtrosinputContainer = document.getElementById("OtrosinputContainer");
              if (checkboxSeleccionado) {
                var input = document.createElement("input");
                input.classList.add('form-control');
                input.type = "text";
                input.name = "tipotrabajo[]";
                input.placeholder = "Especificar";
                <?php
                  $valoresExcluidos = ['Trabajo en Caliente', 'Trabajo Eléctrico', 'Trabajo en Altura', 'Trabajo de Maniobras de Izaje'];
                  $elementoDiferente = "";
                  foreach ($tipotrabajoSeparada as $elemento) {
                    if (!in_array($elemento, $valoresExcluidos)) {
                      $elementoDiferente = $elemento;
                      break;
                    }
                  }
                ?>
                input.value = "<?php echo $elementoDiferente; ?>";
                OtrosinputContainer.appendChild(input);
              } else {
                OtrosinputContainer.innerHTML = ''; 
              }
            }
            generarInputEditarTrabajo();
          </script>

          <script>
            function generarInputEditarEppEquipos() {
            var checkboxes = document.querySelectorAll('input[name="tipotrabajo[]"]:checked');
            var eppValues = [];
            var equiposValues = [];
            var otrosInputContainer = document.getElementById("otros-input-container");

            checkboxes.forEach(function(checkbox) {
              var valor = checkbox.value;
              if (valor === "Trabajo en Caliente") {
                eppValues.push("Soldador, extintor, manta ignífuga");
              } else if (valor === "Trabajo Eléctrico") {
                eppValues.push("Equipo dielectrico");
                equiposValues.push("Caja de bloqueo, LOTO");
              } else if (valor === "Trabajo en Altura") {
                eppValues.push("Arnes, linea de vida");
                equiposValues.push("Andamio, manlift");
              } else if (valor === "Trabajo de Maniobras de Izaje") {
                eppValues.push("Aparejos de izaje");
                equiposValues.push("Walkie-talkie, camión grúa");
              }
            });

            document.getElementById("epp").value = eppValues.join(" - ");
            document.getElementById("equipos").value = equiposValues.join(" - ");
          }
          </script>

          <div class="form-group my-3">
            <label for="epp">EPP<span>:</span></label>
            <input type="text" name="epp" id="epp" class="form-control" value="<?php echo $epp; ?>">
          </div>

          <div class="form-group my-3">
            <label for="equipos">Equipos<span>:</span></label>
            <input type="text" name="equipos" id="equipos" class="form-control" value="<?php echo $equipos; ?>">
          </div>

          <div class="form-group my-3">
              <label for="procedimientos">Procedimientos Específicos<span>:</span></label>
              <input type="text" name="procedimientos" id="procedimientos" class="form-control" value="<?php echo $procedimientos; ?>">
          </div>

          <div class="form-group my-3">
              <label for="jefe">Jefe de Seguridad de área y teléfono de contacto<span>:</span></label>
              <input type="text" name="jefe" id="jefe" class="form-control" value="<?php echo $jefe; ?>">
          </div>

          <div class="form-group my-3">
              <label for="riesgos">Riesgos de trabajo específicos<span>:</span></label>
              <input type="text" name="riesgos" id="riesgos" class="form-control" value="<?php echo $riesgos; ?>">
          </div>
          
          <div class="form-group my-3">
              <label for="observaciones">Observaciones del trabajo<span>:</span></label>
              <textarea name="observaciones" rows="3" id="observaciones" class="form-control"><?php echo $observaciones; ?></textarea>
          </div>

          <div class="form-group my-3">
              <label for="imagen">Apuntes, Medidas, Gráficas de campo<span>:</span></label>
              <input type="file" name="imagen[]" multiple id="imagen" accept="image/*" class="form-control">
              
              <?php if ($hayImagenes) { ?>
              <button type="submit" name="eliminar_imagenes" class="btn btn-danger">Eliminar Imágenes</button>
              <?php } ?>

          </div>

          <?php foreach ($imagenRutas as $rutaImagen) { ?>
              <img src="<?php echo $rutaImagen; ?>" alt="Imagen actual">
          <?php } ?>

          <div class="container-fluid h-100">
            <div class="row w-100 align-items-center">
              <div class="col text-center mt-3 mb-3">
                <button type="submit" class="btn btn-primary btn-block" name="update">Enviar Visita</button>
              </div>
            </div>
          </div> 
        </form>
      </div>
    </div>
  </div>

<script src="../js/header.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>