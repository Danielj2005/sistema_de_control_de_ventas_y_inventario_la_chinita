<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('e_venta');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>ESTADISTICAS</title>
      <?php
        include_once "../include/meta_include.php"; 
        include_once "../include/css_include.php";
      ?>
    </head>
    <body>
      <!-- ======= Header ======= -->
      <?php  
        include_once("../include/header.php");
        include_once("../include/sliderbar.php");
      ?>

      <main id="main" class="main">
      <div class="pagetitle">
          <a class="btn btn-outline-secondary mb-3" href="./">
              <i class="bi bi-chevron-left"></i> 
              <span>Volver al Panel Principal</span>
          </a>
          <h1 class="display-5 fw-bold text-primary mb-4 border-bottom pb-2">
            <i class="bi bi-bar-chart-line-fill me-3"></i> 
            Estadísticas de Servicios Vendidos
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Graficas de servicios vendidos unitariamente</h5>
                  <?php //include("../include/listas_estadisticas_include.php"); consultar_registros('estadistica_servicios'); ?>

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
        include_once("../include/scripts_include.php");
      
        model_user::validar_sesion_activa($id_usuario);

        config_model::verificar_actualizacion_configuracion(); 

        ?>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("estadísticas de servicios");
}