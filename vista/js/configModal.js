const ICONS = {
    modify: '<i class="bi bi-pencil-square"></i> &nbsp;',
    list: '<i class="bi bi-list-columns-reverse"></i> &nbsp;',
    reg: '<i class="bi bi-plus-circle"></i> &nbsp;',

}

const dataModal = {
    // modales del módulo presentaciones
    listaPresentacion : {
        modalUrl : "./modal/producto/lista_presentacion.php",
        modalTitle : `${ICONS.list} Lista de Presentaciones Registradas`,
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tablePresentationOfProducts"
    },
    registrarPresentacion : {
        modalUrl : "./modal/producto/registrarPresentacion.php",
        modalTitle :  `${ICONS.reg} Registrar Nueva Presentaciones`,
        modalSendForm : true,
    },

    // modales del módulo Categorias
    listaCategoria : {
        modalUrl : "./modal/producto/lista_categoria.php",
        modalTitle : `${ICONS.list} Lista de Categorías Registradas`,
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tableCategoryOfProducts"
    },

    // modales del módulo Marcas
    listaMarca : {
        modalUrl : "./modal/producto/lista_marcas.php",
        modalTitle : `${ICONS.list} Lista de Marcas Registradas`,
        modalSize : '',
        modalDataTable : true,
        modalClassTable : "tableTrademarkOfProducts"
    },
    registrarMarca : {
        modalUrl : "./modal/producto/registrarMarca.php",
        modalTitle : `${ICONS.reg} Registrar Nueva Marca`,
        modalSendForm : true,
        modalSize : '',
    },

    // modales del módulo proveedores
    proveedorDetalles : {
        modalUrl : "./modal/proveedor/detalles.php",
        modalTitle : `${ICONS.list} Detalles del Proveedor`,
    },
    proveedorModificar : {
        modalUrl : "./modal/proveedor/modificar.php",
        modalTitle : `${ICONS.modify} Modificar Proveedor`,
        modalSendForm : true,
    },
    proveedorHistorial : {
        modalUrl : "./modal/proveedor/historial.php",
        modalTitle : `${ICONS.list} Detalles de Compras al Proveedor`,
        modalSize : 'modal-xl',
        modalDataTable : true,
        modalClassTable : "tableProvider"
    },

    // modales del módulo entradas
    detallesEntrada : {
        modalUrl : "./modal/producto/detalles_entrada.php",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la Compra',
        modalSize : 'modal-xl',
        modalDataTable : true,
        modalClassTable : "tableDetailsEntry"
    },

    // modales del módulo bitácora
    bitacora : {
        modalUrl : "./modal/bitacora/detalles_bitacora.php",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i>&nbsp;Detalle de la Bitácora',
        modalDataTable : true,
        modalClassTable : "tableDetailsBitacora"
    },

    // modales del módulo Servicio
    servicioModificar : {
        modalUrl : "./modal/servicio/modificar_servicio.php",
        modalTitle : `${ICONS.modify} Modificar Servicio`,
        modalSendForm : true,
        modalSize: "modal-lg",
        modalDataTable : true,
        modalClassTable : "tableModifyService",
    },
    servicioDetalles : {
        modalUrl : "./modal/servicio/detalles.php",
        modalTitle : `${ICONS.list} Detalles del Servicio`,
        modalDataTable : true,
        modalClassTable : "tableDetailsService",
        modalSize: "modal-lg"
    },

    // modales del módulo Venta
    ventaDetalles : {
        modalUrl : "./modal/venta/ventas_diarias.php",
        modalTitle : `${ICONS.list} Detalles de la Venta`,
    },
};

// const title_per_module = {
//     "ver_detalles_bitacora": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del registro en bitácora',
    
//     "ver_reportes": '<i class="bi bi-file-text "></i> &nbsp; Exportar reporte de compras',
    
//     "datos_usuario": '<i class="bi bi-person-circle"></i> &nbsp; Actualizar datos de la cuenta del usuario',
//     "modificar_info_personal_usuario": '<i class="bi bi-person-plus"></i> &nbsp; Actualizar información personal',
//     "preguntas_seguridad": '<i class="bi bi-shield-plus"></i> &nbsp; Actualizar preguntas de seguridad del usuario',
    
//     "modificar_cliente": '<i class="bi bi-person-plus"></i> &nbsp; Modificar cliente',
//     "ver_historial_cliente": '<i class="bi bi-cart-check"></i> &nbsp; Historial de compras del cliente',
    
//     "modificar_empleado": '<i class="bi bi-person-plus"></i> &nbsp; Modificar características de acceso del usuario',

//     "ver_detalles_rol" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de permisos de acceso de un rol',
//     "modificar_rol" : '<i class="bi bi-person-lines-fill"></i> &nbsp; Modificar permisos de acceso de un rol',

//     "registrar_producto" : '<i class="bi bi-box-seam"></i> &nbsp; Añadir Nuevo Producto',
//     "ver_detalles_entrada" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la entrada',
//     "ver_marcas" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de marcas registradas',
//     "ver_categorias" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de categorías registradas',
//     "ver_presentaciones" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de presentaciones registradas',
//     "ver_productos" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de Productos registrados',
    
//     "ver_detalles_servicio" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del servicio',
//     "modificar_servicio": '<i class="bi bi-person-plus"></i> &nbsp; Modificar servicio',

//     "ver_detalles_venta_del_dia": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la Venta',
// };
