<?php
session_start();
/*------- configuración y conexión a base de datos -------*/
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

/********** Obtener y limpiar los datos via POST **********/
$usuario = modeloPrincipal::limpiar_cadena($_POST["correo"]);
$contraseña = modeloPrincipal::limpiar_encriptar($_POST["contraseña"]);

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
$selectUser = modeloPrincipal::consultar("SELECT U.id_usuario, U.nombre, U.apellido, U.estado,
    U.id_rol, U.primer_inicio, R.nombre AS rol_usuario FROM usuario AS U
    INNER JOIN rol AS R ON U.id_rol = R.id_rol 
    WHERE U.correo = '$usuario' AND U.contraseña = '$contraseña'");

/*------- si el usuario y contraseña no estan registrados -------*/
if(mysqli_num_rows($selectUser) == 0){

    /* variable de sesion para compobar si un usuario inició sesión */
    $_SESSION['logged_in'] = false;

    /*------- se muestra el siguiente mensaje en una sweet-alert -------*/
    echo'<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"El usuario o la contraseña son incorrecto, por favor verifica e intenta nuevamente", 
            type: "error", 
            confirmButtonColor: "#036cbd",
            confirmButtonText: "Aceptar"  
        });
        $(".SendFormAjax")[0].reset();
    </script>';
    exit();
}else{

    // obtenemos los resultado de las consulta y la guardamos en un array
    $datos_usuario = mysqli_fetch_array($selectUser);
    if($datos_usuario["estado"] == 1){

        /*------- info personal de el usuario en variables de sesion -------*/
        //** guardamos los datos de las consulta en variables de sesión **// 
        $_SESSION["nombre"] = $datos_usuario["nombre"];
        $_SESSION["apellido"] = $datos_usuario["apellido"];
        
        /*------- datos de el usuario en variables de sesion -------*/
        $_SESSION["id_usuario"] = $datos_usuario["id_usuario"];
        $_SESSION["rol"] = $datos_usuario["id_rol"];

        /* variable de sesion para comprobar si un usuario inicio sesion */
        $_SESSION['logged_in'] = true;
    
        /* mensaje que se muestra cuando un usuario inicia sesion */
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡ACCESO EXITOSO!",
                    text:"Bienvenido al sistema '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'",
                    type: "info",
                    confirmButtonColor: "#0f8cdf ",
                    confirmButtonText: "Aceptar"
                },
                function (isConfirm) {
                    if (isConfirm) {
                        '.($datos_usuario["primer_inicio"] =='1' ? "window.location = './vista/mi_perfil.php';" : "window.location = './vista/inicio.php';").'
                        
                    } else { 
                        '.($datos_usuario["primer_inicio"] =='1' ? "window.location = './vista/mi_perfil.php';" : "window.location = './vista/inicio.php';").'
                        
                    } 
                });
            </script>';
        mysqli_free_result($selectUser);
        exit();
    }else{
        echo'<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"El usuario se encuentra inactivo, contacta con el administrador y verifica e intenta nuevamente", 
                    type: "error", 
                    confirmButtonColor: "#0f8cdf",
                    confirmButtonText: "Aceptar"  
                });
                $(".SendFormAjax")[0].reset();
            </script>';
        exit(); 
    }
}