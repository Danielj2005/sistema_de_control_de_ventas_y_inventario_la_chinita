<?php

class category_model extends modeloPrincipal {

    public static function consultar_categoria($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM categoria");
        modeloPrincipal::verificar_consulta($consul,'categoria'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_condicional($fields, $condicion) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM categoria WHERE $condicion");
        modeloPrincipal::verificar_consulta($consul,'categoria'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consultar_categoria_por_id($fields, $id_categoria) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM categoria WHERE id_categoria = $id_categoria");
        modeloPrincipal::verificar_consulta($consul,'categoria'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    
    // funcion para obtener el id de un categoria
    public static function obtener_id_categoria_recien_registrada(){
        $id_categoria = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_categoria) AS id FROM categoria"));
        $id_categoria = $id_categoria['id'];
        return $id_categoria;
    }

    public static function registrar ($nombre) {

        $registrar = modeloPrincipal::InsertSQL("categoria", "nombre, estado" ,"'$nombre',1");
    
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el proveedor debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }

    public static function verificar_existe_categoria($campos, $dato_a_buscar){
        // se comprueba que no exista un registro con los mismos datos
        for ($i = 0; $i < count($dato_a_buscar); $i++) {
            $nombre = strtolower($dato_a_buscar[$i]);
            if(mysqli_num_rows(Self::consultar("SELECT $campos FROM categoria WHERE $campos = '$nombre'")) < 1){
                /********** No se puede registrar un usuario si ya existe **********/
                return false;
            }
        }
        return true;
    }


    public static function lista(){
        $consulta = self::consultar_categoria("*");
        
        // se guardan los datos en un array y se imprime
        $i = 1;
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="col text-center"><?= $i++ ?></td>
                <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                <td scope="row" class="text-center">
                    <button 
                        <?= (rol_model::verificar_rol('m_categoria') == '1') ?  '' : 'disabled' ?> 
                        class="btn <?= ($mostrar["estado"] === "1") ? 'btn-outline-success bi-check-circle' : 'btn-outline-danger bi-x-circle'?>" 
                        title="estado de la categoría">
                            &nbsp; <?= ($mostrar["estado"] === "1") ? 'Activo' : 'Inactivo' ?> 
                    </button>
                </td>
            </tr>
        <?php  } 
    }


    public static function options() {
        $consulta = self::consultar_condicional("nombre","estado = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["nombre"];?>"> <?= $mostrar["nombre"]; ?></option>
        <?php  } 
    }

    public static function actualizar($estado, $id_categoria){
        // se comprueba que no exista un registro con los mismos datos
        
        if (!modeloprincipal::UpdateSQL("categoria", "estado = $estado", "id_categoria = $id_categoria")) {
            return false;
        }
        return true;
    }
}