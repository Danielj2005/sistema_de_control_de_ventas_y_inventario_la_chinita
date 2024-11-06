<?php 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$modulo = $_POST['modulo'];

if($modulo === 'Guardar'){
    
    $id_categoria = $_POST['id_categoria'];
    $nombre_producto = strtoupper(modeloPrincipal::limpiar_cadena($_POST['nombre_producto']));
    
    // verificar datos
    if($id_categoria == "" || $nombre_producto == ""){
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
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre_producto)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo nombre no cumple con el formato requerido, por favor verifique e intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    //datos verificados modificar
    if (modeloPrincipal::InsertSQL("producto", "id_categoria, nombre_producto, precio_compra_dolar, precio_compra_bs, stock, estatus", "'$id_categoria', '$nombre_producto', '0', '0', '0',0")) {
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro exitoso!",
                text:"Los datos se registraron correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {
                    window.location="../vista/productos.php";
                } else { 
                    window.location="../vista/productos.php";
                } 
            });
        </script>';
        exit();
    } else {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Los datos no se registraron, verifique he intente nuevamente",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}
