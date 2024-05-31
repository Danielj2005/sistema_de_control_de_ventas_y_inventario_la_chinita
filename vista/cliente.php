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
    <title>CLIENTES</title>
    
    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
</head>
<body>

  <!-- ======= Header ======= -->
  <?php   include_once("../include/header.php"); ?><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php   include_once("../include/sliderbar.php"); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>CLIENTES</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                
                <button type="button" class="btn btn-success">EXPORTAR LISTA DE CLIENTES</button>

                <div class="card-body pb-0">
                  <h5 class="card-title">REGISTRO DE CLIENTES</h5>

                  <table class="table table-borderless datatable" id="example">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TELEFONO</th>
                        <th scope="col">MODIFICAR</th>
                        <th scope="col">VER HISTORAL</th>
                      </tr>
                    </thead>

                    <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('cliente'); ?>  
                     </tbody>

                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <div class="msjFormSend"></div>
   
  <!-- ======= Footer ======= -->
  <?php   include_once("../include/footer.php"); ?>

  <!-- End Footer -->
  <!-- ======= javascript ======= -->
  <?php include_once("../include/scripts_include.php"); ?>
  <!-- End javascript -->
</body>
</html>
<?php } ?>