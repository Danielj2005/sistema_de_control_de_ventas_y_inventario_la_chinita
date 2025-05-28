<?php 
session_start();

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

$priceUpdate = floatval($_POST['priceDolar']);

$fecha_precio = date('Y-m-d H:i:s');

$manera = modeloprincipal::limpiar_cadena($_POST["manera"]);

if (!isset($_POST["manera"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

modeloPrincipal::validar_campos_vacios([$priceUpdate, $manera]);

// verificar que los datos cumplen con los parametros de formato
if (modeloPrincipal::verificar_datos("[0-9\.]{2,5}", $priceUpdate)) {
    alert_model::alerta_simple("¡Ocurrio un error!","El campo precio no cumple con el formato establecido, en este solo se debe ingresar números enteros o decimales con un . por ejemplo(45.6)","error");
    exit();
}

$id_dolar = modeloPrincipal::obtener_id_recien_registrado("id_dolar","dolar");

$datos_originales = modeloPrincipal::consultar("SELECT * FROM dolar WHERE id_dolar = $id_dolar");
$datos_originales = mysqli_fetch_array($datos_originales);

// se registran los datos de la tasa del dolar
try {
    $registrar = modeloPrincipal::InsertSQL("dolar","dolar, fecha_precio","$priceUpdate,'$fecha_precio'");
    
    if (!$registrar) {
        alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar la tasa del dolar debido a un error de consulta.","error");
    }

} catch (Exception $e) {
    alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar la tasa del dolar.", "error");
    exit();
}


// se realiza la bitácora con los datos de la tasa del dolar
try {
    $id_dolar = modeloPrincipal::obtener_id_recien_registrado("id_dolar","dolar");
    
    $datos_actual = modeloPrincipal::consultar("SELECT * FROM dolar WHERE id_dolar = $id_dolar");
    $datos_actual = mysqli_fetch_array($datos_actual);

    bitacora::bitacora("Actualización exitosa de la tasa del dolar.","Se actualizó la tasa del dolar de manera $manera. <br><br>
    <b>****** Información de la tasa del dolar:   ******</b><br>
    Precio anterior: <b>".$datos_originales['dolar']." bs </b><br>
    Fecha anterior: <b>".date("d-m-Y / h:i:a", strtotime($datos_originales['fecha_precio']))." </b><br><br>

    <b>****** Información de la tasa del dolar actual:   ******</b><br>
    Precio actual: <b>".$datos_actual['dolar']." bs </b><br>
    Fecha actual: <b>".date("d-m-Y / h:i:a", strtotime($datos_actual['fecha_precio']))." </b><br>
    ");

    alert_model::alert_reload("¡Actualización de la Tasa Exitosa!","La tasa se actualizó y se registró exitosamente","success");
    exit();
} catch (Exception $e) {
    alert_model::alert_mod_error();
    exit();
}