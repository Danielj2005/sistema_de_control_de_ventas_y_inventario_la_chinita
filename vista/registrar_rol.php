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
      <title>Roles</title>
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
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./productos.php">&nbsp; Volver</a>
            Registro de rol
          </h1> 
        </div>
        <section class="section dashboard">
          <div class="card p-3">
            <div class="container-fluid row mb-3 p-3 justify-content-around">
              <!-- vistas de proveedores -->
              <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3">
                <form id="" action="../controlador/rol.php" method="post" class="SendFormAjax row justify-content-center" autocomplete="off" data-type-form="save">
                  <input type="hidden" name="modulo" value="Guardar">
                  <div class="col-12 col-md-6 mb-3">
                    <label class="col-label-form">Nombre del rol <span style="color:#f00;">*</span></label>
                    <input type="text" name="nombre_rol" id="nombre_rol" class="form-control">
                  </div>

                  <!-- <div class="table-responsive">
                    <h5 class="card-title">Lista de pantallas del sistema</h5>
                    <table class="table table-borderless datatable border">
                      <thead>
                        <tr class="table-secondary">
                          <th scope="col">INVENTARIO</th>
                          <th scope="col">VENTAS</th>
                          <th scope="col">MENÚ</th>
                          <th scope="col">USUARIOS</th>
                          <th scope="col" class="text-center">CONFIGURACIÓN</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          inventario 
                          <td class="col">
                            <div class="border mb-3 p-2 rounded-3">
                              <h4 class="card-title">
                                <input type="checkbox">
                                Proveedores
                              </h4>
                              <ul id="" class="nav-content list-unstyled"> 
                                <li>
                                  <input type="checkbox">
                                  <span>Registro de proveedores</span>
                                </li>

                                <li>
                                  <input type="checkbox">
                                  <span>Proveedores registrados</span>
                                </li>

                                <li>
                                  <input type="checkbox">
                                  <span>Modificar proveedores</span>
                                </li>
                                
                                <li>
                                  <input type="checkbox">
                                  <span>Historial de compras</span>
                                </li>
                              </ul>
                            </div>
                          </td>

                          ventas 
                          <td>
                            <div class="border p-2 rounded-3">
                              <h2 class="card-title">
                                <input type="checkbox">
                                Ventas
                              </h2>
                              <ul id="" class="nav-content list-unstyled"> 
                                <li>
                                  <input type="checkbox">
                                  <span>Ventas realizadas</span>
                                </li>
                                <li>
                                  <input type="checkbox">
                                  <span>Detalles de ventas</span>
                                </li>
      
                                <li>
                                  <input type="checkbox">
                                  <span>Ver factura</span>
                                </li>
      
                                <li>
                                  <input type="checkbox">
                                  <span>Ver estadísticas</span>
                                </li>
                                
                                <li>
                                  <input type="checkbox">
                                  <span>Generar venta</span>
                                </li>
                              </ul>
                            </div>
                          </td>
                          
                          menú  
                          <td>
                            <div class="border p-2 rounded-3">
                              <h2 class="card-title">
                                <input type="checkbox">
                                Menú
                              </h2>
                              <ul id="" class="nav-content list-unstyled"> 
                                <li>
                                  <input type="checkbox">
                                  <span>Registro de servicio</span>
                                </li>

                                <li>
                                  <input type="checkbox">
                                  <span>Ver servicios registrados</span>
                                </li>
                                <li>
                                  <input type="checkbox">
                                  <span>Modificación de estado de los servicios</span>
                                </li>
                              </ul>
                            </div>
                            
                          </td>


                          <td>
                            
                          </td>


                          <td scope="row" class="text-center">
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td class="col">
                            <div class="border mb-3 p-2 rounded-3">
                              <h2 class="card-title">
                                <input type="checkbox">
                                Productos
                              </h2>
                              <ul id="" class="nav-content list-unstyled">
                                <li>
                                  <input type="checkbox">
                                  <span>Registrar categoría</span>
                                </li>
                                <li>
                                  <input type="checkbox">
                                  <span>Registrar presentación</span>
                                </li>
                                <li>
                                  <input type="checkbox">
                                  <span>Registro de productos</span>
                                </li>

                                <li>
                                  <input type="checkbox">
                                  <span>Productos registrados</span>
                                </li>
                                
                                <li>
                                  <input type="checkbox">
                                  <span>Entrada de productos</span>
                                </li>
                              </ul>
                            </div>
                          </td>


                        </tr>
                      </tbody>
                    </table>
                  </div> -->

                  <div class="col-12 col-md-12 mb-3">
                    <h4 class="mb-3">Inventario</h4>
                    <hr>
                    <div class="row p-0 justify-content-around">
                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h4 class="card-title">
                          <input type="checkbox">
                          Proveedores
                        </h4>
                        <ul id="" class="nav-content list-unstyled"> 
                          <li>
                            <input type="checkbox">
                            <span>Registro de proveedores</span>
                          </li>

                          <li>
                            <input type="checkbox">
                            <span>Proveedores registrados</span>
                          </li>

                          <li>
                            <input type="checkbox">
                            <span>Modificar proveedores</span>
                          </li>
                          
                          <li>
                            <input type="checkbox">
                            <span>Historial de compras</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input type="checkbox">
                          Productos
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input type="checkbox">
                            <span>Registrar categoría</span>
                          </li>
                          <li>
                            <input type="checkbox">
                            <span>Registrar presentación</span>
                          </li>
                          <li>
                            <input type="checkbox">
                            <span>Registro de productos</span>
                          </li>

                          <li>
                            <input type="checkbox">
                            <span>Productos registrados</span>
                          </li>
                          
                          <li>
                            <input type="checkbox">
                            <span>Entrada de productos</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <hr>

                  <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                      <h4 class="mb-3">Ventas</h4>
                      <hr>
                      <div class="row m-0 p-0 justify-content-between">
                        <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                          <h2 class="card-title">
                            <input type="checkbox">
                            Ventas
                          </h2>
                          <ul id="" class="nav-content list-unstyled"> 
                            <li>
                              <input type="checkbox">
                              <span>Ventas realizadas</span>
                            </li>
                            <li>
                              <input type="checkbox">
                              <span>Detalles de ventas</span>
                            </li>
  
                            <li>
                              <input type="checkbox">
                              <span>Ver factura</span>
                            </li>
  
                            <li>
                              <input type="checkbox">
                              <span>Ver estadísticas</span>
                            </li>
                            
                            <li>
                              <input type="checkbox">
                              <span>Generar venta</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                      <h4 class="mb-3">Menú</h4>
                      <hr>
                      <div class="row m-0 p-0 gap- justify-content-between">
  
                        <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                          <h2 class="card-title">
                            <input type="checkbox">
                            Menú
                          </h2>
                          <ul id="" class="nav-content list-unstyled"> 
                            <li>
                              <input type="checkbox" value="1">
                              <span>Registro de servicio</span>
                            </li>

                            <li>
                              <input type="checkbox" value="1">
                              <span>Ver servicios registrados</span>
                            </li>
                            <li>
                              <input type="checkbox" value="1">
                              <span>Modificación del precio de los servicios</span>
                            </li>
                            <li>
                              <input type="checkbox" value="1">
                              <span>Modificación de estado de los servicios</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <hr>
                  <div class="col-12 col-md-12 mb-3">
                    <h4 class="mb-3">Usuario</h4>
                    <hr>
                    <div class="row p-0 justify-content-around">
                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h4 class="card-title">
                          <input id="cliente" type="checkbox" value="1">
                          Cliente
                        </h4>
                        <ul class="ul_cliente nav-content list-unstyled"> 
                          <li>
                            <input class="rol_cliente" type="checkbox">
                            <span>Registro de clientes</span>
                          </li>

                          <li>
                            <input class="rol_cliente" type="checkbox">
                            <span>Modificación de clientes</span>
                          </li>

                          <li>
                            <input class="rol_cliente" type="checkbox">
                            <span>Ver historial de clientes</span>
                          </li>
                          
                          <li>
                            <input class="rol_cliente" type="checkbox">
                            <span>Ver facturas de clientes</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input type="checkbox">
                          Empleados (usuarios)
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input type="checkbox">
                            <span>Registro de empleados</span>
                          </li>
                          <li>
                            <input type="checkbox">
                            <span>Modificación de empleados</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input type="checkbox">
                          Roles
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input type="checkbox">
                            <span>Registro de roles</span>
                          </li>
                          <li>
                            <input type="checkbox">
                            <span>Modificación de roles</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <hr>
                  <div class="form-group">
                      <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      
      <script type="text/javascript" src="./js/selector_dinamico.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>