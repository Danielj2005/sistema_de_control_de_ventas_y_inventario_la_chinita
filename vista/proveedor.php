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
    <title>PROVEEDORES</title>
    
    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <?php   include_once("../include/header.php"); ?><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php   include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle"><h1> PROVEEDORES </h1></div>
      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Top Selling -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">
                  
                  <button type="button" class="btn btn-success">EXPORTAR LISTA DE PROVEEDORES</button>

                  <div class="card-body pb-0">
                    <h5 class="card-title">REGISTRO DE PROVEEDORES</h5>

                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">CÉULA/RIF</th>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">CORREO</th>
                          <th scope="col">DIRECCIÓN</th>
                          <th scope="col">TELÉFONO</th>
                          <th scope="col" class="text-center">MODIFICAR</th>
                          <th scope="col" class="text-center">VER HISTORAL DE COMPRAS</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('proveedor'); ?>  
                      </tbody>
                    </table>

                  </div>

                </div>
              </div><!-- End Top Selling -->

            </div>
          </div><!-- End Left side columns -->

          <!-- Right side columns -->
        </div>
      </section>

    </main>
    <div class="msjFormSend"></div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="update_proveedor" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax" data-type-form="update">   
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos del Proveedor</h5>
              <input type="hidden" name="modulo" value="Modificar">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex col-12">
                <div class="label-floating form-group col-md-12">
                  <label> Cédula <span style="color: red; font-size: 20px;"> * <span></label>
                  <input type="text" maxlength="11" class="form-control" id="cedula" name="cedula" pattern="[A-Za-z0-9]{7,11}" placeholder="ingrese la cédula">
                </div>
              </div>
              <div class="d-flex col-12">
                <div class="label-floating form-group col-md-12">
                  <label> Nombre<span style="color: red; font-size: 20px;"> * <span></label>
                  <input type="text" maxlength="30" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" placeholder="ingrese el nombre">
                </div>
              </div>
              <div class="d-flex col-12">
                <div class="label-floating form-group col-md-12">
                  <label> Correo <span style="color: red; font-size: 20px;"> * <span></label>
                  <input type="email" maxlength="30" class="form-control correo" id="correo" name="correo" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\.\@ ]{3,30}" placeholder="ingrese el correo" >
							  </div>
              </div>
              <div class="d-flex col-12">
                <div class="label-floating form-group col-md-12">
                  <label> Dirrección <span style="color: red; font-size: 20px;"> * <span></label>
                  <input type="text" maxlength="30" class="form-control" id="direccion" name="direccion" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ\- ]{5,30}" placeholder="ingrese la dirección">
                </div>
              </div>
              <div class="d-flex col-12">
                <div class="label-floating form-group col-md-12">
                  <label> Teléfono <span style="color: red; font-size: 20px;"> * <span></label>
                  <input type="text" maxlength="11" class="form-control telefono" id="telefono" name="telefono" pattern="[0-9]{11}" placeholder="ingrese el teléfono" >
							  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- ======= Footer ======= -->
    <?php   include_once("../include/footer.php"); ?>

    <!-- End Footer -->
    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>
  </html>
<?php } ?>