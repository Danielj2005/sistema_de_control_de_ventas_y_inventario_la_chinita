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
      <title>Inventario</title>
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
        <div class="pagetitle row">
          <div class="col-6 mb-4">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            <h1 class="my-3"> Inventario </h1>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Exportar Entradas en un Rango de Fechas</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>
          </div>
        </div>
        <section class="section dashboard">
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card top-selling ">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a type="button" class="col-12 btn btn-success" href="registrar_entrada.php">Registrar Nueva Entrada</a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-primary" target="_blank" href="./reportes/lista_entradas.php">Exportar Lista de Entradas</a>
                  </div>
                </div>
                <div class="card-body pb-3">
                  <h5 class="card-title">Lista de Entradas</h5>
                  <table class="table table-borderless table-striped" id="example">
                    <thead>
                      <tr>
                        <th class="col text-center" scope="col">#</th>
                        <th class="col text-center" scope="col">PRODUCTO</th>
                        <th class="col text-center" scope="col">PROVEEDOR</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN $</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN BS</th>
                        <th class="col text-center" scope="col">CANTIDAD COMPRADA</th>
                        <th class="col text-center" scope="col">FECHA / HORA</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php include ('../include/lista_entradas_include.php'); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>