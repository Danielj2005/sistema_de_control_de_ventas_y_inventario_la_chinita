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
    <title>PRODUCTOS</title>

    <!-- Favicons -->
    <link href="img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template DataTable CSS File -->

    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jan 29 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

    <!-- ======= Header ======= -->
    <?php   include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php   include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle"> <h1>PRODUCTOS</h1> </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Top Selling -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">
                  
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="categoria_producto.php">AÑADIR NUEVO PRODUCTO</a>
                    <a class="btn btn-success" href="categoria_producto.php">AÑADIR CATEGORÍA</a>
                    <button type="button" class="btn btn-primary">EXPORTAR LISTA DE PRODUCTOS</button>
                  </div>

                  <div class="card-body pb-0">
                    <h5 class="card-title">LISTA DE PRODUCTOS</h5>

                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NOMBRE DEL PRODUCTO</th>
                          <th scope="col">PRECIO DE VENTA</th>
                          <th scope="col">CANTIDAD ALMACENADA</th>
                          <th scope="col">CATEGORIA</th>
                          <th scope="col">ESTATUS</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php include_once ("../include/lista_productos_include.php"); ?>
                      </tbody>

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
    <?php include_once("../include/footer.php"); ?>
    <!-- End Footer -->

    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>
  </html>
<?php } ?>