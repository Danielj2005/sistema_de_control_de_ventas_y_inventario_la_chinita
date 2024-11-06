<?php
/*------- configuración y conexión a base de datos -------*/
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

/********** Obtenemos y limpiamos los datos recibidos de la variable de sesion **********/
$id_usuario = $_SESSION['id_usuario'];

/********** Realizamos una consulta a la BD para consultar los datos del usuario **********/
$datos_usuario = modeloPrincipal::consultar("SELECT U.id_usuario, U.cedula, U.nombre, U.apellido, U.correo,
    U.contraseña, U.primer_inicio, R.nombre AS nombre_rol FROM usuario AS U INNER JOIN rol AS R ON R.id_rol = U.id_rol
    WHERE U.id_usuario = '$id_usuario'");

$preguntas_usuario = mysqli_fetch_array(modeloPrincipal::consultar("SELECT id_pregunta FROM preguntas_secretas 
    WHERE id_usuario = '$id_usuario'"));

if (mysqli_num_rows($datos_usuario) > 0) {

    $preguntas_usuario = $preguntas_usuario['pregunta'];
    while ($row = mysqli_fetch_assoc($datos_usuario)) {
        // datos personales del usuario
        $id_usuario = $row['id_usuario'];
        $cedula_user = $row['cedula'];
        $nombre_user = $row['nombre'];
        $apellido_user = $row['apellido'];
        
        // datos del usuario
        $correo_user =  $row['correo'];
        $rol_usuario = $row['nombre_rol'];
        $userPass = $row['contraseña'];
        $primer_inicio = $row['primer_inicio'];
    }
}