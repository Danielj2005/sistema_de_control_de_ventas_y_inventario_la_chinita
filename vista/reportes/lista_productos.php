<?php
session_start();
include_once("../../config/ConfigServer.php");
include_once("../../modelo/modeloPrincipal.php");
require('fpdf/fpdf.php');

date_default_timezone_set('America/caracas');

class PDF extends FPDF{
    function Header(){
        
        $this->Image('../img/logo.png',320,10,35,35,'PNG');
        
        $this->setY(10);
        $this->setX(10);
        $this->SetFont('times', 'B', 13);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(255,255,255);
        $this->Cell(400,5,utf8_decode("."),0,1,"C");
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(0,0,0);
        $this->Cell(0,5,utf8_decode("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,"C");
        
        $this->setY(15);
        $this->setX(10);
        $this->Cell(0,5,utf8_decode(" "),0,1,"C");
        $this->Cell(0,5,utf8_decode("PISTA DE BAILE Y MESA DE POOL"),0,1,"C");

        $this->setY(25);
        $this->setX(10);
        $this->Cell(410,7,utf8_decode("RIF: V-04608675-5"),0,1,'C');

        $this->setY(30);
        $this->setX(10);
        $this->Cell(410,7,utf8_decode("Calle 2 entre Av 5 y 6 - Turén Edo. Portuguesa"),0,1,'C');
        
        $this->setY(40);
        $this->setX(10);
        $this->Cell(400,5,utf8_decode("Lista de Productos"),0,0,"C");

        $this->Ln(50);
    }

    function Footer(){
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(100,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(100,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(5,287,215,287);
        $this->Cell(0,5,utf8_decode("© Todos los derechos reservados."),0,0,"C");
            
    }

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P',[420,497],0);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);

$consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_compra_dolar, 
    P.precio_compra_bs, P.stock, P.estatus, C.nombre, PS.nombre as nombre_presentacion,
    ROUND(P.precio_compra_bs / P.precio_compra_dolar,2 ) AS tasa
    FROM producto AS P 
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
    ORDER BY P.nombre_producto ASC");

// en caso de que no se encuentren proveedores registrados

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->Ln();

    $pdf->setY(60);
    $pdf->setX(5);
    
    // En esta parte estan los encabezados 
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10, 5, utf8_decode('Nº'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('PRODUCTO'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('PRESENTACIÓN'),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode('PRECIO DE COMPRA $'),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode('PRECIO DE COMPRA BS'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('TASA DEL $'),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode('STOCK'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('CATEGORÍA'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('ESTADO'),'B',0,'C',0);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(210, 5, utf8_decode('NO SE ENCONTRARON PRODUCTOS REGISTRADOS.'),'B',1,'C',0);
    $pdf->Cell(210, 5, utf8_decode('ASEGURESE DE HABER REGISTRADO CORRECTAMENTE LOS PRODUCTOS.'),'B',1,'C',0);
    
    $pdf->Output("I","Listado de Productos (".date('d/m/Y | g:i:a').").pdf",true);
}

$pdf->setY(60);
$pdf->setX(10);

// En esta parte estan los encabezados 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 5, utf8_decode('Nº'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('PRODUCTO'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('PRESENTACIÓN'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('CATEGORÍA'),'B',0,'C',0);
$pdf->Cell(45, 5, utf8_decode('PRECIO DE COMPRA $'),'B',0,'C',0);
$pdf->Cell(45, 5, utf8_decode('PRECIO DE COMPRA BS'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('TASA DEL $'),'B',0,'C',0);
$pdf->Cell(45, 5, utf8_decode('STOCK'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('ESTADO'),'B',0,'C',0);

$pdf->Ln();


$i = 1;
while ( $mostrar = mysqli_fetch_array($consulta)) { 
    $pdf->SetFont('Arial','',10);

    $pdf->setX(10);
    $pdf->Cell(10, 5, utf8_decode($i++),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode(" ".$mostrar["nombre_producto"]),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode($mostrar["nombre_presentacion"]),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode($mostrar["nombre"]),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode($mostrar["precio_compra_dolar"].'$'),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode($mostrar["precio_compra_bs"].' bs'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode(($mostrar["tasa"] == "" ) ? '0 bs' : $mostrar["tasa"].' bs'),'B',0,'C',0);
    $pdf->Cell(45, 5, utf8_decode($mostrar["stock"]),'B', 0,'C',0);
    $pdf->Cell(50, 5, utf8_decode(($mostrar["estatus"] == '1') ? 'Activo':'Inactivo'),'B',1,'C',0);
    
} 
$pdf->Output("I","Listado de Productos (".date('d-m-Y / h:i:a').").pdf",true);