<?php
session_start();

include_once("../modelo/modeloPrincipal.php");

if (isset($_POST["buscar"])) {
    //datos via Post
    $cedula = modeloPrincipal::LimpiarCadenaTexto($_POST['cedula']);
    $datos['existe'] = "0";

    //Consulta
    $cliente =  modeloPrincipal::consultar ("SELECT * FROM cliente WHERE cedula ='$cedula'");
    
    if (mysqli_num_rows($cliente) < 1) {
        $datos['error'] = "El cliente no existe.";
        echo json_encode($datos);
        exit();
    }
    $cliente = mysqli_fetch_array($cliente);

    $datos['existe'] = "1";
    $datos['id_cliente'] = $cliente['id_cliente'];
    $datos['nombre'] = $cliente['nombre'];
    $datos['telefono'] = $cliente['telefono'];
    
    $datos = json_encode($datos); 
    echo $datos;
}
