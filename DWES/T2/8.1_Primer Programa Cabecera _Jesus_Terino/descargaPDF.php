<?php
require 'vendor/autoload.php';
use FPDF\FPDF;

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="archivo.pdf"');
$filename = "mi_archivo.txt";
readfile($filename);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '¡Hola, este es un PDF generado dinámicamente!');
$pdf->Output('archivo.pdf', 'D'); // 'D' fuerza la descarga
exit;

?>
