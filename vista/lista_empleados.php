<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else if ($_SESSION['tipo_usuario'] == "1"){ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>EMPLEADOS</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>

    <!-- ======= Header ======= -->
    <?php include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle"><h1>EMPLEADOS</h1></div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Top Selling -->
              <div class="col-lg-12">
                <div class="card">

                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="./registrar_empleados.php">Registar Empleado</a>
                    <button type="button" class="btn btn-success">Exportar Lista De Empleado</button>
                  </div>
                  <div class="card-body pb-3">
                    <h5 class="card-title">LISTA DE EMPLEADOS</h5>

                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">CÉDULA</th>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">APELLIDO</th>
                          <th scope="col">TELÉFONO</th>
                          <th scope="col" class="text-center">ESTADO</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('usuario'); ?>  
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
    
    <?php include_once("../include/footer.php"); ?>
    <!-- End Footer -->

    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>
  </html>
<?php }else {
	// Redirigir al usuario a la página principal
	header('Location: ./inicio.php');
	exit();
	} 
?>