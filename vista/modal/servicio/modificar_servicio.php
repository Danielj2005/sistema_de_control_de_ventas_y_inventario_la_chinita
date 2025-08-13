<?php 
session_start();

require_once("../../../modelo/modeloPrincipal.php"); 
require_once("../../../modelo/proveedor_model.php"); 

$id = modeloPrincipal::decryptionId($_POST['id']);
$id_menu = modeloPrincipal::limpiar_cadena($id);

if (!isset($_POST['id'])) {
    alert_model::alerta_simple("¡Ocurrio un error!","No se está recibiendo correctamente el identificador del proveedor","error");
    exit();
}

$precio_dolar_actual = $_SESSION['dolar'];

$servicios = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM menu WHERE id_menu = $id_menu"));

$detalles_menu = modeloPrincipal::consultar("SELECT P.nombre_producto AS producto,
    PS.nombre AS presentacion, C.nombre AS categoria, DM.cantidad
    FROM `detalles_menu` AS DM
    INNER JOIN producto AS P ON P.id_producto = DM.id_producto
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
    INNER JOIN menu AS M ON M.id_menu = DM.id_menu 
    WHERE DM.id_menu = $id_menu");

?>
<form id="SendForm" action="../controlador/menu_controlador.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="update">
    <div class="card-body p-2">
        <input type="hidden" name="dolar" id="precioDolar" value="<?= $precio_dolar_actual; ?>">
        <input type="hidden" name="modulo" value="Modificar">    
        <input type="hidden" value="<?= $id_menu ?>" name="id_menu">
    
        <div class="col-12 col-sm-12 col-md-12 mb-3">
            <h5 class="card-title"> Datos del Servicio </h5>
            <div class="row">
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
        
        <div class="table-responsive">
            <h5 class="card-title">Productos del servicio</h5>
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th class="col text-center" scope="col">Producto</th>
                        <th class="col text-center" scope="col">Presentación</th>
                        <th class="col text-center" scope="col">Categoría</th>
                        <th class="col text-center" scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($detalles_menu) <= 0) {
                        echo '<tr><td colspan="4" class="text-center">No se encontraron los detalles de este servicio</td></tr>';
                    }
                    // se guardan los datos en un array y se imprime
                    while ( $mostrar = mysqli_fetch_array($detalles_menu)) { ;?>    
                        <tr>
                            <td class="text-center">
                                <div class="col-12 mb-3">
                                    <input value="<?= $mostrar['producto']; ?>" type="text" class="form-control mb-3" list="datalist_nombre_productos" name="nombre_producto[]" id="input_nombre_producto_<?= modeloPrincipal::encryptionId($mostrar['id_producto']); ?>" placeholder="Escribe el nombre del producto" autocomplete="off">
                                    <datalist id="datalist_nombre_productos">
                                        <?php producto_model::options_nombres_productos(); ?> 
                                    </datalist>
                                </div>
                            </td>
                            <td class="text-center"><?= $mostrar['presentacion']; ?></td>
                            <td class="text-center"><?= $mostrar['categoria']; ?></td>
                            <td class="text-center"><?= $mostrar['cantidad']; ?></td>
                        </tr>
                    <?php } ?>
                
                </tbody>
            </table>
        </div>
    </div>
</form>
        