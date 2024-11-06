<?php 

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$modulo = modeloPrincipal::limpiar_cadena($_POST['modulo']);

if($modulo === 'Guardar'){
    
    $id = modeloPrincipal::limpiar_cadena($_POST['id']);
    $cedula = modeloPrincipal::limpiar_cadena($_POST['cedula']);
    $nombre = modeloPrincipal::limpiar_cadena($_POST['nombre']);
    $telefono = modeloPrincipal::limpiar_cadena($_POST['telefono']);
    
    // verificar datos
    if($nombre == "" || $telefono == ""){
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
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE no cumple con el formato requerido, por favor verifique e intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    //datos verificados modificar
    if (modeloprincipal::UpdateSQL("cliente","nombre = '$nombre', telefono ='$telefono'", "id_cliente = $id")) {
        echo '<script type="text/javascript">
            swal({
                title:"¡Modificacion exitosa!",
                text:"Los datos se modificaron correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {
                    window.location="../vista/cliente.php";
                } else { 
                    window.location="../vista/cliente.php";
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
