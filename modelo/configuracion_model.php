<?php

class config_model extends modeloPrincipal {

    public static function consultar($campo) {
        return modeloPrincipal::consultar("SELECT $campo FROM configuracion");
    }
    
    public static function actualizar($campo) {
        return modeloPrincipal::UpdateSQL("configuracion","$campo","id = 1");
    
    }

    public static function obtener_dato($campo) {
        $consult = modeloPrincipal::consultar("SELECT $campo FROM configuracion");

        if (!$consult) {
            alert_model::alerta_simple("¡Ha ocurrido un error!","No se pudo consultar la información de la configuración del sistema.","error");
        }
        $consult = mysqli_fetch_array($consult);
        $consult = $consult[$campo];
        return $consult;
    }

    // funcion para obtener todos los datos de la configuracion del sistema
    public static function obtener_configuracion() {
        
        // información de la configuración original
        $configuracion['c_preguntas'] = config_model::obtener_dato('c_preguntas');
        $configuracion['tiempo_inactividad'] = config_model::obtener_dato('tiempo_inactividad');
        $configuracion['intentos_inicio_sesion'] = config_model::obtener_dato('intentos_inicio_sesion');
        $configuracion['c_caracteres'] = config_model::obtener_dato('c_caracteres');
        $configuracion['c_simbolos'] = config_model::obtener_dato('c_simbolos');
        $configuracion['c_numeros'] = config_model::obtener_dato('c_numeros');
        $configuracion['porcentaje_iva'] = config_model::obtener_dato('porcentaje_iva');
        $configuracion['porcentaje_ganancia'] = config_model::obtener_dato('porcentaje_ganancia');
        
        return $configuracion;
    }
    
