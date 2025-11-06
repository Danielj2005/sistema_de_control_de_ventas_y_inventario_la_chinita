<?php

include_once "../../../modelo/modeloPrincipal.php"; 
include_once "../../../modelo/rol_model.php"; 
include_once "../../../include/obtener_icono_permisos_include.php"; 

$id_rol = modeloPrincipal::decryptionId($_POST['id']);

$permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));

$nombre = $permisos['nombre'];

// cantidad de vistas de inventario
$permisos_rol = rol_model::obtenerPermisosRolById($id_rol);

$proveedor = [
    "r_proveedores" => rol_model::sumaPermisoRol(['r_proveedores'], $permisos_rol),
    "m_proveedores" => rol_model::sumaPermisoRol(['m_proveedores'], $permisos_rol),
    "l_proveedores" => rol_model::sumaPermisoRol(['l_proveedores'], $permisos_rol),
    "h_proveedores" => rol_model::sumaPermisoRol(['h_proveedores'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['r_proveedores', 'm_proveedores', 'l_proveedores', 'h_proveedores'], $permisos_rol)
];


$producto = [
    "categoria" => [
        "r_categoria" => rol_model::sumaPermisoRol(['r_categoria'], $permisos_rol),
        "m_categoria" => rol_model::sumaPermisoRol(['m_categoria'], $permisos_rol),
        "l_categoria" => rol_model::sumaPermisoRol(['l_categoria'], $permisos_rol),
        'total' => rol_model::sumaPermisoRol(['r_categoria','m_categoria','l_categoria'], $permisos_rol)
    ],
    "presentacion" => [
        "r_presentacion" => rol_model::sumaPermisoRol(['r_presentacion'], $permisos_rol),
        "m_presentacion" => rol_model::sumaPermisoRol(['m_presentacion'], $permisos_rol),
        "l_presentacion" => rol_model::sumaPermisoRol(['l_presentacion'], $permisos_rol),
        'total' => rol_model::sumaPermisoRol(['r_presentacion', 'm_presentacion', 'l_presentacion'], $permisos_rol)
    ],
    "marca" => [
        "r_marca" => rol_model::sumaPermisoRol(['r_marca'], $permisos_rol),
        "m_marca" => rol_model::sumaPermisoRol(['m_marca'], $permisos_rol),
        "l_marca" => rol_model::sumaPermisoRol(['l_marca'], $permisos_rol),
        'total' => rol_model::sumaPermisoRol(['r_marca', 'm_marca', 'l_marca'], $permisos_rol)
    ],
    "entrada" => [
        "r_entrada" => rol_model::sumaPermisoRol(['r_entrada'], $permisos_rol),
        "l_entrada" => rol_model::sumaPermisoRol(['l_entrada'], $permisos_rol),
        'total' => rol_model::sumaPermisoRol(['r_entrada', 'l_entrada'], $permisos_rol)
    ],
    "productos" => [
        "r_productos" => rol_model::sumaPermisoRol(['r_productos'], $permisos_rol),
        "l_productos" => rol_model::sumaPermisoRol(['l_productos'], $permisos_rol),
        'total' => rol_model::sumaPermisoRol(['r_productos', 'l_productos'], $permisos_rol)
    ],
    "total" => rol_model::sumaPermisoRol(['r_categoria','m_categoria','l_categoria','r_presentacion','m_presentacion','l_presentacion','r_marca','m_marca','l_marca','r_productos','l_productos','r_entrada','l_entrada'], $permisos_rol),
];


// cantidad de vistas de venta
$venta = [
    "g_venta" => rol_model::sumaPermisoRol(['g_venta'], $permisos_rol),
    "d_venta" => rol_model::sumaPermisoRol(['d_venta'], $permisos_rol),
    "f_venta" => rol_model::sumaPermisoRol(['f_venta'], $permisos_rol),
    "l_venta" => rol_model::sumaPermisoRol(['l_venta'], $permisos_rol),
    "est_venta" => rol_model::sumaPermisoRol(['est_venta'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['g_venta','d_venta','f_venta','l_venta','est_venta'], $permisos_rol)
];

// cantidad de vistas de menu
$menu = [
    "r_servicio" => rol_model::sumaPermisoRol(['r_servicio'], $permisos_rol),
    "m_servicio" => rol_model::sumaPermisoRol(['m_servicio'], $permisos_rol),
    "l_servicio" => rol_model::sumaPermisoRol(['l_servicio'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['r_servicio','m_servicio','l_servicio'], $permisos_rol)
];

// cantidad de vistas de usuario
$cliente = [
    "r_cliente" => rol_model::sumaPermisoRol(['r_cliente'], $permisos_rol),
    "m_cliente" => rol_model::sumaPermisoRol(['m_cliente'], $permisos_rol),
    "l_cliente" => rol_model::sumaPermisoRol(['l_cliente'], $permisos_rol),
    "h_cliente" => rol_model::sumaPermisoRol(['h_cliente'], $permisos_rol),
    "f_cliente" => rol_model::sumaPermisoRol(['f_cliente'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['r_cliente','m_cliente','l_cliente','h_cliente','f_cliente'], $permisos_rol)
];

$empleado = [
    "r_empleado" => rol_model::sumaPermisoRol(['r_empleado'], $permisos_rol),
    "m_empleado" => rol_model::sumaPermisoRol(['m_empleado'], $permisos_rol),
    "l_empleado" => rol_model::sumaPermisoRol(['l_empleado'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol( ['r_empleado','m_empleado','l_empleado'], $permisos_rol)
];


$rol = [
    "r_rol" => rol_model::sumaPermisoRol(['r_rol'], $permisos_rol),
    "m_rol" => rol_model::sumaPermisoRol(['m_rol'], $permisos_rol),
    "l_rol" => rol_model::sumaPermisoRol(['l_rol'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['r_rol','m_rol','l_rol'], $permisos_rol)
];

// cantidad de vistas de configuración
$ajustes = [
    "m_cant_pregunta_seguridad" => rol_model::sumaPermisoRol(['m_cant_pregunta_seguridad'], $permisos_rol),
    "m_tiempo_sesion" => rol_model::sumaPermisoRol(['m_tiempo_sesion'], $permisos_rol),
    "m_cant_caracteres" => rol_model::sumaPermisoRol(['m_cant_caracteres'], $permisos_rol),
    "m_cant_simbolos" => rol_model::sumaPermisoRol(['m_cant_simbolos'], $permisos_rol),
    "m_cant_num" => rol_model::sumaPermisoRol(['m_cant_num'], $permisos_rol),
    "intentos_inicio_sesion" => rol_model::sumaPermisoRol(['intentos_inicio_sesion'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['m_cant_pregunta_seguridad','m_tiempo_sesion','m_cant_caracteres','m_cant_simbolos','m_cant_num','intentos_inicio_sesion'], $permisos_rol)
];

$bitacora = [
    "v_bitacora" => rol_model::sumaPermisoRol(['v_bitacora'], $permisos_rol),
    "m_bitacora" => rol_model::sumaPermisoRol(['m_bitacora'], $permisos_rol),
    "total" => rol_model::sumaPermisoRol(['v_bitacora','m_bitacora'], $permisos_rol)
];


?>

<form action="../controlador/rol.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update" id="modalSendForm">

    <input type="hidden" value="<?= $id_rol ?>" name="id_rol">
    <input type="hidden" value="<?= $permisos['estado'] ?>" name="estado_rol">
    <input type="hidden" value="<?= $nombre ?>" name="nombre_rol">
    <input type="hidden" value="Modificar" name="modulo">
    
    <div class="row align-items-center mb-4 pb-2 border-bottom">
        
        <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
            <h5 class="h5 text-capitalize mb-0">
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

    <div class="row m-0">
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

    
    <div class="row mt-3 m-0 mb-3">
        <div class="col-12">
            <p class="text-muted small">Desglose de permisos por módulo:</p>
        </div>
    </div>
    
    <div class="row g-3">

        <div class="col-12 col-md-6 m-0 nb-1">        
    
            <h4 class="mb-3 text-primary">
                <i class="bi bi-box-seam me-2"></i>
                Inventario
            </h4>

            <hr>

            <div class="row g-3 justify-content-center">

                <div class="col-12 mb-2">
                    <div class="accordion" id="acordeon_proveedores">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proveedoresCard" aria-expanded="false" aria-controls="proveedoresCard">
                                    Módulo Proveedores
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($proveedor['total'], 4) ?>"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="proveedoresCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_proveedores">
                                <div class="accordion-body p-0">
                                    <div class="form-check mb-2 ms-4 pt-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_proveedores" <?= $proveedor > 0 ? 'checked' : '' ?> value="proveedores">
                                        <label class="form-check-label fw-bold" for="vista_proveedores">
                                            Acceso a la Vista del Módulo de Proveedores
                                        </label>
                                    </div>
                                    
                                    <ul class="list-unstyled ps-4 pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="r_proveedores" class="form-check-input proveedores" <?= $proveedor['r_proveedores'] == 1 ? 'checked' : '' ?> value="1" type="checkbox" id="r_proveedores">
                                            <label class="form-check-label" for="r_proveedores">Registrar Nuevos Proveedores</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_proveedores" class="form-check-input proveedores" <?= $proveedor['m_proveedores'] == 1 ? 'checked' : '' ?> value="2" type="checkbox" id="m_proveedores">
                                            <label class="form-check-label" for="m_proveedores">Modificar Información de Proveedores</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_proveedores" class="form-check-input proveedores" <?= $proveedor['l_proveedores'] == 1 ? 'checked' : '' ?> value="3" type="checkbox" id="l_proveedores">
                                            <label class="form-check-label" for="l_proveedores">Consultar Lista de Proveedores</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="h_proveedores" class="form-check-input proveedores" <?= $proveedor['h_proveedores'] == 1 ? 'checked' : '' ?> value="4" type="checkbox" id="h_proveedores">
                                            <label class="form-check-label" for="h_proveedores">Visualizar Historial de Compras</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="accordion" id="acordeon_productos">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productosCard" aria-expanded="false" aria-controls="productosCard">
                                    Módulo Productos
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($producto["total"], 13) ?>"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="productosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_productos">
                                <div class="accordion-body p-0">
                                    <div class="form-check mb-2 ms-4 pt-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_productos" <?= $producto["total"] > 0 ? 'checked' : '' ?> value="productos">
                                        <label class="form-check-label fw-bold" for="vista_productos">
                                            Acceso a la Vista del Módulo de Productos
                                        </label>
                                    </div>
                                        
                                    <ul class="list-unstyled ps-4 pt-2 border-top mt-2">
                                        <li class="form-check mb-1 border-bottom">
                                            <p class="fw-bold mb-1">Categorías</p>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input class="form-check-input productos" type="checkbox" <?= $producto["categoria"]['r_categoria'] == 1 ? 'checked' : '' ?> value="5" name="r_categoria" id="r_categoria">
                                            <label class="form-check-label" for="l_categoria">Registrar Nuevas Categorías</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input class="form-check-input productos" type="checkbox" <?= $producto["categoria"]['m_categoria'] == 1 ? 'checked' : '' ?> value="6" name="m_categoria" id="m_categoria">
                                            <label class="form-check-label" for="l_categoria">Modificar Categorías</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input class="form-check-input productos" type="checkbox" <?= $producto["categoria"]['l_categoria'] == 1 ? 'checked' : '' ?> value="7" name="l_categoria" id="l_categoria">
                                            <label class="form-check-label" for="l_categoria">Consultar Lista de Categorías</label>
                                        </li>
                                        
                                        <li class="form-check mb-1 mt-3 border-bottom">
                                            <p class="fw-bold mb-1">Presentaciones</p>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="r_presentacion" class="form-check-input productos" <?= $producto["presentacion"]['r_presentacion'] == 1 ? 'checked' : '' ?> value="8" type="checkbox" id="r_presentacion">
                                            <label class="form-check-label" for="r_presentacion">Registrar Nuevas Presentaciones</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input class="form-check-input productos" type="checkbox" <?= $producto["presentacion"]['m_presentacion'] == 1 ? 'checked' : '' ?> value="9" name="m_presentacion" id="m_presentacion">
                                            <label class="form-check-label" for="m_presentacion">Modificar Presentaciones</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input class="form-check-input productos" type="checkbox" <?= $producto["presentacion"]['l_presentacion'] == 1 ? 'checked' : '' ?> value="10" name="l_presentacion" id="l_presentacion">
                                            <label class="form-check-label" for="l_presentacion">Consultar Lista de Presentaciones</label>
                                        </li>
                                        <li class="form-check mb-1 mt-3 border-bottom">
                                            <p class="fw-bold mb-1">Marcas</p>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="r_marca" class="form-check-input productos" <?= $producto["marca"]['r_marca'] == 1 ? 'checked' : '' ?> value="11" type="checkbox" id="r_marca">
                                            <label class="form-check-label" for="r_marca">Registrar Nuevas Marcas</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_marca" class="form-check-input productos" <?= $producto["marca"]['m_marca'] == 1 ? 'checked' : '' ?> value="12" type="checkbox" id="m_marca">
                                            <label class="form-check-label" for="m_marca">Modificar Información de Marcas</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_marca" class="form-check-input productos" <?= $producto["marca"]['l_marca'] == 1 ? 'checked' : '' ?> value="13" type="checkbox" id="l_marca">
                                            <label class="form-check-label" for="l_marca">Consultar Lista de Marcas</label>
                                        </li>
                                        <li class="form-check mb-1 mt-3 border-bottom">
                                            <p class="fw-bold mb-1">Productos y Entradas</p>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="r_productos" class="form-check-input productos" <?= $producto["productos"]['r_productos'] == 1 ? 'checked' : '' ?> value="14" type="checkbox" id="r_productos">
                                            <label class="form-check-label" for="r_productos">Registrar Nuevos Productos</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_productos" class="form-check-input productos" <?= $producto["productos"]['l_productos'] == 1 ? 'checked' : '' ?> value="15" type="checkbox" id="l_productos">
                                            <label class="form-check-label" for="l_productos">Consultar Lista de Productos</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="r_entrada" class="form-check-input productos" <?= $producto["entrada"]['r_entrada'] == 1 ? 'checked' : '' ?> value="16" type="checkbox" id="r_entrada">
                                            <label class="form-check-label" for="r_entrada">Registrar Entrada de Productos</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_entrada" class="form-check-input productos" <?= $producto["entrada"]['l_entrada'] == 1 ? 'checked' : '' ?> value="17" type="checkbox" id="l_entrada">
                                            <label class="form-check-label" for="l_entrada">Consultar Lista de Entradas</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

        <div class="col-12 col-md-6 m-0 nb-1">
            
            <h4 class="mb-3 text-primary">
                <i class="bi bi-currency-dollar"></i> Ventas |
                <i class="bi bi-fork-knife"></i> Menú / Servicios
            </h4>

            <hr>

            <div class="row g-3 justify-content-center">

                <div class="col-12 mb-2">
                    <div class="accordion" id="acordeon_ventas">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ventasCard" aria-expanded="false" aria-controls="ventasCard">
                                    Módulo Ventas
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($venta["total"], 5) ?>"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="ventasCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ventas">
                                <div class="accordion-body p-0">
                                    <div class="form-check mb-2 ms-4 pt-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_productos" <?= $venta["total"] > 0 ? 'checked' : '' ?> value="productos">
                                        <label class="form-check-label fw-bold" for="vista_productos">
                                            Acceso a la Vista del Módulo de Ventas
                                        </label>
                                    </div>

                                    <ul class="list-unstyled ps-4 pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="g_venta" class="form-check-input ventas" <?= $venta['g_venta'] == 1 ? 'checked' : '' ?> value="18" type="checkbox" id="g_venta">
                                            <label class="form-check-label" for="g_venta">Generar Venta</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_venta" class="form-check-input ventas" <?= $venta['l_venta'] == 1 ? 'checked' : '' ?> value="19" type="checkbox" id="l_venta">
                                            <label class="form-check-label" for="l_venta">Lista de Ventas Realizadas</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="d_venta" class="form-check-input ventas" <?= $venta['d_venta'] == 1 ? 'checked' : '' ?> value="20" type="checkbox" id="d_venta">
                                            <label class="form-check-label" for="d_venta">Detalles de Ventas</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="f_venta" class="form-check-input ventas" <?= $venta['f_venta'] == 1 ? 'checked' : '' ?> value="21" type="checkbox" id="f_venta">
                                            <label class="form-check-label" for="f_venta">Ver Facturas de Ventas</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="est_venta" class="form-check-input ventas" <?= $venta['est_venta'] == 1 ? 'checked' : '' ?> value="22" type="checkbox" id="est_venta">
                                            <label class="form-check-label" for="est_venta">Ver Estadísticas de Ventas</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="accordion mb-3" id="acordeon_servicios">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviciosCard" aria-expanded="false" aria-controls="serviciosCard">
                                    Módulo Servicios
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($menu["total"], 3) ?>"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="serviciosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_servicios">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_servicio" <?= $menu["total"] > 0 ? 'checked' : '' ?> value="servicio">
                                        <label class="form-check-label fw-bold" for="vista_servicio">
                                            Acceso a la Vista del Módulo de Servicios
                                        </label>
                                    </div>

                                    <ul class="list-unstyled pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="r_servicio" class="form-check-input servicio" <?= $menu['r_servicio'] == 1 ? 'checked' : '' ?> value="23" type="checkbox" id="r_servicio">
                                            <label class="form-check-label" for="r_servicio">Registrar Nuevos Servicios</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_servicio" class="form-check-input servicio" <?= $menu['m_servicio'] == 1 ? 'checked' : '' ?> value="24" type="checkbox" id="m_servicio">
                                            <label class="form-check-label" for="m_servicio">Modificar Información de Servicios</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_servicio" class="form-check-input servicio" <?= $menu['l_servicio'] == 1 ? 'checked' : '' ?> value="25" type="checkbox" id="l_servicio">
                                            <label class="form-check-label" for="l_servicio">Consultar Lista de Servicios</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 m-0 mb-1 ">

            <h4 class="mb-3 text-primary">
                <i class="bi bi-people-fill"></i>
                Usuarios
            </h4>

            <hr>

            <div class="row g-3 justify-content-center">

                <div class="col-12 mb-2">
                    
                    <div class="accordion" id="acordeon_clientes">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clientesCard" aria-expanded="false" aria-controls="clientesCard">
                                    Módulo Clientes
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($cliente["total"], 5) ?> "></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="clientesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_clientes">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_clientes" <?= $cliente["total"] > 0 ? 'checked' : '' ?> value="clientes">
                                        <label class="form-check-label fw-bold" for="vista_clientes">
                                            Acceso a la Vista del Módulo de Clientes
                                        </label>
                                    </div>
                                    <ul class="list-unstyled pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="r_cliente" class="form-check-input clientes" <?= $cliente['r_cliente'] == 1 ? 'checked' : '' ?> value="26" type="checkbox" id="r_cliente">
                                            <label class="form-check-label" for="r_cliente">Registrar Nuevos Clientes</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_cliente" class="form-check-input clientes" <?= $cliente['m_cliente'] == 1 ? 'checked' : '' ?> value="27" type="checkbox" id="m_cliente">
                                            <label class="form-check-label" for="m_cliente">Modificar Información de Clientes</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_cliente" class="form-check-input clientes" <?= $cliente['l_cliente'] == 1 ? 'checked' : '' ?> value="28" type="checkbox" id="l_cliente">
                                            <label class="form-check-label" for="l_cliente">Consultar Lista de Clientes</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="h_cliente" class="form-check-input clientes" <?= $cliente['h_cliente'] == 1 ? 'checked' : '' ?> value="29" type="checkbox" id="h_cliente">
                                            <label class="form-check-label" for="h_cliente">Visualizar Historial de Compras</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="f_cliente" class="form-check-input clientes" <?= $cliente['f_cliente'] == 1 ? 'checked' : '' ?> value="30" type="checkbox" id="f_cliente">
                                            <label class="form-check-label" for="f_cliente">Ver Facturas de Compras</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 mb-2">

                    <div class="accordion" id="acordeon_empleados">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empleadosCard" aria-expanded="false" aria-controls="empleadosCard">
                                    Módulo Empleados
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($empleado["total"], 3) ?> "></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="empleadosCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_empleados">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_empleado" <?= $empleado["total"] > 0 ? 'checked' : '' ?> value="empleado">
                                        <label class="form-check-label fw-bold" for="vista_empleado">
                                            Acceso a la Vista del Módulo de Empleados
                                        </label>
                                    </div>
                                    
                                    <ul class="list-unstyled pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="r_empleado" class="form-check-input empleado" <?= $empleado['r_empleado'] == 1 ? 'checked' : '' ?> value="31" type="checkbox" id="r_empleado">
                                            <label class="form-check-label" for="r_empleado">Registrar Nuevos Empleados</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_empleado" class="form-check-input empleado" <?= $empleado['m_empleado'] == 1 ? 'checked' : '' ?> value="32" type="checkbox" id="m_empleado">
                                            <label class="form-check-label" for="m_empleado">Modificar Información de Empleados</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_empleado" class="form-check-input empleado" <?= $empleado['l_empleado'] == 1 ? 'checked' : '' ?> value="33" type="checkbox" id="l_empleado">
                                            <label class="form-check-label" for="l_empleado">Consultar Lista de Empleados</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 mb-2">
            
                    <div class="accordion" id="acordeon_roles">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rolesCard" aria-expanded="false" aria-controls="rolesCard">
                                    Módulo Roles 
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($rol["total"], 3) ?>"></i>
                                    </span>
                                </button>
                            </h2>
                            
                            <div id="rolesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_roles">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_roles" <?= $rol["total"] > 0 ? 'checked' : '' ?> value="roles">
                                        <label class="form-check-label fw-bold" for="vista_roles">
                                            Acceso a la Vista del Módulo de Roles
                                        </label>
                                    </div>

                                    <ul class="list-unstyled pt-2 border-top mt-2">
                                        <li class="form-check mb-1">
                                            <input name="r_rol" class="form-check-input roles" <?= $rol['r_rol'] == 1 ? 'checked' : '' ?> value="34" type="checkbox" id="r_rol">
                                            <label class="form-check-label" for="r_rol">Registrar Nuevos Roles</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_rol" class="form-check-input roles" <?= $rol['m_rol'] == 1 ? 'checked' : '' ?> value="35" type="checkbox" id="m_rol">
                                            <label class="form-check-label" for="m_rol">Modificar Información de Roles</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="l_rol" class="form-check-input roles" <?= $rol['l_rol'] == 1 ? 'checked' : '' ?> value="36" type="checkbox" id="l_rol">
                                            <label class="form-check-label" for="l_rol">Consultar Lista de Roles</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 m-0 mb-4">

            <h4 class="mb-3 text-primary"><i class="bi bi-gear-fill"></i> Configuración General</h4>
            <hr>
            
            <div class="row justify-content-center">

                <div class="col-12 mb-1 p-2">
        
                    <div class="accordion mb-3" id="acordeon_ajustes_sistema">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ajustesCard" aria-expanded="false" aria-controls="ajustesCard">
                                    Módulo Ajustes del Sistema
                                    <span class="ms-auto me-2">
                                        <i class="bi <?= obtenerIconoPermisos($ajustes["total"], 6) ?>"></i>
                                    </span>
                                </button>
                            </h2>
                            
                            <div id="ajustesCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_ajustes_sistema">
                                <div class="accordion-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_ajustes" <?= $ajustes["total"] > 0 ? 'checked' : '' ?> value="ajustes_sistema">
                                        <label class="form-check-label fw-bold" for="vista_ajustes">
                                            Acceso a la Vista del Módulo de Ajustes del Sistema
                                        </label>
                                    </div>
        
                                    <ul class="list-unstyled pt-2 border-top mt-2">
                                        
                                        <li class="form-check mb-1">
                                            <input name="m_cant_pregunta_seguridad" class="form-check-input ajustes_sistema" <?= $ajustes['m_cant_pregunta_seguridad'] == 1 ? 'checked' : '' ?> value="37" type="checkbox" id="m_cant_pregunta_seguridad">
                                            <label class="form-check-label" for="m_cant_pregunta_seguridad">Modificar cantidad de preguntas de seguridad</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_tiempo_sesion" class="form-check-input ajustes_sistema" <?= $ajustes['m_tiempo_sesion'] == 1 ? 'checked' : '' ?> value="38" type="checkbox" id="m_tiempo_sesion">
                                            <label class="form-check-label" for="m_tiempo_sesion">Modificar tiempo de inactividad de sesión</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_cant_caracteres" class="form-check-input ajustes_sistema" <?= $ajustes['m_cant_caracteres'] == 1 ? 'checked' : '' ?> value="39" type="checkbox" id="m_cant_caracteres">
                                            <label class="form-check-label" for="m_cant_caracteres">Modificar cantidad de caracteres (min/max)</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_cant_simbolos" class="form-check-input ajustes_sistema" <?= $ajustes['m_cant_simbolos'] == 1 ? 'checked' : '' ?> value="40" type="checkbox" id="m_cant_simbolos">
                                            <label class="form-check-label" for="m_cant_simbolos">Modificar cantidad de símbolos</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="m_cant_num" class="form-check-input ajustes_sistema" <?= $ajustes['m_cant_num'] == 1 ? 'checked' : '' ?> value="41" type="checkbox" id="m_cant_num">
                                            <label class="form-check-label" for="m_cant_num">Modificar cantidad de números</label>
                                        </li>
                                        <li class="form-check mb-1">
                                            <input name="intentos_inicio_sesion" class="form-check-input ajustes_sistema" <?= $ajustes['intentos_inicio_sesion'] == 1 ? 'checked' : '' ?> value="42" type="checkbox" id="intentos_inicio_sesion">
                                            <label class="form-check-label" for="intentos_inicio_sesion">Modificar intentos de inicio de sesión</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="col-12 mb-1 p-2">
                    
                    <div class="accordion" id="acordeon_bitacora">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bitacoraCard" aria-expanded="false" aria-controls="bitacoraCard">
                                    Bitácora
                                    <span class="ms-auto"><i class="bi <?= obtenerIconoPermisos($bitacora['total'], 2) ?>"></i></span>
                                </button>
                            </h2>
                            <div id="bitacoraCard" class="accordion-collapse collapse" data-bs-parent="#acordeon_bitacora">
                                <div class="accordion-body p-0">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input vista" type="checkbox" id="vista_bitacora" <?= $bitacora['total'] == 2 ? 'checked' : '' ?> value="1"  name="bitacora_sistema">
                                        <label class="form-check-label fw-bold" for="vista_ajustes">
                                            Acceso a la Vista del Módulo de Bitácora del Sistema
                                        </label>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light border-0">
                                            <strong class="text-success">Acceso Total a la Bitácora</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input name="v_bitacora" class="form-check-input ajustes_sistema" <?= $bitacora['v_bitacora'] == 1 ? 'checked' : '' ?> value="43" type="checkbox" id="v_bitacora">
                                            Consultar Registros de la Bitácora
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input name="m_bitacora" class="form-check-input ajustes_sistema" <?= $bitacora['m_bitacora'] == 1 ? 'checked' : '' ?> value="44" type="checkbox" id="m_bitacora">
                                            Consultar Movimientos de un Usuario en la Bitácora
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

    </div>
</form>