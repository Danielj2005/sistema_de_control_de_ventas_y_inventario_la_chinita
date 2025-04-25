<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {  
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin autenticación previa.","Se ha registrado un intento de acceso al sistema de manera incorrecta por parte de un usuario no autenticado.");
	header('Location: ../index.php');
	exit();
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::permisos_modulos('r_cliente + m_cliente + l_cliente');

// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Clientes</title>
      <?php
        include_once("../include/meta_include.php"); 
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php 
        include_once("../include/header.php"); 
        include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle">
          <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
          <h1 class="my-3">Clientes</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-12 mb-3 row m-0">
                    <a target="_blank" href="./reportes/lista_clientes.php" class="col-12 btn btn-success">Exportar Lista de Clientes</a>
                  </div>
                </div>
                <div class="card-body pb-3">
                  <div class="table table-responsive" id="table">
                    <h5 class="card-title">Lista de Clientes</h5>
                    <table class="table table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="col" scope="col">#</th>
                          <th class="text-center col" scope="col">CÉDULA</th>
                          <th class="text-center col" scope="col">NOMBRE</th>
                          <th class="text-center col" scope="col">TELÉFONO</th>
                          <th class="text-center col" scope="col">MODIFICAR</th>
                          <th class="text-center col" scope="col">VER HISTORAL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('cliente'); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <!-- Modal detalles de venta -->
      <div class="modal fade" id="historial_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content" id="detalles_historial_cliente">
            
          </div>
        </div>
      </div>

      <?php 
        include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); ?>
      <script src="./js/detalles_listas.js"></script>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  modeloPrincipal::bitacora("Intento de acceso no autorizado a la pantalla lista de clientes.","Se ha registrado un intento de acceso incorrecto a la pantalla lista de clientes por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
  header('Location: ./inicio.php');
}