<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else if ($_SESSION['rol'] == "1"){  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Modificar Clientes</title>
      <!-- metadatos -->  
      <?php include_once("../include/meta_include.php"); ?>


        <!-- ======= estilos y librerias css ======= -->
        <?php include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php   
        include_once("../include/header.php");
        include_once("../include/sliderbar.php");

        include_once ("../config/ConfigServer.php");
        include_once("../modelo/modeloPrincipal.php");
      
        $id = $_POST['valor'];

        $consulta = modeloPrincipal::consultar("SELECT * FROM cliente where id_cliente ='$id'");
        $mostrar = mysqli_fetch_array($consulta);


      ?>
      <main id="main" class="main">
        <div class="pagetitle"><h1>Clientes</h1></div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 pb-3">
                  <h5 class="card-title">Modificar Cliente</h5>
                  <form method="post" action="../controlador/cliente_controller.php" class="SendFormAjax" data-type-form="update">

                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="modulo" value="Guardar">

                    <div class="row mb-3">
                      <div class="col-12 mb-3">
                        <label class="form-label">Cédula</label>
                        <input type="text" readonly class="bg-dark-subtle form-control" id="cedula" value="<?= $mostrar['cedula']; ?>" name="cedula">
                      </div>
                      <div class="col-12 mb-3">
                        <label class="col-sm-2 col-form-label">Nombre y Apellido</label>
                        <input type="text" class="bg-dark-subtle form-control" id="inputEmail" value="<?= $mostrar['nombre']; ?>" readonly name="nombre">
                      </div>
                      <div class="col-12 mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
                        <input type="text" class="form-control" id="inputPassword" value="<?= $mostrar['telefono']; ?>" name="telefono">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                  </form>
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