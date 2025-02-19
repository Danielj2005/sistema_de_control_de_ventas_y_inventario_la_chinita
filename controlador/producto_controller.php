<?php 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$modulo = $_POST['modulo'];

if($modulo === 'Guardar'){
    
    $codigo = $_POST['codigo_producto'];
    $id_categoria = $_POST['id_categoria'];
    $id_presentacion = $_POST['id_presentacion'];
    $nombre_producto = modeloPrincipal::limpiar_mayusculas($_POST['nombre_producto']);
    $vista = $_POST['vista'];

    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloprincipal::consultar("SELECT codigo FROM producto WHERE codigo = '$codigo'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya se encuentra Registrado un producto con ese nombre, por favor ingresa otro", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit(); 
    }
    // verificar datos
    if($id_categoria == "" || $nombre_producto == "" || $codigo == "" || $id_presentacion == ""){
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
    if (modeloprincipal::verificar_datos("[0-9]{5,18}",$codigo)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo código no cumple con el formato requerido, el mínino es de 5 dígitos por favor verifique e intente de nuevo ",
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
    if (modeloPrincipal::InsertSQL("producto", "id_categoria, codigo, nombre_producto, id_presentacion, precio_compra_dolar, precio_compra_bs, stock, estatus", "'$id_categoria', '$codigo', '$nombre_producto', '$id_presentacion', '0', '0', '0',1")) {
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro exitoso!",
                text:"Los datos se registraron correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {
                    '. $vista = ($vista == "añadir_producto") ? '"window.location="../vista/productos.php";' : 'location.reload();'.'
                } else { 
                    '. $vista = ($vista == "añadir_producto") ? '"window.location="../vista/productos.php";' : 'location.reload();'.'
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
