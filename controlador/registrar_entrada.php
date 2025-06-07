<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}


if($modulo == 'Guardar'){
    // datos de la entrada
    $total_dolar = $_POST['totalDolar'];
    $total_bolivar = $_POST['totalBolivar'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $hora_entrada = $_POST['hora_entrada'];

    
    $fecha_entrada = date('Y-m-d H:i:s', strtotime($fecha_entrada.' '.$hora_entrada));
    
    // detalles de la entrada
    $id_productos = $_POST['id_producto'];
    $cantidad_productos = $_POST['cantidad'];
    $precio_unidad_dolar = $_POST['precio_unidad_dolar'];
    $precio_unidad_bs = $_POST['precio_unidad_bs'];

    // actualizacion para stock de productos
    $precio_venta_dolar = $_POST['precio_venta_dolar'];
        
    // $fecha_entrada_auto = date('Y-m-d h:i:s');
    
    // cedula_rif del proveedor
    $cedula_proveedor = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
    
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$id_productos, $cantidad_productos, $precio_unidad_dolar, $precio_unidad_bs, $precio_venta_dolar, $total_dolar, $total_bolivar, $fecha_entrada, $hora_entrada, $cedula_proveedor]);

    $existe_proveedor = modeloPrincipal::Consultar("SELECT id_proveedor FROM proveedor 
        WHERE cedula_rif = '$cedula_proveedor'");
        
    $id_dolar = modeloPrincipal::limpiar_cadena($_POST['id_dolar']);

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

    // se registran los datos de la entrada
    try {

        $registrar = modeloPrincipal::InsertSQL( "entrada","id_proveedor, total_dolar, total_bs, fecha_entrada, id_dolar","$id_proveedor, $total_dolar, $total_bolivar,'$fecha_entrada',$id_dolar");
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
                "$id_entrada, " . $id_productos[$i] . ", " . $cantidad_productos[$i] . ", " . $precio_unidad_dolar[$i] . ", " . $precio_unidad_bs[$i] . ", $total_producto_dolar, $total_producto_bs"
            );
            modeloPrincipal::UpdateSQL("producto","precio_venta_dolar = ".$precio_venta_dolar[$i].", stock = stock + ".$cantidad_productos[$i].", estatus = 1", "id_producto = ".$id_productos[$i]."");

        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar los detalles de la entrada de productos en la base de datos debido a un error de consulta.", "error");
        exit();
    }

    try {
        
        $datos_originales = proveedor_model::consultar_proveedor_por_id("*", $id_proveedor);
        $datos_originales = mysqli_fetch_array($datos_originales);

        $datos_entrada = modeloprincipal::consultar("SELECT E.total_dolar, E.total_bs,
            E.fecha_entrada, D.dolar AS tasa
            FROM entrada AS E 
            INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
            WHERE E.id_entrada = $id_entrada");

        $datos_entrada = mysqli_fetch_array($datos_entrada);

        bitacora::bitacora("Registro exitoso de una entrada.","Se registro una entrada con la siguiente informacón: <br><br>
        <b>****** Información del proveedor:   ******</b><br>
        Cédula / RIF: <b>".$datos_originales['cedula_rif']." </b><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Correo: <b>".$datos_originales['correo']." </b><br>
        Teléfono: <b>".$datos_originales['telefono']." </b><br>
        Dirección: <b>".$datos_originales['direccion']." </b><br><br>

        <b>****** Información de la entrada:   ******</b><br>
        Total de la compra en $: <b>".$datos_entrada['total_dolar']." $ </b><br>
        Total de la compra en bs: <b>".$datos_entrada['total_bs']." bs</b><br>
        Fecha / hora: <b>".date("d-m-Y / h:i:a",strtotime($datos_entrada['fecha_entrada']))." </b><br>
        Tasa del dolar: <b>$dolar bs </b><br>
        <b>Para más detalles sobre la entrada, ve a la lista de entradas </b><br>
        ");

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }

}

