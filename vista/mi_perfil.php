<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

?>

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
      <div class="pagetitle">
        <h1> Mi Perfil </h1>
      </div>
      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body pb-3">
                    <div class="mi_informacion_container col-12 col-lg-12 my-3">
                      <fieldset class="row mb-3">
                          <legend class="col-12 col-sm-12"><i class="bi bi-person"></i> &nbsp;Información personal</legend>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="control-label">Cédula</label>
                                <input type="text" pattern="[0-9\-]{1,30}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('cedula',$id_usuario); ?>" id="cedula" name="cedula" readOnly="true" maxlength="9">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="control-label">Nombres</label>
                              <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('nombre',$id_usuario); ?>" id="nombres" name="nombres" readOnly="true" maxlength="30">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="control-label text-black">Apellidos</label>
                                <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('apellido',$id_usuario); ?>" id="apellido" name="apellido" readOnly="true" maxlength="30">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="form-group">
                              <label class="control-label">Correo</label>
                              <input type="email" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ\@\.\0-9]{3,30}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('correo',$id_usuario); ?>" id="email" name="email" readOnly="true" maxlength="30">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                  <label class="control-label text-black">Teléfono</label>
                                  <input type="text" pattern="[0-9]{11}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('telefono', $id_usuario) ?>" id="telefono" name="telefono"  readOnly="true" maxlength="11">
                              </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                  <label class="control-label">Dirección</label>
                                  <input type="text" maxlength="250" required="" placeholder="Ingrese la Dirección" value="<?= model_user::obtener_info_personal_usuario('direccion', $id_usuario) ?>" class="bg-secondary-subtle form-control" readOnly="true" id="direccion" name="direccion">
                              </div>
                          </div>

                          <div class="col-12 my-4 text-center d-flex justify-content-end">
                              <button type="submit" modal='modificar_info_personal_usuario' class="btn_modal btn btn-success text-white" value="" url="./modal/usuario/modificar_info_personal_usuario.php" data-bs-toggle="modal" data-bs-target="#modal">
                                <i class='zmdi zmdi-refresh'></i> Actualizar
                              </button>
                          </div>
                      </fieldset>
                      <hr>
                      <fieldset class="row mb-4">
                          <legend><i class="bi bi-person-circle"></i> &nbsp; Datos de la Cuenta</legend>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="control-label">Nombre de Usuario</label>
                                <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ\@\.\0-9]{3,30}" class="bg-secondary-subtle form-control" value="<?= modeloPrincipal::ocultar_info(model_user::obtener_info_personal_usuario('correo',$id_usuario)); ?>" id="nombre_usuario" name="nombre_usuario" readOnly="true" maxlength="30">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                              <div class="form-group">
                                  <label class="control-label">Tipo de Usuario</label>
                                  <input type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ]{3,30}" class="bg-secondary-subtle form-control" value="<?= model_user::obtener_info_personal_usuario('id_rol',$id_usuario); ?>" id="tipo_usuario" name="tipo_usuario" readOnly="true" maxlength="30">
                              </div>
                          </div>
                          <div class="col-12 my-4 text-center d-flex justify-content-end">
                              <button type="submit" modal='datos_usuario' class="btn_modal btn btn-success text-white" url="./modal/usuario/modificar_contraseña_usuario.php" data-bs-toggle="modal" data-bs-target="#modal">
                                <i class='zmdi zmdi-refresh'></i>
                                Actualizar
                              </button>
                          </div>
                      </fieldset>
                      <hr>
                      <fieldset class="row">
                        <legend><i class="bi bi-shield"></i> &nbsp; Actualizar Preguntas de Seguridad</legend>
                        <div class="col-12 my-4 text-center d-flex justify-content-end">
                            <button modal="preguntas_seguridad" type="submit" class="btn_modal btn btn-success text-white" url="./modal/usuario/modificar_preguntas_seguridad.php" data-bs-toggle="modal" data-bs-target="#modal">
                              <i class='zmdi zmdi-refresh'></i> 
                              Actualizar
                            </button>
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
    
    <!-- Modal actualizar informacion general del usuario -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="SendForm" action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="update">   
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body_modal">
            </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" type="submit" class="btn btn-success">Guardar cambios</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    

    <?php include_once "../include/footer.php"; ?>
    <!-- ======= Scripts ======= -->
    <script>
      // función para alerta de configuración de preguntas secretas.
    </script>

    <?php 
      include_once "../include/scripts_include.php";
    
      if(model_user::obtener_info_personal_usuario('primer_inicio', $id_usuario) == '1'){
        echo "<script type='text/javascript'>
                setTimeout(() => {
                  swal({
                      title: '¡Atención!',
                      text: 'Es su primer inicio de sesión, por favor cambie su contraseña y sus preguntas de seguridad.',
                      type: 'warning',
                      confirmButtonColor: '#10478e',
                      confirmButtonText: 'Aceptar'
                  });
                  
                }, 300);
            </script>";
      }
      
      model_user::validar_sesion_activa($id_usuario);

      config_model::verificar_actualizacion_configuracion(1); 

    ?>
  </body>
</html>