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
        $nombre_marca = ucwords(strtolower(modeloPrincipal::limpiar_cadena($nombre_marca)));
        $registrar = modeloPrincipal::InsertSQL("marca", "nombre, estado" ,"'$nombre_marca', 1");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el marca debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function verificar_existe_marca($nombres){
        $nombres = modeloPrincipal::format_array_of_data_with_dublicated($nombres);
        // se comprueba que no exista un registro con los mismos datos
        for ($i = 0; $i < count($nombres); $i++) {
            
            $nombre = strtolower($nombres[$i]);
            $registrados = 0;
            if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM marca WHERE lower(nombre) = '$nombre'")) < 1){
                self::registrar($nombre);
                
                $registrados++;
            }
        }
        marca_model::bitacora($registrados);
        // return $registrados;
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



    public static function bitacora($CM) {
        try {
            $ids_marcas = self::obtener_array_id_marca_recien_registrado($CM);

            for ($i = 0; $i < count($ids_marcas); $i++) { 
                $datos_originales = self::consultar_por_id($ids_marcas[$i]);
                $datos_originales = mysqli_fetch_array($datos_originales);
                
                $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

                bitacora::bitacora("Registro exitoso de una Marca.","Se registro una Marca con la siguiente informacón: <br><br>
                <b>****** Información de la Marca:   ******</b><br><br>
                Nombre: <b>".$datos_originales['nombre']." </b><br>
                Estado: <b>".$datos_originales['estado']." </b><br>
                ");
            }
        } catch (Exception $e) {
            alert_model::alerta_simple("Ocurrio un error!","No se pudo registrar la marca debido a un error interno.","error");
            exit();
        }
    }

    
    public static function obtener_array_id_marca_recien_registrado($CM) {
        $id_max = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id) AS id FROM marca"))['id'];

        $idSearch = intval($id_max) - intval($CM);
        
        $dataFind = [];

        $i = 0;
        for ( $idSearch += 1;  $idSearch <= $id_max; $idSearch++ ) {
            $dataFind[$i++] .= $idSearch;
        }
        $dataFind = array_values(array_unique($dataFind));

        return $dataFind;
    }


    
    public static function obtener_array_id_marcas($NM):array {
        // $NM es un array con los Nombres de las Marcas = NM
        
        $dataFind = [];

        for ( $i = 0;  $i < count($NM); $i++ ) {

            $dataFind[$i] = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id FROM marca WHERE nombre = '".$NM[$i]."'"))['id'];
        }

        $dataFind = array_values($dataFind);

        return $dataFind;
    }

}