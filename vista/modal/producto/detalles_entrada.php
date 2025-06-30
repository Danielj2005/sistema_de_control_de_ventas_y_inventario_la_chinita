<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";

$id = modeloPrincipal::limpiar_cadena($_POST['id']);

$detalles_entrada = modeloPrincipal::consultar("SELECT PV.nombre AS proveedor, P.nombre_producto AS producto, 
    PS.nombre AS presentacion, C.nombre AS categoria,
    D.cantidad_comprada, D.precio_unitario_dolar AS precio_dolar, 
    D.precio_unitario_bs AS precio_bs, D.total_dolar, D.total_bs 
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
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
                <th class="col text-center" scope="col">PRODUCTO</th>
                <th class="col text-center" scope="col">CATEGORÍA</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD $</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD BS</th>
                <th class="col text-center" scope="col">TOTAL $</th>
                <th class="col text-center" scope="col">TOTAL BS</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;
            // se guardan los datos en un array y se imprime
            while ( $mostrar = mysqli_fetch_array($detalles_entrada)) { ?>    
                <tr>
                    <td class="col text-center"><?= $i++; ?></td>
                    <td class="col text-center"><?= $mostrar["producto"].' '.$mostrar["presentacion"]; ?></td>
                    <td class="col text-center"><?= $mostrar["categoria"]; ?></td>
                    <td class="col text-center"><?= $mostrar["cantidad_comprada"]; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_dolar"].' $'; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_bs"].' bs'; ?></td>
                    <td class="col text-center"><?= $mostrar["total_dolar"].' $'; ?></td>
                    <td class="col text-center"><?= $mostrar["total_bs"].' bs'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>