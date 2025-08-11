<?php
require_once "../../../modelo/modeloPrincipal.php"; 
require_once "../../../modelo/bitacora_model.php"; 

$id = modeloPrincipal::limpiar_cadena($_POST['id']);

$detalles_menu = modeloPrincipal::consultar("SELECT P.nombre_producto AS producto,
    PS.nombre AS presentacion, C.nombre AS categoria, DM.cantidad
    FROM detalles_menu AS DM
    INNER JOIN producto AS P ON P.id_producto = DM.id_producto
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria
    INNER JOIN menu AS M ON M.id_menu = DM.id_menu 
    WHERE DM.id_menu = $id");
$datosServicio = mysqli_fetch_array(modeloPrincipal::consultar("SELECT * FROM menu WHERE id_menu = $id"));
?>

<div class="mb-3 ms-0 mt-0 me-0 row">
    <div class="col-md-6 col-12 mb-3">
        <label class="form-label">Descripción</label>
        <div class="col-md-4 input-group">
            <input type="text" disabled class="form-control" value="<?= $datosServicio['descripcion']; ?>" placeholder="Descripción del servicio" name="descripcion" id="descripcion">
        </div>
    </div>

    <div class="col-md-6 col-12 mb-3">
        <label class="form-label">Precio de venta en $</label>
        <div class="col-md-4 input-group">
            <input type="text" disabled class="form-control" value="<?= $datosServicio['precio_dolar']; ?> $" placeholder="Precio de venta en $ del servicio" name="precio_dolar" id="precio_dolar" required>
        </div>
    </div>

</div>
<div class="table-responsive">
    <label>Productos del servicio</label>
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
                    <td class="text-center"><?= $mostrar['producto']; ?></td>
                    <td class="text-center"><?= $mostrar['presentacion']; ?></td>
                    <td class="text-center"><?= $mostrar['categoria']; ?></td>
                    <td class="text-center"><?= $mostrar['cantidad']; ?></td>
                </tr>
            <?php } ?>
        
        </tbody>
    </table>
</div>
