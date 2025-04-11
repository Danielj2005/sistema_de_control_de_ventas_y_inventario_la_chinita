<?php
session_start();
/*------- configuración y conexión a base de datos -------*/
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// intentos de sesión
$_SESSION["numero_sesion"] = 0;

/********** Obtener y limpiar los datos via POST **********/
$usuario = modeloPrincipal::limpiar_cadena($_POST["correo"]);
$contraseña = modeloPrincipal::limpiar_encriptar($_POST["contraseña"]);

/********** Se verifica que no se hayan recibido campos vacios **********/
if(empty($usuario) || empty($contraseña)){
    echo'<script type="text/javascript">
        swal({ 
            title: "¡Ocurrio un error!",
            text: "Exiten campos obligatorios que estan vacíos",
            type: "error", 
            confirmButtonColor: "#036cbd",
            confirmButtonText: "Aceptar"  
        });
    </script>';
    exit();
}

/** verificación del captcha enviado por el usuario */
$captcha = intval($_SESSION['captcha']); // captcha recibido desde la vista de inicio de sesión
$respuesta_captcha = intval($_POST['respuesta_captcha']);
// se verifica que se esté recibiendo la respuesta del captcha
if ($_POST['respuesta_captcha'] == "" || !isset($_POST['respuesta_captcha'])) { 
    echo "<script type='text/javascript'>
    swal({ 
        title: '¡Ocurrio un Error!', 
        text: 'El campo de captcha se encuentra vacio, verifique e intente nuevamente', 
        type: 'error', 
        confirmButtonColor: '#10478e',
        confirmButtonText: 'Aceptar'  
    });
    </script>";
    exit();
    
} 
// se verifica que el captcha recibido sea igual al mostrado al usuario
if ($respuesta_captcha !== $captcha) {
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
    U.contraseña, U.id_rol, U.primer_inicio, U.bloqueado, U.suspender, U.sesion_activa, R.nombre AS rol_usuario 
    FROM usuario AS U
    INNER JOIN rol AS R ON U.id_rol = R.id_rol 
    WHERE U.correo = '$usuario' AND U.contraseña = '$contraseña'");

/*------- si el usuario y contraseña no estan registrados -------*/
if(mysqli_num_rows($selectUser) == 0){

    /* variable de sesion para compobar si un usuario inició sesión */
    $_SESSION['logged_in'] = false;
    $_SESSION["numero_sesion"]++;
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
// manejar la logica de comparacion de los parametros de seguridad-----
// if ($_SESSION["numero_sesion"] == $permisos_g['limite_de_intentos_inicio_sesion']) {

// se verifica si el numero de intentos de inicio de sesión es igual, a 3 
// if ($_SESSION["numero_sesion"] == $permisos_g['limite_de_intentos_inicio_sesion']) {

if ($_SESSION["numero_sesion"] == 3) {

    // se bloquea el usuario para iniciar sesion en caso de alcanzar el limite de intentos
    modeloPrincipal::UpdateSQL("usuario","suspender = 1","id_usuario = $id");
    $_SESSION["numero_sesion"]='0';
    echo "<script type='text/javascript'>
        swal({
            title: '¡Cuenta suspendida!',
            text: 'Su cuenta ha sido suspendida temporalmente por razones de seguridad. Para activar nuevamente, por favor recupere su contraseña.',
            type: 'warning',
            confirmButtonColor: '#10478e',
            confirmButtonText: 'Aceptar'
        });
        $('.SendFormAjax')[0].reset();
    </script>";
    exit();
}

// obtenemos el resultado de la consulta y la guardamos en un array
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
/** se verifica si el usuario esta bloqueado: 
 * la cuenta es bloqueada luego de tres intentos fallidos de inicio de sesión */
if($datos_usuario['bloqueado'] == 1){
    echo "<script type='text/javascript'>
            swal({
                title: '¡Atención!',
                text: 'Su cuenta ha sido bloqueada. Por favor, póngase en contacto con un administrador para restablecer el acceso.',
                type: 'warning', 
                buttons: {
                    confirm: {
                        text: 'Aceptar',
                        value: true,
                        visible: true,
                        className: 'btn-primary',
                        closeModal: true // Cierra el modal al hacer clic
                    }
                },
                dangerMode: true, // Resalta el botón de aceptar
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
/** se verifica si el usuario esta suspendido: 
 * la cuenta es suspendida luego de tres intentos fallidos de inicio de sesión */
if($datos_usuario['suspender'] == 1){
    echo "<script type='text/javascript'>
            swal({
                title: '¡Atención!',
                text: 'Su cuenta ha sido suspendida debido a tres intentos fallidos de inicio de sesión. Por favor, ve a recuperación de usuario para restablecer el acceso.',
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
/** se verifica si el usuario tiene una sesion activa **/
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


// Verifica si la variable de sesión con el acceso del usuario al sistema ya está iniciada
if (!isset($_SESSION['logged_in'])) {

    $_SESSION['logged_in'] = []; // Inicializa el array si no existe
}

/*------- info personal de el usuario en variables de sesion -------*/
//** guardamos los datos de las consulta en variables de sesión **// 
$_SESSION['logged_in'][$id_usuario] = true; // variable de inicio de sesion

$_SESSION['nombre'] = $datos_usuario["nombre"]; // variable con el nombre del usuario
$_SESSION['apellido'] = $datos_usuario["apellido"]; // variable con el apellido del usuario

$_SESSION['id_usuario'] = $datos_usuario["id_usuario"]; // variable con el id_usuario del usuario
$_SESSION['id_rol'] = $datos_usuario["id_rol"]; // variable con el id de el rol del usuario


$fecha_ultima_sesion = date('Y-m-d H:i:s');

modeloPrincipal::bitacora("El usuario inició sesión","El usuario accedió al sistema.");
modeloPrincipal::UpdateSQL("usuario","ultima_sesion = '$fecha_ultima_sesion', sesion_activa = 1","id_usuario = $id_usuario");

/* mensaje que se muestra cuando un usuario inicia sesion */
echo '<script type="text/javascript">
        swal({ 
            title:"Acceso Exitoso!",
            text:"Bienvenido '.$_SESSION['nombre'].' '.$_SESSION['apellido'].', espere un momento, por favor.",
            type: "info",
        },
        function (isConfirm) {
                if (isConfirm) {
                    window.location = "./vista/'.($datos_usuario["primer_inicio"] =='1' ? "mi_perfil.php" : "inicio.php").'";
                }else {
                    window.location = "./vista/'.($datos_usuario["primer_inicio"] =='1' ? "mi_perfil.php" : "inicio.php").'";
                } 
        });
    </script>';
mysqli_free_result($selectUser);
exit();