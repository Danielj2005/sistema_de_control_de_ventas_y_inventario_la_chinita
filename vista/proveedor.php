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
      <!-- titulo -->
      <title>Proveedores</title>
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
        <div class="pagetitle row">
          <div class="col-6 mb-4">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            <h1 class="mt-3"> Proveedores </h1>
          </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a type="button" class="col-12 btn btn-success" href="./registrar_proveedores.php">Registrar Proveedor</a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-primary" target="_blank" href="./reportes/lista_proveedores.php">Exportar Lista de Proveedores</a>
                  </div>
                </div>
                <div class="card-body pb-0">
                  <h5 class="card-title">Lista de Proveedores</h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <th class="col text-center" scope="col">CÉULA/RIF</th>
                          <th class="col text-center" scope="col">NOMBRE</th>
                          <th class="col text-center" scope="col">CORREO</th>
                          <th class="col text-center" scope="col">TELÉFONO</th>
                          <th class="col text-center" scope="col">DIRECCIÓN</th>
                          <th class="col text-center" scope="col" class="text-center">MODIFICAR</th>
                          <th class="col text-center" scope="col" class="text-center">VER HISTORAL DE COMPRAS</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php include("../include/listas_registros_include.php"); consultar_registros('proveedor'); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="msjFormSend"></div>
      <!-- Modal modificar proveedor -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="update_proveedor" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax" data-type-form="update">   
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Proveedor</h5>
                <input type="hidden" name="modulo" value="Modificar">
                <input type="hidden" id="id_proveedor_modificar" name="id_proveedor_modificar" value="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row m-0">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label> Cédula <span style="color: red; font-size: 20px;"> * </span></label>
                    <input type="text" maxlength="11" disabled class="modificar_proveedor form-control" id="cedula" name="cedula" pattern="[A-Za-z0-9]{7,11}" placeholder="ingrese la cédula">
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label> Nombre<span style="color: red; font-size: 20px;"> * </span></label>
                    <input type="text" maxlength="30" class="modificar_proveedor form-control" id="nombre" name="nombre" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}" placeholder="ingrese el nombre">
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label> Correo <span style="color: red; font-size: 20px;"> * </span></label>
                    <input type="email" maxlength="30" class="modificar_proveedor form-control correo" id="correo" name="correo" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\.\@ ]{3,70}" placeholder="ingrese el correo" >
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label> Teléfono <span style="color: red; font-size: 20px;"> * </span></label>
                    <input type="text" maxlength="11" class="modificar_proveedor form-control telefono" id="telefono" name="telefono" pattern="[0-9]{11}" placeholder="ingrese el teléfono" >
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label> Dirrección <span style="color: red; font-size: 20px;"> * </span></label>
                    <input type="text" maxlength="30" class="modificar_proveedor form-control" id="direccion" name="direccion" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\. ]{5,70}" placeholder="ingrese la dirección">
                  </div>
                  <div class="col-12 mb-3">
                    <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                      <p> Los campos con <span style="color: red; font-size: 20px;"> * </span> son obligatorios </p>
                    </div>
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

      <!-- Modal detalles del historial -->
      <div class="modal fade" id="historial_proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Historial</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_historial_proveedor">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

      <?php   
        include_once("../include/footer.php");  
        include_once("../include/scripts_include.php"); ?>
      <script>
        function asignar_id_proveedor(id_proveedor){
          let proveedor = document.getElementById(`id_proveedor__${id_proveedor}`).value;
          document.getElementById('id_proveedor_modificar').value = proveedor;

          let datos = document.querySelectorAll(`.proveedor__${id_proveedor}`);
          let modal = document.querySelectorAll(`.modificar_proveedor`);

          for (let i = 0; i < datos.length; i++) {

            modal[i].value = datos[i].textContent;
            
          }
        }
      </script>
      
      <script src="./js/detalles_listas.js"></script>
    </body>
  </html>
<?php } ?>