<?php 
require_once "../modelo/modeloPrincipal.php"; // se incluye el modelo principal
require_once "../modelo/productos_model2.php"; // se incluye el modelo producto
require_once "../modelo/alert_model.php"; // se incluye el modelo producto
require_once "../modelo/bitacora_model.php"; // se incluye el modelo de bitacora
require_once "../modelo/categoria_model.php"; // se incluye el modelo categoria
require_once "../modelo/presentacion_model.php"; // se incluye el modelo presentacion
require_once "../modelo/marca_model.php"; // se incluye el modelo de marcass


$presentacion = $_POST['presentacion'];
$categoria = $_POST['categoria'];

$marcas = ['Pepsi', 'Pepsi', 'Coca-Cola'];

$id_marcas = marca_model::obtener_array_id_marcas($marcas);

for ($i = 0; $i < count($id_marcas); $i++ ) {
    echo $id_marcas[$i];
}