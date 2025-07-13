<?php

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/productos_model.php";

$id_producto = $_POST['id'];

$consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, PS.nombre, M.nombre AS marca,
    I.stock_actual, C.nombre AS nombre_categoria
    FROM producto AS P 
    INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
    INNER JOIN inventario AS I ON P.id_producto = I.id_producto
    INNER JOIN marca AS M ON P.id_marca = M.id
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

        <tr id="tr_producto_<?= $mostrar["id_producto"] ?>" >
            <td class="col text-center" scope="col">
                <p class="text-primary fs-6"><?= $mostrar["nombre_producto"].'<br>'.$mostrar["marca"].'<br>'.$mostrar["nombre"] ?>
                <input type="hidden" name="id_producto[]" value="<?= $mostrar["id_producto"] ?>" required>
            </td> 
            <td class="col text-center" scope="col"><?= $mostrar["nombre_categoria"] ?></td>
            <td class="col text-center" scope="col">
                <span class="<?= $color_stock ?>"><?= $mostrar["stock_actual"] ?></span>
            </td>
            <td class="col text-center" scope="col">
                <input type="text" class="form-control cantidad" name="cantidad[]" placeholder="ingresa la cantidad a ingresar" id="cantidad_<?= $mostrar["id_producto"] ?>" required>
            </td>
            
            <td class="text-center col" scope="col">
                <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= $mostrar['id_producto'] ?>')"></button>
            </td>
        </tr>
    <?php
}