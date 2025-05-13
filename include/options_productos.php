<?php

require_once "../modelo/modeloPrincipal.php";
require_once "../modelo/productos_model.php";

$consulta = producto_model::consultar_condicional("id_producto, nombre_producto","estatus = 1");
// se guardan los datos en un array y se imprime

while ( $mostrar = mysqli_fetch_array($consulta)) { 
    echo '<option value="'.$mostrar["id_producto"].'">'.$mostrar["nombre_producto"].'</option>';
}