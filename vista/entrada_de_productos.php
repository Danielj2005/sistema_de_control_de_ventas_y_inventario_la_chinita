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
      <?php include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php include_once("../include/header.php");
        include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle"><h1> INVENTARIO </h1></div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="card top-selling overflow-auto">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <a type="button" class="btn btn-success" href="registrar_entrada.php">REGISTRAR NUEVA ENTRADA</a>
                  <a class="btn btn-primary" target="_blank" href="./reportes/lista_entradas.php">EXPORTAR LISTA DE ENTRADAS</a>
                </div>
                <div class="card-body pb-3">
                  <h5 class="card-title">LISTA DE ENTRADAS</h5>
                  <table class="table table-borderless table-striped" id="example">
                    <thead>
                      <tr>
                        <th class="col text-center" scope="col">#</th>
                        <th class="col text-center" scope="col">PRODUCTO</th>
                        <th class="col text-center" scope="col">PROVEEDOR</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN $</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN BS</th>
                        <th class="col text-center" scope="col">CANTIDAD COMPRADA</th>
                        <th class="col text-center" scope="col">FECHA / HORA</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php include ('../include/lista_entradas_include.php'); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php include_once("../include/footer.php"); include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>