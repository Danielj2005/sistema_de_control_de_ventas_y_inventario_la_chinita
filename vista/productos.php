<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_productos + l_productos');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1 || $rol == 2) {  
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Productos</title> 
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
          <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
          <h1 class="my-3">Productos</h1>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card top-selling pb-3">
                <div class="row p-2 text-center">

                  <div class="col-12 col-sm-12 col-md-6 mb-2 row m-0">
                    <a class="col-12 btn btn-success" <?= rol_model::verificar_rol('r_productos') == 1 ? 'href="./agregar_producto.php"' : 'href="./productos.php" disbled' ?>>Añadir Nuevo Producto</a>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 mb-2 row m-0">
                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_productos.php">Exportar Lista de Productos</a>
                  </div>
                </div>
                <hr>
                    
                
                <div class="card-body pb-0">
                  <div  class="bg-seondary" style="width: fit-content;">
                    <label class="">El significado del texto de color: </label>
                    <ul id="" class="ps-3 nav-content list-unstyled">
                      <li> <label> <span class=""> Negro: Cantidad buena de productos en inventario. </span> </label> </li>
                      <li> <label> <span class="text-warning"> Amarillo: Cantidad media de productos en inventario. </span> </label> </li>
                      <li> <label> <span class="text-danger"> Rojo: Cantidad baja de productos en inventario. </span> </label> </li>
                    </ul>
                  </div>

                  <h5 class="card-title">Lista de Productos</h5>
                  <div class="table table-responsive">
                    <table class="table table-borderless table-stripped" id="example">
                      <thead>
                        <tr>
                          <th class="text-center col" scope="col">#</th>
                          <th class="text-center col" scope="col">Código</th>
                          <th class="text-center col" scope="col">Producto</th>
                          <th class="text-center col" scope="col">Presentación</th>
                          <th class="text-center col" scope="col">Categoría</th>
                          <th class="col text-center" scope="col">Precio de venta en $</th>
                          <th class="text-center col" scope="col">Stock</th>
                        </tr>
                      </thead>
    
                      <tbody>
                        <?php producto_model::lista(); ?>  
                      </tbody>
                    </table>
                  </div>
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
        include_once("../include/scripts_include.php"); 
      
        model_user::validar_sesion_activa($id_usuario);
  
        config_model::verificar_actualizacion_configuracion(); ?>
      
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de productos");
}