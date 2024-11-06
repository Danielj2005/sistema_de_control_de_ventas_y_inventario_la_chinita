<?php 
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
  // Redirigir el acceso a la página sino inició de sesión
  header('Location: ../index.php.php');
  exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>ENTRADAS DE PRODUCTOS</title>
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
        <div class="pagetitle"> <h1>REGISTRAR ENTRADA</h1></div>
        <section class="section dashboard">
          <div class="row"> 
            <div class="col-12">
              <div class="card top-selling overflow-auto"> 
                <div class="card-body pb-0">
                  <h5 class="card-title">DATOS DEL PROVEEDOR</h5> 
                  <form id="añadir_producto" action="../controlador/registrar_entrada.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="dolar" id="dolar" value="<?= $mostrarDolar['dolar']; ?>">
                    <input type="hidden" name="modulo" value="Guardar">
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault01" class="form-label">CÉDULA / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" name="nacionalidad" id="validationDefault04" required>
                          <option>V</option>
                          <option>RIF</option>
                        </select>
                        <input type="text" class="form-control"  placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">NOMBRE <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault02" class="form-label">CORREO <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" placeholder ="ingresa el correo" id="correo" name="correo" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault05" class="form-label">TELÉFONO <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <label for="validationDefault03" class="form-label">DIRECCIÓN <span style="color:#f00;">*</span></label>
                      <input type="text" class="form-control" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                    </div>
                    <h5 class="card-title me-3">PRODUCTO A INGRESAR A LA LISTA</h5>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 form-group row">
                      <label for="validationDefault05" class="form-label">PRODUCTO <span style="color:#f00;">*</span></label>
                      <select multiple onchange="añadir_tr_a_tabla('registrar_entrada')" class="form-control Select" id="id_producto" name="producto[]" required>
                        <option>Selecciona un producto</option>

                        <?php
                          $consulta = modeloPrincipal::consultar("SELECT id_producto, nombre_producto FROM producto");

                          while ( $mostrar = mysqli_fetch_array($consulta)) { ?>

                            <option value="<?= $mostrar['id_producto']; ?>" name="<?= $mostrar['nombre_producto']; ?>"><?= $mostrar['nombre_producto']; ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">LISTA DE PRODUCTOS A INGRESAR</h5>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th class="col text-center" scope="col">#</th>
                                <th class="col text-center" scope="col">PRODUCTO</th>
                                <th class="col text-center" scope="col">CANTIDAD</th>
                                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN DOLARES</th>
                                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN BOLIVARES</th>
                              </tr>
                            </thead>
                            <tbody id="lista_productos">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <h7 class="card-title">MONTO TOTAL</h7>
                    <div class="col-md-6 mb-3 d-grid gap-2 justify-content-center align-items-center">
                      <label for="validationDefault05" class="form-label">TOTAL EN BASE A LA TASA REGISTRADA ($)</label>
                      <input class="btn btn-primary" id="totalDolar" disabled value="0">
                    </div>
                    <div class="col-md-6 mb-3 d-grid gap-2 justify-content-center align-items-center">
                      <label for="validationDefault05" class="form-label">TOTAL EN BASE A LA MONEDA NACIONAL (BSS)</label>
                      <input class="btn btn-primary" id="totalBolivar" disabled value="0">
                    </div>
                    <div class="d-grid gap-2 mb-3">
                      <button name="insertar" class="btn btn-success">REGISTRAR ENTRADA</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="msjFormSend"></div>
      <?php   include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>