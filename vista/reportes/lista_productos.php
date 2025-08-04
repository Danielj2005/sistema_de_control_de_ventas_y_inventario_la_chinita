<?php
session_start();
include_once "../../modelo/modeloPrincipal.php";
include_once "../../modelo/productos_model.php";
require 'fpdf/fpdf.php';

date_default_timezone_set('America/caracas');

class PDF extends FPDF{
    function Header(){
        
        $this->Image('../img/logo.png',220,10,35,35,'PNG');
        
        $this->setY(10);
        $this->setX(10);
        $this->SetFont('times', 'B', 13);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(255,255,255);
        $this->Cell(400,5,self::convert_codification("."),0,1,"C");
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(0,0,0);
        $this->Cell(0,5,self::convert_codification("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,"C");
        
        $this->setY(15);
        $this->setX(10);
        $this->Cell(0,5,self::convert_codification(" "),0,1,"C");
        $this->Cell(0,5,self::convert_codification("PISTA DE BAILE Y MESA DE POOL"),0,1,"C");

        $this->setY(25);
        $this->setX(10);
        $this->Cell(0,7,self::convert_codification("RIF: V-04608675-5"),0,1,'C');

        $this->setY(30);
        $this->setX(10);
        $this->Cell(0,7,self::convert_codification("Calle 2 entre Av 5 y 6 - Turén Edo. Portuguesa"),0,1,'C');
        
        $this->setY(40);
        $this->setX(10);
        $this->Cell(0,5,self::convert_codification("Lista de Productos"),0,0,"C");

        $this->Ln(50);
    }

    function Footer(){
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(100,5,self::convert_codification('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(100,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(5,287,215,287);
        $this->Cell(0,5,self::convert_codification("© Todos los derechos reservados."),0,0,"C");
            
    }

    public static function convert_codification ($cadena):string {
        return mb_convert_encoding("$cadena", 'ISO-8859-1', 'UTF-8');
    }


}

function tableHead ($pdf) {
    // En esta parte estan los encabezados 
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10, 5, $pdf->convert_codification('Nº'),'LTRB',0,'C',0);
    $pdf->Cell(50, 5, $pdf->convert_codification('Producto'),'LTRB',0,'C',0);
    $pdf->Cell(65, 5, $pdf->convert_codification('Presentación'),'LTRB',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification('Cantidad'),'LTRB',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification('Precio bs'),'LTRB',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification('Precio $'),'LTRB',0,'C',0);
    $pdf->Cell(25, 5, $pdf->convert_codification('Tasa'),'LTRB',1,'C',0);
    
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P',[260,390],0);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);

$consulta = producto_model::obtener_todos_los_datos();

// en caso de que no se encuentren proveedores registrados

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->Ln();

    $pdf->setY(60);
    $pdf->setX(5);
    
    // Esta funcion devuelve los encabezados 
    tableHead($pdf);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(210, 5, $pdf->convert_codification('NO SE ENCONTRARON PRODUCTOS REGISTRADOS.'),'B',1,'C',0);
    $pdf->Cell(210, 5, $pdf->convert_codification('ASEGURESE DE HABER REGISTRADO CORRECTAMENTE LOS PRODUCTOS.'),'B',1,'C',0);
    
    $pdf->Output("I","Listado de Productos (".date('d/m/Y | g:i:a').").pdf",true);
}

$pdf->setY(60);
$pdf->setX(10);

// Esta funcion devuelve los encabezados 
tableHead($pdf);


$i = 1;
while ( $mostrar = mysqli_fetch_array($consulta)) { 
    $pdf->SetFont('Arial','',10);

    $pdf->setX(10);
    $pdf->Cell(10, 5, $pdf->convert_codification($i++),'B',0,'C',0);
    $pdf->Cell(50, 5, $pdf->convert_codification(" ".$mostrar["marca"]),'B',0,'L',0);
    $pdf->Cell(65, 5, $pdf->convert_codification($mostrar["presentacion"]),'B',0,'L',0);
    $pdf->Cell(30, 5, $pdf->convert_codification($mostrar["stock_actual"] == 0 ? 0 : $mostrar["stock_actual"]),'B',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification(($mostrar["precio_venta"] == "0" ? '0' : $mostrar["precio_venta"]) *128 .' bs'),'B',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification($mostrar["precio_venta"] == "0" || $mostrar["precio_venta"] == null  ? '0.$' : $mostrar["precio_venta"].' $' ),'B',0,'C',0);
    $pdf->Cell(25, 5, $pdf->convert_codification($mostrar["tasa"].' bs'),'B',1,'C',0);

} 
$pdf->Output("I","Listado de Productos (".date('d-m-Y / h:i:a').").pdf",true);