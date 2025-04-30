<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);
if (!isset($_POST["modulo"])) {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud","error");
    exit();
}
$id_usuario = $_SESSION['id_usuario'];

// modulo para Guardar un registro de un usuario

if($modulo === "Guardar"){

    /*------------------ información personal de el usuario ------------------*/
    $cedula = modeloprincipal::limpiar_cadena($_POST["nacionalidad"].$_POST["cedula"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre"]);
    $apellido = modeloprincipal::limpiar_mayusculas($_POST["apellido"]);
    $telefono = modeloprincipal::limpiar_cadena($_POST["telefono"]);
    $direccion = modeloprincipal::limpiar_mayusculas($_POST["direccion"]);
    
    /*------------------ datos de el usuario ------------------*/
    $correo =  modeloprincipal::limpiar_cadena($_POST["correo"]);
    $contraseña = modeloprincipal::limpiar_encriptar($_POST["cedula"]);
    
    $id_rol =  modeloprincipal::limpiar_cadena($_POST["id_tipo"]);
    

    // se comprueba que no exista un registro con los mismos datos
    model_user::validar_usuario_existe("correo","usuario","correo = '$correo'");
    
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$cedula, $nombre, $apellido, $correo, $contraseña, $telefono, $direccion, $id_rol]);

    if (modeloprincipal::verificar_datos("[A-Za-z0-9-]{7,10}",$cedula)) {
        alert_model::alert_of_format_wrong("'cédula'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)) {
        alert_model::alert_of_format_wrong("'nombre'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)) {
        alert_model::alert_of_format_wrong("'apellido'");
        exit();
    } 

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}",$correo)) {
        alert_model::alert_of_format_wrong("'correo'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[0-9]{11}",$telefono)) {
        alert_model::alert_of_format_wrong("'teléfono'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9-, ]{10,50}",$direccion)) {
        alert_model::alert_of_format_wrong("'dirección'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\.\*\_\-]{8,16}", modeloprincipal::decryption($contraseña))) {
        alert_model::alert_of_format_wrong("'contraseña'");
        exit();
    }
    
    // datos verificados que se van a Registrar
    model_user::insert_user($cedula, $nombre, $apellido, $correo, $contraseña, $telefono, $direccion, $id_rol);

}

// modulo para Modificar informacion personal de un usuario

if($modulo === "modificar_info_personal_usuario"){
    
    /*------------------ información personal de el usuario ------------------*/
    $cedula = modeloprincipal::limpiar_cadena($_POST["nacionalidad"].$_POST["cedula"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombres"]);
    $apellido = modeloprincipal::limpiar_mayusculas($_POST["apellido"]);
    $correo =  modeloprincipal::limpiar_cadena($_POST["email"]);
    $direccion = modeloprincipal::limpiar_mayusculas($_POST["direccion"]);
    $telefono = modeloprincipal::limpiar_cadena($_POST["telefono"]);

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$cedula, $nombre, $apellido, $correo, $telefono, $direccion]);

    
    if (modeloprincipal::verificar_datos("[A-Za-z0-9-]{7,10}",$cedula)) {
        alert_model::alert_of_format_wrong("CÉDULA");
        exit();
    }
    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}",$nombre)) {
        alert_model::alert_of_format_wrong("NOMBRE");
        exit();
    }
    if (modeloprincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}",$apellido)) {
        alert_model::alert_of_format_wrong("APELLIDO");
        exit();
    } 
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,100}",$correo)) {
        alert_model::alert_of_format_wrong("CORREO");
        exit();
    }
    if (modeloprincipal::verificar_datos("[0-9]{11}",$telefono)) {
        alert_model::alert_of_format_wrong("'teléfono'");
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9-, ]{10,250}",$direccion)) {
        alert_model::alert_of_format_wrong("'dirección'");
        exit();
    }

    $cedula_user = model_user::obtener_info_personal_usuario('cedula',$id_usuario);
    $nombre_user = model_user::obtener_info_personal_usuario('nombre',$id_usuario);
    $apellido_user = model_user::obtener_info_personal_usuario('apellido',$id_usuario);
    $correo_user = model_user::obtener_info_personal_usuario('correo',$id_usuario);
    $direccion_user = model_user::obtener_info_personal_usuario('direccion',$id_usuario);
    $telefono_user = model_user::obtener_info_personal_usuario('telefono',$id_usuario);

    // Se actualizara la información personal del usuario
    try {
        $actualizar = modeloPrincipal::UpdateSQL("usuario","cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$telefono', direccion = '$direccion'", "id_usuario = $id_usuario");
        
        
        if (!$actualizar) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al actualizar la información personal del usuario.", "error");
            exit();
        }

        $bitacora_modificacion_info_usuario = bitacora::bitacora("Modificación exitosa del perfil de usuario","El usuario actualizó su información personal <br><br>
        Información original:<br>
        Cédula: ".$cedula_user."<br>
        Nombre: ".$nombre_user."<br>
        Apellido: ".$apellido_user."<br>
        Correo: ".$correo_user."<br>
        Dirección: ".$direccion_user."<br>
        Teléfono: ".$telefono_user."<br><br>
        Información Actual:<br>
        Cédula: ".model_user::obtener_info_personal_usuario('cedula',$id_usuario)."<br>
        Nombre: ".model_user::obtener_info_personal_usuario('nombre',$id_usuario)."<br>
        Apellido: ".model_user::obtener_info_personal_usuario('apellido',$id_usuario)."<br>
        Correo: ".model_user::obtener_info_personal_usuario('correo',$id_usuario)."<br>
        Dirección: ".model_user::obtener_info_personal_usuario('direccion',$id_usuario)."<br>
        Teléfono: ".model_user::obtener_info_personal_usuario('telefono',$id_usuario)."
        ");

        if (!$bitacora_modificacion_info_usuario) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al guardar la modificación en bitácora.", "error");
            exit();
        }

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
    
}

