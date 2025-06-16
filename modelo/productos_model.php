<?php
class producto_model extends modeloPrincipal {

    public static function consultar($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM producto");
        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional($fields, $condicion) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM producto WHERE $condicion");
        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_por_id($fields, $id_producto) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM producto WHERE id = $id_producto");
        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    // funcion para obtener el id de un categoria
    public static function obtener_datos_recien_registrados($id_producto){
        $consul = modeloPrincipal::consultar("SELECT P.codigo, P.nombre_producto, P.precio_venta_dolar,
            P.stock, P.estatus, C.nombre, PS.nombre as nombre_presentacion 
            FROM  producto AS P 
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion WHERE id_producto = $id_producto");

        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function obtener_todos_los_datos(){
        $consul = modeloPrincipal::consultar("SELECT P.codigo, P.nombre_producto, P.precio_venta_dolar,
            P.stock, P.estatus, C.nombre, PS.nombre as nombre_presentacion 
            FROM  producto AS P 
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
            ORDER BY P.id_producto ASC");

        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    public static function consulta_inner_join($fields, $inner_join) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM  producto AS P $inner_join");
        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id_producto = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_producto) AS id FROM producto"));
        $id_producto = $id_producto['id'];
        return $id_producto;
    }

    public static function registrar ($codigo, $id_categoria, $nombre_producto, $id_presentacion) {

        $registrar = modeloPrincipal::InsertSQL("producto", "id_categoria, codigo, nombre_producto, id_presentacion, precio_venta_dolar, stock, estatus" ,"$id_categoria, '$codigo', '$nombre_producto', $id_presentacion, 0, 0, 0");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el producto debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function validar_existe($campos,$condicion){
        // se comprueba que no exista un registro con los mismos datos
        $consult = modeloPrincipal::validacion_registro_existente($campos,"producto","id_producto = $condicion");

        if (!$consult) {
            alert_model::alert_register_exist();
            exit(); 
        }

    }

    public static function lista(){
        $consulta = self::obtener_todos_los_datos();
        // se guardan los datos en un array y se imprime
        
        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr class="<?php if($mostrar["stock"] == "0"){echo 'text-danger';}else if ($mostrar["stock"] < "5") { echo 'text-warning';} ?>">
                <td class="text-center"></td>
                <td class="text-center"><?= $mostrar["codigo"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre_producto"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre_presentacion"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre"]; ?></td>
                <td class="text-center"><?= $mostrar["precio_venta_dolar"].' $'; ?></td>
                <td class="text-center"><?= $mostrar["stock"]; ?></td>
            </tr>
        <?php } 
    }


    public static function options($estado = "") {
        if ($estado == "1") {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, PS.nombre,
                P.stock
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id WHERE P.estatus = 1 AND P.stock > 0");
        }else {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, PS.nombre,
                P.stock
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id");
        }
        // se guardan los datos en un array y se imprime
        
        while ( $mostrar = mysqli_fetch_array($consulta)) { 
            echo '<option value="'.$mostrar["id_producto"].'">
                    '.$mostrar["nombre_producto"].' '.$mostrar["nombre"].'
                </option>';
        }
    }

    public static function actualizar_estado($estado, $id_producto){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("producto", "estado = $estado", "id_producto = $id_producto")) {
            return false;
        }
        return true;
    }
}