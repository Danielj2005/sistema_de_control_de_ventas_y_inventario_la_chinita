<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_rol');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1) {  ?>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- titulo -->
        <title>Registro de rol</title>
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
              <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./roles.php">&nbsp; Volver</a>
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


                    <div class="col-12 col-md-12 mb-3">
                      <h4 class="mb-3">Inventario</h4>
                      <hr>
                      <div class="row p-0 justify-content-around">
                        <div class="col-12 col-sm-12 col-md-6 p-2">
                          <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proveedoresCard" aria-expanded="true" aria-controls="collapseOne">
                                  Módulo Proveedores
                                </button>
                              </h2>
                              <div id="proveedoresCard" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <ul id="" class="nav-content list-unstyled"> 
                                    <li class="nav-item">
                                      <input id="proveedores" class="vista" type="checkbox" value="proveedores">
                                      <span>Acceso Total al Módulo de Proveedores</span>
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      <li class="nav-item">
                                        <input class="proveedores" type="checkbox" value="1" name="r_proveedores">
                                        <span>Registrar Nuevos Proveedores</span>
                                      </li>
                                      <li>
                                        <input class="proveedores" type="checkbox" value="1" name="m_proveedores">
                                        <span>Modificar Información de Proveedores</span>
                                      </li>
                                      <li>
                                        <input class="proveedores" type="checkbox" value="1" name="l_proveedores">
                                        <span>Consultar Lista de Proveedores Registrados</span>
                                      </li>
                                      <li>
                                        <input class="proveedores" type="checkbox" value="1" name="h_proveedores">
                                        <span>Visualizar Historial de Compras</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 p-2" id="modulo_productos">
                          <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="true" aria-controls="collapseOne">
                                  Módulo Productos
                                </button>
                              </h2>
                              <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <ul id="" class="nav-content list-unstyled"> 
                                    <li>
                                      <input class="vista" type="checkbox" value="productos">
                                      Acceso Total al Módulo de Productos
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      <li>
                                        <input name="r_categoria" class="productos" value="1" type="checkbox">
                                        <span>Registrar Nuevas Categorías</span>
                                      </li>
                                      <br>
                                      <li>
                                        <input name="r_presentacion" class="productos" value="1" type="checkbox">
                                        <span>Registrar Nuevas Presentaciones</span>
                                      </li>
                                      <br>
                                      <li>
                                        <input name="r_productos" class="productos" value="1" type="checkbox">
                                        <span>Registrar Nuevos Productos</span>
                                      </li>
                                      <li>
                                        <input name="l_productos" class="productos" value="1" type="checkbox">
                                        <span>Consultar Lista de Productos Registrados</span>
                                      </li>
                                      <br>
                                      <li>
                                        <input name="e_productos" class="productos" value="1" type="checkbox">
                                        <span>Registrar Entrada de Productos</span>
                                      </li>
                                      <li>
                                        <input name="e_productos" class="productos" value="1" type="checkbox">
                                        <span>Consultar Lista de Entradas de Productos</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    <hr>
                    <hr>

                    <div class="row">
                      <div class="col-12 col-md-6 mb-2">
                        <h4 class="mb-3">Ventas</h4>
                        <hr>
                        <div class="row p-0 justify-content-around">
                          <div class="col-12 col-sm-12 col-md-12 p-2" id="modulo_ventas">
                            <div class="accordion" id="accordionVentas">
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ventasCard" aria-expanded="true" aria-controls="ventasCard">
                                    Módulo Ventas
                                  </button>
                                </h2>
                                <div id="ventasCard" class="accordion-collapse collapse " data-bs-parent="#accordionVentas">
                                  <div class="accordion-body">
                                    <ul class="nav-content list-unstyled">
                                      <li>
                                        <input class="vista" type="checkbox" value="Ventas">
                                        Acceso Total al Módulo de Ventas
                                      </li>
                                      <ul id="" class="ps-3 nav-content list-unstyled">
                                      
                                        <li>
                                          <input name="g_venta" class="Ventas" value="1" type="checkbox">
                                          <span>Generar Nuevas Ventas</span>
                                        </li>
                                        <li>
                                          <input name="l_venta" class="Ventas" value="1" type="checkbox">
                                          <span>Consultar Lista de Ventas Realizadas</span>
                                        </li>
                                        <li>
                                          <input name="d_venta" class="Ventas" value="1" type="checkbox">
                                          <span>Visualizar Detalles de Ventas</span>
                                        </li>
                                        <li>
                                          <input name="f_venta" class="Ventas" value="1" type="checkbox">
                                          <span>Acceder a Facturas de Ventas</span>
                                        </li>
                                        <li>
                                          <input name="est_venta" class="Ventas" value="1" type="checkbox">
                                          <span>Consultar Estadísticas de Ventas</span>
                                        </li>
                                      </ul>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-6 mb-2" id="modulo_servicios">
                        <h4 class="mb-3">Menú</h4>
                        <hr>
                        <div class="row p-0 justify-content-around">
                          <div class="col-12 col-md-12 mb-3 p-2" id="modulo_servicios">
                            <div class="accordion" id="accordionServicios">
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviciosCard" aria-expanded="true" aria-controls="serviciosCard">
                                    Módulo Servicios
                                  </button>
                                </h2>
                                <div id="serviciosCard" class="accordion-collapse collapse" data-bs-parent="#accordionServicios">
                                  <div class="accordion-body">
                                    <ul class="nav-content list-unstyled">
                                      <li>
                                        <input class="vista" type="checkbox" value="servicio">
                                        Acceso Total al Módulo de Servicios
                                      </li>
                                      <ul id="" class="ps-3 nav-content list-unstyled">
                                        
                                        <li>
                                          <input name="r_servicio" class="servicio" value="1" type="checkbox">
                                          <span>Registrar Nuevos Servicios</span>
                                        </li>
                                        <li>
                                          <input name="m_servicio" class="servicio" value="1" type="checkbox">
                                          <span>Modificar Información de Servicios</span>
                                        </li>
                                        <li>
                                          <input name="l_servicio" class="servicio" value="1" type="checkbox">
                                          <span>Consultar Lista de Servicios Registrados</span>
                                        </li>
                                      </ul>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
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
                        <div class="col-12 col-sm-12 col-md-4 mb-3 p-2" id="modulo_cliente">
                          <div class="accordion" id="accordionCliente">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clienteCard" aria-expanded="true" aria-controls="clienteCard">
                                  Módulo Cliente
                                </button>
                              </h2>
                              <div id="clienteCard" class="accordion-collapse collapse " data-bs-parent="#accordionCliente">
                                <div class="accordion-body">
                                  <ul class="nav-content list-unstyled">
                                    <li>
                                      <input id="cliente" class="vista" type="checkbox" value="cliente">
                                      Acceso Total al Módulo de Clientes
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      
                                      <li>
                                        <input name="r_cliente" class="cliente" value="1" type="checkbox">
                                        <span>Registrar Nuevos Clientes</span>
                                      </li>
                                      <li>
                                        <input name="m_cliente" class="cliente" value="1" type="checkbox">
                                        <span>Modificar Información de Clientes</span>
                                      </li>
                                      <li>
                                        <input name="l_cliente" class="cliente" value="1" type="checkbox">
                                        <span>Consultar Lista de Clientes Registrados</span>
                                      </li>
                                      <li>
                                        <input name="h_cliente" class="cliente" value="1" type="checkbox">
                                        <span>Visualizar Historial de Clientes</span>
                                      </li>
                                      <li>
                                        <input name="f_cliente" class="cliente" value="1" type="checkbox">
                                        <span>Acceder a Facturas de Clientes</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-4 mb-3 p-2" id="modulo_empleado">
                          <div class="accordion" id="accordionEmpleado">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empleadoCard" aria-expanded="true" aria-controls="empleadoCard">
                                  Módulo Empleados
                                </button>
                              </h2>
                              <div id="empleadoCard" class="accordion-collapse collapse" data-bs-parent="#accordionEmpleado">
                                <div class="accordion-body">
                                  <ul class="nav-content list-unstyled">
                                    <li>
                                      <input class="vista" type="checkbox" value="empleado">
                                      Acceso Total al Módulo de Empleados
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      
                                      <li>
                                        <input name="r_empleado" class="empleado" value="1" type="checkbox">
                                        <span>Registrar Nuevos Empleados</span>
                                      </li>
                                      <li>
                                        <input name="m_empleado" class="empleado" value="1" type="checkbox">
                                        <span>Modificar Información de Empleados</span>
                                      </li>
                                      <li>
                                        <input name="l_empleado" class="empleado" value="1" type="checkbox">
                                        <span>Consultar Lista de Empleados Registrados</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-4 mb-3 p-2" id="modulo_roles">
                          <div class="accordion" id="accordionRoles">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rolesCard" aria-expanded="true" aria-controls="rolesCard">
                                  Módulo Roles
                                </button>
                              </h2>
                              <div id="rolesCard" class="accordion-collapse collapse " data-bs-parent="#accordionRoles">
                                <div class="accordion-body">
                                  <ul class="nav-content list-unstyled">
                                    <li>
                                      <input class="vista" type="checkbox" value="roles">
                                      Acceso Total al Módulo de Roles
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      
                                      <li>
                                        <input name="r_rol" class="roles" value="1" type="checkbox">
                                        <span>Registrar Nuevos Roles</span>
                                      </li>
                                      <li>
                                        <input name="m_rol" class="roles" value="1" type="checkbox">
                                        <span>Modificar Información de Roles</span>
                                      </li>
                                      <li>
                                        <input name="l_rol" class="roles" value="1" type="checkbox">
                                        <span>Consultar Lista de Roles Registrados</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr>
                    <hr>
                    <div class="col-12 col-md-12 mb-2">
                      <h4 class="mb-3">Configuración</h4>
                      <hr>
                      <div class="row p-0 justify-content-around">
                        <div class="col-12 col-md-6 mb-2 p-2" id="modulo_configuracion">
                          <div class="accordion" id="accordionConfiguracion">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#configuracionCard" aria-expanded="true" aria-controls="rolesCard">
                                  Módulo Configuración
                                </button>
                              </h2>
                              <div id="configuracionCard" class="accordion-collapse collapse" data-bs-parent="#accordionConfiguracion">
                                <div class="accordion-body">
                                  <ul class="nav-content list-unstyled">
                                    <li>
                                      <input class="vista" type="checkbox" value="ajustes_sistema">
                                      <span>Acceso Total a los Ajustes del Sistema</span>
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                              
                                      <li>
                                        <input name="m_cant_pregunta_seguridad" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Cantidad de Preguntas de Seguridad</span>
                                      </li>

                                      <li>
                                        <input name="m_tiempo_sesion" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Tiempo de Inactividad de Sesión</span>
                                      </li>

                                      <li>
                                        <input name="m_cant_caracteres" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Cantidad de Caracteres Permitidos</span>
                                      </li>
                                      
                                      <li>
                                        <input name="m_cant_simbolos" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Cantidad de Símbolos Permitidos</span>
                                      </li>
                                      
                                      <li>
                                        <input name="m_cant_num" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Cantidad de Números Permitidos</span>
                                      </li>
                                      
                                      <li>
                                        <input name="intentos_inicio_sesion" class="ajustes_sistema" value="1" type="checkbox">
                                        <span>Modificar Intentos de Inicio de Sesión</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-md-6 mb-2 p-2" id="modulo_bitacora">
                          <div class="accordion" id="accordionBitacora">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bitacoraCard" aria-expanded="true" aria-controls="bitacoraCard">
                                  Módulo Bitácora
                                </button>
                              </h2>
                              <div id="bitacoraCard" class="accordion-collapse collapse" data-bs-parent="#accordionBitacora">
                                <div class="accordion-body">
                                  <ul class="nav-content list-unstyled">
                                    <li>
                                      <input class="vista" type="checkbox" value="bitacora">
                                      <span>Acceso Total a la Bitácora</span>
                                    </li>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                      <li>
                                        <input name="v_bitacora" class="bitacora" value="1" type="checkbox">
                                        <span>Consultar Registros de la Bitácora</span>
                                      </li>
                                    </ul>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
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
        
        <script type="text/javascript" src="./js/funcion_seleccionar_casillas.js">
          evaluar_casillas ();
        </script>
        <?php 
          // se incluye el footer / pie de pagina a la vista
          include_once("../include/footer.php");
          // se incluyen los script de javascript a la vista 
          include_once("../include/scripts_include.php"); ?>
      </body>
    </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("registro de roles");
}