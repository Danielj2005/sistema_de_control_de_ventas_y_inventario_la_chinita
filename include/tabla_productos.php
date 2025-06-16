<?php

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/productos_model.php";

$id_producto = $_POST['id'];

$consulta = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto, PS.nombre,
    P.stock, C.nombre AS nombre_categoria
    FROM `producto` AS P 
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
                <p class="text-primary"><?= $mostrar['nombre_producto'].' '.$mostrar['nombre'].' ('.$mostrar['nombre_categoria'] ?>) <br>
                <span class="<?= $color_stock ?>">En stock: <?= $mostrar["stock"] ?></span> </p>
                <input type="hidden" name="id_producto[]" value="<?= $mostrar["id_producto"] ?>" required>
            </td>
            <td class="col text-center" scope="col">
                <input type="number" min="0" max="2000" class="form-control cantidad" name="cantidad[]" onblur="calcular_total();" placeholder="ingresa la cantidad a ingresar" id="cantidad_<?= $mostrar["id_producto"] ?>" required>
            </td>
            <td class="col text-center" scope="col">
                <input type="text" maxlength="8" class="form-control precio_unidad_dolar" onblur="convertir_usd_a_bs(<?= $mostrar['id_producto'] ?>); calcular_total();" name="precio_unidad_dolar[]" placeholder="ingresa el Precio por unidad en $" id="precio_unidad_dolar_<?= $mostrar['id_producto'] ?>" required>
            </td>
            <td class="col text-center" scope="col">
                <input type="number" min="0" max="10000" readonly class="bg-secondary-subtle form-control precio_unidad_bs" name="precio_unidad_bs[]" placeholder="ingresa el Precio por unidad en bs" id="precio_unidad_bs_<?= $mostrar["id_producto"] ?>" required>
            </td>
            <td class="col text-center" scope="col">
                <div class="col-md-4 input-group">
                    <!-- <select class="input-group-text" id="porcentaje_ganancia" name="porcentaje_ganancia" required>
                        <option value="V-">30%</option>
                        <option value="R-">35%</option>
                        <option value="J-">40%</option>
                        <option value="E-">45%</option>
                        <option value="E-">50%</option>
                        <option value="E-">55%</option>
                        <option value="E-">60%</option>
                    </select> -->
                    <input type="number" min="0" max="10000" readonly class="bg-secondary-subtle input form-control" name="precio_venta_dolar[]" placeholder="ingresa el Precio de venta en $" id="precio_venta_dolar_<?= $mostrar["id_producto"] ?>" required>
                </div>
            </td>
            
            <td class="text-center col" scope="col">
                <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= $mostrar['id_producto'] ?>')"></button>
            </td>
        </tr>

    <?php
}