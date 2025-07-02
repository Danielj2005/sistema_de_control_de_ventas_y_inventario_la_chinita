<?php
session_start();

include_once "../modelo/modeloPrincipal.php";
include_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
include_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
include_once "../modelo/productos_model.php"; // se incluye el modelo producto
include_once "../modelo/marca_model.php"; // se incluye el modelo de marcas

$rand = rand(0,5000);
?>
<div class="card shadow-lg rounded-4 p-2 col-12 col-md-6 row" id="producto_<?= $rand ?>" style="max-width: 400px; width: 100%;">
    <label class="col-form-label card-title">Datos del Producto: </label>
    <div class="col-12 col-sm-12 mb-3 row">

        <div class="col-sm-12">
            <label class="col-form-label col-12 col-md-auto">Nombre del Producto <span style="color:#f00;"> *</span></label>
            <input type="text" class="form-control mb-3" list="Nombre_dataList_<?= $rand ?>" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre del producto" autocomplete="off">

            <datalist id="Nombre_dataList_<?= $rand ?>">
                <?php producto_model::options_nombres_productos(); ?> 
            </datalist>
        </div>
    </div>

    <!-- selector de Marca  -->
    <div class="col-12 col-sm-12 mb-3">
        <label class="col-form-label">Selecciona una Marca<span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <select name="id_marca[]" id="id_marca" class="form-select Select<?= $rand ?>">
                <option value="">Selecciona una opción</option>
                <?php marca_model::options(); ?> 
            </select>
        </div>
    </div>

    <!-- selector de presentacion  -->
    <div class="col-12 mb-3">
        <label class="col-form-label">Selecciona una Presentación <span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <input type="text" class="form-control mb-3" list="presentacion_dataList" name="id_presentacion[]" id="select_presentacion" placeholder="Escribe el nombre del producto" autocomplete="off">
            
            <datalist id="presentacion_dataList">
                <?php presentacion_model::options(); ?>
            </datalist>
        </div>
    </div>

    <!-- selector de categoría   -->
    <div class="col-12 mb-3">
        <label class="col-form-label">Selecciona una Categoría <span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <select name="id_categoria[]" id="categoria" class="form-select Select<?= $rand ?>">
                <option value="">Selecciona una opción</option>
                <?php category_model::options(); ?> 
            </select>
        </div>
    </div>

    <div class="text-center">
        <button type="button" onclick="document.getElementById(`producto_<?= $rand ?>`).remove();" class="btn btn-danger bi bi-trash">&nbsp; Eliminar</button>
    </div>
</div>