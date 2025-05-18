<?php 
session_start();

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

if($modulo == 'Guardar'){
    // estos datos se guardan en la tabla menu de la base de datos
    $nombre_platillo = modeloprincipal::limpiar_mayusculas($_POST['nombre_platillo']);
    $descripcion = modeloprincipal::limpiar_mayusculas($_POST['descripcion']);

    //  datos de los productos a ingresar en el platillo
    $id_productos = $_POST['id_producto'];
    $cantidad_productos = $_POST['cantidad'];

    $precio_dolar = $_POST['precio_dolar'];
    $precio_bolivar = $_POST['precio_bolivar'];
    
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre_platillo, $descripcion, $id_productos, $cantidad_productos]);
    
    $existe_platillo = modeloPrincipal::Consultar("SELECT id_menu FROM menu WHERE nombre_platillo = '$nombre_platillo'");

    if(mysqli_num_rows($existe_platillo) > 0){
        alert_model::alert_register_exist();
        exit(); 
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre_platillo)) {
        alert_model::alert_of_format_wrong("'nombre'");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,250}",$descripcion)) {
        alert_model::alert_of_format_wrong("'descripción'");
        exit();
    }
        
    // se registran los datos del presentación
    try {
        $registrar = servicio_model::registrar( $nombre_platillo, $precio_dolar,$descripcion);
        
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar el servicio.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el servicio debido a un error de consulta.", "error");
        exit();
    }

    $id_servicio = modeloPrincipal::obtener_id_recien_registrado("id_menu", "menu");
    
    try {

        for($i = 0; $i < count($cantidad_productos); $i++){
            modeloPrincipal::InsertSQL("detalles_menu","id_producto, cantidad, id_menu","".$id_productos[$i].",".$cantidad_productos[$i].",'$id_servicio'");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el servicio debido a un error de consulta.", "error");
        exit();
    }

    // se realiza la bitácora con los datos del servicio a registrar
    try {
        $mensaje = '';

        $datos_servicio = mysqli_fetch_array(servicio_model::consultar_por_id("*", $id_servicio));
        $datos_servicio['estatus'] = $datos_servicio['estatus'] == 1 ? 'Activo' : 'Inactivo';

        $detalles_menu = modeloPrincipal::consultar("SELECT P.nombre_producto AS producto,
            PS.nombre AS presentacion, C.nombre AS categoria, DM.cantidad
            FROM `detalles_menu` AS DM
            INNER JOIN producto AS P ON P.id_producto = DM.id_producto
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
            INNER JOIN menu AS M ON M.id_menu = DM.id_menu 
            WHERE DM.id_menu = $id_servicio
            ");
        
        while ($row = mysqli_fetch_array($detalles_menu)) {
            $mensaje .= '<tr>
                            <td class="text-center">'.$row['producto'].' '.$row['presentacion'].'</td>
                            <td class="text-center">'.$row['categoria'].'</td>
                            <td class="text-center">'.$row['cantidad'].'</td>
                        </tr>';
        }

        bitacora::bitacora("Registro exitoso de un nuevo servicio.",'Se registro un servicio con la siguiente informacón: <br><br>
        <b>****** Información del servicio:   ******</b><br>
        Nombre: <b>'.$datos_servicio['nombre_platillo'].' </b><br>
        Descripción: <b>'.$datos_servicio['descripcion'].' </b><br>
        Precio en $: <b>'.$datos_servicio['precio_dolar'].' $</b><br>
        Estado: <b>Activo </b><br><br>

        <label><b>****** Detalles del servicio: ******</b></label><br><br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col text-center" scope="col">PRODUCTO</th>
                <th class="col text-center" scope="col">CATEGORÍA</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
            </tr>
            </thead>
            <tbody>
                '.$mensaje.'
            </tbody>
        </table>
        <br><br>
        ');

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
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


    $id_servicio = modeloPrincipal::obtener_id_recien_registrado("id_menu", "menu");
    $datos_originales = mysqli_fetch_array(servicio_model::consultar_por_id("*", $id_servicio));
    $datos_originales['estatus'] = $datos_originales['estatus'] == 1 ? 'Activo' : 'Inactivo';

    
    $datos_actuales = mysqli_fetch_array(servicio_model::consultar_por_id("*", $id_servicio));
    $datos_actuales['estado'] = $datos_actuales['estado'] == 1 ? 'Activo' : 'Inactivo';




    // se registran los datos verificados
    if (modeloPrincipal::UpdateSQL( "menu","nombre_platillo = '$nombre_platillo',precio_dolar = '$precio_dolar',descripcion = '$descripcion',estatus = $estado_menu","id_menu = $id_servicio")) {
        $estado_menu = ($estado_menu == '1') ? 'activo' : 'inactivo' ;
        $existe_platillo_estatus = ($existe_platillo_estatus == '1') ? 'activo' : 'inactivo' ;

        // modeloPrincipal::bitacora("Modificación de un servicio","El usuario actualizó la información de un servicio de: (nombre del platillo: $existe_platillo_nombre_platillo, precio en dolares: $existe_platillo_precio_dolar, descripción: $existe_platillo_descripcion, estado: $existe_platillo_estatus) a: (nombre del platillo: $nombre_platillo, precio en dolares: $precio_dolar, descripción: $descripcion, estado: $estado_menu).");
        bitacora::bitacora("Modificación de un servicio","El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: $existe_platillo_nombre_platillo \nPrecio en dolares: $existe_platillo_precio_dolar$ \nDescripción: $existe_platillo_descripcion. \nEstado: $existe_platillo_estatus \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: $nombre_platillo \nPrecio en dolares: $precio_dolar$ \nDescripción: $descripcion \nEstado: $estado_menu");
        
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
