<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else if ($_SESSION['id_rol'] < "3"){ ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Empleados</title>
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
          <h1 class="my-3">Empleados</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-primary" href="./registrar_empleados.php">Registar Empleado</a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_empleados.php" class=col-12 "btn btn-success">Exportar Lista de Empleados</a>
                  </div>
                </div>
                <div class="card-body pb-3">
                  <div class="table-responsive">
                    <h5 class="card-title">Lista de Empleados</h5>
                    <table class="table table-borderless table-striped datatable" id="example">
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
<?php }else {
	// Redirigir al usuario a la página principal
	header('Location: ./inicio.php');
	exit();
	} 
?>