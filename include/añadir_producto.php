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
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="Nombre_dataList_<?= $rand ?>" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre del producto" autocomplete="off">

            <datalist id="Nombre_dataList_<?= $rand ?>">
                <?php producto_model::options_nombres_productos(); ?> 
            </datalist>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="dataList_nombre_marca_<?= $rand ?>" name="marcas[]" id="input_nombre_marca" placeholder="Escribe el nombre del producto" autocomplete="off">

            <datalist id="dataList_nombre_marca_<?= $rand ?>">
                <?php marca_model::options(); ?> 
            </datalist>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="presentacion_dataList<?= $rand ?>" name="presentacion[]" id="select_presentacion" placeholder="Escribe el nombre del producto" autocomplete="off">
            <datalist id="presentacion_dataList<?= $rand ?>">
                <?php presentacion_model::options(); ?>
            </datalist>
        </div>
    </td>
    <td class="text-center">
        <div class="col-12 mb-3">
            <input type="text" class="form-control mb-3" list="datalist_nombre_categoria_<?= $rand ?>" name="categoria[]" id="input_nombre_categoria" placeholder="Seleccione una Categoría" autocomplete="off">
            <datalist id="datalist_nombre_categoria_<?= $rand ?>">
                <?php category_model::options(); ?>
            </datalist>
        </div>
    </td>

    <td class="text-center">
        <button type="button" onclick="document.getElementById(`producto_<?= $rand ?>`).remove();" class="btn btn-danger bi bi-trash"></button>
    </td>
</tr>