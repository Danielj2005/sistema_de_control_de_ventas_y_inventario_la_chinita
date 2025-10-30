<?php 

/* Permisos de usuario basado en roles */
// Módulo inventario
$PERMISOS_MODULO_PROVEEDORES = [
    "r_proveedores" => rol_model::obtenerPermisoRol("r_proveedores"),
    "m_proveedores" => rol_model::obtenerPermisoRol("m_proveedores"),
    "l_proveedores" => rol_model::obtenerPermisoRol("l_proveedores"),
    "h_proveedores" => rol_model::obtenerPermisoRol("h_proveedores"),
    'total' => rol_model::obtenerSumaPermisoRol(['r_proveedores', 'm_proveedores','l_proveedores','h_proveedores'])
];

$PERMISOS_MODULO_PRODUCTOS = [
    "categoria" => [
        "l_categoria" => rol_model::obtenerPermisoRol("l_categoria"),
        'total' => rol_model::obtenerSumaPermisoRol(["m_categoria","l_categoria"])
    ],
    "presentacion" => [
        "r_presentacion" => rol_model::obtenerPermisoRol("r_presentacion"),
        "m_presentacion" => rol_model::obtenerPermisoRol("m_presentacion"),
        "l_presentacion" => rol_model::obtenerPermisoRol("l_presentacion"),
        'total' => rol_model::obtenerSumaPermisoRol(["r_presentacion", "m_presentacion", "l_presentacion"])
    ],
    "marca" => [
        "r_marca" => rol_model::obtenerPermisoRol("r_marca"),
        "m_marca" => rol_model::obtenerPermisoRol("m_marca"),
        "l_marca" => rol_model::obtenerPermisoRol("l_marca"),
        'total' => rol_model::obtenerSumaPermisoRol(["r_marca", "m_marca", "l_marca"])
    ],
    "entrada" => [
        "r_entrada" => rol_model::obtenerPermisoRol("r_entrada"),
        "l_entrada" => rol_model::obtenerPermisoRol("l_entrada"),
        'total' => rol_model::obtenerSumaPermisoRol(["r_entrada", "l_entrada"])
    ],
    "productos" => [
        "r_productos" => rol_model::obtenerPermisoRol("r_productos"),
        "l_productos" => rol_model::obtenerPermisoRol("l_productos"),
        'total' => rol_model::obtenerSumaPermisoRol(["r_productos", "l_productos"])
    ],
    "total" => rol_model::obtenerSumaPermisoRol(['r_categoria','m_categoria','l_categoria','r_presentacion','m_presentacion','l_presentacion','r_marca','m_marca','l_marca','r_productos','l_productos','r_entrada','l_entrada']),
];

$PERMISOS_MODULO_SERVICIOS = [
    "r_servicio" => rol_model::obtenerPermisoRol("r_servicio"),
    "m_servicio" => rol_model::obtenerPermisoRol("m_servicio"),
    "l_servicio" => rol_model::obtenerPermisoRol("l_servicio"),
    "total" => rol_model::obtenerSumaPermisoRol(['r_servicio','m_servicio','l_servicio']),
];

// Módulo venta
$PERMISOS_MODULO_VENTAS = [
    "g_venta" => rol_model::obtenerPermisoRol("g_venta"),
    "d_venta" => rol_model::obtenerPermisoRol("d_venta"),
    "f_venta" => rol_model::obtenerPermisoRol("f_venta"),
    "l_venta" => rol_model::obtenerPermisoRol("l_venta"),
    "est_venta" => rol_model::obtenerPermisoRol("est_venta"),
    "total" => rol_model::obtenerSumaPermisoRol(['g_venta','d_venta','f_venta','l_venta','est_venta']),
];

// Módulo de Usuarios
$PERMISOS_MODULO_CLIENTES = [
    "r_cliente" => rol_model::obtenerPermisoRol("r_cliente"),
    "m_cliente" => rol_model::obtenerPermisoRol("m_cliente"),
    "l_cliente" => rol_model::obtenerPermisoRol("l_cliente"),
    "h_cliente" => rol_model::obtenerPermisoRol("h_cliente"),
    "f_cliente" => rol_model::obtenerPermisoRol("f_cliente"),
    "total" => rol_model::obtenerSumaPermisoRol(['r_cliente','m_cliente','l_cliente','h_cliente','f_cliente']),
];

$PERMISOS_MODULO_USUARIOS = [
    "r_empleado" => rol_model::obtenerPermisoRol("r_empleado"),
    "m_empleado" => rol_model::obtenerPermisoRol("m_empleado"),
    "l_empleado" => rol_model::obtenerPermisoRol("l_empleado"),
    "total" => rol_model::obtenerSumaPermisoRol(['r_empleado','m_empleado','l_empleado']),
];

// Módulo seguridad
$PERMISOS_MODULO_ROLES = [
    "r_rol" => rol_model::obtenerPermisoRol("r_rol"),
    "m_rol" => rol_model::obtenerPermisoRol("m_rol"),
    "l_rol" => rol_model::obtenerPermisoRol("l_rol"),
    "total" => rol_model::obtenerSumaPermisoRol(['r_rol','m_rol','l_rol']),
];

// cantidad de vistas de configuración
$PERMISOS_MODULO_AJUSTES = [
    "m_cant_pregunta_seguridad" => rol_model::obtenerPermisoRol("m_cant_pregunta_seguridad"),
    "m_tiempo_sesion" => rol_model::obtenerPermisoRol("m_tiempo_sesion"),
    "m_cant_caracteres" => rol_model::obtenerPermisoRol("m_cant_caracteres"),
    "m_cant_simbolos" => rol_model::obtenerPermisoRol("m_cant_simbolos"),
    "m_cant_num" => rol_model::obtenerPermisoRol("m_cant_num"),
    "intentos_inicio_sesion" => rol_model::obtenerPermisoRol("intentos_inicio_sesion"),
    "total" => rol_model::obtenerSumaPermisoRol(['m_cant_pregunta_seguridad','m_tiempo_sesion','m_cant_caracteres','m_cant_simbolos','m_cant_num','intentos_inicio_sesion']),
];

$PERMISOS_MODULO_BITACORA = [
    "v_bitacora" => rol_model::obtenerPermisoRol("v_bitacora"),
    "m_bitacora" => rol_model::obtenerPermisoRol("m_bitacora"),
    "total" => rol_model::obtenerSumaPermisoRol(['v_bitacora','m_bitacora']),
];
