<?php 
session_start();
// Establecer encabezados CORS para permitir solicitudes desde cualquier origen
include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// modulo a trabajar

$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);


if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

if($modulo === "Guardar"){
    modeloprincipal::limpiar_cadena("r_categoria");

    /* 
        Se recibe el nombre del categoría.
        se limpia la cadena con la función limpiar_cadena().
        se convierte a minúsculas con la función strtolower().
        luego se pone la primera letra de cada palabra en mayúscula con la función ucwords().
    */
    $nombre = ucwords(strtolower(modeloPrincipal::limpiar_cadena($_POST['nombre_categoria'])));
    
    modeloPrincipal::validar_campos_vacios([$nombre]); // Se verifica que no se hayan recibido campos vacíos.

    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM categoria WHERE nombre = '$nombre'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        alert_model::alerta_simple("¡Ocurrio un error!","El nombre que ingresaste ya se encuentra en uso.","error");
        exit(); 
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)) {
        alert_model::alert_of_format_wrong("'nombre'");
        exit();
    }
    
    // se registran los datos del categoría
    try {
        $registrar = category_model::registrar($nombre);
        
        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar una categoría.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar la categoría debido a un error de consulta.", "error");
        exit();
    }
    
    // se realiza la bitácora con los datos del categoría a registrar
    try {
        $id_categoria = category_model::obtener_id_categoria_recien_registrada();

        $datos_originales = category_model::consultar_categoria_por_id("*", $id_categoria);
        $datos_originales = mysqli_fetch_array($datos_originales);
        $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Registro exitoso de una categoría.","Se registro una categoría con la siguiente informacón: <br><br>
        <b>****** Información de la categoría:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b>
        ");

        alert_model::alert_reset_forms("¡Registro Exitoso!","Los Datos Se Registraron Correctamente","success", "document.querySelectorAll('#añadir_categoria input').forEach((input) => {input.value = ''});");
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}

$id_categoria = modeloPrincipal::decryptionId($_POST["UID"]);
$id_categoria = modeloPrincipal::limpiar_cadena($id_categoria);

if ($modulo === "activo") {
    
    $datos_originales = category_model::consultar_categoria_por_id("*", $id_categoria);
    $datos_originales = mysqli_fetch_array($datos_originales);
    $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

    try {
        $actualizar = category_model::actualizar("0", "$id_categoria");
        
        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el estado una categoría.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo modificar el estado la categoría debido a un error de consulta.", "error");
        exit();
    }
    

    // se realiza la bitácora con los datos del categoría a registrar
    try {

        $datos_actuales = category_model::consultar_categoria_por_id("*", $id_categoria);
        $datos_actuales = mysqli_fetch_array($datos_actuales);
        $datos_actuales['estado'] = $datos_actuales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Modificación exitosa del estado de una categoría.","Se modificó el estado de una categoría con la siguiente informacón: <br><br>
        <b>****** Información original de la categoría:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br><br>
        <b>****** Información actual de la categoría:   ******</b><br><br>
        Nombre: <b>".$datos_actuales['nombre']." </b><br>
        Estado: <b>".$datos_actuales['estado']." </b>
        ");

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}

if ($modulo === "inactivo") {

    $datos_originales = category_model::consultar_categoria_por_id("*", $id_categoria);
    $datos_originales = mysqli_fetch_array($datos_originales);
    $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

    try {
        $actualizar = category_model::actualizar("1", $id_categoria);
        
        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al modificar el estado una categoría.","error");
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo modificar el estado la categoría debido a un error de consulta.", "error");
        exit();
    }
    

    // se realiza la bitácora con los datos del categoría a registrar
    try {

        $datos_actuales = category_model::consultar_categoria_por_id("*", $id_categoria);
        $datos_actuales = mysqli_fetch_array($datos_actuales);
        $datos_actuales['estado'] = $datos_actuales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Modificación exitosa del estado de una categoría.","Se modificó el estado de una categoría con la siguiente informacón: <br><br>
        <b>****** Información original de la categoría:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br><br>
        <b>****** Información actual de la categoría:   ******</b><br><br>
        Nombre: <b>".$datos_actuales['nombre']." </b><br>
        Estado: <b>".$datos_actuales['estado']." </b>
        ");

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}