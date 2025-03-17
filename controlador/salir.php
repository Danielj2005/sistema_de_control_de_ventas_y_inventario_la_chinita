<?php
/*------- configuración y conexión a base de datos -------*/
//iniciamos la sesion 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

modeloPrincipal::bitacora("Cierre de sesión","El usuario cerró sesión.");

// remueve o elimina las variables de sesion
session_unset();
//destruimos la sesion 
session_destroy();

header("location: ../index.php");
?>
