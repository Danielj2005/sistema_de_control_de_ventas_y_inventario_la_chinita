<?php
class venta_model extends modeloPrincipal {
    
    public static function obtener_id_venta_recien_registrada(){
        $id_venta = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_venta) AS id FROM venta"));
        $id_venta = $id_venta['id'];
        return $id_venta;
    }

    
    public static function insert_sell($fecha_venta,$sub_total_dolar,$sub_total_bs,$total_venta_dolar,$total_venta_bolivares,$id_usuario,$id_cliente) {
        
        $registrar = modeloPrincipal::InsertSQL( "venta","fecha_venta, sub_total_dolares, sub_total_bs, monto_total_dolares, monto_total_bolivares, id_usuario, id_cliente","'$fecha_venta',$sub_total_dolar,$sub_total_bs,$total_venta_dolar,$total_venta_bolivares,$id_usuario,$id_cliente");
    
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el venta debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }
    
    public static function sell_only_service($id_servicios, $cantidad_servicios, $precio_servicio_dolar, $precio_servicio_bolivar, $id_venta) {
        try {

            // ****** se regitra la venta de uno o más servicios
            for ($i = 0; $i < count($id_servicios); $i++) {
    
                modeloPrincipal::InsertSQL("detalles_venta", "id_servicio, cantidad_servicio, precio_servicio_dolares, precio_servicio_bolivares, id_venta","".$id_servicios[$i].",".$cantidad_servicios[$i].",".$precio_servicio_dolar[$i].",".$precio_servicio_bolivar[$i].",$id_venta");
    
                // Se insertan los detalles de una venta con solo servicios
                $datos_producto = modeloPrincipal::consultar("SELECT D.id_producto, D.cantidad, P.stock 
                    FROM detalles_menu AS D 
                    INNER JOIN producto AS P ON D.id_producto = P.id_producto
                    WHERE id_menu = ".$id_servicios[$i]."");
    
                while ($mostrar = mysqli_fetch_array($datos_producto)) {
                    
                    // Se descuenta del stock
                    modeloPrincipal::UpdateSQL("producto", "stock = stock - ".(intval($mostrar['cantidad']) * intval($cantidad_servicios[$i])), "id_producto = " . intval($mostrar['id_producto']));
                }
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function sell_only_product($id_detalles_venta = "", $id_productos, $cantidad_productos, $precios_dolar_productos, $precios_bolivares_productos, $id_venta) {
        // ****** se registra la venta de uno o más productos
        try {
            for ($i = 0; $i < count($id_productos); $i++) {

                if (strlen($id_detalles_venta) > 0) {

                    modeloPrincipal::UpdateSQL("detalles_venta", "id_producto = ".$id_productos[$i].", cantidad = ".$cantidad_productos[$i].", precio_unidad_dolares = ".$precios_dolar_productos[$i].", precio_unidad_bolivares = ".$precios_bolivares_productos[$i].", id_venta = $id_venta","id_detalles_venta = $id_detalles_venta");

                } else {
                    modeloPrincipal::InsertSQL( "detalles_venta","id_producto, cantidad, precio_unidad_dolares, precio_unidad_bolivares, id_venta","".intval($id_productos[$i]).",".intval($cantidad_productos[$i]).",".floatval($precios_dolar_productos[$i]).",".floatval($precios_bolivares_productos[$i]).",$id_venta");
                }
                // Se descuenta del stock
                modeloPrincipal::UpdateSQL("producto", "stock = stock - ".$cantidad_productos[$i]."","id_producto = ".$id_productos[$i]."");
        
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function registrar_detalles_pago($id_venta, $id_metodo_pago, $referencia_pago, $precio_dolar, $cantidad_pago) {
        
        try {

            for($i = 0; $i < count($id_metodo_pago); $i++){
                $metodos_pago = [
                    1 => 'Divisa',
                    2 => 'Punto de Venta',
                    3 => 'Transferencia / Pago movíl',
                    4 => 'Bolivares en Efectivo',
                ];
    
                $id_metodo_pago[$i] = $metodos_pago[intval($id_metodo_pago[$i])];
    
                $cantidad_abonada_bolivares = $precio_dolar * $cantidad_pago[$i];
                $cantidad_abonada_bolivares = round( $cantidad_abonada_bolivares, 2);
                $referencia_pago[$i] = $referencia_pago[$i] == "" ? 0 : $referencia_pago[$i];

                if ($referencia_pago[$i] == 0){
                    // se insertan los detalles del metodo de pago de una venta sin referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                    
                } else {
                    // se insertan los detalles del metodo de pago de una venta con referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, referencia, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$referencia_pago[$i].",".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                
                }
    
            }
            return true;
        } catch (Exception $e) {
            return false;
        }

    }
    
    public static function verify_stock_for_service($id_servicios, $cantidad_servicios) {

        for ($i = 0; $i < count($id_servicios); $i++) {
            // Obtener la cantidad de productos necesarios para el servicio

            $datos_producto_servicio = modeloPrincipal::consultar("SELECT D.id_producto, D.cantidad, M.nombre_platillo
                FROM detalles_menu AS D
                INNER JOIN menu AS M ON D.id_menu = M.id_menu
                WHERE M.id_menu = ". intval($id_servicios[$i]));
            
            // Iterar sobre los productos necesarios
            while ($row = mysqli_fetch_array($datos_producto_servicio)) {

                $id_producto = intval($row['id_producto']);

                $cantidad_necesaria = intval($row['cantidad']) * intval($cantidad_servicios[$i]);

                $datos_producto = modeloPrincipal::consultar("SELECT nombre_producto, stock 
                    FROM producto 
                    WHERE id_producto = $id_producto");

                $datos_producto = mysqli_fetch_array($datos_producto);

                if ($datos_producto['stock'] < 0) {
                    modeloPrincipal::UpdateSQL("producto", "stock = 0, status = 0", "id_producto = ".intval($id_producto));
                }

                // Verificar si el stock es suficiente
                if ($datos_producto['stock'] < $cantidad_necesaria) {
                    alert_model::alerta_simple("¡Ocurrió un error!","El stock del producto ".$datos_producto['nombre_producto'] . " se encuentra por debajo de la cantidad necesaria para dar un servicio de ".$row['nombre_platillo'].", el stock actual es de (".intval($datos_producto['stock']).")","error");
                    exit();
                }
                
            }
        }
    }

    public static function verify_stock_for_product($id_productos, $cantidad_productos) {
        for ($i = 0; $i < count($id_productos); $i++) {
            
            $stock_producto = modeloPrincipal::consultar("SELECT nombre_producto, stock 
                FROM producto 
                WHERE id_producto = ".$id_productos[$i]."");

            $stock_producto = mysqli_fetch_array($stock_producto);
            
            if ($stock_producto['stock'] < 1) {
                modeloPrincipal::UpdateSQL("producto", "stock = 0, estatus = 0", "id_producto = ".$id_productos[$i]."");
            }
            
            if ($stock_producto['stock'] < $cantidad_productos[$i]) {
                alert_model::alerta_simple("¡Ocurrio un error!","El stock del producto `".$stock_producto['nombre_producto'] . "` se encuentra por debajo de la cantidad seleccionada, el stock actual es de (".intval($stock_producto['stock']).")","error");
                exit();

            }
        } 
    }


    /**********************************************************************************/
    /***************** funciones para generar el codigo de las ventas *****************/
    /**********************************************************************************/
    /*---------- Funcion para generar el codigo de las ventas ----------*/
    public static function generar_numero($num){
        switch (strlen($num)) {
            case '1':
                $num = '0000000'.$num;
                break;
            case '2':
                $num = '000000'.$num;
                break;
            case '3':
                $num = '00000'.$num;
                break;
            case '4':
                $num = '0000'.$num;
                break;
            case '5':
                $num = '000'.$num;
                break;
            case '6':
                $num = '00'.$num;
                break;
            case '7':
                $num = '0'.$num;
                break;
            case '8':
                $num;
                break;
            default:
                $num;
                break;
        }
        return $num;
    }
}