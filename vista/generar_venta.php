<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>Generar Venta</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>

    <!-- ======= Header ======= -->
    <?php include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle"> <h1>Generar Venta</h1> </div> <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <form id="generar_venta" action="../controlador/venta_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                        <fieldset>
                          <legend>Datos del Cliente</legend>
                          <div class="row mb-3">
                            <div class="mb-3 col-sm-12">
                              <label class="control-label ">CÉDULA <span style="color:#f00;">*</span></label>
                              <div class="input-group">
                                <select name="nacionalidad" class="form-select-sm col-sm-3 input-group-text" aria-label="Default select example">
                                  <option name="nacionalidad" value="V-">V</option>
                                  <option name="nacionalidad" value="E-">E</option>
                                </select>
                                <input class="form-control" required pattern="[0-9]{7,8}" type="text" name="cedula" id="cedula" maxlength="8" placeholder="Ingrese la Cédula">
                              </div>
                            </div>
                            
                            <div class="mb-3 col-sm-12 ">
                              <label class="control-label">NOMBRE Y APELLIDO <span style="color:#f00;">*</span></label>
                              <input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre" name="nombre">
                            </div>

                            <div class="mb-3 col-sm-12 label-floathing form-group">
                              <label class="control-label">TELÉFONO <span style="color:#f00;">*</span></label>
                              <input form="registro_empleado" type="text" pattern="[0-9]{11}" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono" name="telefono">
                            </div>
                          </div>
                                                    
                        </fieldset>  
                        <hr>
                        <fieldset>
                          <legend>Productos</legend>
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">Selecciona la Categoria del Producto <span style="color:#f00;">*</span></label>
                            <div class="col-sm-12">
                              <select name="producto" id="producto" class="form-select">
                                <option value="">selecciona una catagoria</option>
                              </select>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">Selecciona el Producto <span style="color:#f00;">*</span></label>
                            <div class="col-sm-12">
                              <select name="producto" id="producto" class="form-select">
                                <option value="">selecciona un producto</option>
                              </select>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <div class="col-sm-6">
                              <label class="col-form-label">Cantidad a llevar <span style="color:#f00;">*</span></label>
                              <input form="generar_venta" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="Cantidad a llevar" class="form-control input-group" id="cantidad" name="cantidad">
                            </div>
  
                            <div class="col-sm-6">
                              <label class="col-form-label">Precio por unidad</label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control"  pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="2" id="precio_unidad" name="precio_unidad" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00 $</span>
                              </div>
                            </div>
  
                            
                          </div>
                          
                          <div class="row mb-3">
                            <label class="col-form-label">Total a Pagar</label>
                            <div class="col-sm-6">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control"  pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="920" id="total_pagar_bolivar" name="total_pagar_bolivar" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00 bs</span>
                              </div>
                            </div>
  
                            <div class="col-sm-6">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control"  pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="23" id="total_pagar_dolar" name="total_pagar_dolar" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00 $</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>

                        <div class="col-12 mb-1">
                          <div class="form-group">
                              <p class="form-p">Los Campos Con <span style="color:#f00;">*</span> Son Obligatorios</p>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" form="generar_venta" class="btn btn-success">GENERAR VENTA</button>
                        </div>

                      </form>

                    </div>
                  </div>
            </div>

            </div>
          </div><!-- End Left side columns -->

          <!-- Right side columns -->
        </div>
      </section>

    </main><!-- End #main -->
    <div class="msjFormSend"></div>
    <!-- ======= Footer ======= -->
    
    <?php include_once("../include/footer.php"); ?>
    <!-- End Footer -->

    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>

  </html>
<?php } ?>