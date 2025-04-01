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
            title: "¡Ocurrio un error!",
            text: "Exiten Campos obligatorios Que Estan Vacíos",
            type: "error", 
            confirmButtonColor: "#036cbd",
            confirmButtonText: "Aceptar"  
        });
    </script>';
    exit();
}

/** verificación del captcha enviado por el usuario */
$numero_1 = $_SESSION['numero_1'];
$numero_2 = $_SESSION['numero_2'];
$respuesta_captcha = $_POST['respuesta_captcha'];

$resultado = $numero_1 + $numero_2;
// se verifica que se este recibiendo el captcha
if ($respuesta_captcha == "") { 
    echo "<script type='text/javascript'>
    swal({ 
        title: '¡Ocurrio un Error!', 
        text: 'El campo de captcha se encuentra vació, verifique y intente nuevamente', 
        type: 'error', 
        confirmButtonColor: '#10478e',
        confirmButtonText: 'Aceptar'  
    });
    </script>";
    exit();
    
} 
// se verifica que el captcha recibido sea igual al mostrado al usuario
if ($respuesta_captcha !== "$resultado") {
    echo "<script type='text/javascript'>
        swal({ 
            title: '¡El capcha es invalido!', 
            text: 'Verifique y intente nuevamente', 
            type: 'error', 
            confirmButtonColor: '#10478e',
            confirmButtonText: 'Aceptar'  
        });
    </script>";
    exit();
}

/********** Realizamos una consulta a la BD para ver si ese usuario existe **********/
$selectUser = modeloPrincipal::consultar("SELECT U.id_usuario, U.nombre, U.apellido, U.estado,
    U.id_rol, U.primer_inicio, U.bloqueado, U.suspender, U.sesion_activa, R.nombre AS rol_usuario FROM usuario AS U
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
}

// obtenemos los resultado de las consulta y la guardamos en un array
$datos_usuario = mysqli_fetch_array($selectUser);

$id_usuario = $datos_usuario["id_usuario"];


/** se verifica si el usuario esta activo **/
if($datos_usuario['estado'] == 0){
    echo "<script type='text/javascript'>
            swal({
                title: '¡Atención: Usuario Inactivo',
                text: 'Pongase en contacto con un administrador para la activación de su usuario.', 
                type: 'warning', 
                confirmButtonColor: '#10478e',
                confirmButtonText: 'Aceptar'  
            },
            function (isConfirm) {
                if (isConfirm) {
                    location.reload();
                }else {                       
                    location.reload();
                } 
            });
            $('.SendFormAjax')[0].reset();
    </script>";
    exit();
}

/** se verifica si el usuario esta bloqueado **/
if($datos_usuario['bloqueado'] == 1){
    echo "<script type='text/javascript'>
            swal({
                title: '¡Atención: Usuario bloqueado',
                text: 'Pongase en contacto con un administrador para reseteo de la cuenta', 
                type: 'warning', 
                confirmButtonColor: '#10478e',
                confirmButtonText: 'Aceptar'  
            },
            function (isConfirm) {
                if (isConfirm) {
                    location.reload();
                }else {                       
                    location.reload();
                } 
            });
            $('.SendFormAjax')[0].reset();
    </script>";
    exit();
}

/** se verifica si el usuario esta bloqueado **/
if($datos_usuario['sesion_activa'] == 1){
    echo "<script type='text/javascript'>
            swal({
                title: '¡Sesión activa detectada!',
                text:'Se ha detectado una sesión activa asociada a su cuenta. Para garantizar la seguridad de su información, la sesión actual se cerrará automáticamente en breve.',
                type: 'warning', 
                confirmButtonColor: '#10478e',
                confirmButtonText: 'Aceptar'  
            },
            function (isConfirm) {
                if (isConfirm) {
                    location.reload();
                }else {                       
                    location.reload();
                } 
            });
            $('.SendFormAjax')[0].reset();
    </script>";
    modeloPrincipal::UpdateSQL("usuario","sesion_activa = '0'","id_usuario = $id_usuario");
    $_SESSION['logged_in'] = false;
    exit();
}

/*------- info personal de el usuario en variables de sesion -------*/
//** guardamos los datos de las consulta en variables de sesión **// 
$_SESSION["nombre"] = $datos_usuario["nombre"];
$_SESSION["apellido"] = $datos_usuario["apellido"];

/*------- datos de el usuario en variables de sesion -------*/
$_SESSION["id_usuario"] = $datos_usuario["id_usuario"];
$_SESSION["id_rol"] = $datos_usuario["id_rol"];

/* variable de sesion para comprobar si un usuario inicio sesion */
$_SESSION['logged_in'] = true;

$fecha_ultima_sesion = date('Y-m-d H:i:s');

modeloPrincipal::bitacora("Inicio de sesión","El usuario accedió al sistema.");
modeloPrincipal::UpdateSQL("usuario","ultima_sesion = '$fecha_ultima_sesion', sesion_activa = 1","id_usuario = $id_usuario");

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
                window.location = "./vista/'.($datos_usuario["primer_inicio"] =='1' ? "mi_perfil.php" : "inicio.php").'";
            } else { 
                window.location = "./vista/'.($datos_usuario["primer_inicio"] =='1' ? "mi_perfil.php" : "inicio.php").'";
            } 
        });
    </script>';
mysqli_free_result($selectUser);
exit();