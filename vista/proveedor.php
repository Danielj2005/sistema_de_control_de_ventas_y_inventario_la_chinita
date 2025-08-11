<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion
$fecha_actual = date('Y-m-d');
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
        include_once "../include/header.php";
        // se incluye el menu lateral a la vista 
        include_once "../include/sliderbar.php"; ?>
        <input type="hidden" id="fecha_actual" name="fecha_actual" value="<?= $fecha_actual ?>">
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
                  
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <button modal="registrar" url="./modal/proveedor/historial.php" data-bs-toggle="modal" data-bs-target="#registrarProveedor" class="btn_modal btn btn-success bi bi-truck">&nbsp; Registrar un Proveedor</button>
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
                          <th class="col text-center <?= rol_model::verificar_rol('l_proveedores') == '1' ?  '' : 'd-none eraser>' ?>" scope="col">Detalles</th>
                          <th class="col text-center <?= rol_model::verificar_rol('m_proveedores') == '1' ?  '' : 'd-none eraser>' ?>" scope="col" class="text-center">Modificar</th>
                          <th class="col text-center <?= rol_model::verificar_rol('h_proveedores') == '1' ?  '' : 'd-none eraser>' ?>" scope="col" class="text-center">Historial de compras</th>
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
      
      <?php 
        include_once "./modal/plantillaModalCustom.php";  
        modalCustom ();
        include_once "./modal/plantillaModalRegistroCustom.php";  

        renderModal("registrarProveedor", "registrarProveedor",  "", "bi bi-truck", "Registro de Proveedor", "Registrar", "Cancelar");
        
        include_once "../include/footer.php";  
        include_once "../include/scripts_include.php"; 
        
        model_user::validar_sesion_activa($id_usuario);
        
        config_model::verificar_actualizacion_configuracion(); ?>
        <script>
            // Esta funcionalidad se encarga de mostrar un boton [const btnReportesFechas = document.getElementById('btnReportesFechas');]
            // para generar un reporte por fechas de las entradas registradas en el sistema
            function validateDate (id) {
              
              const btnReportesFechas = document.getElementById('btnReportesFechas_'+id);

              const msjDate = document.querySelector('.showThis_'+id);
              const dateToday = document.getElementById('fecha_actual').value;
              const fechaReporteInicio = document.getElementById(`fechaReporteInicio_${id}`).value;
              const fechaReporteFin = document.getElementById(`fechaReporteFin_${id}`).value;
              
              if (fechaReporteInicio != "" && fechaReporteFin != "") {
  
                  if (fechaReporteInicio > fechaReporteFin || fechaReporteInicio > dateToday || fechaReporteFin > dateToday) {
                      msjDate.classList.contains('d-none') ? msjDate.classList.remove('d-none') : '';
                      btnReportesFechas.classList.contains('d-none') ? '' : btnReportesFechas.classList.add('d-none');
                  }else{
                      msjDate.classList.contains('d-none') ? '' : msjDate.classList.add('d-none');
                      btnReportesFechas.classList.contains('d-none') ? btnReportesFechas.classList.remove('d-none') : btnReportesFechas.classList.add('d-none');
                  }
                  // Esta funcionalidad se encarga de resetear el input de las fechas seleccionadas para el reporte de entradas
                  // y también se encarga de ocultar nuevamente el boton de generar reporte.
                  btnReportesFechas.addEventListener('click', ()=>{
                      setTimeout(() => {
                          document.getElementById(`fechaReporteInicio_${id}`).value = '';
                          btnReportesFechas.classList.add('d-none');
                      }, 2000);
                  });
              }
            };
        </script>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de proveedores");
}