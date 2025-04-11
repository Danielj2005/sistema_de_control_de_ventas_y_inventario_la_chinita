<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$id_usuario = $_SESSION['id_usuario']; // recibimos el id del usuario que incio sesión

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'][$id_usuario] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin autenticación previa.","Se ha registrado un intento de acceso al sistema de manera incorrecta por parte de un usuario no autenticado.");
	header('Location: ../index.php');
	exit();
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::verificar_rol('m_cliente');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Modificar Clientes</title>
      <!-- metadatos -->  
      <?php include_once("../include/meta_include.php"); ?>
      <!-- ======= estilos y librerias css ======= -->
      <?php include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php   
        include_once("../include/header.php");
        include_once("../include/sliderbar.php");

        $id = $_POST['valor'];

        $consulta = modeloPrincipal::consultar("SELECT * FROM cliente where id_cliente ='$id'");
        $mostrar = mysqli_fetch_array($consulta);


      ?>
      <main id="main" class="main">
        <div class="pagetitle">
          <h1> 
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./cliente.php">&nbsp; Volver</a>
            Clientes
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row justify-content-center">
            <div class="col-6">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 pb-3">
                  <h5 class="card-title">Modificar Cliente</h5>
                  <form method="post" action="../controlador/cliente_controller.php" class="SendFormAjax" data-type-form="update">

                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="modulo" value="modificar">

                    <div class="row mb-3">
                      <div class="col-12 mb-3">
                        <label class="form-label">Cédula <span style="color:#f00;">*</span></label>
                        <input type="text" class=" <?php ($_SESSION['id_rol'] < "3") ? '' : 'bg-dark-subtle' ?> form-control" id="cedula" value="<?= $mostrar['cedula']; ?>" <?php ($_SESSION['id_rol'] < "3") ? '' : 'readonly' ?> name="cedula">
                      </div>
                      <div class="col-12 mb-3">
                        <label class="form-label">Nombre y Apellido <span style="color:#f00;">*</span></label>
                        <input type="text" class=" <?php ($_SESSION['id_rol'] < "3") ? '' : 'bg-dark-subtle' ?> form-control" value="<?= $mostrar['nombre']; ?>" <?php ($_SESSION['id_rol'] < "3") ? '' : 'readonly' ?> name="nombre">
                      </div>
                      <div class="col-12 mb-3">
                        <label class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                        <input type="text" class="form-control" value="<?= $mostrar['telefono']; ?>" name="telefono">
                      </div>
                    </div>
                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Modificar</button>
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
  modeloPrincipal::bitacora("Intento de acceso no autorizado a la pantalla modificación de un cliente.","Se ha registrado un intento de acceso incorrecto a la pantalla modificación de un cliente por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
  header('Location: ./inicio.php');
}