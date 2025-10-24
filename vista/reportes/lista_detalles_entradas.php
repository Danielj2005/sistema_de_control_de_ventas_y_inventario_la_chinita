<?php
session_start();
include_once "../../modelo/modeloPrincipal.php";
require 'fpdf/fpdf.php';

date_default_timezone_set('America/caracas');

class PDF extends FPDF{
        
    function Header(){
        
        $id_entrada = modeloPrincipal::decryptionId($_POST['UIDE']);
        $id_entrada = modeloPrincipal::limpiar_cadena($id_entrada);
        $ids = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id_proveedor, id_dolar, total_dolar, fecha_entrada, id_usuario FROM entrada WHERE id_entrada = 32"));
        $id_proveedor = $ids['id_proveedor'];
        $dataProvider = mysqli_fetch_array(modeloPrincipal::consultar("SELECT * FROM proveedor WHERE id_proveedor = $id_proveedor"));
        
        $id_dolar = $ids['id_dolar'];
        $id_dolar = mysqli_fetch_array(modeloPrincipal::consultar("SELECT * FROM dolar WHERE id_dolar = $id_dolar"))['dolar'];

        $total_dolar = $ids['total_dolar'];
        $fecha_entrada = $ids['fecha_entrada'];
        $fecha_entrada = date('d-m-Y | g:i:a', strtotime($fecha_entrada));

        $userId = $ids['id_usuario'];
        $userData = mysqli_fetch_array(modeloPrincipal::consultar("SELECT U.*, (SELECT nombre FROM rol WHERE id_rol = U.id_rol) AS rol FROM usuario AS U WHERE id_usuario = $userId"));

        

        $this->setY(10);
        $this->setX(10);
        $this->SetFont('times', 'B', 13);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(0,0,0);
        $this->Cell(0,5,self::convert_codification("BAR RESTAURANT Y LUNCHERIA 'LA CHINITA'"),0,1,"C");
        
        $this->setY(15);
        $this->setX(10);
        $this->Cell(0,5,self::convert_codification("PISTA DE BAILE Y MESA DE POOL"),0,1,"C");

        $this->setY(20);
        $this->setX(10);
        $this->Cell(0,7,self::convert_codification("Calle 2 entre Av 5 y 6 - Turén Edo. Portuguesa"),0,1,'C');
        
        $this->setY(25);
        $this->setX(10);
        $this->Cell(0,7,self::convert_codification("RIF: J-04608675-5"),0,1,'C');
        
        $this->SetFont('Arial','',10);

        $this->setY(40);
        // datos del proveedor
        $this->Cell(80, 5, self::convert_codification('Datos del Proveedor:'),'B',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Datos del usuario que realizó la entrada:'),'B',1,'L',0);
        $this->setX(10);
        // datos del proveedor
        $this->Cell(80, 5, self::convert_codification('Cédula / RIF: '.$dataProvider['cedula_rif']),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Cédula: '.$userData['cedula']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Nombre: '.$dataProvider['nombre']),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Nombre y Apellido: '.$userData['nombre'].' '.$userData['apellido']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Teléfono: '.$dataProvider['telefono']),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Teléfono: '.$userData['telefono']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Correo: '.$dataProvider['correo']),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Correo: '.$userData['correo']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Dirección: '.$dataProvider['direccion']),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification('Dirección: '.$userData['direccion']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Cotización: '.$id_dolar.' bs'),'',0,'L',0);
        $this->setX(170);
        $this->Cell(100, 5, self::convert_codification("Rol: ".$userData['rol']),'',1,'L',0);
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Total de la Compra $: '.$total_dolar,),'',1,'L',0);
        
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Total de la Compra bs: '.round(floatval($id_dolar * $total_dolar), 2)),'',1,'L',0);
        
        $this->setX(10);
        $this->Cell(80, 5, self::convert_codification('Fecha / Hora: '.$fecha_entrada),'',1,'L',0);
        

        $this->Ln(50);
    }

    function Footer(){
        $this->SetFont('helvetica', 'B', 10);
        $this->SetY(-20);
        $this->Cell(0,5,self::convert_codification('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(0,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->SetY(-15);
        $this->Line(5, 427,390,427);
        $this->SetY(-10);
        $this->Cell(0,5,self::convert_codification("© Todos los derechos reservados."),0,0,"C");       
    }

    public static function convert_codification ($cadena):string {
        return mb_convert_encoding("$cadena", 'ISO-8859-1', 'UTF-8');
    }
    
}

function tableHead ($pdf, $Producto, $Presentación, $Cantidad, $Cotización, $PrecioDolar, $PrecioBs) {
    // En esta parte estan los encabezados 
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(10, 5, $pdf->convert_codification('Nº'),'LTRB',0,'C',0);
    $pdf->Cell($Producto, 5, $pdf->convert_codification('Producto'),'LTRB',0,'C',0);
    $pdf->Cell($Presentación, 5, $pdf->convert_codification('Presentación'),'LTRB',0,'C',0);
    $pdf->Cell($Cantidad, 5, $pdf->convert_codification('Cantidad'),'LTRB',0,'C',0);
    $pdf->Cell($PrecioDolar, 5, $pdf->convert_codification('Precio por unidad en $'),'LTRB',0,'C',0);
    $pdf->Cell($PrecioBs, 5, $pdf->convert_codification('Precio por unidad en BS'),'LTRB',1,'C',0);
}

// se definen variable con los tamaños de las celdas para mejor adaptacion
$Producto = 60;
$Presentación = 60;
$Cantidad = 40;
$Cotización = 50;
$PrecioDolar = 50;
$PrecioBs = 45;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P',[280,427],0);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);


$id_entrada = modeloPrincipal::decryptionId($_POST['UIDE']);
$id_entrada = modeloPrincipal::limpiar_cadena($id_entrada);


$consulta = modeloPrincipal::consultar("SELECT
    M.nombre AS marca,
    PS.nombre AS presentacion,
    D.cantidad_comprada, D.precio_unitario_dolar AS precio_dolar, D.precio_unitario_bs AS precio_bs
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    WHERE D.id_entrada = $id_entrada");

// en caso de que no se encuentren proveedores registrados

if (mysqli_num_rows($consulta) < 1 ){
    $pdf->Ln();

    $pdf->setY(100);
    $pdf->setX(5);
    
    // En esta parte estan los encabezados 
    tableHead ($pdf, $Producto, $Presentación, $Cantidad, $Cotización, $PrecioDolar, $PrecioBs);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(210, 5, $pdf->convert_codification('NO SE ENCONTRARON ENTRADAS REGISTRADAS.'),'B',1,'C',0);
    $pdf->Cell(210, 5, $pdf->convert_codification('ASEGURESE DE HABER REGISTRADO CORRECTAMENTE LAS ENTRADAS.'),'B',1,'C',0);
    
    $pdf->Output("I","Listado de Entradas (".date('d/m/Y | g:i:a').").pdf",true);
}

$pdf->setY(90);
$pdf->setX(5);

// En esta parte estan los encabezados 
tableHead ($pdf, $Producto, $Presentación, $Cantidad, $Cotización, $PrecioDolar, $PrecioBs);

$i = 1;
while ( $mostrar = mysqli_fetch_array($consulta)) { 
    $pdf->SetFont('Arial','',10);
    
    $pdf->setX(5);
    $pdf->Cell( 10,10, $pdf->convert_codification($i++),'B',0,'C',0);
    $pdf->Cell($Producto,10, $pdf->convert_codification($mostrar["marca"]),'B',0,'L',0);
    $pdf->Cell($Presentación, 10, $pdf->convert_codification($mostrar["presentacion"]),'B',0,'C',0);
    $pdf->Cell($Cantidad, 10, $pdf->convert_codification($mostrar["cantidad_comprada"]),'B',0,'C',0);
    $pdf->Cell($PrecioDolar, 10, $pdf->convert_codification($mostrar["precio_dolar"].' $'),'B',0,'C',0);
    $pdf->Cell($PrecioBs, 10, $pdf->convert_codification($mostrar["precio_bs"].' bs'),'B',1,'C',0);

}

$pdf->Output("I","Listado detallado de Entradas (".date('d/m/Y | g:i:a').").pdf",true);