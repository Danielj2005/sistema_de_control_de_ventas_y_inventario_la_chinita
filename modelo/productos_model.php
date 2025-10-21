<?php

class producto_model extends modeloPrincipal {

    public static function consultar_producto($fields) {
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
    public static function obtener_datos_recien_registrados($id_producto) {
        $Json = [
            'nombre' => [],
            'categoria' => [],
            'presentacion' => [],
            'marca' => []
        ];

        for ($i = 0; $i < count($id_producto); $i++) {
            $consul = modeloPrincipal::consultar("SELECT P.nombre_producto,
                C.nombre AS categoria, 
                PS.cantidad AS presentacion, R.nombre AS representacion,
                M.nombre AS marca
                FROM producto AS P
                INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
                INNER JOIN representacion AS R ON R.id = PS.id_representacion
                INNER JOIN marca AS M ON M.id = P.id_marca
                WHERE P.id_producto = " . $id_producto[$i]);

            if (mysqli_num_rows($consul) > 0) {
                $resultado = mysqli_fetch_array($consul);
                $Json['nombre'][] = $resultado['nombre_producto'];
                $Json['categoria'][] = $resultado['categoria'];
                $Json['presentacion'][] = $resultado['presentacion']." ".$resultado['representacion'];
                $Json['marca'][] = $resultado['marca'];
            }
        }
        return $Json;
    }


    public static function obtener_todos_los_datos(){
        $consul = modeloPrincipal::consultar("SELECT M.nombre as marca, 
            PS.cantidad AS presentacion, R.nombre AS representacion, P.stock_actual, P.precio_venta,
            P.id_producto, P.codigo, P.nombre_producto, C.nombre AS categoria, P.fecha_ultima_actualizacion,
            (SELECT MAX(dolar) FROM dolar) AS tasa
            FROM producto AS P
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            INNER JOIN marca AS M ON M.id = P.id_marca
            ORDER BY M.nombre ASC
        ");

        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id_producto = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_producto) AS id FROM producto"));
        $id_producto = $id_producto['id'];
        return $id_producto;
    }

    
    public static function registrar ($codigo, $id_categorias, $nombre_producto, $id_presentaciones, $id_marcas) {

        for ($i = 0; $i < count($nombre_producto); $i++) {

            $code = $codigo[$i];
            $nombre = ucwords(strtolower(modeloPrincipal::limpiar_cadena($nombre_producto[$i])));
            $categoria = modeloPrincipal::decryptionId($id_categorias[$i]);
            $presentacion = modeloPrincipal::decryptionId($id_presentaciones[$i]);
            $marca = modeloPrincipal::decryptionId($id_marcas[$i]);
            $fecha = date("Y-m-d H:i:s");

            $registrar = modeloPrincipal::InsertSQL("producto", "codigo, nombre_producto, id_marca, id_presentacion, id_categoria, stock_actual, fecha_ultima_actualizacion, estado" ,"$code, '$nombre', $marca, $presentacion, $categoria, 0, '$fecha', 0");
        }
        return $registrar;
    }

    public static function validar_existe($campos, $id_producto){
        // se comprueba que no exista un registro con los mismos datos
        $consult = modeloPrincipal::validacion_registro_existente($campos,"producto","id_producto = $id_producto");

        if (!$consult) {
            alert_model::alert_register_exist();
            exit(); 
        }

    }

    public static function verificar_producto_existe($code, $nombre_producto, $marcas, $presentaciones, $categorias){
        // se comprueba que no exista un producto con los mismos datos
        for ($i = 0; $i < count($nombre_producto); $i++) {
        
            $codigo = $code[$i];
            $nombre = strtolower($nombre_producto[$i]);
            $marca = modeloPrincipal::decryptionId($marcas[$i]);
            $presentacion = modeloPrincipal::decryptionId($presentaciones[$i]);
            $categoria = modeloPrincipal::decryptionId($categorias[$i]);

            $sql = modeloPrincipal::consultar("SELECT lower(P.nombre_producto) AS nombre_producto
                FROM producto AS P
                INNER JOIN marca AS M ON M.id = P.id_marca   
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
                INNER JOIN representacion AS R ON R.id = PS.id_representacion
                INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
                WHERE lower(P.nombre_producto) = 'Refresco'
                AND P.id_marca = $marca
                AND P.id_presentacion = $presentacion
                AND P.id_categoria = $categoria
                AND P.codigo = $codigo
                ");
                
            if (mysqli_num_rows($sql) > 0) {
                /********** No se puede registrar un usuario si ya existe **********/
                alert_model::alerta_simple("¡Ocurrio un error!","El producto ($nombre - $marca - $presentacion - $categoria) ya se encuentra en el sistema, verifica he intenta nuevamente.","error");
                exit();
            }
            // $nombre_producto[$i] = ucwords(strtolower($nombre_producto[$i]));
        }
        // return $nombre_producto;
    }


    // se valida el campo nombre del producto
    
    public static function validar_nombre_producto($nombre_producto) {
        for ($i = 0; $i < count($nombre_producto); $i++) {
            if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre_producto[$i])) {
                return alert_model::alerta_simple("¡Ocurrió un error!","El nombre del producto '".$nombre_producto[$i]."' no cumple con el formato establecido","error");
            }
        }
    }


    public static function lista(){
        $consulta = self::obtener_todos_los_datos();
        // se guardan los datos en un array y se imprime

        while ($mostrar = mysqli_fetch_assoc($consulta)) {
            
            ?>
            <tr class="text-center <?= $mostrar["stock_actual"] == "0" || $mostrar["stock_actual"] === null ? 'text-danger' : ($mostrar["stock_actual"] < "5" ? 'text-warning' : '') ?>">
                <td class="text-center"></td>
                <td class="text-center"><?= $mostrar["codigo"] ?></td>
                <td class="text-center"><?= $mostrar["nombre_producto"] ?></td>
                <td class="text-center"><?= $mostrar["presentacion"].' '.$mostrar["representacion"] ?></td>
                <td class="text-center"><?= $mostrar["marca"] ?></td>
                <td class="text-center"><?= $mostrar["categoria"] ?></td>
                <td class="text-center"><?= $mostrar["stock_actual"] == 0 ? 0 : $mostrar["stock_actual"]; ?></td>
                <th class="text-center"><?= $mostrar["precio_venta"] == 0 ? '0 $' : $mostrar["precio_venta"].' $' ; ?></th>
                <th class="text-center"><?= date("d-m-Y H:i:a", strtotime($mostrar["fecha_ultima_actualizacion"])) ; ?></th>
                <th class="text-center">
                    <button onclick="btn_show_modal('btn_modal', 'producto')" value="<?= $mostrar["id_producto"] ; ?>" data-bs-toggle="modal" data-bs-target="#modal" class="btn bi btn_modal bi-list btn-outline-info col col-auto"> </button>
                </th>
            </tr>
        <?php } 
    }

    public static function options($estado = "") {
        if ($estado == "1") {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto,
                PS.cantidad AS presentacion, R.nombre AS representacion,
                M.nombre as marca
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
                INNER JOIN representacion AS R ON R.id = PS.id_representacion
                INNER JOIN marca AS M ON M.id = P.id_marca
                WHERE P.estado = 1 AND P.stock_actual > 0 
                ORDER BY P.nombre_producto
            ");
        }else {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto,
                PS.cantidad AS presentacion, R.nombre AS representacion,
                M.nombre as marca
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
                INNER JOIN representacion AS R ON R.id = PS.id_representacion
                INNER JOIN marca AS M ON M.id = P.id_marca 
                ORDER BY P.nombre_producto
            ");
        }
        // se guardan los datos en un array y se imprime
        
        while ( $mostrar = mysqli_fetch_array($consulta)) { 
            echo '<option value="'.modeloPrincipal::encryptionId($mostrar["id_producto"]).'">
                    '.$mostrar["nombre_producto"].' '.$mostrar["marca"].' '.$mostrar["presentacion"].' '.$mostrar["representacion"].'
                </option>';
        }
    }

    public static function actualizar_estado($estado, $id_producto){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("inventario", "estado = $estado", "id_producto = $id_producto")) {
            return false;
        }
        return true;
    }

    public static function options_nombres_productos() {
        $consulta = modeloPrincipal::consultar("SELECT lower(nombre_producto) AS nombre_producto FROM producto GROUP BY nombre_producto");
        // se guardan los datos en un array y se imprime
        
        while ( $mostrar = mysqli_fetch_array($consulta)) {  ?>
            <option value="<?= ucwords(strtolower($mostrar["nombre_producto"])); ?>">
                <?= ucwords(strtolower($mostrar["nombre_producto"])); ?>
            </option>
        <?php }
    }
}
