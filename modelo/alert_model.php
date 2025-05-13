<?php
error_reporting(E_PARSE);

class alert_model {

    // public function __construct() {
    //     parent::__construct(); // Llama al constructor de la clase padre (modeloPrincipal)
    // }

    // public function get_alertas($id_usuario) {
    //     $query = "SELECT * FROM alertas WHERE id_usuario = :id_usuario AND estado = 1";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function marcar_alerta_leida($id_alerta) {
    //     $query = "UPDATE alertas SET estado = 0 WHERE id_alerta = :id_alerta";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':id_alerta', $id_alerta, PDO::PARAM_INT);
    //     return $stmt->execute();
    // }
    

    /**********************************************************************************/
    /*********************** funciones para crear alertas con sweet alert *************/
    /**********************************************************************************/

    /*------------------- funcion para crear una alerta con sweet alert con parametros ---------------*/

    public static function alerta_simple ($title, $text, $type){
        echo '<script type="text/javascript">
            swal({
                title:"'.$title.'",
                text:"'.$text.'",
                type: "'.$type.'",
                confirmButtonText: "Aceptar"
            });
            </script>';
    }
    private static function alerta_reset_forms ($title, $text, $type, $condition = "$('.SendFormAjax')[0].reset();"){
        echo '<script type="text/javascript">
            swal({
                title:"'.$title.'",
                text:"'.$text.'",
                type: "'.$type.'",
                confirmButtonText: "Aceptar"
            });
            '.$condition.'
            </script>';
    }
    public static function alerta_condicional ($title, $text, $type, $condition = "location.reload();", $reset_forms = "$('.SendFormAjax')[0].reset();"){
        echo '<script type="text/javascript">
            swal({
                title: "'.$title.'",
                text: "'.$text.'",
                type: "'.$type.'",
                confirmButtonText: "Aceptar"
            },
            function (isConfirm) {
                if (isConfirm) {
                    '.$condition.'
                }else {                       
                    '.$condition.'
                } 
            });
            '.$reset_forms.'
            </script>';
    }

    public static function alerta_simple_reset_de_formularios($title, $text, $type, $condition = "$('.SendFormAjax')[0].reset();"){
        self::alerta_reset_forms($title, $text, $type);
    }

    public static function alert_reload ($title, $text, $type) {
        self::alerta_condicional($title, $text, $type);
    }

    public static function alert_redirect ($title, $text, $type, $url) {
        // se verifica si la url es diferente a la vista de inicio de sesion
        
        self::alerta_condicional($title, $text, $type, "window.location = '".$url."';");
        
    }


    public static function alert_reg_success(){
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {     
                    location.reload();
                } else {    
                    location.reload();
                } 
            });
            $(".SendFormAjax")[0].reset();
        </script>';
    }

    public static function alert_reg_error(){
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron registrar, verifique he intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_mod_success(){
        echo '<script type="text/javascript">
            swal({
                title: "¡Modificacion exitosa!",
                text: "Los datos se modificaron correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {     
                    location.reload();
                } else {    
                    location.reload();
                } 
            });
        </script>';
    }

    public static function alert_mod_error(){
        
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Los datos no se modificaron, verifique he intente nuevamente",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_error($title,$text){
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {     
                    location.reload();
                } else {    
                    location.reload();
                } 
            });
            $(".SendFormAjax")[0].reset();
        </script>';
    }
    public static function alert_fields_empty(){
        echo '<script type="text/javascript">
                swal({ 
                    title: "¡Ocurrio un error!",
                    text: "Exiten campos obligatorios que estan vacíos",
                    type: "error", 
                    confirmButtonColor: "#036cbd",
                    confirmButtonText: "Aceptar"  
                });
            </script>';
    }
    public static function alert_of_format_wrong($campo){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo '.$campo.' no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_register_exist(){
        echo '<script type="text/javascript">
                swal({
                    title:"¡Ocurrió un error!",
                    text:"La información ingresada ya se encuentra registrada en el sistema. le sugerimos revisar los datos o utilizar una información diferente",
                    type: "error",
                    confirmButtonText: "Aceptar"
                });
        </script>'; 
    }

    
}