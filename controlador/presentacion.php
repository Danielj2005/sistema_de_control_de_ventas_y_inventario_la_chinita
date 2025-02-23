<?php 

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$modulo = modeloPrincipal::limpiar_cadena($_POST['modulo']);

if($modulo === 'guardar'){
    
    $nombre = modeloPrincipal::limpiar_mayusculas($_POST['nombre_presentacion']);
    
    $presentaciones = modeloPrincipal::Consultar("SELECT id FROM presentacion 
        WHERE nombre = '$nombre'");
    
    if(mysqli_num_rows($presentaciones) > 0){
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Ya existe una presentación con este nombre.",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }

    // verificar datos
    if($nombre == "" ){
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

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9 ]{3,20}",$nombre)) {
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
    if (modeloprincipal::InsertSQL("presentacion","nombre", "'$nombre'")) {
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
