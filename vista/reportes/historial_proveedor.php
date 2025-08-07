<?php

require_once ('../../modelo/modeloPrincipal.php');

date_default_timezone_set('America/caracas');
	
# Incluyendo librerias necesarias #
require "./code128.php";

function convert_codification ($cadena):string {
    return mb_convert_encoding("$cadena", 'ISO-8859-1', 'UTF-8');
}

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(5,5,5);
$pdf->AddPage('P',[450,550],0);

# Logo de la empresa formato png #
$pdf->Image('./img/logo.png',320,12,55,55,'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial','B',16);
$pdf->SetDrawColor(255,255,255);
$pdf->SetTextColor(255,255,255);
$pdf->SetY(10);
$pdf->Cell(0,10,convert_codification(". "),0,1,'C');

$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,10,convert_codification("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,'C');

$pdf->SetFont('Arial','',16);
$pdf->Cell(0,7,convert_codification("PISTA DE BAILE Y MESA DE POOL"),0,1, 'C');

$pdf->Cell(0,7,convert_codification("RIF: V-04608675-5"),0,1,'C');

$pdf->Cell(0,7,convert_codification("Calle 2 entre Av 5 y 6 - Turén Edo. Portuguesa"),0,1,'C');

$pdf->Ln(5);
$pdf->Cell(0,7,convert_codification("Historial de Compras a Proveedor"),0,1,'C');

$pdf->Ln(15);

if (!isset($_POST['id_proveedor'])){
    $pdf->SetFont('Arial','',10);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0);
    
    $pdf->setX(15);
    
    $pdf->Cell(20,8, convert_codification("Nº"),'B',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRODUCTO"),'B',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRESENTACIÓN"),'B',0,'C',0);
    $pdf->Cell(50,8, convert_codification("CATEGORÍA"),'B',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRECIO DE COMPRA EN $"),'B',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRECIO DE COMPRA EN BS"),'B',0,'C',0);
    $pdf->Cell(40,8, convert_codification("TASA REGISTRADA"),'B',0,'C',0);
    $pdf->Cell(40,8 , convert_codification("CANTIDAD COMPRADA"),'B',0,'C',0);
    $pdf->Cell(40,8, convert_codification("FECHA / HORA"),'B',1,'C',0);
    $pdf->setX(15);
    $pdf->SetFont('Arial','',16);
    
    $pdf->Cell(390, 10, convert_codification('No se selecciono a un proveedor, asegurese de haber seleccionado uno correctamente.'),'B',1,'C',0);
    
    $pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);
}

$id_proveedor = modeloPrincipal::decryptionId($_POST["id_proveedor"]);
$id_proveedor = modeloPrincipal::limpiar_cadena($id_proveedor);

$nombre_proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT * FROM proveedor WHERE id_proveedor = $id_proveedor"));


$pdf->SetFont('Arial','',14);

