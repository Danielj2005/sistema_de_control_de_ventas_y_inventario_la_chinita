<?php 

require_once __DIR__ . '/modelo_usuario.php'; // se incluye el modelo principal
require_once __DIR__ . '/alert_model.php'; // se incluye el modelo principal
error_reporting(E_PARSE);

class rol_model extends model_user {
    
    /**********************************************************************************/
    /*************** funciones para verificar permisos de roles de usuario ************/
    /**********************************************************************************/
    // funcion para verificar los permisos de un rol

    public static function verificar_rol($vista){

        $id_rol = self::obtener_id_rol_usuario();
        
        $permiso_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT $vista FROM rol WHERE id_rol = $id_rol"));
        $permiso_rol = $permiso_rol[$vista];
        return $permiso_rol;
    }


    // funcion para verificar los premisos de un modulo del  sistema
    public static function permisos_modulos($vista){
        $id_rol = self::obtener_id_rol_usuario();
        
        $permiso_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT SUM($vista) AS permiso_vista FROM rol WHERE id_rol = $id_rol"));
        $permiso_rol = $permiso_rol['permiso_vista'];
        return $permiso_rol;
    }

    // funcion para obtener el id del rol de un usuario

    public static function obtener_id_rol_usuario(){
        $id_usuario = $_SESSION["id_usuario"]; // se recibe el id del usuario que inició sesión
        $id_rol = modeloPrincipal::consultar("SELECT id_rol FROM usuario WHERE id_usuario = $id_usuario");

        if (!$id_rol) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se encontró el rol del usuario, por favor verifique e intente nuevamente","error");
        }
        
        $id_rol = mysqli_fetch_array($id_rol);
        return $id_rol['id_rol'];
    }

    // funcion para obtener el id del rol de un usuario

    public static function obtener_nombre_rol_usuario($id_rol){
        $nombre_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT nombre FROM rol WHERE id_rol = $id_rol"));
        return $nombre_rol['nombre'];
    }


    // funcion para validar si se esta recibiendo datos por post
    public static function validar_post_roles($post) {

        if (!isset($_POST["$post"]) || $_POST["$post"] == ""){
            $post = 0;
        }
        
        if ($_POST["$post"] == 1 || $_POST["$post"] == '1') {
            return $post = 1;
        }else{
            return alert_model::alerta_condicional("Atención!","Algún datos de los permisos de los roles fue alterado de manera incorrecta y no coinciden con las que están registradas en el sistema. Se cerrará tu sesión por motivos de seguridad.","","window.location = '../controlador/salir.php';");
        }
    }
}