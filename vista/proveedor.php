<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario que inició sesión

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

$fecha_actual = date('Y-m-d'); // se guarda la fecha actual para su posterior uso

// se guardan los permisos del rol del usuario que inició sesión
$r_proveedores = rol_model::permisos_modulos('r_proveedores');
$l_proveedores = rol_model::permisos_modulos('l_proveedores');
$m_proveedores = rol_model::permisos_modulos('m_proveedores');
$h_proveedores = rol_model::permisos_modulos('h_proveedores');

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
                  
                  <div id="btn_register_container" class="col-12 col-sm-12 mb-3 row m-0 <?= $r_proveedores == 1 ? '' : 'd-none eraser'; ?> <?= $l_proveedores == 1 ? 'col-md-6' : 'd-none'; ?>">
                    <button id="btn_register" onclick="toggle()" class="btn btn-success bi ">&nbsp; Registrar un Proveedor</button>
                  </div>

                  <div class="col-12 col-sm-12 mb-3 row m-0 <?= $r_proveedores == 1 && $l_proveedores == 0 ? 'col-md-12' : 'col-md-6'; ?>">
                    <a class="col-12 btn btn-secondary" 
                      target="_blank" 
                      href="./reportes/lista_proveedores.php">
                        Exportar Lista de Proveedores
                    </a>
                  </div>
                </div>

                <hr>

                <div class="card-body pb-0">
                  
                  <div class="hidden table table-responsive <?= $l_proveedores == 0 ? 'd-none' : ''; ?> ">
                    <h5 class="card-title">Lista de Proveedores</h5>
                    <table class="table table-borderless table-striped example" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <th class="col text-center" scope="col">Cédula / Rif</th>
                          <th class="col text-center" scope="col">Nombre</th>
                          <th class="col text-center <?= $l_proveedores == '1' ?  '' : 'd-none eraser' ?>" scope="col">Detalles</th>
                          <th class="col text-center <?= $m_proveedores == '1' ?  '' : 'd-none eraser' ?>" scope="col" class="text-center">Modificar</th>
                          <th class="col text-center <?= $h_proveedores == '1' ?  '' : 'd-none eraser' ?>" scope="col" class="text-center">Historial de compras</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php proveedor_model::lista_proveedores_registrados(); ?>  
                      </tbody>
                    </table>
                  </div>

                  <div class="hidden <?= $l_proveedores == 1 ? 'd-none' : ''; ?> <?= $r_proveedores == 1 ? '' : 'd-none eraser'; ?>">
                    <h5 class="card-title">Registro de Proveedores</h5>

                    <form id="formularioRegistrar" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                        <input type="hidden" name="modulo" value="Guardar">
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                            <div class="col-md-4 input-group">
                                <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                                    <option value="V-">V</option>
                                    <option value="E-">E</option>
                                    <option value="G-">G</option>
                                    <option value="J-">J</option>
                                    <option value="P-">P</option>
                                    <option value="R-">RIF</option>
                                </select>
                                <input type="text" class="form-control" pattern="[0-9]{7,8}" minlength="6" maxlength="8" placeholder="ingresa la cédula / RIF" name="cedula" id="cedula" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                            <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                            <input type="text" class="form-control" placeholder="ingresa el correo" id="correo" name="correo" required>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <label for="validationDefault05" class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                            <input type="text" class="form-control" maxlength="11" name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                            <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                            <input type="text" class="form-control" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                            <div class="text-start"> <p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p> </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                          <button type="submit" form="formularioRegistrar" class="btn btn-success bi bi-plus">&nbsp;Registrar</button>
                        </div>
                    </form>
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
        
        config_model::verificar_actualizacion_configuracion(); ?>
        <script>
          // funcion para mostrar y ocultar elementos en proveedores
          const titlex = ['Ver lista de provedores registrados','Registrar un Proveedor'];
          const btnToggle = document.getElementById('btn_register');

          const toggle = ()=>{
            const hiddenElements = document.querySelectorAll('.hidden');
            hiddenElements.forEach(element => {
              element.classList.toggle('d-none');

              btnToggle.classList.toggle('bi-truck');
              btnToggle.classList.toggle('btn-secondary');
              btnToggle.classList.toggle('btn-success');
              btnToggle.classList.toggle('bi-list-columns-reverse');
              btnToggle.textContent = btnToggle.textContent == titlex[0] ? titlex[1] : titlex[0];
            });
          };
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