<?php

include_once "../../../modelo/modeloPrincipal.php"; 
include_once "../../../include/obtener_icono_permisos_include.php"; 

$id_rol = modeloPrincipal::decryptionId($_POST['id']);


$permisos = mysqli_fetch_assoc(modeloPrincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));

$nombre = $permisos['nombre'];

// cantidad de vistas de inventario 
$proveedor = $permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'];
$producto = $permisos['r_categoria'] + $permisos['m_categoria'] + $permisos['l_categoria'] + $permisos['r_presentacion'] + $permisos['m_presentacion'] + $permisos['l_presentacion'] +  $permisos['r_marca'] + $permisos['m_marca'] + $permisos['l_marca'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'];

// cantidad de vistas de venta
$venta = $permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'];
// cantidad de vistas de menu
$menu = $permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'];
// cantidad de vistas de usuario
$cliente = $permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'];
$empleado = $permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'];
$rol = $permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'];
// cantidad de vistas de configuración
$ajustes = $permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'];
$bitacora = $permisos['v_bitacora'] + $permisos['m_bitacora'];

?>
<div class="container-fluid row mb-3 p-3 justify-content-around">
    <!-- vistas de proveedores -->
    <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3 row justify-content-center">
        <div class="col-12 col-md-12 mb-3 row justify-content-around">
            <h5 class="col-6 mb-2 text-center">Nombre del rol: <?= $nombre; ?></h5>
            <h5 class="col-6 mb-2 text-center">Estado del rol: <?= ($permisos['estado'] == 1) ? '<span class="text-success">activo</span>' : '<span class="text-danger">inactivo</span>' ?></h5>
        </div>

        <hr>

        <label class="" for="">Leyenda: </label>
        <ul id="" class="ps-3 nav-content list-unstyled">
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                &nbsp; 
                <label>Acceso Total al Módulo</label> 
            </li>
            <li>
                <i class="bi bi-exclamation-triangle-fill text-warning"></i>
                &nbsp; 
                <label>Acceso Parcial al Módulo</label> 
            </li>
        </ul>

        <hr>
        <hr>

        <?php if ($proveedor > 0 || $producto > 0 ) { ?>
        
            <div class="col-12 col-md-12 mb-3">
                <h4 class="mb-3"> Módulo de Inventario</h4>

                <hr>

                <div class="row p-0 justify-content-around">

                    <?php if ($proveedor <= 4 && $proveedor >= 1) { ?>

                        <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                            <div class="accordion" id="acordeon_proveedores">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proveedoresCard" aria-expanded="true" aria-controls="collapseOne">
                                            Módulo Proveedores 
                                            &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                            <i class="bi <?= obtenerIconoPermisos($proveedor, 4) ?>"></i>
                                        </button>
                                    </h2>

                                    <div id="proveedoresCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_proveedores">
                                        <div class="accordion-body">
                                            <ul id="" class="nav-content"> 
                                                <?php if ($proveedor == 4 ) { ?>
                                                    <li class="">
                                                        <span>Acceso Total al Módulo de Proveedores</span>
                                                    </li>
                                                <?php } ?>
                                                <ul id="" class="ps-3 nav-content">
                                                    <?php if ($permisos['r_proveedores'] == 1) { ?>
                                                        <li>
                                                            <span>Registrar Nuevos Proveedores</span>
                                                        </li>
                                                    <?php }
                                                        if ($permisos['l_proveedores'] == 1) { ?>
                                                        <li>
                                                            <span>Consultar Lista de Proveedores Registrados</span>
                                                        </li>
                                                    <?php } 
                                                        if ($permisos['m_proveedores'] == 1) { ?>
                                                        <li>
                                                            <span>Modificar Información de Proveedores</span>
                                                        </li>
                                                    <?php } 
                                                        if ($permisos['h_proveedores'] == 1) { ?>
                                                        <li>
                                                            <span>Visualizar Historial de Compras</span>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } 

                        if ($producto <= 13 && $producto >= 1) { ?>

                            <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                                <div class="accordion" id="acordeon_productos">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="true" aria-controls="collapseOne">
                                                Módulo Productos 
                                                &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                <i class="bi <?= obtenerIconoPermisos($producto, 13) ?>"></i>
                                            </button>
                                        </h2>
                                        <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_productos">
                                            <div class="accordion-body">
                                                <ul id="" class="nav-content"> 
                                                    <?php if ($producto == 13 ) { ?>
                                                        <li class="">
                                                            <span>Acceso Total al Módulo de Productos</span>
                                                        </li>
                                                    <?php } ?>
                                                    <ul id="" class="ps-3 nav-content">
                                                        
                                                        <label class="form-label"><b>Categorías:</b></label>
                                                        <ul id="" class="ps-3">
                                                            <?php if ($permisos['r_categoria'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevas Categorías</span>
                                                                </li>
                                                            <?php } if ($permisos['m_categoria'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de Categorías</span>
                                                                </li>
                                                            <?php } if ($permisos['l_categoria'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Categorías Registradas</span>
                                                                </li><br>
                                                        </ul>

                                                        <label class="form-label"><b>Presentaciones:</b></label>
                                                        <ul id="" class="ps-3">
                                                            <?php } 
                                                                if ($permisos['r_presentacion'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevas Presentaciones</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['m_presentacion'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de  Presentaciones</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_presentacion'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Presentaciones Registradas</span>
                                                                </li><br>
                                                        </ul>

                                                        <label class="form-label"><b>Marcas:</b></label>
                                                        <ul id="" class="ps-3">
                                                            <?php } 
                                                                if ($permisos['r_marca'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevas Marcas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['m_marca'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de Marcas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_marca'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Marcas Registradas</span>
                                                                </li><br>
                                                        </ul>

                                                        <label class="form-label"><b>Productos:</b></label>
                                                        <ul id="" class="ps-3">
                                                            <?php } 
                                                                if ($permisos['r_productos'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevos Productos</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_productos'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Productos Registrados</span>
                                                                </li><br>
                                                        </ul>

                                                        <label class="form-label"><b>Entrada de Productos:</b></label>
                                                        <ul id="" class="ps-3">
                                                            <?php } 
                                                                if ($permisos['r_entrada'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Entrada de Productos</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_entrada'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Entradas de Productos</span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>

            <hr>
            <hr>
        <?php } 
            if ($venta > 0) { ?>
                <div class="col-12 col-md-6 mb-3">
                    <h4 class="mb-3">Ventas </h4>

                    <hr>

                    <?php 
                        if ($venta <= 4 && $venta >= 1) {  ?>

                                <div class="col-12 p-2" id="modulo_ventas">
                                    <div class="accordion" id="acordeon_ventas">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ventasCard" aria-expanded="true" aria-controls="collapseOne">
                                                    Módulo Ventas 
                                                    &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                    <i class="bi <?= obtenerIconoPermisos($venta, 4) ?>"></i>
                                                </button>
                                            </h2>
                                            <div id="ventasCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ventas">
                                                <div class="accordion-body">
                                                    <ul id="" class="nav-content"> 
                                                        <?php if ($venta == 4 ) { ?>
                                                            <li class="">
                                                                <span>Acceso Total al Módulo de Ventas</span>
                                                            </li>
                                                        <?php } ?>
                                                        <ul id="" class="ps-3 nav-content">
                                                            <?php if ($permisos['g_venta'] == 1) { ?>
                                                                <li>
                                                                    <span>Generar Nuevas Ventas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_venta'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Ventas Realizadas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['d_venta'] == 1) { ?>
                                                                <li>
                                                                    <span>Visualizar Detalles de Ventas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['f_venta'] == 1) { ?>
                                                                <li>
                                                                    <span>Acceder a Facturas de Ventas</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['r_proveedores'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Estadísticas de Ventas</span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
        
        <?php } 
            if ($menu > 0 ) { ?>

            <div class="col-12 col-md-6 mb-3">
                <h4 class="mb-3">Menú </h4>
                
                <hr>
                
                <?php if ($menu <= 3 && $menu >= 1) { ?>
                    <div class="col-12 p-2" id="modulo_servicios">
                        <div class="accordion" id="acordeon_servicios">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviciosCard" aria-expanded="true" aria-controls="collapseOne">
                                        Módulo Servicios 
                                        &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                        <i class="bi <?= obtenerIconoPermisos($menu, 3) ?>"></i>
                                    </button>
                                </h2>
                                <div id="serviciosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_servicios">
                                    <div class="accordion-body">
                                        <ul id="" class="nav-content"> 
                                            <?php if ($menu == 3 ) { ?>
                                                <li class="">
                                                    <span>Acceso Total al Módulo de Servicios</span>
                                                </li>
                                            <?php } ?>
                                            <ul id="" class="ps-3 nav-content">
                                                <?php if ($permisos['r_servicio'] == 1) { ?>
                                                    <li>
                                                        <span>Registrar Nuevos Servicios</span>
                                                    </li>
                                                <?php } 
                                                    if ($permisos['l_servicio'] == 1) { ?>
                                                    <li>
                                                        <span>Consultar Lista de Servicios Registrados</span>
                                                    </li>
                                                <?php } 
                                                    if ($permisos['m_servicio'] == 1) { ?>
                                                    <li>
                                                        <span>Modificar Información de Servicios</span>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
                

            <hr>
            <hr>
        <?php }
            if ($cliente > 0 || $empleado > 0 || $roles > 0) { ?>

                <div class="col-12 col-md-12 mb-3">
                    <h4 class="mb-3">Usuario</h4>
                    <hr>
                    <div class="row p-0 justify-content-around">

                        <?php if ($cliente <= 5 && $cliente >= 1) { ?> 
                        
                            <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                                
                                <div class="accordion" id="acordeon_cliente">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clienteCard" aria-expanded="true" aria-controls="collapseOne">
                                                Módulo Clientes 
                                                &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                <i class="bi <?= obtenerIconoPermisos($cliente, 5) ?>"></i>
                                            </button>
                                        </h2>
                                        <div id="clienteCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_cliente">
                                            <div class="accordion-body">
                                                <ul id="" class="nav-content"> 
                                                    <?php if ($cliente == 5 ) { ?>
                                                        <li class="">
                                                            <span>Acceso Total al Módulo de Clientes</span>
                                                        </li>
                                                    <?php } ?>
                                                    <ul id="" class="ps-3 nav-content">
                                                        <?php if ($permisos['r_cliente'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevos Clientes</span>
                                                                </li>
                                                        <?php } 
                                                            if ($permisos['l_cliente'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Clientes Registrados</span>
                                                                </li>
                                                        <?php } 
                                                            if ($permisos['m_cliente'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de Clientes</span>
                                                                </li>
                                                        <?php }
                                                            if ($permisos['h_cliente'] == 1) { ?>
                                                                <li>
                                                                    <span>Visualizar Historial de Compras</span>
                                                                </li>
                                                        <?php } 
                                                            if ($permisos['f_cliente'] == 1) { ?>
                                                                <li>
                                                                    <span>Visualizar Facturas de Compras</span>
                                                                </li>
                                                        <?php } ?>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        <?php } 
                            if ($empleado <= 3 && $empleado >= 1) { ?> 
                        
                                <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                                    
                                    <div class="accordion" id="acordeon_empleado">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empleadoCard" aria-expanded="true" aria-controls="collapseOne">
                                                    Módulo Empleados
                                                    &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                    <i class="bi <?= obtenerIconoPermisos($empleado, 3) ?>"></i>
                                                </button>
                                            </h2>
                                            <div id="empleadoCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_empleado">
                                                <div class="accordion-body">
                                                    <ul id="" class="nav-content"> 
                                                        <?php if ($empleado == 3 ) { ?>
                                                            <li class="">
                                                                <span>Acceso Total al Módulo de Empleados</span>
                                                            </li>
                                                        <?php } ?>
                                                        <ul id="" class="ps-3 nav-content">
                                                            <?php if ($permisos['r_empleado'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevos Empleados</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_empleado'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Empleados Registrados</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['m_empleado'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de Empleados</span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php } 
                            if ($rol <= 3 && $rol >= 1) { ?>
                        
                                <div class="col-12 col-sm-12 col-md-4 mb-3 p-2">
                                    
                                    <div class="accordion" id="acordeon_roles">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rolesCard" aria-expanded="true" aria-controls="collapseOne">
                                                    Módulo Roles
                                                    &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                    <i class="bi <?= obtenerIconoPermisos($rol, 3) ?>"></i>
                                                </button>
                                            </h2>
                                            <div id="rolesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_roles">
                                                <div class="accordion-body">
                                                    <ul id="" class="nav-content"> 
                                                        <?php if ($rol == 3 ) { ?>
                                                            <li class="">
                                                                <span>Acceso Total al Módulo de Roles</span>
                                                            </li>
                                                        <?php } ?>

                                                        <ul id="" class="ps-3 nav-content">
                                                            <?php if ($permisos['r_rol'] == 1) { ?>
                                                                <li>
                                                                    <span>Registrar Nuevos Roles</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['l_rol'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Lista de Roles Registrados</span>
                                                                </li>
                                                            <?php } 
                                                                if ($permisos['m_rol'] == 1) { ?>
                                                                <li>
                                                                    <span>Modificar Información de Roles</span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            <hr>
            <hr>
        <?php } 
            if ($ajustes > 0 || $bitacora > 0) { ?>

                <div class="col-12 col-md-12 mb-3">
                    <h4 class="mb-3">Configuración</h4>
                    <hr>
                    <div class="row p-0 justify-content-around">
                        <?php if ($ajustes <= 6 && $ajustes >= 1) { ?> 
                        
                            <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                                <div class="accordion" id="acordeon_ajustes_del_sistema">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ajustesCard" aria-expanded="true" aria-controls="collapseOne">
                                                Ajustes del Sistema
                                                &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                <i class="bi <?= obtenerIconoPermisos($ajustes, 6) ?>"></i>
                                            </button>
                                        </h2>
                                        <div id="ajustesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ajustes_del_sistema">
                                            <div class="accordion-body">
                                                <ul id="" class="nav-content"> 
                                                    <?php if ($ajustes == 6 ) { ?>
                                                        <li class="">
                                                            <span>Acceso Total a la Configuración del Sistema</span>
                                                        </li>
                                                    <?php } ?>
                                                    <ul id="" class="ps-3 nav-content">
                                                        <?php if ($permisos['m_cant_pregunta_seguridad'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar cantidad de preguntas de seguridad</span>
                                                            </li>
                                                        <?php } 
                                                            if ($permisos['m_tiempo_sesion'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar tiempo de inactividad de sesión</span>
                                                            </li>
                                                        <?php } 
                                                            if ($permisos['m_cant_caracteres'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar cantidad de carecteres</span>
                                                            </li>
                                                        <?php } 
                                                            if ($permisos['m_cant_simbolos'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar cantidad de símbolos</span>
                                                            </li>
                                                        <?php } 
                                                            if ($permisos['m_cant_num'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar cantidad de números</span>
                                                            </li>
                                                        <?php } 
                                                            if ($permisos['intentos_inicio_sesion'] == 1) { ?>
                                                            <li>
                                                                <span>Modificar intentos de inicio de sesión</span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                            if ($bitacora == 2 || $bitacora == 1) { ?>
                                <div class="col-12 col-sm-12 col-md-6 mb-3 p-2">
                                    
                                    <div class="accordion" id="acordeon_bitacora">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bitacoraCard" aria-expanded="true" aria-controls="collapseOne">
                                                    Bitácora
                                                    &nbsp; <!-- este comando sirve para crear un espacio entre elementos -->
                                                    <i class="bi <?= obtenerIconoPermisos($bitacora, 2) ?>"></i>
                                                </button>
                                            </h2>
                                            <div id="bitacoraCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_bitacora">
                                                <div class="accordion-body">
                                                    <ul id="" class="nav-content"> 
                                                        <?php if ($bitacora == 2 ) { ?>
                                                            <li class="">
                                                                <span>Acceso Total a la Bitácora</span>
                                                            </li>
                                                        <?php } ?>
                                                        <ul id="" class="ps-3 nav-content">
                                                            <?php if ($permisos['v_bitacora'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Registros de la Bitácora</span>
                                                                </li>
                                                            <?php } if ($permisos['m_bitacora'] == 1) { ?>
                                                                <li>
                                                                    <span>Consultar Movimientos de un Usuario en la Bitácora</span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
        <?php } ?>
    </div>
</div>