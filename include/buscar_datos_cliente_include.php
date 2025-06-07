<?php
session_start();
include_once("../modelo/modeloPrincipal.php");
if (isset($_POST["buscar"])) {

    //datos via Post
    $cedula = modeloPrincipal::LimpiarCadenaTexto($_POST['cedula']);
    $datos = array();
    $datos['existe'] = "0";

    //Consulta
    $selectProveedor =  modeloPrincipal::consultar ("SELECT * FROM cliente WHERE cedula ='$cedula'");


    while($proveedor = mysqli_fetch_array($selectProveedor)) {
        $datos['existe'] = "1";
        $datos['id_cliente'] = $proveedor['id_cliente'];
        $datos['nombre'] = $proveedor['nombre'];
        $datos['telefono'] = $proveedor['telefono'];
    }
    $datos = json_encode($datos); 
    echo $datos;

}
