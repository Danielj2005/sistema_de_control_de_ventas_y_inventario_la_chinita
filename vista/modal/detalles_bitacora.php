<?php
include_once("../../config/ConfigServer.php"); 
include_once("../../modelo/modeloPrincipal.php"); 

$id = $_POST['id'];

$bitacora = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT mensaje FROM bitacora WHERE id = $id"));

$mensaje = $bitacora['mensaje'];

?>
<div class="container-fluid row mb-3 p-3 justify-content-around">
    <!-- vistas de proveedores -->
    <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3 row justify-content-center">
        <div class="col-12 col-md-12 mb-3 row justify-content-around">
            <h4>Mensaje:</h4>
            <textarea readonly name="" id="" rows="10"><?= $mensaje; ?></textarea>
        </div>
    </div>
</div>