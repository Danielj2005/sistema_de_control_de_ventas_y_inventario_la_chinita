<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_rol');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Registro de Proveedores</title>
      
      <!-- metadatos -->  
      <?php 
        include_once("../include/meta_include.php");
        // ======= estilos y librerias css ======= 
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php 
        include_once("../include/header.php"); 
        include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle">
          <h1>
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./proveedor.php">&nbsp; Volver</a>
            Registrar Proveeedor
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row"> 
            <div class="col-12">
              <div class="card top-selling overflow-auto"> 
                <div class="card-body pb-0">
                  <h5 class="card-title">Datos del Proveeedor</h5> 
                  <form id="" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="modulo" value="Guardar">
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                          <option value="V-">V</option>
                          <option value="R-">RIF</option>
                          <option value="E-">E</option>
                          <option value="J-">J</option>
                        </select>
                        <input type="text" class="form-control" pattern="[0-9]{7,8}" minlength="6" maxlength="8" placeholder="ingresa la cédula / RIF" name="cedula" id="cedula" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" placeholder="ingresa el correo" id="correo" name="correo" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault05" class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" maxlength="11" name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                      <div class="text-start"> <p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p> </div>
                      <button type="submit" class="btn btn-success"> Registrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <?php 
        include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); 
      
        model_user::validar_sesion_activa($id_usuario);
        
        config_model::verificar_actualizacion_configuracion(); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("registro de proveedores");
}