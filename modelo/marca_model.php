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
        $registrar = modeloPrincipal::InsertSQL("marca", "nombre" ,"'$nombre_marca'");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el marca debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function validar_existe($nombre){
        // se comprueba que no exista un registro con los mismos datos
        $consult = modeloPrincipal::validacion_registro_existente('nombre',"marca","nombre = $nombre");
        if (!$consult) {
            alert_model::alert_register_exist();
            exit(); 
        }
    }

    public static function lista(){
        $consulta = self::consultar('*');
        while ( $mostrar = mysqli_fetch_assoc($consulta)) { ?>
            <tr>
                <td class="text-center"></td>
                <td class="text-center"><?= $mostrar["nombre"]; ?></td>
            </tr>
        <?php } 
    }

    public static function options() {
        $consulta = modeloPrincipal::consultar("SELECT * FROM marca");
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
            <option value="<?= $mostrar["id"]; ?>"> <?= $mostrar["nombre"]; ?> </option>
        <?php }
    }
}