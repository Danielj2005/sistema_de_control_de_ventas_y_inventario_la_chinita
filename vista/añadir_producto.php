<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en"><?php 
session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>ENTRADAS DE PRODUCTOS</title>

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

    <div class="pagetitle">
      <h1>PODUCTO</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

              <a class="btn btn-success" href="categoria_producto.php">AÑADIR CATEGORÍA</a>


                <div class="card-body pb-0">
                  <h5 class="card-title">AGREGAR PRODUCTO</h5>



              <form method="post" action="../controlador/agregar_producto.php">

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">NOMBRE DEL PROCUCTO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" placeholder="NOMBRE DEL PODUCTO" name="nombre">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">CATEGORIA</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="categoria">
                        
                        <?php 

                          $consulta = "SELECT * FROM categoria";
                          $respuesta = mysqli_query($conn, $consulta);

                          while ( $mostrar = mysqli_fetch_array($respuesta)) {

                        ?>

                      <option selected value="<?php echo $mostrar['id_categoria']; ?>"><?php echo $mostrar['nombre']; ?></option>
                        

                    <?php } ?>

                     <option selected>SELECCIONE UNA CATEGORIA</option>

                    </select>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">AGREGAR</button>
                </div>
              </form>
              <div class="msjFormSend"></div>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
<?php   include_once("../include/footer.php"); ?>


  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


<script type="text/javascript" src="js/SendForm.js"></script>
<script type="text/javascript" src="js/sweet-alert.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- datatable js files -->


</body>

</html>

  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>Registro De Productos</title>

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

              <!-- Top Selling -->
              <div class="col-lg-6">
                <div class="card">

                  <div class="card-body pb-0">
                    <h5 class="card-title">LISTA DE PRODUCTOS</h5>

                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NOMBRE</th>
                        </tr>
                      </thead>

                      <tbody>
                          <?php include ('../include/lista_productos_include.php'); ?>
                      </tbody>

                    </table>

                  </div>

                </div>
              </div><!-- End Top Selling -->

              <div class="col-lg-6">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">AÑADIR NUEVO PRODUCTO</h5>

                      <form id="añadir_producto" action="../controlador/producto_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                        
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">NOMBRE DEL PRODUCTO</label>
                            <div class="col-sm-10">
                              <input form="añadir_producto" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="nombre del producto" class="form-control" id="id" name="nombre">
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