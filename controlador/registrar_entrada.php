<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}


$id_usuario = $_SESSION['id_usuario'];

if($modulo == 'Guardar'){

    $tipo_compra = modeloPrincipal::limpiar_cadena($_POST['tipo_compra']);

    if ($tipo_compra != "adquisicion_propia" && $tipo_compra != "compra_proveedor") {
        alert_model::alerta_simple("¡Ocurrió un error!","El tipo de compra no es válido.","error");
        exit();
    }

    $tipo_compra = $tipo_compra === 'adquisicion_propia' ? 1 : 0;

    // datos de la entrada
    $total_dolar = $_POST['totalDolar'];
    $total_bolivar = $_POST['totalBolivar'];
    $fecha_entrada_recibida = $_POST['fecha_entrada'];
    $hora_entrada_recibida = $_POST['hora_entrada'];
    
    $fecha_entrada = date('Y-m-d H:i:s', strtotime($fecha_entrada_recibida.' '.$hora_entrada_recibida));
    
    // detalles de la entrada
    $id_productos = $_POST['id_producto'];
    $cantidad_productos = $_POST['cantidad'];
    $precio_unidad_dolar = $_POST['precio_unidad_dolar'];
    $precio_unidad_bs = $_POST['precio_unidad_bs'];

    // actualizacion para stock de productos
    $precio_venta_dolar = $_POST['precio_venta_dolar'];
    
    // cedula_rif del proveedor
    $cedula_proveedor = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
    
    // Se verifica que no se hayan recibido campos vacíos.
    
    if ($tipo_compra == 1) {
        modeloPrincipal::validar_campos_vacios([$id_productos, $cantidad_productos, $precio_unidad_dolar, $precio_unidad_bs, $precio_venta_dolar, $total_dolar, $total_bolivar, $fecha_entrada_recibida, $hora_entrada_recibida, $tipo_compra]);
    }else{
        modeloPrincipal::validar_campos_vacios([$id_productos, $cantidad_productos, $precio_unidad_dolar, $precio_unidad_bs, $precio_venta_dolar, $total_dolar, $total_bolivar, $fecha_entrada_recibida, $hora_entrada_recibida, $cedula_proveedor, $tipo_compra]);
            
        $existe_proveedor = modeloPrincipal::Consultar("SELECT id_proveedor FROM proveedor WHERE cedula_rif = '$cedula_proveedor'");
    
        if(mysqli_num_rows($existe_proveedor) < 1){
    
            $cedula = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
            $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_proveedor"]);
            $correo = modeloPrincipal::limpiar_cadena($_POST["correo"]);
            $direccion = modeloPrincipal::limpiar_mayusculas($_POST["direccion"]);
            $telefono = modeloPrincipal::limpiar_cadena($_POST["telefono"]);
    
            if (!proveedor_model::registrar ($cedula, $nombre, $correo, $telefono, $direccion)) {
                alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar el proveedor.","error");
                exit();
            }
            
            // se obtiene el id del proveedor recien registrado
            $proveedor = mysqli_fetch_array(modeloprincipal::consultar("SELECT MAX(id_proveedor) AS id_proveedor FROM proveedor"));
            $id_proveedor = $proveedor['id_proveedor'];
    
        }else {
            $id_proveedor = mysqli_fetch_array($existe_proveedor);
            $id_proveedor = $id_proveedor['id_proveedor'];
        }
    }

    $id_dolar = modeloPrincipal::obtener_id_precio_dolar();

    // se registran los datos de la entrada
    try {
        if ($tipo_compra == 1) {
            $registrar = modeloPrincipal::InsertSQL( "entrada","tipo_compra, total_dolar, total_bs, fecha_entrada, id_dolar, id_usuario","$tipo_compra, $total_dolar, $total_bolivar,'$fecha_entrada',$id_dolar, $id_usuario");
        }else{
            $registrar = modeloPrincipal::InsertSQL( "entrada","tipo_compra, id_proveedor, total_dolar, total_bs, fecha_entrada, id_dolar, id_usuario","$tipo_compra, $id_proveedor, $total_dolar, $total_bolivar,'$fecha_entrada',$id_dolar, $id_usuario");
        }
            
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar la entrada en la base de datos.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar la entrada de productos en la base de datos debido a un error de consulta.", "error");
        exit();
    }

    // se registran los detalles de la entrada
    $dolar = mysqli_fetch_array(modeloprincipal::consultar("SELECT dolar FROM dolar WHERE id_dolar = $id_dolar"));
    $dolar = $dolar['dolar'];

    $entrada = mysqli_fetch_array(modeloprincipal::consultar("SELECT MAX(id_entrada) AS id_entrada FROM entrada"));
    $id_entrada = $entrada['id_entrada'];

    try {

        for($i = 0; $i < count($cantidad_productos); $i++){

            $total_producto_dolar = $cantidad_productos[$i] * $precio_unidad_dolar[$i];
            $total_producto_bs = $total_producto_dolar * $dolar;
            // Se registran los datos verificados
            $registrar = modeloPrincipal::InsertSQL(
            "detalles_entrada",
            "id_entrada, id_producto, cantidad_comprada, precio_unitario_dolar, precio_unitario_bs, total_dolar, total_bs",
            "$id_entrada, " . modeloPrincipal::decryptionId($id_productos[$i]) . ", " . $cantidad_productos[$i] . ", " . $precio_unidad_dolar[$i] . ", " . $precio_unidad_bs[$i] . ", $total_producto_dolar, $total_producto_bs"
            );
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar los detalles de la entrada de productos.", "error");
        exit();
    }

    try {

        for($i = 0; $i < count($cantidad_productos); $i++){
            // se registra por primera vez el producto en inventario
            
            if (mysqli_num_rows(modeloprincipal::consultar("SELECT stock_actual FROM producto WHERE id_producto = ".modeloPrincipal::decryptionId($id_productos[$i])."")) < 1) {
                
                modeloPrincipal::UpdateSQL(
                "producto",
                "stock_actual = ".$cantidad_productos[$i].", precio_venta = ".$precio_venta_dolar[$i].", fecha_ultima_actualizacion = '$fecha_entrada', estado = 1",
            "id_producto = ".modeloPrincipal::decryptionId($id_productos[$i])."");
            }else{
                modeloPrincipal::UpdateSQL(
                "producto",
                "stock_actual = stock_actual + ".$cantidad_productos[$i].", precio_venta = ".$precio_venta_dolar[$i].", fecha_ultima_actualizacion = '$fecha_entrada', estado = 1",
            "id_producto = ".modeloPrincipal::decryptionId($id_productos[$i])."");
            }
        
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo actualizar el stock de productos.", "error");
        exit();
    }

    try {
        
        
        if ($tipo_compra == 1) {
            
            $infoUser = [
                "cedula" => model_user::obtener_info_personal_usuario('cedula', $id_usuario),
                "nombre" => model_user::obtener_info_personal_usuario('nombre', $id_usuario),
                "apellido" => model_user::obtener_info_personal_usuario('apellido', $id_usuario),
                "correo" => model_user::obtener_info_personal_usuario('correo', $id_usuario),
                "telefono" => model_user::obtener_info_personal_usuario('telefono', $id_usuario),
                "direccion" => model_user::obtener_info_personal_usuario('direccion', $id_usuario) 
            ];

            $dataProvider = "<b>****** Información del Usuario:   ******</b><br>
                Cédula: <b>".$infoUser['cedula']."</b><br>
                Nombre y Apellido: <b>".$infoUser['nombre']." ".$infoUser['apellido']."</b><br>
                Correo: <b>".$infoUser['correo']."</b><br>
                Teléfono: <b>".$infoUser['telefono']." </b><br>
                Dirección: <b>".$infoUser['direccion']." </b><br><br>";

        }else{
            $datos_originales = proveedor_model::consultar_proveedor_por_id("*", $id_proveedor);
            $datos_originales = mysqli_fetch_array($datos_originales);

            $dataProvider = "<b>****** Información del Proveedor:   ******</b><br>
                Cédula / RIF: <b>".$datos_originales['cedula_rif']." </b><br>
                Nombre: <b>".$datos_originales['nombre']." </b><br>
                Correo: <b>".$datos_originales['correo']." </b><br>
                Teléfono: <b>".$datos_originales['telefono']." </b><br>
                Dirección: <b>".$datos_originales['direccion']." </b><br><br>";
        }

        $datos_entrada = modeloprincipal::consultar("SELECT E.total_dolar, E.total_bs,
            E.fecha_entrada, D.dolar AS tasa
            FROM entrada AS E 
            INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
            WHERE E.id_entrada = $id_entrada");

        $datos_entrada = mysqli_fetch_array($datos_entrada);

        bitacora::bitacora("Registro exitoso de una entrada.","Se Registro una Entrada con la Siguiente Informacón: <br><br>
            $dataProvider

            <b>****** Información de la Entrada:   ******</b><br>
            Total de la Compra ($): <b>".$datos_entrada['total_dolar']." $ </b><br>
            Total de la Compra (Bs): <b>".$datos_entrada['total_bs']." bs</b><br>
            Fecha y Hora: <b>".date("d-m-Y / h:i:a",strtotime($datos_entrada['fecha_entrada']))." </b><br>
            Tasa del dolar: <b>$dolar Bs </b><br>
            <b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b><br>
            ");

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}

