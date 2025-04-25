<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin autenticación previa.","Un usuario intento acceder al sistema de manera incorrecta.");
	header('Location: ../index.php');
	exit();
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::verificar_rol('r_entrada');
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
                          <option value="J-">JURIDICO</option>
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
                        <button type="button" class="btn btn-secondary bi bi-plus" data-bs-toggle="modal" data-bs-target="#registrar_producto">&nbsp; Registar un producto</button>
                      </div>

                      <label class="form-label">Productos <span style="color:#f00;">*</span></label>

                      <select multiple="on" onchange="añadir_tr_a_tabla('registrar_entrada')" class="form-select Select" id="id_producto" name="producto[]" required>
                        <option>Selecciona una o más opciones</option>

                        <?php
                          $consulta = modeloPrincipal::consultar("SELECT id_producto, codigo, nombre_producto 
                            FROM producto WHERE stock > 0 AND estatus = 1");
              
                          while ($mostrar = mysqli_fetch_array($consulta)) { ?>
    
                            <option value="<?= $mostrar['id_producto']; ?>" name="<?= $mostrar['nombre_producto']; ?>"><?= $mostrar['codigo'].' - '.$mostrar['nombre_producto']; ?></option>
    
                        <?php } ?>
                      </select>
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
                            </tr>
                          </thead>
                          <tbody id="lista_productos">
                            
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h2 class="card-title">Añadir Nuevo Producto</h2>
              <form id="añadir_producto" action="../controlador/producto_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                <input type="hidden" name="modulo" value="Guardar">
                  <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <label class="col-form-label">Cógido Del Producto</label>
                    <div class="col-sm-12">
                      <input type="text" pattern="[0-9]{4,30}" required="" placeholder="código del producto" class="form-control" id="codigo_producto" name="codigo_producto">
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <label class="col-form-label">Nombre Del Producto</label>
                    <div class="col-sm-12">
                      <input form="añadir_producto" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="nombre del producto" class="form-control" id="nombre_producto" name="nombre_producto">
                    </div>
                  </div>
                  <!-- selector de categoría  -->
                  <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <label class="col-form-label">Selecciona una Categoría</label>
                    <div class="col-sm-12">
                      <select name="id_categoria" id="categoria" class="form-select">
                        <option value="">Selecciona una categoría</option>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('categoria_opcion'); ?> 
                      </select>
                    </div>
                  </div>
                  <!-- selector de presentacion -->
                  <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <label class="col-form-label">Selecciona una Presentación</label>
                    <div class="col-sm-12">
                      <select name="id_presentacion" id="select_presentacion" class="form-select">
                        <option value="0">Selecciona una presentación</option>
                        <?php require_once ('../include/select_dinamico.php');?>
                      
                      </select>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" form="añadir_producto" class="btn btn-success">Añadir</button>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  modeloPrincipal::bitacora("Intento de acceso no autorizado a la pantalla entrada de productos.","Se ha registrado un intento de acceso incorrecto a la pantalla entrada de productos por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
  header('Location: ./inicio.php');
}