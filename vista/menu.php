<?php 
session_start();

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_servicio + m_servicio + l_servicio');
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
                <div class="row p-4 text-center">
                  <div class="col-12 col-sm-12 col-md-12 mb-2 row m-0">
                    <a type="button" class="col-12 btn btn-success" href="<?= rol_model::verificar_rol('r_servicio') == '1' ? './agregar_servicio.php' : './menu.php'?>">Añadir Nuevo Servicio</a>
                  </div>
                  <div class="d-none col-12 col-sm-12 col-md-6 mb-2 row m-0">
                    <a class="col-12 btn btn-primary" target="_blank" href="./reportes/menu.php">Exportar Menú</a>
                  </div>
                </div>
                <hr>
                <div class="card-body pb-3">
                  <h5 class="card-title">Lista de servicios</h5>
                  <table class="table table-striped table-responsive datatable" id="example">
                    <thead>
                      <tr>
                        <th class="col text-center"scope="col">#</th>
                        <th class="col text-center"scope="col">NOMBRE</th>
                        <th class="col text-center"scope="col">PRECIO DE VENTA EN $</th>
                        <th class="text-center col" scope="col">DETALLES</th>
                        <th class="text-center col" scope="col">MODIFICAR</th>
                        <th class="col text-center"scope="col">ESTADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php servicio_model::lista(); ?>  
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
            <div class="modal-body" id="body_modal">
            </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once ("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once ("../include/scripts_include.php");
      
        model_user::validar_sesion_activa($id_usuario);

				config_model::verificar_actualizacion_configuracion(); 
		
				?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de servicios");
}