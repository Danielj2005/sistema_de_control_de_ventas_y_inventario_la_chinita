<?php
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

/********** Obtener y limpiar los datos via POST **********/
$usuario = modeloPrincipal::LimpiarCadenaTexto($_POST["correo"]);
$contraseña = modeloPrincipal::LimpiarCadenaTexto($_POST["contraseña"]);

/********** Se verifica que no se hayan recibido campos vacios **********/

if(empty($usuario) || empty($contraseña)){
    echo'<script type="text/javascript">
            swal({ 
                title:"¡Porfavor llenar todos los campos!", 
                text:"Hay campos sin llenar, recordar que todos los campos son obligatorios", 
                type: "error", 
                confirmButtonColor: "#036cbd",
                confirmButtonText: "Aceptar"  
            });
            $(".form_SRCB")[0].reset();
        </script>';
    exit();
}

/********** Realizamos una consulta a la BD para ver si ese usuario existe **********/

$selectUser = modeloPrincipal::consultar("SELECT U.nombre, U.apellido, T.nombre AS tipo_usuario FROM usuario AS U INNER JOIN tipo_usuario AS T ON U.id_tipo = T.id_tipo WHERE U.correo = '$usuario' AND U.contraseña = '$contraseña'");

// $resul = mysqli_query($conn,$selectUser);

$n = mysqli_num_rows($selectUser);

if($n == 0){
    echo'<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"El usuario o la contraseña son incorrecto, por favor verifica e intenta nuevamente", 
            type: "error", 
            confirmButtonColor: "#036cbd",
            confirmButtonText: "Aceptar"  
        });
        $(".form_SRCB")[0].reset();
    </script>';
    exit();
}else{

    // obtenemos los resultado de las consulta y la guardamos en un array
    $reg = mysqli_fetch_array($selectUser);

    // $usua = $reg["nombre"]; // $apell = $reg["apellido"]; // $tipo = $reg["id_tipo"];

    //** guardamos los datos de las consulta en variables de sesión **// 
    $_SESSION["nombre"] = $reg["nombre"];
    $_SESSION["apellido"] = $reg["apellido"];
    // $_SESSION["tipo"] = $reg["id_tipo"];
    $_SESSION["tipo_usuario"] = $reg["tipo_usuario"];
    
    $_SESSION["fecha"] = date('d-m-Y');
    /* variable de sesion para comprobar si un usuario inicio sesion */
    $_SESSION['logged_in'] = true;
    
    /* mensaje que se muestra cuando un usuario inicia sesion */
    echo '<script type="text/javascript">
        swal({ 
            title:"¡ACCESO EXITOSO!",
            text:"Bienvenido al sistema usuario",
            type: "info",
            confirmButtonColor: "#3faaebd4",
            confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {     
                    window.location="./vista/inicio.php";
                } else {    
                    window.location="./vista/inicio.php";
                } 
        });
    </script>';
    exit();
}
mysqli_free_result($resul);