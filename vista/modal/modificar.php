<?php
// se importan los archivos de configuracion de la base de datos y modelo principal 
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// // recibe el nombre de la tabla en donde se consultarran los datos
// // $tabla = modeloPrincipal::limpiar_cadena($_POST['tabla']);

// // recibe la id con la cual se consultarran los datos
// $id = modeloPrincipal::limpiar_cadena($_POST['code']);

// //array a devolver
// $valores['existe'] = 0; 

// /* consultar a la base de datos parta verificar que los datos existen */
// // con mysql_num_rows() Obtenemos el número de filas

// /* se comprueba si hay datos en la consultar realizada */
// if(mysqli_num_rows(modeloPrincipal::consultar("SELECT id_proveedor FROM proveedor WHERE id_proveedor = '$id'")) > 0){
    
//     // Actualizar registros de la tabla solicitante
//     $datos = modeloPrincipal::consultar("SELECT * FROM proveedor WHERE id_proveedor = '$id'");
    
//     while($row = mysqli_fetch_assoc($datos)) {
//         $valores['existe'] = 1; 
//         $valores['id'] = $row['id_proveedor'];
//         $valores['cedula'] = $row['cedula_rif'];
//         $valores['nombre'] = $row['nombre'];
//         $valores['correo'] = $row['correo'];
//         $valores['telefono'] = $row['telefono'];
//         $valores['direccion'] = $row['direccion'];
//     }
//     $valores = json_encode($valores);
//     echo $valores;
//     mysqli_free_result($datos);
//     exit();

//     // if ($tabla == 'solicitante') {
        
//     // }
// }else{
//     echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
// }
?>