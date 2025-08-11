<?php 
session_start();

require_once "../../../modelo/modeloPrincipal.php";
require_once "../../../modelo/presentacion_model.php";
require_once "../../../modelo/rol_model.php";

?>
<div class="table table-responsive">
    <table class="table table-striped tablePresentationOfProducts mb-3" id="tablePresentationOfProducts">
        <thead>
            <tr>
                <th class="col text-center" scope="col">#</th>
                <th class="col text-center" scope="col">Nombre</th>
                <th class="col text-center" scope="col">Descripción</th>
                <?php if (rol_model::verificar_rol('m_presentacion') == '1') { ?>
                    <th class="col text-center" scope="col">Estado</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php presentacion_model::lista(); ?>  
        </tbody>
    </table>
</div>