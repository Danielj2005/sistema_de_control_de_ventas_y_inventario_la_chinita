<?php
require_once ('../config/ConfigServer.php');
require_once ('../modelo/modeloPrincipal.php');

$modulo = strval($_POST['modulo']);
$tabla;

$id_producto = $_POST['id_producto'];
// hacer una consulta dinamica para los select
$consultas = ["presentacion" => "SELECT * FROM presentacion",
            ""];

$consultas = modeloPrincipal::consultar("SELECT * FROM presentacion");

// if($consultas){
    
// }
    while($row = mysqli_fetch_array($consultas)){ ?>

        <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>

    <?php } 

?>