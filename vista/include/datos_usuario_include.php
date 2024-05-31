<?php
/*------- configuración y conexión a base de datos -------*/
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

/********** Obtenemos y limpiamos los datos recibidos de la variable de sesion **********/
$user_id = modeloPrincipal::limpiar_cadena($_SESSION['user_id']);

/********** Realizamos una consulta a la BD para consultar los datos del usuario **********/
$userData = modeloPrincipal::consultar("SELECT U.cedula, U.nombre, U.apellido, U.correo,
U.contraseña, T.nombre AS tipo_usuario, S.pregunta FROM usuario AS U INNER JOIN tipo_usuario AS T ON U.id_usuario = T.id_tipo
INNER JOIN seguridad AS S ON U.id_seguridad = S.id_seguridad WHERE U.id_usuario = '$user_id'");

if (mysqli_num_rows($userData) > 0) {

    while ($row = mysqli_fetch_assoc($userData)) {
        // datos personales del usuario
        $cedula_user = $row['cedula'];
        $nombre_user = $row['nombre'];
        $apellido_user = $row['apellido'];
        
        // datos del usuario
        $correo_user =  $row['correo'];
        $tipo_user = $row['tipo_usuario'];
        // $nombre_usuario = $row['nombre_usuario'];
        $userPass = $row['contraseña'];
        $pregunta_seguridad = $row['pregunta'];
    }
}else{ // mensaje de error "no se encontro el usuario"
    echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "no se encontraron datos del usuario",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
    exit();
}