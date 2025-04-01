<?php
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

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
        include_once("../include/sliderbar.php"); 

        $consulta = modeloPrincipal::consultar("SELECT B.*, U.nombre, U.apellido FROM bitacora AS B
          INNER JOIN usuario AS U ON B.id_usuario = U.id_usuario ORDER BY id DESC");
        ?>
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
                    <table class="table table-striped datatable" id="example">
                      <thead>
                        <tr>
                          <th class="text-center col" scope="col">#</th>
                          <th class="text-center col" scope="col">ACCIÓN</th>
                          <th class="text-center col" scope="col">USUARIO</th>
                          <th class="col text-center" scope="col">FECHA / HORA</th>
                          <th class="text-center col" scope="col">DETALLES</th>
                        </tr>
                      </thead>
                      <tbody>

                          <?php
                            while($row = mysqli_fetch_assoc($consulta)) { ?>
                              <tr>
                                <th class="col" scope="col"></th>
                                <th class="col" scope="col"><?= $row['accion'] ?></th>
                                <th class="col" scope="col"><?= $row['nombre'].' '.$row['apellido'] ?></th>
                                <th class="col" scope="col"><?= date('d-m-Y / h:i a', strtotime($row['fecha_hora'])) ?></th>
                                <th class="text-center col" scope="col">
                                  <button btn="ver" class="btn_modal btn bi bi-eye btn-info" url="./modal/detalles_bitacora.php" value="<?= $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#modal"></button>
                                </th>
                              </tr>
                          <?php } ?>  
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalles de la bitácora</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="body_modal" > </div>

            <div class="modal-footer">
              <button id="btn_guardar_modal" form="update_user_info" type="submit" class="btn btn-success">Guardar</button> 
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal modificar -->
      <script src="./js/modal.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>