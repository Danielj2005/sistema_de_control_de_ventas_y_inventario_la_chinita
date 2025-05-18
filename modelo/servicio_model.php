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
        $consulta = modeloPrincipal::consultar("SELECT * FROM menu ORDER BY id_menu DESC LIMIT 50");

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td class="col text-center"> </td>
                <td class="col text-center"><?= $mostrar["nombre_platillo"]; ?></td>
                <td class="col text-center"><?= $mostrar["precio_dolar"].'$'; ?></td>
                <td class="col text-center">
                    <button value="<?= $mostrar["id_menu"]; ?>" modal="ver_detalles_servicio" <?= rol_model::verificar_rol('l_servicio') == '1' ? 'url="./modal/servicio/detalles.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="<?= rol_model::verificar_rol('l_servicio') == '1' ? 'btn_modal' : '' ?> btn bi bi-eye btn-info"></button>
                </td>
                <td class="col text-center">
                    <button value="<?= $mostrar["id_menu"]; ?>" modal="modificar_servicio" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'url="./modal/servicio/modificar_servicio.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="<?= rol_model::verificar_rol('m_servicio') == '1' ? 'btn_modal' : '' ?> btn bi bi-gear btn-warning"></button>
                </td>
                <td scope="row" class="text-center">
                    <form action="<?= rol_model::verificar_rol('m_servicio') == '1' ? '../controlador/cambio_estado.php' : './menu.php'?>" method="post" class="SendFormAjax" data-type-form="updateEstado" >
                        
                        <?php if ($mostrar["estatus"] === "1") { ?>

                            <input type="hidden" name="modulo" value="activo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id_menu" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-success" title="estado del servicio" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'type="submit"' : 'disabled' ?> >Activo </button>
                        
                        <?php }else if ($mostrar["estatus"] === "0") { ?>

                            <input type="hidden" name="modulo" value="inactivo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id_menu" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-danger" title="estado del servicio" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'type="submit"' : 'disabled' ?> >Inactivo </button>
                        
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php }
    }


    public static function options() {
        $consulta = self::consultar_condicional("id_menu, nombre, descripcion","estado = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["id_menu"];?>"> <?= $mostrar["nombre"]; ?> - <?= $mostrar["descripcion"]; ?></option>
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