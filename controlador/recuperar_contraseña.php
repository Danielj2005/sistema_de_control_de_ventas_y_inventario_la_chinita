<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

/* se recibe el modulo a trabajar */
$modulo = modeloPrincipal::LimpiarCadenaTexto($_POST['modulo']);

/*******************************************************************/ 
/* MODULO DE RECUPERACION DE CONTRASEÑA POR PREGUNTAS SECRETAS     */
/*******************************************************************/ 
if($modulo == 'verificar_preguntas'){
    
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$_POST['respuesta_seguridad']]);
    
    $id_usuario = $_POST['id_usuario'];
    $_SESSION['id_usuario'] = $_POST['id_usuario'];

    $numero_pregunta = $_POST['numero_pregunta'];
    
    $respuesta_pregunta = modeloPrincipal::Limpiar_mayusculas($_POST['respuesta_seguridad']); 
    
    // se hace una consulta para saber si el preguntas que inicia sesion esta registrado
    $existe_respuesta = mysqli_fetch_array(modeloPrincipal::consultar("SELECT respuesta FROM preguntas_secretas WHERE id_usuario = '$id_usuario' AND numero_pregunta = '$numero_pregunta'"));
    $existe_respuesta = modeloPrincipal::decryption($existe_respuesta['respuesta']);

    // si las respuestas coinciden se envia una alerta de validacion exitosa
    if ($existe_respuesta == $respuesta_pregunta) {
        alert_model::alerta_condicional('¡Verificación Exitosa!','La respuesta a la pregunta de seguridad se ha verificado correctamente.','success',"show_form_password();");
        exit();
    }else{
        alert_model::alerta_simple("¡Ocurrió un error!","La Respuesta no coincide con la que esta registrada en nuestro sistema, verifique he intente nuevamente.","error");
        exit();
    }
}



/*******************************************************************/ 
/*          modulo para Cambiar Contraseña del usuario             */
/*******************************************************************/ 
if($modulo === "cambiar_contraseña"){

    $contraseña = modeloPrincipal::LimpiarCadenaTexto($_POST['nueva_contraseña']);
    $contraseña2 = modeloPrincipal::LimpiarCadenaTexto($_POST['repite_nueva_contraseña2']);
    $id_usuario =  modeloPrincipal::LimpiarCadenaTexto($_SESSION['id_usuario']);


    $configuracion = mysqli_fetch_array(config_model::consultar('c_caracteres'));

    $cant_caracteres = intval($configuracion['c_caracteres']);

    if($contraseña !== $contraseña2){
        alert_model::alerta_simple("¡Ocurrió un error!","Las contraseñas que ingresaste no coinciden. Por favor, verifica que las hayas escrito correctamente.","error");
        exit();
    }

    // verificar datos
    if (modeloPrincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\*\.]{3,16}",$contraseña)) {
        alert_model::alerta_simple("¡Ocurrió un error!","La contraseña no cumple con el formato establecido. ","error");
        exit();
    }

    // Verificar si la contraseña cumple con la nueva longitud mínima
    if (strlen($contraseña) < $cant_caracteres) {
        alert_model::alerta_simple(
            "¡Advertencia!",
            "La longitud de su contraseña actual no cumple con los nuevos requisitos del sistema. Por favor, actualice su contraseña a una longitud mínima de $cant_caracteres caracteres.",
            "warning"
        );
    }

    $contraseña = modeloPrincipal::encryption($contraseña);

    // actualizar contraseña
    if(modeloPrincipal::UpdateSQL("usuario","contraseña = '$contraseña'","id_usuario = '$id_usuario'")){
        alert_model::alert_redirect('¡Modificación exitosa!','Los datos se modificaron correctamente.','success',"../");
        session_unset();
        session_destroy();
        exit();
    }else {
        alert_model::alert_mod_error();
        exit();
    }
}

