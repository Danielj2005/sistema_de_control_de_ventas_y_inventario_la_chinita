<?php
/*------- configuración y conexión a base de datos -------*/
//iniciamos la sesion 
session_start();

include_once("../modelo/modeloPrincipal.php");
include_once("../modelo/modelo_usuario.php");
include_once("../modelo/bitacora_model.php");

$id_usuario = $_SESSION["id_usuario"];

//registramos los movimientos en la bitacora
bitacora::bitacora("Cierre de sesión exitoso","El usuario ha cerrado sesión correctamente en el sistema.");

model_user::modificar_sesion_usuario($id_usuario, '0'); // se modifica el estado de la sesion activa/inactiva del usuario

session_unset(); // remueve o elimina las variables de sesion
session_destroy(); // Destruye la sesión actual
header("location: ../");
?>
