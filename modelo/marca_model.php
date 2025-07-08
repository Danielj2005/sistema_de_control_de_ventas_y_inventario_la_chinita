<?php
class marca_model extends modeloPrincipal {

    public static function consultar_marca() {
        $consul = modeloPrincipal::consultar("SELECT * FROM marca");
        modeloPrincipal::verificar_consulta($consul,'marca'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional($condicion) {
        $consul = modeloPrincipal::consultar("SELECT * FROM marca WHERE $condicion");
        modeloPrincipal::verificar_consulta($consul,'marca'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_por_id($id) {
        $consul = modeloPrincipal::consultar("SELECT * FROM marca WHERE id = $id");
        modeloPrincipal::verificar_consulta($consul,'marca'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    // funcion para obtener el id de un categoria
    public static function obtener_datos_recien_registrados($id){
        $consul = modeloPrincipal::consultar("SELECT * FROM marca WHERE id = $id");
        modeloPrincipal::verificar_consulta($consul,'marca'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function obtener_todos_los_datos(){
        $consul = modeloPrincipal::consultar("SELECT * FROM marca ORDER BY id ASC");
        modeloPrincipal::verificar_consulta($consul,'marca'); // se verifica si la consulta fue exitosa
        return $consul;
    }
    
    // funcion para obtener el id de un categoria
    public static function obtener_id_recien_registrada(){
        $id = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id) AS id FROM marca"));
        $id = $id['id'];
        return $id;
    }

    public static function registrar ($nombre_marca) {
        $registrar = modeloPrincipal::InsertSQL("marca", "nombre, estado" ,"'$nombre_marca', 1");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el marca debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function registrar_array_marcas ($nombres_marcas) {
        for ($i = 0; $i < count($nombres_marcas); $i++) {
            // se registra cada marca del array
            $nombre_marca = $nombres_marcas[$i];
            $registrar = modeloPrincipal::InsertSQL("marca", "nombre" ,"'$nombre_marca'");
            if (!$registrar) {
                alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el marca debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
            }
        }
        return $registrar;
    }


    public static function verificar_existe_marca($nombres){
        // se comprueba que no exista un registro con los mismos datos
        for ($i = 0; $i < count($nombres); $i++) {
            $nombre = strtolower($nombres[$i]);
            if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM marca WHERE nombre = '$nombre'")) < 1){
                /********** No se puede registrar un usuario si ya existe **********/
                return false;
            }
        }
        return true;
    }

    public static function verificar_existe_marca_unica($nombre){
        // se comprueba que no exista un registro con los mismos datos
        modeloPrincipal::validacion_registro_existente('nombre',"marca","nombre = '$nombre'");
    }

    public static function lista(){
        $consulta = self::consultar_marca();
        while ( $mostrar = mysqli_fetch_assoc($consulta)) { ?>
            <tr>
                <td class="col text-center"></td>
                <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                <td class="col text-center">
                    <button <?php //(rol_model::verificar_rol('m_categoria') == '1') ?  '' : 'disabled' ?> 
                        class="btn <?= ($mostrar["estado"] === "1") ? 'btn-outline-success bi-check-circle' : 'btn-outline-danger bi-x-circle'?>" 
                        title="estado de la categoría">
                            &nbsp; <?= ($mostrar["estado"] === "1") ? 'Activo' : 'Inactivo' ?> 
                    </button>
                </td>
            </tr>
        <?php } 
    }

    public static function options() {
        $consulta = modeloPrincipal::consultar("SELECT nombre FROM marca");
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
            <option value="<?= $mostrar["nombre"]; ?>"> <?= $mostrar["nombre"]; ?> </option>
        <?php }
    }
}