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

      <div class="pagetitle"> <h1>PRODUCTOS</h1> </div> <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">AÑADIR NUEVO PRODUCTO</h5>

                      <form id="añadir_producto" action="../controlador/producto_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                        
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">NOMBRE DEL PRODUCTO</label>
                            <div class="col-sm-12">
                              <input form="añadir_producto" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="nombre del producto" class="form-control" id="id" name="nombre">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">SELECCIONA EL TIPO DE CATEGORIA AL QUE PERTENECERA</label>
                            <div class="col-sm-12">
                              <select name="id" id="producto" class="form-select">
                                <option value="">SELECCIONA LA CATEGORÍA</option>
                                 <?php include("../include/listas_registros_include.php"); consultar_registros('categoria_opcion'); ?> 
                              </select>
                            </div>
                          </div>

                          <div class="text-center">
                            <button type="submit" form="añadir_producto" class="btn btn-success">AÑADIR PRODUCTO</button>
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