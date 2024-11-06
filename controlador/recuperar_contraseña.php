<?php 

include_once ("../config/ConfigServer.php");
include_once ("../modelo/modeloPrincipal.php");
/* se recibe el modulo a trabajar */
$modulo = modeloPrincipal::LimpiarCadenaTexto($_POST['modulo']);

/*******************************************************************/ 
/* MODULO DE RECUPERACION DE CONTRASEÑA POR PREGUNTAS SECRETAS     */
/*******************************************************************/ 
if($modulo == 'verificar_preguntas'){
    if(!isset($_POST['respuesta_seguridad']) || empty($_POST['respuesta_seguridad'])){
        echo "<script type='text/javascript'>
            swal({
                title: '¡Ocurrio un error!',
                text: 'Exiten Campos obligatorios Que Estan Vacíos',
                type: 'error',
                confirmBottonText: 'Aceptar'
            });
        </script>";
        exit();
    }

    $id_usuario = $_POST['id_usuario'];

    $numero_pregunta = $_POST['numero_pregunta'];
    
    $respuesta_pregunta = strtoupper(modeloPrincipal::LimpiarCadenaTexto($_POST['respuesta_seguridad'])); 
    
    // se hace una consulta para saber si el preguntas que inicia sesion esta registrado
    $existe_respuesta = mysqli_fetch_array(modeloPrincipal::consultar("SELECT respuesta FROM preguntas_secretas WHERE id_usuario = '$id_usuario' AND numero_pregunta = '$numero_pregunta'"));
    $existe_respuesta = modeloPrincipal::decryption($existe_respuesta['respuesta']);

    // si las respuestas coinciden se envia una alerta de validacion exitosa
    if ($existe_respuesta == $respuesta_pregunta) {
        echo "<script type='text/javascript'>
                swal({
                    title:'Verificación Exitosa!',
                    text: 'La respuesta a la pregunta de seguridad se ha verificado correctamente.',
                    type: 'success',
                    confirmButtonColor: '#10478e',
                },
                function(isConfirm){  
                    if (isConfirm) {
                        document.getElementById('verificar_respuestas').classList.add('d-none');
                        
                        document.getElementById('cambiar_contraseña').classList.remove('d-none');
                    }
                });
            </script>";
        exit();
    }else{
        echo "<script type='text/javascript'>
            swal({
                title: '¡Ocurrio  error!',
                text: 'La Respuesta no coincide con la que esta registrada en nuestro sistema, verifique he intente nuevamente.',
                type: 'error'
            });
        </script>";
        exit();
    }
}



/*******************************************************************/ 
/*          modulo para Cambiar Contraseña del usuario             */
/*******************************************************************/ 
if($modulo === "cambiar_contraseña"){

    $contraseña = modeloPrincipal::LimpiarCadenaTexto($_POST['nueva_contraseña']);
    $contraseña2 = modeloPrincipal::LimpiarCadenaTexto($_POST['repite_nueva_contraseña2']);
    $id_usuario = $_POST['id_usuario'];

    
    if($contraseña !== $contraseña2){
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Las contraseñas que ingresaste no coinciden. Por favor, verifica que las hayas escrito correctamente.",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }

    // verificar datos
    if (modeloPrincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\*\.]{7,16}",$contraseña)) {
        echo '<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "La contraseña no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    $contraseña = modeloPrincipal::encryption($contraseña);

    // actualizar contraseña
    if(modeloPrincipal::UpdateSQL("usuario","contraseña = '$contraseña'","id_usuario = '$id_usuario'")){
        // modeloPrincipal::UpdateSQL("usuario","sesion_activa = '0',inabilitado = '0'","id = '$id_usuario'");
        echo '<script type="text/javascript">
            swal({
                title: "¡Modificación exitosa!",
                text: "Los datos se modificaron correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
                function(isConfirm){  
                    if (isConfirm) {     
                        window.location="../index.php";
                    } else {    
                        window.location="../index.php";
                    } 
                });
            </script>';
        session_unset();
        session_destroy();
        exit();
    }else {// mensaje de alerta en caso de error
        echo '<script type="text/javascript"> 
                swal({
                    title: "¡Ocurrió un error!",
                    text: "Los datos no se modificaron, verifique e intente nuevamente",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
}

