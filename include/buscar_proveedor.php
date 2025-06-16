<?php
session_start();

include_once "../modelo/modeloPrincipal.php";

if (isset($_POST["buscar"])) {

    //datos via Post
    $cedula = modeloPrincipal::limpiar_cadena($_POST['cedula']); 
    $datos['existe'] = "0";

    //Consulta
    $proveedor = modeloPrincipal::consultar ("SELECT * FROM proveedor WHERE cedula_rif ='$cedula'");
    
    if (mysqli_num_rows($proveedor) < 1) {
        $datos['error'] = "El proveedor no existe.";
        echo json_encode($datos);
        exit();
    }
    $proveedor = mysqli_fetch_array($proveedor);

    $datos['existe'] = "1";
    $datos['nombre'] = $proveedor['nombre'];
    $datos['telefono'] = $proveedor['telefono'];
    $datos['correo'] = $proveedor['correo'];
    $datos['direccion'] = $proveedor['direccion'];
        
    $datos = json_encode($datos); 
    echo $datos;
}
