<?php 
session_start();

require_once "../modelo/modeloPrincipal.php"; // se incluye el modelo principal
require_once "../modelo/productos_model.php"; // se incluye el modelo producto
require_once "../modelo/alert_model.php"; // se incluye el modelo producto
require_once "../modelo/bitacora_model.php"; // se incluye el modelo de bitacora
require_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
require_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
require_once "../modelo/marca_model.php"; // se incluye el modelo de marcas

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}

$config['porcentaje_iva'] = 16;
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
    producto_model::verificar_producto_existe($nombre_producto, $marcas, $presentacion, $categoria);
    
    // se valida el campo nombre del producto
    producto_model::validar_nombre_producto($nombre_producto);
    
    // se verifica que la marca recibida exista y no haya sido alterada, se registrara solo las que no existan y se creara su respectiva bitácora
    marca_model::verificar_existe_marca($marcas);
    $id_marcas = marca_model::obtener_array_id_marcas($marcas);

    // se verifica que la categoria recibida exista y no haya sido alterada
    category_model::verificar_existe_categoria($categoria);
    $id_categorias = category_model::obtener_array_id_categorias($categoria);

    // se verifica que la categoria recibida exista y no haya sido alterada
    presentacion_model::verificar_existe_presentacion($presentacion);
    $id_presentaciones = presentacion_model::obtener_array_id_presentacion($presentacion);

    // se registran los datos del producto
    try {
        $registrar = producto_model::registrar($id_categorias, $nombre_producto, $id_presentaciones, $id_marcas);

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar un producto.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el producto debido a un error de consulta.", "error");
        exit();
    }

    // se realiza la bitácora con los datos del producto a registrar
    try {
        $id_productos = modeloPrincipal::obtener_array_id_producto_recien_registrado(count($nombre_producto));

        $datos_productos_registrados = producto_model::obtener_datos_recien_registrados($id_productos);

        $bitacora = "";

        for ( $i = 0;  $i < count($id_productos); $i++) {

            $bitacora .= "Nombre: <b>".ucwords(strtolower($datos_productos_registrados['nombre'][$i]))." </b><br>
                Presentación: <b>".ucwords(strtolower($datos_productos_registrados['presentacion'][$i]))." </b><br>
                Categoría: <b>".ucwords(strtolower($datos_productos_registrados['categoria'][$i]))." </b><br>
                Marca: <b>".ucwords(strtolower($datos_productos_registrados['marca'][$i]))." </b><br>
                Porcentaje de IVA: <b>".$config['porcentaje_iva']."%</b><br><br>
                <b>*********************************************</b><br><br>";

        }
        
        bitacora::bitacora("Registro exitoso de uno o más productos.","Se registraron uno o más productos con la siguiente informacón: <br><br>
            <b>****** Información de los productos:   ******</b><br><br>
            $bitacora
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
