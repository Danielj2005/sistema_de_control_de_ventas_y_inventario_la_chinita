<?php

class presentacion_model extends modeloPrincipal {

    public static function consultar_presentacion($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM presentacion");
        modeloPrincipal::verificar_consulta($consul,'presentacion'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional($fields, $condicion) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM presentacion WHERE $condicion");
        modeloPrincipal::verificar_consulta($consul,'presentacion'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_por_id($fields, $id_presentacion) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM presentacion WHERE id = $id_presentacion");
        modeloPrincipal::verificar_consulta($consul,'presentacion'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id_presentacion = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id) AS id FROM presentacion"));
        $id_presentacion = $id_presentacion['id'];
        return $id_presentacion;
    }

    public static function registrar ($nombre, $descripcion) {

        $registrar = modeloPrincipal::InsertSQL("presentacion", "nombre, descripcion, estado" ,"'$nombre', '$descripcion', 1");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar la presentación debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function verificar_existe_presentacion ($campos, $dato_a_buscar){
        // se comprueba que no exista un registro con los mismos datos
        for ($i = 0; $i < count($dato_a_buscar); $i++) {
            $nombre = strtolower($dato_a_buscar[$i]);
            if(mysqli_num_rows(self::consultar_condicional($campos,"$campos = '$nombre'")) < 1){
                /********** No se puede registrar un usuario si ya existe **********/
                return false;
            }
        }
        return true;
    }

    public static function lista(){
        $consulta = self::consultar("*");
        // se guardan los datos en un array y se imprime
        $i = 1;
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="col text-center"><?= $i++ ?></td>
                <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                <td class="col text-center"><?= $mostrar["descripcion"]; ?></td>
                <td scope="row" class="text-center">
                    <button
                        <?= (rol_model::verificar_rol('m_presentacion') == '1') ?  '' : 'disabled' ?>
                        class="btn <?= ($mostrar["estado"] === "1") ? 'btn-outline-success bi-check-circle' : 'btn-outline-danger bi-x-circle'?>"
                        title="estado de la presentación">
                            &nbsp; <?= ($mostrar["estado"] === "1") ? 'Activo' : 'Inactivo' ?>
                    </button>
                </td>
            </tr>
        <?php  } 
    }


    public static function options() {
        $consulta = self::consultar_condicional("id, nombre, descripcion","estado = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["nombre"];?>"> <?= $mostrar["nombre"]; ?> - <?= $mostrar["descripcion"]; ?></option>
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