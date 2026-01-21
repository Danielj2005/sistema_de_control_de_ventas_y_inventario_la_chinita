<?php
session_start();
include_once "./modelo/modeloPrincipal.php"; // se incluye el modelo principal


$hash = '$2y$10$UiPYZurJDc541Ua0x8.tB.qwQwlJJsG5wZIdQkR8ycvBeRCyJpOsO';

$contraseña = 'Katty20@!';
$contraseña2 = modeloPrincipal::limpiar_cadena($contraseña);

echo $contraseña.'</br>';
echo $contraseña2.'</br>';

if (password_verify($contraseña, $hash)) {
    echo '¡La contraseña es válida!';
}else{
    echo 'La contraseña no es válida.';
}