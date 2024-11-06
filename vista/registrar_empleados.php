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
    <title>EMPLEADOS</title>
    <!-- metadatos -->  
    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/meta_include.php"); ?>
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
      <?php
        // se incluye el header / encabezado a la vista
        include_once("../include/header.php"); 
        // se incluye el menu lateral a la vista 
        include_once("../include/sliderbar.php"); ?>
    <main id="main" class="main">
      <div class="pagetitle"><h1>EMPLEADOS</h1></div>
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
                          <label class="control-label">CÉDULA <span style="color:#f00;">*</span></label>
                          <div class="input-group">
                            <select name="nacionalidad" class="form-select-sm col-sm-3 input-group-text" aria-label="Default select example">
                              <option name="nacionalidad" value="V-">V</option>
                              <option name="nacionalidad" value="E-">E</option>
                            </select>
                            <input class="form-control" required pattern="[0-9]{7,8}" type="text" name="cedula" id="cedula" maxlength="8" placeholder="Ingrese la Cédula">
                          </div>
                        </div>
                      
                        <div class="mb-3 col-sm-6 ">
                          <label class="control-label">NOMBRE <span style="color:#f00;">*</span></label>
                          <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" maxlength="30" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="mb-3 col-sm-6 label-floathing form-group">
                          <label class="control-label">APELLIDO <span style="color:#f00;">*</span></label>
                          <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" maxlength="30" required="" placeholder="Ingrese el Apellido" class="form-control" id="apellido" name="apellido">
                        </div>

                        <div class="mb-3 col-sm-6 label-floathing form-group">
                          <label class="control-label">CORREO <span style="color:#f00;">*</span></label>
                          <input form="registro_empleado" type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}" maxlength="30" required="" placeholder="Ingrese el Correo" class="form-control" id="correo" name="correo">
                        </div>

                        <div class="mb-3 col-sm-6 label-floathing form-group">
                          <label class="control-label">TELÉFONO <span style="color:#f00;">*</span></label>
                          <input form="registro_empleado" type="text" pattern="[0-9]{11}" maxlength="11" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono" name="telefono">
                        </div>
                        
                        <div class="mb-3 col-sm-6 label-floathing form-group">
                          <label class="control-label">DIRECCIÓN <span style="color:#f00;">*</span></label>
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
                          <label class="control-label">Repetir Contraseña <span style="color:#f00;">*</span></label>
                          <input form="registro_empleado" type="password" pattern="[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9]{8,16}" maxlength="16" required="" placeholder="Ingrese la contraseña" class="form-control" id="password2" name="password2">
                        </div>
                      </div>
                      <div class="col-12 mb-1">
                        <div class="form-group">
                            <p class="form-p">Los Campos Con <span style="color:#f00;">*</span> Son Obligatorios</p>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" form="registro_empleado" class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp; REGISTRAR</button>
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
    <?php include_once("../include/footer.php"); ?>
    <?php include_once("../include/scripts_include.php"); ?>
  </body>
  </html>
<?php }else {
	// Redirigir al usuario a la página principal
	header('Location: ./inicio.php');
	exit();
	} 
?>