<?php
require('fpdf/fpdf.php');
require('../../config/ConfigServer.php');
require('../../modelo/modeloPrincipal.php');

date_default_timezone_set('America/Caracas');

class PDF extends FPDF{
  // Cabecera de página

  // Numeros de paginas

  // SetTextColor(255,255,255);es RGB extraer colores con GIMP

  //SetFillColor()

  //SetDrawColor()

  //Line(derecha-izquierda, arriba-abajo,ancho,arriba-abajo)

  //Color line setDrawColor(61,174,233)

  //GetX() || GetY() posiciones en cm

  //Grosor SetLineWidth(1)

  // SetFont(tipo{COURIER, HELVETICA,ARIAL,TIMES,SYMBOL, ZAPDINGBATS}, estilo[normal,B,I ,A], tamaño)

  // Cell(ancho , alto,texto,borde,salto(0/1),alineacion,rellenar, link)

  //AddPage(orientacion[PORTRAIT, LANDSCAPE], tamño[A3.A4.A5.LETTER,LEGAL],rotacion)

  //Image(ruta, poscisionx,pocisiony,alto,ancho,tipo,link)

  //SetMargins(10,30,20,20) luego de addpage
  
  /* Encabezado  */
  function Header(){
    $this->Image('../assets/img/bg-login.png', 1600, 5, 100, 100);
    // Image(ruta, poscision x, pocision y, alto, ancho, tipo, link);
    
    $this->SetY(20);
    $this->SetX(10);
    $this->SetFont('Arial','B',36);
    $this->SetTextColor(0,0,0);

    $this->SetY(15);
    $this->SetX(750);
    $this->Cell(300,15,utf8_decode('REPÚBLICA BOIVARIANA DE VENEZUELA'),0,1,'C');

    $this->SetY(35);
    $this->SetX(725);
    $this->Cell(350,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA DEFENSA'),0,1,'C');

    $this->SetY(55);
    $this->SetX(650);
    $this->Cell(145,5,utf8_decode('UNIVERSIDAD NACIONAL EXPERIMENTAL POLITÉCNICA DE LA FUERZA ARMADA'),0,1);

    $this->SetY(75);
    $this->SetX(830);
    $this->Cell(10,5,utf8_decode('NÚCLEO PORTUGUESA'),0,1);

    
    $this->SetY(95);
    $this->SetX(800);
    $this->Cell(10,5,utf8_decode('CONTROL PRÉSTAMO INTERNO'),0,1);

    $this->Ln(2);

  }

  // Pie de página
  function Footer(){  
    $this->SetFont('helvetica', 'B', 28);
    $this->SetY(-30);
    $this->Cell(50,20,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
    $this->Cell(0,20,date('d/m/Y - h:i:a') ,00,1,'R');
    $this->Line(10,780,1780,780);
  //Line(derecha-izquierda, arriba-abajo, ancho, arriba-abajo)

  }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage('L',[1790 , 816]);
$pdf->SetAutoPageBreak(true, 5);
$pdf->SetTopMargin(5);
$pdf->SetLeftMargin(50);
$pdf->SetRightMargin(10);

$pdf->SetX(50); // posicion de los nombre de los campos en el eje x 
$pdf->SetY(180); // posicion de los nombre de los campos en el eje Y
$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);

$pdf->SetFont('Arial','B',24);
$pdf->Cell(250, 20, utf8_decode('NOMBRES Y APELLIDOS'),1,0,'C',1);
$pdf->Cell(80, 20, utf8_decode('CÉDULA'),1,0,'C',1);
$pdf->Cell(260, 20, utf8_decode('CARRERA'),1,0,'C',1);
$pdf->Cell(55, 20, utf8_decode('SEMESTRE'),1,0,'C',1);
$pdf->Cell(90, 20, utf8_decode('TELÉFONO'),1,0,'C',1);
$pdf->Cell(400, 20, utf8_decode('TÍTULO DE LIBRO'),1,0,'C',1);
$pdf->Cell(50, 20, utf8_decode('COTA'),1,0,'C',1);
$pdf->Cell(180, 20, utf8_decode('TIPO DE SOLICITANTE'),1,0,'C',1);
$pdf->Cell(160, 20, utf8_decode('FECHA Y HORA DE PRÉSTAMO'),1,0,'C',1);
$pdf->Cell(160, 20, utf8_decode('FECHA Y HORA DE DEVOLUCIÓN'),1,1,'C',1);

$pdf->Ln(0);

// FECHA ACTUAL
$fecha_actual = date('Y-m-d'); 

// FECHA DE INICIO PARA LA BUSQUEDA DE REGISTROS EN LA BD
$fecha_inicio = date('Y-m-d', strtotime($_POST['fecha_inicio']));

// FECHA DE FIN PARA LA BUSQUEDA DE REGISTROS EN LA BD
$fecha_fin = date('Y-m-d', strtotime($_POST['fecha_fin'])); 

// se comprueba si las fechas dadas son superiores a la actual
if($fecha_inicio > $fecha_actual || $fecha_fin > $fecha_actual ){

  $pdf->SetFont('Arial','B',24);

  $pdf->SetX(235);
  $pdf->SetY(200);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetDrawColor(0,0,0);
  $pdf->Cell(1685, 20, utf8_decode('DEBES SELECCIONAR OTRO RANGO DE FECHAS QUE SEA ANTERIOR A LA FECHA ACTUAL, VERIFICA E INTENTA NUEVAMENTE.'),1,0,'C',1);
  
  $pdf->Output("I","reporte préstamos ({$fecha_inicio} -- {$fecha_fin}).pdf",true);

  unset($fecha_inicio);
  unset($fecha_fin);
  unset($fecha_actual);

}

// se realiza una consulta para hacer el reporte de solvencias bibliotecaria
$datos = modeloPrincipal::consultar("SELECT S.nombre, S.apellido, S.cedula, C.nombre_carrera,
P.semestre_solicitante, S.telefono, L.titulo, L.cota, T.solicitante AS solicitante,
P.fecha_prestamo, P.fecha_max_devolucion
FROM prestamo AS P INNER JOIN libro AS L ON P.id_libro = L.id
INNER JOIN solicitante AS S ON P.id_solicitante = S.id
INNER JOIN carrera AS C ON L.id_carrera = C.id OR P.carrera_solicitante = C.id
INNER JOIN tipo_solicitante AS T ON S.tipo_solicitante = T.id_solicitante
WHERE P.fecha_prestamo BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY P.fecha_prestamo DESC");

// se verifica si se encontraron datos
if(mysqli_num_rows($datos) < 1){

  $pdf->SetFont('Arial','B',24);
  $pdf->SetX(235);
  $pdf->SetY(200);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetDrawColor(0,0,0);
  $pdf->Cell(1685, 20, utf8_decode('NO HAY REGISTROS DISPONIBLES, SELECCIONA OTRO RANGO DE FECHAS.'),1,0,'C',1);
    
  $pdf->Output("I","reporte préstamos ({$fecha_inicio} -- {$fecha_fin}).pdf",true);
  exit();
}

// se imprimen los datos para generar el reporte 
while($row = mysqli_fetch_assoc($datos)) {
  
  $pdf->SetFont('Arial','B',24);
  $pdf->SetX(50);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetDrawColor(0,0,0);

  $pdf->Cell(250, 20, utf8_decode($row['nombre'].' '.$row['apellido']),1,0,'C',1);
  $pdf->Cell(80, 20, utf8_decode($row['cedula']),1,0,'C',1);
  $pdf->Cell(260, 20, utf8_decode($row['nombre_carrera']),1,0,'C',1);
  $pdf->Cell(55, 20, utf8_decode($row['semestre_solicitante']),1,0,'C',1);
  $pdf->Cell(90, 20, utf8_decode($row['telefono']),1,0,'C',1);
  $pdf->Cell(400, 20, utf8_decode($row['titulo']),1,0,'C',1);
  $pdf->Cell(50, 20, utf8_decode($row['cota']),1,0,'C',1);
  $pdf->Cell(180, 20, utf8_decode($row['solicitante']),1,0,'C',1);
  $pdf->Cell(160, 20, utf8_decode($row['fecha_prestamo']),1,0,'C',1);
  $pdf->Cell(160, 20, utf8_decode($row['fecha_max_devolucion']),1,1,'C',1);
  
  $pdf->Ln(0);

}

// $fecha_inicio = date('d-m-Y H:i:a', $fecha_inicio);
// $fecha_fin = date('d-m-Y H:i:a', $fecha_fin);

$pdf->Output("I","reporte préstamos ({$fecha_inicio} -- {$fecha_fin}).pdf",true);
unset($datos);
unset($fecha_inicio);
unset($fecha_fin);
unset($fecha_actual);
// exit();
?>