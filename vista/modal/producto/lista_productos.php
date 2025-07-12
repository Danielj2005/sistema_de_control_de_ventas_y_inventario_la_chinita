<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/productos_model.php";

?>

<div class="bg-seondary" style="width: fit-content;">
    <label class="">El significado del color del texto es un rango de cantidad de un producto en inventario: </label>
    <ul id="" class="ps-3 nav-content list-unstyled">
        <li> <label> <span class=""> Negro: Cantidad de productos mayor a 10. </span> </label> </li>
        <li> <label> <span class="text-warning"> Amarillo: Cantidad de productos menor a 10. </span> </label> </li>
        <li> <label> <span class="text-danger"> Rojo: Cantidad de productos menor a 5. </span> </label> </li>
    </ul>
</div>
<div class="table table-responsive">
    <table class="table table-striped example mb-3" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Nombre</th>
                <th class="col text-center" scope="col">Marca</th>
                <th class="col text-center" scope="col">Presentación</th>
                <th class="col text-center" scope="col">Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php producto_model::lista(); ?>  
        </tbody>
    </table>
</div>