<?php 
// se importan la configuracion del servidor y el modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// script para crear una lista de proveedor
// se consultan las proveedor de la base de datos
$consulta = modeloPrincipal::consultar("SELECT producto.id_producto, producto.nombre_producto FROM producto");

// se guardan los datos en un array y se imprime
while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
    <tr>
        <td><?= $mostrar["id_producto"]; ?></td>
        <td><?= $mostrar["nombre_producto"]; ?></td>
 
    </tr>
<?php } ?>