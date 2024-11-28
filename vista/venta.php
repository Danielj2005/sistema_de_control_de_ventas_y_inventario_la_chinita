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
      <title>Ventas</title>
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
        

        require_once ('../config/ConfigServer.php');
        require_once ('../modelo/modeloPrincipal.php');

      
        $montos_ventas_del_dia = mysqli_fetch_array(modeloPrincipal::consultar("SELECT 
          ROUND(sum(V.monto_total_dolares),2) as total_de_ventas_en_dolares,
          ROUND(sum(V.monto_total_bolivares),2) as total_de_ventas_en_bolivares
          FROM venta as V ORDER BY V.id_venta DESC"));

        $monto_total_hoy_en_dolares = $montos_ventas_del_dia['total_de_ventas_en_dolares'];
        $monto_total_hoy_en_bolivares = $montos_ventas_del_dia['total_de_ventas_en_bolivares'];

        $fecha_actual = date('Y-m-d');

        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        

      ?>
      <main id="main" class="main">
        <div class="pagetitle">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al Inicio</a>
            <h1 class="mt-3"> Ventas </h1>
        </div> 
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Generado</h5>
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Monto Total (USD)</span>
                        <input type="text" class="form-control" disabled id="TotalUSD" readOnly value="<?= ($monto_total_hoy_en_dolares == "") ? 0 : $monto_total_hoy_en_dolares ?>">
                        <span class="input-group-text" id="basic-addon1">$</span>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Monto Total (BS)</span>
                        <input type="text" class="form-control" disabled id="TotalBS" readOnly value="<?= ($monto_total_hoy_en_bolivares == "") ? 0 : $monto_total_hoy_en_bolivares ?>">
                        <span class="input-group-text" id="basic-addon1">BS</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="row">
                <div class="col-12">
                  <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                      <h5 class="card-title">Listado de Ventas</h5>
                      <input type="hidden" id="fecha_actual" name="fecha_actual" value="<?= $fecha_actual ?>">
                      <form method="post" class="row mb-3" id="rango_fechas">
                        <p class="alert alert-info">Seleciona un rango de fechas para ver las ventas realizadas dentro de ese rango de fechas</p>
                        
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

                      
                      <div class="card-body p-3 table-responsive">
                        <table class="table table-striped " id="example">
                          <thead>
                            <tr>
                              <th class="col text-center" scope="col">#</th>
                              <th class="col text-center" scope="col">Nº DE FACTURA</th>
                              <th class="col text-center" scope="col">CÉDULA DEL CLIENTE</th>
                              <th class="col text-center" scope="col">NOMBRE DEL CLIENTE</th>
                              <th class="col text-center" scope="col">MONTO TOTAL EN $</th>
                              <th class="col text-center" scope="col">MONTO TOTAL EN BS</th>
                              <th class="col text-center" scope="col">FECHA</th>
                              <th class="col text-center" scope="col">DETALLES DE VENTA</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              


                              if($fecha1 == "" && $fecha2 == ""){
                                $ventas_realizadas = modeloPrincipal::consultar("SELECT V.id_venta, C.cedula, C.nombre, 
                                  V.monto_total_bolivares, V.monto_total_dolares, V.fecha_venta FROM venta as V 
                                  INNER JOIN cliente as C ON V.id_cliente = C.id_cliente ORDER BY V.id_venta DESC");
                              
                              }else{
                                $ventas_realizadas = modeloPrincipal::consultar("SELECT V.id_venta, C.cedula, C.nombre, 
                                  V.monto_total_bolivares, V.monto_total_dolares, V.fecha_venta FROM venta as V 
                                  INNER JOIN cliente as C ON V.id_cliente = C.id_cliente 
                                  WHERE V.fecha_venta BETWEEN '$fecha1' AND '$fecha2' ORDER BY V.id_venta DESC");
                                
                              }




                              $i = 1 ;
                              if(mysqli_num_rows($ventas_realizadas) > 0){
                                while($row = mysqli_fetch_array($ventas_realizadas)){ ?>
                                  <tr>
                                    <td class="text-center col"><?= $i++ ?></td> 
                                    <td class="text-center col">#<?= modeloPrincipal::generar_numero($row['id_venta']) ?></td> 
                                    <td class="text-center col"><?= $row['cedula'] ?></td> 
                                    <td class="text-center col"><?= $row['nombre'] ?></td> 
                                    <td class="text-center col"><?= $row['monto_total_dolares'].' $' ?></td> 
                                    <td class="text-center col"><?= $row['monto_total_bolivares'].' bs' ?></td> 
                                    <td class="text-center col"><?= $row['fecha_venta'] ?></td> 
                                    <td class="text-center col">
                                        <button class="btn btn-info bi bi-eye detalles_generales" modal="detalles_de_ventas" modulo="detalles_venta" value="<?= $row['id_venta'] ?>" data-bs-toggle="modal" data-bs-target="#detalles_venta"></button>
                                    </td> 
                                  </tr>
                              <?php } } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <!-- Modal detalles de venta -->
      <div class="modal fade" id="detalles_venta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalles de Venta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detalles_de_ventas">
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <script >
        

      </script>
      <?php   include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); ?>
      <script src="./js/detalles_listas.js"></script>
      <script src="./js/rango_fechas.js"></script>
      
    </body>
  </html>
<?php } ?>