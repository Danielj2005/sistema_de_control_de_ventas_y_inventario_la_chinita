<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

if($modulo === "Guardar"){
    
    $nombre = ucwords(strtolower(modeloPrincipal::limpiar_cadena($_POST['nombre_marca'])));

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre]);
    
    // se comprueba que no exista un registro con los mismos datos
    marca_model::verificar_existe_marca_unica($nombre);

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre)) {
        alert_model::alert_of_format_wrong("nombre");
        exit();
    }
    
    // se registran los datos del presentación
    try {
        $registrar = marca_model::registrar($nombre);
        
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar una presentación.","error");
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar la presentación debido a un error de consulta.", "error");
        exit();
    }
    
    // se realiza la bitácora con los datos del presentación a registrar
    try {
        $id_marca = marca_model::obtener_id_recien_registrada();

        $datos_originales = marca_model::consultar_por_id($id_marca);
        $datos_originales = mysqli_fetch_array($datos_originales);
        $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Registro exitoso de una Marca.","Se registro una Marca con la siguiente informacón: <br><br>
        <b>****** Información de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        ");

        alert_model::alert_reset_forms("¡Registro Exitoso!","Los Datos Se Registraron Correctamente","success", "document.querySelectorAll('#form_marca input').forEach((input) => {input.value = ''});");
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}