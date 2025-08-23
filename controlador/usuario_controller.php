<?php 
session_start();

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// se obtiene la configuracion de la base de datos
$configuracion = ['caracteres' => config_model::obtener_dato('c_caracteres'),
    'simbolos' => config_model::obtener_dato('c_simbolos'),
    'numeros' => config_model::obtener_dato('c_numeros')];


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
    
    $id_rol =  modeloprincipal::decryptionId($_POST["id_tipo"]);
    $id_rol =  modeloprincipal::limpiar_cadena($id_rol);
    
    // se comprueba que no exista un registro con los mismos datos
    model_user::validar_usuario_existe("cedula, correo","correo = '$correo' AND cedula = '$cedula'");
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$cedula, $nombre, $apellido, $correo, $contraseña, $telefono, $direccion, $id_rol]);

    
    if (modeloPrincipal::verificar_datos("[V|E|J|P][0-9|-]{7,10}",$cedula)) {
        alert_model::alerta_simple("¡Ocurrio un error!","El campo cédula no cumple con el formato requerido o fue alterado. Por favor verifique e intente de nuevo ", "error");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)) {
        alert_model::alert_of_format_wrong("'nombre'");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)) {
        alert_model::alert_of_format_wrong("'apellido'");
        exit();
    } 

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        alert_model::alert_of_format_wrong("'correo'");
        exit();
    }

    if (modeloPrincipal::verificar_datos("[0-9]{11}",$telefono)) {
        alert_model::alert_of_format_wrong("'teléfono'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9|-|, ]{5,50}",$direccion)) {
        alert_model::alert_of_format_wrong("'dirección'");
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\.\*\_\-]{8,16}", modeloprincipal::decryption($contraseña))) {
        alert_model::alert_of_format_wrong("'contraseña'");
        exit();
    }
    
    // datos verificados que se van a Registrar
    try {
        $actualizar = model_user::insert_user($cedula, $nombre, $apellido, $correo, $contraseña, $telefono, $direccion, $id_rol);
        
        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error!","ocurrio un error al registrar al usuario en la base de datos.","error");
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "ocurrio un error al registrar al usuario en la base de datos.", "error");
        exit();
    }
    

    try {

        model_user::asignar_preguntas_seguridad_usuario();

    } catch (Exception $e) {
        alert_model::alerta_simple("Ocurrido un error!", "ocurrio un error al asignar preguntas de seguridad del usuario", "error");
        exit();
    }

    try {

        $id_usuario = model_user::obtener_id_usuario_recien_registrado();
        $rol_asignado = model_user::obtener_info_de_un_usuario('id_rol',$id_usuario);

        bitacora::bitacora("Registro exitoso de un nuevo usuario.","Se registró un nuevo usuario con la siguiente informacón: <br><br>
        <b>****** Información del usuario registrado:   ******</b><br><br>
        Cédula: <b>$cedula </b><br>
        Nombre: <b>$nombre </b><br>
        Apellido: <b>$apellido </b><br>
        Correo: <b>$correo </b><br>
        Teléfono: <b>$telefono </b><br>
        Dirección: <b>$direccion </b><br>
        Rol asignado: <b>$rol_asignado </b>
        ");

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }


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

    if (modeloprincipal::verificar_datos("[V|E|J|P][0-9|-]{7,10}",$cedula)) {
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
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al actualizar la información personal del usuario.", "error");
            exit();
        }

        $bitacora_modificacion_info_usuario = bitacora::bitacora("Modificación exitosa del perfil de usuario","El usuario actualizó su información personal <br><br>
        <b>****** Información original del usuario:   ******</b><br><br>
        Cédula: <b>".$cedula_user."</b><br>
        Nombre: <b>".$nombre_user."</b><br>
        Apellido: <b>".$apellido_user."</b><br>
        Correo: <b>".$correo_user."</b><br>
        Dirección: <b>".$direccion_user."</b><br>
        Teléfono: <b>".$telefono_user."</b><br><br>
        <b>****** Información Actual del usuario:   ******</b><br><br>
        Cédula: <b>".model_user::obtener_info_personal_usuario('cedula',$id_usuario)."</b><br>
        Nombre: <b>".model_user::obtener_info_personal_usuario('nombre',$id_usuario)."</b><br>
        Apellido: <b>".model_user::obtener_info_personal_usuario('apellido',$id_usuario)."</b><br>
        Correo: <b>".model_user::obtener_info_personal_usuario('correo',$id_usuario)."</b><br>
        Dirección: <b>".model_user::obtener_info_personal_usuario('direccion',$id_usuario)."</b><br>
        Teléfono: <b>".model_user::obtener_info_personal_usuario('telefono',$id_usuario)."</b>
        ");

        if (!$bitacora_modificacion_info_usuario) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al guardar la modificación en bitácora.", "error");
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
    
    $contraseña_actual = modeloprincipal::limpiar_cadena($_POST["current_password"]);

    modeloprincipal::validar_campos_vacios([$_POST["current_password"], $_POST['password2'], $_POST['password']]); // se verifica si se recibieron campos vacios

    if (isset($_POST['password']) && isset($_POST['password2'])) {
        $contraseña_nueva = modeloprincipal::limpiar_cadena($_POST["password"]);
        $contraseña_nueva2 = modeloprincipal::limpiar_cadena($_POST['password2']);
    }
    
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{'.$configuracion['caracteres'].',200}$/', $contraseña_nueva)) {
        alert_model::alerta_simple("Ocurrio un error!", "La contraseña no cumple con los requisitos de seguridad, Puede contener menos 1 número y 1 letra, Puede contener al menos ".$configuracion['simbolos']." de estos caracteres:!@#$% y Debe tener entre ".$configuracion['caracteres']." y 60 caracteres., verifique e intente nuevamente.","error");
        exit();
    }
    
    $consulta_pass = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT contraseña FROM usuario WHERE id_usuario = '$id_usuario'"));

    if($contraseña_actual !== modeloprincipal::decryption($consulta_pass['contraseña'])){
        alert_model::alerta_simple("¡Ocurrio un error!", "La contraseña actual que ingresaste es incorrecta, verifique e intente nuevamente.","error");
        exit();
    }
    
    // Contar símbolos (no alfanuméricos)
    $simbolosContraseña = preg_match_all("/\W/", $contraseña_nueva);
    if($simbolosContraseña < $configuracion['simbolos'] || $simbolosContraseña > $configuracion['simbolos'] ){
        alert_model::alerta_simple("¡Ocurrio un error!", "la cantidad de simbolos de la contraseña no cumple con lo establecido que es ".$configuracion['simbolos'].", verifique e intente nuevamente.","error");
        exit();
    }
    
    // Contar símbolos (no alfanuméricos)
    $simbolosContraseña2 = preg_match_all("/\W/", $contraseña_nueva2);
    if($simbolosContraseña2 < $configuracion['simbolos'] || $simbolosContraseña2 > $configuracion['simbolos'] ){
        alert_model::alerta_simple("¡Ocurrio un error!", "la cantidad de simbolos de el campo repetir contraseña no cumple con lo establecido que es ".$configuracion['simbolos'].", verifique e intente nuevamente.","error");
        exit();
    }
    
    // Contar números
    // echo $numeros = preg_match_all("/[0-9]/", $contraseña); // no creo que debas dejarle el echo
    $numeros = preg_match_all("/[0-9]/", $contraseña_nueva);

    if($numeros < $configuracion['numeros']){
        alert_model::alerta_simple("¡Ocurrio un error!", "la cantidad de números de la contraseña no cumple con lo establecido que es ".$configuracion['numeros'].", verifique e intente nuevamente.","error");
        exit();
    }
    $numerosContraseña2 = preg_match_all("/[0-9]/", $contraseña_nueva2);

    if($numerosContraseña2 < $configuracion['numeros']){
        alert_model::alerta_simple("¡Ocurrio un error!", "la cantidad de números de la contraseña no cumple con lo establecido que es ".$configuracion['numeros'].", verifique e intente nuevamente.","error");
        exit();
    }

    model_user::verificar_coincidencia_de_contraseña($contraseña_nueva,$contraseña_nueva2);
    
    if (modeloprincipal::verificar_datos("[!@#$%A-Za-z0-9\-]{".$configuracion['caracteres'].",60}", $contraseña_nueva)) {
        alert_model::alert_of_format_wrong("'contraseña nueva'");
        exit();
    }

    try {
        $contraseña_nueva = modeloPrincipal::encryption($contraseña_nueva);
        $actualizar = modeloprincipal::UpdateSQL("usuario","contraseña = '$contraseña_nueva'","id_usuario = $id_usuario");

        if (!$actualizar) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al guardar la nueva contraseña .", "error");
            exit();
        }

        $primer_inicio = model_user::verificar_primer_inicio();

        if ($primer_inicio == true) {
            modeloPrincipal::UpdateSQL("usuario", "primer_inicio = 0", "id_usuario = '$id_usuario'");
        }

        model_user::bitacora_modificacion_contraseña();

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}

