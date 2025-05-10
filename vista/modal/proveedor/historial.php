<?php

require_once ("../../../modelo/modeloPrincipal.php"); 
require_once ("../../../modelo/proveedor_model.php"); 
require_once ("../../../modelo/modelo_usuario.php"); 
require_once ("../../../modelo/rol_model.php"); 
require_once ("../../../modelo/alert_model.php"); 

$id_proveedor = modeloPrincipal::limpiar_cadena($_POST['id']);

$consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_compra_dolar,
    P.precio_compra_bs, PROV.id_proveedor, PROV.nombre, E.stock_comprado, E.fecha_entrada, 
    ROUND(P.precio_compra_bs / P.precio_compra_dolar,2 ) AS tasa, PS.nombre AS nombre_presentacion, C.nombre AS nombre_categoria
    FROM entrada AS E 
    INNER JOIN producto AS P ON P.id_producto = E.id_producto 
    INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor
    INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
    INNER JOIN categoria as C ON C.id_categoria = P.id_categoria 
    WHERE PROV.id_proveedor = $id_proveedor ORDER BY E.fecha_entrada DESC");

$nombre_proveedor = mysqli_fetch_array($consulta);
$nombre_proveedor = $nombre_proveedor['nombre'];

if (mysqli_num_rows($consulta) < 1) {
    ?> 
    <div class="row justify-content-center" role="alert">
        <div class="alert alert-danger w-auto" role="alert">
            No se ha encontrado un historial asociado a este proveedor, asegurese de haberle hecho alguna compra al menos una vez.
        </div>
    </div>
    <?php
    exit();
}
?>
<legend class="mb-3 text-center"> Nombre del proveedor :  <b>"<?= $nombre_proveedor ?>"</b></legend>
<div class="table-responsive">
    <table class="table table-striped table-borderless example pt-2">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Producto</th>
                <th class="col text-center" scope="col">Presentación</th>
                <th class="col text-center" scope="col">Categorías</th>
                <th class="col text-center" scope="col">Cantidad</th>
                <th class="col text-center" scope="col">Precio $</th>
                <th class="col text-center" scope="col">Precio BS</th>
                <th class="col text-center" scope="col">Tasa</th>
                <th class="col text-center" scope="col">Fecha y hora</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                $i = 1;

                while ( $mostrar = mysqli_fetch_array($consulta)) { ;?>    
                    <tr>
                        <td class="col text-center"></td>
                        <td class="col text-center"><?= $mostrar["nombre_producto"]; ?></td>
                        <td class="text-center col"><?= $mostrar['nombre_presentacion'] ?></td> 
                        <td class="text-center col"><?= $mostrar['nombre_categoria'] ?></td> 
                        <td class="col text-center"><?= $mostrar["stock_comprado"]; ?></td>
                        <td class="col text-center"><?= $mostrar["precio_compra_dolar"].'$'; ?></td>
                        <td class="col text-center"><?= $mostrar["precio_compra_bs"].'bs'; ?></td>
                        <td class="col text-center"><?= $mostrar["tasa"].'bs'; ?></td>
                        <td class="col text-center"><?= date('d-m-Y / h:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    <!-- <div class="modal-footer">
        <form target="_blank" action="./reportes/historial_proveedor.php" method="post">
            <input type="hidden" value="<?= $nombre_proveedor['id_proveedor'] ?>" name="id_proveedor">
            <button type="submit" class="btn btn-primary">Exportar Historial en PDF</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div> -->