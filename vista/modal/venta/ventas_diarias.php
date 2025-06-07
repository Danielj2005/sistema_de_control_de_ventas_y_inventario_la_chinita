<?php
require_once "../../../modelo/modeloPrincipal.php"; 
require_once "../../../modelo/venta_model.php"; 

$id = modeloPrincipal::limpiar_cadena($_POST['id']);

$detalles_venta = modeloPrincipal::consultar("SELECT C.cedula, C.nombre, C.telefono,
    U.cedula, U.nombre, U.apellido, U.correo, U.telefono, 
    V.fecha_venta, V.sub_total_dolares, V.sub_total_bs, 
    V.monto_total_dolares, V.monto_total_bolivares,
    V.id_venta
    
    FROM venta AS V 
    INNER JOIN cliente AS C ON C.id_cliente = V.id_cliente 
    INNER JOIN usuario AS U ON U.id_usuario = V.id_usuario 
    WHERE V.id_venta = $id");

$cliente = mysqli_fetch_array($detalles_venta);

?>
<div class="invoice-header">
    <h2>Bar Restaurante La Chinita</h2>
</div>
<div class="invoice-details">
    <p><strong>Número de Factura:</strong> <?= venta_model::generar_numero($cliente['id_venta']); ?></p>
    <p><strong>Fecha:</strong><?= $cliente['fecha_venta']; ?></p>
    <p><strong>Cédula del Cliente:</strong> <?= $cliente['cedula']; ?></p>
    <p><strong>Nombre del Cliente:</strong> <?= $cliente['nombre']; ?></p>
    <p><strong>Teléfono del Cliente:</strong> <?= $cliente['telefono']; ?></p>
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio $</th>
            <th>Precio bs</th>
            <th>Total $</th>
            <th>Total bs</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Producto 1</td>
            <td>2</td>
            <td>$10.00</td>
            <td>$20.00</td>
            <td>$20.00</td>
            <td>$20.00</td>
        </tr>
        <tr>
            <td>Producto 2</td>
            <td>1</td>
            <td>$15.00</td>
            <td>$15.00</td>
            <td>$15.00</td>
            <td>$15.00</td>
        </tr>
    </tbody>
</table>
<div class="invoice-footer">
    <h5>Sub total: 35.00 bs</h5>
    <h5>Sub total: 35.00 $</h5>
    <hr>
    <h5>Total: 35.00 bs</h5>
    <h5>Total: 35.00 $</h5>
</div>