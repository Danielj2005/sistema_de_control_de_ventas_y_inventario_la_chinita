<?php
session_start();

include_once "../modelo/modeloPrincipal.php";
include_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
include_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
include_once "../modelo/productos_model.php"; // se incluye el modelo producto
include_once "../modelo/marca_model.php"; // se incluye el modelo de marcas

$rand = rand(10000,50000);
?>

<tr id="producto_<?= $rand ?>">
    <td class="text-center">
        <div class="col-12 mb-3 input-group">
            <button type="button" id="startButton" class="bi-qr-code-scan input-group-text"></button>
            <input type="text" class="form-control" name="code[]" id="code<?= $rand ?>" placeholder="Escribe el código del producto" autocomplete="off">
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="Nombre_dataList_<?= $rand ?>" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre" autocomplete="off">

            <datalist id="Nombre_dataList_<?= $rand ?>">
                <?php producto_model::options_nombres_productos(); ?> 
            </datalist>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <select class="form-select mb-3" name="marcas[]" id="marca_<?= $rand ?>">
                <option selected disabled>Selecciona una opción</option>
                <?php marca_model::optionsId(); ?> 
            </select>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <select class="form-select mb-3" name="presentacion[]" id="presentacion<?= $rand ?>">
                <option selected disabled>Selecciona una opción</option>
                <?php presentacion_model::optionsId(); ?>
            </select>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <select class="form-select mb-3" name="categoria[]" id="categoria<?= $rand ?>">
                <option selected disabled>Selecciona una opción</option>
                <?php category_model::optionsId(); ?>
            </select>
        </div>
    </td>

    <td class="text-center">
        <button type="button" onclick="document.getElementById(`producto_<?= $rand ?>`).remove();" class="btn btn-danger bi bi-trash"></button>
    </td>
</tr>