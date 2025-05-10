<?php

require_once("../../../modelo/modeloPrincipal.php"); 
require_once("../../../modelo/proveedor_model.php"); 

$id_proveedor = modeloPrincipal::limpiar_cadena($_POST['id']);

if (!isset($_POST['id'])) {
    alert_model::alerta_simple("¡Ocurrio un error!","No se está recibiendo correctamente el identificador del proveedor","error");
    exit();
}

$datos_proveedor = mysqli_fetch_assoc(proveedor_model::consultar_proveedor_por_id("nombre, correo, direccion, telefono",$id_proveedor));

?>

<div class="col-12 mb-3">
    <legen>Nombre: <b>"<?= $datos_proveedor['nombre']; ?>"</b></legen>
</div>

<div class="col-12 mb-3">
    <label class="form-label">Correo <span style="color:#f00;">*</span></label>
    <input type="text" class="bg-secondary-subtle form-control" value="<?= $datos_proveedor['correo']; ?>" name="correo" readonly="true" >
</div>

<div class="col-12 mb-3">
    <label class="form-label">Teléfono <span style="color:#f00;">*</span></label>
    <input type="text" class="bg-secondary-subtle form-control" value="<?= $datos_proveedor['telefono']; ?>" name="telefono" readonly="true" >
</div>

<div class="col-12 mb-3">
    <label class="form-label">Dirección <span style="color:#f00;">*</span></label>
    <input type="text" class="bg-secondary-subtle form-control" value="<?= $datos_proveedor['direccion']; ?>" name="direccion" readonly="true" >
</div>

