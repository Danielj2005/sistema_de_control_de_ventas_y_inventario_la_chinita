<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_cliente + m_cliente + l_cliente');

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
                <div class="row p-4 mb-3">
                  <a target="_blank" href="./reportes/lista_clientes.php" class="btn btn-secondary">Exportar Lista de Clientes</a>
                </div>
                <hr>
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
                        <?= cliente_model::lista_clientes_registrados (); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
			<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable modal-lg">
					<div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row" id="body_modal">  </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
				</div>
			</div>

      <?php 
        include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); 
      
        model_user::validar_sesion_activa($id_usuario);
        config_model::verificar_actualizacion_configuracion(); 

        ?>
        
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de clientes");
}