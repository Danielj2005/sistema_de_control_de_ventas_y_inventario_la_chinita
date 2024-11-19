<?php
// en este controlador se maneja la logica para el cambio de estado de varios registros
session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");


$modulo = strval($_POST['modulo']);
$tabla = strval($_POST['tabla']);
$id = modeloPrincipal::limpiar_cadena($_POST["id"]);
            
$id_tablas  = ['categoria' => 'id_categoria',
            'menu' => 'id_menu'];


$titulo_activado = ['categoria' => '¡Categoría Activada!',
            'menu' => '¡Servicio Activado!'];

$titulo_desactivado = ['categoria' => '¡Categoría Desactivada!',
            'menu' => '¡Servicio Desactivado!'];


$texto_activado = ['categoria' => 'La categoría se activo exitosamente',
            'menu' => 'El servicio se activo exitosamente'];

$texto_desactivado = ['categoria' => 'La categoría se desactivo exitosamente',
            'menu' => 'El servicio se desactivo exitosamente'];

$estado = ['categoria' => 'estado',
            'menu' => 'estatus'
];

/* ----------------- modulo para cambiar el estado de un registro ------------------ */

if ($modulo == "activo"){

    if(modeloPrincipal::UpdateSQL("$tabla","".$estado[$tabla]." = '0'", "".$id_tablas[$tabla]." = '$id'")){
        echo '<script type="text/javascript">
                swal({ 
                    title: "'.$titulo_desactivado[$tabla].'", 
                    text: "'.$texto_desactivado[$tabla].'", 
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

if ($modulo == "inactivo"){

    if(modeloPrincipal::UpdateSQL("$tabla","".$estado[$tabla]." = '1'", "".$id_tablas[$tabla]." = '$id'")){
        echo '<script type="text/javascript">
                swal({ 
                    title: "'.$titulo_activado[$tabla].'", 
                    text: "'.$texto_activado[$tabla].'", 
                    type: "success", 
                    confirmButtonText: "Aceptar" 
                },
                function(isConfirm){  
                    if (isConfirm) {     
                        window.location.reload();
                    } else {    
                        window.location.reload();
                    } 
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