<?php
    session_start();
    
    include_once('../conexion.php');
    $conectar = conexion();
    
    date_default_timezone_set("America/Lima");

    $fecha = date('Y-m-d H:i:s');

    // Obtener el nombre y apellido del usuario iniciado en la sesión
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT nombre, apellido FROM usuarios WHERE usuario = '$username'";
        $result = mysqli_query($conectar, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $nombre = $row['nombre'] . ' ' . $row['apellido'];
        }
    }
    
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
    $materiales = $_POST['materiales'];
    $servicios = $_POST['servicios'];
    $cliente = isset($_POST['cliente']) ? implode(" - ", $_POST['cliente']) : "";

    $tipotrabajo = isset($_POST['tipotrabajo']) ? implode(" - ", $_POST['tipotrabajo']) : "";
    $epp = $_POST['epp'];
    $equipos = $_POST['equipos'];
    $procedimientos = $_POST['procedimientos'];
    $jefe = $_POST['jefe'];
    $riesgos = $_POST['riesgos'];
    $observaciones = $_POST['observaciones'];


    // Verificar si se subieron imágenes
    if (!empty($_FILES['imagen']['name'][0])) {
        // Guardar imágenes en la carpeta "imagenes"
        $imagenRuta = array();
        $imagenValida = true;
        foreach ($_FILES['imagen']['name'] as $key => $nombreImagen) {
            $imagenTemporal = $_FILES['imagen']['tmp_name'][$key];
            $imagenTipo = $_FILES['imagen']['type'][$key];
            if ($imagenTipo == "image/jpeg" || $imagenTipo == "image/png") {
                $imagenNombre = uniqid() . "_" . $nombreImagen;
                $imagenRuta[] = "files/" . $imagenNombre;
                move_uploaded_file($imagenTemporal, "files/" . $imagenNombre);
            } else {
                $imagenValida = false;
                break;
            }
        }

        // Si todas las imágenes son válidas, guardar sus rutas en la base de datos
        if ($imagenValida) {
            $numImagenes = count($_FILES['imagen']['name']);
            $columnasImagenes = array();
            for ($i = 1; $i <= $numImagenes; $i++) {
                $columnasImagenes[] = "imagen" . $i;
            }
            $columnasImagenesStr = implode(",", $columnasImagenes);
            $imagenesRutasStr = implode("','", $imagenRuta);
            $sql = "INSERT INTO visita_tecnica (nombre, descripcion, fecha, objetivo, area, persona, logistico, ubicacion, tiempo, trabajo, prioridad, accesibilidad, 
            disponibilidad, horario, anticorrupcion, valorizacion, negocio, alcance, mano, materiales, servicios, cliente, tipotrabajo, epp, equipos, procedimientos, jefe, riesgos, observaciones, $columnasImagenesStr) 
                    VALUES ('$nombre','$descripcion','$fecha','$objetivo','$area','$persona', '$logistico', '$ubicacion','$tiempo','$trabajo', '$prioridad', '$accesibilidad', '$disponibilidad', '$horario', '$anticorrupcion', '$valorizacion', '$negocio', '$alcance', '$mano', '$materiales', '$servicios', '$cliente', '$tipotrabajo', '$epp', '$equipos', '$procedimientos', '$jefe', '$riesgos','$observaciones', '$imagenesRutasStr')";
            $resultado = mysqli_query($conectar, $sql);
            if (!$resultado) {
                echo "Error al guardar los datos: " . mysqli_error($conectar);
            } else {
            echo "<script>setTimeout(\"location.href='form.php'\",1000)</script>";
            }
        } else {
            echo "Error: Las imágenes deben ser de tipo JPEG o PNG.";
        }
    } else {
        // Si no se subió ninguna imagen, insertar solo datos de la tabla
        $sql = "INSERT INTO visita_tecnica (nombre, descripcion, fecha, objetivo, area, persona, logistico, ubicacion, tiempo, trabajo, prioridad, accesibilidad, 
        disponibilidad, horario, anticorrupcion, valorizacion, negocio, alcance, mano, materiales, servicios, cliente, tipotrabajo, epp, equipos, procedimientos, jefe, riesgos, observaciones) 
        VALUES ('$nombre','$descripcion','$fecha','$objetivo','$area','$persona', '$logistico', '$ubicacion','$tiempo','$trabajo', '$prioridad', '$accesibilidad', '$disponibilidad', '$horario', '$anticorrupcion', '$valorizacion', '$negocio', '$alcance', '$mano', '$materiales', '$servicios', '$cliente', '$tipotrabajo', '$epp', '$equipos', '$procedimientos', '$jefe', '$riesgos','$observaciones')";
        $resultado = mysqli_query($conectar, $sql);
        if (!$resultado) {
            echo "Error al guardar los datos: " . mysqli_error($conectar);
        } else {
            echo "<script>setTimeout(\"location.href='form.php'\",1000)</script>";
        }
    }
?>