<?php 
// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");
/*------- función para mostrar los registros de una tabla -------*/
function consultar_registros($tabla){
        
    // se consultan los registros dependiendo de la tabla
    if($tabla === 'estadistica_producto'){
        // script para crear una lista de productos disponibles
        // consulta de los productos registrados

        $consulta = modeloPrincipal::consultar("SELECT producto.nombre_producto, SUM(detalles_venta.cantidad) FROM detalles_venta, producto WHERE detalles_venta.id_producto = producto.id_producto GROUP BY detalles_venta.id_producto");
                $a=1;
        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td class="text-center"><input type="hidden" value="<?php echo $mostrar['nombre_producto']; ?>" id="<?php echo 'producto',$a; ?>"></td>
                <td class="text-center"><input type="hidden" value="<?php echo $mostrar['SUM(detalles_venta.cantidad)']; ?>" id="<?php echo 'cantidad',$a; ?>"></td>
            </tr>
            
        <?php $a+=1;  }
    }
    if($tabla === 'estadistica_servicios'){
        // script para crear una lista de productos disponibles
        // consulta de los productos registrados

        $consulta = modeloPrincipal::consultar("SELECT menu.nombre_platillo, SUM(detalles_venta.cantidad_servicio) FROM detalles_venta, menu WHERE detalles_venta.id_servicio = menu.id_menu GROUP BY detalles_venta.id_servicio");
                $a=1;
        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td class="text-center"><input type="hidden" value="<?php echo $mostrar['nombre_platillo']; ?>" id="<?php echo 'producto',$a; ?>"></td>
                <td class="text-center"><input type="hidden" value="<?php echo $mostrar['SUM(detalles_venta.cantidad_servicio)']; ?>" id="<?php echo 'cantidad',$a; ?>"></td>
            </tr>
            
        <?php $a+=1;  }
    }
}; 

/*------- fin de la función -------*/