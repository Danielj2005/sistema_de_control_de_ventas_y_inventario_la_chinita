<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_productos');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Productos</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./productos.php">&nbsp; Volver</a>
            Producto
          </h1> 
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Añadir Nuevo Producto 
                      <div class="text-center">
                        <button type="button" id="btn_add_card_product" class="btn btn-success bi bi-plus">&nbsp; Añadir otro producto</button>
                      </div>
                    </h2>

                    <form id="registrar_producto" action="../controlador/producto_controller.php" method="post" class="SendFormAjax row justify-content-around" autocomplete="off" data-type-form="save">
                      <input type="hidden" name="modulo" value="Guardar">
                      <div class="col-12 mb-1">
                        <div class="form-group">
                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                        </div>
                      </div>

                      <div class="card shadow-lg rounded-4 p-4 col-12 col-md-6 row" id="producto_1" style="max-width: 400px; width: 100%;">
                        <label class="col-form-label card-title">Datos del Producto: </label>

                        <div class="col-12 col-sm-12 mb-3">
                          <label class="col-form-label">Tipo de Producto <span style="color:#f00;">*</span></label>
                          <div class="col-sm-12">
                            <select name="nombre_producto" id="nombre_producto" class="form-select Select">
                              <option value="">Selecciona una opción</option>
                              <option value="">Refresco</option>
                              <option value="">Arroz</option>
                              <option value="">Harina</option>
                              <option value="">Salsa</option>
                              <option value="">Helado</option>
                              <option value="">Yogurt</option>
                              <option value="">Pollo</option>
                              <option value="">Pescado</option>
                            </select>
                          </div>
                        </div>

                        <!-- selector de Marca  -->
                        <div class="col-12 col-sm-12 mb-3">
                            <label class="col-form-label">Selecciona una Marca<span style="color:#f00;">*</span></label>
                            <div class="col-sm-12">
                                <select name="id_marca" id="id_marca" class="form-select Select<?= $rand ?>">
                                    <option value="">Selecciona una opción</option>
                                    <?php marca_model::options(); ?> 
                                </select>
                            </div>
                        </div>

                        <!-- selector de presentacion  -->
                        <div class="col-12 mb-3">
                            <label class="col-form-label">Selecciona una Presentación <span style="color:#f00;">*</span></label>
                            <div class="col-sm-12">
                                <select name="id_presentacion" id="select_presentacion" class="form-select Select<?= $rand ?>">
                                    <option value="0">Selecciona una opción</option>
                                    <?php presentacion_model::options(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- selector de categoría   -->
                        <div class="col-12 mb-3">
                            <label class="col-form-label">Selecciona una Categoría <span style="color:#f00;">*</span></label>
                            <div class="col-sm-12">
                                <select name="id_categoria" id="categoria" class="form-select Select<?= $rand ?>">
                                    <option value="">Selecciona una opción</option>
                                    <?php category_model::options(); ?> 
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                          <button type="button" onclick="document.getElementById(`producto_1`).remove();" class="btn btn-danger bi bi-trash">&nbsp; Eliminar</button>
                        </div>
                      </div>

                    </form>
                    <div class="text-center">
                      <button type="submit" form="registrar_producto" class="btn btn-success bi bi-plus"> Añadir</button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </main>
      <script type="text/javascript" src="./js/añadir_producto.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once "../include/footer.php";
        // se incluyen los script de javascript a la vista 
        include_once "../include/scripts_include.php";
      
        model_user::validar_sesion_activa($id_usuario);
        config_model::verificar_actualizacion_configuracion(); 

        ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("registro de productos");
}