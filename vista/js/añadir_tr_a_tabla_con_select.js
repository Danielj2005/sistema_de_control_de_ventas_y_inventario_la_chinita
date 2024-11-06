/* esta función sirve para añadir un tr a una tabla, ejemplos de uso: tabla de los productos en generar venta y registro de entrada
    se utiliza un id del body detabla a la que queremos agregar el contenido

*/
function añadir_tr_a_tabla(tabla){
    
    // buscar los datos de un producto
    if (tabla == "productos") {
        let id_producto = $('#id_producto').val(); 
        let parametros = { 
            'producto' : '1', 
            'id_producto' : id_producto,
            'modulo' : 'productos'
        };
    
        if (id_producto.length > 0 ) {
            $.ajax({
            url : '../include/datos_productos_generar_venta.php',
            type: 'post',
            data: parametros,
            success: function(valores){
                $('#lista_productos').html(valores);
            }
            });
        }
    }
    
    if (tabla == "servicios") {
        let id_servicio = $('#id_servicio').val(); 
        let parametros = { 'servicio' : '1', 'id_servicio' : id_servicio};
    
        if (id_producto.length > 0 ) {
            $.ajax({
            url : '../include/datos_servicios_include.php',
            type: 'post',
            data: parametros,
            success: function(valores){
                $('#lista_servicios').html(valores);
            }
            });
        }
    }

    // se muestran los productos en la vista de registro de entrada, este tiene para registrar sus precios
    if (tabla == "registrar_entrada") {
        let id_producto = $('#id_producto').val(); 
        let parametros = { 
            'producto' : '1', 
            'id_producto' : id_producto,
            'modulo' : 'registrar_entrada'
        };
    
        if (id_producto.length > 0 ) {
            $.ajax({
            url : '../include/datos_productos.php',
            type: 'post',
            data: parametros,
            success: function(valores){
                $('#lista_productos').html(valores);
            }
            });
        }
    }

    if (tabla == "productos_servicio") {
        let id_producto = $('#id_producto').val(); 
        let parametros = { 
            'producto' : '1', 
            'id_producto' : id_producto,
            'modulo' : 'agregar_servicio'
        };
    
        if (id_producto.length > 0 ) {
            $.ajax({
            url : '../include/datos_productos.php',
            type: 'post',
            data: parametros,
            success: function(valores){
                $('#lista_productos').html(valores);
            }
            });
        }
    }
} 