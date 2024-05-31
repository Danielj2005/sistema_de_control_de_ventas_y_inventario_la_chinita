<?php 
// se importan la configuracion del servidor y el modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// script para crear una lista de cliente
// se consultan los cliente de la base de datos
// $consulta = modeloPrincipal::consultar("SELECT * FROM cliente");

// variable para iterar los resultados 
$i = 1;  

// se guardan los datos en un array y se imprime
// while ( $mostrar = mysqli_fetch_array($consulta)) { ?>

    <tr>
        <td><?= $i; ?></td>
        <td><?php echo 'PEPSI '; //$mostrar["cedula"]; ?></td>
        <td><?php echo 'PEPSI C.O. '; //$mostrar["nombre"]; ?></td>
        <td><?php echo '10$ '; //$mostrar["telefono"]; ?></td>
        <td><?php echo '20'; //$mostrar["telefono"]; ?></td>
        <td><?php echo date('d-m-Y'); //$mostrar["telefono"]; ?></td>
    </tr>
<?php // } ?>