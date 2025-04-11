<?php
/*------- configuración y conexión a base de datos -------*/
//iniciamos la sesion 
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

modeloPrincipal::bitacora("Cierre de sesión","El usuario cerró sesión.");
$id_usuario = $_SESSION["id_usuario"];

modeloPrincipal::UpdateSQL("usuario","sesion_activa = 0","id_usuario = $id_usuario");

// agregar logica de cerre de sesion seguro
// Verifica si la sesión está iniciada

if (isset($_SESSION['logged_in'][$id_usuario])) {

    unset($_SESSION['logged_in'][$id_usuario]); // Elimina el ID del usuario

    // Verifica si hay sesiones activas

    if (empty($_SESSION['logged_in'])) {

        // No hay sesiones activas, destruye todas las sesiones

        
        session_unset(); // remueve o elimina las variables de sesion
        session_destroy(); // Destruye la sesión actual
    }
}

header("location: ../index.php");

?>
