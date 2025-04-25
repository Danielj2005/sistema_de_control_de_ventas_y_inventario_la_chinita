<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin autenticación previa.","Se ha registrado un intento de acceso al sistema de manera incorrecta por parte de un usuario no autenticado.");
	header('Location: ../index.php');
	exit();
  
}else{ ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Mi Perfil</title>
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
        <div class="pagetitle"><h1>Mi Perfil</h1></div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body pb-3">
                      <!-- informacion del usuario -->
                      <?php require_once ("../include/datos_usuario_include.php"); ?>
                      <div class="mi_informacion_container col-10 col-lg-12 my-3">
                        <fieldset class="row mb-3">
                            <legend class="col-12 col-sm-12"><i class="bi bi-person"></i> &nbsp;Información personal</legend>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                  <label class="control-label">Cédula</label>
                                  <input type="text" pattern="[0-9\-]{1,30}" class="form-control" value="<?= $cedula_user; ?>" id="cedula" name="cedula" readOnly="true" maxlength="9">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                <label class="control-label">Nombres</label>
                                <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" class="form-control" value="<?= $nombre_user; ?>" id="nombres" name="nombres" readOnly="true" maxlength="30">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                <label class="control-label text-black">Apellidos</label>
                                  <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" class="form-control" value="<?= $apellido_user; ?>" id="apellido" name="apellido" readOnly="true" maxlength="30">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                <label class="control-label">Correo</label>
                                <input type="email" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ\@\.\0-9]{3,30}" class="form-control" value="<?= $correo_user; ?>" id="email" name="email" readOnly="true" maxlength="30">
                              </div>
                            </div>

                        </fieldset>
                        <hr>
                        <fieldset class="row mb-4">
                            <legend><i class="bi-person-circle"></i> &nbsp;Datos de la Cuenta</legend>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                  <label class="control-label">Nombre de Usuario</label>
                                  <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ\@\.\0-9]{3,30}" class="form-control" value="<?= $correo_user; ?>" id="nombres" name="nombres" readOnly="true" maxlength="30">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="control-label">Tipo de Usuario</label>
                                    <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ]{3,30}" class="form-control" value="<?= $rol_usuario; ?>" id="tipo_usuario" name="tipo_usuario" readOnly="true" maxlength="30">
                                </div>
                            </div>
                            <div class="col-12 my-4 text-center d-flex justify-content-end">
                                <button type="submit" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#info_user"><i class='zmdi zmdi-refresh'></i> Actualizar</button>
                            </div>
                        </fieldset>
                        <hr>
                        <fieldset class="row">
                          <legend><i class="bi bi-shield"></i> &nbsp; Actualizar Pregunta de Seguridad</legend>
                          <div class="col-12 my-4 text-center d-flex justify-content-end">
                              <button type="submit" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#preguntas_seguridad"><i class='zmdi zmdi-refresh'></i> Actualizar</button>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <!-- Modal actualizar informacion del usuario -->
      <div class="modal fade" id="info_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="update_proveedor" action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="update">   
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Usuario</h5>
                <input type="hidden" name="modulo" value="Modificar_info_user">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex col-12 mb-3">
                  <div class="label-floating form-group col-md-12">
                    <label> Correo <span style="color: red; font-size: 20px;"> * <span></label>
                    <input type="email" value="<?php echo $correo_user; ?>" maxlength="60" class="form-control" id="usuario" name="usuario" placeholder="ingrese el correo">
                  </div>
                </div>
                <div class="d-flex col-12 mb-3">
                  <div class="contraseñas label-floating form-group col-md-12 position-relative">
                    <label> Contraseña Actual <span style="color: red; font-size: 20px;"> * <span></label>
                    <input type="password" required maxlength="30" class="input__field form-control" id="password_actual" name="password_actual" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="ingrese la contraseña actual">
                    <i class="bi bi-eye input__icon text-black position-absolute h3 m-0"></i>
                  </div>
                </div>
                <div class="d-flex col-12 mb-3">
                  <div class="contraseñas label-floating form-group col-md-12 position-relative">
                    <label> Contraseña Nueva <span style="color: red; font-size: 20px;"> * <span></label>
                    <input type="password" maxlength="30" class="input__field form-control" id="password" name="password" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="ingrese la contraseña nueva">
                    <i class="bi bi-eye input__icon text-black position-absolute h3 m-0"></i>
                  </div>
                </div>
                <div class="d-flex col-12 mb-3">
                  <div class="contraseñas label-floating form-group col-md-12 position-relative">
                    <label> Repetir Contraseña <span style="color: red; font-size: 20px;"> * <span></label>
                    <input type="password" maxlength="30" class="input__field form-control" id="password2" name="password2" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="repita la contraseña" >
                    <i class="bi bi-eye input__icon text-black position-absolute h3 m-0"></i>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <p class="form-p alert-danger" style="color:#f00;">Para Actualizar el USUARIO o la CONTRASEÑA debes ingresar la CONTRASEÑA ACTUAL.</p>
                  <p class="form-p">Los Campos Con <span style="color:#f00;">*</span> Son Obligatorios</p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal actualizar preguntas de segruidad -->
      <div class="modal fade" id="preguntas_seguridad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content col-md-8">
            <form id="update_proveedor" action="../controlador/preguntas_secretas_controller.php" method="post" class="SendFormAjax" data-type-form="update">   
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pregunta de Seguridad</h5>
                <input type="hidden" name="modulo" value="pregunta_seguridad">
                <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                <input type="hidden" name="primer_inicio" value="<?= $primer_inicio; ?>">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                  for($i = 1; $i < 4; $i++){
                    $preguntas_usuario = modeloPrincipal::consultar("SELECT * FROM preguntas_secretas AS P 
                      INNER JOIN seguridad AS S ON S.id_seguridad = P.id_pregunta 
                      WHERE P.numero_pregunta='$i' AND P.id_usuario = '$id_usuario'");

                    $preguntas_usuario = mysqli_fetch_array($preguntas_usuario);

                    $preguntas_seguridad_sistema = modeloPrincipal::consultar("SELECT * FROM  seguridad"); ?>

                    <div class="text-start col-12 col-sm-12 col-md-12 mb-3">
                        <label class="control-label h6" style="font-size: 1em;">Pregunta <?=$i?> <span style="color:#f00;">*</span></label>
                        
                        <select name="pregunta[<?=$i?>]" class="form-select" id="select_pregunta">
                          <div class="" id="pregunta[<?=$i?>]">
                            <option selected="true" disabled="">Selecciona una pregunta</option>
                            <?php 
                              while ($preguntas_sistema = mysqli_fetch_array($preguntas_seguridad_sistema)) {  ?>
                                <option  name="pregunta<?=$i?>" <?=$selected=(modeloPrincipal::decryption($preguntas_sistema['pregunta']) == modeloPrincipal::decryption($preguntas_usuario['pregunta']))? 'selected': '';?>><?= modeloPrincipal::decryption($preguntas_sistema['pregunta']); ?></option>
                            <?php } ?>    
                          </div>
                        </select>
                    </div>
                    <div class="text-start col-12 col-sm-12 col-md-12 mb-3">
                        <h6><strong>Respuesta <?=$i?> <span style="color: red;">*</span></strong></h6>
                        <input type="text" class="form-control ver respuesta" name="respuesta[<?= $i ?>]" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9.+ -*]{3,35}$" value="<?= $respuesta = modeloPrincipal::decryption($preguntas_usuario['respuesta']); ?>"><br>
                    </div> 
                <?php } ?>
                <div class="col-12 mb-1">
                    <div class="form-group">
                        <p class="form-p">Los Campos Con <span style="color:#f00;">*</span> Son Obligatorios</p>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <?php include_once("../include/footer.php"); ?>
      <script>
        // función para alerta de configuración de preguntas secretas.
        function primer_inicio_de_usuario() {
          setTimeout(() => {
            swal({
                title: '¡Atención!',
                text: 'Debes configurar tus preguntas de seguridad, para poder cambiar tu contraseña en caso de que se te olvide o bloqueo.',
                type: 'warning',
                confirmButtonColor: '#10478e',
                confirmButtonText: 'Aceptar'
            });
            
          }, 300);
          };
      </script>

      <?php 
        include_once("../include/scripts_include.php");
      
        if($primer_inicio == '1'){
          echo "<script type='text/javascript'>
                  primer_inicio_de_usuario();
              </script>";
        }
      ?>
    </body>
  </html>
<?php } ?>