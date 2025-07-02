<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}
// verificar si el modulo es guardar
if($modulo === 'Guardar'){
    
    $id_categoria = modeloPrincipal::limpiar_cadena( $_POST['id_categoria']);
    $id_presentacion = modeloPrincipal::limpiar_cadena($_POST['id_presentacion']);
    $id_marca = modeloPrincipal::limpiar_cadena($_POST['id_marca']);
    $nombre_producto = modeloPrincipal::limpiar_mayusculas($_POST['nombre_producto']);

    // se verifica que el id de la categoria sea un numero entero
    $vista = (!isset($_POST['vista'])) ? 0 : modeloPrincipal::limpiar_cadena($_POST['vista']);

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$id_categoria, $id_presentacion, $nombre_producto]);
    
    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre_producto FROM producto WHERE nombre_producto = ''")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        alert_model::alerta_simple("¡Ocurrio un error!","El código que ingresaste ya se encuentra en uso.","error");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,50}",$nombre_producto)) {
        alert_model::alert_of_format_wrong("'nombre'");
        exit();
    }

    // se registran los datos del producto
    try {
        $registrar = producto_model::registrar($id_categoria, $nombre_producto, $id_presentacion, $id_marca);

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar un producto.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el producto debido a un error de consulta.", "error");
        exit();
    }

    // se realiza la bitácora con los datos del producto a registrar
    try {
        $id_producto = producto_model::obtener_id_recien_registrada();

        $datos_originales = producto_model::obtener_datos_recien_registrados($id_producto);

        $datos_originales = mysqli_fetch_array($datos_originales);
        $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

        bitacora::bitacora("Registro exitoso de un producto.","Se registro un producto con la siguiente informacón: <br><br>
        <b>****** Información del producto:   ******</b><br><br>
        Nombre: <b>".$datos_originales['nombre_producto']." </b><br>
        Presentación: <b>".$datos_originales['nombre_presentacion']." </b><br>
        Categoría: <b>".$datos_originales['nombre']." </b><br>
        Marca: <b>".$datos_originales['marca']." </b><br>
        Precio de venta: <b>".$datos_originales['precio_venta']." $</b><br>
        Porcentaje de IVA: <b>16%</b><br>
        Cantidad: <b>".$datos_originales['stock_actual']." </b><br>
        Estado: <b>".$datos_originales['estado']." </b><br>
        ");
        
        if ($vista == 1) {
            alert_model::alerta_condicional("¡Registro Exitoso!","Los Datos Se Registraron Correctamente", "success","document.getElementById('close_modal').click();");
            exit();
        }

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}
