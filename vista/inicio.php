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
    <title>INICIO</title>

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
      <div class="pagetitle"> <h1> INICIO </h1> </div>
      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">TOTAL GENERADO EN EL DIA</h5>
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
          <div class="col-lg-9">
            <div class="row">
              <div class="col-12">
                <div class="card top-selling overflow-auto">

                  <div class="card-body pb-0">
                    <h5 class="card-title">ÚLTIMAS VENTAS REALIZADAS</h5>

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
            </div>             
          </div>
        </div>
      </section>
    </main>
    <!-- ======= Footer ======= -->
    <?php   include_once("../include/footer.php"); ?>
   
    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <script src="">
    function consulta_tasa_dolar(){
        
        let tasa_dolar = document.getElementById('tasa_dolar');

        $.ajax({
            url:   "../include/consulta_tasa_dolar_include.php",
            type:  'post',
            success:  function (){

                if(valores.existe == 1){

                    tasa_dolar.insertAdjacentText('beforeend',valores.dolar + '$');
                }
            }
        });
      }

    </script>
  </body>
  </html>
<?php } ?>