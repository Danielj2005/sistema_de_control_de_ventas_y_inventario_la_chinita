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


}
