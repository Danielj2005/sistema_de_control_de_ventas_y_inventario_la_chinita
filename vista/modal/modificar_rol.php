<?php
include_once("../../modelo/modeloPrincipal.php"); 
include_once("../../include/obtener_icono_permisos_include.php"); 

$id_rol = $_POST['id'];

$permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));

$nombre = $permisos['nombre'];
// cantidad de vistas de inventario
$proveedor = $permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'];
$producto = $permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'];
// cantidad de vistas de venta
$venta = $permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'];
// cantidad de vistas de menu
$menu = $permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'];
// cantidad de vistas de usuario
$cliente = $permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'];
$empleado = $permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'];
$rol = $permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'];
// cantidad de vistas de configuración
$ajustes = $permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'];

?>

<div class="container-fluid row mb-3 p-3 justify-content-around">
    <input type="hidden" value="<?= $id_rol ?>" name="id_rol">
    <input type="hidden" value="<?= $permisos['estado'] ?>" name="estado_rol">
    <input type="hidden" value="<?= $nombre ?>" name="nombre_rol">
    <input type="hidden" value="Modificar" name="modulo">

    <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3 row justify-content-center">
        <div class="col-12 col-md-12 mb-3 row justify-content-around">
            <h3 class="col-6 mb-2 text-center text-capitalize">Nombre del rol: <?= $nombre; ?></h3>
            <h3 class="col-6 mb-2 text-center text-capitalize">Estado del rol: <?= ($permisos['estado'] == 1) ? '<span class="text-success">activo</span>' : '<span class="text-danger">inactivo</span>' ?></h3>
        </div>
        <label class="" for="">Leyenda: </label>
        <ul id="" class="ps-3 nav-content list-unstyled">
            <li>
                <label>Acceso Total al Módulo: </label> &nbsp; 
                <i class="bi bi-check-circle-fill text-success"></i>
            </li>
            <li>
                <label>Acceso Parcial al Módulo: </label> &nbsp; 
                <i class="bi bi-exclamation-triangle-fill text-warning"></i>
            </li>
            <li>
                <label>Sin Acceso al Módulo: </label> &nbsp; 
                <i class="bi bi-x-circle-fill text-danger"></i>
            </li>
        </ul>

        <hr>
        <hr>
        <!-- vistas de proveedores -->
        
        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Inventario</h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                    <div class="accordion" id="acordeon_proveedores">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proveedoresCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Proveedores &nbsp;<i class="bi <?= obtenerIconoPermisos($proveedor, 4) ?>"></i>
                                </button>
                            </h2>
                            <div id="proveedoresCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_proveedores">
                                <div class="accordion-body">
                                    <ul id="" class="nav-content list-unstyled">
                                        <li>
                                            <input class="vista" type="checkbox" <?= $proveedor == 4 ? 'checked' : '' ?> value="proveedores">
                                            Acceso Total al Módulo de Proveedores
                                        </li>
                                        <ul id="" class="ps-3 nav-content list-unstyled">
                                            <li>
                                                <input name="r_proveedores" class="proveedores" <?= $permisos['r_proveedores'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Nuevos Proveedores</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="m_proveedores" class="proveedores" <?= $permisos['m_proveedores'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Modificar Información de Proveedores</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="l_proveedores" class="proveedores" <?= $permisos['l_proveedores'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Consultar Lista de Proveedores Registrados</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="h_proveedores" class="proveedores" <?= $permisos['h_proveedores'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Visualizar Historial de Compras</span>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                    <div class="accordion" id="acordeon_productos">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Productos &nbsp;<i class="bi <?= obtenerIconoPermisos($producto, 6) ?>"></i>
                                </button>
                            </h2>
                            <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_productos">
                                <div class="accordion-body">
                                    <ul id="" class="nav-content list-unstyled">
                                        <li>
                                            <input class="vista" type="checkbox" <?= $producto == 6 ? 'checked' : '' ?> value="productos">
                                            Acceso Total al Módulo de Productos
                                        </li>

                                        <ul id="" class="ps-3 nav-content list-unstyled">
                                            <li>
                                                <input name="r_categoria" class="productos" <?= $permisos['r_categoria'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Nuevas Categorías</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="r_presentacion" class="productos" <?= $permisos['r_presentacion'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Nuevas Presentaciones</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="r_productos" class="productos" <?= $permisos['r_productos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Nuevos Productos</span>
                                            </li>
                                            <li>
                                                <input name="l_productos" class="productos" <?= $permisos['l_productos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Consultar Lista de Productos Registrados</span>
                                            </li>
                                            <br>
                                            <li>
                                                <input name="r_entrada" class="productos" <?= $permisos['r_entrada'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Entrada de Productos</span>
                                            </li>
                                            <li>
                                                <input name="l_entrada" class="productos" <?= $permisos['l_entrada'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
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
            <div class="col-12 col-md-6 mb-3">
                <h4 class="mb-3">Ventas</h4>
                
                <hr>

                <div class="row m-0 p-0 justify-content-around">
                    <div class="col-12 col-sm-12 col-md-12 mb-3 p-2">
                        
                        <div class="accordion" id="acordeon_ventas">    
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ventasCard" aria-expanded="true" aria-controls="collapseOne">
                                        Módulo Ventas &nbsp; <i class="bi <?= obtenerIconoPermisos($venta, 5) ?>"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="ventasCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ventas">
                                <div class="accordion-body">
                                    <ul id="" class="nav-content list-unstyled">
                                        <li>
                                            <input class="vista" type="checkbox" <?= $venta == 5 ? 'checked' : '' ?> value="ventas">
                                            Acceso Total al Módulo de Ventas
                                        </li>
                                        <ul id="" class="ps-3 nav-content list-unstyled">
                                            <li>
                                                <input name="g_venta" class="ventas" <?= $permisos['g_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Generar venta</span>
                                            </li>
                                            <li>
                                                <input name="l_venta" class="ventas" <?= $permisos['l_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Lista de ventas realizadas</span>
                                            </li>
                                            <li>
                                                <input name="d_venta" class="ventas" <?= $permisos['d_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Detalles de ventas realizadas</span>
                                            </li>
                                            <li>
                                                <input name="f_venta" class="ventas" <?= $permisos['f_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Ver facturas de ventas realizadas</span>
                                            </li>
                                            <li>
                                                <input name="est_venta" class="ventas" <?= $permisos['est_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Ver estadísticas de ventas realizadas</span>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <h4 class="mb-3"> Menú </h4>
                <hr>
                <div class="row p-0 justify-content-around">
                    <div class="col-12 col-sm-12 col-md-12 mb-3 p-2">
                        <div class="accordion" id="acordeon_servicios">  
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviciosCard" aria-expanded="true" aria-controls="collapseOne">
                                        Módulo Servicios &nbsp;<i class="bi <?= obtenerIconoPermisos($menu, 3) ?>"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="serviciosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_servicios">
                                <div class="accordion-body">
                                    <ul id="" class="nav-content list-unstyled">
                                        <li>
                                            <input class="vista" type="checkbox" <?= $menu == 3 ? 'checked' : '' ?> value="servicio">
                                            Acceso Total al Módulo de Servicios
                                        </li>
                                        <ul id="" class="ps-3 nav-content list-unstyled">
                                            <li>
                                                <input name="r_servicio" class="servicio" <?= $permisos['r_servicio'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Registrar Nuevos Servicios</span>
                                            </li>
                                            <li>
                                                <input name="m_servicio" class="servicio" <?= $permisos['m_servicio'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                                <span>Modificar Información de Servicios</span>
                                            </li>
                                            <li>
                                                <input name="l_servicio" class="servicio" <?= $permisos['l_servicio'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
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

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Usuario</h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <!-- módulo de clientes -->
                <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                    <div class="accordion" id="acordeon_clientes">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clientesCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Clientes &nbsp;<i class="bi <?= obtenerIconoPermisos($cliente, 5) ?>"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="clientesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_clientes">
                            <div class="accordion-body">
                                <ul id="" class="nav-content list-unstyled">
                                    <li>
                                        <input class="vista" type="checkbox" <?= $cliente == 5 ? 'checked' : '' ?> value="clientes">
                                        Acceso Total al Módulo de Clientes
                                    </li>  
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li>
                                            <input name="r_cliente" class="clientes" <?= $permisos['r_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Registrar Nuevos Clientes</span>
                                        </li>
                                        <li>
                                            <input name="m_cliente" class="clientes" <?= $permisos['m_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar Información de Clientes</span>
                                        </li>
                                        <li>
                                            <input name="l_cliente" class="clientes" <?= $permisos['l_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Consultar Lista de Clientes Registrados</span>
                                        </li>
                                        <li>
                                            <input name="h_cliente" class="clientes" <?= $permisos['h_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Visualizar Historial de Compras</span>
                                        </li>
                                        <li>
                                            <input name="f_cliente" class="clientes" <?= $permisos['f_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Ver facturas de compras</span>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- módulo de empleados -->
                
                <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                    <div class="accordion" id="acordeon_empleados">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empleadosCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Empleados &nbsp;<i class="bi <?= obtenerIconoPermisos($empleado, 3) ?>"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="empleadosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_empleados">
                            <div class="accordion-body">
                                <ul id="" class="nav-content list-unstyled">
                                    <li>
                                        <input class="vista" type="checkbox" <?= $empleado == 3 ? 'checked' : '' ?> value="empleados">
                                        Acceso Total al Módulo de Empleados
                                    </li>  
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li>
                                            <input name="r_empleado" class="empleado" <?= $permisos['r_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Registrar Nuevos Empleados</span>
                                        </li>
                                        <li>
                                            <input name="m_empleado" class="empleado" <?= $permisos['m_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar Información de Empleados</span>
                                        </li>
                                        <li>
                                            <input name="l_empleado" class="empleado" <?= $permisos['l_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Consultar Lista de Empleados Registrados</span>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- módulo de roles -->
                
                
                <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                    <div class="accordion" id="acordeon_roles">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rolesCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Roles &nbsp;<i class="bi <?= obtenerIconoPermisos($rol, 3) ?>"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="rolesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_roles">
                            <div class="accordion-body">
                                <ul id="" class="nav-content list-unstyled">
                                    <li>
                                        <input class="vista" type="checkbox" <?= $rol == 3 ? 'checked' : '' ?> value="roles">
                                        Acceso Total al Módulo de Roles
                                    </li>  
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li>
                                            <input name="r_rol" class="roles" <?= $permisos['r_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Registrar Nuevos Roles</span>
                                        </li>
                                        <li>
                                            <input name="m_rol" class="roles" <?= $permisos['m_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar Información de Roles</span>
                                        </li>
                                        <li>
                                            <input name="l_rol" class="roles" <?= $permisos['l_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
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

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Configuración</h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <!-- módulo ajustes del sistema -->

                <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                    <div class="accordion" id="acordeon_ajustes_sistema">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ajustesCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Ajustes del Sistema &nbsp;<i class="bi <?= obtenerIconoPermisos($ajustes, 6) ?>"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="ajustesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ajustes_sistema">
                            <div class="accordion-body">
                                <ul id="" class="nav-content list-unstyled">
                                    <li>
                                        <input class="vista" type="checkbox" <?= $ajustes == 6 ? 'checked' : '' ?> value="ajustes_sistema">
                                        Acceso Total al Módulo de Ajustes del Sistema
                                    </li>  
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li>
                                            <input name="m_cant_pregunta_seguridad" class="ajustes_sistema" <?= $permisos['m_cant_pregunta_seguridad'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar cantidad de preguntas de seguridad</span>
                                        </li>
                                        <li>
                                            <input name="m_tiempo_sesion" class="ajustes_sistema" <?= $permisos['m_tiempo_sesion'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar tiempo de inactividad de sesión</span>
                                        </li>
                                        <li>
                                            <input name="m_cant_caracteres" class="ajustes_sistema" <?= $permisos['m_cant_caracteres'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar cantidad de carecteres</span>
                                        </li>
                                        <li>
                                            <input name="m_cant_simbolos" class="ajustes_sistema" <?= $permisos['m_cant_simbolos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar cantidad de símbolos</span>
                                        </li>
                                        <li>
                                            <input name="m_cant_num" class="ajustes_sistema" <?= $permisos['m_cant_num'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar cantidad de números</span>
                                        </li>
                                        <li>
                                            <input name="intentos_inicio_sesion" class="ajustes_sistema" <?= $permisos['intentos_inicio_sesion'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Modificar cantidad de intentos de inicio de sesión</span>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- módulo bitácora -->
                
                
                <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                    <div class="accordion" id="acordeon_bitacora">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bitacoraCard" aria-expanded="true" aria-controls="collapseOne">
                                    Módulo Bitácora &nbsp;<i class="bi <?= obtenerIconoPermisos($permisos['v_bitacora'], 1) ?>"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="bitacoraCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_bitacora">
                            <div class="accordion-body">
                                <ul id="" class="nav-content list-unstyled">
                                    <li>
                                        <input class="vista" type="checkbox" <?= $permisos['v_bitacora'] == 1 ? 'checked' : '' ?> value="bitacora">
                                        Acceso Total al Módulo de Bitácora
                                    </li>  
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li>
                                            <input name="v_bitacora" class="bitacora" <?= $permisos['v_bitacora'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                            <span>Ver bitácora</span>
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