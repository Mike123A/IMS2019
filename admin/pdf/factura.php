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
    // $this->SetXY(70, 1);
    // $this->Cell(60,10,'Factura',0,0,'C');
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

$clave = $_GET['clave'];

require('../php/conexion.php');
//DATOS DE CABECERA
$sql = "SELECT * FROM ventas WHERE idVenta = $clave ;";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}
$fila = $resultado->fetch_assoc();
$Usuario = $fila['idCliente'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->SetXY(155, 10);
$pdf->MultiCell(50,6,"No. Venta: ".$fila['idVenta'],0,"L");
$pdf->SetXY(155, 17);
$pdf->MultiCell(50,6,"Fecha: ".$fila['FechaVenta'],0,"L");
$pdf->SetFont('Arial','B',9);

$pdf->SetXY(10, 25);
$pdf->MultiCell(80,6,"INNOVATIVE MEDICAL SOLUTIONS S.R.L.",0,"L");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(90,6,utf8_decode("Calle 28 x 19 y 17 #519 Col.Maya, Mérida, Yucatan"),0,"L");
$pdf->MultiCell(50,6,"SoporteIMS@outlook.com:",0,"L");
$pdf->MultiCell(50,6,"9 43 43 00",0,"L");
$pdf->MultiCell(50,6,"",0,"L");
$pdf->SetFont('Arial','B',9);

//DATOS DE CLIENTE
$sql = "SELECT * FROM cat_clientes WHERE idUsuario = $Usuario ;";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}
$fila1 = $resultado->fetch_assoc();

$pdf->MultiCell(50,6,"Cliente",0,"L");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(80,6,$fila1['NombreCli']." ".$fila1['Apellido1Cli']." ".$fila1['Apellido2Cli'],0,"L");
$pdf->MultiCell(80,6,"Correo: ".$fila1['CorreoCli'],0,"L");
$pdf->MultiCell(80,6,"Telefono:".$fila1['TelefonoCli'],0,"L");
$pdf->MultiCell(100,6,"Direccion:".$fila1['DireccionCli'],0,"L");
$pdf->MultiCell(80,6,"RFC:".$fila1['RFC'],0,"L");


$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(66,99,99);
$pdf->SetFillColor(66,99,99);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(20,10,utf8_decode(''),0,1,'C');

$pdf->Cell(20,10,utf8_decode('Cantidad'),1,0,'C',True);
$pdf->Cell(110,10,utf8_decode('Descripcion'),1,0,'C',True);
$pdf->Cell(30,10,utf8_decode('Precio unitario'),1,0,'C',True);
$pdf->Cell(30,10,utf8_decode('Importe'),1,1,'C',True);

$pdf->SetFont('Arial','',10);

//DATOS DE DETALLE DE VENTAS
$sql = "SELECT * FROM detalle_venta dv INNER JOIN cat_productos cp ON dv.idProducto = cp.idProducto where dv.idVenta = $clave ;";

if(!$resultado = $conexion->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
}
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(130,155,155);

while($fila2 = $resultado->fetch_assoc()){
    $pdf->Cell(20,10,utf8_decode($fila2['Cantidad']),1,0,'C',True);
    $pdf->Cell(110,10,utf8_decode($fila2['NombreProd']),1,0,'C',True);
    $pdf->Cell(30,10,utf8_decode($fila2['Precio']),1,0,'C',True);
	$pdf->Cell(30,10,utf8_decode($fila2['Precio']*$fila2['Cantidad']),1,1,'C',True);
}

$pdf->SetX(140);
$pdf->Cell(30,10,'Subtotal',1,0,'C',True);

$pdf->Cell(30,10,round(($fila['totalVenta']*.84) * 100) / 100,1,1,'C',True);
$pdf->SetX(140);
$pdf->Cell(30,10,'IVA %16',1,0,'C',True);
$pdf->Cell(30,10,round(($fila['totalVenta']*.16) * 100) / 100,1,1,'C',True);
$pdf->SetX(140);
$pdf->Cell(30,10,'Total',1,0,'C',True);
$pdf->Cell(30,10,$fila['totalVenta'],1,1,'C',True);





$pdf->Output();
?>