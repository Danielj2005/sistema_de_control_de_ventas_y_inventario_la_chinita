<?php

require_once ('../config/ConfigServer.php');
require_once ('../modelo/modeloPrincipal.php');


$modulo = $_POST['modulo'];
$id = $_POST['id'];

if($modulo == "detalles_venta"){
    

    $detalles_venta_servicios = modeloPrincipal::consultar("SELECT M.nombre_platillo, DV.cantidad_servicio, 
        DV.precio_servicio_dolares, DV.precio_servicio_bolivares FROM detalles_venta as DV
        INNER JOIN menu as M ON M.id_menu = DV.id_servicio WHERE DV.id_venta = $id");
    
    $detalles_venta_productos = modeloPrincipal::consultar("SELECT P.nombre_producto, DV.cantidad, 
        DV.precio_unidad_dolares, DV.precio_unidad_bolivares FROM detalles_venta as DV
        INNER JOIN producto as P ON P.id_producto = DV.id_producto WHERE DV.id_venta = $id");
    
    $detalles_pago = modeloPrincipal::consultar("SELECT M.metodo_pago, M.referencia, M.cantidad_abonada_dolares, 
        M.cantidad_abonada_bolivares FROM detalles_pago as M  WHERE M.id_venta = $id");  ?>



<fielset>
    <legend>Servicios </legend>
    <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
                <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO EN $</th>
                <th class="col text-center" scope="col">PRECIO EN BS</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($detalles_venta_servicios)){ ?>

                <tr>
                    <td class="text-center col"><?= $row['nombre_platillo'] ?></td> 
                    <td class="text-center col"><?= $row['cantidad_servicio'] ?></td> 
                    <td class="text-center col"><?= $row['precio_servicio_dolares'].' $' ?></td> 
                    <td class="text-center col"><?= $row['precio_servicio_bolivares'].' bs' ?></td>
                </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </div>
</fielset>

<fielset>
    <legend>Productos</legend>
    <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
                <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO EN $</th>
                <th class="col text-center" scope="col">PRECIO EN BS</th>
                </tr>
            </thead>
            <tbody>
                <?php  while($row = mysqli_fetch_array($detalles_venta_productos)){ ?>

                <tr>
                    <td class="text-center col"><?= $row['nombre_producto'] ?></td> 
                    <td class="text-center col"><?= $row['cantidad'] ?></td> 
                    <td class="text-center col"><?= $row['precio_unidad_dolares'].' $' ?></td> 
                    <td class="text-center col"><?= $row['precio_unidad_bolivares'].' bs' ?></td>
                </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </div>
</fielset>

<fielset>
    <legend>Métodos de Pago</legend>
    <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
                <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">REFERENCIA</th>
                <th class="col text-center" scope="col">CANTIDAD EN $</th>
                <th class="col text-center" scope="col">CANTIDAD EN BS</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($detalles_pago)){ ?>

                <tr>
                    <td class="text-center col"><?= $row['metodo_pago'] ?></td> 
                    <td class="text-center col"><?= ($row['referencia'] == '') ? '' :'#'.$row['referencia'] ?></td> 
                    <td class="text-center col"><?= $row['cantidad_abonada_dolares'].' $' ?></td> 
                    <td class="text-center col"><?= $row['cantidad_abonada_bolivares'].' bs' ?></td>
                </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </div>
</fielset>


<?php }

if($modulo == "detalles_venta_del_dia"){
    $detalles_venta_servicios = modeloPrincipal::consultar("SELECT M.nombre_platillo, DV.cantidad_servicio, 
    DV.precio_servicio_dolares, DV.precio_servicio_bolivares FROM detalles_venta as DV
    INNER JOIN menu as M ON M.id_menu = DV.id_servicio WHERE DV.id_venta = $id");
    
    $detalles_venta_productos = modeloPrincipal::consultar("SELECT P.nombre_producto, DV.cantidad, 
    DV.precio_unidad_dolares, DV.precio_unidad_bolivares FROM detalles_venta as DV
    INNER JOIN producto as P ON P.id_producto = DV.id_producto WHERE DV.id_venta = $id");

    $detalles_pago = modeloPrincipal::consultar("SELECT M.metodo_pago, M.referencia, M.cantidad_abonada_dolares, 
    M.cantidad_abonada_bolivares FROM detalles_pago as M  WHERE M.id_venta = $id"); ?>
    
    <fielset>
        <legend>Servicios </legend>
        <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
            <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO EN $</th>
                <th class="col text-center" scope="col">PRECIO EN BS</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($detalles_venta_servicios)){ ?>

                <tr>
                <td class="text-center col"><?= $row['nombre_platillo'] ?></td> 
                <td class="text-center col"><?= $row['cantidad_servicio'] ?></td> 
                <td class="text-center col"><?= $row['precio_servicio_dolares'].' $' ?></td> 
                <td class="text-center col"><?= $row['precio_servicio_bolivares'].' bs' ?></td>
                </tr>
                    
            <?php } ?>
            </tbody>
        </table>
        </div>
    </fielset>
    <fielset>
        <legend>Productos</legend>
        <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
            <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO EN $</th>
                <th class="col text-center" scope="col">PRECIO EN BS</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($detalles_venta_productos)){ ?>

                <tr>
                <td class="text-center col"><?= $row['nombre_producto'] ?></td> 
                <td class="text-center col"><?= $row['cantidad'] ?></td> 
                <td class="text-center col"><?= $row['precio_unidad_dolares'].' $' ?></td> 
                <td class="text-center col"><?= $row['precio_unidad_bolivares'].' bs' ?></td>
                </tr>
                    
            <?php } ?>
            </tbody>
        </table>
        </div>
    </fielset>
        
    <fielset>
        <legend>Métodos de Pago</legend>
        <div class="table table-responsive">
        <table class="table table-striped " id="example">
            <thead>
            <tr>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">REFERENCIA</th>
                <th class="col text-center" scope="col">CANTIDAD EN $</th>
                <th class="col text-center" scope="col">CANTIDAD EN BS</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($detalles_pago)){ ?>

                <tr>
                <td class="text-center col"><?= $row['metodo_pago'] ?></td> 
                <td class="text-center col"><?= ($row['referencia'] == '') ? '' :'#'.$row['referencia'] ?></td> 
                <td class="text-center col"><?= $row['cantidad_abonada_dolares'].' $' ?></td> 
                <td class="text-center col"><?= $row['cantidad_abonada_bolivares'].' bs' ?></td>
                </tr>
                    
            <?php } ?>
            </tbody>
        </table>
        </div>
    </fielset> 
<?php } ?>