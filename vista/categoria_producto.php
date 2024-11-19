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
      <title>Categoría de Productos</title>
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
            Categoría
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12 col-sm-7 col-md-7 mb-3">
              <div class="card">
                <div class="card-body p-3 overflow-hidden">
                  <h5 class="card-title">Lista de Categorías</h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless table-striped datatable mb-3" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <th class="col text-center" scope="col">NOMBRE</th>
                          <th class="col text-center" scope="col">ESTADO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('categoria'); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-5 col-md-5 mb-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Añadir Nueva Categoría</h5>
                    <form id="añadir_categoria" action="../controlador/categoria_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                        <div class="row mb-3">
                          <label for="inputEmail3" class="col-form-label">Nombre de la Categoría</label>
                          <div class="col-sm-10">
                            <input form="añadir_categoria" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="ingresa el nombre" class="form-control" id="id" name="nombre">
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" form="añadir_categoria" class="btn btn-success">Añadir</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </main>
      <div class="msjFormSend"></div>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>