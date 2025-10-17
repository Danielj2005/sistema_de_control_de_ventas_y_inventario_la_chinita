<?php

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/productos_model.php";

$id_producto = modeloPrincipal::decryptionId($_POST['id']);
$id_producto = modeloPrincipal::limpiar_cadena($id_producto);

$consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, 
    PS.cantidad AS presentacion, R.nombre AS representacion,
    I.stock_actual, I.precio_venta, 
    C.nombre AS nombre_categoria, 
    M.nombre as marca,
    round((SELECT MAX(dolar) FROM dolar) * I.precio_venta, 2) AS precio_bs
    FROM producto AS P 
    INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
    INNER JOIN representacion AS R ON R.id = PS.id_representacion
    INNER JOIN inventario AS I ON I.id_producto = P.id_producto
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria 
    WHERE P.id_producto = $id_producto");

// se guardan los datos en un array y se imprime
while ( $mostrar = mysqli_fetch_array($consulta)) { 

    if ($mostrar["stock_actual"] == "0") {
        $color_stock = 'text-danger';
    } elseif ($mostrar["stock_actual"] < "5" && $mostrar["stock_actual"] > "0") {
        $color_stock = 'text-warning';
    } else {
        $color_stock = 'text-success';
    }

    ?>
        <tr id="tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>" >
            <input type="hidden" name="id_producto[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_producto"]) ?>" required>
            <td class="col text-center col-md-2" scope="col">
                <p class="text-primary"><?= $mostrar['nombre_producto'].' '.$mostrar['marca'].' <br> '.$mostrar['presentacion'] ?> <br> </p>
            </td>

            <td class="col text-center col-md-2" scope="col">
                <span class="<?= $color_stock ?>"><?= $mostrar["stock_actual"] ?></span>
            </td>

            <td class="col text-center col-md-2" scope="col">
                <input type="text" class="form-control cantidad" name="cantidad[]" placeholder="ingresa la cantidad a vender" id="cantidad<?= $mostrar['id_producto'] ?>" onblur="monto_total_productos();" required>
            </td>

            <td class="col text-center col-md-2" scope="col">
                <input type="text" readonly class="bg-dark-subtle form-control precio_dolar" name="precio_producto_dolar[]" id="precio_dolar<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_venta"] ?>" required>
            </td>

            <td class="col text-center col-md-2" scope="col">
                <input type="text" readonly class="bg-dark-subtle form-control precio_bs" name="precio_producto_bolivar[]" id="precio_bs<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_bs"] ?>" required>
            </td>
            
            <td class="text-center col" scope="col">
                <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']) ?>')"></button>
            </td>
        </tr>

    <?php
}