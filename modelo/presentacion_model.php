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
        $nombre = ucwords(strtolower(modeloPrincipal::limpiar_cadena($nombre)));
        $descripcion = $descripcion !== "" ? ucwords(strtolower(modeloPrincipal::limpiar_cadena($descripcion))) : '';

        $registrar = modeloPrincipal::InsertSQL("presentacion", "nombre, descripcion, estado" ,"'$nombre', '$descripcion', 1");
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar la presentación debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function verificar_existe_presentacion ($nombres){
        $nombres = modeloPrincipal::format_array_of_data_with_dublicated($nombres);
        // $descripciones = modeloPrincipal::format_array_of_data_with_dublicated($descripciones);
        // se comprueba que no exista un registro con los mismos datos
        $nombres_registrados = [];
        try {

            for ($i = 0; $i < count($nombres); $i++) {
                
                $nombre = strtolower($nombres[$i]);
                // $descripcion = strtolower($descripciones[$i]);

                // if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM presentacion WHERE lower(nombre) = '$nombre' AND lower(descripcion) = '$descripcion'")) < 1){
                if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM presentacion WHERE lower(nombre) = '$nombre'")) < 1){
                    self::registrar($nombre,"");
                    // $nombres_registrados[$i] = $nombres[$i];
                    $nombres_registrados[$i] = ucwords(strtolower(modeloPrincipal::limpiar_cadena($nombres[$i])));
                }
            }
                
        } catch (Exception $e) {
            alert_model::alerta_simple("Ocurrio un error!","No se pudo registrar la presentación debido a un error interno.","error");
            exit();
        }
        $nombres_registrados = array_values($nombres_registrados);
        self::bitacora($nombres_registrados);
        // return $registrados;
    }

    public static function bitacora($presentacion) {
        try {

            $mensaje = '';
            
            for ($i = 0; $i < count($presentacion); $i++) { 
                $datos_originales = modeloPrincipal::consultar("SELECT * FROM presentacion WHERE nombre = '".$presentacion[$i]."'");
                $datos_originales = mysqli_fetch_array($datos_originales);
                
                $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activa' : 'Inactiva';
                $datos_originales['descripcion'] = $datos_originales['descripcion'] == '' ? 'No definida!' : $datos_originales['descripcion'];

                $mensaje .= "Nombre: <b>".$datos_originales['nombre']." </b><br>
                Descripción: <b>".$datos_originales['descripcion']." </b><br>
                Estado: <b>".$datos_originales['estado']." </b><br><br>";
            }

            bitacora::bitacora("Registro exitoso de una presentación.","Se registro una presentación con la siguiente informacón: <br><br>
                <b>****** Información de la presentación:   ******</b><br><br>
                $mensaje
                ");
                
        } catch (Exception $e) {
            alert_model::alerta_simple("Ocurrio un error!","No se pudo registrar la presentación en bitácora debido a un error interno.","error");
            exit();
        }
    }
    
    public static function obtener_array_id_presentacion($NP):array {
        // $NC es un array con los Nombres de las presentaciones = NM
        
        $dataFind = [];

        for ( $i = 0;  $i < count($NP); $i++ ) {

            $dataFind[$i] = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id FROM presentacion WHERE nombre = '".$NP[$i]."'"))['id'];
        }

        $dataFind = array_values($dataFind);

        return $dataFind;
    }


    public static function lista(){
        $consulta = self::consultar_presentacion("*");
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