// modulo para Modificar contraseña de un usuario

if($modulo === "modificar_contraseña_usuario"){
    
    $contraseña_actual = modeloprincipal::limpiar_encriptar($_POST["current_password"]);

    modeloprincipal::validar_campos_vacios([$_POST["current_password"], $_POST['password2'], $_POST['password']]); // se verifica si se recibieron campos vacios

    if (isset($_POST['password']) && isset($_POST['password2'])) {
        $contraseña_nueva = modeloprincipal::limpiar_encriptar($_POST["password"]);
        $contraseña_nueva2 = modeloprincipal::limpiar_encriptar($_POST['password2']);
    }

    $consulta_pass = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT contraseña FROM usuario WHERE id_usuario = '$id_usuario'"));
    
    if($contraseña_actual !== $consulta_pass['contraseña']){
        alert_model::alerta_simple("¡Ocurrio un error!", "La contraseña actual que ingresaste es incorrecta, verifique e intente nuevamente.","error");
        exit();
    }
    model_user::verificar_coincidencia_de_contraseña($contraseña_nueva,$contraseña_nueva2);
    
    if (modeloprincipal::verificar_datos("[A-Za-z0-9\-]{8,16}", modeloPrincipal::decryption($contraseña_nueva))) {
        alert_model::alert_of_format_wrong("'contraseña nueva'");
        exit();
    }

    //datos verificados modificar
    if (modeloprincipal::UpdateSQL("usuario","contraseña = '$contraseña_nueva'","id_usuario = $id_usuario")) {
        model_user::bitacora_modificacion_contraseña();
        alert_model::alert_mod_success();
        exit();
    } else {
        alert_model::alert_mod_error();
        exit();
    }
}

// modulo para modificar preguntas de seguridad de un usuario

