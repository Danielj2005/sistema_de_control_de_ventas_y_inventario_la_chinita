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

                <td class="col text-center <?= $l_servicio == '1' ? '' : 'd-none eraser' ?>">
                    <button value="<?= $idSecure; ?>" modal="ver_detalles_servicio" <?= $l_servicio == '1' ? 'url="./modal/servicio/detalles.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="<?= $l_servicio == '1' ? 'btn_modal' : '' ?> btn bi bi-eye btn-info"></button>
                </td>

                <td class="col text-center <?= $m_servicio == '1' ? '' : 'd-none eraser' ?>">
                    <button value="<?= $idSecure; ?>" modal="modificar_servicio" <?= $m_servicio == '1' ? 'url="./modal/servicio/modificar_servicio.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="<?= $m_servicio == '1' ? 'btn_modal' : '' ?> btn bi bi-gear btn-warning"></button>
                </td>

                <td scope="row" class="text-center <?= $m_servicio == '1' ? '' : 'd-none eraser' ?> ">

                    <?php if ($mostrar["estatus"] === "1") { ?>

                            <button class="btn btn-success bi bi-check-circle" title="estado del servicio" type="submit">&nbsp; Activo </button>

                    <?php }else if ($mostrar["estatus"] === "0") { ?>
                        <form action="<?= $m_servicio == '1' ? '../controlador/menu_controlador.php' : './menu.php'?>" method="post" class="SendFormAjax" data-type-form="update_estate" >

                            <input type="hidden" name="modulo" value="inactivo">
                            <input type="hidden" name="UIS" value="<?= $idSecure; ?>">
                            <button class="btn btn-danger bi bi-x-circle" title="estado del servicio" type="submit">&nbsp; Inactivo </button>
                        
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php }
    }


    public static function options() {
        $consulta = self::consultar_condicional("id_menu, nombre_platillo, descripcion","estatus = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["id_menu"];?>"> <?= $mostrar["nombre_platillo"]; ?> ( <?= $mostrar["descripcion"]; ?> )</option>
        <?php  } 
    }

    public static function actualizar_estado($estado, $id_menu){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("menu", "estado = $estado", "id_menu = $id_menu")) {
            return false;
        }
        return true;
    }
}