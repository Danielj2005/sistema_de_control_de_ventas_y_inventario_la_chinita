<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

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
                    <input type="hidden" name="id_dolar" id="dolar" value="<?= $mostrarDolar['id_dolar']; ?>">
                    <input type="hidden" name="dolar" id="precioDolar" value="<?= $mostrarDolar['dolar']; ?>">
                    <input type="hidden" name="modulo" value="Guardar">
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                          <option value="V-">V</option>
                          <option value="R-">RIF</option>
                          <option value="J-">J</option>
                          <option value="E-">E</option>
                        </select>
                        <input type="text" class="form-control"  placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" placeholder ="ingresa el correo" id="correo" name="correo" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label   class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                    </div>

                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row m-0">
                      <h5 class="col-12 col-sm-12 col-md-8 mb-3 card-title">Productos a ingresar</h5>
                      <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <button modal="registrar_producto" url="./modal/producto/registrar.php" type="button" class="btn_modal btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#registrar_producto">&nbsp; Registar un producto</button>
                      </div>

                      <label class="form-label">Productos <span style="color:#f00;">*</span></label>

                      <select multiple="on" onchange="añadir_tr_a_tabla('registrar_entrada')" class="form-select Select mb-5" id="id_producto" name="producto[]" required>
                        <option>Selecciona una o más opciones</option>

                        <?php
                          $consulta = modeloPrincipal::consultar("SELECT id_producto, codigo, nombre_producto 
                            FROM producto WHERE stock > 0 AND estatus = 1");
              
                          while ($mostrar = mysqli_fetch_array($consulta)) { ?>
    
                            <option value="<?= $mostrar['id_producto']; ?>" name="<?= $mostrar['nombre_producto']; ?>"><?= $mostrar['codigo'].' - '.$mostrar['nombre_producto']; ?></option>
    
                        <?php } ?>
                      </select>
                      <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <button type="button" id="btn_add" class="btn btn-success bi bi-plus">&nbsp; Añadir un producto</button>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="table-responsive">
                        <h5 class="card-title">Lista de prooductos</h5>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="col text-center" scope="col">#</th>
                              <th class="col text-center" scope="col">PRODUCTO</th>
                              <th class="col text-center" scope="col">PRESENTACIÓN</th>
                              <th class="col text-center" scope="col">STOCK</th>
                              <th class="col text-center" scope="col">CANTIDAD</th>
                              <th class="col text-center" scope="col">PRECIO POR UNIDAD $</th>
                              <th class="col text-center" scope="col">PRECIO POR UNIDAD BS</th>
                              <th class="col text-center" scope="col">PRECIO VENTA $</th>
                              <th class="col text-center" scope="col">ELIMINAR</th>
                            </tr>
                          </thead>
                          <tbody id="lista_productos">
                            <?php include_once "../include/options_productos"; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Fecha de la Entrada</span>
                        <input class="form-control" required type="date" id="fecha_entrada" name="fecha_entrada">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Hora de la Entrada</span>
                        <input class="form-control" required type="time" id="hora_entrada" name="hora_entrada">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 my-3">
                      <h7 class="card-title text-start mb-3">Total de la inversión</h7>
                      <div class="row mt-2">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                          <div class="input-group mb-3 justify-content-center">
                            <span class="input-group-text">Total $</span>
                            <input class="form-control" id="totalDolar" disabled value="0">
                          </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                          <div class="input-group mb-3 justify-content-center">
                            <span class="input-group-text">Total BS</span>
                            <input class="form-control" id="totalBolivar" disabled value="0">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
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

			<!-- lógica de los modales -->
			<script src="./js/modal.js"></script>
			<script src="./js/añadir_elemento_lista.js"></script>
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