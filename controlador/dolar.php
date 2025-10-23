<?php 
session_start();

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

$priceUpdate = str_replace(",", ".", $_POST['priceDolar']); // Reemplazar coma por punto
$priceUpdate = floatval($priceUpdate);

$fecha_precio = date('Y-m-d H:i:s');

$manera = modeloprincipal::limpiar_cadena($_POST["manera"]);

if (!isset($_POST["manera"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

modeloPrincipal::validar_campos_vacios([$priceUpdate, $manera]);

// verificar que los datos cumplen con los parametros de formato
if (modeloPrincipal::verificar_datos("[0-9\.]{2,8}", $priceUpdate)) {
    alert_model::alerta_simple("¡Ocurrio un error!","El campo precio no cumple con el formato establecido, en este solo se debe ingresar números enteros o decimales con un . por ejemplo(98.6)","error");
    exit();
}

$verificarExistencias = modeloPrincipal::consultar("SELECT * FROM dolar");

if (mysqli_num_rows($verificarExistencias) > 1) {
    $datos_dolar = mysqli_fetch_array($verificarExistencias);

    if ($priceUpdate == $datos_dolar['dolar']) {
        alert_model::alerta_simple("¡Ocurrio un error!","El precio ingresado es igual al precio actual, por favor ingrese un precio diferente para actualizar la tasa del dolar.","error");
        exit();
    }

    $id_dolar_original = modeloPrincipal::obtener_id_recien_registrado( "id_dolar","dolar");
    $datos_originales = modeloPrincipal::consultar("SELECT * FROM dolar WHERE id_dolar = $id_dolar_original");
    $datos_originales = mysqli_fetch_array($datos_originales);
}else{
    $datos_originales = [
        'dolar' => 'N/A',
        'fecha_precio' => 'N/A'
    ];
}


// se registran los datos de la tasa del dolar
try {
    $registrar = modeloPrincipal::InsertSQL("dolar","dolar, fecha_precio","'$priceUpdate','$fecha_precio'");
    
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

    bitacora::bitacora("Actualización Exitosa de la Tasa del Dolar.",
        "Se Actualizó la Tasa del Dolar de Manera $manera.<br><br>
        <b>****** Información de la Tasa del Dolar:   ******</b><br>
        Precio anterior: <b>".$datos_originales['dolar']." bs </b><br>
        Fecha anterior: <b>".date("d-m-Y / h:i:a", strtotime($datos_originales['fecha_precio']))." </b><br><br>

        <b>****** Información de la Tasa del Dolar Actual:   ******</b><br>
        Precio actual: <b>".$datos_actual['dolar']." bs </b><br>
        Fecha actual: <b>".date("d-m-Y / h:i:a", strtotime($datos_actual['fecha_precio']))."</b><br>
    ");

    alert_model::alerta_condicional("¡Actualización de la Tasa Exitosa!","La Tasa se Actualizó y se Registró Exitosamente","success");
    exit();
} catch (Exception $e) {
    alert_model::alert_mod_error();
    exit();
}