<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_entrada');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Entrada de Producto</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./entrada_de_productos.php">&nbsp; Volver</a>
            Registrar Entrada
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row"> 
            <div class="col-12">
              <div class="card top-selling overflow-auto"> 
                <div class="card-body pb-0">
                  <h5 class="card-title">Datos del proveedor</h5> 
                  <form action="../controlador/registrar_entrada.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="id_dolar" id="dolar" value="<?= modeloPrincipal::obtener_id_precio_dolar(); ?>">
                    <input type="hidden" name="modulo" value="Guardar">
                    <!-- datos del proveedor al que se le compró -->
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                          <option value="V-">V</option>
                          <option value="R-">RIF</option>
                          <option value="J-">J</option>
                          <option value="E-">E</option>
                        </select>
                        <input type="text" class="form-control" minlength="7" maxlength="8" placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula" required>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" minlength="3" maxlength="80" placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control"  minlength="10" maxlength="150" placeholder ="ingresa el correo" id="correo" name="correo" required>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label   class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" minlength="11" maxlength="11"  name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" minlength="3" maxlength="250" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                    </div>

                    <!-- datos de el (los) producto(s) comprados al proveedor -->

                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row m-0">
                      <h5 class="col-12 col-sm-12 col-md-8 mb-3 card-title">Productos a ingresar</h5>

                      <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <button modal="registrar_producto" url="./modal/producto/registrar.php" type="button" class="btn_modal btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#registrar_producto">&nbsp; Registar un nuevo producto</button>
                      </div>

                      <label class="form-label">Productos <span style="color:#f00;">*</span></label>
                      <div class="col-12 col-sm-12 col-md-9 mb-3">
                        <select name="producto" id="producto_id" class="form-select Select select selector_producto">
                          <option value="" selected>seleccione una opción</option>
                          <?php producto_model::options(); ?>
                        </select>
                      </div>
                      <div class="col-12 col-sm-12 col-md-3 mb-3">
                        <button type="button" name="btn_producto" class="btn btn-success bi bi-plus btn_add">&nbsp; Añadir producto</button>
                      </div>
                    </div>
                    
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row m-0">
                      <div class="row p-2 justify-content-around">
                        <h5 class="card-title col-12 mb-2">Lista de productos</h5>

                        <div class="col-12 table-responsive">
                          <table class="table table-borderless table-striped" id="">
                            <thead>
                              <tr>
                                <th class="col text-center" scope="col">Producto</th>
                                <th class="col text-center" scope="col">Cantidad</th>
                                <th class="col text-center" scope="col">Precio por unidad en $</th>
                                <th class="col text-center" scope="col">Precio por unidad en bs</th>
                                <th class="col text-center" scope="col">Precio de venta en $</th>
                                <th class="col text-center" scope="col">Eliminar</th>

                              </tr>
                            </thead>
                            <tbody id="lista_producto">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <hr class="divider">

                    <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                      <div class="input-group mb-3 justify-content-center">
                        <label class="input-group-text">Fecha de la Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
                        <input class="form-control" value="<?= $fecha = date("d/m/Y"); ?>" required type="date" id="fecha_entrada" name="fecha_entrada">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                      <div class="input-group mb-3 justify-content-center">
                        <label class="input-group-text">Hora de la Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
                        <input class="form-control" value="<?=  $fecha2 = date("h:i:a"); ?>" required type="time" id="hora_entrada" name="hora_entrada">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 my-3">
                      <h5 class="card-title col-12">Total de la inversión</h5>
                        
                      <input id="total_Dolar" type="hidden" class="totalDolar" name="totalDolar">
                      <input id="total_Bolivar" type="hidden" class="totalBolivar" name="totalBolivar">

                      <table class="table table-striped table-borderless overflow-x-auto">
                        <tbody>
                          <tr>
                            <td class="fs-4 text-success text-center col">Total en $: <strong> <span id="totalDolar">0 </span> </strong></td> 
                            <td class="fs-4 text-success text-center col">Total en bs: <strong> <span id="totalBolivar">0 </span> </strong></td> 
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p fs-5">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mt-3 mb-3 text-center">
                      <button name="insertar" class="btn btn-success">&nbsp; Registrar entrada</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
        
      <div class="modal fade" id="registrar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body_modal">
              
            </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" type="submit" class="btn btn-success">Registrar</button>
              <button type="button" class="btn btn-secondary" id="close_modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

			<script src="./js/añadir_elemento_lista.js"></script>
			<script src="./js/convertir_dolar_bs.js"></script>
      <?php
        // se incluye el footer / pie de pagina a la vista
        include_once ("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once ("../include/scripts_include.php"); 
      
        model_user::validar_sesion_activa($id_usuario);
        
        config_model::verificar_actualizacion_configuracion(); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("entrada de productos");
}