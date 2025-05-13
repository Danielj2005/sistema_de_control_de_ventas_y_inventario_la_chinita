<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

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

$existe_platillo = mysqli_fetch_array(modeloPrincipal::consultar("SELECT * FROM menu WHERE id_menu = $id"));
$existe_platillo_nombre_platillo = $existe_platillo['nombre_platillo'];
$existe_platillo_precio_dolar = $existe_platillo['precio_dolar'];
$existe_platillo_descripcion = $existe_platillo['descripcion'];
$existe_platillo_estatus = $existe_platillo['estatus'];

/* ----------------- modulo para cambiar el estado de un registro ------------------ */

if ($modulo == "activo"){

    if(modeloPrincipal::UpdateSQL("$tabla","".$estado[$tabla]." = '0'", "".$id_tablas[$tabla]." = '$id'")){
        // se guarda en bitacora el registro de un servicio 
        bitacora::bitacora("Cambio de estado de un servicio","El usuario cambió el estado del servicio con la siguiente información: \n\n
        Nombre del platillo: $existe_platillo_nombre_platillo \n
        Precio en dolares: $existe_platillo_precio_dolar$ \n
        Descripción: $existe_platillo_descripcion. \n
        Estado: Activo \n\n\n
        Información del servicio actualizada: \n\n
        Nombre del platillo: $existe_platillo_nombre_platillo \n
        Precio en dolares: $existe_platillo_precio_dolar$ \n
        Descripción: $existe_platillo_descripcion. \n
        Estado: Inactivo");
        
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
        bitacora::bitacora("Cambio de estado de un servicio","El usuario cambió el estado del servicio con la siguiente información: \n\n
        Nombre del platillo: $existe_platillo_nombre_platillo \n
        Precio en dolares: $existe_platillo_precio_dolar$ \n
        Descripción: $existe_platillo_descripcion. \n
        Estado: Inactivo \n\n
        Información del servicio actualizada: \n\n
        Nombre del platillo: $existe_platillo_nombre_platillo \n
        Precio en dolares: $existe_platillo_precio_dolar$ \n
        Descripción: $existe_platillo_descripcion. \n
        Estado: Activo");
        
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