<?php

class presentacion_model extends modeloPrincipal {

    public static function consultar_por_id($id_presentacion) {
        $consul = modeloPrincipal::consultar("SELECT PS.cantidad AS presentacion, PS.estado, R.nombre AS representacion
            FROM presentacion AS PS
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            WHERE PS.id = $id_presentacion");
        modeloPrincipal::verificar_consulta($consul,'presentacion'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id_presentacion = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id) AS id FROM presentacion"));
        $id_presentacion = $id_presentacion['id'];
        return $id_presentacion;
    }


    public static function registrar ($cantidad, $representacion) {

        $registrar = modeloPrincipal::InsertSQL("presentacion", "cantidad, id_representacion, estado" ,"'$cantidad', $representacion, 1");
        
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se Pudo registrar la presentación debido a un error interno, por favor verifique e intente nuevamente","error");
        }

        return $registrar;
    }
    


    public static function lista(){
        $consulta = modeloPrincipal::consultar("SELECT P.id, P.cantidad AS presentacion,
            R.nombre AS representacion, R.descripcion, P.estado
            FROM presentacion AS P 
            INNER JOIN representacion AS R ON R.id = P.id_representacion
            WHERE P.estado = 1
        ");
        


        // se guardan los datos en un array y se imprime
        $i = 1;
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="col text-center"><?= $i++ ?></td>
                <td class="col text-center"><?= $mostrar["presentacion"].' '.$mostrar["representacion"] ?></td>
                <td class="col text-center"><?= $mostrar["descripcion"]; ?></td>
                <?php if (rol_model::verificar_rol('m_presentacion') == '1') { ?>
                    <td scope="row" class="text-center">
                        <?php 
                            if ($mostrar["estado"] === "1") { ?>
                                <button class="btn btn-outline-success bi-check-circle" title="estado de la presentación"></button>
                            <?php } else { ?>
                                <form action="<?= (rol_model::verificar_rol('m_presentacion') == '1') ?  '../controlador/presentacion.php' : './gestion_productos.php' ?>" method="post" class="SendFormAjax" data-type-form="update_estate" >
                                    <input type="hidden" name="modulo" value="inactivo">          
                                    <input type="hidden" name="UID" value="<?= modeloPrincipal::encryptionId($mostrar["id"]); ?>">
                                    <button 
                                        class="btn btn-outline-danger bi-x-circle <?= (rol_model::verificar_rol('m_presentacion') == '1') ?  '' : 'disabled eraser' ?>" 
                                        title="estado de la presentación"
                                        type="submit"></button>
                                </form>
                            <?php }
                        ?>
                    </td>
                <?php } ?>
            </tr>
        <?php  } 
    }


    public static function options() {

        $consulta = modeloPrincipal::consultar("SELECT P.id, P.cantidad AS presentacion, R.nombre AS representacion
            FROM presentacion AS P 
            INNER JOIN representacion AS R ON R.id = P.id_representacion
            WHERE P.estado = 1
        ");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["presentacion"]; ?>"> <?= $mostrar["presentacion"]; ?> - <?= $mostrar["representacion"]; ?></option>
        <?php  } 
    }

    public static function optionsId() {

        $consulta = modeloPrincipal::consultar("SELECT P.id, P.cantidad AS presentacion, R.nombre AS representacion
            FROM presentacion AS P 
            INNER JOIN representacion AS R ON R.id = P.id_representacion
            WHERE P.estado = 1
        ");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= modeloPrincipal::encryptionId($mostrar["id"]); ?>"><?= $mostrar["presentacion"]; ?> - <?= $mostrar["representacion"]; ?></option>
        <?php  } 
    }

    public static function selectOptions() {

        $consulta = modeloPrincipal::consultar("SELECT id, nombre AS representacion FROM representacion");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= modeloPrincipal::encryptionId($mostrar["id"]); ?>"> <?= $mostrar["representacion"]; ?></option>
        <?php  } 
    }

    public static function actualizar_estado($estado, $id_presentacion){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("presentacion", "estado = $estado", "id = $id_presentacion")) {
            return false;
        }
        return true;
    }

}