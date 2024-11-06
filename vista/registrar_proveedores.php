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
      <!-- metadatos -->  
      <?php include_once("../include/meta_include.php"); ?>

      <!-- titulo -->
      <title>Registro de Proveedores</title>

      <!-- ======= estilos y librerias css ======= -->
      <?php include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php   include_once("../include/header.php"); ?>
      <?php   include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle"> <h1>REGISTRAR PROVEEDOR</h1></div>
        <section class="section dashboard">
          <div class="row"> 
            <div class="col-12">
              <div class="card top-selling overflow-auto"> 
                <div class="card-body pb-0">
                  <h5 class="card-title">DATOS DEL PROVEEDOR</h5> 
                  <form id="añadir_producto" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="modulo" value="Guardar">
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                      <label for="validationDefault01" class="form-label">CÉDULA / RIF <span style="color:#f00;">*</span></label>
                      <div class="col-md-4 input-group">
                        <select class="input-group-text" id="validationDefault04" required>
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
                    <div class="d-grid gap-2 mb-3">
                      <div class="text-start">
                        <p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                      </div>
                      <button name="registrar" class="btn btn-success">REGISTRAR PROVEEDOR</button>
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