<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/presentacion_model.php";
require_once "../../../modelo/categoria_model.php";

?>

<form id="SendForm" action="../controlador/producto_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
    <input type="hidden" name="modulo" value="Guardar">
    <input type="hidden" name="vista" value="1">
    <div class="col-12 col-sm-12 col-md-12 mb-3">
        <label class="col-form-label">Código<span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <input type="text" pattern="[0-9]{4,8}" maxlength="8" required="" placeholder="ingresa el código del producto" class="form-control" id="codigo_producto" name="codigo_producto">
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-12 mb-3">
        <label class="col-form-label">Nombre<span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <input type="text" maxlength="30" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{4,30}" required="" placeholder="ingresa el nombre del producto" class="form-control" id="nombre_producto" name="nombre_producto">
        </div>
    </div>
    <!-- selector de categoría  -->
    <div class="col-12 col-sm-12 col-md-12 mb-3">
        <label class="col-form-label">Selecciona una Categoría <span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <select name="id_categoria" id="categoria" class="form-select">
                <option value="">Selecciona una opción</option>
                <?php category_model::options(); ?> 
            </select>
        </div>
    </div>
    <!-- selector de presentacion -->
    <div class="col-12 col-sm-12 col-md-12 mb-3">
        <label class="col-form-label">Selecciona una Presentación <span style="color:#f00;">*</span></label>
        <div class="col-sm-12">
            <select name="id_presentacion" id="select_presentacion" class="form-select">
                <option value="0">Selecciona una opción</option>
                <?php presentacion_model::options(); ?>
            </select>
        </div>
    </div>

    <div class="col-12 mb-1">
        <div class="form-group">
            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
        </div>
    </div>
</form>