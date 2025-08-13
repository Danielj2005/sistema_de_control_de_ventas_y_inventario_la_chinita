<?php 
session_start();

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/alert_model.php";

$productos = modeloPrincipal::consultar("SELECT P.id_producto, P.nombre_producto AS producto,
    PS.nombre AS presentacion, 
    C.nombre AS categoria,
    M.nombre AS marca
    FROM producto AS P 
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
    INNER JOIN marca AS M ON M.id = P.id_marca");

$numrand = mysqli_fetch_array($productos)['id_producto'];
?>
<tr id="tr_producto_<?= modeloPrincipal::encryptionId($numrand ) ?>">
    <td class="text-center">
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="datalist_nombre_productos<?= $numrand ?>" name="nombre_producto[]" id="input_nombre_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']); ?>" placeholder="Escribe el nombre del producto" autocomplete="off">
            <datalist id="datalist_nombre_productos<?= $numrand ?>">
                <?php 
                    while ($row = mysqli_fetch_array($productos)) { ?>
                        <option value="<?= $row['producto'].' '.$row['marca'].' '.$row['presentacion']; ?>"></option>
                <?php } ?>
            </datalist>
        </div>
    </td>
    <td class="text-center">
        <input type="number" class="form-control" name="cantidad_producto[]" id="input_cantidad_<?= modeloPrincipal::encryptionId($numrand); ?>" placeholder="Cantidad" required>
    </td>
    <td class="text-center col" scope="col">
        <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_producto_<?= modeloPrincipal::encryptionId($numrand ) ?>')"></button>
    </td>
</tr>