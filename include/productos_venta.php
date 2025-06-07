<?php

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/productos_model.php";

$id_producto = $_POST['id'];

$consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, PS.nombre, P.stock,
    C.nombre AS nombre_categoria, P.precio_venta_dolar, 
    round((SELECT MAX(dolar) FROM dolar) * P.precio_venta_dolar, 2) AS precio_bs 
    FROM producto AS P 
    INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
    INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria 
    WHERE P.id_producto = $id_producto");

// se guardan los datos en un array y se imprime
while ( $mostrar = mysqli_fetch_array($consulta)) { 

    if ($mostrar["stock"] == "0") {
        $color_stock = 'text-danger';
    } elseif ($mostrar["stock"] < "5" && $mostrar["stock"] > "0") {
        $color_stock = 'text-warning';
    } else {
        $color_stock = 'text-success';
    }

    ?>
        <tr id="tr_producto_<?= $mostrar['id_producto'] ?>" >
            <td class="col text-center" scope="col">
                <p class="text-primary"><?= $mostrar['nombre_producto'].' '.$mostrar['nombre'].' ('.$mostrar['nombre_categoria'] ?>) <br> </p>
                <input type="hidden" name="id_producto[]" value="<?= $mostrar["id_producto"] ?>" required>
            </td>

            <td class="col text-center" scope="col">
                <span class="<?= $color_stock ?>"><?= $mostrar["stock"] ?></span>
            </td>

            <td class="col text-center" scope="col">
                <input type="text" class="form-control cantidad" name="cantidad[]" placeholder="ingresa la cantidad a vender" id="cantidad<?= $mostrar['id_producto'] ?>" onblur="monto_total_productos();" required>
            </td>

            <td class="col text-center" scope="col">
                <input type="text" readonly class="bg-dark-subtle form-control precio_dolar" name="precio_producto_dolar[]" id="precio_dolar<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_venta_dolar"] ?>" required>
            </td>

            <td class="col text-center" scope="col">
                <input type="text" readonly class="bg-dark-subtle form-control precio_bs" name="precio_producto_bolivar[]" id="precio_bs<?= $mostrar['id_producto'] ?>" value="<?= $mostrar["precio_bs"] ?>" required>
            </td>
            
            <td class="text-center col" scope="col">
                <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= $mostrar['id_producto'] ?>')"></button>
            </td>
        </tr>

    <?php
}