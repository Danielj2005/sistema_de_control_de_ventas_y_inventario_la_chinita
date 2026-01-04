<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";

$id = modeloPrincipal::decryptionId($_POST['id']);
$id = modeloPrincipal::limpiar_cadena($id);

$detalles_entrada = modeloPrincipal::consultar("SELECT PS.cantidad AS presentacion, R.nombre AS representacion,
    P.id_producto, P.codigo, P.nombre_producto, E.total_dolar, E.total_bs,
    C.nombre AS categoria,
    D.cantidad_comprada, D.precio_unitario_dolar AS precio_dolar, D.precio_unitario_bs AS precio_bs,
    M.nombre AS marca, 
    U.cedula AS dni, U.nombre AS usuario
    FROM detalles_entrada AS D 
    INNER JOIN entrada AS E ON E.id_entrada = D.id_entrada 
    INNER JOIN producto AS P ON P.id_producto = D.id_producto 
    INNER JOIN usuario AS U ON U.id_usuario = E.id_usuario 
    INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
    INNER JOIN marca AS M ON M.id = P.id_marca
    INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion
    INNER JOIN representacion AS R ON R.id = PS.id_representacion
    WHERE D.id_entrada = $id");

$proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT PV.nombre AS proveedor
    FROM entrada AS E
    INNER JOIN proveedor AS PV ON PV.id_proveedor = E.id_proveedor
    WHERE E.id_entrada = $id"));

$proveedor = $proveedor['proveedor'];

$row = mysqli_fetch_array($detalles_entrada);
?>

<div class="table-responsive">
    <div class="text-center">
        <p class="d-block text-muted">
            <span class="fw-bold">Nombre proveedor:</span> <?= $proveedor ?>
        </p>
        <p class="d-block text-muted">
            <span class="fw-bold">Total de la Compra ($):</span> <?= modeloPrincipal::number_format_prices($row["total_dolar"]); ?> $
        </p>
        <p class="d-block text-muted">
            <span class="fw-bold">Total de la Compra (Bs):</span> <?= modeloPrincipal::number_format_prices($row["total_bs"]); ?> Bs
        </p>
    </div>
    <table class="table table-borderless table-striped tableDetailsEntry" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">N.º</th>
                <th class="col text-center" scope="col">Producto</th>
                <th class="col text-center" scope="col">Unidades Compradas</th>
                <th class="col text-center" scope="col">Costos Unitario</th>
                <th class="col text-center" scope="col">Registrado por</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;
            // se guardan los datos en un array y se imprime
            while ( $mostrar = mysqli_fetch_array($detalles_entrada)) { ?>    
                <tr>
                    <td class="col text-center"></td>
                    <td class="text-start">
                        <p class="fw-bold mb-1"> Código: <?= $mostrar["codigo"] ?> </p>
                        <p class="text-<?=  $mostrar["cantidad_comprada"] == 0 ? "danger" : "primary" ?>  fw-bold mb-1">
                            <?= $mostrar["marca"] . ' - ' . $mostrar["nombre_producto"] . ' - ' . $mostrar["presentacion"] . ' ' . $mostrar["representacion"] ?>
                        </p>
                        <small class="d-block text-muted"> <span class="fw-bold">Categoria:</span> <?= $mostrar["categoria"] ?> </small>
                    </td>
                    <td class="col text-center"><?= $mostrar["cantidad_comprada"]; ?></td>
                    <td class="col text-center">
                        
                        <div class="text-center">
                            <p class="col-12"><span class="badge text-bg-secondary fs-6"> <?= modeloPrincipal::number_format_prices($mostrar["precio_dolar"]); ?> $ </span></p>
                            <p class="col-12"><span class="badge text-bg-secondary fs-6"> <?= modeloPrincipal::number_format_prices($mostrar["precio_bs"]); ?> Bs</span> </p>
                        </div>
                        
                    </td>
                    <td class="col text-center"><?= $mostrar["dni"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>