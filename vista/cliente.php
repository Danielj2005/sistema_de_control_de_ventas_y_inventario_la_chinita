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
      <title>CLIENTES</title>
      <?php
        include_once("../include/meta_include.php"); 
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php 
        include_once("../include/header.php"); 
        include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle"> <h1>CLIENTES</h1></div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-12">
                  <div class="card top-selling overflow-auto">
                    <a target="_blank" href="./reportes/lista_clientes.php" class="btn btn-success">EXPORTAR LISTA DE CLIENTES</a>
                    <div class="card-body pb-3">
                      <h5 class="card-title">LISTA DE CLIENTES</h5>
                      <table class="table table-borderless datatable" id="example">
                        <thead>
                          <tr>
                            <th class="col" scope="col">#</th>
                            <th class="text-center col" scope="col">CÉDULA</th>
                            <th class="text-center col" scope="col">NOMBRE</th>
                            <th class="text-center col" scope="col">TELÉFONO</th>
                            <th class="text-center col" scope="col">MODIFICAR</th>
                            <!-- <th class="text-center col" scope="col">VER HISTORAL</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php include("../include/listas_registros_include.php"); consultar_registros('cliente'); ?>  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="msjFormSend"></div>
      <?php 
        include_once("../include/footer.php"); 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>