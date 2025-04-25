<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}

// esta funcion retorna si el rol tiene permiso a las vista
$rol = modeloPrincipal::verificar_rol('e_venta');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>ESTADISTICAS</title>
      <?php
        include_once("../include/meta_include.php"); 
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <!-- ======= Header ======= -->
      <?php  
        include_once("../include/header.php");
        include_once("../include/sliderbar.php"); ?>

      <main id="main" class="main">
      <div class="pagetitle"><h1> ESTADISTICAS DE SERVICIOS VENDIDOS </h1></div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Graficas de servicios vendidos unitariamente</h5>
                  <?php include("../include/listas_estadisticas_include.php"); consultar_registros('estadistica_servicios'); ?>

                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div id="barChart" style="min-height: 400px;" class="echart"></div>
                      <script>

                        a = 1;
                        var cantidad = [];
                        var array =[];
                        while (c = document.getElementById('producto'+a).value) {
                          k = document.getElementById('cantidad'+a).value;
                          array.push(c);
                          cantidad.push(k);
                          a += 1;
                          document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#barChart")).setOption({
                              xAxis: {
                                type: 'category',
                                data: array
                              },
                              yAxis: {
                                type: 'value'
                              },
                              series: [{
                                data: cantidad,
                                type: 'bar'
                              }]
                            });
                          }); 
                        }
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <?php 
        include_once("../include/footer.php");
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  modeloPrincipal::bitacora("Intento de acceso no autorizado a la pantalla estadísticas de servicios.","Se ha registrado un intento de acceso incorrecto a la pantalla estadísticas de servicios por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
  header('Location: ./inicio.php');
}