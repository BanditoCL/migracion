<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit;
}

require_once("../conexion.php");
$conectar = conexion();

date_default_timezone_set("America/Lima");

// Obtener el ID del rendimiento a actualizar
$id_rendimiento = $_POST['id_rendimiento'];

// Actualizar la tabla "rendimiento"
$observaciones = $_POST['observaciones'];

$sql = "UPDATE rendimiento SET n_observaciones = '$observaciones' WHERE id = '$id_rendimiento'";

if (!mysqli_query($conectar, $sql)) {
    echo "Error al actualizar en la tabla 'rendimiento': " . mysqli_error($conectar);
    exit();
}

// Actualizar la tabla "ingresos"
$fechas = $_POST['fechas'];
$entregas = $_POST['entregas'];
$montos = $_POST['montos'];

foreach ($fechas as $key => $fecha) {
    $entrega = $entregas[$key];
    $monto = $montos[$key];

    $sql = "UPDATE ingresos SET entrega = '$entrega', monto_ing = '$monto' WHERE id_rendimiento = '$id_rendimiento' AND fecha_ing = '$fecha'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'ingresos': " . mysqli_error($conectar);
        exit();
    }
}
// Actualizar la tabla "facturas"
$fechasfac = $_POST['fechasfac'];
$otsfac = $_POST['otsfac'];
$empresasfac = $_POST['empresasfac'];
$comprobantesfac = $_POST['comprobantesfac'];
$montosfac = $_POST['montosfac'];
$rutasfac = $_POST['rutasfac'];
$nuevasimagensfac = $_FILES['nuevasimagensfac'];

foreach ($fechasfac as $key => $fechafac) {
    $otfac = $otsfac[$key];
    $empresafac = $empresasfac[$key];
    $comprobantefac = $comprobantesfac[$key];
    $montofac = $montosfac[$key];

    // Verificar si se ha seleccionado un archivo nuevo
    if (isset($nuevasimagensfac['size'][$key]) && $nuevasimagensfac['size'][$key] > 0) {
        // Código para manejar un archivo nuevo (como lo has implementado actualmente)
        $imagensfac = $nuevasimagensfac['name'][$key];
        $tmp_name = $nuevasimagensfac['tmp_name'][$key];
        $extension = pathinfo($imagensfac, PATHINFO_EXTENSION);

        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $ruta = "files/" . $imagensfac;
            move_uploaded_file($tmp_name, $ruta);
        } else {
            echo "La imagen debe tener formato JPEG o PNG";
            exit();
        }
    } else {
        // No se ha seleccionado un archivo nuevo, utiliza la ruta existente
        if (!empty($rutasfac[$key])) {
            $ruta = $rutasfac[$key];
        } else {
            // Si no se encuentra la ruta existente en el array, asigna una ruta predeterminada o deja la variable $ruta vacía según tus necesidades
            $ruta = ""; // Puedes asignar una ruta predeterminada aquí o dejarla vacía
        }
    }

    $sql = "UPDATE facturas SET ot_fac = '$otfac', empresa_fac = '$empresafac', comprobante_fac = '$comprobantefac', monto_fac = '$montofac', imagen = '$ruta' WHERE id_rendimiento = '$id_rendimiento' AND fecha_fac = '$fechafac'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'facturas': " . mysqli_error($conectar);
        exit();
    }
}

// Actualizar la tabla "boletas"
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

    $sql = "UPDATE boletas SET ot_bo = '$otbo', empresa_bo = '$empresabo', comprobante_bo = '$comprobantebo', monto_bo = '$montobo' WHERE id_rendimiento = '$id_rendimiento' AND fecha_bo = '$fechabo'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'boletas': " . mysqli_error($conectar);
        exit();
    }
}

// Actualizar la tabla "pasajes"
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

    $sql = "UPDATE pasajes SET ot_pa = '$otpa', cliente = '$clientepa', partida = '$partidapa', llegada = '$llegadapa', monto_pa = '$montopa' WHERE id_rendimiento = '$id_rendimiento' AND fecha_pa = '$fechapa'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'pasajes': " . mysqli_error($conectar);
        exit();
    }
}

// Actualizar la tabla "gastos_sin_co"
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

    $sql = "UPDATE gastos_sin_co SET ot_gas = '$otga', descripcion = '$descripcionga', p_autorizo = '$persona_que_autorizoga', monto_gas = '$montoga' WHERE id_rendimiento = '$id_rendimiento' AND fecha_gas = '$fechaga'";

    if (!mysqli_query($conectar, $sql)) {
        echo "Error al actualizar en la tabla 'gastos_sin_co': " . mysqli_error($conectar);
        exit();
    }
}

mysqli_close($conectar);

echo "<script>alert('Actualizado con Exito') </script>";
echo "<script>setTimeout(\"location.href='datatables.php'\",1000)</script>";
?>
