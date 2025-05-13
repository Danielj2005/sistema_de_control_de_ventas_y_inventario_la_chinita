<?php 

require_once __DIR__ . '/modelo_usuario.php'; // se incluye el modelo principal
require_once __DIR__ . '/alert_model.php'; // se incluye el modelo principal
error_reporting(E_PARSE);

class bitacora extends model_user {

    /*********************************************************************/
    /*********************** funciones de bitácora ***********************/
    /*********************************************************************/
    

    /******funcion para registrar movimientos del sistema en la bitácora  ******/ 
    public static function bitacora($accion, $mensaje) {
        $fechas = date('Y-m-d H:i:s');
        $id_usuario = $_SESSION["id_usuario"];

        if (!$consul = Self::InsertSQL("bitacora","fecha_hora,accion,mensaje,id_usuario","'$fechas','$accion','$mensaje',$id_usuario")) {
            die("Ha ocurrido un error al guardar la bitacora");
        }
        return $consul;
    }

    // funcion para registrar inicio de sesion del sistema en la bitácora
    public static function login() {
        // Registra en la bitácora el inicio de sesión del usuario
        return Self::bitacora("Inicio de sesión exitoso", "El usuario ha iniciado sesión correctamente en el sistema.");
    }

    // funcion para registrar Intento de acceso al sistema sin autenticación previa en la bitácora
    
    public static function intento_de_acceso_a_los_archivos_del_sistema() {
        // Registra en la bitácora el intento de acceso sin iniciar sesion
        return Self::bitacora("Intento de acceso a los archivos del sistema.","Se ha registrado un intento de acceso a los archivos del sistema de manera incorrecta por parte de un usuario.");
    }

    
    // funcion para registrar Intento de acceso no autorizado a la pantalla especificada en la bitácora
    public static function intento_de_acceso_a_vista_sin_permisos($pantalla) {
        // Registra en la bitácora el intento de acceso no autorizado
        Self::bitacora("Intento de acceso no autorizado a la pantalla $pantalla.","Se ha registrado un intento de acceso incorrecto a la pantalla $pantalla por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.");
        header('Location: ./inicio.php');
    }
    
    
    
    /***********************************************************************************/
    /*********************** funciones para el CRUD de la bitácora  ********************/
    /***********************************************************************************/

    // funcion para registrar un nuevo registro en la bitácora

    public static function nuevo_registro($accion, $pantalla) {
        $consult = Self::bitacora("Registro exitoso de $accion","Se ha registrado correctamente $pantalla en el sistema.");
        modeloPrincipal::verificar_consulta($consult,'bitacora');
        return $consult;
    }

    // funcion para registrar una nueva modificación en la bitácora

    public static function modificacion_registro($accion, $pantalla) {
        $consult = Self::bitacora("Modificación exitosa de $accion","Se ha modificado correctamente la información de $pantalla en el sistema.");
        modeloPrincipal::verificar_consulta($consult,'bitacora');
        return $consult;
    }

     // funcion para registrar un cambio de estado en la bitácora

    public static function cambio_estado($nuevo_registro) {
        $consult = Self::bitacora("Cambio de estado exitoso de $nuevo_registro","Se ha cambiado correctamente el estado de un $nuevo_registro en el sistema.");
        modeloPrincipal::verificar_consulta($consult,'bitacora');
        return $consult;
    }

    
    
    /********************************************************************************************************/
    /*********************** funciones para bitácora de modificaciones de información ***********************/
    /********************************************************************************************************/

}