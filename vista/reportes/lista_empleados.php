<?php
session_start();
include_once("../../config/ConfigServer.php");
include_once("../../modelo/modeloPrincipal.php");
require('fpdf/fpdf.php');

date_default_timezone_set('America/caracas');

class PDF extends FPDF{
    function Header(){
        
        $this->setY(10);
        $this->setX(10);
        $this->SetFont('times', 'B', 13);
        $this->Cell(0,5,utf8_decode("BAR-RESTAURANT"),0,0,"C");
        
        $this->setY(15);
        $this->setX(10);
        $this->Cell(0,5,utf8_decode("LA CHINITA"),0,0,"C");

        $this->setY(40);
        $this->setX(10);
        $this->Cell(0,5,utf8_decode("Lista de Empleados"),0,0,"C");

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
$pdf->AddPage('P',[220,297],0);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);

$id_usuario = $_SESSION['user_id'];

$consulta = modeloPrincipal::consultar("SELECT id_usuario, cedula, nombre, apellido, telefono, correo, direccion, estado FROM usuario 
    WHERE id_usuario != '$id_usuario' AND id_rol != 1 ORDER BY nombre ASC");
// en caso de que no se encuentren proveedores registrados

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->Ln();

    $pdf->setY(60);
    $pdf->setX(5);
    
    // En esta parte estan los encabezados 
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10, 5, utf8_decode('Nº'),'B',0,'C',0);
    $pdf->Cell(20, 5, utf8_decode('CÉULA/RIF'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('NOMBRE'),'B',0,'C',0);
    $pdf->Cell(40, 5, utf8_decode('CORREO'),'B',0,'C',0);
    $pdf->Cell(65, 5, utf8_decode('DIRECCIÓN'),'B',0,'C',0);
    $pdf->Cell( 25, 5, utf8_decode('TELÉFONO'),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode('ESTADO'),'B',0,'C',0);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(210, 5, utf8_decode('NO SE ENCONTRARON EMPLEADOS REGISTRADOS.'),'B',1,'C',0);
    $pdf->Cell(210, 5, utf8_decode('ASEGURESE DE HABER REGISTRADO CORRECTAMENTE LOS EMPLEADOS.'),'B',1,'C',0);
    
    $pdf->Output("I","Listado de Empleados (".date('d/m/Y | g:i:a').").pdf",true);
}

$pdf->setY(60);
$pdf->setX(5);

// En esta parte estan los encabezados 
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10, 5, utf8_decode('Nº'),'B',0,'C',0);
$pdf->Cell(15, 5, utf8_decode('CÉULA/RIF'),'B',0,'C',0);
$pdf->Cell(50, 5, utf8_decode('NOMBRE Y APELLIDO'),'B',0,'C',0);
$pdf->Cell(35, 5, utf8_decode('CORREO'),'B',0,'C',0);
$pdf->Cell(60, 5, utf8_decode('DIRECCIÓN'),'B',0,'C',0);
$pdf->Cell(20, 5, utf8_decode('TELÉFONO'),'B',0,'C',0);
$pdf->Cell(20, 5, utf8_decode('ESTADO'),'B',0,'C',0);
$pdf->Ln();


$pdf->SetFont('Arial','',8);
$i = 1;
while ( $mostrar = mysqli_fetch_array($consulta)) {
    
    $pdf->setX(5);
    
    $pdf->Cell(10, 5, utf8_decode($i++),'B',0,'C',0);
    $pdf->Cell(15, 5, utf8_decode($mostrar["cedula"]),'B',0,'C',0);
    $pdf->Cell(50, 5, utf8_decode($mostrar["nombre"].' '.$mostrar["apellido"]),'B',0,'C',0);
    $pdf->Cell(35, 5, utf8_decode($mostrar["correo"]),'B',0,'C',0);
    $pdf->Cell(60, 5, utf8_decode($mostrar["direccion"]),'B',0,'C',0);
    $pdf->Cell(20, 5, utf8_decode($mostrar["telefono"]),'B',0,'C',0);
    $pdf->Cell(20, 5, utf8_decode(($mostrar["estado"] == 1) ? 'ACTIVO' : 'INACTIVO'),'B',1,'C',0);
    
} 
$pdf->Output("I","Listado de Empleados (".date('d/m/Y | g:i:a').").pdf",true);