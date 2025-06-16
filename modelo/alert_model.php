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

    public static function alerta_simple ($title, $text, $icon){
        echo '<script type="text/javascript">
                Swal.fire({
                    title: "'.$title.'",
                    text: "'.$text.'",
                    icon: "'.$icon.'",
                    confirmButtonText: "Aceptar"
                });
            </script>';
    }
    private static function alerta_reset_forms ($title, $text, $icon, $condition = "$('.SendFormAjax')[0].reset();"){
        echo "<script>
                Swal.fire({
                    title: '$title',
                    text: '$text',
                    icon: '$icon',
                    confirmButtonText: 'Aceptar'
            });
            $condition
            </script>";
    }
    public static function alerta_condicional ($title, $text, $icon, $condition = "location.reload();", $reset_forms = "$('.SendFormAjax')[0].reset();"){
        echo "<script>
                Swal.fire({
                    title: '$title',
                    text: '$text',
                    icon: '$icon',
                    confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $condition
                }else {                       
                    $condition
                } 
            });
            $reset_forms
            </script>";
    }

    public static function alerta_simple_reset_de_formularios($title, $text, $icon, $condition = "$('.SendFormAjax')[0].reset();"){
        self::alerta_reset_forms($title, $text, $icon);
    }

    public static function alert_reload ($title, $text, $icon) {
        self::alerta_condicional($title, $text, $icon);
    }

    public static function alert_redirect ($title, $text, $icon, $url) {
        // se verifica si la url es diferente a la vista de inicio de sesion
        
        self::alerta_condicional($title, $text, $icon, "window.location = '".$url."';");
        
    }


    public static function alert_reg_success(){
        echo '<script type="text/javascript">
            Swal.fire({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
                icon: "success",
                confirmButtonText: "Aceptar"
            
            }).then((result) => {
                if (result.isConfirmed) {    
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
            Swal.fire({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron registrar, verifique he intente de nuevo ",
                icon: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_mod_success(){
        echo '<script type="text/javascript">
            Swal.fire({
                title: "¡Modificacion exitosa!",
                text: "Los datos se modificaron correctamente",
                icon: "success",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {   
                    location.reload();
                } else {    
                    location.reload();
                } 
            });
        </script>';
    }

    public static function alert_mod_error(){
        
        echo'<script type="text/javascript">
            Swal.fire({
                title: "¡Ocurrio un error!",
                text: "Los datos no se modificaron, verifique he intente nuevamente",
                icon: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_error($title,$text){
        echo '<script type="text/javascript">
            Swal.fire({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
                icon: "success",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
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
                Swal.fire({ 
                    title: "¡Ocurrio un error!",
                    text: "Exiten campos obligatorios que estan vacíos",
                    icon: "error", 
                    confirmButtonColor: "#036cbd",
                    confirmButtonText: "Aceptar"  
                });
            </script>';
    }
    public static function alert_of_format_wrong($campo){
        echo '<script type="text/javascript">
            Swal.fire({
                title: "¡Ocurrio un error!",
                text: "El campo '.$campo.' no cumple con el formato establecido",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
        </script>';
    }

    public static function alert_register_exist(){
        echo '<script type="text/javascript">
                Swal.fire({
                    title:"¡Ocurrió un error!",
                    text:"La información ingresada ya se encuentra registrada en el sistema. le sugerimos revisar los datos o utilizar una información diferente",
                    icon: "error",
                    confirmButtonText: "Aceptar"
                });
        </script>'; 
    }

    
}