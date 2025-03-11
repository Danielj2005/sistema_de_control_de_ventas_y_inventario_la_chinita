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
                          <input id="proveedores" class="vista" type="checkbox" value="proveedores">
                          Proveedores
                        </h4>
                        <ul id="" class="nav-content list-unstyled"> 
                          <li>
                            <input class="proveedores" type="checkbox" value="1" name="r_proveedores">
                            <span>Registro de proveedores</span>
                          </li>

                          <li>
                            <input class="proveedores" type="checkbox" value="1" name="l_proveedores">
                            <span>Lista de proveedores registrados</span>
                          </li>

                          <li>
                            <input class="proveedores" type="checkbox" value="1" name="m_proveedores">
                            <span>Modificar proveedores</span>
                          </li>
                          
                          <li>
                            <input class="proveedores" type="checkbox" value="1" name="h_proveedores">
                            <span>Historial de compras</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input class="vista" type="checkbox" value="productos">
                          Productos
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input name="r_categoria" class="productos" value="1" type="checkbox">
                            <span>Registro de categoría</span>
                          </li>
                          <li>
                            <input name="r_presentacion" class="productos" value="1" type="checkbox">
                            <span>Registro de presentación</span>
                          </li>
                          <li>
                            <input name="r_productos" class="productos" value="1" type="checkbox">
                            <span>Registro de productos</span>
                          </li>

                          <li>
                            <input name="l_productos" class="productos" value="1" type="checkbox">
                            <span>Lista de productos registrados</span>
                          </li>
                          
                          <li>
                            <input name="e_productos" class="productos" value="1" type="checkbox">
                            <span>Entrada de productos</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <hr>

                  <div class="row">
                    <h4 class="mb-3">Ventas</h4>
                    <hr>
                    <div class="col-12 col-md-6 mb-3">
                      <div class="row m-0 p-0 justify-content-around">
                        <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                          <h2 class="card-title">
                            <input  class="vista" value="Ventas" type="checkbox">
                            Ventas
                          </h2>
                          <ul id="" class="nav-content list-unstyled"> 
                            
                            <li>
                              <input name="g_venta" class="Ventas" value="1" type="checkbox">
                              <span>Generar venta</span>
                            </li>

                            <li>
                              <input name="l_venta" class="Ventas" value="1" type="checkbox">
                              <span>Lista de ventas realizadas</span>
                            </li>
                            <li>
                              <input name="d_venta" class="Ventas" value="1" type="checkbox">
                              <span>Detalles de ventas realizadas</span>
                            </li>
  
                            <li>
                              <input name="f_venta" class="Ventas" value="1" type="checkbox">
                              <span>Ver facturas de ventas realizadas</span>
                            </li>
  
                            <li>
                              <input name="est_venta" class="Ventas" value="1" type="checkbox">
                              <span>Ver estadísticas de ventas realizadas</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                      <h4 class="mb-3">Menú</h4>
                      <hr>
                      <div class="row p-0 justify-content-around">
  
                        <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                          <h2 class="card-title">
                            <input class="vista" type="checkbox" value="servicio">
                            Menú
                          </h2>
                          <ul id="" class="nav-content list-unstyled"> 
                            <li>
                              <input name="r_servicio" class="servicio" value="1" type="checkbox" value="1">
                              <span>Registro de servicio</span>
                            </li>

                            <li>
                              <input name="l_servicio" class="servicio" value="1" type="checkbox" value="1">
                              <span>Lista de servicios registrados</span>
                            </li>

                            <li>
                              <input name="m_servicio" class="servicio" value="1" type="checkbox" value="1">
                              <span>Modificación de los servicios</span>
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
                      <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                        <h4 class="card-title">
                          <input id="cliente" class="vista" type="checkbox" value="cliente">
                          Cliente
                        </h4>
                        <ul class="ul_cliente nav-content list-unstyled"> 
                          <li>
                            <input name="r_cliente" class="cliente" value="1" type="checkbox">
                            <span>Registro de clientes</span>
                          </li>
                          
                          <li>
                            <input name="l_cliente" class="cliente" value="1" type="checkbox">
                            <span>Lista de clientes registrados</span>
                          </li>

                          <li>
                            <input name="m_cliente" class="cliente" value="1" type="checkbox">
                            <span>Modificación de clientes</span>
                          </li>

                          <li>
                            <input name="h_cliente" class="cliente" value="1" type="checkbox">
                            <span>Ver historial de clientes</span>
                          </li>
                          
                          <li>
                            <input name="f_cliente" class="cliente" value="1" type="checkbox">
                            <span>Ver facturas de clientes</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input class="vista" type="checkbox" value="empleado">
                          Empleados (usuarios)
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input name="r_empleado" class="empleado" value="1" type="checkbox">
                            <span>Registro de empleados</span>
                          </li>
                          <li>
                            <input name="l_empleado" class="empleado" value="1" type="checkbox">
                            <span>Lista de empleados registrados</span>
                          </li>
                          <li>
                            <input name="m_empleado" class="empleado" value="1" type="checkbox">
                            <span>Modificación de empleados</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input class="vista" type="checkbox" value="roles">
                          Roles
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input name="r_rol" class="roles" value="1" type="checkbox">
                            <span>Registro de roles</span>
                          </li>
                          <li>
                            <input name="l_rol" class="roles" value="1" type="checkbox">
                            <span>Lista de roles registrados</span>
                          </li>
                          <li>
                            <input name="m_rol" class="roles" value="1" type="checkbox">
                            <span>Modificación de roles</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <hr>
                  <div class="col-12 col-md-12 mb-3">
                    <h4 class="mb-3">Configuración</h4>
                    <hr>
                    <div class="row p-0 justify-content-around">
                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h4 class="card-title">
                          <input class="vista" type="checkbox" value="ajustes_sistema">
                          Ajustes del sistema
                        </h4>
                        <ul class="ul_cliente nav-content list-unstyled"> 
                          <li>
                            <input name="m_cant_pregunta_seguridad" class="ajustes_sistema" value="1" type="checkbox">
                            <span>Modificar cantidad de preguntas de seguridad</span>
                          </li>

                          <li>
                            <input name="m_tiempo_sesion" class="ajustes_sistema" value="1" type="checkbox">
                            <span>Modificar tiempo de inactividad de sesión</span>
                          </li>

                          <li>
                            <input name="m_cant_caracteres" class="ajustes_sistema" value="1" type="checkbox">
                            <span>Modificar cantidad de carecteres</span>
                          </li>
                          
                          <li>
                            <input name="m_cant_simbolos" class="ajustes_sistema" value="1" type="checkbox">
                            <span>Modificar cantidad de símbolos</span>
                          </li>
                          
                          <li>
                            <input name="m_cant_num" class="ajustes_sistema" value="1" type="checkbox">
                            <span>Modificar cantidad de números</span>
                          </li>
                        </ul>
                      </div>

                      <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                          <input class="vista" type="checkbox" value="bitacora">
                          Bitácora
                        </h2>
                        <ul id="" class="nav-content list-unstyled">
                          <li>
                            <input name="v_bitacora" class="bitacora" value="1" type="checkbox">
                            <span>Ver bitácora</span>
                          </li>
                          <li>
                            <input name="d_bitacora" class="bitacora" value="1" type="checkbox">
                            <span>Detalles de movimientos</span>
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
      <script type="text/javascript" src="./js/funcion_seleccionar_casillas.js"></script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php");
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    </body>
  </html>
<?php } ?>