<?php
require '../vendor/autoload.php';
require '../conexion.php';

use setasign\Fpdi\Tcpdf\Fpdi;

$conexion = conexion();

$idUser = $_REQUEST['id'];
$query = "SELECT `rendimiento`.`id`, `facturas`.`imagen`
FROM `rendimiento` 
    LEFT JOIN `facturas` ON `facturas`.`id_rendimiento` = `rendimiento`.`id`
WHERE `rendimiento`.`id` = '$idUser';";
$resultado = mysqli_query($conexion, $query);

$imagenes = array();

while ($fila = mysqli_fetch_array($resultado)) {
    $imagenes[] = $fila['imagen'];
}

$pdf = new Fpdi();

$pdf->SetCreator('MetalRaid');
$pdf->SetTitle('Facturas');

$pdf->SetPrintHeader(false);
$pdf->setPrintFooter(false);

foreach ($imagenes as $imagen) {
    $pdf->AddPage();

    $pdf->Image($imagen, 15, 50, $pdf->GetPageWidth() * 0.8, 0, '', '', '', false, 300, '', false, false, 1, false, false, false);
    // En lugar de valores absolutos (180, 180), usamos el ancho de página multiplicado por 0.8 para el ancho y 0 para la altura.
    // Los otros parámetros están establecidos para mantener el aspecto original de la imagen.

}

$pdf->Output('facturas.pdf', 'D');
