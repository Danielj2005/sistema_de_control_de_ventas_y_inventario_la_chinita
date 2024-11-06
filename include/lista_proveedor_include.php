<?php 
// se importan la configuracion del servidor y el modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// script para crear una lista de proveedor
// se consultan las proveedor de la base de datos
$consulta = modeloPrincipal::consultar("SELECT * FROM proveedor");

// se guardan los datos en un array y se imprime
while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
    <tr>
        <td></td>
        <td><?= $mostrar["cedula_rif"]; ?></td>
        <td><?= $mostrar["nombre"]; ?></td>
        <td><?= $mostrar["correo"]; ?></td>
        <td><?= $mostrar["direccion"]; ?></td>
        <td><?= $mostrar["telefono"]; ?></td>

        <td scope='col' class="text-center">
            <input type="hidden" id="id_proveedor_<?= $mostrar["id_proveedor"]; ?>" name="id_proveedor" value="<?= $mostrar["id_proveedor"]; ?>">
            <button type="submit" class="btn btn-primary" onclick="asignar_id_proveedor(<?= $mostrar['id_proveedor']; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">MODIFICAR</button>
        </td>
        <td>
            <form action="historial.php" method="post">
                <input type="hidden" name="valor" value="<?= $mostrar["id_cliente"]; ?>">
                <button type="submit" class="btn btn-info">VER HISTORAL</button>
            </form>
        </td> 
    </tr>
<?php } ?>