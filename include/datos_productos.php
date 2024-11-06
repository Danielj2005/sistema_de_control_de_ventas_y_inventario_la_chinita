<?php
require_once ('../config/ConfigServer.php');
require_once ('../modelo/modeloPrincipal.php');
$modulo = $_POST['modulo'];

$id_producto = $_POST['id_producto'];

$j = 1;

for($i = 0; $i < COUNT($id_producto); $i++){

    $datos_producto = mysqli_fetch_array(modeloPrincipal::Consultar("SELECT nombre_producto, id_producto, precio_compra_dolar, precio_compra_bs 
        FROM producto WHERE id_producto = ".$id_producto[$i]."")); ?>

    <tr id="producto_<?= $id_producto[$i] ?>">
        <th class="col text-center" scope="row"><?= $j++; ?></th>
        <td class="col text-center" id="producto_<?= $id_producto[$i] ?>"><?= $datos_producto["nombre_producto"] ?></td>
        
        <?php 
            // estos datos se muestran en la vista de registro de entrada
            // if($con_precios == '0') { 
            if($modulo == 'registrar_entrada') { ?> 
                <td class="col text-center" id="cantidad_<?= $id_producto[$i] ?>">
                    <input type="text" class="form-control cantidad_total" name="cantidad_producto[]" onblur="monto_total_productos()" placeholder="cantidad a ingresar" required>
                </td>
                <td class="col text-center">
                    <input type="text" id="precio_dolar_<?= $id_producto[$i] ?>" class="form-control precio_dolar_total" name="precio_dolar[]" onkeyup="transformar('precio_dolar_<?= $id_producto[$i] ?>','precio_bolivar_<?= $id_producto[$i] ?>')" onblur="monto_total_productos()" placeholder="precio en $" required>
                </td>
                <td class="col text-center">
                    <input type="text" id="precio_bolivar_<?= $id_producto[$i] ?>" class="form-control precio_bolivar_total bg-dark-subtle" name="precio_bolivar[]" readonly placeholder="precion en bss" required>
                </td>

        <?php }
            // estos datos se muestran en la vista de registro de entrada
            if($modulo == 'agregar_servicio') { ?>

                <td class="col text-center" id="cantidad_<?= $id_producto[$i] ?>">
                    <input type="text" class="form-control cantidad_total" name="cantidad_producto[]" placeholder="cantidad a ingresar" required onkeyup="transformar('precio_dolar_<?= $id_producto[$i] ?>','precio_bolivar_<?= $id_producto[$i] ?>')" onblur="monto_total_productos()">
                </td>
                <td class="col text-center">
                    <input type="text" id="precio_dolar_<?= $id_producto[$i] ?>" class="form-control precio_dolar_total bg-dark-subtle" name="precio_dolar[]" value="<?= $datos_producto['precio_compra_dolar'];?>" readonly placeholder="precio en $" required>
                </td>
                <td class="col text-center">
                    <input type="text" id="precio_bolivar_<?= $id_producto[$i] ?>" class="form-control precio_bolivar_total bg-dark-subtle" name="precio_bolivar[]" value="<?= $datos_producto['precio_compra_bs']?>" readonly placeholder="precion en bs" required>
                </td>
        <?php } ?>
    </tr>
<?php }
