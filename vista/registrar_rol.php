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
      <!-- titulo -->
      <title>Productos</title>
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
          <h1>
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./productos.php">&nbsp; Volver</a>
            Producto
          </h1> 
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Añadir Nuevo Producto</h2>
                    <form id="añadir_producto" action="../controlador/producto_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                      <input type="hidden" name="modulo" value="Guardar">
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="col-form-label">Cógido Del Producto <span style="color:#f00;">*</span></label>
                          <div class="col-sm-12">
                            <input type="text" pattern="[0-9]{4,30}" required="" placeholder="ingresa el código del producto" class="form-control" id="codigo_producto" name="codigo_producto">
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="col-form-label">Nombre Del Producto <span style="color:#f00;">*</span></label>
                          <div class="col-sm-12">
                            <input form="añadir_producto" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="ingresa el nombre del producto" class="form-control" id="nombre_producto" name="nombre_producto">
                          </div>
                        </div>
                        <!-- selector de categoría  -->
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="col-form-label">Selecciona una Categoría <span style="color:#f00;">*</span></label>
                          <div class="col-sm-12">
                            <select name="id_categoria" id="categoria" class="form-select">
                              <option value="">Selecciona una opción</option>
                              <?php include("../include/listas_registros_include.php"); consultar_registros('categoria_opcion'); ?> 
                            </select>
                          </div>
                        </div>
                        <!-- selector de presentacion -->
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="col-form-label">Selecciona una Presentación <span style="color:#f00;">*</span></label>
                          <div class="col-sm-12">
                            <select name="id_presentacion" id="select_presentacion" class="form-select">
                              <option value="0">Selecciona una opción</option>
                              <?php require_once ('../include/select_dinamico.php');?>
                            
                            </select>
                          </div>
                        </div>

                        <div class="col-12 mb-1">
                          <div class="form-group">
                              <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" form="añadir_producto" class="btn btn-success zmdi zmdi-floppy">&nbsp; Añadir</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </main>
      
      <script type="text/javascript" src="./js/selector_dinamico.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>