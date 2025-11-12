<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista


$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
// echo "id usuario: $id_usuario <br>";

?>


<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-icons.css" rel="stylesheet">
<link href="./css/dataTables.bootstrap5.min.css" rel="stylesheet">

<style>
    body{padding: 5rem;}
</style>

<div class="d-flex justify-content-between border-bottom mb-2">
    <p> Código</p>
    <span>'.$code[$i].'</span>
</div>
<div class="d-flex justify-content-between border-bottom mb-2">
    <p> Nombre</p>
    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['nombre'][$i]).'</span>
</div>
<div class="d-flex justify-content-between border-bottom mb-2">
    <p> Marca</p>
    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['marca'][$i]).'</span>
</div>
<div class="d-flex justify-content-between border-bottom mb-2">
    <p> Formato</p>
    <span>'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['presentacion'][$i]).'</span>
</div>
<div class="d-flex justify-content-between border-bottom mb-2">
    <p> Categoría</p>
    <span class="text-primary fw-bold mb-1">'.modeloPrincipal::primeraLetraMayus($datos_productos_registrados['categoria'][$i]).'</span>
</div>