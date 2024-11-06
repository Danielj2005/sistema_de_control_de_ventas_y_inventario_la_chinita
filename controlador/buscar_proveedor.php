<?php
    session_start();
    include_once ("../config/ConfigServer.php");
    include_once("../modelo/modeloPrincipal.php");
    if (isset($_POST["buscar"])) {

        //datos via Post
        $cedula = modeloPrincipal::LimpiarCadenaTexto($_POST['cedula']);
        $datos = array();
        $datos['existe'] = "0";

        //Consulta
	    $selectProveedor =  modeloPrincipal::consultar ("SELECT * FROM proveedor WHERE cedula_rif ='$cedula'");


        while($proveedor = mysqli_fetch_array($selectProveedor)) {
            $datos['existe'] = "1";
            $datos['nombre'] = $proveedor['nombre'];
            $datos['telefono'] = $proveedor['telefono'];
            $datos['correo'] = $proveedor['correo'];
            $datos['direccion'] = $proveedor['direccion'];
        }
        $datos = json_encode($datos); 
        echo $datos;

    }
