<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_empleado');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Empleados</title>
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
          <h1>
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./lista_empleados.php"> Volver </a>
            Empleados
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Registrar un nuevo Empleado</h5>
                      <form id="registro_empleado" autocomplete="off" action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="save">
                        <input type="hidden" name="modulo" value="Guardar">
                        <div class="row">
                          <div class="mb-3 col-sm-6">
                            <label class="control-label">Cédula <span style="color:#f00;">*</span></label>
                            <div class="input-group">
                              <select name="nacionalidad" class="form-select-sm col-sm-3 input-group-text" aria-label="Default select example">
                                <option name="nacionalidad" value="V-">V</option>
                                <option name="nacionalidad" value="E-">E</option>
                              </select>
                              <input class="form-control" required pattern="[0-9]{7,8}" type="text" name="cedula" id="cedula" maxlength="8" placeholder="Ingrese la Cédula">
                            </div>
                          </div>
                        
                          <div class="mb-3 col-sm-6 ">
                            <label class="control-label">Nombre <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,100}" maxlength="100" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre" name="nombre">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Apellido <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,100}" maxlength="100" required="" placeholder="Ingrese el Apellido" class="form-control" id="apellido" name="apellido">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Correo <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,200}" maxlength="200" required="" placeholder="Ingrese el Correo" class="form-control" id="correo" name="correo">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Teléfono <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[0-9]{11}" maxlength="11" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono" name="telefono">
                          </div>
                          
                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Dirección <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" maxlength="250" required="" placeholder="Ingrese la Dirección" class="form-control" id="direccion" name="direccion">
                          </div>

                          <div class="mb-3 col-sm-12 label-floathing">
                            <div class="form-group">
                              <label class="control-label">Tipo de Usuario <span style="color:#f00;">*</span></label>
                              <select  class="form-select" name="id_tipo" id="id_tipo">
                                  <option disabled="disabled" selected="true" class="form-control" >selecciona una opción</option>
                                  <?php rol_model::option(); ?>  
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mb-1">
                          <div class="form-group">
                              <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" form="registro_empleado" class="btn btn-success">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php");  
      
        model_user::validar_sesion_activa($id_usuario);
        
        config_model::verificar_actualizacion_configuracion(); ?>
    </body>
  </html>

<?php } else {
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("registro de empleados");
}