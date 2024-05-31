<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");
require_once ('../include/datos_usuario_include.php');

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

// modulo para Guardar un registro de un usuario
if($modulo === "Guardar"){

    /*------------------ información personal de el usuario ------------------*/
    $cedula = modeloprincipal::limpiar_cadena($_POST["nacionalidad"].$_POST["cedula"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre"]);
    $apellido = modeloprincipal::limpiar_mayusculas($_POST["apellido"]);
    $telefono = modeloprincipal::limpiar_cadena($_POST["telefono"]);
    $direccion = modeloprincipal::limpiar_mayusculas($_POST["direccion"]);
    
    /*------------------ datos de el usuario ------------------*/
    $correo =  modeloprincipal::limpiar_cadena($_POST["correo"]);
    $pass = modeloprincipal::limpiar_encriptar($_POST["password"]);
    $pass2 = modeloprincipal::limpiar_encriptar($_POST['password2']);
    
    $id_tipo =  modeloprincipal::limpiar_cadena($_POST["id_tipo"]);
    $id_seguridad =  modeloprincipal::limpiar_cadena($_POST["id_seguridad"]);
    $respuesta =  modeloprincipal::limpiar_encriptar($_POST["respuesta"]);

    // se guarda la fecha para la creacion de las notificaciones
    $fecha_actual = date('Y-m-d'); 

    /********** verificar que las contraseñas coinciden **********/
    // se muestra un mensaje de error si las contraseñas no coinciden
    if ($pass !== $pass2) {
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Las contraseñas no coinciden, por favor verifica e intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        exit(); 

    }
    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloprincipal::consultar("SELECT correo FROM usuario WHERE correo = '$correo'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya se encuentra Registrado un USUARIO con ese nombre de USUARIO, por favor ingresa otra", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit(); 
    }
    // verificar datos
    if($cedula == "" || $nombre == "" || $apellido == "" || $correo == "" || $telefono == "" || $pass == ""){
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
    if (modeloprincipal::verificar_datos("[A-Za-z0-9-]{7,10}",$cedula)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo CÉDULA no cumple con el formato establecido",
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
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$apellido)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo APELLIDO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$respuesta)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo RESPUESTA no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}",$correo)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo CORREO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[0-9]{11}",$telefono)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo telefono no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9- ]{10,50}",$direccion)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo DIRECCIÓN no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\.\*\_\-]{8,16}", modeloprincipal::decryption($pass))) {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo CONTRASEÑA no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    // datos verificados que se van a Registrar

    // crear notificacion de las preguntas de seguridad
   // $notificaciones = modeloprincipal::InsertSQL("notificacion","tipo, mensaje, fecha, estado, nombre_usuario","'1','Estimado/a ".modeloprincipal::decryption($usuario)." Debes escoger tus preguntas de seguridad, ve a tú perfil.','$fecha_actual','1','$usuario'");
    
    if (modeloprincipal::InsertSQL("usuario", "cedula, nombre, apellido, correo, contraseña, telefono, direccion, id_tipo, id_seguridad, respuesta, estado", "'$cedula', '$nombre', '$apellido', '$correo', '$pass', '$telefono', '$direccion', '$id_tipo', '$id_seguridad', '$respuesta',1")) {
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

// modulo para Modificar informacion personal de un usuario
if($modulo === "Modificar_info_personal"){
     
    /*------------------ información personal de el usuario ------------------*/
    $nombre =  modeloprincipal::limpiar_mayusculas($_POST["nombre"]);
    $apellido = modeloprincipal::limpiar_mayusculas($_POST["apellido"]);
    $correo =  modeloprincipal::limpiar_cadena($_POST["correo"]);
    $contraseña =  modeloprincipal::limpiar_cadena($_POST["contraseña"]);

    if($nombre == ""){$nombre = $nombre_user; }
    if($apellido == ""){$apellido = $apellido_user; }
    if($correo == ""){$correo = $correo_user;}
    
    // verificar datos
    if($nombre == "" || $apellido == "" || $correo == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "exiten campos obligatorios que estan vacios",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)) {
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
    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo APELLIDO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    } 
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}",$correo)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo CORREO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    //datos verificados modificar
    if (modeloprincipal::UpdateSQL("usuario","nombre = '$nombre', apellido = '$apellido', correo = '$correo'", "id_usuario = $_SESSION[user_id]")) {
        echo '<script type="text/javascript">
            swal({
                title:"¡Modificacion exitosa!",
                text:"Los datos se modificaron correctamente",
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
        exit();
    } else {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Los datos no se modificaron, verifique he intente nuevamente",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}

// modulo para Modificar informacion de un usuario
if($modulo === "Modificar_info_user"){
     
    /*------------------ información  de el usuario ------------------*/
    $user = modeloprincipal::limpiar_cadena($_POST["usuario"]);
    $pass_actual = modeloprincipal::limpiar_encriptar($_POST["password_actual"]);

    $pass = modeloprincipal::limpiar_encriptar($_POST["password"]);
    $pass2 = modeloprincipal::limpiar_encriptar($_POST['password2']);


    if($user == ""){ $user = $correo_user;  }
    if( $pass == "" || $pass2 == "" ){  $pass = $userPass;   $pass2 = $userPass; }

    if ($pass !== $pass2) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "la contraseñas no coinciden, verifica por favor",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    $consulta_pass = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT contraseña FROM usuario WHERE id_usuario = '$_SESSION[user_id]'"));
    
    if($pass_actual !== $consulta_pass['contraseña']){
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "LA CONTRASEÑA ACTUAL que ingresaste es incorrecta, verifique he intente nuevamente.",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    // verificar datos
    if($user == "" || $pass == ""){
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Existen campos obligatorios que estan vacíos",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóú0-9\.\@]{11,30}", $user)) {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo CORREO (nombre de usaurio) no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{8,16}", modeloPrincipal::decryption($pass))) {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo CONTRASEÑA {'.$pass.'}  no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    //datos verificados modificar
    if (modeloprincipal::UpdateSQL("usuario","correo = '$user', contraseña = '$pass'","id_usuario = $_SESSION[user_id]")) {
        echo '<script type="text/javascript">
                swal({
                    title:"¡Modificacion Exitosa!",
                    text:"Los datos se modificaron correctamente",
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
        exit();
    } else {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Los datos no se modificaron, verifique he intente nuevamente",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
}

// modulo para Modificar informacion de un usuario
if($modulo === "Modificar_pregunta_seguridad"){
     // pregunta de seguridad seleccionada 1
   $pregunta = modeloPrincipal::limpiar_cadena($_POST['select_pregunta']); 
  
   /**************** respuestas de las preguntas de seguridad ******************/

   $respuesta = modeloPrincipal::limpiar_mayusculas_encriptar($_POST['respuesta_seguridad']); 
   // repeticion de la respuesta de la pregunta 1
   $repetir_respuesta = modeloPrincipal::limpiar_mayusculas_encriptar($_POST['repetir_respuesta']); 

    // verificar datos  
    if($pregunta == "" || $respuesta == ""){
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Existen campos obligatorios que estan vacíos",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    if (modeloPrincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{3,20}",modeloPrincipal::decryption($respuesta))) {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo Respuesta de la primera pregunta no  cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    if ($respuesta !== $repetir_respuesta) {
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"Las respuestas de las preguntas de seguridad no coinciden, verificar por favor", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>'; 
        exit();
    }
    //datos verificados modificar
    if (modeloPrincipal::UpdateSQL("usuario","id_seguridad = '$pregunta', respuesta = '$respuesta'","id_usuario = $_SESSION[user_id]")) {
        echo '<script type="text/javascript">
                swal({
                    title:"¡Modificacion exitosa!",
                    text:"Los datos se modificaron correctamente",
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
        exit();
    } else {
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Los datos no se modificaron, verifique he intente nuevamente",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
}
/* ----------------- modulo para cambiar el estado de un usuario ------------------ */
$id_usuario = modeloprincipal::limpiar_cadena($_POST["id_usuario"]);

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("usuario","estado = '0'", "id_usuario = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Cuenta Desactivada!", 
                        text:"La cuenta del usuario se inactivo exitosamente", 
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
    if(modeloprincipal::UpdateSQL("usuario","estado = '1'", "id_usuario = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Cuenta activada!", 
                        text:"La cuenta del usuario se activo exitosamente", 
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