<?php 
session_start();

require_once("../../../modelo/modeloPrincipal.php"); 
require_once("../../../modelo/proveedor_model.php"); 

$id_menu = modeloPrincipal::limpiar_cadena($_POST['id']);

if (!isset($_POST['id'])) {
    alert_model::alerta_simple("¡Ocurrio un error!","No se está recibiendo correctamente el identificador del proveedor","error");
    exit();
}


$precio_dolar_actual = $_SESSION['dolar'];

$servicios = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM menu WHERE id_menu = $id_menu"));

?>
<form id="SendForm" action="../controlador/menu_controlador.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update">
    <div class="card-body p-2">
        <input type="hidden" name="dolar" id="precioDolar" value="<?= $precio_dolar_actual; ?>">
        <input type="hidden" name="modulo" value="Modificar">    
        <input type="hidden" value="<?= $id_menu ?>" name="id_menu">
    
        <div class="col-12 col-sm-12 col-md-12 mb-3">
            <h5 class="card-title"> Datos del Servicio </h5>
            <div class="row mt-2">
                <div class="col-md-6 col-12 mb-3">
                    <label class="form-label">Nombre del Servicio</label>
                    <div class="col-md-4 input-group">
                    <input type="text" class="form-control" value="<?= $servicios['nombre_platillo'] ?>" placeholder="ingresa el nombre del servicio" name="nombre_platillo" id="nombre_platillo" required>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" value="<?= $servicios['descripcion'] ?>" placeholder="ingresa la descripción" id="descripcion" name="descripcion" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label class="form-label">Precio de venta en $</label>
                    <div class="col-md-4 input-group">
                    <input type="text" class="form-control" value="<?= $servicios['precio_dolar'] ?>" placeholder="ingresa el precio de venta en $" name="precio_dolar" id="precio_dolar" required>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label class="form-label">Estado</label>
                    
                    <select class="form-select" name="estado_menu" id="id_estado">
    
                        <option value="1" <?= ($servicios['estatus'] == 1) ? 'selected' : ''; ?>>Activo</option>
                        <option value="0" <?= ($servicios['estatus'] == 1) ? '' : 'selected'; ?>>Inactivo</option>
                    </select>
                </div>
            </div>
        </div>
        
    </div>
</form>
        