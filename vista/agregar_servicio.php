<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_servicio');
// se evalua que este rol tenga el acceso a esta vista

if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Añadir Servicio</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./menu.php">&nbsp; Volver</a>
            Registrar Servicio
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body p-3">
                  <form method="post" action="../controlador/menu_controlador.php" class="row SendFormAjax p-3" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="dolar" id="precioDolar" value="<?= $precio_dolar_actual; ?>">
                    <input type="hidden" name="modulo" value="Guardar">

                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <h5 class="card-title"> Datos del Servicio </h5>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <label class="form-label">Nombre del Servicio</label>
                          <div class="col-md-4 input-group">
                            <input type="text" class="form-control" placeholder="ingresa el nombre del servicio" name="nombre_platillo" id="nombre_platillo" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Descripción</label>
                          <input type="text" class="form-control" placeholder="ingresa la descripción" id="descripcion" name="descripcion" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row">
                      <h5 class="card-title">Productos del servicio</h5>
                      <label class="form-label">Producto <span style="color:#f00;">*</span></label>
                      <div class="col-12 col-sm-12 col-md-9 mb-3">
                        <select name="producto" id="producto_id" class="form-select select">
                          <option value="" selected>seleccione una opción</option>
                          <?php producto_model::options("agregar_servicio"); ?>
                        </select>
                      </div>
                      <div class="col-12 col-sm-12 col-md-3 mb-3">
                        <button type="button" name="btn_producto" class="btn_add btn btn-success bi bi-plus">&nbsp; Añadir producto</button>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="table-responsive">
                        <h5 class="card-title">Lista de productos seleccionados</h5>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="col text-center" scope="col">PRODUCTO</th>
                              <th class="col text-center" scope="col">PRESENTACIÓN</th>
                              <th class="col text-center" scope="col">CATEGORÍA</th>
                              <th class="col text-center" scope="col">STOCK DISPONIBLE(S)</th>
                              <th class="col text-center" scope="col">CANTIDAD</th>
                              <th class="col text-center" scope="col">ELIMINAR</th>
                            </tr>
                          </thead>
                          <tbody id="lista_producto">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3 mt-5"> 
                      <h5 class="card-title">Precio del Servicio</h5>

                      <div class="row mt-2">
                        <div class="col-12 col-sm-6 col-md-6 mb-3 text-start">
                          <label class="form-label">En Dolares ($)</label>
                          <input class="form-control" onkeyup="transformar('precio_dolar_servicio','precio_bolivar_servcio')" id="precio_dolar_servicio" name="precio_dolar" placeholder="ingresa el precio en $">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 mb-3 text-center">
                          <label class="form-label">En Bolivares (BSS)</label>
                          <input class="form-control  bg-dark-subtle" readonly id="precio_bolivar_servcio" name="precio_bolivar" placeholder="ingresa el precio en bs">
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p fs-5">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                      <button type="submit" class="btn btn-success">Registra Servicio</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
			<script src="./js/añadir_elemento_lista.js"></script>
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
  bitacora::intento_de_acceso_a_vista_sin_permisos("registro de servicios");
}