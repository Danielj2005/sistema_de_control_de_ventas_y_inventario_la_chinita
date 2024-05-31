<?php

//-------------- Mostrar información de un registro --------------
// se importan los archivos de configuracion de la base de datos y modelo principal 

// recibe la id con la cual se consultaran los datos
$id =  modeloPrincipal::limpiar_cadena($_POST['code']);

//array a devolver
$valores['existe'] = 0; 

// solicitante
if ($tabla === "solicitante") {

    $datos = modeloPrincipal::consultar("SELECT id, correo, telefono, descripcion, tipo_solicitante FROM proveedor WHERE id = '$id'");
    
    foreach($datos as $row) {
        $valores['existe'] = 1; 
        $valores['id'] = $row['id'];
        $valores['correo'] = $row['correo'];
        $valores['telefono'] = $row['telefono'];
        $valores['descripcion'] = $row['descripcion'];
        
        $valores = json_encode($valores);
        echo $valores;
    }
    mysqli_free_result($datos);
    exit();
}