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


<p class="mb-3 text-primary-emphasis"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario actualizó la configuración del sistema.</p> 
<h4 class="text-center card-title"><b> Información del usuario que realizo la modificación </b></h4>
<?php
$original = 16;
$actual = 18;

$color_original = $original > $actual ? 'success' : 'danger';
$color_actual = $original < $actual ? 'success' : 'danger';

$modulo_productos_originales = '<h4 class="text-center card-title"><b> Configuración original del módulo de Gestión de productos </b></h4>
    <div class="d-flex justify-content-between border-bottom">
        <p> Porcentaje de IVA</p> 
        <span>De <b class="text-'.$color_original.'">'.$original.'%</b> a <b class="text-'.$color_actual.'">'.$actual.'%</b></span>
    </div>
    <div class="d-flex justify-content-between border-bottom">
        <p> Porcentaje de Ganancia</p> 
        <span>De <b class="text-'.$color_original.'">'.$original.'%</b> a <b class="text-'.$color_actual.'">'.$actual.'%</b></span>
    </div>
    <hr>
    ';
    echo "$modulo_productos_originales";
    echo "<br><br><br><br>";
?>
<p> Nombre: <b> '.$precio_dolar_original.' $ </b> </p>
<p> Apellido: <b> '.$descripcion_original.'. </b> </p> 
<p> Teléfono: <b> '.$estatus_original.' </b> </p>
<p> Rol asignado: <b> '.$estatus_original.' </b> </p>

<p class="card-title">Productos del Servicio Original:</p>
'.$bitacora_original.'
<h4 class="text-center card-title"> <b> Información del Servicio Actualizado:  </b> </h4>
<p> Nombre del platillo: <b> '.$nombre_platillo.' </b> </p> 
<p> Precio en dolares: <b> '.$precio_dolar.' $ </b> </p>
<p> Descripción: <b> '.$descripcion.'. </b> </p> 
<p> Estado: <b> '.$estado_menu.' </b> </p>
<p class="card-title">Productos del servicio actualizado:</p>