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
      <title>Añadir Servicio</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./menu.php">&nbsp; Volver</a>
            Registrar Servicio
          </h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body p-3">
                  <form method="post" action="../controlador/menu_controlador.php" class="row SendFormAjax p-3" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="dolar" id="precioDolar" value="<?= $mostrarDolar['dolar']; ?>">
                    <input type="hidden" name="modulo" value="Guardar">

                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <h5 class="card-title"> Datos del Servicio </h5>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <label class="form-label">Nombre del Servicio</label>
                          <div class="col-md-4 input-group">
                            <input type="text" class="form-control" placeholder="ingresa el nombre del servicio" name="nombre_platillo" id="nombre_platillo" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Descripción</label>
                          <input type="text" class="form-control" placeholder="ingresa la descripción" id="descripcion" name="descripcion" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 form-group overflow-hidden">
                      <h5 class="card-title">Productos a agregar al servicio</h5>
                      <label class="form-label">Producto <span style="color:#f00;">*</span></label>
                      <select multiple onchange="añadir_tr_a_tabla('productos_servicio')" class="form-control Select" id="id_producto" name="producto[]" required>
                        <option>Selecciona una opción</option>
                        <?php
                          $consulta = modeloPrincipal::consultar("SELECT id_producto, codigo, nombre_producto FROM producto WHERE estatus = 1");

                          while ( $mostrar = mysqli_fetch_array($consulta)) { ?>

                            <option value="<?= $mostrar['id_producto']; ?>" name="<?= $mostrar['nombre_producto']; ?>"><?= $mostrar['codigo'].' - '.$mostrar['nombre_producto']; ?></option>

                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-12">
                      <div class="table-responsive">
                        <h5 class="card-title">Lista de productos</h5>
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th class="col text-center" scope="col">#</th>
                              <th class="col text-center" scope="col">PRODUCTO</th>
                              <th class="col text-center" scope="col">PRESENTACIÓN</th>
                              <th class="col text-center" scope="col">CANTIDAD</th>
                              <th class="col text-center" scope="col">PRECIO POR UNIDAD EN $</th>
                              <th class="col text-center" scope="col">PRECIO POR UNIDAD EN BS</th>
                            </tr>
                          </thead>
                          <tbody id="lista_productos">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3 mt-5"> 
                      <h7 class="card-title">Precio del Servicio</h7>

                      <div class="row mt-2">
                        <div class="col-12 col-sm-6 col-md-6 mb-3 text-start">
                          <label class="form-label">En Dolares ($)</label>
                          <input class="form-control" onkeyup="transformar('precio_dolar_servicio','precio_bolivar_servcio')" id="precio_dolar_servicio" name="precio_dolar" placeholder="ingresa el precio en $">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 mb-3 text-center">
                          <label class="form-label">En Bolivares (BSS)</label>
                          <input class="form-control  bg-dark-subtle" readonly id="precio_bolivar_servcio" name="precio_bolivar" placeholder="ingresa el precio en bs">
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                      <button type="submit" class="btn btn-success zmdi zmdi-floppy">&nbsp; Registra Servicio</button>
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