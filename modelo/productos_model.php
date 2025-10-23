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
                <th class="text-center"><?= date("d-m-Y H:i:a", strtotime($mostrar["fecha_ultima_actualizacion"])); ?></th>
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

    //  funcion para asignar el color a un producto en una lista segun su stock actual
    public static function asignar_color_segun_stock($stock) {
    
        if ($stock == "0") { return 'text-danger';

        } elseif ($stock < "5" && $stock > "0") { return 'text-warning';

        } else { return 'text-success'; }
    }

    
    /*******************************************************************/ 
    /*     Funciones dedicadas a resolver peticiones del usuario       */
    /*******************************************************************/ 

    // funcion para agregar un producto a la lista de compras (entradas)

    public static function productos_compra_a_proveedores ($id) {
        $id_producto = modeloPrincipal::limpiar_cadena($id);

        $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.codigo, P.nombre_producto, P.stock_actual,
            PS.cantidad AS presentacion, R.nombre AS representacion,
            M.nombre AS marca,
            C.nombre AS categoria
            FROM producto AS P 
            INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            INNER JOIN marca AS M ON M.id = P.id_marca
            INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria
            WHERE P.id_producto = $id_producto");

                
        while ( $mostrar = mysqli_fetch_array($consulta)) { 
                
            $color_stock = self::asignar_color_segun_stock($mostrar["stock_actual"]);  
            ?>

                <tr id="tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>" >
                    <td class="col text-start " scope="col">
                        <p class="text-secondary fw-bold mb-1">
                            Código: <?= $mostrar["codigo"] ?>
                        </p>
                        <p class="text-primary fw-bold mb-1">
                            <?= $mostrar["nombre_producto"] . ' - ' . $mostrar["marca"] ?>
                        </p>
                        <small class="d-block text-muted">
                            Formato: <?= $mostrar["presentacion"] . ' / ' . $mostrar["representacion"] ?>
                        </small>
                        <p class="fst-italic mb-0 <?= $color_stock ?>">
                            Stock actual: <?= $mostrar["stock_actual"] ?> unidades
                        </p>
                        
                        <input type="hidden" name="id_producto[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_producto"]); ?>" required>
                    </td>
                    <td class="col text-center" scope="col">
                        <input type="text" minlength="1" maxlength="200" class="form-control cantidad" name="cantidad[]" onchange="calcular_total();" placeholder="ingresa la cantidad a ingresar" id="cantidad_<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
                    </td>
                    <td class="col text-center" scope="col">
                        <input type="text" maxlength="8" class="form-control precio_unidad_dolar" onchange="convertir_usd_a_bs('<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>'); calcular_total();" name="precio_unidad_dolar[]" placeholder="ingresa el Precio por unidad en $" id="precio_unidad_dolar_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>" required>
                    </td>
                    <td class="col text-center" scope="col">
                        <input type="text" minlength="1" maxlength="100" readonly class="bg-secondary-subtle form-control precio_unidad_bs" name="precio_unidad_bs[]" placeholder="ingresa el costo unitario (Bs.)" id="precio_unidad_bs_<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
                    </td>
                    <td class="col text-center" scope="col">
                        <div class="col-md-4 input-group">
                            <input type="text" minlength="1" maxlength="100" readonly class="bg-secondary-subtle input form-control" name="precio_venta_dolar[]" placeholder="ingresa el Precio de venta ($)" id="precio_venta_dolar_<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
                        </div>
                    </td>
                    <td class="text-center col" scope="col">
                        <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>')"></button>
                    </td>
                </tr>

            <?php
        }
    }

    // funcion para agregar un producto a la lista de servicios
    
    public static function añadir_productos_a_servico ($id) {
        $id_producto = modeloPrincipal::limpiar_cadena($id);

        $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.codigo, P.nombre_producto AS producto, 
            P.stock_actual AS stock,
            PS.cantidad AS presentacion, R.nombre AS representacion,
            M.nombre AS marca,
            C.nombre AS categoria
            FROM producto AS P 
            INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria
            INNER JOIN marca AS M ON P.id_marca = M.id
            WHERE P.id_producto = $id_producto");
        // se guardan los datos en un array y se imprime

        while ( $mostrar = mysqli_fetch_array($consulta)) { 

            $color_stock = self::asignar_color_segun_stock($mostrar["stock"]);  
            ?>

                <tr id="tr_producto_<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" >
                    <td class="col text-start" scope="col">
                        <p class="text-secondary fw-bold mb-1">
                            Código: <?= $mostrar["codigo"] ?>
                        </p>
                        <p class="text-primary fw-bold mb-1">
                            <?= $mostrar["producto"] . ' - ' . $mostrar["marca"] ?>
                        </p>
                        <small class="d-block text-muted">
                            Formato: <?= $mostrar["presentacion"] . ' / ' . $mostrar["representacion"] ?>
                        </small>
                        <small class="d-block text-muted">
                            Categoría: <?= $mostrar["categoria"]?>
                        </small>
                        <p class="fst-italic mb-0 <?= $color_stock ?>">
                            Stock actual: <?= $mostrar["stock"] ?> unidades
                        </p>
                        <input type="hidden" name="id_producto[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
                    </td>
                    <td class="col text-center" scope="col">
                        <input 
                            type="number" 
                            class="form-control cantidad text-center" 
                            name="cantidad[]" 
                            placeholder="0" 
                            min="1" 
                            min="100"
                            step="1"
                            title="Ingrese la cantidad de unidades que están ingresando al almacén."
                            id="cantidad_<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" 
                            required
                        >    
                    </td>
                    
                    <td class="text-center col" scope="col">
                        <button 
                            type="button" 
                            class="btn btn-sm btn-danger bi bi-trash3-fill" 
                            title="Quitar este artículo de la recepción"
                            onclick="quitar_elemento('tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>')"
                        >
                        </button>
                    </td>
                </tr>
            <?php
        }
    }

    //  funcion para añadir un producto a la venta
    public static function añadir_productos_a_venta ($id) {
        $id_producto = modeloPrincipal::limpiar_cadena($id);

        $consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, 
            PS.cantidad AS presentacion, R.nombre AS representacion,
            P.stock_actual, P.precio_venta, 
            C.nombre AS nombre_categoria, 
            M.nombre as marca,
            round((SELECT MAX(dolar) FROM dolar) * P.precio_venta, 2) AS precio_bs
            FROM producto AS P 
            INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            INNER JOIN marca AS M ON M.id = P.id_marca
            INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria 
            WHERE P.id_producto = $id_producto");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { 

            $color_stock = self::asignar_color_segun_stock($mostrar["stock_actual"]);  

            ?>
                <tr id="tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>" >
                    <input type="hidden" name="id_producto[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
                    <input type="text" name="id_producto[]" value="" required>
                    <td class="col text-center col-md-2" scope="col">
                        <p class="text-primary"><?= $mostrar['nombre_producto'].' '.$mostrar['marca'].' <br> '.$mostrar['presentacion'] ?> <br> </p>
                    </td>

                    <td class="col text-center col-md-2" scope="col">
                        <span class="<?= $color_stock ?>"><?= $mostrar["stock_actual"] ?></span>
                    </td>

                    <td class="col text-center col-md-2" scope="col">
                        <input type="text" class="form-control cantidad" name="cantidad[]" placeholder="ingresa la cantidad a vender" id="cantidad<?= $mostrar['id_producto'] ?>" onblur="monto_total_productos();" required>
                    </td>

                    <td class="col text-center col-md-2" scope="col">
                        <input type="text" readonly class="bg-dark-subtle form-control precio_dolar" name="precio_producto_dolar[]" id="precio_dolar<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_venta"] ?>" required>
                    </td>

                    <td class="col text-center col-md-2" scope="col">
                        <input type="text" readonly class="bg-dark-subtle form-control precio_bs" name="precio_producto_bolivar[]" id="precio_bs<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_bs"] ?>" required>
                    </td>
                    
                    <td class="text-center col" scope="col">
                        <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>')"></button>
                    </td>
                </tr>
            <?php
        }
    }

    // funcion para añadir productos a una entrada (compra)
    public static function añadir_productos_entrada ($id) {
        
        $rand = rand(10000,50000);
        ?>

        <tr id="producto_<?= $rand ?>">
            <td class="text-center">
                <div class="col-12 mb-3 input-group">
                    <button type="button" id="startButton" class="bi-qr-code-scan input-group-text"></button>
                    <input type="text" class="form-control" name="code[]" id="code<?= $rand ?>" placeholder="Escribe el código del producto" autocomplete="off">
                </div>
            </td>
            <td class="text-center">
                <div class="col-12 mb-3">
                    <input type="text" class="form-control mb-3" list="Nombre_dataList_<?= $rand ?>" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre" autocomplete="off">

                    <datalist id="Nombre_dataList_<?= $rand ?>">
                        <?php self::options_nombres_productos(); ?> 
                    </datalist>
                </div>
            </td>
            <td class="text-center">
                <div class="col-12 mb-3">
                    <select class="form-select mb-3" name="marcas[]" id="marca_<?= $rand ?>">
                        <option selected disabled>Selecciona una opción</option>
                        <?php marca_model::optionsId(); ?> 
                    </select>
                </div>
            </td>
            <td class="text-center">
                <div class="col-12 mb-3">
                    <select class="form-select mb-3" name="presentacion[]" id="presentacion<?= $rand ?>">
                        <option selected disabled>Selecciona una opción</option>
                        <?php presentacion_model::optionsId(); ?>
                    </select>
                </div>
            </td>
            <td class="text-center">
                <div class="col-12 mb-3">
                    <select class="form-select mb-3" name="categoria[]" id="categoria<?= $rand ?>">
                        <option selected disabled>Selecciona una opción</option>
                        <?php category_model::optionsId(); ?>
                    </select>
                </div>
            </td>

            <td class="text-center">
                <button type="button" onclick="document.getElementById(`producto_<?= $rand ?>`).remove();" class="btn btn-outline-danger bi bi-trash"></button>
            </td>
        </tr>
    <?php 
    }

}
