<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

if($modulo === "Guardar"){
    $nombre = ucfirst(strtolower(modeloPrincipal::limpiar_cadena($_POST['nombre_presentacion']))); // se le coloca la primera letra en mayúscula
    $descripcion = ucfirst(strtolower(modeloPrincipal::limpiar_cadena($_POST['descripcion_presentacion']))); // se le coloca la primera letra en mayúscula

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre,$descripcion]);
    
    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT id FROM presentacion WHERE nombre = '$nombre'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        alert_model::alerta_simple("¡Ocurrio un error!","El nombre que ingresaste ya se encuentra en uso.","error");
        exit(); 
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre)) {
        alert_model::alert_of_format_wrong("nombre");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,250}",$descripcion)) {
        alert_model::alert_of_format_wrong("descripción");
        exit();
    }
    // se registran los datos del presentación
    try {
        $registrar = presentacion_model::registrar($nombre, $descripcion);
        
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar una presentación.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar la presentación debido a un error de consulta.", "error");
        exit();
    }
    
    // se realiza la bitácora con los datos del presentación a registrar
    try {
        $id_presentacion = presentacion_model::obtener_id_recien_registrada();

        $datos_originales = presentacion_model::consultar_por_id("*", $id_presentacion);
        $datos_originales = mysqli_fetch_array($datos_originales);
        $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Registro exitoso de una presentación.","Se registro una presentación con la siguiente informacón: <br><br>
        <b>****** Información de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Descripción: <b>".$datos_originales['descripcion']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br>
        ");

        alert_model::alert_reset_forms("¡Registro Exitoso!","Los Datos Se Registraron Correctamente","success", "document.querySelectorAll('#form_presentacion input').forEach((input) => {input.value = ''});");
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}


$id_presentacion = modeloPrincipal::limpiar_cadena($_POST["id"]);

if ($modulo === "activo") {
    
    $datos_originales = presentacion_model::consultar_por_id("*", $id_presentacion);
    $datos_originales = mysqli_fetch_array($datos_originales);
    $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

    try {
        $actualizar = presentacion_model::actualizar_estado("0", $id_presentacion);

        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el estado una presentación.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo modificar el estado la presentación debido a un error de consulta.", "error");
        exit();
    }
    

    // se realiza la bitácora con los datos del presentación a registrar
    try {

        $datos_actuales = presentacion_model::consultar_por_id("*", $id_presentacion);
        $datos_actuales = mysqli_fetch_array($datos_actuales);
        $datos_actuales['estado'] = $datos_actuales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Modificación exitosa del estado de una presentación.","Se modificó el estado de una presentación con la siguiente informacón: <br><br>
        <b>****** Información original de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Descripción: <b>".$datos_originales['descripcion']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br><br>
        <b>****** Información actual de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_actuales['nombre']." </b><br>
        Descripción: <b>".$datos_actuales['descripcion']." </b><br>
        Estado: <b>".$datos_actuales['estado']." </b><br>
        ");

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}

if ($modulo === "inactivo") {
    
    $datos_originales = presentacion_model::consultar_por_id("*", $id_presentacion);
    $datos_originales = mysqli_fetch_array($datos_originales);
    $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

    try {
        $actualizar = presentacion_model::actualizar_estado("1", "$id_presentacion");

        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el estado una presentación.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo modificar el estado la presentación debido a un error de consulta.", "error");
        exit();
    }
    

    // se realiza la bitácora con los datos del presentación a registrar
    try {

        $datos_actuales = presentacion_model::consultar_por_id("*", $id_presentacion);
        $datos_actuales = mysqli_fetch_array($datos_actuales);
        $datos_actuales['estado'] = $datos_actuales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Modificación exitosa del estado de una presentación.","Se modificó el estado de una presentación con la siguiente informacón: <br><br>
        <b>****** Información original de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Descripción: <b>".$datos_originales['descripcion']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br><br>
        <b>****** Información actual de la presentación:   ******</b><br><br>
        Nombre: <b>".$datos_actuales['nombre']." </b><br>
        Descripción: <b>".$datos_actuales['descripcion']." </b><br>
        Estado: <b>".$datos_actuales['estado']." </b><br>
        ");

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}
