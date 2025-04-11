<?php 
session_start();


$id_usuario = $_SESSION['id_usuario']; // recibimos el id del usuario que incio sesión

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'][$id_usuario] !== true) { 
  // Redirigir el acceso a la página sino inició de sesión
  header('Location: ../index.php');
  exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Factura</title>
      <?php 
        // se incluyen los meta datos 
        include_once("../include/meta_include.php"); 
        // se incluyen los estilos css y sus librerias a la vista
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php 
        // se incluye el header / encabezado a la vista
        include_once("../include/header.php");
        // se incluye el menu lateral a la vista 
        include_once("../include/sliderbar.php"); 
        
        // datos del cliente
        // $id_cliente = $_POST['id_cliente'];
        // $cedula_cliente = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula_cliente']); 
        // $nombre_cliente = modeloPrincipal::limpiar_mayusculas($_POST['nombre_cliente']);
        // $telefono_cliente = modeloPrincipal::limpiar_cadena($_POST['telefono_cliente']);
    
        // datos de los servicios
        // $id_servicios = $_POST['servicios'];
        // $cantidad_servicios = $_POST['cantidad_servicio'];
        // $precio_servicio_dolar = $_POST['precio_servicio_dolar'];
        // $precio_servicio_bolivar = $_POST['precio_servicio_bolivar'];

        // datos  de los productos
        // $id_productos = $_POST['producto'];
        // $cantidad_productos = $_POST['cantidad_producto'];
        // $precios_dolar_productos = $_POST['precio_producto_dolar'];
        // $precios_bolivares_productos = $_POST['precio_producto_bolivar'];

        // datos del metodo de pago
        // $id_metodo_pago = $_POST['metodo_pago'];
        // $cantidad_pago = $_POST['monto_pagar'];
        // $referencia_pago = $_POST['num_referencia'];

        // datos de la venta 
        // $precio_dolar = $_POST['dolar'];

        // $fecha_venta = date('Y-m-d');
        // $hora_venta = date('h:i:a');

        // $sub_total_dolar = $_POST['total_dolar_venta'];
        // $sub_total_bolivares = $_POST['total_bolivares_venta'];
        
        // $total_dolar = $_POST['total_dolar_venta_iva'];
        // $total_bolivares = $_POST['total_bolivares_venta_iva'];

        require_once ('../config/ConfigServer.php');
        require_once ('../modelo/modeloPrincipal.php');

        $id_venta = $_POST['id_venta'];
        $id_client = $_POST['id_cliente'];

        $query = modeloPrincipal::consultar("SELECT V.id_venta, V.fecha_venta, V.monto_total_dolares,
          V.monto_total_bolivares FROM venta AS V WHERE V.id_venta = $id_venta");
        
        $dataClient = modeloPrincipal::consultar("SELECT C.cedula, C.nombre 
          FROM cliente as C 
          WHERE C.id_cliente = $id_client");

        $dataClient = mysqli_fetch_array( $dataClient);

?>

      <main id="main" class="main">
        <div class="pagetitle">
          <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
          <h1 class="my-3"> Factura </h1>
        </div>

        <section class="section dashboard">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
              <div class="card top-selling overflow-auto">

                <div class="card-body p-3 table-responsive">
                  <h5 class="card-title text-center">Pollera La Chinita</h5>
                  
                    <div class="list-group-flush">
                      <ul class="list-decoration-none list-group-item list-unstyled">
                        <li class="list-item">RIF / C.I.:  <?= $dataClient['cedula'] ?></li>
                        <li class="list-item">RAZÓN SOCIAL:  <?= $dataClient['nombre'] ?></li>
                        <li class="list-item">DIRECCIÓN: <?php ?></li>
                        <li class="list-item">TOTAL DE ARTÍCULOS:  <?php ?></li>
                        <li class="list-item">CONDICIÓN DE PAGO: Pago inmediato</li>
                      </ul>
                    </div>        
                    <hr style="border-top: dotted; border-color: #000 !important;">
                    <h5 class="card-title text-center">FACTURA</h5>
                    <?php while($row = mysqli_fetch_array($query)){ 

                                  ?>
                    <div class="row">
                      <div class="col-12 row">
                        <p class="col-6 text-start">FACTURA:</p>
                        <p class="col-6 text-end"><?= $row['id_venta'] ?></p>
                        <p class="col-6 text-start">FECHA: <?= $fecha = date( 'Y-m-d' , strtotime($row['fecha_venta']));  ?></p>
                        <p class="col-6 text-end">HORA: <?= $hora = date( 'h:i:a' , strtotime($row['fecha_venta'])); ?></p>
                      </div>

                    </div>
                    <hr style="border-top: dotted; border-color: #000 !important;">
                    <div>
                      <div class="col-12 mb-2 row">
                        <p class="col-6 text-start">['código de producto'] (nombre del producto) (presentacion) (exento o no de iva)</p>
                        <p class="col-6 text-end">Bs (precio)</p>
                      </div>
                    </div>
                    <hr style="border-top: dotted; border-color: #000 !important;">
                    <div>
                      <div class="col-12 mb-2 row">
                        <p class="col-6 text-start">SUBTOTAL</p>
                        <p class="col-6 text-end">$ <?= $sub_total_dolar ?></p>
                      </div>
                      <div class="col-12 mb-2 row">
                        <p class="col-6 text-start">SUBTOTAL</p>
                        <p class="col-6 text-end">Bs <?= $sub_total_bolivares ?></p>
                      </div>
                    </div>
                    <hr style="border-top: dotted; border-color: #000 !important;">
                    <div>
                      <div class="col-12 mb-2 d-flex justify-content-between">
                        <p>BI G16,00%</p>
                        <p>Bs (subtotal) IVA G16,00%</p>
                        <p>Bs (iva del subtotal)</p>
                      </div>
                    </div>
                    <hr style="border-top: dotted; border-color: #000 !important;">
                    <div>
                      <div class="col-12 mb-2 row">
                        <p class="col-6 text-start">TOTAL</p>
                        <p class="col-6 text-end">Bs (total)</p>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
      <script src="./js/detalles_listas.js"></script>
    </body>
  </html>
<?php } ?>