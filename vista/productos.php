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
    <?php   include_once("../include/header.php"); ?>
    <?php   include_once("../include/sliderbar.php"); ?>
    <main id="main" class="main">
      <div class="pagetitle"> <h1>PRODUCTOS</h1> </div>
      <section class="section dashboard">
        <div class="row">
          <div class="col-12">
            <div class="card top-selling overflow-auto pb-3">
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-primary" href="./agregar_producto.php">AÑADIR NUEVO PRODUCTO</a>
                <a class="btn btn-success" href="./categoria_producto.php">AÑADIR CATEGORÍA</a>
                <a class="btn btn-primary" target="_blank" href="./reportes/lista_productos.php">EXPORTAR LISTA DE PRODUCTOS</a>
              </div>
              <div class="card-body pb-0">
                <h5 class="card-title">LISTA DE PRODUCTOS</h5>
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
    <?php include_once("../include/footer.php"); 
      include_once("../include/scripts_include.php"); ?>
  </body>
  </html>
<?php } ?>