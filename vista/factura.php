<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
  // Redirigir el acceso a la página sino inició de sesión
  header('Location: ../index.php');
  exit();
  
}else{ 
  
  require_once ('../config/ConfigServer.php');
  require_once ('../modelo/modeloPrincipal.php');
  ?>
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
        include_once("../include/sliderbar.php"); ?>

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
                      <li class="list-item">RIF / C.I.: V-12345678</li>
                      <li class="list-item">RAZÓN SOCIAL: nombre del cliente</li>
                      <li class="list-item">DIRECCIÓN: </li>
                      <li class="list-item">TOTAL DE ARTÍCULOS: 5</li>
                      <li class="list-item">CONDICIÓN DE PAGO: Pago inmediato</li>
                    </ul>
                  </div>        
                  <hr style="border-top: dotted; border-color: #000 !important;">
                  <h5 class="card-title text-center">FACTURA</h5>
                  <div class="row">
                    <div class="col-12 row">
                      <p class="col-6 text-start">FACTURA:</p>
                      <p class="col-6 text-end">12345678</p>
                      <p class="col-6 text-start">FECHA: 19-11-2024</p>
                      <p class="col-6 text-end">HORA: 17:20</p>
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
                      <p class="col-6 text-end">Bs (subtotal)</p>
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