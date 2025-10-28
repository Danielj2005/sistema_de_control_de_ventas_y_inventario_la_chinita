<?php

class servicio_model extends modeloPrincipal {

    public static function consultar($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM menu");
        modeloPrincipal::verificar_consulta($consul,'menu'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional($fields, $condicion) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM menu WHERE $condicion");
        modeloPrincipal::verificar_consulta($consul,'menu'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_por_id($fields, $id_menu) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM menu WHERE id_menu = $id_menu");
        modeloPrincipal::verificar_consulta($consul,'menu'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    
    // funcion para obtener el id_menu de un categoria
    public static function obtener_id_menu_recien_registrada(){
        $id_menu = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_menu) AS id_menu FROM menu"));
        $id_menu = $id_menu['id_menu'];
        return $id_menu;
    }

    public static function registrar ($nombre_platillo, $precio_dolar, $descripcion) {

        $registrar = modeloPrincipal::InsertSQL( "menu","nombre_platillo, precio_dolar, descripcion, estatus","'$nombre_platillo','$precio_dolar','$descripcion','1'");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar la presentación debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }


    public static function lista(){
        $consulta = modeloPrincipal::consultar("SELECT * FROM menu ORDER BY id_menu DESC");

        $l_servicio = rol_model::verificar_rol('l_servicio');
        $m_servicio = rol_model::verificar_rol('m_servicio');

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { 
            $idSecure = modeloPrincipal::encryptionId($mostrar["id_menu"]); ?>
            <tr>
                <td class="col text-center"> </td>
                <td class="col text-center"><?= $mostrar["nombre_platillo"]; ?></td>
                <td class="col text-center"><?= $mostrar["precio_dolar"].'$'; ?></td>

                <?php if ($l_servicio == '1') { ?>
                    <td class="col text-center">
                        <button value="<?= $idSecure; ?>" modal="servicioDetalles" data-bs-toggle="modal" data-bs-target="#modal" class="btn_modal btn btn-info">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                <?php } ?>

                <?php if ($m_servicio == '1') { ?>
                    <td class="col text-center">
                        <button value="<?= $idSecure; ?>" modal="servicioModificar" data-bs-toggle="modal" data-bs-target="#modal" class="btn_modal btn btn-warning">
                            <i class="<?= ICONO_MODIFICAR ?>"></i>
                        </button>
                    </td>
    
                    <td scope="row" class="text-center">
    
                        <?php if ($mostrar["estatus"] === "1") { ?>
    
                                <button disabled class="btn btn-success bi bi-check-circle" title="estado del servicio" type="submit">&nbsp; Activo </button>
    
                        <?php }else if ($mostrar["estatus"] === "0") { ?>
                            <form action="../controlador/servicio_controlador.php" method="post" class="SendFormAjax" data-type-form="update_estate" >
    
                                <input type="hidden" name="modulo" value="inactivo">
                                <input type="hidden" name="UIS" value="<?= $idSecure; ?>">
                                <button class="btn btn-danger bi bi-x-circle" title="estado del servicio" type="submit">&nbsp; Inactivo </button>
                            
                            </form>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        <?php }
    }

    public static function options() {
        $consulta = self::consultar_condicional("id_menu, nombre_platillo, descripcion","estatus = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= modeloPrincipal::encryptionId($mostrar["id_menu"]); ?>"> <?= $mostrar["nombre_platillo"]; ?> ( <?= $mostrar["descripcion"]; ?> )</option>
        <?php  } 
    }

    public static function actualizar_estado($estado, $id_menu){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("menu", "estado = $estado", "id_menu = $id_menu")) {
            return false;
        }
        return true;
    }

    // funcion para actualizar solo un producto dentro de un servicio
    
    public static function actualizar_detalles_servicio($id_productos, $cantidad_productos, $id_detalles_menu){
        try {

            $actualizar = modeloPrincipal::UpdateSQL("detalles_menu","id_producto = $id_productos, cantidad = $cantidad_productos","id_detalles_menu = $id_detalles_menu");

            if (!$actualizar) {
                alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el/los producto(s) de un servicio.","error");
            }

        } catch (Exception $e) {
            alert_model::alerta_simple("Ocurrido un error!", "No se pudo modificar el/los producto(s) de un servicio debido a un error de consulta.", "error");
            exit();
        }
    }

    // funcion para registrar varios productos dentro de un servicio
    
    public static function registrar_detalles_servicio($id_productos, $cantidad_productos, $id_servicio){
        try {

            $registrar = modeloPrincipal::InsertSQL("detalles_menu","id_producto, cantidad, id_menu","".modeloPrincipal::decryptionId($id_productos).", $cantidad_productos, $id_servicio");

            if (!$registrar) {
                alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el/los producto(s) de un servicio.","error");
            }

        } catch (Exception $e) {
            alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar los productos de un servicio debido a un error con la base de datos.", "error");
            exit();
        }
    }

    // funcion para si ya existe un producto dentro de un servicio
    
    public static function no_existe_detalles_servicio($id_producto, $id_servicio){
        $consulta = modeloPrincipal::consultar("SELECT id_producto FROM detalles_menu WHERE id_producto = $id_producto AND id_menu = $id_servicio");
        if(mysqli_num_rows($consulta) > 0){
            return false;
        }else{
            return true;
        }
    }



    /*******************************************************************/ 
    /*     Funciones dedicadas a resolver peticiones del usuario       */
    /*******************************************************************/ 

    // funcion para agregar un servicio a la lista de venta 
    
    public static function añadir_servico_a_venta ($id) {
        $id_servicio = modeloPrincipal::limpiar_cadena($id);

        $con = modeloPrincipal::consultar("SELECT M.*, 
            (SELECT ROUND(MAX(dolar) * M.precio_dolar, 2 ) FROM dolar) AS precio_bs 
            FROM menu AS M
            WHERE M.id_menu = $id_servicio");

        // se guardan los datos en un array y se imprime

        while ($mostrar = mysqli_fetch_array($con)) { ?>
            <tr id="tr_add_servicio_<?= modeloPrincipal::encryptionId($mostrar["id_menu"]) ?>" >
                <input type="hidden" name="UIDS[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_menu"]) ?>" required>
                <td class="col text-center" scope="col">
                    <p class="text-primary fs-6"><?= $mostrar["nombre_platillo"]; ?></p>
                </td> 

                <td class="col text-center" scope="col"><?= $mostrar["descripcion"] ?> </td>

                <td class="col text-center" scope="col">
                    <input type="text" class="form-control cantidad" name="cantidad_servicio[]" onblur="monto_total_productos();" placeholder="ingresa la cantidad a vender" id="cantidad_servicio<?= $mostrar['id_producto'] ?>" required>
                </td>

                <td class="col text-center" scope="col">
                    <input type="text" readonly class="bg-dark-subtle form-control precio_dolar" name="precio_servicio_dolar[]" id="precio_dolar<?= $mostrar['id_menu'] ?>" value="<?= $mostrar["precio_dolar"] ?>" required>
                </td>

                <td class="col text-center" scope="col">
                    <input type="text" readonly class="bg-dark-subtle form-control precio_bs" name="precio_servicio_bolivar[]" id="precio_bs<?= $mostrar['id_menu'] ?>" value="<?= $mostrar["precio_bs"] ?>" required>
                </td>
                
                <td class="text-center col" scope="col">
                    <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_add_servicio_<?= modeloPrincipal::encryptionId($mostrar['id_menu']) ?>')"></button>
                </td>
            </tr>
        <?php
        }
    }
}