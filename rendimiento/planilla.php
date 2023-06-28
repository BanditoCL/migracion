<?php
date_default_timezone_set("America/Lima");

require '../vendor/autoload.php';
require '../conexion.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$conexion = conexion();

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('excel/Planilla_Rendimiento.xlsx');

$sheet = $spreadsheet->getSheetByName('RENDIMIENTOS');

$query = "SELECT r.responsable, r.n, CONCAT(i.entrega, ' X RENDIR') AS entrega_rendir, i.monto_ing
          FROM rendimiento r
          INNER JOIN ingresos i ON r.id = i.id_rendimiento
          ORDER BY r.responsable"; 

$result = mysqli_query($conexion, $query);

$row = 2; 

$responsableAnterior = '';

while ($row_data = mysqli_fetch_assoc($result)) {
    $responsable = strtoupper($row_data['responsable']);
    $entrega_rendir = strtoupper($row_data['entrega_rendir']);

    // Verificar si el responsable ha cambiado
    if ($responsable != $responsableAnterior) {
        $sheet->setCellValue('B' . $row, $responsable);
        $sheet->setCellValue('C' . $row, $row_data['n']);
        $sheet->setCellValue('I' . $row, 'SALDO ' . date('Y'));

        $row++; 

        $responsableAnterior = $responsable;
    }

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $row_data['n']);
    $sheet->setCellValue('I' . $row, $entrega_rendir);
    $sheet->setCellValue('M' . $row, $row_data['monto_ing']);
    
    $row++;
}

$query_facturas = "SELECT r.responsable, r.n, (SELECT SUM(f.monto_fac) FROM facturas f WHERE f.id_rendimiento = r.id) AS total_facturas
                   FROM rendimiento r
                   ORDER BY r.n";

$result_facturas = mysqli_query($conexion, $query_facturas);

while ($data_facturas = mysqli_fetch_assoc($result_facturas)) {
    $responsable = strtoupper($data_facturas['responsable']);
    $n = $data_facturas['n'];
    $total_facturas = $data_facturas['total_facturas'];

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $n);
    $sheet->setCellValue('I' . $row, 'FACTURAS');
    $sheet->setCellValue('N' . $row, $total_facturas);

    $row++;
}

$query_boletas = "SELECT r.responsable, r.n, b.monto_bo, CONCAT(b.empresa_bo, ' - BOLETA') AS empresa_boleta, b.ot_bo
                   FROM rendimiento r
                   INNER JOIN boletas b ON r.id = b.id_rendimiento";

$result_boletas = mysqli_query($conexion, $query_boletas);

while ($data_boletas = mysqli_fetch_assoc($result_boletas)) {
    $responsable = strtoupper($data_boletas['responsable']);
    $empresa_boleta = strtoupper($data_boletas['empresa_boleta']);
    $ot_bo = $data_boletas['ot_bo'];

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $data_boletas['n']);
    $sheet->setCellValue('H' . $row, $ot_bo);
    $sheet->setCellValue('I' . $row, $empresa_boleta);
    $sheet->setCellValue('N' . $row, $data_boletas['monto_bo']);

    $row++;
}

$query_pasajes = "SELECT r.responsable, r.n, CONCAT(p.cliente, ' - PASAJE') AS cliente_pasaje, p.ot_pa, p.partida, p.llegada, p.monto_pa
                  FROM rendimiento r
                  INNER JOIN pasajes p ON r.id = p.id_rendimiento";

$result_pasajes = mysqli_query($conexion, $query_pasajes);

while ($data_pasajes = mysqli_fetch_assoc($result_pasajes)) {
    $responsable = strtoupper($data_pasajes['responsable']);
    $cliente_pasaje = strtoupper($data_pasajes['cliente_pasaje']);
    $ot_pa = $data_pasajes['ot_pa'];
    $partida = strtoupper($data_pasajes['partida']);
    $llegada = strtoupper($data_pasajes['llegada']);

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $data_pasajes['n']);
    $sheet->setCellValue('H' . $row, $ot_pa);
    $sheet->setCellValue('I' . $row, $cliente_pasaje);
    $sheet->setCellValue('J' . $row, $partida);
    $sheet->setCellValue('K' . $row, $llegada);
    $sheet->setCellValue('N' . $row, $data_pasajes['monto_pa']);

    $row++;
}

$query_gastos = "SELECT r.responsable, r.n, g.ot_gas, CONCAT(g.descripcion, ' - SIN COMPROBANTE') AS descripcion_sin_comprobante, g.monto_gas
                 FROM rendimiento r
                 INNER JOIN gastos_sin_co g ON r.id = g.id_rendimiento";

$result_gastos = mysqli_query($conexion, $query_gastos);

while ($data_gastos = mysqli_fetch_assoc($result_gastos)) {
    $responsable = strtoupper($data_gastos['responsable']);
    $ot_gas = $data_gastos['ot_gas'];
    $descripcion_sin_comprobante = strtoupper($data_gastos['descripcion_sin_comprobante']);

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $data_gastos['n']);
    $sheet->setCellValue('H' . $row, $ot_gas);
    $sheet->setCellValue('I' . $row, $descripcion_sin_comprobante);
    $sheet->setCellValue('N' . $row, $data_gastos['monto_gas']);

    $row++;
}

$query_por_rendir = "SELECT r.responsable, r.n, pr.ot_por, CONCAT(pr.persona, ' POR RENDIR') AS persona_por_rendir, pr.monto_por
                     FROM rendimiento r
                     INNER JOIN por_rendir pr ON r.id = pr.id_rendimiento";

$result_por_rendir = mysqli_query($conexion, $query_por_rendir);

while ($data_por_rendir = mysqli_fetch_assoc($result_por_rendir)) {
    $responsable = strtoupper($data_por_rendir['responsable']);
    $ot_por = $data_por_rendir['ot_por'];
    $persona_por_rendir = strtoupper($data_por_rendir['persona_por_rendir']);

    $sheet->setCellValue('B' . $row, $responsable);
    $sheet->setCellValue('C' . $row, $data_por_rendir['n']);
    $sheet->setCellValue('H' . $row, $ot_por);
    $sheet->setCellValue('I' . $row, $persona_por_rendir);
    $sheet->setCellValue('M' . $row, $data_por_rendir['monto_por']);

    $row++;
}

$resumenSheet = $spreadsheet->getSheetByName('RESUMEN');
$query = "SELECT responsable FROM rendimiento";
$result = mysqli_query($conexion, $query);

$row = 2;

$nombreInsertado = array();

while ($row_data = mysqli_fetch_assoc($result)) {
    $responsable = strtoupper($row_data['responsable']);

    if (!in_array($responsable, $nombreInsertado)) {
        $resumenSheet->setCellValue('B' . $row, $responsable);

        $nombreInsertado[] = $responsable;

        $row++;
    }
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
$filename = 'Rendimientos_' . date('Y-m-d_H-i-s') . '.xlsx';
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;