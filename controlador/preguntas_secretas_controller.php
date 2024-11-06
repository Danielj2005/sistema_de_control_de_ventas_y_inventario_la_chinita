<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once ("../modelo/modeloPrincipal.php");
require_once ('../include/datos_usuario_include.php');

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);
$primer_inicio = $_POST["primer_inicio"];

// modulo para Modificar informacion de un usuario
if($modulo == "pregunta_seguridad"){

    $id_usuario = modeloPrincipal::limpiar_cadena($_POST['id_usuario']);
    // preguntas de seguridad seleccionadas y  respuestas del usuario 
    $preguntas = $_POST["pregunta"];
    $respuestas = $_POST["respuesta"];  
    
    //datos verificados modificar
    for ($i = 1; $i < 4; $i++) { 
        // Verificamos si la pregunta es automática o no

        // se verifica si se recibieron campos vacios
        
        if($respuestas[$i] == ""){
            echo "<script type='text/javascript'>
                swal({
                    title: 'Atención!',
                    text: 'Las respuesta ".$i." no puede estar vacias ',
                    type: 'warning',
                    confirmButtonText: 'Confirmar'
                });
            </script>";
            exit();
        }
        if($preguntas[$i] == ""){
            echo "<script type='text/javascript'>
                swal({
                    title: 'Atención!',
                    text: 'Las preguntas ".$i." no pueden estar vacias',
                    type: 'warning',
                    confirmButtonText: 'Confirmar'
                });
            </script>";
            exit();
        }
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0 ]{3,50}$/",$respuestas[$i])) {
            echo "<script type='text/javascript'>
                swal({
                    title: 'Atención!',
                    text: 'La respuesta ".$i." no cumple con el formato establecido',
                    type: 'warning',
                    confirmButtonText: 'Confirmar'
                }); 
            </script>";
            exit();
        }
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ?¿]{8,80}$/",$preguntas[$i])) {
            echo "<script type='text/javascript'>
                swal({
                    title: 'Atención!',
                    text: 'La pregunta ".$pregunta[$i]." no cumple con el formato establecido',
                    type: 'warning',
                    confirmButtonText: 'Confirmar'
                });
            </script>";
            exit();
        }
        $respuestas[$i] = strtoupper($respuestas[$i]);  

        //verificamos que si la pregunta es automatica o no, si es automatica consultamos la base de datos y vemos si todas las preguntas recibidas son iguales a las que estan en en la base de datos

        //lo hice de esta manera porque no me queria agarrar de otra forma la vidacion si lo logran acomodar en un futuro seria bueno jajajajjaja ;D suerte 
        
        $preguntas_sistema = modeloPrincipal::consultar("SELECT pregunta FROM seguridad WHERE pregunta='".modeloPrincipal::encryption($preguntas[$i])."'");
        // $preguntas_sistema = mysqli_fetch_array($preguntas_sistema);
        
        if (mysqli_num_rows($preguntas_sistema) < '1'){
            echo "<script type='text/javascript'>
                swal({
                    title: 'Atención!',
                    text: 'Alguna de las preguntas fue alterada de manera incorrecta y no coinciden con las que están registradas en el sistema. Se cerrara tu sesión por motivos de seguridad.',
                    type: 'error',
                    confirmButtonText: 'Confirmar'
                },
                function(isConfirm){
                    if (isConfirm){
                        window.location = '../';
                    } else {
                        window.location = '../';
                    } 
                });
            </script>";
            
            session_destroy();
            exit();
        }
    }

    // se registran los datos que se recibieron y fueron validados
    if ($primer_inicio == '1') {
        for ($i = 1; $i < 4; $i++) {
            $preguntas_sistema = modeloPrincipal::consultar("SELECT id_seguridad FROM seguridad 
                WHERE pregunta = '".modeloPrincipal::encryption($preguntas[$i])."'");
            
            $preguntas_sistema = mysqli_fetch_array($preguntas_sistema);
            $id_pregunta = $preguntas_sistema['id_seguridad'];

            if (modeloPrincipal::InsertSQL("preguntas_secretas","id_pregunta,respuesta,numero_pregunta,id_usuario","'$id_pregunta','".modeloPrincipal::encryption($respuestas[$i])."','$i','$id_usuario'")) {
                modeloPrincipal::UpdateSQL("usuario","primer_inicio = 0","  id_usuario = '$id_usuario'");
                echo '<script type="text/javascript">
                    swal({
                        title:"¡Registro exitoso!",
                        text:"Los datos se registraron correctamente",
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
            } else {
                echo '<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "Los datos no se modificaron, verifique he intente nuevamente",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }  


        }


    }else{
        for ($i = 1; $i < 4; $i++) {
            $preguntas_sistema = modeloPrincipal::consultar("SELECT id_seguridad FROM seguridad 
                WHERE pregunta = '".modeloPrincipal::encryption($preguntas[$i])."'");
                
            $preguntas_sistema = mysqli_fetch_array($preguntas_sistema);
            $id_pregunta = $preguntas_sistema['id_seguridad'];

            if (modeloPrincipal::UpdateSQL("preguntas_secretas","id_pregunta = '$id_pregunta', respuesta = '".modeloPrincipal::encryption($respuestas[$i])."'","numero_pregunta = '$i' AND id_usuario = '$id_usuario'")) {
                echo '<script type="text/javascript">
                    swal({
                        title: "¡Modificacion exitosa!",
                        text: "Los datos se modificaron correctamente",
                        type: "success",
                        confirmButtonText: "Aceptar"
                    },
                    function(isConfirm){  
                        if (isConfirm){     
                            location.reload();
                        } else {    
                            location.reload();
                        } 
                    });
                </script>';

            } else {
                echo '<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "Los datos no se modificaron, verifique he intente nuevamente",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }
        }
    }
}
