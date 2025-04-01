<?php

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// modulo a trabajar
$modulo = modeloPrincipal::limpiar_cadena($_POST["modulo"]);

if($modulo == 'Guardar'){
    // estos datos se guardan en la tabla menu de la base de datos
    $nombre_platillo = modeloprincipal::limpiar_mayusculas($_POST['nombre_platillo']);
    // $precio = $_POST['precio'];
    $descripcion = modeloprincipal::limpiar_mayusculas($_POST['descripcion']);
    //  datos de los productos a ingresar en el platillo
    $id_productos = $_POST['producto'];
    $cantidad_productos = $_POST['cantidad_producto'];

    $precio_dolar = $_POST['precio_dolar'];
    $precio_bolivar = $_POST['precio_bolivar'];
    
    if($nombre_platillo == "" || $id_productos == "" || $cantidad_productos == "" || $descripcion == ""){
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio una error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    $existe_platillo = modeloPrincipal::Consultar("SELECT id_menu FROM menu WHERE nombre_platillo = '$nombre_platillo'");

    if(mysqli_num_rows($existe_platillo) > 0){
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"Ya se encuentra registrado un platillo con ese nombre, por favor ingresa otro", 
                type: "error", 
                confirmButtonText: "Aceptar"
            });
            </script>'; 
        exit(); 
    }
    
    // se registran los datos verificados
    if (modeloPrincipal::InsertSQL( "menu","nombre_platillo,precio_dolar,descripcion,estatus","'$nombre_platillo','$precio_dolar','$descripcion','1'")) {
        // se consulta la bd para traer la id del platillo recien registrado 
        
        $id_menu = mysqli_fetch_array(modeloPrincipal::Consultar("SELECT MAX(id_menu) AS id_menu FROM menu"));
        $id_menu = $id_menu['id_menu'];
        $j = 1;
        for($i = 0; $i < COUNT($cantidad_productos); $i++){
            modeloPrincipal::InsertSQL("detalles_menu","id_producto,cantidad,numero_detalles_menu,id_menu","".$id_productos[$i].",".$cantidad_productos[$i].",".$j++.",'$id_menu'");
        }
        // se guarda en bitacora el registro de un servicio 
        modeloPrincipal::bitacora("Registro de un servicio","El usuario registró un servicio con la siguiente información: \n\nNombre del platillo: $nombre_platillo \nPrecio en dolares: $precio_dolar$ \nDescripción: $descripcion \nEstado: activo");
        
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
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
    }else{ // mensaje de error "no se pudo registrar"
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "los datos no se pudieron registrar, verifique he intente de nuevo",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
}

if($modulo == 'Modificar'){
    // estos datos se guardan en la tabla menu de la base de datos

    $id_servicio = modeloprincipal::limpiar_mayusculas($_POST['id_menu']);
    $nombre_platillo = modeloprincipal::limpiar_mayusculas($_POST['nombre_platillo']);
    $estado_menu = modeloprincipal::limpiar_mayusculas($_POST['estado_menu']);

    $descripcion = modeloprincipal::limpiar_mayusculas($_POST['descripcion']);

    //  datos de los productos a ingresar en el platillo
    $id_productos = $_POST['producto']; // se recibe un array de las id de productos del servicio
    $cantidad_productos = $_POST['cantidad_producto']; // se recibe un array de la cantidad productos del servicio

    $precio_dolar = $_POST['precio_dolar'];
    $precio_bolivar = $_POST['precio_bolivar'];

    if($id_servicio == "" || $nombre_platillo == ""|| $descripcion == "" || empty($estado_menu) || empty($precio_dolar)){
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio una error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    $existe_platillo = modeloPrincipal::Consultar("SELECT * FROM menu WHERE nombre_platillo = '$nombre_platillo'");

    if(mysqli_num_rows($existe_platillo) > 1){
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"Ya se encuentra registrado un platillo con ese nombre, por favor ingresa otro", 
                type: "error", 
                confirmButtonText: "Aceptar"
            });
            </script>'; 
        exit(); 
    }
    $existe_platillo = mysqli_fetch_array(modeloPrincipal::Consultar("SELECT * FROM menu WHERE id_menu = $id_servicio"));
    $existe_platillo_nombre_platillo = $existe_platillo['nombre_platillo'];
    $existe_platillo_precio_dolar = $existe_platillo['precio_dolar'];
    $existe_platillo_descripcion = $existe_platillo['descripcion'];
    $existe_platillo_estatus = $existe_platillo['estatus'];


    // se registran los datos verificados
    if (modeloPrincipal::UpdateSQL( "menu","nombre_platillo = '$nombre_platillo',precio_dolar = '$precio_dolar',descripcion = '$descripcion',estatus = $estado_menu","id_menu = $id_servicio")) {
        $estado_menu = ($estado_menu == '1') ? 'activo' : 'inactivo' ;
        $existe_platillo_estatus = ($existe_platillo_estatus == '1') ? 'activo' : 'inactivo' ;

        // modeloPrincipal::bitacora("Modificación de un servicio","El usuario actualizó la información de un servicio de: (nombre del platillo: $existe_platillo_nombre_platillo, precio en dolares: $existe_platillo_precio_dolar, descripción: $existe_platillo_descripcion, estado: $existe_platillo_estatus) a: (nombre del platillo: $nombre_platillo, precio en dolares: $precio_dolar, descripción: $descripcion, estado: $estado_menu).");
        modeloPrincipal::bitacora("Modificación de un servicio","El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: $existe_platillo_nombre_platillo \nPrecio en dolares: $existe_platillo_precio_dolar$ \nDescripción: $existe_platillo_descripcion. \nEstado: $existe_platillo_estatus \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: $nombre_platillo \nPrecio en dolares: $precio_dolar$ \nDescripción: $descripcion \nEstado: $estado_menu");
        
        echo '<script type="text/javascript">
            swal({
                title:"Modificación Exitosa!",
                text:"Los datos se actualizaron correctamente",
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
    }else{ // mensaje de error "no se pudo registrar"
        echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "los datos no se pudieron registrar, verifique he intente de nuevo",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
}
