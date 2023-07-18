<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login/login.php");
    exit;
}

require_once("../conexion.php");
$conectar = conexion();

date_default_timezone_set("America/Lima");

// Obtener el nombre y apellido del usuario iniciado en la sesión
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $query = "SELECT nombre, apellido FROM usuarios WHERE id_usuario = '$id_usuario'";
    $result = mysqli_query($conectar, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $responsable = $row['nombre'] . ' ' . $row['apellido'];
    }
}

// Consulta para obtener el último rendimiento realizado por el usuario
$sql = "SELECT MAX(n) AS ultimo_rendimiento FROM rendimiento WHERE responsable = '$responsable'";
$result = mysqli_query($conectar, $sql);

// Verificación de errores en la consulta
if (!$result) {
    die('Error en la consulta: ' . mysqli_error($conectar));
}

// Obtener el valor del último rendimiento
$row = mysqli_fetch_assoc($result);
$ultimo_rendimiento = $row['ultimo_rendimiento'];

if ($ultimo_rendimiento === null) {
    // Si el usuario no tiene rendimientos registrados, se establece el valor 1
    $n = 1;
} else {
    // Si el usuario tiene rendimientos registrados, se incrementa el valor obtenido en 1
    $n = $ultimo_rendimiento + 1;
}

// Insertar en la tabla "rendimiento"
$fecha_gene = date('Y-m-d');
$observaciones = $_POST['observaciones'];

$sql = "INSERT INTO rendimiento (responsable, fecha_gene, n, n_observaciones) VALUES ('$responsable', '$fecha_gene', '$n', '$observaciones')";

if (mysqli_query($conectar, $sql)) {
  $id_rendimiento = mysqli_insert_id($conectar); // Obtener el ID de la última inserción en la tabla "rendimiento"
} else {
  echo "Error al insertar en la tabla 'rendimiento': " . mysqli_error($conectar);
  exit();
}

// Insertar en la tabla "ingresos"
$fechas = $_POST['fechas'];
$entregas = $_POST['entregas'];
$montos = $_POST['montos'];

foreach ($fechas as $key => $fecha) {
  $entrega = $entregas[$key];
  $monto = $montos[$key];

  $sql = "INSERT INTO ingresos (fecha_ing, entrega, monto_ing, id_rendimiento) VALUES ('$fecha', '$entrega', '$monto', '$id_rendimiento')";

  if (!mysqli_query($conectar, $sql)) {
    echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
    exit();
  }
}

// Insertar en la tabla "facturas"
$fechasfac = $_POST['fechasfac'];
$otsfac = $_POST['otsfac'];
$empresasfac = $_POST['empresasfac'];
$comprobantesfac = $_POST['comprobantesfac'];
$montosfac = $_POST['montosfac'];

foreach ($fechasfac as $key => $fechafac) {
    $otfac = $otsfac[$key];
    $empresafac = $empresasfac[$key];
    $comprobantefac = $comprobantesfac[$key];
    $montofac = $montosfac[$key];

    if ($_FILES['imagensfac']['size'][$key] > 0) {
        $imagensfac = $_FILES['imagensfac']['name'][$key];
        $tmp_name = $_FILES['imagensfac']['tmp_name'][$key];
        $extension = pathinfo($imagensfac, PATHINFO_EXTENSION);
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $ruta = "files/" . $imagensfac;
            move_uploaded_file($tmp_name, $ruta);
        } else {
            echo "La imagen debe tener formato JPEG o PNG";
            exit();
        }
    } else {
        $ruta = '';
    }

    $sql = "INSERT INTO facturas (fecha_fac, ot_fac, empresa_fac, comprobante_fac, monto_fac, imagen, id_rendimiento) 
            VALUES ('$fechafac', '$otfac', '$empresafac', '$comprobantefac', '$montofac', '$ruta', '$id_rendimiento')";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
        exit();
    }
}

// Insertar en la tabla "boletas"
$fechasbo = $_POST['fechasbo'];
$otsbo = $_POST['otsbo'];
$empresasbo = $_POST['empresasbo'];
$comprobantesbo = $_POST['comprobantesbo'];
$montosbo = $_POST['montosbo'];

foreach ($fechasbo as $key => $fechabo) {
  $otbo = $otsbo[$key];
  $empresabo = $empresasbo[$key];
  $comprobantebo = $comprobantesbo[$key];
  $montobo = $montosbo[$key];

  $sql = "INSERT INTO boletas (fecha_bo, ot_bo, empresa_bo, comprobante_bo, monto_bo, id_rendimiento) VALUES ('$fechabo', '$otbo', '$empresabo', '$comprobantebo',  '$montobo', '$id_rendimiento')";

  if (!mysqli_query($conectar, $sql)) {
    echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
    exit();
  }
}

// Insertar en la tabla "pasajes"
$fechaspa = $_POST['fechaspa'];
$otspa = $_POST['otspa'];
$clientespa = $_POST['clientespa'];
$partidaspa = $_POST['partidaspa'];
$llegadaspa = $_POST['llegadaspa'];
$montospa = $_POST['montospa'];

foreach ($fechaspa as $key => $fechapa) {
  $otpa = $otspa[$key];
  $clientepa = $clientespa[$key];
  $partidapa = $partidaspa[$key];
  $llegadapa = $llegadaspa[$key];
  $montopa = $montospa[$key];

  $sql = "INSERT INTO pasajes (fecha_pa, ot_pa, cliente, partida, llegada, monto_pa, id_rendimiento) VALUES ('$fechapa', '$otpa', '$clientepa', '$partidapa',  '$llegadapa', '$montopa', '$id_rendimiento')";

  if (!mysqli_query($conectar, $sql)) {
    echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
    exit();
  }
}

// Insertar en la tabla "gastos_sin_co"
$fechasga = $_POST['fechasga'];
$otsga = $_POST['otsga'];
$descripcionsga = $_POST['descripcionsga'];
$persona_que_autorizosga = $_POST['persona_que_autorizosga'];
$montosga = $_POST['montosga'];

foreach ($fechasga as $key => $fechaga) {
  $otga = $otsga[$key];
  $descripcionga = $descripcionsga[$key];
  $persona_que_autorizoga = $persona_que_autorizosga[$key];
  $montoga = $montosga[$key];

  $sql = "INSERT INTO gastos_sin_co (fecha_gas, ot_gas, descripcion, p_autorizo, monto_gas, id_rendimiento) VALUES ('$fechaga', '$otga', '$descripcionga', '$persona_que_autorizoga',  '$montoga', '$id_rendimiento')";

  if (!mysqli_query($conectar, $sql)) {
    echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
    exit();
  }
}

// Insertar en la tabla "por_rendir"
$fechasre = $_POST['fechasre'];
$otsre = $_POST['otsre'];
$personasre = $_POST['personasre'];
$montosre = $_POST['montosre'];


foreach ($fechasre as $key => $fechare) {
  $otre = $otsre[$key];
  $personare = $personasre[$key];
  $montore = $montosre[$key];


  $sql = "INSERT INTO por_rendir (fecha_por, ot_por, persona, monto_por,  id_rendimiento) VALUES ('$fechare', '$otre', '$personare', '$montore', '$id_rendimiento')";

  if (!mysqli_query($conectar, $sql)) {
    echo "Error al insertar en la tabla 'ingresos': " . mysqli_error($conectar);
    exit();
  }
}
header('Location: datatables.php');

exit();
?>