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
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>EMPLEADOS</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
    <?php include_once("../include/header.php"); 
      include_once("../include/sliderbar.php"); ?>
    <main id="main" class="main">
      <div class="pagetitle"><h1>EMPLEADOS</h1></div>
      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="./registrar_empleados.php">Registar Empleado</a>
                    <a target="_blank" href="./reportes/lista_empleados.php" class="btn btn-success">Exportar Lista De Empleado</a>
                  </div>
                  <div class="card-body pb-3">
                    <h5 class="card-title">LISTA DE EMPLEADOS</h5>
                    <table class="table table-borderless table-responsive table-striped datatable" id="example">
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
        </div>
      </section>
    </main>
    <div class="msjFormSend"></div>
    <?php include_once("../include/footer.php"); ?>
    <?php include_once("../include/scripts_include.php"); ?>
  </body>
  </html>
<?php }else {
	// Redirigir al usuario a la página principal
	header('Location: ./inicio.php');
	exit();
	} 
?>