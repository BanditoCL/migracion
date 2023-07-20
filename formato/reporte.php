<?php

    require '../vendor/autoload.php';
    require '../conexion.php';

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

    $conexion = conexion();

    $idUser = $_REQUEST['id'];
    $query = "SELECT * FROM visita_tecnica WHERE id = $idUser;";
    $resultado = $conexion->query($query);
   
    // Carga el archivo Excel existente en un objeto Spreadsheet
    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load('excel/Visita_Tecnica.xlsx');

    $hojaActiva = $spreadsheet->getActiveSheet();

    $rows = $resultado->fetch_assoc();
 
        $hojaActiva->setCellValue('B8', 'N° '.$rows['id']);

        $hojaActiva->setCellValue('B9', $rows['nombre']);
        $hojaActiva->setCellValue('B10', $rows['fecha']);

        $hojaActiva->setCellValue('B12', $rows['descripcion']);
        $hojaActiva->setCellValue('B13', $rows['objetivo']);
        $hojaActiva->setCellValue('B14', $rows['area']);
        $hojaActiva->setCellValue('B15', $rows['persona']);
        $hojaActiva->setCellValue('B16', $rows['logistico']);
        $hojaActiva->setCellValue('B17', $rows['ubicacion']);
        $hojaActiva->setCellValue('B18', $rows['tiempo']);
        $hojaActiva->setCellValue('B19', $rows['trabajo']);
        $hojaActiva->setCellValue('B20', $rows['prioridad']);
        $hojaActiva->setCellValue('B21', $rows['accesibilidad']);
        $hojaActiva->setCellValue('B22', $rows['disponibilidad']);
        $hojaActiva->setCellValue('B23', $rows['horario']);
        $hojaActiva->setCellValue('B24', $rows['anticorrupcion']);
        $hojaActiva->setCellValue('B25', $rows['valorizacion']);

        $hojaActiva->setCellValue('B27', $rows['negocio']);
        $hojaActiva->setCellValue('B28', $rows['alcance']);
        $hojaActiva->setCellValue('B29', $rows['mano'] ." - ".$rows['mano_certificacion']." - ".$rows['mano_empresa']);
        $hojaActiva->setCellValue('B30', $rows['materiales']);    
        $hojaActiva->setCellValue('B31', $rows['servicios']);
        $hojaActiva->setCellValue('B32', $rows['cliente']." - ".$rows['cliente_estacionamiento']." - ".$rows['cliente_electrica']." - ".$rows['cliente_aire']." - ".$rows['cliente_otros']);

        $hojaActiva->setCellValue('B34', $rows['tipotrabajo']);
        $hojaActiva->setCellValue('B35', $rows['epp']);
        $hojaActiva->setCellValue('B36', $rows['equipos']);
        $hojaActiva->setCellValue('B37', $rows['procedimientos']);
        $hojaActiva->setCellValue('B38', $rows['jefe']);
        $hojaActiva->setCellValue('B39', $rows['riesgos']);
        $hojaActiva->setCellValue('B40', $rows['observaciones']);
        
        $anchoMaximo = 1030;
        $altoMaximo = 900;
        $imagen_fila = 42;
        
        // Recorrer las columnas imagen1 a imagen10
        for ($i = 1; $i <= 10; $i++) {
            $columnaImagen = 'imagen' . $i;
        
            // Obtener la ruta de la imagen almacenada en la columna correspondiente
            $rutaImagen = $rows[$columnaImagen];
        
            // Si la ruta no está vacía, agregar la imagen a la hoja de cálculo
            if (!empty($rutaImagen)) {
                // Combinar la ruta de la imagen con el directorio actual
                $rutaAbsolutaImagen = getcwd() . '/' . $rutaImagen;
        
                // Verificar si la extensión de la imagen es válida
                $extension = strtolower(pathinfo($rutaAbsolutaImagen, PATHINFO_EXTENSION));
                if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                    continue;
                }
        
                // Agregar la imagen a la hoja de cálculo
                $drawing = new Drawing();
                $drawing->setPath($rutaAbsolutaImagen);
                $drawing->setCoordinates('A' . $imagen_fila);
                $drawing->setWorksheet($hojaActiva);
        
                // Obtener las dimensiones originales de la imagen
                $dimensiones = getimagesize($rutaAbsolutaImagen);
                $anchoImagen = $dimensiones[0];
                $altoImagen = $dimensiones[1];
        
                // Si la imagen es más grande que el ancho o alto máximo, ajustar su tamaño manteniendo la proporción
                if ($anchoImagen > $anchoMaximo || $altoImagen > $altoMaximo) {
                    $factorReduccionAncho = $anchoMaximo / $anchoImagen;
                    $factorReduccionAlto = $altoMaximo / $altoImagen;
                    $factorReduccion = min($factorReduccionAncho, $factorReduccionAlto);
                    $anchoImagen = $anchoImagen * $factorReduccion;
                    $altoImagen = $altoImagen * $factorReduccion;
                }
        
                $drawing->setWidth($anchoImagen);
                $drawing->setHeight($altoImagen);
        
                // Incrementar la fila para la próxima imagen
                $imagen_fila += ceil($altoImagen / 20) + 1;
            }
        }

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');    

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Visita Técnica.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer->save('php://output');
    exit;

?>