<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista


$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
echo "id usuario: $id_usuario \n";

$PERMISOS_PRODUCTOS2 = rol_model::obtenerSumaPermisoRol(['r_categoria','m_categoria','l_categoria','r_presentacion','m_presentacion','l_presentacion','r_marca','m_marca','l_marca','r_productos','l_productos']);
$PERMISOS_PRODUCTOS = rol_model::obtenerPermisosRol();

$categoria = array_key_exists("l_categoia", $PERMISOS_PRODUCTOS);

if ($categoria) {
    echo "categoria list: ".$categoria;
}