// modulo para modificar preguntas de seguridad de un usuario

if ($modulo === "modificar_preguntas_seguridad") {

    $id_usuario = modeloPrincipal::decryptionId($_SESSION['id_usuario']); // ID del usuario actual
    $id_usuario = modeloprincipal::limpiar_cadena($id_usuario); // Limpiar el ID del usuario

    // Obtener la cantidad de preguntas configuradas en el sistema
    $configuracion = modeloPrincipal::consultar("SELECT c_preguntas FROM configuracion");
    if (!$configuracion || mysqli_num_rows($configuracion) == 0) {
        alert_model::alerta_simple("Ha ocurrido un error!", "No se pudo obtener la configuración de preguntas de seguridad.", "error");
        exit();
    }

    $cantidad_preguntas = intval(mysqli_fetch_array($configuracion)['c_preguntas']);
    
    // Obtener las preguntas y respuestas enviadas por el usuario
    $preguntas = $_POST['pregunta'] ?? [];
    $respuestas = $_POST['respuesta'] ?? [];

    model_user::validar_preguntas_de_seguridad($preguntas,$respuestas);

    // Validar que las preguntas y respuestas sean la cantidad correcta
    if (count($preguntas) < $cantidad_preguntas || count($respuestas) < $cantidad_preguntas) {
        alert_model::alerta_simple("Ha ocurrido un error!", "Debe completar todas las preguntas de seguridad.", "error");
        exit();
    }

    // Validar que las preguntas y respuestas no estén vacías
    try {
        modeloPrincipal::validar_campos_vacios([$preguntas, $respuestas]);
        
        if (count($preguntas) !== count(array_unique($preguntas))) {
            alert_model::alerta_simple("Ha ocurrido un error!", "Las preguntas de seguridad deben ser únicas.", "error");
            exit();
        }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "Debe completar todas las preguntas de seguridad.", "error");
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
                    alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar la ID de la pregunta de seguridad.", "error");
                    exit();
                }
                
                $id_seguridades = mysqli_fetch_array($id_seguridades);

                $id_seguridades = $id_seguridades['id_seguridad'];
                
                $id_seguridad[$i] = $id_seguridades;

            }
    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "No se pudo obtener la ID de las preguntas de seguridad.", "error");
        exit();
    }

    // se obtiene las id de las preguntas secretas del usuario
    try {
        $id_pregunta = modeloPrincipal::consultar("SELECT id FROM preguntas_secretas WHERE id_usuario = '$id_usuario'");
        

        if (!$id_pregunta || mysqli_num_rows($id_pregunta) == 0) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar la ID de las preguntas secretas.", "error");
            exit();
        }
        $i=0;
        while ($row = mysqli_fetch_array($id_pregunta)) {
            $id_preguntas[$i] = $row['id'];
            $i++;
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "No se pudo obtener la ID de las preguntas secretas.", "error");
        exit();
    }
    
    try {

        $numero_pregunta = 1;
        for ($i = 0; $i < $cantidad_preguntas; $i++) {

            // Encriptar la nueva respuesta
            $respuesta_encriptada = modeloPrincipal::limpiar_mayusculas_encriptar($respuestas[$i]);
            
            $actualizar = modeloPrincipal::UpdateSQL("preguntas_secretas", "id_pregunta = ".$id_seguridad[$i].", respuesta = '$respuesta_encriptada', numero_pregunta = $numero_pregunta", "id_usuario = '$id_usuario' AND id = '".$id_preguntas[$i]."'");
            
            if($i >= ($cantidad_preguntas - 1)){

                $actualizar = modeloPrincipal::InsertSQL("preguntas_secretas", "id_pregunta, respuesta, numero_pregunta, id_usuario", "".$id_seguridad[$i].", '$respuesta_encriptada', $numero_pregunta, $id_usuario");
            }
            
            $numero_pregunta++;
            
            if (!$actualizar) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al actualizar la pregunta de seguridad.", "error");
                exit();
            } 
        }

        $primer_inicio = model_user::verificar_primer_inicio();
        
        if ($primer_inicio == true) {
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

// modulo para modificar las caracteristicas de acceso de un usuario

if ($modulo === 'caracteristicas_de_acceso'){
    // caracteristicas a actualizar del usuario
    $id_usuario = modeloPrincipal::decryptionId($_POST['UIDTM']);
    $id_usuario = modeloPrincipal::LimpiarCadenaTexto($id_usuario);

    $nuevo_estado = modeloPrincipal::LimpiarCadenaTexto($_POST['cambiar_estado']);
    $suspender = modeloPrincipal::LimpiarCadenaTexto($_POST['permitir_acceso']);
    $rol_asignado = modeloPrincipal::LimpiarCadenaTexto($_POST['asignar_rol']);

    $cedula = modeloPrincipal::LimpiarCadenaTexto($_POST['cedula_user']); 
    $nombre = modeloPrincipal::LimpiarCadenaTexto($_POST['nombre_completo']); 
    $telefono = modeloPrincipal::LimpiarCadenaTexto($_POST['telefono_user']);

    // se evaluan los campos y que no estén vacíos
    modeloPrincipal::validar_campos_vacios([$id_usuario, $nuevo_estado, $suspender, $rol_asignado, $cedula, $nombre, $telefono]);
    
    // se evaluan que los campos cumplan con el formato establecido
    if (modeloprincipal::verificar_datos("[0-1]{1}",$nuevo_estado)) {
        alert_model::alert_of_format_wrong("'estado'");
        exit();
    }
    
    if (modeloprincipal::verificar_datos("[0-1]{1}",$suspender)) {
        alert_model::alert_of_format_wrong("'permitir inicio de sesión'");
        exit();
    }
    
    if (modeloprincipal::verificar_datos("[0-9]{1,5}",$rol_asignado)) {
        alert_model::alert_of_format_wrong("'rol'");
        exit();
    }

    // caracteristicas originales del usuario
    $estado_original = model_user::obtener_info_personal_usuario('estado',$id_usuario);
    $permiso_inicio_sesion_original = model_user::obtener_info_personal_usuario('suspender',$id_usuario);
    $rol_original = model_user::obtener_info_de_un_usuario('id_rol',$id_usuario);

    
    try {

        $estado_user = ($estado_original == 1) ? 'Activo' : 'Inactivo' ;
        $permiso_inicio_sesion_user = ($permiso_inicio_sesion_original == 0) ? 'Permitido' : 'Denegado' ;

        $estado_original = $estado_user;
        $permiso_inicio_sesion_original = $permiso_inicio_sesion_user;
        
    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al obtener las caracteristicas originales.", "error");
        exit();
    }

    // se actualizan las caracteristicas del usuario
    try {
        
        $actualizar_usuario = model_user::actualizar_usuario_por_su_id ("suspender = $suspender, estado = $nuevo_estado, id_rol = $rol_asignado",$id_usuario);
        
        if (!$actualizar_usuario) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al actualizar las características de acceso del usuario.", "error");
            exit();
        }

        // caracteristicas actuales del usuario
        $estado_actual = model_user::obtener_info_personal_usuario('estado',$id_usuario);
        $permiso_inicio_sesion_actual = model_user::obtener_info_personal_usuario('suspender',$id_usuario);
        $rol_actual = model_user::obtener_info_de_un_usuario('id_rol',$id_usuario);

        $estado_user_actual = ($estado_actual == 1) ? 'Activo' : 'Inactivo' ;
        $permiso_inicio_sesion_user_actual = ($permiso_inicio_sesion_actual == 0) ? 'Permitido' : 'Denegado' ;

        $estado_actual = $estado_user_actual;
        $permiso_inicio_sesion_actual = $permiso_inicio_sesion_user_actual;

        $bitacora = bitacora::bitacora("Modificación exitosa de las características de acceso de un usuario","El usuario modificó las características de acceso de un usuario: <br><br>
         <b>****** Información del usuario modificado:   ******</b><br>
        Cédula: <b>".$cedula."</b><br>
        Nombre: <b>".$nombre."</b><br>
        Teléfono: <b>".$telefono."</b><br><br>

         <b>****** Información original:   ******</b><br>
        Estado: <b>".$estado_original."</b><br>
        Permiso de inicio de sesión: <b>".$permiso_inicio_sesion_original."</b><br>
        Rol asignado: <b>".$rol_original."</b><br><br>

         <b>****** Información Actualizada:   ******</b><br>
        Estado: <b>".$estado_actual."</b><br>
        Permiso de inicio de sesión: <b>".$permiso_inicio_sesion_actual."</b><br>
        Rol asignado: <b>".$rol_actual."</b>
        ");

        if (!$bitacora) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al registrar las características de acceso del usuario en la bitácora.", "error");
            exit();
        }

        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }
}

