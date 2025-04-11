<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$id_usuario = $_SESSION['id_usuario']; // recibimos el id del usuario que incio sesión

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'][$id_usuario] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin autenticación previa.","Un usuario intento acceder al sistema de manera incorrecta.");
	header('Location: ../index.php');
	exit();
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::verificar_rol('r_rol');
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
                  <form id="añadir_producto" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="modulo" value="Guardar">
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault01" class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                          <option value="V-">V</option>
                          <option value="R-">RIF</option>
                          <option value="E-">E</option>
                        </select>
                        <input type="text" class="form-control"  placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" placeholder ="ingresa el correo" id="correo" name="correo" required>
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
                      <button name="registrar" class="btn btn-success"> Registrar</button>
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
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  modeloPrincipal::bitacora("Intento de acceso no autorizado a la pantalla registro de proveedores.","Se ha registrado un intento de acceso incorrecto a la pantalla registro de proveedores por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
  header('Location: ./inicio.php');
}