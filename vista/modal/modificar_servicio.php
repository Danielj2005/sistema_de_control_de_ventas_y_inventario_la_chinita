<?php
session_start();

include_once("../../config/ConfigServer.php"); 
include_once("../../modelo/modeloPrincipal.php"); 

$id_menu = $_POST['id'];
$precio_dolar_actual = $_SESSION['dolar'];
$servicios = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM menu WHERE id_menu = $id_menu"));

?>
<div class="card-body p-3" id="SendForm">
    <input type="hidden" name="dolar" id="precioDolar" value="<?= $precio_dolar_actual; ?>">
    <input type="hidden" name="modulo" value="Modificar">    
    <input type="hidden" value="<?= $id_menu ?>" name="id_menu">
    <input type="hidden" value="<?= $servicios['estatus'] ?>" name="estado_menu">
    <input type="hidden" value="<?= $servicios['nombre_platillo'] ?>" name="nombre_platillo">

    <div class="col-12 col-sm-12 col-md-12 mb-3">
        <h5 class="card-title"> Datos del Servicio </h5>
        <div class="row mt-2">
        <div class="col-md-6">
            <label class="form-label">Nombre del Servicio</label>
            <div class="col-md-4 input-group">
            <input type="text" class="form-control bg-dark-subtle" readonly value="<?= $servicios['nombre_platillo'] ?>" placeholder="ingresa el nombre del servicio" name="nombre_platillo" id="nombre_platillo" required>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Descripción</label>
            <input type="text" class="form-control bg-dark-subtle" readonly value="<?= $servicios['descripcion'] ?>" placeholder="ingresa la descripción" id="descripcion" name="descripcion" required>
        </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="table-responsive">
        <h5 class="card-title">Lista de productos</h5>
        <table class="table table-striped" id="example">
            <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">PRODUCTO</th>
                <th class="col text-center" scope="col">PRESENTACIÓN</th>
                <th class="col text-center" scope="col">CANTIDAD</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN $</th>
                <th class="col text-center" scope="col">PRECIO POR UNIDAD EN BS</th>
            </tr>
            </thead>
            <tbody id="">
                <?php
                    $consulta = modeloPrincipal::consultar("SELECT P.nombre_producto, PRE.nombre AS nombre_presentacion, 
                        DM.cantidad, P.precio_compra_dolar, P.precio_compra_bs
                        FROM menu AS M
                        INNER JOIN detalles_menu AS DM ON DM.id_menu = M.id_menu
                        INNER JOIN producto AS P ON DM.id_producto = P.id_producto
                        INNER JOIN presentacion AS PRE ON P.id_presentacion = PRE.id
                        WHERE M.id_menu = $id_menu");
                    $i= 1;
                    while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
                        <tr>
                            <td class="col text-center" id=""><?=  $i++ ?></td>

                            <td class="col text-center" id="">
                                <input type="text" class="form-control bg-dark-subtle" readonly name="" value="<?= $mostrar['nombre_producto'] ?>" required>
                            </td>

                            <td class="col text-center" id="">
                                <input type="text" class="form-control bg-dark-subtle" readonly name="" placeholder="cantidad a ingresar" required value="<?= $mostrar['nombre_presentacion'] ?>" >
                            </td>
                            
                            <td class="col text-center">
                                <input type="text" id="" class="form-control precio_dolar_total bg-dark-subtle" name="precio_dolar[]" value="<?= $mostrar['cantidad'];?>" readonly placeholder="precio en $" required>
                            </td>

                            <td class="col text-center">
                                <input type="text" id="" class="form-control precio_bolivar_total bg-dark-subtle" name="precio_bolivar[]" value="<?= $mostrar['precio_compra_dolar']?>" readonly placeholder="precio en bs" required>
                            </td>
                            
                            <td class="col text-center">
                                <input type="text" id="" class="form-control precio_bolivar_total bg-dark-subtle" name="precio_bolivar[]" value="<?= $mostrar['precio_compra_bs']?>" readonly placeholder="precio en bs" required>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-12 mb-3 mt-5"> 
        <h7 class="card-title">Precio del Servicio</h7>

        <div class="row mt-2">
        <div class="col-12 col-sm-6 col-md-6 mb-3 text-start">
            <label class="form-label">En Dolares ($)</label>
            <input class="form-control" name="precio_dolar" placeholder="ingresa el precio en $" value="<?= $servicios['precio_dolar']; ?>" >
        </div>
        <div class="col-12 col-sm-6 col-md-6 mb-3 text-center">
            <label class="form-label">En Bolivares (BSS)</label>
            <input class="form-control bg-dark-subtle" readonly value="<?= ( $servicios['precio_dolar'] * $precio_dolar_actual); ?>" id="precio_bolivar_servcio" name="precio_bolivar" placeholder="ingresa el precio en bs">
        </div>
        </div>
    </div>
</div>