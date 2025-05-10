<?php
include_once("../../../modelo/modeloPrincipal.php"); 

$id = $_POST['id'];

$bitacora = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT mensaje FROM bitacora WHERE id = $id"));

$mensaje = $bitacora['mensaje'];

?>
<div class="col-12 col-sm-12 col-md-12">
    <h6 class="text-decoration-underline">Mensaje:</h6>
    <p><?= $mensaje; ?></p>
</div>