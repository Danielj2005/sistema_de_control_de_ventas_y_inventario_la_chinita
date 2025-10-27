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
<div class="container-fluid p-3">
    
    <div class="row align-items-center mb-4 pb-2 border-bottom">
        
        <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
            <h5 class="fw-bold mb-0 text-primary">
                <i class="bi bi-person-badge me-2"></i>
                Rol: <?= $nombre; ?>
            </h5>
        </div>
        
        <div class="col-12 col-md-6 text-center text-md-end">
            <h5 class="fw-bold mb-0">
                Estado: 
                <span class="badge rounded-pill fs-6 <?= ($permisos['estado'] == 1) ? 'bg-success' : 'bg-danger' ?>">
                    <?= ($permisos['estado'] == 1) ? 'ACTIVO' : 'INACTIVO' ?>
                </span>
            </h5>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <p class="fw-bold mb-2 text-secondary d-flex align-items-center">
                <i class="bi bi-info-circle me-2"></i>
                Leyenda de Acceso:
            </p>
            <ul class="list-unstyled d-flex flex-wrap gap-4 small ps-3">
                <li>
                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                    Acceso Total al Módulo
                </li>
                <li>
                    <i class="bi bi-dash-circle-fill text-primary me-1"></i>
                    Acceso Parcial (Lectura/Escritura)
                </li>
                <li>
                    <i class="bi bi-x-circle-fill text-danger me-1"></i>
                    Acceso Denegado (Sin Permiso)
                </li>
            </ul>
        </div>
    </div>
    <hr class="my-0">
    
    <div class="row mt-3">
        <div class="col-12">
            <p class="text-muted small">Desglose de permisos por módulo:</p>
            </div>
    </div>

    <?php if ($proveedor > 0 || $producto > 0 ) { ?>
        <div class="col-12 col-md-12 mb-4">
            <h4 class="fw-bold mb-3 border-bottom pb-2 text-info">
                <i class="bi bi-box-seam me-2"></i>
                Módulo de Inventario
            </h4>
            <div class="row g-3">
                    
                <?php if ($proveedor <= 4 && $proveedor >= 1) { ?>

                    <div class="col-12 col-md-6">
                        <div class="accordion" id="acordeon_proveedores">
                            <div class="accordion-item shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#proveedoresCard" aria-expanded="false" aria-controls="proveedoresCard">
                                        Módulo Proveedores
                                        <span class="ms-auto me-2">
                                            <i class="bi <?= obtenerIconoPermisos($proveedor, 4) ?> fs-5"></i>
                                        </span>
                                    </button>
                                </h2>

                                <div id="proveedoresCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_proveedores">
                                    <div class="accordion-body p-3">
                                        <ul class="list-unstyled mb-0">
                                            <?php if ($proveedor == 4 ) { ?>
                                                <li class="mb-2 text-success fw-bold">
                                                    <i class="bi bi-check-circle-fill me-2"></i>
                                                    Acceso Total al Módulo de Proveedores
                                                </li>
                                            <?php } ?>
                                            
                                            <li class="fw-bold mt-2">Permisos específicos:</li>
                                            <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                <?php if ($permisos['r_proveedores'] == 1) { ?>
                                                    <li class="list-group-item ps-2 border-0">
                                                        <i class="bi bi-person-plus-fill me-2 text-primary"></i>
                                                        Registrar Nuevos Proveedores
                                                    </li>
                                                <?php }
                                                if ($permisos['l_proveedores'] == 1) { ?>
                                                    <li class="list-group-item ps-2 border-0">
                                                        <i class="bi bi-list-check me-2 text-primary"></i>
                                                        Consultar Lista de Proveedores Registrados
                                                    </li>
                                                <?php }
                                                if ($permisos['m_proveedores'] == 1) { ?>
                                                    <li class="list-group-item ps-2 border-0">
                                                        <i class="bi bi-pencil-square me-2 text-primary"></i>
                                                        Modificar Información de Proveedores
                                                    </li>
                                                <?php } if ($permisos['h_proveedores'] == 1) { ?>
                                                    <li class="list-group-item ps-2 border-0">
                                                        <i class="bi bi-bag-check-fill me-2 text-primary"></i>
                                                        Visualizar Historial de Compras
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } if ($producto <= 13 && $producto >= 1) { ?>

                    <div class="col-12 col-md-6">
                        <div class="accordion" id="acordeon_productos">
                            <div class="accordion-item shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="false" aria-controls="productosCard">
                                        Módulo Productos
                                        <span class="ms-auto me-2">
                                            <i class="bi <?= obtenerIconoPermisos($producto, 13) ?> fs-5"></i>
                                        </span>
                                    </button>
                                </h2>

                                <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_productos">
                                    <div class="accordion-body p-3">
                                        <ul class="list-unstyled mb-0">
                                            <?php if ($producto == 13 ) { ?>
                                                <li class="mb-2 text-success fw-bold">
                                                    <i class="bi bi-check-circle-fill me-2"></i>
                                                    Acceso Total al Módulo de Productos
                                                </li>
                                            <?php } ?>
                                            
                                            <?php if ($permisos['r_categoria'] == 1 || $permisos['m_categoria'] == 1 || $permisos['l_categoria'] == 1) { ?>
                                                <li class="fw-bold mt-2">
                                                    <i class="bi bi-folder-fill me-2 text-secondary"></i>
                                                    Categorías:
                                                </li>
                                                <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                    <?php if ($permisos['l_categoria'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Consultar Lista de Categorías Registradas</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>

                                            <?php if ($permisos['r_presentacion'] == 1 || $permisos['m_presentacion'] == 1 || $permisos['l_presentacion'] == 1) { ?>
                                                <li class="fw-bold mt-2">
                                                    <i class="bi bi-box-fill me-2 text-secondary"></i>
                                                    Presentaciones:
                                                </li>
                                                <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                    <?php if ($permisos['r_presentacion'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Registrar Nuevas Presentaciones</li>
                                                    <?php } if ($permisos['m_presentacion'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Modificar Información de Presentaciones</li>
                                                    <?php } if ($permisos['l_presentacion'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Consultar Lista de Presentaciones Registradas</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>

                                            <?php if ($permisos['r_marca'] == 1 || $permisos['m_marca'] == 1 || $permisos['l_marca'] == 1) { ?>
                                                <li class="fw-bold mt-2">
                                                    <i class="bi bi-tags-fill me-2 text-secondary"></i>
                                                    Marcas:
                                                </li>
                                                <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                    <?php if ($permisos['r_marca'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Registrar Nuevas Marcas</li>
                                                    <?php } if ($permisos['m_marca'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Modificar Información de Marcas</li>
                                                    <?php } if ($permisos['l_marca'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Consultar Lista de Marcas Registradas</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>

                                            <?php if ($permisos['r_productos'] == 1 || $permisos['l_productos'] == 1) { ?>
                                                <li class="fw-bold mt-2">
                                                    <i class="bi bi-bag-fill me-2 text-secondary"></i>
                                                    Gestión de Productos:
                                                </li>
                                                <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                    <?php if ($permisos['r_productos'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Registrar Nuevos Productos</li>
                                                    <?php } if ($permisos['l_productos'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Consultar Lista de Productos Registrados</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                            
                                            <?php if ($permisos['r_entrada'] == 1 || $permisos['l_entrada'] == 1) { ?>
                                                <li class="fw-bold mt-2">
                                                    <i class="bi bi-box-arrow-in-right me-2 text-secondary"></i>
                                                    Entrada de Productos:
                                                </li>
                                                <ul class="list-group list-group-flush border-start border-3 border-info ms-3">
                                                    <?php if ($permisos['r_entrada'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Registrar Entrada de Productos</li>
                                                    <?php } if ($permisos['l_entrada'] == 1) { ?>
                                                        <li class="list-group-item ps-2 border-0">Consultar Lista de Entradas de Productos</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
        
    <?php } if ($venta > 0) { ?>
                <div class="col-12 col-md-6 mb-4">
                    <h4 class="mb-3 text-primary">🛍️ Ventas</h4>
                    <hr>

                    <?php if ($venta >= 1) { ?>
                        <div class="accordion" id="acordeon_ventas">
                            <div class="accordion-item shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ventasCard" aria-expanded="false" aria-controls="ventasCard">
                                        Módulo Ventas
                                        <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($venta, 4) ?>"></i></span>
                                    </button>
                                </h2>
                                <div id="ventasCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ventas">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <?php if ($venta == 4) { ?>
                                                <li class="list-group-item bg-light border-0">
                                                    <strong class="text-success">Acceso Total al Módulo de Ventas</strong>
                                                </li>
                                            <?php } ?>

                                            <?php if ($permisos['g_venta'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Generar Nuevas Ventas
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['l_venta'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Consultar Lista de Ventas Realizadas
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['d_venta'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Visualizar Detalles de Ventas
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['f_venta'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Acceder a Facturas de Ventas
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['r_venta'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Consultar Estadísticas/Reportes de Ventas
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($menu > 0) { ?>
                <div class="col-12 col-md-6 mb-4">
                    <h4 class="mb-3 text-primary">🍽️ Menú / Servicios</h4>
                    <hr>

                    <?php if ($menu >= 1) { ?>
                        <div class="accordion" id="acordeon_servicios">
                            <div class="accordion-item shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviciosCard" aria-expanded="false" aria-controls="serviciosCard">
                                        Módulo Servicios
                                        <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($menu, 3) ?>"></i></span>
                                    </button>
                                </h2>
                                <div id="serviciosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_servicios">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <?php if ($menu == 3) { ?>
                                                <li class="list-group-item bg-light border-0">
                                                    <strong class="text-success">Acceso Total al Módulo de Servicios</strong>
                                                </li>
                                            <?php } ?>

                                            <?php if ($permisos['r_servicio'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Registrar Nuevos Servicios
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['l_servicio'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Consultar Lista de Servicios Registrados
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                            <?php if ($permisos['m_servicio'] == 1) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Modificar Información de Servicios
                                                    <i class="bi bi-check-circle-fill text-success"></i>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        
        <div class="row mt-4">
            <div class="col-12"><hr></div>
        </div>

        <?php if ($cliente > 0 || $empleado > 0 || $rol > 0) { ?>
            <div class="row">
                <div class="col-12 mb-4">
                    <h4 class="mb-3 text-primary">👥 Usuarios</h4>
                    <hr>
                    <div class="row justify-content-start">

                        <?php if ($cliente >= 1) { ?>
                            <div class="col-12 col-md-4 mb-3 p-2">
                                <div class="accordion" id="acordeon_cliente">
                                    <div class="accordion-item shadow-sm">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clienteCard" aria-expanded="false" aria-controls="clienteCard">
                                                Módulo Clientes
                                                <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($cliente, 5) ?>"></i></span>
                                            </button>
                                        </h2>
                                        <div id="clienteCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_cliente">
                                            <div class="accordion-body p-0">
                                                <ul class="list-group list-group-flush">
                                                    <?php if ($cliente == 5) { ?>
                                                        <li class="list-group-item bg-light border-0">
                                                            <strong class="text-success">Acceso Total al Módulo de Clientes</strong>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['r_cliente'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Registrar Nuevos Clientes
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['l_cliente'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Consultar Lista de Clientes Registrados
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_cliente'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar Información de Clientes
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['h_cliente'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Visualizar Historial de Compras
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['f_cliente'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Visualizar Facturas de Compras
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($empleado >= 1) { ?>
                            <div class="col-12 col-md-4 mb-3 p-2">
                                <div class="accordion" id="acordeon_empleado">
                                    <div class="accordion-item shadow-sm">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empleadoCard" aria-expanded="false" aria-controls="empleadoCard">
                                                Módulo Empleados
                                                <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($empleado, 3) ?>"></i></span>
                                            </button>
                                        </h2>
                                        <div id="empleadoCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_empleado">
                                            <div class="accordion-body p-0">
                                                <ul class="list-group list-group-flush">
                                                    <?php if ($empleado == 3) { ?>
                                                        <li class="list-group-item bg-light border-0">
                                                            <strong class="text-success">Acceso Total al Módulo de Empleados</strong>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['r_empleado'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Registrar Nuevos Empleados
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['l_empleado'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Consultar Lista de Empleados Registrados
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_empleado'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar Información de Empleados
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($rol >= 1) { ?>
                            <div class="col-12 col-md-4 mb-3 p-2">
                                <div class="accordion" id="acordeon_roles">
                                    <div class="accordion-item shadow-sm">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rolesCard" aria-expanded="false" aria-controls="rolesCard">
                                                Módulo Roles
                                                <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($rol, 3) ?>"></i></span>
                                            </button>
                                        </h2>
                                        <div id="rolesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_roles">
                                            <div class="accordion-body p-0">
                                                <ul class="list-group list-group-flush">
                                                    <?php if ($rol == 3) { ?>
                                                        <li class="list-group-item bg-light border-0">
                                                            <strong class="text-success">Acceso Total al Módulo de Roles</strong>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['r_rol'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Registrar Nuevos Roles
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['l_rol'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Consultar Lista de Roles Registrados
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_rol'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar Información de Roles
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12"><hr></div>
            </div>
        <?php } ?>

        <?php if ($ajustes > 0 || $bitacora > 0) { ?>
            <div class="row">
                <div class="col-12 mb-4">
                    <h4 class="mb-3 text-primary">⚙️ Configuración</h4>
                    <hr>
                    <div class="row justify-content-start">

                        <?php if ($ajustes >= 1) { ?>
                            <div class="col-12 col-md-6 mb-3 p-2">
                                <div class="accordion" id="acordeon_ajustes_del_sistema">
                                    <div class="accordion-item shadow-sm">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ajustesCard" aria-expanded="false" aria-controls="ajustesCard">
                                                Ajustes del Sistema
                                                <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($ajustes, 6) ?>"></i></span>
                                            </button>
                                        </h2>
                                        <div id="ajustesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ajustes_del_sistema">
                                            <div class="accordion-body p-0">
                                                <ul class="list-group list-group-flush">
                                                    <?php if ($ajustes == 6) { ?>
                                                        <li class="list-group-item bg-light border-0">
                                                            <strong class="text-success">Acceso Total a la Configuración del Sistema</strong>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_cant_pregunta_seguridad'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar cantidad de preguntas de seguridad
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_tiempo_sesion'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar tiempo de inactividad de sesión
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_cant_caracteres'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar cantidad de caracteres de contraseña
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_cant_simbolos'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar cantidad de símbolos de contraseña
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_cant_num'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar cantidad de números de contraseña
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['intentos_inicio_sesion'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Modificar intentos de inicio de sesión
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($bitacora >= 1) { ?>
                            <div class="col-12 col-md-6 mb-3 p-2">
                                <div class="accordion" id="acordeon_bitacora">
                                    <div class="accordion-item shadow-sm">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bitacoraCard" aria-expanded="false" aria-controls="bitacoraCard">
                                                Bitácora
                                                <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($bitacora, 2) ?>"></i></span>
                                            </button>
                                        </h2>
                                        <div id="bitacoraCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_bitacora">
                                            <div class="accordion-body p-0">
                                                <ul class="list-group list-group-flush">
                                                    <?php if ($bitacora == 2) { ?>
                                                        <li class="list-group-item bg-light border-0">
                                                            <strong class="text-success">Acceso Total a la Bitácora</strong>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['v_bitacora'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Consultar Registros de la Bitácora
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($permisos['m_bitacora'] == 1) { ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Consultar Movimientos de un Usuario en la Bitácora
                                                            <i class="bi bi-check-circle-fill text-success"></i>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>