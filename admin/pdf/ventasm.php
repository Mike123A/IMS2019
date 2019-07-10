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
    $this->Cell(60,10,'Ventas mostrador',0,0,'C');
    $this->Ln(20);
}

// Pie de página
function Footer()
{
// 	Tel. 9 43 43 00
// SoporteIMS@outlook.com
// C. 28 x 19 y 17 519 
// Col. Maya, Mérida, Yucatan
    $this->SetTextColor(66,99,99);

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
$fecha1 = $_POST ['finicio'];
$fecha2 = $_POST ['ffin'];
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
//DATOS DE DETALLE DE VENTAS
require('../php/conexion.php');

$sql = "SELECT v.idVenta,v.FechaVenta,ci.NombreCli,ci.Apellido1Cli,ci.Apellido2Cli, ce.NombresEmp,ce.Apellido1Emp,ce.Apellido2Emp, v.totalVenta, cev.EstadoVenta FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario INNER JOIN cat_empleados ce ON v.idEmpleado = ce.idEmpleado INNER JOIN cat_estadosventa cev ON v.idestadoVenta = cev.idEstadoVenta WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' ORDER BY idVenta ASC";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}


$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(66,99,99);
$pdf->SetFillColor(66,99,99);

$pdf->Cell(15,10,utf8_decode('Clave'),1,0,'C',True);
$pdf->Cell(20,10,utf8_decode('Fecha'),1,0,'C',True);
$pdf->Cell(55,10,utf8_decode('Cliente'),1,0,'C',True);
$pdf->Cell(55,10,utf8_decode('Empleado'),1,0,'C',True);
$pdf->Cell(20,10,utf8_decode('Importe'),1,0,'C',True);
$pdf->Cell(25,10,utf8_decode('Etapa'),1,1,'C',True);

$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(130,155,155);

$pdf->SetFont('Arial','',8);

while($fila2 = $resultado->fetch_assoc()){
    $pdf->Cell(15,10,utf8_decode($fila2['idVenta']),1,0,'C',True);
    $pdf->Cell(20,10,utf8_decode($fila2['FechaVenta']),1,0,'C',True);
    $pdf->Cell(55,10,utf8_decode($fila2['NombreCli']." ".$fila2['Apellido1Cli']." ".$fila2['Apellido2Cli']),1,0,'C',True);
    $pdf->Cell(55,10,utf8_decode($fila2['NombresEmp']." ".$fila2['Apellido1Emp']." ".$fila2['Apellido2Emp']),1,0,'C',True);
    $pdf->Cell(20,10,utf8_decode($fila2['totalVenta']),1,0,'C',True);
    $pdf->Cell(25,10,utf8_decode($fila2['EstadoVenta']),1,1,'C',True);
}



$pdf->Output();
?>