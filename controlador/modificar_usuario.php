<?php 

session_start();

include_once ("../config/ConfigServer.php");
include_once ("../modelo/modeloPrincipal.php");


/*********************************** se recibe la información del usuario ***********************************/
$id_usuario = modeloPrincipal::LimpiarCadenaTexto($_POST["id_usuario"]);
$cambiar_estado = modeloPrincipal::LimpiarCadenaTexto($_POST["cambiar_estado"]);
$permitir_acceso = modeloPrincipal::LimpiarCadenaTexto($_POST["permitir_acceso"]);
$asignar_rol = modeloPrincipal::LimpiarCadenaTexto($_POST["asignar_rol"]);

/******************************************** Verificación de datos ********************************************/
// se verifica si se recibieron campos vacios 
if($id_usuario == "" || $cambiar_estado == "" || $permitir_acceso == "" || $asignar_rol == "" ){
    echo "<script type='text/javascript'>
        swal({
            title: 'Ocurrio un error!',
            text: 'Existen campos que se encuentran vacíos, verifique e intente nuevamente',
            type: 'warning',
            confirmButtonText: 'Confirmar'
            });
        </script>";
    exit();
}

// se modifican los datos verificados

if (modeloPrincipal::UpdateSQL("usuario","estado = $cambiar_estado, inhabilitado = $permitir_acceso, id_rol = $asignar_rol","id_usuario = $id_usuario")) {
    
    echo "<script type='text/javascript'>
        swal({
            title: 'Modificación exitosa!',
            text: 'Los datos se modificaron de manera correcta',
            type: 'success',
            confirmButtonText: 'Confirmar'
        },
        function(isConfirm){  
            if (isConfirm) {
                location.reload();
            }else {    
                location.reload();
            } 
        });
        </script>";
    exit();
} else {
    echo "<script type='text/javascript'>
        swal({
            title: 'Ocurrio un error!',
            text: 'Ocurrio un error, vuelva a intentar',
            type: 'error',
            confirmButtonText: 'Confirmar'
            });
        </script>";
    exit();
}
