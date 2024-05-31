<?php 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");


  $consulta = modeloPrincipal::consultar ("SELECT id_producto FROM producto");

   while ($mostrar= mysqli_fetch_array($consulta)) {

 $mostrar['id_producto'];
 $o =  $mostrar['id_producto'] + 1;
 }

$nombre = modeloPrincipal::limpiar_mayusculas($_POST['nombre']);

$id = $_POST['id'];

// verificar que no se hayan recibido datos en blanco o vacios 
if($nombre == ''){
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Existen campos obligatorios que están vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}
if($id == ''){
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Existen campos obligatorios que están vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}
// verificar que los datos cumplen con los parametros de formato
if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,30}", $nombre)) {
    echo'<script type="text/javascript">
        swal({
            title: "¡Ocurrio un error!",
            text: "El campo NOMBRE DEL PRODUCTO no cumple con el formato establecido",
            type: "error",
            confirmBottonText: "Aceptar"
        });
    </script>';
    exit();
}
if (modeloPrincipal::InsertSQL("producto", "id_producto, id_categoria, nombre_producto, precio_compra, stock, estatus", "'$o', '$id', '$nombre', '0', '0', 'INACTIVO'")) {
    echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"El PRODUCTO Se a Añadido Exitosamente",
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
            $(".SendFormAjax")[0].reset();
        </script>';
    exit();
} else {
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron Guardar, verifique he intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}


?>