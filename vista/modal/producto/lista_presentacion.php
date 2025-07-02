<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/presentacion_model.php";
require_once "../../../modelo/rol_model.php";

?>
<div class="table table-responsive">
    <table class="table table-striped example mb-3" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">NOMBRE</th>
                <th class="col text-center" scope="col">DESCRIPCIÓN</th>
                <th class="col text-center" scope="col">ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php presentacion_model::lista(); ?>  
        </tbody>
    </table>
</div>