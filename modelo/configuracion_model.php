<?php

class config_model extends modeloPrincipal {

    public static function consultar($campo) {
        return modeloPrincipal::consultar("SELECT $campo FROM configuracion");
    }
    
    public function actualizar($campo) {
        return modeloPrincipal::UpdateSQL("configuracion","$campo","id = 1");
    
    }

}
