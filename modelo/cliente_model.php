<?php 


class cliente_model extends modeloPrincipal {

    /********************************************************************************************************/ 
    /*********************************     CRUD de Clientes         *****************************************/
    /********************************************************************************************************/ 
    
    /***************************************************************/
    /******* funciones para consultar datos de los Clientes ********/
    /***************************************************************/

    public static function consultar_cliente($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM cliente");
        modeloPrincipal::verificar_consulta($consul,'cliente'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional_cliente($fields, $condition) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM cliente WHERE $condition");
        modeloPrincipal::verificar_consulta($consul,'cliente'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    public static function lista_clientes_registrados () {

        // se consultan los cliente de la base de datos
        $consulta = self::consultar_cliente("id_cliente, cedula, nombre, telefono");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="text-center col"> </td>
                <td class="text-center col"><?= $mostrar["cedula"]; ?></td>
                <td class="text-center col"><?= $mostrar["nombre"]; ?></td>
                <td class="text-center col"><?= $mostrar["telefono"]; ?></td>

                <td scope='col' class="text-center col">
                    <button value="<?= $mostrar["id_cliente"]; ?>" modal="modificar_cliente" <?= rol_model::verificar_rol('m_cliente') == '1' ? 'url="./modal/modificar_cliente.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn bi bi-gear btn-warning" ></button>
                </td>
                <td scope='col' class="text-center col">
                    <button modal="ver_cliente" class="btn_modal btn btn-info bi bi-eye detalles_generales" value="<?= $mostrar["id_cliente"]; ?>" <?= rol_model::verificar_rol('h_cliente') == '1' ?  'url="./modal/historial_clientes.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> ></button>
                </td> 
            </tr>
        <?php }

    }

    
}