<?php 
// se importan la configuracion del servidor y el modelo principal
include_once "../modelo/modeloPrincipal.php";
include_once "../modelo/venta_model.php";

$ventas_del_dia = modeloPrincipal::consultar("SELECT V.id_venta, C.cedula, C.nombre,
    V.monto_total_bolivares, V.monto_total_dolares, V.fecha_venta 
    FROM venta as V 
    INNER JOIN cliente as C ON C.id_cliente = V.id_cliente
    WHERE DATE(V.fecha_venta) = '$fecha_del_dia' 
    ORDER BY V.fecha_venta DESC LIMIT 100");   

// $i = 1;

while($row = mysqli_fetch_array($ventas_del_dia)){ ?>
<tr>
    <td class="text-center col"></td> 
    <td class="text-center col">#<?= venta_model::generar_numero($row['id_venta']) ?></td> 
    <td class="text-center col"><?= $row['cedula'] ?></td> 
    <td class="text-center col"><?= $row['nombre'] ?></td> 
    <td class="text-center col"><?= $row['monto_total_dolares'].' $' ?></td> 
    <td class="text-center col"><?= $row['monto_total_bolivares'].' bs' ?></td> 
    <td class="text-center col"><?= date("d-m-Y  h:i:a",strtotime($row['fecha_venta'])) ?></td> 
    <td class="text-center col">
        <button class="btn_modal btn btn-info bi bi-eye" url="./modal/venta/ventas_diarias.php" value="<?= $row['id_venta'] ?>" modal="ver_detalles_venta_del_dia" data-bs-toggle="modal" data-bs-target="#detalles_venta"></button>
    </td> 
</tr>
<?php }