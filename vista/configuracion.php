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
      <title>Configuración del Sistema</title>
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
          <h1>
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver</a>
            Configuración del sistema
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row"> 
            <div class="col-12">
              <div class="card top-selling overflow-auto"> 
                <div class="card-body pb-0">
                  <form action="../controlador/Configuracion.php" method="post" class="p-4 SendFormAjax row" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="modulo" value="Guardar">

                    <fieldset class="mb-4">
                      <legend class="h5 card-title">Configuración estandar del sistema</legend>
                      <div class="row m-0">
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="mb-2">Cantidad de preguntas de seguridad para los usuarios <span style="color:#f00;">*</span></label>
                          <input class="form-control" type="number" name="c_preguntas" min="3" max="6" id="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                          <label class="mb-2">Tiempo de inactividad de sesión <span style="color:#f00;">*</span></label>
                          <input class="form-control" type="number" name="tiempo_inactividad" min="3" max="10" id="">
                        </div>
                      </div>
  
                    </fieldset>

                    <hr>

                    <fieldset class="boder rounded-3 mb-4">
                      <legend class="h5 card-title">Parámetros de contraseña para los usuarios</legend>
                      <div class="row m-0">
                        <div class="col-12 col-sm-12 col-md-4 mb-3">
                          <label for="">Cantidad de caracteres <span style="color:#f00;">*</span></label>
                          <input class="form-control" type="number" name="c_caracteres" min="1" max="10" id="">
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-4 mb-3">
                          <label for="">Cantidad de símbolos <span style="color:#f00;">*</span></label>
                          <input class="form-control" type="number" name="c_simbolos" min="1" max="8" id="">
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-4 mb-3">
                          <label for="">Cantidad de números <span style="color:#f00;">*</span></label>
                          <input class="form-control" type="number" name="c_numeros" min="1" max="5" id="">
                        </div>
                      </div>
                    </fieldset>

                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mt-3 mb-3 text-center">
                      <button name="insertar" class="btn btn-success">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>