<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('intentos_inicio_sesion + m_cant_pregunta_seguridad + m_tiempo_sesion + m_cant_caracteres + m_cant_simbolos + m_cant_num');
// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 6) {  
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Configuración del Sistema</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver</a>
            Configuración del sistema
            <form id="backUp" action="../controlador/configuracion_controlador.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="load">
              <input type="hidden" name="modulo" id="input" class="form-control" value="backup">
                
              <div class="col-12 col-sm-12 col-md-12 mt-3 mb-3 text-center">
                <button form="backUp" name="insertar" class="btn btn-dark">Guardar copia de seguridad de la base de datos</button>
              </div>

            </form>
          </h1>
        </div>
        <section class="section dashboard">
          <div class="card top-selling overflow-auto"> 
            <div class="card-body pb-0">
              <form action="../controlador/configuracion_controlador.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                <input type="hidden" name="modulo" value="Guardar">

                <fieldset class="mb-4">
                  <legend class="h5 card-title">Configuración de los Módulos del sistema.</legend>

                  <div class="row m-0">
                    <div class="col-12 col-sm-12 col-md-6 mb-3">
                      <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="true" aria-controls="collapseOne">
                              Módulo Productos
                            </button>
                          </h2>
                          <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <ul id="" class="nav-content list-unstyled"> 
                                <li class="mb-3">
                                  
                                  <div class="input-group mb-3">
                                    <label class="input-group-text">Porcentaje del IVA</label>

                                    <input type="number" class="p-1 form-control" id="porcentaje_iva" name="porcentaje_iva" placeholder="Ingresa el porcentaje del IVA">
                                    
                                    <button class="input-group-text btn btn-secondary" id="" >
                                      <i class="bi bi-percent"></i>
                                    </button>
                                  </div>
                                </li>
                                <li class="mb-3">
                                  <span>Porcentaje de ganancia por producto</span>
                                  <input name="r_categoria" class="productos form-control" value="1" type="number">
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 mb-3">
                      <div class="accordion" id="accordionExample2">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#usuariosCard" aria-expanded="true" aria-controls="collapseOne">
                              Módulo Usuarios
                            </button>
                          </h2>

                          <div id="usuariosCard" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                              <ul id="" class="nav-content list-unstyled"> 
                                <label class="card-title mb-5">Configuración de Sesión</label>
                                <li class="mb-3">
                                  <label class="mb-2">Tiempo de inactividad de sesión <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="tiempo_inactividad" min="1" max="60" value="<?= config_model::obtener_dato('tiempo_inactividad') ?>">
                                </li>
                                <li class="mb-3">
                                  <label class="mb-2">Cantidad de preguntas de seguridad <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="c_preguntas" min="3" max="4" value="<?= config_model::obtener_dato('c_preguntas') ?>">
                                </li>
                                <li class="mb-3">
                                  <label class="mb-2">Intentos de inicio de sesión <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="intentos_inicio_sesion" min="1" max="5" value="<?= config_model::obtener_dato('intentos_inicio_sesion') ?>">
                                </li>

                                <label class="card-title mb-5">Configuración de Contraseña</label>

                                <li class="mb-3">
                                  <label class="mb-2">Longitud <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="c_caracteres" min="1" max="16" value="<?= config_model::obtener_dato('c_caracteres') ?>">
                                </li>
                                <li class="mb-3">
                                  <label class="mb-2">Cantidad de símbolos <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="c_simbolos" min="1" max="3" value="<?= config_model::obtener_dato('c_simbolos') ?>">
                                </li>
                                <li class="mb-3">
                                  <label class="mb-2">Cantidad de números <span style="color:#f00;">*</span></label>
                                  <input class="form-control" type="number" name="c_numeros" min="1" max="3" value="<?= config_model::obtener_dato('c_numeros') ?>">
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </fieldset>

                <div class="col-12 mb-1">
                  <div class="form-group">
                      <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                  </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-12 mt-3 mb-3 text-center">
                  <button name="insertar" class="btn btn-success">Guardar</button>
                </div>
              </form>
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
        config_model::verificar_actualizacion_configuracion(); 

        ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("de Configuración del sistema");
}