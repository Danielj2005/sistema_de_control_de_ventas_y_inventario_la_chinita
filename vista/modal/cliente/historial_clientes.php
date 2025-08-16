<?php 
session_start();

include_once "../../../modelo/modeloPrincipal.php"; // se incluye el modelo principal
include_once "../../../modelo/cliente_model.php"; // se incluye el modelo principal
include_once "../../../modelo/rol_model.php"; // se incluye el modelo principal
include_once "../../../modelo/venta_model.php"; // se incluye el modelo principal

$id_usuario = $_SESSION['id_usuario'];

$id_cliente = modeloPrincipal::decryptionId($_POST['id']);
$id_cliente = modeloPrincipal::limpiar_cadena($id_cliente);

        
$historial_cliente = modeloPrincipal::consultar("SELECT V.id_venta, V.fecha_venta, V.monto_total_dolares, V.monto_total_bolivares,
    V.id_usuario, C.nombre 
    FROM venta AS V 
    INNER JOIN cliente AS C ON C.id_cliente = V.id_cliente 
    WHERE C.id_cliente = $id_cliente ORDER BY V.id_venta DESC");

$nombre_cliente = mysqli_fetch_array($historial_cliente);
$nombre_cliente = modeloPrincipal::limpiar_mayusculas($nombre_cliente['nombre']);

$rol_usuario = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id_rol FROM usuario WHERE id_usuario = $id_usuario"));

$id_rol = intval($rol_usuario['id_rol']);


?>
<legend> Nombre del cliente : <?= "$nombre_cliente" ?></legend>
<div class="table table-responsive" id="SendForm">
    <table class="table table-striped example" >
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Nº DE FACTURA</th>
                <th class="col text-center" scope="col">TOTAL EN $</th>
                <th class="col text-center" scope="col">TOTAL EN BS</th>
                <th class="col text-center" scope="col">FECHA / HORA</th>

                <?php if (rol_model::verificar_rol('f_cliente') == '1') { ?>
                    <th class="col text-center" scope="col">VER FACTURA</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php 
                while ( $mostrar = mysqli_fetch_array($historial_cliente)) { ?>    
                    <tr>
                        <td class="text-center col"> </td>
                        <td class="text-center col">#<?= venta_model::generar_numero($mostrar['id_venta']); ?></td>
                        <td class="text-center col"><?= $mostrar["monto_total_dolares"].' $'; ?></td>
                        <td class="text-center col"><?= $mostrar["monto_total_bolivares"].' bs'; ?></td>
                        <td class="text-center col"><?= date("d/m/Y h:i:a", strtotime($mostrar["fecha_venta"])); ?></td>
                    
                        <?php if (rol_model::verificar_rol('f_cliente') == '1') { ?>
                            <td class="text-center col">
                                
                                <form method="post" class="text-center" id="venta_<?= $mostrar["id_venta"] ?>" action="./reportes/factura_cliente.php" target="_blank">
                                    
                                    <input type="hidden" name="UIDC" value="<?= modeloPrincipal::encryptionId($id_cliente) ?>">
                                    <input type="hidden" name="UIDV" value="<?= modeloPrincipal::encryptionId($mostrar["id_venta"]) ?>">
                                    <input type="hidden" name="UIDU" value="<?= modeloPrincipal::encryptionId($mostrar["id_usuario"]) ?>">

                                    <button type="submit" form="venta_<?= $mostrar["id_venta"] ?>" class="btn btn-primary bi bi-file-text"></button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>
