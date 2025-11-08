<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista


$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
echo "id usuario: $id_usuario <br>";

$permisos = ["Permitido", "Denegado", "Permitido"];
?>


<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-icons.css" rel="stylesheet">
<link href="./css/dataTables.bootstrap5.min.css" rel="stylesheet">

<style>
    body{padding: 5rem;}
</style>
<?php 

$permisos = ["Permitido", "Denegado", "Permitido"];

$permisos_originales_bd = rol_model::obtenerPermisosRolById(24);

$permisos_originales_bitacora = rol_model::texto_permisos_vista($permisos_originales_bd);

$permisos_actuales = rol_model::texto_permisos_vista($permisos_originales_bd);

$proveedores =  rol_model::generar_bitacora_modificar_rol($permisos_originales_bitacora, $permisos_actuales);

$moduloProductosInicio = '<div class="row m-5 p-4">';
$moduloProductosFin = '</div>';

echo $moduloProductosInicio. $proveedores. $moduloProductosFin ;

echo '<pre>';
print_r($permisos_originales_bd);
echo '</pre>';