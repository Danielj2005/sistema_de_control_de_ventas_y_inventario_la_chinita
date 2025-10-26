<?php
require_once "../../../modelo/modeloPrincipal.php"; 
require_once "../../../modelo/venta_model.php"; 

$id_venta = modeloPrincipal::decryptionId($_POST['id']);
$id = modeloPrincipal::limpiar_cadena($id_venta);

$datos_venta = modeloPrincipal::consultar("SELECT C.cedula, C.nombre, C.telefono,
    U.cedula AS empleado_cedula, U.nombre AS empleado_nombre, 
    U.apellido AS empleado_apellido, U.correo, U.telefono AS empleado_telefono, 
    V.fecha_venta, V.sub_total_dolares, V.sub_total_bs,
    V.monto_total_dolares, V.monto_total_bolivares,
    V.id_venta
    FROM venta AS V 
    INNER JOIN cliente AS C ON C.id_cliente = V.id_cliente 
    INNER JOIN usuario AS U ON U.id_usuario = V.id_usuario 
    WHERE V.id_venta = $id");

$datos_venta = mysqli_fetch_array($datos_venta);

$detalles_venta_productos = modeloPrincipal::consultar("SELECT
	P.nombre_producto AS producto,
    PS.cantidad AS presentacion, R.nombre AS representacion,
    M.nombre AS marca, 
    DV.cantidad,
    round((SELECT MAX(dolar) AS dolar FROM dolar) * P.precio_venta, 2) AS precio
    FROM detalles_venta AS DV
    INNER JOIN producto AS P ON P.id_producto = DV.id_producto
    INNER JOIN presentacion AS PS ON P.id_presentacion = PS.id 
    INNER JOIN representacion AS R ON R.id = PS.id_representacion
    INNER JOIN marca AS M ON M.id = P.id_marca
    WHERE DV.id_venta = $id");

$detalles_venta = modeloPrincipal::consultar("SELECT M.nombre_platillo, DV.cantidad_servicio,
	round((SELECT MAX(dolar) AS dolar FROM dolar) * M.precio_dolar, 2) * DV.cantidad_servicio AS precio
    FROM detalles_venta AS DV
    INNER JOIN menu AS M ON M.id_menu = DV.id_servicio
    INNER JOIN detalles_menu AS DM ON DM.id_menu = M.id_menu
    WHERE DV.id_venta = $id");

$cantidades = mysqli_fetch_array( modeloPrincipal::consultar("SELECT cantidad_servicio, cantidad 
    FROM detalles_venta WHERE id_venta = $id"));

$cant_productos = $cantidades['cantidad'] == "" ? 0 : $cantidades['cantidad'];
$cant_servicios = $cantidades['cantidad_servicio'] == "" ? 0 : $cantidades['cantidad_servicio'];

?>

<div class="justify-content-center row">
    <img src="./img/logo.png" rel="icon" class="w-25">
</div>
<hr style="border-top: dotted; border-color: #000 !important;">

<h5 class=" text-center">BAR RESTAURANT Y LUNCHERIA <br>'LA CHINITA'</h5>
<h5 class=" text-center">RIF: V-04608675-5</h5>
<h5 class=" text-center">Calle 2 entre Av 5 y 6 - Villa Bruzual Portuguesa</h5>

<hr style="border-top: dotted; border-color: #000 !important;">

<div class="list-group-flush">
    <ul class="list-decoration-none list-group-item list-unstyled">
        <li class="list-item">RIF/C.I.: <?= $datos_venta['cedula']; ?></li>
        <li class="list-item">RAZON SOCIAL: <?= $datos_venta['nombre']; ?></li>
        <li class="list-item">TOTAL ART.: <?= $cant_productos + $cant_servicios ?></li>
    </ul>
</div>        

<h5 class="text-center">Empleado</h5>

<div class="list-group-flush">
    <ul class="list-decoration-none list-group-item list-unstyled">
        <li class="list-item">RIF/C.I.: <?= $datos_venta['empleado_cedula']; ?></li>
        <li class="list-item">RAZON SOCIAL: <?= $datos_venta['empleado_nombre'].' '.$datos_venta['empleado_apellido'];  ?></li>
    </ul>
</div> 

<hr style="border-top: dotted; border-color: #000 !important;">

<h5 class="card-title text-center">FACTURA</h5>

<div class="row">
    <div class="col-12 row">
        <p class="col-6 text-start">Nº FACTURA: <?= venta_model::generar_numero($datos_venta['id_venta']); ?></p>
        <p class="col-6 text-end"></p>
        <p class="col-6 text-start">FECHA: <?= date ("d-m-Y",strtotime($datos_venta['fecha_venta'])); ?></p>
        <p class="col-6 text-end">HORA: <?= date( 'h:i:a',strtotime($datos_venta['fecha_venta'])); ?></p>
    </div>

</div>

<hr style="border-top: dotted; border-color: #000 !important;">

<?php while($row = mysqli_fetch_array($detalles_venta_productos)){  ?>
    <div>
        <div class="col-12 mb-2 d-flex justify-content-between">
            <p class=" text-start"><?= $row['producto'].' '.$row['marca'].' '.$row['presentacion'].' '.$row['representacion'] ?></p>
            <p class=" text-end"><?= 'Cant.:'.$row['cantidad']; ?></p>
            <p class=" text-end">Bs <?= $row['precio'] ?></p>
        </div>
    </div>
<?php } 

    while($row = mysqli_fetch_array($detalles_venta)){  ?>
        <div>
            <div class="col-12 mb-2 d-flex justify-content-between">
                <p class=" text-start">SERVICIO: </p>
                <p class=" text-start"><?= $row['nombre_platillo']?></p>
                <p class=" text-end"><?= 'Cant.:'.$row['cantidad_servicio']; ?></p>
                <p class=" text-end">Bs <?= $row['precio'] ?></p>
            </div>
        </div>
<?php } ?>

<hr style="border-top: dotted; border-color: #000 !important;">

<div>
    <div class="col-12 mb-2 row">
        <p class="col-6 text-start">SUBTOTAL</p>
        <p class="col-6 text-end">Bs <?= $datos_venta['sub_total_bs']; ?></p>
    </div>
</div>

<hr style="border-top: dotted; border-color: #000 !important;">
<div>
    <div class="col-12 mb-2 d-flex justify-content-between">
        <p>Exento</p>
        <p>Bs &nbsp;</p>
        <p>Bs </p>
    </div>
    <div class="col-12 mb-2 d-flex justify-content-between">
        <p>BI G16,00%</p>
        <p>Bs <?= $datos_venta['sub_total_bs']; ?></p>
        <p>IVA G16,00%</p>
        <p>Bs <?= round($datos_venta['sub_total_bs'] * 0.16, 2); ?></p>
    </div>
</div>
<hr style="border-top: dotted; border-color: #000 !important;">
<div>
    <div class="col-12 mb-2 row">
        <p class="col-6 text-start">SUBTOTAL</p>
        <p class="col-6 text-end">Bs <?= $datos_venta['sub_total_bs']; ?></p>
        <p class="col-6 text-end">IVA</p>
        <p class="col-6 text-end">Bs <?= round($datos_venta['sub_total_bs'] * 0.16, 2); ?></p>
    </div>
</div>

<hr style="border-top: dotted; border-color: #000 !important;">
<div>
    <div class="col-12 mb-2 row">
        <p class="col-6 text-start">TOTAL</p>
        <p class="col-6 text-end">Bs <?= $datos_venta['monto_total_bolivares']  ?> </p>
    </div>
</div>