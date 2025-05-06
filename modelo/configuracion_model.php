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
    
    /**
     * Verifica si se actualizaron los parámetros de configuración relacionados a la contraseña
     * y la cantidad de preguntas de seguridad, y notifica al usuario si debe actualizar sus datos.
     *
     */
    public static function verificar_actualizacion_configuracion($perfil = 0) {
                
        $id_usuario = $_SESSION['id_usuario'];

        try {
            // Obtener los parámetros de configuración actuales
            $configuracion = modeloPrincipal::consultar("SELECT c_caracteres, c_preguntas FROM configuracion");
    
            if (!$configuracion) {
                alert_model::alerta_simple("¡Error!", "No se pudo obtener la configuración del sistema.", "error");
                return;
            }
    
            $configuracion = mysqli_fetch_assoc($configuracion);
    
            $cant_caracteres = intval($configuracion['c_caracteres']);
            $c_preguntas = intval($configuracion['c_preguntas']);
        } catch (Exception $e) {
            alert_model::alerta_simple("¡Error!", "Error al consultar la configuración del sistema.", "error");
            exit();
        }
        
        try {
            
            
            // Obtener la información del usuario
            $usuario = modeloPrincipal::consultar("SELECT contraseña FROM usuario WHERE id_usuario = '$id_usuario'");
    
            if (!$usuario) {
                alert_model::alerta_simple("¡Error!", "No se pudo obtener la información del usuario.", "error");
                return;
            }
    
            $usuario = mysqli_fetch_assoc($usuario);
            $contraseña = modeloPrincipal::decryption($usuario['contraseña']);

        } catch (Exception $e) {
            alert_model::alerta_simple("¡Error!", "Error al consultar la información del usuario.", "error");
            exit();
        }

        try {
            
            
            // Obtener la cantidad de preguntas de seguridad del usuario
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
                modeloPrincipal::UpdateSQL("usuario", "parametros_actualizados = 1", "id_usuario = '$id_usuario'");
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
                modeloPrincipal::UpdateSQL("usuario", "parametros_actualizados = 1", "id_usuario = '$id_usuario'");
                alert_model::alert_redirect(
                    "¡Advertencia!",
                    "La cantidad de preguntas de seguridad configuradas no cumple con los nuevos requisitos del sistema. Por favor, configure al menos $c_preguntas preguntas de seguridad.",
                    "warning",
                    'mi_perfil.php'
                );
                return;
            }
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
                modeloPrincipal::UpdateSQL("usuario", "parametros_actualizados = 1", "id_usuario = '$id_usuario'");
                alert_model::alerta_simple(
                    "¡Advertencia!",
                    "La cantidad de preguntas de seguridad configuradas no cumple con los nuevos requisitos del sistema. Por favor, configure al menos $c_preguntas preguntas de seguridad.",
                    "warning"
                );
                return;
            }
        }
    }
    

}
