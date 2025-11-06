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


<?php 

$proveedores = rol_model::generar_mensaje_de_permisos_por_modulo ( ["Registrar Nuevas","Modificar Información","Consultar Lista"],  $permisos); 

$moduloProductosInicio = '
    <div class="col-12 col-md-6 mb-2">
        <p class="card-title">Módulo de Productos</p>
        <ul class="list-group list-group-flush list-unstyled">
        ';


$moduloProductosInicio .= '
    <li class="fw-bold bg-light text-start">
        <i class="bi bi-folder-fill me-2 text-secondary"></i>
        Categorías:
    </li>

    <ul class="list-group list-group-flush">';


$moduloProductosFin = ' 
        </ul>
    </ul>
</div>';

echo $moduloProductosInicio ;
echo $proveedores ;
echo $moduloProductosFin ;