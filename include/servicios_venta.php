<?php

require_once "../modelo/modeloPrincipal.php";

$id_servicio = $_POST['id'];

$consulta = modeloPrincipal::consultar("SELECT M.id_menu, M.nombre_platillo, M.descripcion, M.precio_dolar,
    ROUND(MAX(D.dolar) * M.precio_dolar,2 ) AS precio_bs 
    FROM `menu` AS M, dolar AS D
    WHERE M.id_menu = $id_servicio");
// se guardan los datos en un array y se imprime

while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
    <tr id="tr_add_servicio_<?= $mostrar["id_menu"] ?>" >
        <td class="col text-center" scope="col">
            <p class="text-primary fs-6"><?= $mostrar["nombre_platillo"] ?></p>
            <input type="hidden" name="id_menu[]" value="<?= $mostrar["id_menu"] ?>" required>
        </td> 

        <td class="col text-center" scope="col"><?= $mostrar["descripcion"] ?> </td>

        <td class="col text-center" scope="col">
            <input type="text" class="form-control cantidad" name="cantidad_servicio[]" onblur="monto_total_productos();" placeholder="ingresa la cantidad a vender" id="cantidad_servicio<?= $mostrar['id_producto'] ?>" required>
        </td>

        <td class="col text-center" scope="col">
            <input type="text" readonly class="bg-dark-subtle form-control precio_dolar" name="precio_servicio_dolar[]" id="precio_dolar<?= $mostrar['id_menu'] ?>" value="<?= $mostrar["precio_dolar"] ?>" required>
        </td>

        <td class="col text-center" scope="col">
            <input type="text" readonly class="bg-dark-subtle form-control precio_bs" name="precio_servicio_bolivar[]" id="precio_bs<?= $mostrar['id_menu'] ?>" value="<?= $mostrar["precio_bs"] ?>" required>
        </td>
        
        <td class="text-center col" scope="col">
            <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_add_servicio_<?= $mostrar['id_menu'] ?>')"></button>
        </td>
    </tr>
<?php
}