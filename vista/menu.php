<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin iniciar sesión","Un usuario intento acceder al sistema de manera incorrecta.");
	header('Location: ../index.php');
	exit();
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::permisos_modulos('r_servicio + m_servicio + l_servicio');
// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) { ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Servicios</title>
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
              <div class="card top-selling">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-12 mb-3 row m-0">
                    <a type="button" class="col-12 btn btn-success" href="<?= modeloPrincipal::verificar_rol('r_servicio') == '1' ? './agregar_servicio.php' : './menu.php'?>">Añadir Nuevo Servicio</a>
                  </div>
                  <div class="d-none col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-primary" target="_blank" href="./reportes/menu.php">Exportar Menú</a>
                  </div>
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
                        <th class="text-center col" scope="col">MODIFICAR</th>
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
      
      <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificación de un servicio</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="update_user_info" action="../controlador/menu_controlador.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update">
                <div id="body_modal" class="row"> </div>
              </form>
            </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" form="update_user_info" type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- modal modificar -->
      <script src="./js/modal.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  modeloPrincipal::bitacora("Intentó acceder sin permisos a la pantalla lista de servicios.","El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.");
  header('Location: ./inicio.php');
}