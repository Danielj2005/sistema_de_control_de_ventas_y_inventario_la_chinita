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
    <title>CATEGORIA DE PRODUCTOS</title>

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

      <div class="pagetitle">
        <h1>CATEGORÍA</h1>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Top Selling -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body pb-0">
                    <h5 class="card-title">LISTA DE CATEGORÍAS</h5>
                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NOMBRE DE LA CATEGORÍA</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('categoria'); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">AÑADIR NUEVA CATEGORÍA</h5>

                      <form id="añadir_categoria" action="../controlador/categoria_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                        
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">NOMBRE DE LA CATEGORÍA</label>
                            <div class="col-sm-10">
                              <input form="añadir_categoria" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="NOMBRE DE LA CATEGORÍA" class="form-control" id="id" name="nombre">
                            </div>
                          </div>

                          <div class="text-center">
                            <button type="submit" form="añadir_categoria" class="btn btn-success">AÑADIR CATEGORÍA</button>
                          </div>

                      </form>

                    </div>
                  </div>
            </div>

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
<?php } ?>