<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_proveedores + m_proveedores + l_proveedores + h_proveedores');
// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 4) {  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Proveedores</title>
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
          <div class="col-12 col-sm-12 col-md-12 mb-4">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            <h1 class="mt-3"> Proveedores </h1>
          </div>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling">
                <div class="row p-2 text-center">
                  
                  <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <a class="col-12 btn btn-success" 
                      href="./<?= rol_model::verificar_rol('r_proveedores') == 1 ? 'registrar_proveedores.php' : 'proveedor.php' ?>">
                        Registrar Proveedor
                    </a>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-secondary" 
                      target="_blank" 
                      href="./reportes/lista_proveedores.php">
                        Exportar Lista de Proveedores
                    </a>
                  </div>
                </div>

                <hr>

                <div class="card-body pb-0">
                  <h5 class="card-title">Lista de Proveedores</h5>
                  
                  <div class="table table-responsive">
                    <table class="table table-borderless table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <th class="col text-center" scope="col">Cédula / Rif</th>
                          <th class="col text-center" scope="col">Nombre</th>
                          <th class="col text-center" scope="col">Detalles</th>
                          <th class="col text-center" scope="col" class="text-center">Modificar</th>
                          <th class="col text-center" scope="col" class="text-center">Historial de compras</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php proveedor_model::lista_proveedores_registrados(); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      
      <div class="responseProcess text-white">
        <div class="container-loader">
          <div class="loader">
            <i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
          </div>
          <p class="text-center lead text-white">Ocurrio un problema, recargue la página e intente nuevamente o presione F5</p>
        </div>
      </div>



			<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable modal-xl">
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


			<!-- lógica de los modales -->
			<script src="./js/modal.js"></script>
      
      <?php   
        include_once("../include/footer.php");  
        include_once("../include/scripts_include.php"); 
      
        model_user::validar_sesion_activa($id_usuario);
        
        config_model::verificar_actualizacion_configuracion(); ?>
        
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de proveedores");
}