    // funcion para obtener todos los datos de la configuracion del sistema
    public static function bitacora_configuracion_modificada($id_usuario,$configuracion_original) {
            
        $cedula = model_user::obtener_info_personal_usuario('cedula',$id_usuario);
        $nombre = model_user::obtener_info_personal_usuario('nombre',$id_usuario);
        $apellido = model_user::obtener_info_personal_usuario('apellido',$id_usuario);
        $telefono = model_user::obtener_info_personal_usuario('telefono',$id_usuario);
        $rol  = model_user::obtener_info_personal_usuario('id_rol',$id_usuario);

        // información de la configuración actual
        $configuracion_actual = config_model::obtener_configuracion();

        if ($configuracion_original['porcentaje_iva'] !== $configuracion_actual['porcentaje_iva'] || $configuracion_original['porcentaje_ganancia'] !== $configuracion_actual['porcentaje_ganancia']) {
            
            $modulo_productos_originales = "<b>****** Configuración original del módulo de Gestión de productos:  ******</b><br>
                Porcentaje de IVA: <b>".$configuracion_original['porcentaje_iva']."% </b><br>
                Porcentaje de Ganancia: <b>".$configuracion_original['porcentaje_ganancia']."% </b> <br><br>
                <b>*********************************************</b><br><br>";

            $modulo_productos_actuales = "<b>****** Configuración Actual del módulo de Gestión de productos:  ******</b><br>
                Porcentaje de IVA: <b>".$configuracion_actual['porcentaje_iva']."% </b><br>
                Porcentaje de Ganancia: <b>".$configuracion_actual['porcentaje_ganancia']."% </b> <br><br>
                <b>*********************************************</b><br><br>";
        }

        if ($configuracion_original['c_preguntas'] !== $configuracion_actual['c_preguntas'] || $configuracion_original['tiempo_inactividad'] !== $configuracion_actual['tiempo_inactividad'] || $configuracion_original['intentos_inicio_sesion'] !== $configuracion_actual['intentos_inicio_sesion']) {
            
            $modulo_sesion_original = "<b>****** Configuración original de Sesión:  ******</b><br>
                Cantidad de preguntas de seguridad: <b>".$configuracion_original['c_preguntas']."</b> <br>
                Tiempo de inactividad de sesión: <b>".$configuracion_original['tiempo_inactividad']." minutos</b> <br>
                Intentos de inicio de sesión para los usuarios: <b>".$configuracion_original['intentos_inicio_sesion']."</b> <br><br>
                <b>*********************************************</b><br><br>";

            $modulo_sesion_actual = "<b>****** Configuración Actual de Sesión:  ******</b><br>
                Cantidad de preguntas de seguridad: <b>".$configuracion_actual['c_preguntas']."</b> <br>
                Tiempo de inactividad de sesión: <b>".$configuracion_actual['tiempo_inactividad']." minutos</b> <br>
                Intentos de inicio de sesión para los usuarios: <b>".$configuracion_actual['intentos_inicio_sesion']."</b> <br><br>
                <b>*********************************************</b><br><br>";
        }

        if ($configuracion_original['c_caracteres'] !== $configuracion_actual['c_caracteres'] || $configuracion_original['c_simbolos'] !== $configuracion_actual['c_simbolos'] || $configuracion_original['c_numeros'] !== $configuracion_actual['c_numeros']) {
            
            $parametros_contraseña_originales = "<b>****** Configuración original de Contraseña:  ******</b><br>
                Cantidad de caracteres: <b>".$configuracion_original['c_caracteres']."</b><br>
                Cantidad de símbolos: <b>".$configuracion_original['c_simbolos']."</b> <br>
                Cantidad de números: <b>".$configuracion_original['c_numeros']."</b> <br><br>
                <b>*********************************************</b><br><br>";

            $parametros_contraseña_actuales = "<b>****** Configuración Actual de Contraseña:  ******</b><br>
                Cantidad de caracteres: <b>".$configuracion_actual['c_caracteres']."</b><br>
                Cantidad de símbolos: <b>".$configuracion_actual['c_simbolos']."</b> <br>
                Cantidad de números: <b>".$configuracion_actual['c_numeros']."</b> <br><br>
                <b>*********************************************</b><br><br>";
        }

        $bitacora_configuracion = bitacora::bitacora("Modificación exitosa de la configuración del sistema.","El usuario actualizó la configuración del sistema <br><br>
            <b>****** Información del usuario que realizo la modificación:  ******</b><br><br>
            Cédula: <b>".$cedula."</b><br>
            Nombre: <b>".$nombre."</b><br>
            Apellido: <b>".$apellido."</b><br>
            Teléfono: <b>".$telefono."</b><br>
            Rol asignado: <b>".$rol."</b><br><br>

            <b>*********************************************</b><br><br>
            $modulo_productos_originales

            $modulo_sesion_original

            $parametros_contraseña_originales

            $modulo_productos_actuales

            $modulo_sesion_actual

            $parametros_contraseña_actuales

        ");
        return $bitacora_configuracion;
    }
    
    /**
     * Verifica si se actualizaron los parámetros de configuración relacionados a la contraseña
     * y la cantidad de preguntas de seguridad, y notifica al usuario si debe actualizar sus datos.
     *
     */
    public static function verificar_actualizacion_configuracion($perfil = 0) {
                
        $id_usuario = $_SESSION['id_usuario'];

        try {
            // Obtener los parámetros de configuración actuales
            $configuracion = modeloPrincipal::consultar("SELECT * FROM configuracion");
    
            if (!$configuracion) {
                alert_model::alerta_simple("¡Error!", "No se pudo obtener la configuración del sistema.", "error");
                return;
            }
    
            $configuracion = mysqli_fetch_array($configuracion);
    
            $cant_caracteres = intval($configuracion['c_caracteres']);
            $c_preguntas = intval($configuracion['c_preguntas']);
        } catch (Exception $e) {
            alert_model::alerta_simple("¡Error!", "Error al consultar la configuración del sistema.", "error");
            exit();
        }
        
        // Obtener la información del usuario
        try {
            $usuario = modeloPrincipal::consultar("SELECT contraseña FROM usuario WHERE id_usuario = '$id_usuario'");
    
            if (!$usuario) {
                alert_model::alerta_simple("¡Error!", "No se pudo obtener la información del usuario.", "error");
                return;
            }
    
            $usuario = mysqli_fetch_array($usuario);
            $contraseña = modeloPrincipal::decryption($usuario['contraseña']);

        } catch (Exception $e) {
            alert_model::alerta_simple("¡Error!", "Error al consultar la información del usuario.", "error");
            exit();
        }

        // Obtener la cantidad de preguntas de seguridad del usuario
        try {
            $preguntas_seguridad = modeloPrincipal::consultar("SELECT COUNT(*) AS cantidad FROM preguntas_secretas WHERE id_usuario = '$id_usuario'");
            if (!$preguntas_seguridad) {
                alert_model::alerta_simple("¡Error!", "No se pudo obtener la cantidad de preguntas de seguridad del usuario.", "error");
                return;
            }

            $preguntas_seguridad = mysqli_fetch_assoc($preguntas_seguridad);
            $cantidad_preguntas = intval($preguntas_seguridad['cantidad']);

        } catch (Exception $e) {
            alert_model::alerta_simple("¡Error!", "Error al consultar la cantidad de preguntas de seguridad del usuario.", "error");
            exit();
        }

        if ($perfil == 0) {
            // Verificar si la contraseña cumple con la nueva longitud mínima
            if (strlen($contraseña) < $cant_caracteres) {
                alert_model::alert_redirect(
                    "¡Advertencia!",
                    "La longitud de su contraseña actual no cumple con los nuevos requisitos del sistema. Por favor, actualice su contraseña a una longitud mínima de $cant_caracteres caracteres.",
                    "warning",
                    'mi_perfil.php'
                );
                return;
            }
            
            // Verificar si la cantidad de preguntas de seguridad cumple con los nuevos requisitos
            if ($cantidad_preguntas < $c_preguntas) {
                alert_model::alert_redirect(
                    "¡Advertencia!",
                    "La cantidad de preguntas de seguridad configuradas no cumplen con los nuevos requisitos del sistema. Por favor, configure al menos $c_preguntas preguntas de seguridad.",
                    "warning",
                    'mi_perfil.php'
                );
                return;
            }
             // Verificar si la cantidad de preguntas de seguridad cumple con los nuevos requisitos
        
        }
        
        if ($perfil == 1) {
            // Verificar si la contraseña cumple con la nueva longitud mínima
            if (strlen($contraseña) < $cant_caracteres) {
                alert_model::alerta_simple(
                    "¡Advertencia!",
                    "La longitud de su contraseña actual no cumple con los nuevos requisitos del sistema. Por favor, actualice su contraseña a una longitud mínima de $cant_caracteres caracteres.",
                    "warning"
                );
                return;
            }

            // Verificar si la cantidad de preguntas de seguridad cumple con los nuevos requisitos
            if ($cantidad_preguntas < $c_preguntas) {
                alert_model::alerta_simple(
                    "¡Advertencia!",
                    "La cantidad de preguntas de seguridad configuradas no cumplen con los nuevos requisitos del sistema. Por favor, configure al menos $c_preguntas preguntas de seguridad.",
                    "warning"
                );
                return;
            }
            
        }
    }
    

}
