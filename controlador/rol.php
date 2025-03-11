<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");
require_once ('../include/datos_usuario_include.php');

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    
    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloprincipal::consultar("SELECT nombre FROM rol WHERE nombre = '$nombre'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya se encuentra Registrado un ROL con ese nombre, por favor verifica e intenta de nuevo", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit(); 
    }

    // verificar datos
    if($nombre == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    // datos verificados que se van a Registrar
    if (modeloprincipal::InsertSQL("rol", "nombre, estado", "'$nombre',1")) {
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
        exit();
    } else { // se muestra un mensaje en caso de que no se pueda Registrar los datos
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron registrar, verifique he intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}

/* ----------------- modulo para cambiar el estado de un rol ------------------ */
$id_rol = modeloprincipal::limpiar_cadena($_POST["id_rol"]);

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol Desactivado!", 
                        text:"El rol del sistema se desactivo exitosamente", 
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
                });
            </script>';
        exit();
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo realizar la operacion, por favor intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        exit();
    }
}

if ($modulo === "inactivo"){
    if(modeloprincipal::UpdateSQL("rol","estado = '1'", "id_rol = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol activado!", 
                        text:"El rol del sistema se activo exitosamente", 
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
                });
            </script>';
        exit();
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo realizar la operacion, por favor intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        exit();
    } 
}