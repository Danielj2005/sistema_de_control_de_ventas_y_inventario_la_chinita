<?php

require_once "../modelo/modeloPrincipal.php";

$id_servicio = modeloPrincipal::decryptionId($_POST['id']);

$con = modeloPrincipal::consultar("SELECT M.*, 
    (SELECT ROUND(MAX(dolar) * M.precio_dolar, 2 ) FROM dolar) AS precio_bs 
    FROM menu AS M
    WHERE M.id_menu = $id_servicio");

// se guardan los datos en un array y se imprime

while ($mostrar = mysqli_fetch_array($con)) { ?>
    <tr id="tr_add_servicio_<?= modeloPrincipal::encryptionId($mostrar["id_menu"]) ?>" >
        <input type="hidden" name="UIDS[]" value="<?= modeloPrincipal::encryptionId($mostrar["id_menu"]) ?>" required>
        <td class="col text-center" scope="col">
            <p class="text-primary fs-6"><?= $mostrar["nombre_platillo"]; ?></p>
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
            <button type="button" class="btn btn-danger bi bi-trash" onclick="quitar_elemento('tr_add_servicio_<?= modeloPrincipal::encryptionId($mostrar['id_menu']) ?>')"></button>
        </td>
    </tr>
<?php
}