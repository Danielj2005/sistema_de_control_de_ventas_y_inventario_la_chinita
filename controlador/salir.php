<?php 


// include_once ("../config/ConfigServer.php");

// session_start();

// $_SESSION["Usuario"];


// session_destroy();


//iniciamos la sesion 
session_start();
// remueve o elimina las variables de sesion
session_unset();
//destruimos la sesion 
session_destroy();

// header("location: ../index.php");
 ?>