$pdf->setX(25);
$pdf->Cell(8,7,convert_codification("Cédula / RIF: ".mb_strtoupper($nombre_proveedor["cedula_rif"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(13,7,convert_codification("Nombre: ".mb_strtoupper($nombre_proveedor["nombre"])),0,1, 'L');

$pdf->setX(25);
$pdf->Cell(7,7,convert_codification("Correo: ".mb_strtoupper($nombre_proveedor["correo"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(7,7,convert_codification("Dirección: ".mb_strtoupper($nombre_proveedor["direccion"])),0,1,'L');

$pdf->setX(25);
$pdf->Cell(7,7,convert_codification("Teléfono: ".mb_strtoupper($nombre_proveedor["telefono"])),0,1,'L');

$pdf->Ln(10);



$consulta = modeloPrincipal::consultar("SELECT M.nombre AS marca,PS.nombre AS presentacion,
    SUM(D.cantidad_comprada) AS cantidad_comprada,
    D.precio_unitario_dolar AS precio_dolar,
    D.precio_unitario_bs AS precio_bs,
    E.fecha_entrada, 
    ROUND((SELECT dolar FROM dolar WHERE id_dolar = E.id_dolar),2) AS tasa, U.nombre AS usuario
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN usuario AS U ON U.id_usuario = E.id_usuario 
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    WHERE PROV.id_proveedor = $id_proveedor
    GROUP BY D.id_entrada, E.fecha_entrada, M.nombre, U.nombre, tasa, PS.nombre, D.precio_unitario_dolar, D.precio_unitario_bs");

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->SetFont('Arial','',10);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0);
    
    $pdf->setX(15);
    
    $pdf->Cell(20,8, convert_codification("Nº"),'LTRB',0,'C',0);
    $pdf->Cell(65,8, convert_codification("PRODUCTO"),'LTRB',0,'C',0);
    $pdf->Cell(60,8, convert_codification("PRESENTACIÓN"),'LTRB',0,'C',0);
    $pdf->Cell(40,8 ,convert_codification("CANTIDAD"),'LTRB',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRECIO DE COMPRA EN $"),'LTRB',0,'C',0);
    $pdf->Cell(50,8, convert_codification("PRECIO DE COMPRA EN BS"),'LTRB',0,'C',0);
    $pdf->Cell(45,8, convert_codification("TASA REGISTRADA"),'LTRB',0,'C',0);
    $pdf->Cell(50,8, convert_codification("FECHA / HORA"),'LTRB',0,'C',0);
    $pdf->Cell(50, 8, convert_codification('Quién Realizó la entrada'),'LTRB',1,'C',0);
    
    $pdf->setX(15);
    
    $pdf->Cell(0, 8, convert_codification('No se encontraron registros de este proveedor, asegurese de haber registrado una compra a este mismo.'),'B',1,'C',0);
    
    $pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);
}


# Tabla de productos #
$pdf->SetFont('Arial','', 10);

$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);

$pdf->setX(15);

$pdf->Cell(20,5, convert_codification("Nº"),'LTRB',0,'C',0);
$pdf->Cell(65,5, convert_codification("PRODUCTO"),'LTRB',0,'C',0);
$pdf->Cell(60,5, convert_codification("PRESENTACIÓN"),'LTRB',0,'C',0);
$pdf->Cell(40,5 ,convert_codification("CANTIDAD"),'LTRB',0,'C',0);
$pdf->Cell(50,5, convert_codification("PRECIO DE COMPRA EN $"),'LTRB',0,'C',0);
$pdf->Cell(50,5, convert_codification("PRECIO DE COMPRA EN BS"),'LTRB',0,'C',0);
$pdf->Cell(45,5, convert_codification("TASA REGISTRADA"),'LTRB',0,'C',0);
$pdf->Cell(50,5, convert_codification("FECHA / HORA"),'LTRB',0,'C',0);
$pdf->Cell(50,5, convert_codification('Quién Realizó la entrada'),'LTRB',0,'C',0);

$pdf->Ln();



    
    
$i = 1;

while ( $row = mysqli_fetch_array($consulta)) { 
    $pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(39,39,51);
    $pdf->setX(15);
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(20,5, convert_codification($i++),'B',0,'C',0);
	$pdf->Cell(65,5, convert_codification($row['marca']),'B',0,'C',0);
	$pdf->Cell(60,5, convert_codification($row['presentacion']),'B',0,'C',0);
	$pdf->Cell(40,5, convert_codification($row['cantidad_comprada']),'B',0,'C',0);
	$pdf->Cell(50,5, convert_codification($row['precio_dolar']." $"),'B',0,'C',0);
	$pdf->Cell(50,5, convert_codification($row['precio_bs']." bs"),'B',0,'C',0);
	$pdf->Cell(45,5, convert_codification($row['tasa'].' bs'),'B',0,'C',0);
	$pdf->Cell(50,5, convert_codification(DATE('Y-m-d / h:i:A', strtotime($row['fecha_entrada']))),'B',0,'C',0);
    $pdf->Cell(50,5, convert_codification($row["usuario"]),'B',1,'C',0);
}

    $pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/
	# Nombre del archivo PDF #
	$pdf->Output("I","Historial de proveedor - ".$nombre_proveedor["cedula_rif"]." ".$nombre_proveedor["nombre"]." - (".date('d/m/Y | g:i:a').").pdf",true);