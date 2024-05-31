<?php 
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
  // Redirigir el acceso a la página sino inició de sesión
  header('Location: ../index.php');
  exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>VENTAS</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <?php   include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php   include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

  <main id="main" class="main">
      <div class="pagetitle"> <h1> VENTAS </h1> </div> 
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <div class="col-lg-3">

            <!-- Card with an image on top -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">TOTAL GENERADO</h5>
                <ul class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between">
                    <span>MONTÓ TOTAL (USD)</span>
                    <strong id="TotalUSD">0$</strong>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>MONTÓ TOTAL (BS)</span>
                    <strong id="TotalBS">0BS</strong>
                  </li>
                </ul>
              </div>
            </div>

          </div>

          <!-- Left side columns -->
          <div class="col-lg-9">
            <div class="row">
              <!-- Top Selling -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">

                  <div class="card-body pb-0">
                    <h5 class="card-title">VENTAS REALIZADAS</h5>

                              <form method="post">

           DESDE: <input style="border:right;" class="btn btn-sm btn-outline-secondary" type="date" name="fecha1" value="<?php echo $fecha1 ?>">
           HASTA: <input style="border:right;" class="btn btn-sm btn-outline-secondary" type="date" name="fecha2" value="<?php echo $fecha2 ?>">
           <button type="submit" class="btn btn-sm btn-outline-secondary">Buscar Fecha</button>
         </form>

                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NÚMERO DE FACTURA</th>
                          <th scope="col">NOMBRE DEL CLIENTE</th>
                          <th scope="col">PRODUCTO QUE COMPRÓ</th>
                          <th scope="col">CANTIDAD DE PODUCTOS</th>
                          <th scope="col">MONTO TOTAL SEGÚN TASA DEL DÍA</th>
                          <th scope="col">MONTO TOTAL MONEDA NACIONAL</th>
                          <th scope="col">FECHA</th>
                        </tr>
                      </thead>

                    </table>

                  </div>


                </div>



              </div>



              <!-- End Top Selling -->

            </div>              

          </div>
          <!-- End Left side columns -->
        </div>
      </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    
    <?php   include_once("../include/footer.php"); ?>
    <!-- End Footer -->
  
    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>

  </html>
<?php } ?>