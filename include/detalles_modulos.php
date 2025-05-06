<?php
session_start();

require_once ('../config/ConfigServer.php');
require_once ('../modelo/modeloPrincipal.php');

date_default_timezone_set('America/caracas');

$modulo = $_POST['modulo'];
$id = $_POST['id'];

if($modulo == "detalles_venta"){
    

    $detalles_venta_servicios = modeloPrincipal::consultar("SELECT M.nombre_platillo, DV.cantidad_servicio, 
        DV.precio_servicio_dolares, DV.precio_servicio_bolivares, M.descripcion FROM detalles_venta as DV
        INNER JOIN menu as M ON M.id_menu = DV.id_servicio WHERE DV.id_venta = $id");
    
    $detalles_venta_productos = modeloPrincipal::consultar("SELECT P.nombre_producto, DV.cantidad, 
        DV.precio_unidad_dolares, DV.precio_unidad_bolivares, PS.nombre AS nombre_presentacion, C.nombre AS nombre_categoria
        FROM detalles_venta as DV
        INNER JOIN producto as P ON P.id_producto = DV.id_producto 
        INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
        INNER JOIN categoria as C ON C.id_categoria = P.id_categoria 
        WHERE DV.id_venta = $id");
    
    $detalles_pago = modeloPrincipal::consultar("SELECT M.metodo_pago, M.referencia, M.cantidad_abonada_dolares, 
        M.cantidad_abonada_bolivares FROM detalles_pago as M  WHERE M.id_venta = $id");
    
    $datos_cliente = mysqli_fetch_array(modeloPrincipal::consultar("SELECT V.id_venta,
        V.id_usuario, V.id_cliente
        FROM venta AS V 
        WHERE V.id_venta = $id ORDER BY V.id_venta DESC"));  ?>

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles de Venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <fielset class="mb-5">
            <legend>Servicios </legend>
            <div class="table table-responsive">
                <table class="table table-striped " id="example">
                    <thead>
                        <tr>
                        <th class="col text-center" scope="col">NOMBRE</th>
                        <th class="col text-center" scope="col">DESCRIPCIÓN</th>
                        <th class="col text-center" scope="col">CANTIDAD</th>
                        <th class="col text-center" scope="col">PRECIO EN $</th>
                        <th class="col text-center" scope="col">PRECIO EN BS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($detalles_venta_servicios)){ ?>

                        <tr>
                            <td class="text-center col"><?= $row['nombre_platillo'] ?></td> 
                            <td class="text-center col"><?= $row['descripcion'] ?></td> 
                            <td class="text-center col"><?= $row['cantidad_servicio'] ?></td> 
                            <td class="text-center col"><?= $row['precio_servicio_dolares'].' $' ?></td> 
                            <td class="text-center col"><?= $row['precio_servicio_bolivares'].' bs' ?></td>
                        </tr>
                            
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </fielset>

        <fielset class="mb-5">
            <legend>Productos</legend>
            <div class="table table-responsive">
                <table class="table table-striped " id="example">
                    <thead>
                        <tr>
                        <th class="col text-center" scope="col">NOMBRE</th>
                        <th class="col text-center" scope="col">PRESENTACIÓN</th>
                        <th class="col text-center" scope="col">CATEGORÍA</th>
                        <th class="col text-center" scope="col">CANTIDAD</th>
                        <th class="col text-center" scope="col">PRECIO EN $</th>
                        <th class="col text-center" scope="col">PRECIO EN BS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while($row = mysqli_fetch_array($detalles_venta_productos)){ ?>

                        <tr>
                            <td class="text-center col"><?= $row['nombre_producto'] ?></td> 
                            <td class="text-center col"><?= $row['nombre_presentacion'] ?></td> 
                            <td class="text-center col"><?= $row['nombre_categoria'] ?></td> 
                            <td class="text-center col"><?= $row['cantidad'] ?></td> 
                            <td class="text-center col"><?= $row['precio_unidad_dolares'].' $' ?></td> 
                            <td class="text-center col"><?= $row['precio_unidad_bolivares'].' bs' ?></td>
                        </tr>
                            
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </fielset>

        <fielset class="mb-5">
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
    </div>
    <div class="modal-footer ">
        <div class="">
            <form  target="_blank" action="./<?= rol_model::verificar_rol('f_venta') == 1 ? 'reportes/factura_cliente.php' : 'venta.php' ?>" method="post" class="text-center">
                <input type="hidden" name="id_venta" value="<?= $datos_cliente["id_venta"]; ?>">
                <input type="hidden" name="id_usuario" value="<?= $datos_cliente["id_usuario"]; ?>">
                <input type="hidden" name="id_cliente" value="<?= $datos_cliente["id_cliente"]; ?>">
                <button type="submit" class="btn btn-info bi bi-eye" <?= rol_model::verificar_rol('f_venta') == 1 ? '' : 'disabled' ?>>&nbsp; Ver Factura</button>
            </form>

        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>

<?php }

if($modulo == "detalles_venta_del_dia"){
    $detalles_venta_servicios = modeloPrincipal::consultar("SELECT M.nombre_platillo, DV.cantidad_servicio, 
        DV.precio_servicio_dolares, DV.precio_servicio_bolivares FROM detalles_venta as DV
        INNER JOIN menu as M ON M.id_menu = DV.id_servicio WHERE DV.id_venta = $id");
    
    $detalles_venta_productos = modeloPrincipal::consultar("SELECT P.nombre_producto, DV.cantidad, 
        DV.precio_unidad_dolares, DV.precio_unidad_bolivares, PS.nombre, C.nombre AS nombre_categoria
        FROM detalles_venta as DV
        INNER JOIN producto as P ON P.id_producto = DV.id_producto 
        INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
        INNER JOIN categoria as C ON C.id_categoria = P.id_categoria 
        WHERE DV.id_venta = $id");

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
                <th class="col text-center" scope="col">PRESENTACIÓN</th>
                <th class="col text-center" scope="col">CATEGORÍA</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO EN $</th>
                <th class="col text-center" scope="col">PRECIO EN BS</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($detalles_venta_productos)){ ?>

                <tr>
                <td class="text-center col"><?= $row['nombre_producto'] ?></td> 
                <td class="text-center col"><?= $row['nombre'] ?></td> 
                <td class="text-center col"><?= $row['nombre_categoria'] ?></td> 
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

if ($modulo == "historial_proveedor"){ 
    $consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, P.precio_compra_dolar,
        P.precio_compra_bs, PROV.id_proveedor, PROV.nombre, E.stock_comprado, E.fecha_entrada, 
        ROUND(P.precio_compra_bs / P.precio_compra_dolar,2 ) AS tasa, PS.nombre AS nombre_presentacion, C.nombre AS nombre_categoria
        FROM entrada AS E 
        INNER JOIN producto AS P ON P.id_producto = E.id_producto 
        INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor
        INNER JOIN presentacion as PS ON PS.id = P.id_presentacion 
        INNER JOIN categoria as C ON C.id_categoria = P.id_categoria 
        WHERE PROV.id_proveedor = $id ORDER BY E.fecha_entrada DESC");

    $nombre_proveedor = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id_proveedor, nombre FROM proveedor WHERE id_proveedor = $id"));
    ?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial de Proveedor: <?php echo mb_strtoupper($nombre_proveedor["nombre"]); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="card-body p-3 table-responsive">
            <table class="table table-striped " id="example">
                <thead>
                    <tr>
                        <th class="col text-center" scope="col">#</th>
                        <th class="col text-center" scope="col">PRODUCTO</th>
                        <th class="col text-center" scope="col">PRESENTACIÓN</th>
                        <th class="col text-center" scope="col">CATEGORÍA</th>
                        <th class="col text-center" scope="col">CANTIDAD COMPRADA</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN $</th>
                        <th class="col text-center" scope="col">PRECIO DE COMPRA EN BS</th>
                        <th class="col text-center" scope="col">TASA REGISTRADA</th>
                        <th class="col text-center" scope="col">FECHA / HORA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        $i = 1;

                        while ( $mostrar = mysqli_fetch_array($consulta)) { ;?>    
                            <tr>
                                <td class="col text-center"><?= $i++; ?></td>
                                <td class="col text-center"><?= $mostrar["nombre_producto"]; ?></td>
                                <td class="text-center col"><?= $mostrar['nombre_presentacion'] ?></td> 
                                <td class="text-center col"><?= $mostrar['nombre_categoria'] ?></td> 
                                <td class="col text-center"><?= $mostrar["stock_comprado"]; ?></td>
                                <td class="col text-center"><?= $mostrar["precio_compra_dolar"].'$'; ?></td>
                                <td class="col text-center"><?= $mostrar["precio_compra_bs"].'bs'; ?></td>
                                <td class="col text-center"><?= $mostrar["tasa"].'bs'; ?></td>
                                <td class="col text-center"><?= date('d-m-Y / h:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <form target="_blank" action="./reportes/historial_proveedor.php" method="post">
            <input type="hidden" value="<?= $nombre_proveedor['id_proveedor'] ?>" name="id_proveedor">
            <button type="submit" class="btn btn-primary">Exportar Historial en PDF</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
<?php } 
