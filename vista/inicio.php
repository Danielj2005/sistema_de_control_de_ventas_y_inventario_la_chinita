<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal
include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- titulo -->
    <title>Inicio</title>
    <!-- metadatos -->  
    <?php include_once ("../include/meta_include.php");
      // estilos y librerias css
      include_once ("../include/css_include.php"); ?>
  </head>
  <body>
    <?php   
      include_once "../include/header.php"; 
      include_once "../include/sliderbar.php";

      $total_ventas_del_dia = venta_model::totales_ventas_del_dia();

      $total_hoy_dolar = $total_ventas_del_dia['dolares'];
      $total_hoy_bs = $total_ventas_del_dia['bs'];
    ?>
    <main id="main" class="main">
      <div class="pagetitle"> <h1> Inicio </h1> </div> 
      <section class="section dashboard">
        <div class="row">

          <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total generado en el Día</h5>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Total en dolares($)</span>
                      <input type="text" class="form-control" disabled id="TotalUSD" readOnly value="<?= ($total_hoy_dolar == "") ? 0 : $total_hoy_dolar ?>">
                      <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Total en boliveras (bs)</span>
                      <input type="text" class="form-control" disabled id="TotalBS" readOnly value="<?= ($total_hoy_bs == "") ? '0' : $total_hoy_bs ?>">
                      <span class="input-group-text" id="basic-addon1">BS</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
            <div class="row">
              <div class="col-12">
                <div class="card top-selling overflow-auto">
                  
                  <div class="card-body p-3 ">
                    <h5 class="card-title">Últimas Ventas Realizadas</h5>
                    <table class="table table-striped overflow-x-auto " id="example">
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
                      <tbody><?php venta_model::lista_ventas_diarias(); ?>  </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </section>
    </main>
    
    <?php   
      include_once "./modal/plantillaModalCustom.php";  
      modalCustom ();

      include_once "../include/footer.php";
      include_once "../include/scripts_include.php";
      
      model_user::validar_sesion_activa($id_usuario);
      config_model::verificar_actualizacion_configuracion(); 
    ?>
  </body>
</html>
