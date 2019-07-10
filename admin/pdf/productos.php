<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    $this->Image('../img/LogoConNombre.png',10,5,40);
    $this->SetTextColor(66,99,99);

    $this->Ln(10);
    $this->Cell(65);
    $this->SetFont('Arial','B',15);
    $this->SetXY(70, 15);
    $this->Cell(60,10,'Lista de productos',0,0,'C');
    $this->Ln(20);
}

// Pie de página
function Footer()
{
// 	Tel. 9 43 43 00
// SoporteIMS@outlook.com
// C. 28 x 19 y 17 519 
// Col. Maya, Mérida, Yucatan
    $this->SetY(-22);
	$this->SetFont('Arial','',7);
    $this->Cell(140);
    $this->Cell(70,5,'Tel. 9 43 43 00',0,0,'C');
    $this->ln();
    $this->Cell(140);
    $this->Cell(70,5,'SoporteIMS@outlook.com',0,0,'C');
    $this->ln();
    $this->Cell(140);
    $this->Cell(70,5,'C. 28 x 19 y 17 519',0,0,'C');
    $this->ln();
    $this->Cell(140);
    $this->Cell(70,5,utf8_decode('Col. Maya, Mérida, Yucatan'),0,0,'C');
    $this->ln();

    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
//DATOS DE DETALLE DE VENTAS
require('../php/conexion.php');

$sql = "SELECT * FROM cat_productos ORDER BY idProducto ASC";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}

$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(66,99,99);
$pdf->SetFillColor(66,99,99);

$pdf->Cell(25,10,utf8_decode('Clave'),1,0,'C',True);
$pdf->Cell(90,10,utf8_decode('Producto'),1,0,'C',True);
$pdf->Cell(25,10,utf8_decode('Precio'),1,0,'C',True);
$pdf->Cell(25,10,utf8_decode('Stock'),1,0,'C',True);
$pdf->Cell(25,10,utf8_decode('Estado'),1,1,'C',True);

$pdf->SetFont('Arial','',8);

$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(130,155,155);



while($fila2 = $resultado->fetch_assoc()){
    $pdf->Cell(25,10,utf8_decode($fila2['idProducto']),1,0,'C',True);
    $pdf->Cell(90,10,utf8_decode($fila2['NombreProd']),1,0,'C',True);
    $pdf->Cell(25,10,utf8_decode($fila2['PrecioProd']),1,0,'C',True);
    $pdf->Cell(25,10,utf8_decode($fila2['StockProd']),1,0,'C',True);
    $pdf->Cell(25,10,utf8_decode($fila2['estado']),1,1,'C',True);
}



$pdf->Output();
?>