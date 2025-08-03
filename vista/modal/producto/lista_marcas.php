<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/rol_model.php";
require_once "../../../modelo/marca_model.php";

?>
<div class="table table-responsive">
    <table class="table table-striped datatable mb-3 example" id="example">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Nombre</th>
                <th class="col text-center" scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php marca_model::lista(); ?>  
        </tbody>
    </table>
</div>