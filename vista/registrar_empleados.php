<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else if ($_SESSION['rol'] == "1"){  ?> 
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./lista_empleados.php">Volver</a>
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
                      <form id="registro_empleado" action="../controlador/usuario_controller.php" method="post" class="SendFormAjax"  data-type-form="save">
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
                            <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" maxlength="30" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre" name="nombre">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Apellido <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" maxlength="30" required="" placeholder="Ingrese el Apellido" class="form-control" id="apellido" name="apellido">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Correo <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}" maxlength="30" required="" placeholder="Ingrese el Correo" class="form-control" id="correo" name="correo">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Teléfono <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" pattern="[0-9]{11}" maxlength="11" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono" name="telefono">
                          </div>
                          
                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Dirección <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="text" maxlength="50" required="" placeholder="Ingrese la Dirección  " class="form-control" id="direccion" name="direccion">
                          </div>

                          <div class="mb-3 col-sm-12 label-floathing">
                            <div class="form-group">
                              <label class="control-label">Tipo de Usuario <span style="color:#f00;">*</span></label>
                              <select  class="form-select" name="id_tipo" id="id_tipo">
                                  <option disabled="disabled" selected="true" class="form-control" >selecciona una opción</option>
                                  <?php include("../include/listas_registros_include.php"); consultar_registros('rol');?>  
                              </select>
                            </div>
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Contraseña <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="password" pattern="[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9]{8,16}" maxlength="16" required="" placeholder="Ingrese la contraseña" class="form-control" id="password" name="password">
                          </div>

                          <div class="mb-3 col-sm-6 label-floathing form-group">
                            <label class="control-label">Repetir contraseña <span style="color:#f00;">*</span></label>
                            <input form="registro_empleado" type="password" pattern="[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9]{8,16}" maxlength="16" required="" placeholder="Ingrese la contraseña" class="form-control" id="password2" name="password2">
                          </div>
                        </div>
                        <div class="col-12 mb-1">
                          <div class="form-group">
                              <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" form="registro_empleado" class="btn btn-success zmdi zmdi-floppy">&nbsp; Registrar</button>
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
      <div class="msjFormSend"></div>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php }else {
	// Redirigir al usuario a la página principal
	header('Location: ./inicio.php');
	exit();
	} 
?>