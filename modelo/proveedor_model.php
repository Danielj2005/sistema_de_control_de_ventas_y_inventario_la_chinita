<?php

class proveedor_model extends modeloPrincipal {
    
    /********************************************************************************************************/ 
    /*********************************     CRUD de proveedores         *****************************************/
    /********************************************************************************************************/ 
    
    /***************************************************************/
    /******* funciones para consultar datos de los proveedores ********/
    /***************************************************************/

    public static function consultar($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM proveedor");
        modeloPrincipal::verificar_consulta($consul,'proveedor'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_proveedor_por_id($fields, $id_proveedor) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM proveedor WHERE id_proveedor = $id_proveedor");
        modeloPrincipal::verificar_consulta($consul,'proveedor'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    
    
    // funcion para obtener el id de un proveedor

    public static function obtener_id_proveedor_recien_registrado(){
        $id_proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_proveedor) AS id FROM proveedor"));
        $id_proveedor = $id_proveedor['id'];
        return $id_proveedor;
    }


    public static function registrar_proveedor ($cedula, $nombre, $correo, $telefono, $direccion) {

        $registrar = modeloPrincipal::InsertSQL("proveedor","cedula_rif, nombre, correo, direccion, telefono","'$cedula','$nombre','$correo','$direccion','$telefono'");
    
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el proveedor debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }
    
    
    public static function actualizar_proveedor ($cedula, $nombre, $correo, $telefono, $direccion, $id_proveedor_modificar) {

        $actualizar = modeloPrincipal::UpdateSQL( "proveedor","cedula_rif = '$cedula', nombre = '$nombre', correo = '$correo', telefono = '$telefono', direccion = '$direccion'","id_proveedor = '$id_proveedor_modificar'");
    
        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el proveedor debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $actualizar;
    }
    
    
    public static function lista_proveedores_registrados () {
    
        $consulta = modeloPrincipal::consultar("SELECT * FROM proveedor");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="col text-center"></td>
                <td class="col text-center"><?= $mostrar["cedula_rif"]; ?></td>
                <td class="col text-center"><?= $mostrar["nombre"]; ?></td>

                <td class="col text-center">
                    <button modal="ver_detalles_proveedor" type="submit" value="<?= $mostrar["id_proveedor"]; ?>" <?= rol_model::verificar_rol('l_proveedores') == '1' ?  'url="./modal/proveedor/detalles.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn btn-info bi bi-eye"></button>
                </td>

                <td class="col text-center">
                    <button modal="modificar_proveedor" value="<?= $mostrar["id_proveedor"]; ?>" type="submit" <?= rol_model::verificar_rol('m_proveedores') == '1' ?  'url="./modal/proveedor/modificar.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn btn-warning bi bi-gear"></button>
                </td>

                <td class="col text-center">
                    <button modal="ver_historial_proveedor" value="<?= $mostrar["id_proveedor"]; ?>" <?= rol_model::verificar_rol('h_proveedores') == '1' ?  'url="./modal/proveedor/historial.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn btn-info bi bi-eye "></button>
                </td> 
            </tr>
        <?php } 
    }
    
    
}