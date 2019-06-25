<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    $this->Image('../img/LogoConNombre.png',10,5,40);

    $this->Ln(10);
    $this->Cell(65);
    $this->SetFont('Arial','B',15);
    $this->SetXY(70, 15);
    $this->Cell(60,10,'Clientes',0,0,'C');
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

$sql = "SELECT * FROM cat_clientes ORDER BY idCliente ASC";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}



$pdf->Cell(20,10,utf8_decode('Clave'),1,0,'C');
$pdf->Cell(55,10,utf8_decode('Cliente'),1,0,'C');
$pdf->Cell(65,10,utf8_decode('Direccion'),1,0,'C');
$pdf->Cell(25,10,utf8_decode('Telefono'),1,0,'C');
$pdf->Cell(25,10,utf8_decode('RFC'),1,1,'C');

$pdf->SetFont('Arial','',8);





while($fila2 = $resultado->fetch_assoc()){
    $pdf->Cell(20,10,utf8_decode($fila2['idCliente']),1,0,'C');
    $pdf->Cell(55,10,utf8_decode($fila2['NombreCli']." ".$fila2['Apellido1Cli']." ".$fila2['Apellido2Cli']),1,0,'C');
    $pdf->Cell(65,10,utf8_decode($fila2['DireccionCli']),1,0,'C');
    $pdf->Cell(25,10,utf8_decode($fila2['TelefonoCli']),1,0,'C');
    $pdf->Cell(25,10,utf8_decode($fila2['RFC']),1,1,'C');
}



$pdf->Output();
?>