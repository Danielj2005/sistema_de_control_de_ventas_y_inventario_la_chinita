<?php 
session_start();

require_once "../modelo/modeloPrincipal.php"; // se incluye el modelo principal
require_once "../modelo/configuracion_model.php"; // se incluye el modelo producto
require_once "../modelo/productos_model.php"; // se incluye el modelo producto
require_once "../modelo/alert_model.php"; // se incluye el modelo producto
require_once "../modelo/bitacora_model.php"; // se incluye el modelo de bitacora
require_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
require_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
require_once "../modelo/marca_model.php"; // se incluye el modelo de marcas

// modulo a trabajar
modeloPrincipal::verificarModuloATrabajar("modulo");

$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

// verificar si el modulo es guardar
if($modulo === 'Guardar'){
    
    $code = $_POST['code']; // codigo de barras (opcional)
    $nombre_producto = $_POST['nombre_producto'];
    $marcas = $_POST['marcas'];
    $presentacion = $_POST['presentacion'];
    $categoria = $_POST['categoria'];
    
    $vista = (!isset($_POST['vista'])) ? 0 : modeloPrincipal::limpiar_cadena($_POST['vista']);
    
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$code, $categoria, $presentacion, $nombre_producto, $marcas]);
    
    // se comprueba que no exista un producto con los mismos datos
    producto_model::verificar_producto_existe($code, $nombre_producto, $marcas, $presentacion, $categoria);
    
    // se valida el campo nombre del producto
    producto_model::validar_nombre_producto($nombre_producto);
    
    // se registran los datos del producto
    try {
        $registrar = producto_model::registrar($code, $categoria, $nombre_producto, $presentacion, $marcas);

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar un producto.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo registrar el producto, revisa los datos e intenta nuevamente.","error");
        exit();
    }

    // se realiza la bitácora con los datos del producto a registrar
    try {
        $id_productos = modeloPrincipal::obtener_array_id_producto_recien_registrado(count($nombre_producto));

        $datos_productos_registrados = producto_model::obtener_datos_recien_registrados($id_productos);

        $bitacora = "";

        for ( $i = 0;  $i < count($id_productos); $i++) {

            $bitacora .= '<h4 class="text-center card-title"><b> Información del producto '.$code[$i].'</b></h4>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p> Código</p>
                    <span>'.$code[$i].'</span>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p> Nombre</p>
                    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['nombre'][$i]).'</span>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p> Marca</p>
                    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['marca'][$i]).'</span>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p> Formato</p>
                    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['presentacion'][$i]).'</span>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p> Categoría</p>
                    <span class="text-primary fw-bold mb-1">'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['categoria'][$i]).'</span>
                </div>';

        }
        
        bitacora::bitacora("Registro Exitoso de uno o más Productos.",'<p class="mb-3 text-primary-emphasis text-center"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario registró los siguientes productos.</p>'.$bitacora.'');
        
        if ($vista == 1) {
            alert_model::alerta_condicional("¡Registro Exitoso!","Los Datos Se Registraron Correctamente", "success","document.querySelector('.btn-danger').click();");
            exit();
        }

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
    
}


if($modulo === 'Modificar'){
        
    $id_producto = modeloPrincipal::decryptionId($_POST["id"]);
    $id_producto = modeloPrincipal::limpiar_cadena($id_producto);

    $price = modeloPrincipal::limpiar_cadena($_POST['precio']);

     // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$price, $id_producto]);
    
    // se registran los datos del producto
    try {
        $actualizar = producto_model::actualizar_producto($price, $id_producto);

        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al actualizar el precio de un producto.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "No se pudo actualizar el precio del producto, revisa los datos e intenta nuevamente.","error");
        exit();
    }

    // se realiza la bitácora con los datos del producto a actualizar
    try {

        $datos_producto_modificado = modeloPrincipal::consultar("SELECT M.nombre as marca, 
            PS.cantidad AS presentacion, R.nombre AS representacion, P.stock_actual, P.precio_venta,
            P.id_producto, P.codigo, P.nombre_producto, C.nombre AS categoria, P.fecha_ultima_actualizacion,
            (SELECT MAX(dolar) FROM dolar) AS tasa
            FROM producto AS P
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
            INNER JOIN representacion AS R ON R.id = PS.id_representacion
            INNER JOIN marca AS M ON M.id = P.id_marca
            WHERE P.id_producto = $id_producto
        ");

        $datos_producto_modificado = mysqli_fetch_array($datos_producto_modificado);
        
        $cambios = [
            "nombre" => config_model::obtener_comparacion([$datos_producto_modificado, $datos_producto_modificado], [ $datos_producto_modificado, $datos_producto_modificado]),
            "precio" => config_model::obtener_comparacion([$datos_producto_modificado['precio_venta'], $datos_producto_modificado['precio_venta']], [ $datos_producto_modificado, $datos_producto_modificado]),
            "descripcion" => config_model::obtener_comparacion([$datos_producto_modificado, $datos_producto_modificado], [ $datos_producto_modificado, $datos_producto_modificado]),
            "estado" => config_model::obtener_comparacion([$datos_producto_modificado, $datos_producto_modificado], [ $datos_producto_modificado, $datos_producto_modificado]),
        ];


        $bitacora = '<h4 class="text-center card-title"><b> Información del producto '.$datos_producto_modificado['codigo'].'</b></h4>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Código</p>
                <span>'.$datos_producto_modificado['codigo'].'</span>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Nombre</p>
                <span>'.modeloPrincipal::primeraLetraMayus($datos_producto_modificado['nombre_producto']).'</span>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Marca</p>
                <span>'.modeloPrincipal::primeraLetraMayus($datos_producto_modificado['marca']).'</span>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Formato</p>
                <span>'.modeloPrincipal::primeraLetraMayus($datos_producto_modificado['presentacion']).'</span>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Categoría</p>
                <span class="text-primary fw-bold mb-1">'.modeloPrincipal::primeraLetraMayus($datos_producto_modificado['categoria']).'</span>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-2">
                <p> Precio ($)</p>
                <span class="text-primary fw-bold mb-1">'.$datos_producto_modificado['precio_venta'].'</span>
            </div>';

        
        bitacora::bitacora("Modificación Exitosa de un Producto.",'<p class="mb-3 text-primary-emphasis text-center"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario modificó el siguiente producto.</p>'.$bitacora.'');
        
        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
    
}
