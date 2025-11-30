<?php

require_once "../../../modelo/modeloPrincipal.php"; 
require_once "../../../modelo/proveedor_model.php";
require_once "../../../modelo/alert_model.php"; 

# realizar revision para saber esta donde llega o implementar try catch
if (!isset($_POST['id'])) {
    alert_model::alerta_simple("¡Ocurrio un error!","No se está recibiendo correctamente el identificador del proveedor","error");
    exit();
}

$id_producto = modeloPrincipal::decryptionId($_POST["id"]);
$id_producto = modeloPrincipal::limpiar_cadena($id_producto);

$mostrar = modeloPrincipal::consultar("SELECT M.nombre as marca, 
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

$mostrar = mysqli_fetch_array($mostrar);
?>

<form id="modalSendForm" action="../controlador/producto_controlador.php" method="post" class="SendFormAjax" data-type-form="update">   
    <div class="row m-0 p-0">

        <input type="hidden" name="id" value="<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>">
        <input type="hidden" name="modulo" value="Modificar">

        <div class="col-12 mb-3">
            <p class="text-secondary fw-bold mb-1">
                Código: <?= $mostrar["codigo"] ?>
            </p>
            <p class="text-<?=  $mostrar["stock_actual"] == 0 ? "danger" : "primary" ?>  fw-bold mb-1">
                Nombre: <?= $mostrar["nombre_producto"]?>
            </p>
            <small class="d-block text-dark">
                <span class="fw-bold">Marca:</span>  <?= $mostrar["marca"] ?>
            </small>
            <small class="d-block text-muted">
                <span class="fw-bold">Formato:</span> <?= $mostrar["presentacion"] . ' / ' . $mostrar["representacion"] ?>
            </small>
            <small class="d-block text-muted">
                <span class="fw-bold">Categoria:</span> <?= $mostrar["categoria"] ?>
            </small>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
            <label> Precio ($)<span style="color: red; font-size: 20px;"> * </span></label>
            <input type="text" maxlength="5" value="<?= $mostrar['precio_venta'] ?>" class="form-control" id="precio" name="precio" pattern="[0-9\.]{1,5}" placeholder="ingrese el precio">
        </div>

        <div class="col-12 mb-3">
            <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <p> Los campos con <span style="color: red; font-size: 20px;"> * </span> son obligatorios </p>
            </div>
        </div>
    </div>
</form>