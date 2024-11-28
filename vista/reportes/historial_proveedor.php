<?php

require_once ('../../config/ConfigServer.php');
require_once ('../../modelo/modeloPrincipal.php');

date_default_timezone_set('America/caracas');
	
# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(5,5,5);
$pdf->AddPage('P',[420,497],0);

# Logo de la empresa formato png #
$pdf->Image('./img/logo.png',320,12,55,55,'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial','B',16);
$pdf->SetDrawColor(255,255,255);
$pdf->SetTextColor(255,255,255);
$pdf->SetY(10);
$pdf->Cell(400,10,utf8_decode(". "),0,1,'C');

$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(400,10,utf8_decode("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,'C');

$pdf->SetFont('Arial','',16);
$pdf->Cell(410,7,utf8_decode("PISTA DE BAILE Y MESA DE POOL"),0,1, 'C');

$pdf->Cell(410,7,utf8_decode("RIF: V-04608675-5"),0,1,'C');

$pdf->Cell(410,7,utf8_decode("Calle 2 entre Av 5 y 6 - Turén Edo. Portuguesa"),0,1,'C');

$pdf->Ln(5);
$pdf->Cell(410,7,utf8_decode("Historial de Proveedor"),0,1,'C');

$pdf->Ln(15);

if (!isset($_POST['id_proveedor'])){
    $pdf->SetFont('Arial','',10);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0);
    
    $pdf->setX(15);
    
    $pdf->Cell(20,8, utf8_decode("Nº"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRODUCTO"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRESENTACIÓN"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("CATEGORÍA"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN $"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN BS"),'B',0,'C',0);
    $pdf->Cell(40,8, utf8_decode("TASA REGISTRADA"),'B',0,'C',0);
    $pdf->Cell(40,8 , utf8_decode("CANTIDAD COMPRADA"),'B',0,'C',0);
    $pdf->Cell(40,8, utf8_decode("FECHA / HORA"),'B',1,'C',0);
    $pdf->setX(15);
    $pdf->SetFont('Arial','',16);
    
    $pdf->Cell(390, 10, utf8_decode('No se selecciono a un proveedor, asegurese de haber seleccionado uno correctamente.'),'B',1,'C',0);
    
    $pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);
}

$id_proveedor = $_POST['id_proveedor'];

$nombre_proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT cedula_rif, nombre, telefono,correo,
    direccion FROM proveedor WHERE id_proveedor = $id_proveedor"));


$pdf->SetFont('Arial','',14);

$pdf->setX(25);
$pdf->Cell(8,7,utf8_decode("Cédula / RIF: ".mb_strtoupper($nombre_proveedor["cedula_rif"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(13,7,utf8_decode("Nombre: ".mb_strtoupper($nombre_proveedor["nombre"])),0,1, 'L');

$pdf->setX(25);
$pdf->Cell(7,7,utf8_decode("Correo: ".mb_strtoupper($nombre_proveedor["correo"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(7,7,utf8_decode("Dirección: ".mb_strtoupper($nombre_proveedor["direccion"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(7,7,utf8_decode("Teléfono: ".mb_strtoupper($nombre_proveedor["telefono"])),0,1,'L');

$pdf->Ln(10);



$consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_compra_dolar,
    P.precio_compra_bs, ROUND(P.precio_compra_bs / P.precio_compra_dolar,2 ) AS tasa, D.dolar, PROV.id_proveedor, PROV.nombre ,
    PS.nombre AS nombre_presentacion, E.stock_comprado, E.fecha_entrada, C.nombre AS nombre_categoria FROM entrada AS E 
    INNER JOIN producto AS P ON P.id_producto = E.id_producto 
    INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
    INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
    WHERE PROV.id_proveedor = $id_proveedor ORDER BY E.fecha_entrada DESC");

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->SetFont('Arial','',10);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0);
    
    $pdf->setX(15);
    
    $pdf->Cell(20,8, utf8_decode("Nº"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRODUCTO"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRESENTACIÓN"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("CATEGORÍA"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN $"),'B',0,'C',0);
    $pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN BS"),'B',0,'C',0);
    $pdf->Cell(40,8, utf8_decode("TASA REGISTRADA"),'B',0,'C',0);
    $pdf->Cell(40,8 , utf8_decode("CANTIDAD COMPRADA"),'B',0,'C',0);
    $pdf->Cell(40,8, utf8_decode("FECHA / HORA"),'B',1,'C',0);
    $pdf->setX(15);
    
    $pdf->Cell(390, 8, utf8_decode('No se encontraron registros de este proveedor, asegurese de haber registrado una compra a este mismo.'),'B',1,'C',0);
    
    $pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);
}


# Tabla de productos #
$pdf->SetFont('Arial','', 10);

$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);

$pdf->setX(15);

$pdf->Cell(20,8, utf8_decode("Nº"),'B',0,'C',0);
$pdf->Cell(50,8, utf8_decode("PRODUCTO"),'B',0,'C',0);
$pdf->Cell(50,8, utf8_decode("PRESENTACIÓN"),'B',0,'C',0);
$pdf->Cell(40,8 , utf8_decode("CANTIDAD COMPRADA"),'B',0,'C',0);
$pdf->Cell(50,8, utf8_decode("CATEGORÍA"),'B',0,'C',0);
$pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN $"),'B',0,'C',0);
$pdf->Cell(50,8, utf8_decode("PRECIO DE COMPRA EN BS"),'B',0,'C',0);
$pdf->Cell(40,8, utf8_decode("TASA REGISTRADA"),'B',0,'C',0);
$pdf->Cell(40,8, utf8_decode("FECHA / HORA"),'B',0,'C',0);

$pdf->Ln(8);



    
    
$i = 1;

while ( $row = mysqli_fetch_array($consulta)) { 
    $pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(39,39,51);
    $pdf->setX(15);
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(20,8 , utf8_decode($i++),'B',0,'C',0);
	$pdf->Cell(50,8, utf8_decode($row['nombre_producto']),'B',0,'C',0);
	$pdf->Cell(50,8, utf8_decode($row['nombre_presentacion']),'B',0,'C',0);
	$pdf->Cell(40,8, utf8_decode($row['stock_comprado']),'B',0,'C',0);
	$pdf->Cell(50,8, utf8_decode($row['nombre_categoria']),'B',0,'C',0);
	$pdf->Cell(50,8, utf8_decode($row['precio_compra_dolar']." $"),'B',0,'C',0);
	$pdf->Cell(50,8, utf8_decode($row['precio_compra_bs']." bs"),'B',0,'C',0);
	$pdf->Cell(40,8, utf8_decode($row['tasa'].' bs'),'B',0,'C',0);
	$pdf->Cell(40,8, utf8_decode(DATE('Y-m-d / h:i:A', strtotime($row['fecha_entrada']))),'B',1,'C',0);
}

    $pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/
	# Nombre del archivo PDF #
	$pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);