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
    <title>INVENTARIO</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <?php   include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php   include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle"><h1> ESTADISTICAS DE VENTA </h1></div>

      <section class="section dashboard">
        <div class="row">

          <div class="col-lg-12">
              


              <div class="card">
            <div class="card-body">
              <h5 class="card-title">VENTAS DE LA SEMANA ACTUAL</h5>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">BARRA</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">LINEAS</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">DONA</button>
                </li>
              </ul>

              <div class="tab-content pt-2" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                  <div id="barChart" style="min-height: 400px;" class="echart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#barChart")).setOption({
                        xAxis: {
                          type: 'category',
                          data: ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO']
                        },
                        yAxis: {
                          type: 'value'
                        },
                        series: [{
                          data: [10, 12, 14, 15, 3, 6, 11],
                          type: 'bar'
                        }]
                      });
                    });
                  </script>

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  <div id="lineChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#lineChart"), {
                    series: [{
                      name: "Desktops",
                      data: [10, 12, 14, 15, 3, 6, 11]
                    }],
                    chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                      },
                    },
                    xaxis: {
                      categories: ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'],
                    }
                  }).render();
                });
              </script>

                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                  <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: [
                        'LUNES',
                        'MARTES',
                        'MIERCOLES',
                        'JUEVES',
                        'VIERNES',
                        'SABADO',
                        'DOMINGO'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [10, 12, 14, 15, 3, 6, 11],
                        backgroundColor: [
                          'rgb(255, 0, 0)',
                          'rgb(255, 255, 0)',
                          'rgb(0, 128, 0)',
                          'rgb(0, 0, 128)',
                          'rgb(128, 0, 128)',
                          'rgb(0, 128, 128)',
                          'rgb(0, 0, 255)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>


                </div>
              </div><!-- End Default Tabs -->

            </div>
          </div>
        </div>
         
        </div>
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    
    <?php   include_once("../include/footer.php"); ?>

    <!-- End Footer -->
    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->
  </body>
  </html>
<?php } ?>