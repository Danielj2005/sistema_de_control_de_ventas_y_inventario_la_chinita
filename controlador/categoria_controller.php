<?php 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");


// $sql = ("SELECT * FROM categoria");
//  $resultado = mysqli_query($conn, $sql);

//   while ($mostrar= mysqli_fetch_array($resultado)) {

//  $mostrar['id_categoria'];
//  $o =  $mostrar['id_categoria'] + 1;
// }

$nombre = modeloPrincipal::limpiar_mayusculas($_POST['nombre']);

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
// verificar que los datos cumplen con los parametros de formato
if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,30}", $nombre)) {
    echo'<script type="text/javascript">
        swal({
            title: "¡Ocurrio un error!",
            text: "El campo NOMBRE DE LA CATEGORÍA no cumple con el formato establecido",
            type: "error",
            confirmBottonText: "Aceptar"
        });
    </script>';
    exit();
}
if (modeloPrincipal::InsertSQL("categoria", "nombre" ,"'$nombre'")) {
    echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"La Categoría Se a Añadido Exitosamente",
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