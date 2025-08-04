<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";

$id = modeloPrincipal::limpiar_cadena($_POST['id']);

$detalles_entrada = modeloPrincipal::consultar("SELECT PV.nombre AS proveedor, 
    P.nombre_producto AS producto, 
    PS.nombre AS presentacion,
    D.cantidad_comprada, D.precio_unitario_dolar AS precio_dolar, D.precio_unitario_bs AS precio_bs,
    M.nombre AS marca
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN proveedor AS PV ON PV.id_proveedor = E.id_proveedor 
    WHERE D.id_entrada = $id");

$proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT  PV.nombre AS proveedor
    FROM entrada AS E
    INNER JOIN proveedor AS PV ON PV.id_proveedor = E.id_proveedor
    WHERE E.id_entrada = $id"));

$proveedor = $proveedor['proveedor'];
?>

<div class="table-responsive">
    <label class="col-form-label">Nombre proveedor: <b><?= $proveedor ?></b></label>
    <table class="table table-borderless table-striped" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Producto</th>
                <th class="col text-center" scope="col">Presentación</th>
                <th class="col text-center" scope="col">Cantidad</th>
                <th class="col text-center" scope="col">Precio por unidad en $</th>
                <th class="col text-center" scope="col">Precio por unidad en BS</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;
            // se guardan los datos en un array y se imprime
            while ( $mostrar = mysqli_fetch_array($detalles_entrada)) { ?>    
                <tr>
                    <td class="col text-center"><?= $i++; ?></td>
                    <td class="col text-center"><?= $mostrar["marca"]; ?></td>
                    <td class="col text-center"><?= $mostrar["presentacion"]; ?></td>
                    <td class="col text-center"><?= $mostrar["cantidad_comprada"]; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_dolar"].' $'; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_bs"].' bs'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>