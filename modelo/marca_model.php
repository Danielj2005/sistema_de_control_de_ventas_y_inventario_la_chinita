<?php
class marca_model extends modeloPrincipal {

    public static function consultar_marca() {
        $consul = modeloPrincipal::consultar("SELECT * FROM marca ORDER BY nombre ASC");
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
        $marcas_registrados = [];

        for ($i = 0; $i < count($nombres); $i++) {
            $nombre = strtolower($nombres[$i]);

            if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM marca WHERE lower(nombre) = '$nombre'")) < 1){
                self::registrar($nombre);
                $marcas_registrados[$i] = ucwords(strtolower(modeloPrincipal::limpiar_cadena($nombres[$i])));
            }
        }
        $marcas_registrados = array_values($marcas_registrados);
        if (count($marcas_registrados) > 0) {
            self::bitacora($marcas_registrados);
        }
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
                <?php if (rol_model::verificar_rol('m_marca') == '1') { ?>
                    <td class="col text-center">
                        <?php 
                            if ($mostrar["estado"] === "1") { ?>
                                <button 
                                    class="btn btn-outline-success bi-check-circle" 
                                    title="estado de la Marca">
                                        &nbsp; Activo 
                                </button>
                        <?php } else { ?>
                                <form action="<?= (rol_model::verificar_rol('m_marca') == '1') ?  '../controlador/marca.php' : './gestion_productos.php' ?>" method="post" class="SendFormAjax" data-type-form="update_estate" >
                                    <input type="hidden" name="modulo" value="inactivo">          
                                    <input type="hidden" name="UID" value="<?= modeloPrincipal::encryptionId($mostrar["id"]); ?>">
                                    <button 
                                        class="btn btn-outline-danger bi-x-circle <?= (rol_model::verificar_rol('m_marca') == '1') ?  '' : 'disabled eraser' ?>" 
                                        title="estado de la Marca"
                                        type="submit">
                                            &nbsp; Inactivo
                                    </button>
                                </form>
                        <?php }?>
                    </td>
                <?php } ?>
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
            // $ids_marcas = self::obtener_array_id_marca_recien_registrado($CM);
            $mensaje = "";
            
            for ($i = 0; $i < count($CM); $i++) { 
                // $datos_originales = self::consultar_por_id($ids_marcas[$i]);
                $datos_originales = modeloPrincipal::consultar("SELECT * FROM marca WHERE nombre = '".$CM[$i]."'");
                $datos_originales = mysqli_fetch_array($datos_originales);
                
                $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

                $mensaje .= "Nombre: <b>".$datos_originales['nombre']." </b><br>
                    Estado: <b>".$datos_originales['estado']." </b><br><br>
                    <b>*********************************************</b><br><br>";
                    
            }
            bitacora::bitacora("Registro exitoso de una Marca.","Se registro una Marca con la siguiente información: <br><br>
                <b>****** Información de la Marca:   ******</b><br><br>
                $mensaje");

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

    
    public static function actualizar($estado, $id_marca){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("marca", "estado = $estado", "id = $id_marca")) {
            return false;
        }
        return true;
    }


}