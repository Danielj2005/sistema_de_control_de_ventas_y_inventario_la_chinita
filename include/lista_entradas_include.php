<?php 
// se importan la configuracion del servidor y el modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// script para crear una lista de proveedor
// se consultan las proveedor de la base de datos
$consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_compra_dolar, P.precio_compra_bs , PROV.nombre, E.stock_comprado, E.fecha_entrada 
    FROM entrada AS E 
    INNER JOIN producto AS P ON P.id_producto = E.id_producto 
    INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor ORDER BY E.fecha_entrada DESC");

$i = 0;
// se guardan los datos en un array y se imprime
while ( $mostrar = mysqli_fetch_array($consulta)) { $i++;?>    
    <tr>
        <td class="col text-center"><?= $i; ?></td>
        <td class="col text-center"><?= $mostrar["nombre_producto"]; ?></td>
        <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
        <td class="col text-center"><?= $mostrar["precio_compra_dolar"].'$'; ?></td>
        <td class="col text-center"><?= $mostrar["precio_compra_bs"].'bs'; ?></td>
        <td class="col text-center"><?= $mostrar["stock_comprado"]; ?></td>
        <td class="col text-center"><?= $mostrar["fecha_entrada"]; ?></td>
    </tr>
<?php } ?>