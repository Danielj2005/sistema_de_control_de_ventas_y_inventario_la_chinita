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
          <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
          <h1 class="my-3">Productos</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto pb-3">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <a class="btn btn-primary" href="./agregar_producto.php">Añadir Nuevo Producto</a>
                  <a class="btn btn-success" href="./categoria_producto.php">Añadir Categoría</a>
                  <a class="btn btn-primary" target="_blank" href="./reportes/lista_productos.php">Exportar Lista de Productos</a>
                </div>
                <div class="card-body pb-0">
                  <h5 class="card-title">Lista de Productos</h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="text-center col" scope="col">#</th>
                          <th class="text-center col" scope="col">NOMBRE DEL PRODUCTO</th>
                          <th class="col text-center" scope="col">PRECIO DE COMPRA EN $</th>
                          <th class="col text-center" scope="col">PRECIO DE COMPRA EN BS</th>
                          <th class="text-center col" scope="col">CANTIDAD ALMACENADA</th>
                          <th class="text-center col" scope="col">CATEGORIA</th>
                          <th class="text-center col" scope="col">ESTADO</th>
                        </tr>
                      </thead>
    
                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('producto'); ?>  
                      </tbody>
                    </table>
                  </div>
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