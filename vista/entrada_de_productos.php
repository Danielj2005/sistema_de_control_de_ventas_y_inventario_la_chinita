<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_entrada + l_entrada');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1 || $rol == 2) {  
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Entrada de producto</title>
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
        $fecha_actual = date('Y-m-d');

        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2']; ?>
        
      <main id="main" class="main">
        <div class="pagetitle row">
          <div class="col-12 mb-4">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            <h1 class="my-3"> Entradas</h1>
          </div>
        </div>
        <section class="section dashboard">
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card top-selling ">
                <div class="row text-center p-2 align-items-center">
							
                  <div class="col-12 col-sm-12 col-md-6 mb-2">
                    <a class="col-12 btn btn-success" href="./<?= rol_model::verificar_rol('r_entrada') == 1 ? 'registrar_entrada.php' : 'entrada_de_productos.php' ?>">Registrar Nueva Entrada</a>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 mb-2">
                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_entradas.php">Exportar Lista de Entradas</a>
                  </div>
                </div>
                <hr>
                <div class="card-body pb-3">
                  <h5 class="card-title">Lista de Entradas</h5>
                  <input type="hidden" id="fecha_actual" name="fecha_actual" value="<?= $fecha_actual ?>">
                  <form method="post" class="row mb-3" id="rango_fechas">
                    <p class="alert alert-info">Seleciona un rango de fechas para ver el historial de entradas realizadas dentro de ese rango de fechas</p>
                    

                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Desde</span>
                        <input class="form-control" onblur="dateValidate()" type="date" id="fecha1" name="fecha1">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Hasta</span>
                        <input class="form-control" onblur="dateValidate()" type="date" id="fecha2" name="fecha2">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 mb-3 text-center">
                      <button type="submit" disabled class="btn btn-outline-secondary bi bi-search" id="btn_fechas">&nbsp; Buscar Fecha</button>
                    </div>
                    
                    <!-- mensajes -->
                    <p class="alert alert-danger d-none" id="mensaje_fecha_iguales">La fecha de inicio no puede ser mayor a la fecha de fin y la fecha de fin no puede ser mayor a la fecha actual, verifique y intente nuevamente.</p>
                    <p class="alert alert-danger d-none" id="mensaje_fechas_mayores">El rango de fechas no puede ser mayor a la fecha actual, verifique y intente nuevamente.</p>
                    <p class="alert alert-secondary">Rango selecionado:<br> fecha inicial: <?= $fecha1 ?> <br>fecha final: <?= $fecha2 ?> </p>

                  </form>
                  <div class="table-responsive">
                    <table class="table table-borderless table-striped" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <!-- <th class="col text-center" scope="col">PRODUCTO</th>
                          <th class="col text-center" scope="col">PRESENTACIÓN</th> -->
                          <th class="col text-center" scope="col">PROVEEDOR</th>
                          <th class="col text-center" scope="col">TOTAL DE LA COMPRA EN $</th>
                          <th class="col text-center" scope="col">TOTAL DE LA COMPRA EN BS</th>
                          <th class="col text-center" scope="col">TASA</th>
                          <th class="col text-center" scope="col">FECHA / HORA</th>
                          <th class="col text-center" scope="col">DETALLES</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          

                            if($fecha1 == "" && $fecha2 == ""){
                              $consulta = modeloPrincipal::consultar("SELECT PROV.nombre, E.total_dolar, E.total_bs,
                                E.fecha_entrada, E.id_entrada, D.dolar AS tasa
                                FROM entrada AS E 
                                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                                INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
                                ORDER BY E.fecha_entrada DESC");
                            
                            }else{
                              $consulta = modeloPrincipal::consultar("SELECT PROV.nombre, E.total_dolar, E.total_bs,
                                E.fecha_entrada, E.id_entrada, D.dolar AS tasa
                                FROM entrada AS E 
                                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                                INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
                                WHERE E.fecha_entrada BETWEEN '$fecha1' AND '$fecha2' 
                                ORDER BY E.fecha_entrada DESC");
                            }
                            
                            $i = 1;
                            // se guardan los datos en un array y se imprime
                            while ( $mostrar = mysqli_fetch_array($consulta)) { ;?>    
                              <tr>
                                  <td class="col text-center"><?= $i++; ?></td>
                                  <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                                  <td class="col text-center"><?= $mostrar["total_dolar"].' $'; ?></td>
                                  <td class="col text-center"><?= $mostrar["total_bs"].' Bs'; ?></td>
                                  <td class="col text-center"><?= $mostrar["tasa"].' Bs'; ?></td>
                                  <td class="col text-center"><?= date('Y-m-d h:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>

                                  <td class="text-center col" scope="col">
                                    <button modal="ver_detalles_entrada" <?= rol_model::verificar_rol('l_entrada') == '1' ? 'url="./modal/producto/detalles_entrada.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn bi bi-eye btn-info" value="<?= $mostrar["id_entrada"]; ?>"></button>
                                  </td>
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
              <h5 class="modal-title" id="exampleModalLabel">Modificación de un servicio</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="update_user_info" action="../controlador/menu_controlador.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update">
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
      
        model_user::validar_sesion_activa($id_usuario);

        config_model::verificar_actualizacion_configuracion(); 

        ?>
        
      <script src="./js/rango_fechas.js"></script>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de entradas");
}