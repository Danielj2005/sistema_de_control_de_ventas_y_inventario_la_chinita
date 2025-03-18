<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
  modeloPrincipal::bitacora("Intento de acceso al sistema sin iniciar sesión","Un usuario intento acceder al sistema.");
	header('Location: ../index.php');
	exit();
  
}else{ 
  
  $estado = (!isset($_POST['estado_rol'])) ? '1' : $_POST['estado_rol'];

  $consulta = modeloPrincipal::consultar("SELECT id_rol, nombre, estado 
    FROM rol WHERE id_rol != 1 AND estado = $estado");

  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Roles</title> 
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
          <h1 class="my-3">Roles</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling pb-3">
                <div class="row btn-group text-center">
                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <a class="col-12 btn btn-success" href="./registrar_rol.php">Registrar un nuevo rol</a>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
                    <form action="./roles.php" method="post">
                        <input type="hidden" name="estado_rol" value="<?= ($estado == '0') ? "1" : "0"?>">
                        <button type="submit" class="col-12 btn btn-secondary">
                          <?= ($estado == '0') ? "Activos" : "Inactivos"?>
                        </button>
                    </form>
                  </div>
                  
                </div>

                <div class="card-body pb-0">

                  <h5 class="card-title">Lista de Roles <?= ($estado == '1') ? "Activos" : "Inactivos"?></h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless datatable" id="example">
                      <thead>
                        <tr>
                          <th class="text-center col" scope="col">#</th>
                          <th class="text-center col" scope="col">NOMBRE</th>
                          <th class="text-center col" scope="col">VER PERMISOS</th>
                          <th class="text-center col" scope="col">MODIFICAR</th>
                          <th class="text-center col" scope="col"><?= ($estado == '0') ? 'ACTIVAR' : 'DESACTIVAR'; ?></th>
                        </tr>
                      </thead>
    
                      <tbody>

                        <?php
                          while($row = mysqli_fetch_assoc($consulta)) { ?>
                            <tr>
                              <th class="text-center col" scope="col"></th>
                              <th class="text-center col" scope="col"><?= $row['nombre'] ?></th>
                              <th class="text-center col" scope="col">
                                <button btn="ver" class="btn_modal btn bi bi-eye btn-info" url="./modal/permisos_rol.php" value="<?= $row["id_rol"]; ?>" data-bs-toggle="modal" data-bs-target="#modal"></button>
                              </th>
                              <th class="text-center col" scope="col">
                                <button btn="modificar" <?= modeloPrincipal::verificar_rol('m_rol') == '1' ? 'url="./modal/modificar_rol.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn bi bi-gear btn-warning" value="<?= $row["id_rol"]; ?>"></button>
                              </th>
                              <th class="text-center col" scope="col">
                                <form action="../controlador/rol.php" method="post" class="SendFormAjax" data-type-form="update">
                                  <input name="modulo" type="hidden" value="<?= ($estado == '1') ? 'activo' : 'inactivo'; ?>">
                                  <input name="id_rol" type="hidden" value="<?= $row['id_rol']; ?>">
                                  <button class="btn bi <?= ($row['estado'] == '0') ? 'bi-check-circle btn-success' : 'bi-x-circle btn-danger'; ?>"  <?= modeloPrincipal::verificar_rol('m_rol') == '1' ? '' : 'disabled' ?>></button>
                                </form>
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
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="update_user_info" action="../controlador/rol.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update">
                <div id="body_modal" class="row"> </div>
              </form>
            </div>
            <div class="modal-footer">
              <button id="btn_guardar_modal" form="update_user_info" type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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
        include_once("../include/scripts_include.php");
      ?>
    </body>
  </html>

<?php } ?>