if ($modulo === "modificar_preguntas_seguridad") {

    $id_usuario = $_SESSION['id_usuario']; // ID del usuario actual
    $id_usuario = modeloprincipal::limpiar_cadena($id_usuario); // Limpiar el ID del usuario

    // Obtener la cantidad de preguntas configuradas en el sistema
    $configuracion = modeloPrincipal::consultar("SELECT c_preguntas FROM configuracion");
    if (!$configuracion || mysqli_num_rows($configuracion) == 0) {
        alert_model::alerta_simple("¡Error!", "No se pudo obtener la configuración de preguntas de seguridad.", "error");
        exit();
    }

    $cantidad_preguntas = intval(mysqli_fetch_array($configuracion)['c_preguntas']);
    
    // Obtener las preguntas y respuestas enviadas por el usuario
    $preguntas = $_POST['pregunta'] ?? [];
    $respuestas = $_POST['respuesta'] ?? [];

    model_user::validar_preguntas_de_seguridad($preguntas,$respuestas);

    // Validar que las preguntas y respuestas sean la cantidad correcta
    if (count($preguntas) < $cantidad_preguntas || count($respuestas) < $cantidad_preguntas) {
        alert_model::alerta_simple("¡Error!", "Debe completar todas las preguntas de seguridad.", "error");
        exit();
    }

    try {
        // Validar que las preguntas y respuestas no estén vacías
        modeloPrincipal::validar_campos_vacios([$preguntas, $respuestas]);
        
        if (count($preguntas) !== count(array_unique($preguntas))) {
            alert_model::alerta_simple("¡Error!", "Las preguntas de seguridad deben ser únicas.", "error");
            exit();
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("¡Error!", "Debe completar todas las preguntas de seguridad.", "error");
        exit();
    }

    $id_seguridad = [];
    $id_preguntas = [];

    // se obtiene las id de las preguntas de seguridad
    try {
        
            for ($i = 0; $i < $cantidad_preguntas; $i++) {
                // Obtener la pregunta actual
                $pregunta_encriptada = modeloPrincipal::encryption($preguntas[$i]);
                        
                $pregunta_encriptada = trim($pregunta_encriptada);
                $pregunta_encriptada = stripslashes($pregunta_encriptada);
                $pregunta_encriptada = str_ireplace(" ", "", $pregunta_encriptada);
                $pregunta_encriptada = stripslashes($pregunta_encriptada);
                $pregunta_encriptada = trim($pregunta_encriptada);

                $id_seguridades = modeloPrincipal::consultar("SELECT id_seguridad FROM seguridad WHERE pregunta = '$pregunta_encriptada'");

                if (!$id_seguridades || mysqli_num_rows($id_seguridades) == 0) {
                    alert_model::alerta_simple("¡Error!", "ocurrio un error al consultar la ID de la pregunta de seguridad.", "error");
                    exit();
                }
                
                $id_seguridades = mysqli_fetch_array($id_seguridades);

                $id_seguridades = $id_seguridades['id_seguridad'];
                
                $id_seguridad[$i] = $id_seguridades;

            }
    } catch (Exception $e) {
        alert_model::alerta_simple("¡Error!", "No se pudo obtener la ID de las preguntas de seguridad.", "error");
        exit();
    }

    // se obtiene las id de las preguntas secretas del usuario
    try {
        $id_pregunta = modeloPrincipal::consultar("SELECT id FROM preguntas_secretas WHERE id_usuario = '$id_usuario'");
        

        if (!$id_pregunta || mysqli_num_rows($id_pregunta) == 0) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al consultar la ID de las preguntas secretas.", "error");
            exit();
        }
        $i=0;
        while ($row = mysqli_fetch_array($id_pregunta)) {
            $id_preguntas[$i] = $row['id'];
            $i++;
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("¡Error!", "No se pudo obtener la ID de las preguntas secretas.", "error");
        exit();
    }

    $primer_inicio = model_user::obtener_info_personal_usuario('primer_inicio',$id_usuario);
    
    try {

        $numero_pregunta = 1;
        for ($i = 0; $i < $cantidad_preguntas; $i++) {

            // Encriptar la nueva respuesta
            $respuesta_encriptada = modeloPrincipal::encryption($respuestas[$i]);
            
            $actualizar = modeloPrincipal::UpdateSQL("preguntas_secretas", "id_pregunta = ".$id_seguridad[$i].", respuesta = '$respuesta_encriptada', numero_pregunta = $numero_pregunta", "id_usuario = '$id_usuario' AND id = '".$id_preguntas[$i]."'");
            
            $numero_pregunta++;
            
            if (!$actualizar) {
                alert_model::alerta_simple("¡Error!", "ocurrio un error al actualizar la pregunta de seguridad.", "error");
                exit();
            } 
        }
        if ($primer_inicio == 1) {
            modeloPrincipal::UpdateSQL("usuario", "primer_inicio = 0", "id_usuario = '$id_usuario'");
        }
        // Registrar la modificación en la bitácora
        bitacora::bitacora("Modificación exitosa del perfil de usuario","El usuario actualizó su(s) pregunta(s) de seguridad");
        // Mostrar mensaje de éxito
        alert_model::alert_mod_success();
    } catch (Exception $e) {
        alert_model::alerta_simple("¡Error inesperado!", "Ocurrió un error al actualizar las preguntas de seguridad. Por favor, intente nuevamente.", "error");
        exit();
    }
}

/* ----------------- modulo para cambiar el estado de un usuario ------------------ */
$id_usuario = modeloprincipal::limpiar_cadena($_POST["id_usuario"]);

if ($modulo === "activo"){
    try {
        $cabiar_estado = model_user::modificar_estado_usuario($id_usuario, 0);
        
        if (!$cabiar_estado) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo realizar la desactivación del usuario, por favor intente nuevamente","error");
        }

        $registro_bitacora = model_user::bitacora_cambio_estado($estado);

        if (!$registro_bitacora) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al guardar la modificación de estado en bitácora.", "error");
            exit();
        } 

        $bitacora_cambio_estado = bitacora::bitacora("MOdificación exitoso del estado de usuario.","El usuario modificó el estado de un usuario de: $estado a: $nuevo_estado.");
            
        if (!$bitacora_cambio_estado) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al guardar la modificación en bitácora.", "error");
            exit();
        } 
        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        
        exit();
    }
}

if ($modulo === "inactivo"){
    
    try {
        model_user::modificar_estado_usuario($id_usuario, 1);
        exit();
    } catch (Exception $e) {
        alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo realizar la activación del usuario, por favor intente nuevamente","error");
        exit();
    }
}