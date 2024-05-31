<?php
/*------- configuración y conexión a base de datos -------*/
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

$dolar_dolar = modeloPrincipal::consultar("SELECT dolar from dolar");

$valores['existe'] = 0;

if(mysqli_num_rows($dolar_dolar) > 0){
    
    $mostrarDolar = mysqli_fetch_array($dolar_dolar);
    
    $valores['existe'] = 1;
    $valores['tasa_dolar'] = $mostrarDolar['dolar'];

    $valores = json_encode($valores);
    echo $valores;
    mysqli_free_result($dolar_dolar);
    exit();
    
}else{

    $valores = json_encode($valores);
    echo $valores;
    mysqli_free_result($dolar_dolar);
    exit();
}