<?php
    date_default_timezone_set("America/Lima");
    
    require '../vendor/autoload.php';
    require '../conexion.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

    // Conexión a la base de datos
    $conexion = conexion();

    // Consulta a la tabla "rendimiento" para obtener los datos
    $idUser = $_REQUEST['id'];
    $query = "SELECT * FROM rendimiento where id='$idUser'";
    $resultado = $conexion->query($query);

    // Carga el archivo Excel existente en un objeto Spreadsheet
    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load('excel/Formato_rendimiento.xlsx');

    $hojaActiva = $spreadsheet->getActiveSheet();

    $filaRendimiento = $resultado->fetch_assoc();

    $hojaActiva->setCellValue('D2' , $filaRendimiento['responsable']);
    $hojaActiva->setCellValue('G2' , $filaRendimiento['fecha_gene']);
    $hojaActiva->setCellValue('I2' , $filaRendimiento['n']);
    $hojaActiva->setCellValue('B57' , $filaRendimiento['n_observaciones']);

    $query = "SELECT * FROM ingresos WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaIngreso = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B6', $filaIngreso['fecha_ing']);
    $hojaActiva->setCellValue('C6', $filaIngreso['entrega']);
    $hojaActiva->setCellValue('H6', $filaIngreso['monto_ing']);

    $fila = 7;
    while (($filaIngreso = $resultadoIngresos->fetch_assoc()) && $fila < 10) {
        $hojaActiva->setCellValue('B'.$fila, $filaIngreso['fecha_ing']);
        $hojaActiva->setCellValue('C'.$fila, $filaIngreso['entrega']);
        $hojaActiva->setCellValue('H'.$fila, $filaIngreso['monto_ing']);
        $fila++;
    }

    $query = "SELECT * FROM facturas WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaFactura = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B15', $filaFactura['fecha_fac']);
    $hojaActiva->setCellValue('C15', $filaFactura['ot_fac']);
    $hojaActiva->setCellValue('D15', $filaFactura['empresa_fac']);
    $hojaActiva->setCellValue('G15', $filaFactura['comprobante_fac']);
    $hojaActiva->setCellValue('I15', $filaFactura['monto_fac']);

    $fila = 16;
    while (($filaFactura = $resultadoIngresos->fetch_assoc()) && $fila < 23) {
        $hojaActiva->setCellValue('B'.$fila, $filaFactura['fecha_fac']);
        $hojaActiva->setCellValue('C'.$fila, $filaFactura['ot_fac']);
        $hojaActiva->setCellValue('D'.$fila, $filaFactura['empresa_fac']);
        $hojaActiva->setCellValue('G'.$fila, $filaFactura['comprobante_fac']);
        $hojaActiva->setCellValue('I'.$fila, $filaFactura['monto_fac']);
        $fila++;
    }

    $query = "SELECT * FROM boletas WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaBoleta = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B25', $filaBoleta['fecha_bo']);
    $hojaActiva->setCellValue('C25', $filaBoleta['ot_bo']);
    $hojaActiva->setCellValue('D25', $filaBoleta['empresa_bo']);
    $hojaActiva->setCellValue('G25', $filaBoleta['comprobante_bo']);
    $hojaActiva->setCellValue('I25', $filaBoleta['monto_bo']);

    $fila = 26;
    while (($filaBoleta = $resultadoIngresos->fetch_assoc()) && $fila < 29) {
        $hojaActiva->setCellValue('B'.$fila, $filaBoleta['fecha_bo']);
        $hojaActiva->setCellValue('C'.$fila, $filaBoleta['ot_bo']);
        $hojaActiva->setCellValue('D'.$fila, $filaBoleta['empresa_bo']);
        $hojaActiva->setCellValue('G'.$fila, $filaBoleta['comprobante_bo']);
        $hojaActiva->setCellValue('I'.$fila, $filaBoleta['monto_bo']);
        $fila++;
    }

    $query = "SELECT * FROM pasajes WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaPasaje = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B31', $filaPasaje['fecha_pa']);
    $hojaActiva->setCellValue('C31', $filaPasaje['ot_pa']);
    $hojaActiva->setCellValue('D31', $filaPasaje['cliente']);
    $hojaActiva->setCellValue('E31', $filaPasaje['partida']);
    $hojaActiva->setCellValue('G31', $filaPasaje['llegada']);
    $hojaActiva->setCellValue('I31', $filaPasaje['monto_pa']);

    $fila = 32;
    while (($filaPasaje = $resultadoIngresos->fetch_assoc()) && $fila < 40) {
        $hojaActiva->setCellValue('B'.$fila, $filaPasaje['fecha_pa']);
        $hojaActiva->setCellValue('C'.$fila, $filaPasaje['ot_pa']);
        $hojaActiva->setCellValue('D'.$fila, $filaPasaje['cliente']);
        $hojaActiva->setCellValue('E'.$fila, $filaPasaje['partida']);
        $hojaActiva->setCellValue('G'.$fila, $filaPasaje['llegada']);
        $hojaActiva->setCellValue('I'.$fila, $filaPasaje['monto_pa']);
        $fila++;
    }

    $query = "SELECT * FROM gastos_sin_co WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaGastos_sin_co = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B42', $filaGastos_sin_co['fecha_gas']);
    $hojaActiva->setCellValue('C42', $filaGastos_sin_co['ot_gas']);
    $hojaActiva->setCellValue('D42', $filaGastos_sin_co['descripcion']);
    $hojaActiva->setCellValue('G42', $filaGastos_sin_co['p_autorizo']);
    $hojaActiva->setCellValue('I42', $filaGastos_sin_co['monto_gas']);

    $fila = 43;
    while (($filaGastos_sin_co = $resultadoIngresos->fetch_assoc()) && $fila <= 44) {
        $hojaActiva->setCellValue('B'.$fila, $filaGastos_sin_co['fecha_gas']);
        $hojaActiva->setCellValue('C'.$fila, $filaGastos_sin_co['ot_gas']);
        $hojaActiva->setCellValue('D'.$fila, $filaGastos_sin_co['descripcion']);
        $hojaActiva->setCellValue('G'.$fila, $filaGastos_sin_co['p_autorizo']);
        $hojaActiva->setCellValue('I'.$fila, $filaGastos_sin_co['monto_gas']);
        $fila++;
    }

    $query = "SELECT * FROM por_rendir WHERE id_rendimiento = ".$filaRendimiento['id'];
    $resultadoIngresos = $conexion->query($query);
    $filaPor_rendir = $resultadoIngresos->fetch_assoc();

    $hojaActiva->setCellValue('B47', $filaPor_rendir['fecha_por']);
    $hojaActiva->setCellValue('C47', $filaPor_rendir['ot_por']);
    $hojaActiva->setCellValue('D47', $filaPor_rendir['persona']);
    $hojaActiva->setCellValue('I47', $filaPor_rendir['monto_por']);

    $fila = 48;
    while (($filaPor_rendir = $resultadoIngresos->fetch_assoc()) && $fila < 49) {
        $hojaActiva->setCellValue('B'.$fila, $filaPor_rendir['fecha_por']);
        $hojaActiva->setCellValue('C'.$fila, $filaPor_rendir['ot_por']);
        $hojaActiva->setCellValue('D'.$fila, $filaPor_rendir['persona']);
        $hojaActiva->setCellValue('I'.$fila, $filaPor_rendir['monto_por']);
        $fila++;
    }

    // Crea un objeto Writer para archivos Xlsx
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

    // Establece los encabezados HTTP para que el archivo se descargue
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $filename = 'Rendimiento_' . date('Y-m-d_H-i-s') . '.xlsx';
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Escribe el archivo Excel en el buffer de salida
    $writer->save('php://output');
    exit;
?>