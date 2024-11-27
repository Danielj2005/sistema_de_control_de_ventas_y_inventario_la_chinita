<?php

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

date_default_timezone_set('America/caracas');

$priceUpdate = floatval($_POST['priceDolar']);
$datePrice = date('Y-m-d H:i:s');
if(empty($priceUpdate)){
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Existen campos obligatorios del cliente que están vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}
// verificar que los datos cumplen con los parametros de formato
if (modeloPrincipal::verificar_datos("[0-9\.]{2,5}", $priceUpdate)) {
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo precio no cumple con el formato establecido, en este solo se debe ingresar números enteros o decimales con un . por ejemplo(45.6)",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}
if (modeloPrincipal::InsertSQL("dolar","dolar, fecha_precio","$priceUpdate,'$datePrice'")) {
    echo '<script type="text/javascript">
        swal({
            title:"¡Registro de la Tasa Exitoso!",
            text:"La Tasa se registro exitosamente",
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
}else{ /* mensaje de error "no se pudo registrar" */
    echo'<script type="text/javascript">
        swal({
            title: "¡Ocurrio un error!",
            text: "la Tasa no se pudo registrar, verifique he intente de nuevo ",
            type: "error",
            confirmBottonText: "Aceptar"
        });
    </script>';
    exit();
}