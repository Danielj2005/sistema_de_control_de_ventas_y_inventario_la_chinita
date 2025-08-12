<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

$configuracion = mysqli_fetch_array(modeloPrincipal::consultar("SELECT intentos_inicio_sesion FROM configuracion"));
$intentos_inicio_sesion = intval($configuracion['intentos_inicio_sesion']);

// Se limpian y validan los datos recibidos a través de POST (usuario y contraseña).
$usuario = modeloPrincipal::limpiar_cadena($_POST['correo']);
$contraseña = modeloPrincipal::limpiar_encriptar($_POST['contraseña']);

// Se verifica que no se hayan recibido campos vacíos.
modeloPrincipal::validar_campos_vacios([$usuario, $contraseña]);

/** verificación del captcha enviado por el usuario */

$captcha = intval($_SESSION['captcha']); // captcha recibido desde la vista de inicio de sesión
$respuesta_captcha = intval($_POST['respuesta_captcha']); // captcha enviado por el usuario

// se verifica que se esté recibiendo la respuesta del captcha
if (empty($_POST['respuesta_captcha']) || !isset($_POST['respuesta_captcha'])) { 
    alert_model::alerta_simple('¡Ocurrio un Error!','El campo de captcha se encuentra vacio, verifique e intente nuevamente','error');
    exit();
} 

// se verifica que el captcha recibido sea igual al mostrado al usuario
if ($respuesta_captcha !== $captcha) {
    alert_model::alerta_simple('¡El captcha es invalido!','Verifique e intente nuevamente','error');
    exit();
}

// Se realiza una consulta a la base de datos para verificar si el usuario existe y si las credenciales son correctas.
$selectUser = model_user::consulta_usuario_existe("U.id_usuario, U.nombre, U.apellido, U.estado, U.contraseña, U.id_rol, U.primer_inicio, U.bloqueado, U.suspender, U.sesion_activa, R.nombre AS rol_usuario, R.estado AS estado_rol","U.correo = '$usuario'");

// obtenemos el resultado de la consulta y la guardamos en un array
$datos_usuario = mysqli_fetch_array($selectUser);

$id_usuario = $datos_usuario["id_usuario"];

// Si el usuario y contraseña no están registrados, se muestra un mensaje de error.
if(mysqli_num_rows($selectUser) == 0){
    $_SESSION['logged_in'] = false;
    $_SESSION["intentos_sesion"]++; // se incrementa el contador de intentos de inicio de sesión
    alert_model::alerta_simple('¡Ocurrió un error inesperado!','El usuario es incorrecto, por favor verifica e intenta nuevamente','error');
    exit();
}

// se verifica si el numero de intentos de inicio de sesión es igual, a 3
if ($_SESSION["intentos_sesion"] == $intentos_inicio_sesion) {
    // se bloquea el usuario para iniciar sesion en caso de alcanzar el limite de intentos
    modeloPrincipal::UpdateSQL("usuario","bloqueado = 1","id_usuario = $id_usuario");
    $_SESSION["intentos_sesion"] = 0;
    alert_model::alerta_simple('¡Cuenta bloqueada!','Su cuenta ha sido bloqueada por razones de seguridad. Para activar nuevamente, por favor contacte al administrador del sistema.','warning');
    exit();
}


$contraseña_usuario = $datos_usuario["contraseña"];

// se verifica si la contraseña es correcta
if ($contraseña !== $contraseña_usuario) {
    $_SESSION["intentos_sesion"]++; // se incrementa el contador de intentos de inicio de sesión
    alert_model::alerta_simple('¡Ocurrió un error inesperado!','La contraseña es incorrecta, por favor verifica e intenta nuevamente','error');
    exit();
}

/** se verifica si el usuario esta activo **/
if ($datos_usuario["estado"] == 0) {
    alert_model::alerta_simple_reset_de_formularios('¡Cuenta inactiva!','Su cuenta se encuentra inactiva, por favor contacte al administrador del sistema.','warning');
    exit();
}

/** se verifica si el usuario esta bloqueado: 
 * la cuenta es bloqueada luego de tres intentos fallidos de inicio de sesión */
if ($datos_usuario["bloqueado"] == 1) {
    alert_model::alerta_simple_reset_de_formularios('¡Cuenta bloqueada!','Su cuenta ha sido bloqueada debido a tres intentos fallidos de inicio de sesión, Por favor contacte al administrador del sistema para restablecer el acceso.','warning');
    exit();
}


/** se verifica si el usuario esta suspendido: 
 * la cuenta es suspendida cuando se modifica su permiso para el inicio de sesión */
if ($datos_usuario["suspender"] == 1) {
    alert_model::alerta_simple_reset_de_formularios('¡Cuenta suspendida!','Su cuenta ha sido suspendida y no tiene acceso a iniciar sesión en el sistema. Por favor contacte al administrador del sistema para restablecer el acceso.','warning');
    exit();
}

/** se verifica si el estado del rol del usuario esta inactivo: 
 * la cuenta es suspendida cuando se modifica su permiso para el inicio de sesión */
if ($datos_usuario["estado_rol"] == 0) {
    alert_model::alerta_simple_reset_de_formularios('¡Rol Desactivado!','El rol asociado con su cuenta se encuentra Inactivo en este momento, por lo que no tiene acceso a iniciar sesión en el sistema. Por favor contacte al administrador del sistema para restablecer el acceso del rol.','warning');
    exit();
}

/** se verifica si el usuario tiene una sesion activa **/
if ($datos_usuario["sesion_activa"] == 1) {
    modeloPrincipal::UpdateSQL("usuario","sesion_activa = '0'","id_usuario = $id_usuario");
    alert_model::alerta_condicional('¡Sesión activa!', 'Se ha detectado una sesión activa asociada a su cuenta. Para garantizar la seguridad de su información, la sesión actual se cerrará automáticamente en breve.','warning');
    session_unset(); // remueve o elimina las variables de sesion
    session_destroy(); // Destruye la sesión actual
    exit();
}

$_SESSION['logged_in'] = true; // variable de inicio de sesion

$_SESSION['nombre'] = $datos_usuario["nombre"]; // variable con el nombre del usuario
$_SESSION['apellido'] = $datos_usuario["apellido"]; // variable con el apellido del usuario

$_SESSION['id_usuario'] = modeloPrincipal::encryptionId($datos_usuario["id_usuario"]); // variable con el id_usuario del usuario
$_SESSION['id_rol'] = $datos_usuario["id_rol"]; // variable con el id de el rol del usuario

$fecha_ultima_sesion = date('Y-m-d H:i:s');

/** se verifica si es el primer inicio de sesión del usuario  **/
if ($datos_usuario["primer_inicio"] == 1) {
    bitacora::login(); // se registra el inicio de sesión en la bitácora
    model_user::modificar_sesion_ultima_sesion_fecha($id_usuario, $fecha_ultima_sesion, '1'); // se actualiza la fecha de la ultima sesion
    alert_model::alert_redirect('¡Bienvenido!.','Es su primer inicio de sesión, por favor cambie su contraseña y sus preguntas de seguridad.','info','./vista/mi_perfil.php');
    exit();
}

bitacora::login(); // se registra el inicio de sesión en la bitácora

// se actualiza el estado de la sesión del usuario a activa
model_user::modificar_sesion_ultima_sesion_fecha($id_usuario, $fecha_ultima_sesion, '1'); // se actualiza la fecha de la ultima sesion

alert_model::alert_redirect('Acceso Exitoso!','Bienvenido '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'.','info','./vista/inicio.php');
mysqli_free_result($selectUser);
exit();