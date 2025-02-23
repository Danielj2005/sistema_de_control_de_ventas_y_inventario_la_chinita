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
      <title>Bitácora</title> 
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
          <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
          <h1 class="my-3">Bitácora</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling pb-3">
                <div class="card-body pb-0">
                  <h5 class="card-title">Movimientos del sistema</h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th class="text-center col" scope="col">#</th>
                          <th class="text-center col" scope="col">ACCIÓN</th>
                          <th class="text-center col" scope="col">DESCRIPCIÓN</th>
                          <th class="text-center col" scope="col">USUARIO</th>
                          <th class="col text-center" scope="col">FECHA</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php //include("../include/listas_registros_include.php"); consultar_registros('producto'); ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- Modal detalles de venta -->
      <div class="modal fade" id="addPresentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="../controlador/presentacion.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Presentación <span style="color:#f00;">*</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="detalles_de_ventas">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-form-label">Nombre de la Presentación</label>
                  <div class="col-sm-10">
                    <input  type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{4,30}" required="" placeholder="ingresa el nombre" class="form-control" id="nombre_presentacion" name="nombre_presentacion">
                    <input  type="hidden" name="modulo" value="guardar">
                  </div>
                  
                  <div class="col-12 mb-1">
                    <div class="form-group">
                        <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                    </div>
                  </div>
                </div>
              </div>
                    
              <div class="modal-footer">
                <button type="submit" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </form>
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
<?php } ?>