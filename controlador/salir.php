<?php
/*------- configuración y conexión a base de datos -------*/
//iniciamos la sesion 
session_start();

include_once "../modelo/modeloPrincipal.php";
include_once "../modelo/bitacora_model.php";

$id_usuario = $_SESSION['id_usuario'];
try {
    //registramos los movimientos en la bitacora
    $bitacore = bitacora::bitacora("Cierre de sesión exitoso",'<p class="h2 mb-3 text-primary-emphasis text-center"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>');
    //code...
} catch (\Throwable $th) {
    //throw $th;
    echo "$th";
}

// se modifica el estado de la sesion activa/inactiva del usuario
modeloPrincipal::UpdateSQL("usuario", "sesion_activa = '0'", "id_usuario = '$id_usuario'");

session_unset(); // remueve o elimina las variables de sesion
session_destroy(); // Destruye la sesión actual

header("location: ../");
