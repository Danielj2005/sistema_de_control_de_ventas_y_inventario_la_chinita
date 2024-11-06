<?php
require_once ('../config/ConfigServer.php');
require_once ('../modelo/modeloPrincipal.php');

if (isset($_POST['servicio'])) {

    $id_menu = $_POST['id_servicio'];
    $j = 1;
    for($i = 0; $i < COUNT($id_menu); $i++){
        $datos_servicio = mysqli_fetch_array(modeloPrincipal::Consultar("SELECT nombre_platillo, id_menu, precio_dolar
            FROM menu WHERE id_menu = ".$id_menu[$i]."")); ?>

        <tr id="servicio_<?= $id_menu[$i] ?>">
            <th class="col text-center" scope="row"><?= $j++ ?></th>
            <td class="col text-center" id="servicio_<?= $id_menu[$i] ?>"> <?= $datos_servicio["nombre_platillo"] ?>  </td>
            <td class="col text-center" id="cantidad_<?= $id_menu[$i] ?>">
                <input type="text" class="form-control cantidad_total" name="cantidad_servicio[]" onblur="monto_total_productos()" placeholder="cantidad a ingresar" required>
                <script type="text/javascript">transformar('precio_servicio_dolar_<?= $id_menu[$i] ?>','precio_servicio_bolivar_<?= $id_menu[$i] ?>'); </script>
            </td>
            <td class="col text-center">
                <input type="text" id="precio_servicio_dolar_<?= $id_menu[$i] ?>" value="<?= $datos_servicio['precio_dolar'];?>" class="form-control precio_dolar_total bg-dark-subtle" name="precio_servicio_dolar[]" readonly placeholder="precio en $" required>
            </td>
            <td class="col text-center">
                <input type="text" id="precio_servicio_bolivar_<?= $id_menu[$i] ?>" value="<?= $datos_servicio['precio_compra_dolar'];?>" class="form-control precio_bolivar_total bg-dark-subtle" name="precio_servicio_bolivar[]" readonly placeholder="precion en bss" required>
            </td>
        </tr>
    <?php }
}