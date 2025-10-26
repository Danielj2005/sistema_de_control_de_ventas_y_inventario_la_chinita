<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('m_cliente + l_cliente + h_cliente + f_cliente');

// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 4) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Clientes</title>
      <?php
        include_once "../include/meta_include.php"; 
        include_once "../include/css_include.php"; 
      ?>
    </head>
    <body>
      <?php 
        include_once "../include/header.php"; 
        include_once "../include/sliderbar.php"; 
      ?>
      <main id="main" class="main">
        <div class="pagetitle">
          <a class="btn btn-outline-secondary mb-3" href="./">
            <i class="bi bi-chevron-left"></i> 
            <span>Volver al Panel Principal</span>
          </a>
          <h1 class="my-3">Clientes</h1>
        </div>

        <section class="section dashboard">
          <div class="row m-0">
            <div class="col-12">
              <div class="card top-selling">
                <div class="row p-2 m-0">
                  <a target="_blank" href="./reportes/lista_clientes.php" class="btn btn-secondary">
                    <i class="bi bi-file-text"></i>
                    <span>Exportar Lista (.PDF)</span>
                  </a>
                </div>

                <hr>

                <div class="card-body pb-3">
                  <div class="table table-responsive" id="table">
                    <h5 class="card-title">Lista de Clientes</h5>
                    <table class="table table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="col" scope="col">#</th>
                          <th class="text-center col" scope="col">Cédula</th>
                          <th class="text-center col" scope="col">Nombre y Apellido</th>
                          <th class="text-center col" scope="col">Teléfono</th>
                          
                          <?php if (rol_model::verificar_rol('m_cliente') == '1') : ?>

                            <th class="text-center col" scope="col">Modificar</th>

                          <?php endif; if (rol_model::verificar_rol('h_cliente') == '1') : ?>

                            <th class="text-center col" scope="col">Ver Historial</th>

                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?= cliente_model::lista_clientes_registrados(); ?>  
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
        include_once "./modal/plantillaModalCustom.php";  
        modalCustom ();

        include_once "../include/footer.php"; 
        include_once "../include/scripts_include.php"; 
      
        model_user::validar_sesion_activa($id_usuario);
        config_model::verificar_actualizacion_configuracion(); 

        ?>
        
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de clientes");
}