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
                PS.nombre AS nombre_presentacion,
                M.nombre AS marca
                FROM producto AS P
                INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
                INNER JOIN marca AS M ON M.id = P.id_marca
                WHERE P.id_producto = " . $id_producto[$i]);

            if (mysqli_num_rows($consul) > 0) {
                $resultado = mysqli_fetch_array($consul);
                $Json['nombre'][] = $resultado['nombre_producto'];
                $Json['categoria'][] = $resultado['categoria'];
                $Json['presentacion'][] = $resultado['nombre_presentacion'];
                $Json['marca'][] = $resultado['marca'];
            }
        }
        return $Json;
    }


    public static function obtener_todos_los_datos(){
        $consul = modeloPrincipal::consultar("SELECT M.nombre as marca, 
            PS.nombre as presentacion,
            (SELECT stock_actual FROM inventario WHERE inventario.id_producto = P.id_producto) AS stock_actual,
            (SELECT Round(precio_venta, 2) FROM inventario WHERE inventario.id_producto = P.id_producto) AS precio_venta,
            (SELECT MAX(dolar) from dolar) AS tasa
            FROM  producto AS P
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
            INNER JOIN marca AS M ON M.id = P.id_marca
            ORDER BY M.nombre ASC");

        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    public static function consulta_inner_join($fields, $inner_join) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM producto AS P $inner_join");
        modeloPrincipal::verificar_consulta($consul,'producto'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id_producto = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_producto) AS id FROM producto"));
        $id_producto = $id_producto['id'];
        return $id_producto;
    }

    
    public static function registrar ($id_categorias, $nombre_producto, $id_presentaciones, $id_marcas) {
        for ($i = 0; $i < count($nombre_producto); $i++) {
            
            $nombre = $nombre_producto[$i];
            $id_categoria = $id_categorias[$i];
            $id_presentacion = $id_presentaciones[$i];
            $id_marca = $id_marcas[$i];

            $registrar = modeloPrincipal::InsertSQL("producto", "id_categoria, nombre_producto, id_presentacion, id_marca" ,"$id_categoria, '$nombre', $id_presentacion, $id_marca");
            if (!$registrar) {
                alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el producto debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
            }
        }
        return $registrar;
    }

    public static function validar_existe($campos,$id_producto){
        // se comprueba que no exista un registro con los mismos datos
        $consult = modeloPrincipal::validacion_registro_existente($campos,"producto","id_producto = $id_producto");

        if (!$consult) {
            alert_model::alert_register_exist();
            exit(); 
        }

    }

    public static function verificar_producto_existe($nombre_producto, $marcas, $presentaciones, $categorias){
        // se comprueba que no exista un producto con los mismos datos
        for ($i = 0; $i < count($nombre_producto); $i++) {
        
            $nombre = strtolower($nombre_producto[$i]);
            $marca = strtolower($marcas[$i]);
            $presentacion = strtolower($presentaciones[$i]);
            $categoria = strtolower($categorias[$i]);

            $sql = modeloPrincipal::consultar("SELECT lower(P.nombre_producto) AS nombre_producto
                FROM producto AS P
                INNER JOIN marca AS M ON M.id = P.id_marca   
                INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
                INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
                WHERE lower(P.nombre_producto) = '$nombre'
                AND lower(M.nombre) = '$marca' AND lower(PS.nombre) = '$presentacion' AND lower(C.nombre) = '$categoria'");
                
            if (mysqli_num_rows($sql) > 0) {
                /********** No se puede registrar un usuario si ya existe **********/
                alert_model::alerta_simple("¡Ocurrio un error!","El producto ($nombre - $marca - $presentacion - $categoria) ya se encuentra en el sistema, verifica he intenta nuevamente.","error");
                exit();
            }
            $nombre_producto[$i] = ucwords(strtolower($nombre_producto[$i]));
        }
        return $nombre_producto;
    }


    // se valida el campo nombre del producto
    public static function validar_nombre_producto($nombre_producto) {
        for ($i = 0; $i < count($nombre_producto); $i++) {
            if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre_producto[$i])) {
                return alert_model::alert_of_format_wrong("'nombre'");
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
                <td class="text-center"><?= $mostrar["marca"].' '.$mostrar["presentacion"] ?></td>
                <td class="text-center"><?= $mostrar["stock_actual"] == 0 ? 0 : $mostrar["stock_actual"]; ?></td>
                <th class="text-center"><?= $mostrar["precio_venta"] == 0 ? '0.$' : $mostrar["precio_venta"].' $' ; ?></th>
            </tr>
        <?php } 
    }


    public static function options($estado = "") {
        if ($estado == "1") {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto,
                PS.nombre AS presentacion,
                M.nombre as marca
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
                INNER JOIN inventario AS I ON I.id_producto = P.id_producto 
                INNER JOIN marca AS M ON M.id = P.id_marca
                WHERE I.estado = 1 AND I.stock_actual > 0");
        }else {
            $consulta = modeloPrincipal::consultar("SELECT P.id_producto,
                PS.nombre AS presentacion,
                M.nombre as marca
                FROM producto AS P 
                INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id
                INNER JOIN marca AS M ON M.id = P.id_marca");
        }
        // se guardan los datos en un array y se imprime
        
        while ( $mostrar = mysqli_fetch_array($consulta)) { 
            echo '<option value="'.modeloPrincipal::encryption($mostrar["id_producto"]).'">
                    '.$mostrar["marca"].' '.$mostrar["presentacion"].'
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
