<?php 
session_start();

require_once "../modelo/modeloPrincipal.php"; // se incluye el modelo principal
require_once "../modelo/productos_model2.php"; // se incluye el modelo producto
require_once "../modelo/alert_model.php"; // se incluye el modelo producto
require_once "../modelo/bitacora_model.php"; // se incluye el modelo de bitacora
require_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
require_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
require_once "../modelo/marca_model.php"; // se incluye el modelo de marcass

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

// verificar si el modulo es guardar
if($modulo === 'Guardar'){
    
    // $nombre_producto = modeloPrincipal::limpiar_mayusculas($_POST['nombre_producto']);

    $nombre_producto = $_POST['nombre_producto'];
    $marcas = $_POST['marcas'];
    $presentacion = $_POST['presentacion'];
    $categoria = $_POST['categoria'];
    
    $vista = (!isset($_POST['vista'])) ? 0 : modeloPrincipal::limpiar_cadena($_POST['vista']);

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$categoria, $presentacion, $nombre_producto, $marcas]);
    // se comprueba que no exista un producto con los mismos datos
    producto_model2::verificar_producto_existe($nombre_producto, $marcas, $presentacion, $categoria);
    
    // se valida el campo nombre del producto
    producto_model2::validar_nombre_producto($nombre_producto);
    
    // se verifica que la marca recibida exista y no haya sido alterada, se registrara solo las que no existan y se creara su respectiva bitácora
    marca_model::verificar_existe_marca($marcas);
    $id_marcas = marca_model::obtener_array_id_marcas($marcas);

    // se verifica que la categoria recibida exista y no haya sido alterada
    category_model::verificar_existe_categoria($categoria);
    $id_categorias = category_model::obtener_array_id_categorias($categoria);

    // se verifica que la categoria recibida exista y no haya sido alterada
    if (!presentacion_model::verificar_existe_presentacion("nombre", $presentacion)) {
        alert_model::alerta_simple("ocurried!","presentacion sin registrar","error");
        exit();
    }

    
    // se registran los datos del producto
    try {
        $registrar = producto_model2::registrar($id_categorias, $nombre_producto, $presentacion, $id_marcas);

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar un producto.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el producto debido a un error de consulta.", "error");
        exit();
    }

    // se realiza la bitácora con los datos del producto a registrar
    try {
        $id_productos = producto_model2::obtener_array_id_producto_recien_registrado(count($nombre_producto));

        $datos_originales = producto_model2::obtener_datos_recien_registrados($id_producto);

        $datos_originales = mysqli_fetch_array($datos_originales);
        $datos_originales['estado'] = $datos_originales['estado'] == 1 ? 'Activo' : 'Inactivo';

        $titulo_p = count($nombre_producto) > 1 ? "Registro exitoso de varios productos." : "Registro exitoso de un producto.";
        $mensaje_p = count($nombre_producto) > 1 ? "Se registraron varios productos con la siguiente informacón:." : "Se registro un producto con la siguiente informacón:";
        $subtitle = count($nombre_producto) > 1 ? "de los productos" : "del producto";
        
        $datos_originales['nombre_producto'] = ucwords(strtolower($datos_originales['nombre_producto']));
        $datos_originales['nombre_presentacion'] = ucwords(strtolower($datos_originales['nombre_presentacion']));
        $datos_originales['nombre'] = ucwords(strtolower($datos_originales['nombre']));
        $datos_originales['precio_venta_dolar'] = number_format($datos_originales['precio_venta_dolar'], 2, '.', ',');
        $datos_originales['stock_actual'] = number_format($datos_originales['stock_actual'], 0, '.', ',');

        $content_bitacora = '';

        while (count($nombre_producto)-1 < count($nombre_producto)) {
            $content_bitacora .= "
            Nombre: <b>".$datos_originales['nombre_producto']." </b><br>
            Presentación: <b>".$datos_originales['nombre_presentacion']." </b><br>
            Categoría: <b>".$datos_originales['nombre']." </b><br>
            Precio de venta: <b>".$datos_originales['precio_venta_dolar']." $</b><br>
            Porcentaje de IVA: <b>16%</b><br>
            Cantidad: <b>".$datos_originales['stock_actual']." </b><br>
            Estado: <b>".$datos_originales['estado']." </b><br><br>";
        }

        bitacora::bitacora("$titulo_p","$mensaje_p <br><br>
            <b>****** Información $subtitle:   ******</b><br><br>
            Nombre: <b>".$datos_originales['nombre_producto']." </b><br>
            Presentación: <b>".$datos_originales['nombre_presentacion']." </b><br>
            Categoría: <b>".$datos_originales['nombre']." </b><br>
            Precio de venta: <b>".$datos_originales['precio_venta_dolar']." $</b><br>
            Porcentaje de IVA: <b>16%</b><br>
            Cantidad: <b>".$datos_originales['stock_actual']." </b><br>
            Estado: <b>".$datos_originales['estado']." </b><br><br>
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
