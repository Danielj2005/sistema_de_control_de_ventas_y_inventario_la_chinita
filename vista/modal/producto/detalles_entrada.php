<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";

$id = modeloPrincipal::decryptionId($_POST['id']);
$id = modeloPrincipal::limpiar_cadena($id);

$detalles_entrada = modeloPrincipal::consultar("SELECT
    D.cantidad_comprada, D.precio_unitario_dolar AS precio_dolar, D.precio_unitario_bs AS precio_bs,
    PS.cantidad AS presentacion, R.nombre AS representacion,
    M.nombre AS marca, U.nombre AS usuario
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN usuario AS U ON U.id_usuario = E.id_usuario 
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN representacion AS R ON R.id = PS.id_representacion
    WHERE D.id_entrada = $id");

$proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT PV.nombre AS proveedor
    FROM entrada AS E
    INNER JOIN proveedor AS PV ON PV.id_proveedor = E.id_proveedor
    WHERE E.id_entrada = $id"));

$proveedor = $proveedor['proveedor'];
?>

<div class="table-responsive">
    <label class="col-form-label">Nombre proveedor: <b><?= $proveedor ?></b></label>
    <table class="table table-borderless table-striped tableDetailsEntry" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Producto</th>
                <th class="col text-center" scope="col">Presentación</th>
                <th class="col text-center" scope="col">Cantidad</th>
                <th class="col text-center" scope="col">Precio por unidad en $</th>
                <th class="col text-center" scope="col">Precio por unidad en BS</th>
                <th class="col text-center" scope="col">Quién Realizó la entrada</th>
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
                    <td class="col text-center"><?= $mostrar["presentacion"]." ".$mostrar["representacion"]; ?></td>
                    <td class="col text-center"><?= $mostrar["cantidad_comprada"]; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_dolar"].' $'; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_bs"].' bs'; ?></td>
                    <td class="col text-center"><?= $mostrar["usuario"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>