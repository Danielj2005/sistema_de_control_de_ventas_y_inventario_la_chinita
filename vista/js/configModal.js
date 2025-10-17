const dataModal = {
    presentacion : {
        modalUrl : "./modal/producto/lista_presentacion.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de presentaciones registradas',
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tablePresentationOfProducts"
    },
    categoria : {
        modalUrl : "./modal/producto/lista_categoria.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de categorías registradas',
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tableCategoryOfProducts"
    },
    marca : {
        modalUrl : "./modal/producto/lista_marcas.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de marcas registradas',
        modalSize : '',
        modalDataTable : true,
        modalClassTable : "tableTrademarkOfProducts"
    },
    proveedorDetalles : {
        modalUrl : "./modal/proveedor/detalles.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del proveedor',
        modalSize : 'modal-lg',
    },
    proveedorModificar : {
        modalUrl : "./modal/proveedor/modificar.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-person-plus"></i> &nbsp; Modificar información del proveedor',
        modalSize : 'modal-lg',
        modalSendForm : true,
    },
    proveedorHistorial : {
        modalUrl : "./modal/proveedor/historial.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-person-plus"></i> &nbsp; Modificar información del proveedor',
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tableProvider"
    },
    detallesEntrada : {
        modalUrl : "./modal/producto/detalles_entrada.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la entrada',
        modalSize : 'modal-lg',
        modalDataTable : true,
        modalClassTable : "tableDetailsEntry"
    },
    bitacora : {
        modalUrl : "./modal/bitacora/detalles_bitacora.php",
        modalModule : "list",
        modalTitle : '<i class="bi bi-list-columns-reverse"></i>&nbsp;Detalle de la Bitácora',
        modalSize : '',
        modalDataTable : true,
        modalClassTable : "tableDetailsBitacora"
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