// modulo para resetear el acceso de un usuario

if ($modulo === 'resetear_contraseña'){

    // caracteristicas a actualizar del usuario
    $id_usuario = modeloPrincipal::LimpiarCadenaTexto($_POST["id_usuario_a_modificar"]);
    
    modeloPrincipal::validar_campos_vacios([$id_usuario]);

    $existe_usuario = model_user::consulta_usuario_id("nombre, apellido, 
        primer_inicio, bloqueado, suspender, estado, id_rol",$id_usuario);

    if (!$existe_usuario) {
        alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se encontraron datos del usuario asegúrese de que esté se encuentre registrado en el sistema, por favor verifique e intente nuevamente","error");
    }
    
    $cedula = model_user::obtener_info_personal_usuario('cedula', $id_usuario);
    $nombre = model_user::obtener_info_personal_usuario('nombre', $id_usuario);
    $apellido = model_user::obtener_info_personal_usuario('apellido', $id_usuario);
    
    $cedula_reseteo = trim($cedula);
    $cedula_reseteo = str_ireplace("V", "", $cedula_reseteo);
    $cedula_reseteo = str_ireplace("E", "", $cedula_reseteo);
    $cedula_reseteo = str_ireplace("-", "", $cedula_reseteo);
    $cedula_reseteo = stripslashes($cedula_reseteo);
    $cedula_reseteo = trim($cedula_reseteo);
    $cedula_reseteo = modeloPrincipal::encryption($cedula_reseteo);

    // caracteristicas originales del usuario
    $estado_original = model_user::obtener_info_personal_usuario('estado',$id_usuario);
    $permiso_inicio_sesion_original = model_user::obtener_info_personal_usuario('suspender',$id_usuario);
    $rol_original = model_user::obtener_info_de_un_usuario('id_rol',$id_usuario);
    $bloqueado_original = model_user::obtener_info_personal_usuario('bloqueado',$id_usuario);

    try {

        $estado_user = ($estado_original == 1) ? 'Activo' : 'Inactivo' ;
        $permiso_inicio_sesion_user = ($permiso_inicio_sesion_original == 0) ? 'Permitido' : 'Denegado' ;
        $bloqueado_original = ($bloqueado_original == 1) ? 'Sí' : 'No' ;

        $estado_original = $estado_user;
        $permiso_inicio_sesion_original = $permiso_inicio_sesion_user;
        
    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al obtener las caracteristicas originales.", "error");
        exit();
    }


    try {


        $desbloquear_usuario = modeloPrincipal::UpdateSQL("usuario", "contraseña = '$cedula_reseteo', sesion_activa = 0, primer_inicio = 1, suspender = 0, bloqueado = 0, estado = 1", "id_usuario = '$id_usuario'");

        if (!$desbloquear_usuario) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo desbloquear al usuario debido a un error interno o alteracion de la información ya registrada, por favor verifique e intente nuevamente","error");
        }

        $actualizar = modeloPrincipal::UpdateSQL("preguntas_secretas", "respuesta = '$cedula_reseteo'", "id_usuario = '$id_usuario'");

        if (!$actualizar) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al resetear las preguntas de seguridad.", "error");
            exit();
        } 
        

        // caracteristicas actuales del usuario
        $estado_actual = model_user::obtener_info_personal_usuario('estado',$id_usuario);
        $permiso_inicio_sesion_actual  = model_user::obtener_info_personal_usuario('suspender',$id_usuario);
        $rol_actual  = model_user::obtener_info_de_un_usuario('id_rol',$id_usuario);
        $bloqueado_actual = model_user::obtener_info_personal_usuario('bloqueado',$id_usuario);

        $estado_user_actual = ($estado_actual == 1) ? 'Activo' : 'Inactivo' ;
        $permiso_inicio_sesion_user_actual = ($permiso_inicio_sesion_actual == 0) ? 'Permitido' : 'Denegado' ;
        $bloqueado_actual = ($bloqueado_actual == 1) ? 'Sí' : 'No' ;

        $estado_actual = $estado_user_actual;
        $permiso_inicio_sesion_actual = $permiso_inicio_sesion_user_actual;

        bitacora::bitacora("Modificación exitosa del acceso de un usuario.","Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>
         <b>****** Información del usuario modificado:   ******</b><br><br>
        Cédula: <b>".$cedula."</b><br>
        Nombre: <b>".$nombre."</b><br>
        Apellido: <b>".$apellido."</b><br><br>
         <b>****** Información original:   ******</b><br><br>
        Estado: <b>".$estado_original."</b><br>
        Permiso de inicio de sesión: <b>".$permiso_inicio_sesion_original."</b><br>
        Rol asignado: <b>".$rol_original."</b><br>
        Bloqueado: <b>".$bloqueado_original."</b><br><br>
         <b>****** Información Actual:   ******</b><br><br>
        Estado:  <b>".$estado_actual."</b><br>
        Permiso de inicio de sesión: <b>".$permiso_inicio_sesion_actual."</b><br>
        Rol asignado: <b>".$rol_actual."</b><br>
        Bloqueado: <b>".$bloqueado_actual."</b>
        ");
        alert_model::alert_mod_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_mod_error();
        exit();
    }

    
}
