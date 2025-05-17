<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/presentacion_model.php";
require_once "../../../modelo/categoria_model.php";

$id = modeloPrincipal::limpiar_cadena($_POST['id']);

$detalles_entrada = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT mensaje FROM bitacora WHERE id = $id"));

?>

<div class="table-responsive">
    <label class="col-form-label">Nombre proveedor: <b>nombre proveedor</b></label>
    <table class="table table-borderless table-striped" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">PRODUCTO</th>
                <th class="col text-center" scope="col">PRESENTACIÓN</th>
                <th class="col text-center" scope="col">CATEGORÍA</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN $</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN BS</th>
                <th class="col text-center" scope="col">CANTIDAD COMPRADA</th>
                <th class="col text-center" scope="col">PRECIO TOTAL EN $</th>
                <th class="col text-center" scope="col">PRECIO TOTAL EN BS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            

            if($fecha1 == "" && $fecha2 == ""){
                $consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_venta_dolar,
                PROV.nombre, E.fecha_entrada, PS.nombre AS nombre_presentacion, DE.cantidad_comprada
                FROM entrada AS E 
                INNER JOIN detalles_entrada AS DE ON DE.id_entrada = E.id_entrada 
                INNER JOIN producto AS P ON P.id_producto = DE.id_producto 
                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
                ORDER BY E.fecha_entrada DESC");
            
            }else{
                $consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_venta_dolar,
                PROV.nombre, E.fecha_entrada, PS.nombre AS nombre_presentacion, DE.cantidad_comprada
                FROM entrada AS E 
                INNER JOIN detalles_entrada AS DE ON DE.id_entrada = E.id_entrada 
                INNER JOIN producto AS P ON P.id_producto = DE.id_producto 
                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
                WHERE E.fecha_entrada BETWEEN '$fecha1' AND '$fecha2' 
                ORDER BY E.fecha_entrada DESC");
                
                
            }
            
            
            $i = 1;
            // se guardan los datos en un array y se imprime
            while ( $mostrar = mysqli_fetch_array($consulta)) { ;?>    
                <tr>
                    <td class="col text-center"><?= $i++; ?></td>
                    <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                    <td class="col text-center"><?= $mostrar["precio_venta_dolar"].' $'; ?></td>
                    <td class="col text-center"><?= $mostrar["cantidad_comprada"]; ?></td>
                    <td class="col text-center"><?= date('Y-m-d h:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>
                
                    <td class="text-center col" scope="col">
                    <button modal="ver_detalles_entrada" <?= rol_model::verificar_rol('m_rol') == '1' ? 'url="./modal/producto/modificar_rol.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn bi bi-gear btn-warning" value="<?= $row["id_rol"]; ?>"></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>