<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/caracas');
class PDF extends FPDF{
    function Header(){
        
        $this->setY(12);
        $this->setX(10);
        
        $this->Image('img/shinheky.png',25,5,33);
        
        $this->SetFont('times', 'B', 13);
        
        $this->Text(80, 15, utf8_decode('NOMBRE EMPRESA KODO'));
        
        $this->Text(77, 21, utf8_decode('6ª av. Los Angeles, California'));
        $this->Text(88,27, utf8_decode('Tel: 7785-8223'));
        $this->Text(78,33, utf8_decode('noexisteelemail@gamail.com'));
        
        $this->Ln(40);
    }
    
    function Footer(){
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Kodo Sensei © Todos los derechos reservados."),0,0,"C");

    }


}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
// En esta parte estan los encabezados
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190, 7, utf8_decode('LISTA DE EMPLEADOS'),0,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(10, 7, utf8_decode('N°'),1,0,'C',0);
    $pdf->Cell(45, 7, utf8_decode('NOMBRE Y APELLIDO'),1,0,'C',0);
    $pdf->Cell(70, 7, utf8_decode('CORREO'),1,0,'C',0);
    $pdf->Cell(40, 7, utf8_decode('OCUPACION'),1,0,'C',0);
    $pdf->Cell(25, 7, utf8_decode('TELEFONO'),1,1,'C',0);
   
    $pdf->SetFont('Arial','',10);

    //Aqui inicia el for con todos los productos
for ($i=0; $i < 100; $i++) { 
   
    $pdf->Cell(10, 7, $i+1,1,0,'C',0);
    $pdf->Cell(45, 7, utf8_decode('ANDERSO J SANCHEZ S'),1,0,'C',0);
    $pdf->Cell(70, 7, utf8_decode('ANDERSOSANCHEZ911@GMAIL.COM'),1,0,'C',0);
    $pdf->Cell(40, 7, utf8_decode('ING INFORMATICA'),1,0,'C',0);
    $pdf->Cell(25, 7, utf8_decode('04125541429'),1,1,'C',0);
    
}


$pdf->Output();
?>