<?php
session_start();
include_once "../../modelo/modeloPrincipal.php";
require 'fpdf/fpdf.php';

date_default_timezone_set('America/caracas');

class PDF extends FPDF{
    function Header(){
        
        $this->Image('../img/logo.png',220,10,35,35,'PNG');
        
        $this->setY(10);
        $this->setX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(255,255,255);
        $this->Cell(400,5,self::convert_codification("."),0,1,"C");
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(0,0,0);
        $this->Cell(0,5,self::convert_codification("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,"C");
        
        $this->SetFont('Arial', '', 12);
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
        $this->Cell(0,5,self::convert_codification("Lista de Proveedores"),0,0,"C");

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
    $pdf->Cell(30, 5, $pdf->convert_codification('Cédula/RIF'),'LTRB',0,'C',0);
    $pdf->Cell(65, 5, $pdf->convert_codification('Nombre'),'LTRB',0,'C',0);
    $pdf->Cell(70, 5, $pdf->convert_codification('Correo'),'LTRB',0,'C',0);
    $pdf->Cell(25, 5, $pdf->convert_codification('Teléfono'),'LTRB',0,'C',0);
    $pdf->Cell(80, 5, $pdf->convert_codification('Dirección'),'LTRB',1,'C',0);
}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P',[290,300],0);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);

$consulta = modeloPrincipal::consultar("SELECT * FROM proveedor ORDER BY nombre ASC");

// en caso de que no se encuentren proveedores registrados

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->Ln();

    $pdf->setY(60);
    $pdf->setX(5);
    
    // Esta funcion devuelve los encabezados 
    tableHead($pdf);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(210, 5, $pdf->convert_codification ('NO SE ENCONTRARON PROVEEDORES REGISTRADOS.'),'B',1,'C',0);
    $pdf->Cell(210, 5, $pdf->convert_codification ('ASEGURESE DE HABER REGISTRADO CORRECTAMENTE LOS PROVEEDORES.'),'B',1,'C',0);
    $pdf->Output("I","Listado de Proveedores (".date('d/m/Y | g:i:a').").pdf",true);
}

$pdf->setY(60);
$pdf->setX(5);

// Esta funcion devuelve los encabezados 
tableHead($pdf);

$pdf->SetFont('Arial','',8);
$i = 1;
while ( $mostrar = mysqli_fetch_array($consulta)) { 
    
    $pdf->setX(5);
    $pdf->Cell(10, 5, $i++,'B',0,'C',0);
    $pdf->Cell(30, 5, $pdf->convert_codification($mostrar["cedula_rif"]),'B',0,'L',0);
    $pdf->Cell(65, 5, $pdf->convert_codification($mostrar["nombre"]),'B',0,'L',0);
    $pdf->Cell(70, 5, $pdf->convert_codification($mostrar["correo"]),'B',0,'L',0);
    $pdf->Cell(25, 5, $pdf->convert_codification($mostrar["telefono"]),'B',0,'L',0);
    $pdf->Cell(80, 5, $pdf->convert_codification($mostrar["direccion"]),'B',1,'L',0);
    
} 
$pdf->Output("I","Listado de Proveedores (".date('d/m/Y | h:i:a').").pdf",true);