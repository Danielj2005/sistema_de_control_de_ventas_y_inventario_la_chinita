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
      <title>SERVICIOS</title>
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
          <h1 class="my-3"> Servicios </h1> 
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <a class="btn btn-success" href="./agregar_servicio.php">Añadir Nuevo Servicio</a>
                  <button type="button" class="btn btn-primary">Exportar Menú</button>
                </div>
                <div class="card-body pb-3">
                  <h5 class="card-title">Lista de servicios</h5>
                  <table class="table table-striped table-responsive datatable" id="example">
                    <thead>
                      <tr>
                        <th class="col text-center"scope="col">#</th>
                        <th class="col text-center"scope="col">NOMBRE DEL PLATILLO</th>
                        <th class="col text-center"scope="col">PRECIO DE VENTA</th>
                        <th class="col text-center"scope="col">DESCRIPCIÓN</th>
                        <th class="col text-center"scope="col">ESTATUS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include("../include/listas_registros_include.php"); consultar_registros('menu'); ?>  
                    </tbody>
                  </table>
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