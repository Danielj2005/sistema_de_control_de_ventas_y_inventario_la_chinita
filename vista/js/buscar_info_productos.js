 // funcion para buscar los datos de un producto
function datos_productos(con_precios){
let id_producto = $('#id_producto').val(); 
let parametros = { 'producto' : '1', 'id_producto' : id_producto,'con_precios' : con_precios };

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