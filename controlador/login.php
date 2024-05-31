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
U.id_tipo, T.nombre AS tipo_usuario FROM usuario AS U
INNER JOIN tipo_usuario AS T ON U.id_tipo = T.id_tipo 
WHERE U.correo = '$usuario' AND U.contraseña = '$contraseña'");

if(mysqli_num_rows($selectUser) < 1){
    /*------- si el usuario y contraseña no estan registrados -------*/

    /* variable de sesion para compobar si un usuario inicio sesion */
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
        $(".form_SRCB")[0].reset();
    </script>';
    exit();
}else{

    // obtenemos los resultado de las consulta y la guardamos en un array
    $datos = mysqli_fetch_array($selectUser);

    
    // /* mensaje que se muestra cuando un usuario inicia sesion */
    // echo '<script type="text/javascript">
    //     swal({ 
    //         title:"¡ACCESO EXITOSO!",
    //         text:"Bienvenido al sistema.",
    //         type: "info",
    //         confirmButtonColor: "#3faaebd4",
    //         confirmButtonText: "Aceptar"
    //         },
    //         function(isConfirm){  
    //             if (isConfirm) {     
    //                 window.location="./vista/inicio.php";
    //             } else {    
    //                 window.location="./vista/inicio.php";
    //             } 
    //     });
    // </script>';

    // exit();

    if($datos["estado"] == 1){

        // obtenemos los resultado de la consulta y la guardamos en un array
        /*------- info personal de el usuario en variables de sesion -------*/
        //** guardamos los datos de las consulta en variables de sesión **// 
        $_SESSION["nombre"] = $datos["nombre"];
        $_SESSION["apellido"] = $datos["apellido"];
        
        $_SESSION["fecha"] = date('d-m-Y');
        
        /*------- datos de el usuario en variables de sesion -------*/
        $_SESSION["user_id"] = $datos["id_usuario"];
        $_SESSION["nombre_tipo_usuario"] = $datos["tipo_usuario"];
        $_SESSION["tipo_usuario"] = $datos["id_tipo"];
    

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
                        window.location="./vista/inicio.php";
                    } else { 
                        window.location="./vista/inicio.php";
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