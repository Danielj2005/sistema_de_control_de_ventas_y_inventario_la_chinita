<?php

// include_once '../modelo/modeloPrincipal.php'; // se incluye el modelo principal
// require_once '../modelo/rol_model.php'; // se incluye el modelo de rol
// require_once '../modelo/bitacora_model.php'; // se incluye el modelo de rol
// require_once '../modelo/alert_model.php'; // se incluye el modelo de alertas

class model_user extends modeloPrincipal {
    
    
    /********************************************************************************************************/ 
    /*********************************     CRUD de usuarios         *****************************************/
    /********************************************************************************************************/ 
    
    /***************************************************************/
    /******* funciones para consultar datos de los usuarios ********/
    /***************************************************************/

    public static function consultar_usuario($fields) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM usuario");
        modeloPrincipal::verificar_consulta($consul,'usuario'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consulta_usuario_id($fields, $id_usuario) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM usuario WHERE id_usuario = '$id_usuario'");
        modeloPrincipal::verificar_consulta($consul, 'usuario'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consulta_usuario_condicion($fields,$condition) {
        $consul = modeloPrincipal::consultar("SELECT $fields FROM usuario WHERE $condition");
        modeloPrincipal::verificar_consulta($consul,'usuario'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    public static function consulta_usuario_existe($query,$condition) {
        $consul = modeloPrincipal::consultar("SELECT $query FROM usuario AS U INNER JOIN rol AS R ON U.id_rol = R.id_rol WHERE $condition");
        modeloPrincipal::verificar_consulta($consul,'usuario'); // se verifica si la consulta fue exitosa
        return $consul;
    }

    
    /*************************************************v*********************/
    /*** funciones para consultar preguntas de seguridad de los usuarios ***/
    /***********************************************************************/

    public static function consultar_todas_las_preguntas_seguridad () {
        $preguntas_sistema = modeloPrincipal::consultar("SELECT pregunta FROM seguridad");
        modeloPrincipal::verificar_consulta($preguntas_sistema,'preguntas de seguridad');
        return $preguntas_sistema;
    }
    
    
    public static function consultar_preguntas_seguridad_por_pregunta($pregunta) {
        $preguntas_sistema = modeloPrincipal::consultar("SELECT pregunta FROM seguridad WHERE pregunta = '$pregunta'");
        modeloPrincipal::verificar_consulta($preguntas_sistema,'preguntas de seguridad');
        return $preguntas_sistema;
    }
    

    public static function consultar_preguntas_seguridad_por_id($id_pregunta) {
        $preguntas_sistema = modeloPrincipal::consultar("SELECT pregunta FROM seguridad WHERE id_pregunta = '$id_pregunta'");
        modeloPrincipal::verificar_consulta($preguntas_sistema,'preguntas de seguridad');
        return $preguntas_sistema;
    }
    

    public static function consultar_preguntas_seguridad_por_id_usuario($id_usuario) {
        $preguntas_sistema = modeloPrincipal::consultar("SELECT pregunta FROM preguntas_secretas WHERE id_usuario = '$id_usuario'");
        modeloPrincipal::verificar_consulta($preguntas_sistema,'preguntas de seguridad');
        return $preguntas_sistema;
    }

    /****************************************************************************/ 
    /*       funciones de insertar datos de los usuarios   */
    /****************************************************************************/ 

    public static function insert_user($cedula, $nombre, $apellido, $correo, $contraseña, $telefono, $direccion, $id_rol){

        $actualizar = modeloPrincipal::InsertSQL( "usuario","cedula, nombre, apellido, correo, contraseña, telefono, direccion, sesion_activa, bloqueado, suspender, primer_inicio, id_rol, estado", "'$cedula', '$nombre', '$apellido', '$correo', '$contraseña', '$telefono', '$direccion', 0, 0, 0, 1, $id_rol, 1");
        
        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo desbloquear al usuario debido a un error interno o alteracion de la información ya registrada, por favor verifique e intente nuevamente","error");
        }
        return $actualizar;
    }

    
    /**************************************************************/ 
    /*       funciones de modificación de datos de los usuarios   */
    /**************************************************************/ 

    public static function actualizar_usuario_logeado ($campos) {
        
        $id_usuario = $_SESSION['id_usuario'];
        
        $actualizar = modeloPrincipal::UpdateSQL("usuario","$campos","id_usuario = $id_usuario");
        if (!$actualizar) {
            alert_model::alert_mod_error();
            exit();
        } 
    
    }

    public static function actualizar_usuario_por_su_id ($campos, $id_usuario) {
        
        $actualizar = modeloPrincipal::UpdateSQL("usuario",$campos,"id_usuario = $id_usuario");
        if (!$actualizar) {
            alert_model::alerta_simple("¡Error!", "ocurrio un error al realizar la operación de actualizar las características de acceso del usuario.", "error");
            exit();
        } 
        return $actualizar;
    
    }

    public static function modificar_usuario($id_usuario, $cedula, $nombre, $apellido, $correo, $telefono, $direccion, $id_rol) {
        // se modifica el usuario
        if (modeloPrincipal::UpdateSQL("usuario", "cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$telefono', direccion = '$direccion', id_rol = '$id_rol'", "id_usuario = '$id_usuario'")) {
            alert_model::alert_mod_success();
        } else { // se muestra un mensaje en caso de que no se pueda modificar los datos
            alert_model::alert_mod_error();
            exit();
        }
    }

    public static function modificar_estado_usuario($id_usuario, $estado) {
        // se modifica el estado del usuario
        
        $cambio_estado = modeloPrincipal::UpdateSQL("usuario", "estado = '$estado'", "id_usuario = '$id_usuario'");
        return $cambio_estado;    
    }
    public static function modificar_usuario_bloqueado($id_usuario, $bloqueado) {
        $bloqueo = modeloPrincipal::UpdateSQL("usuario", "bloqueado = '$bloqueado'", "id_usuario = '$id_usuario'");

        if (!$bloqueo) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo resetear el usuario asegúrese de que su información no haya sido alterada, por favor verifique e intente nuevamente","error");
        }
        return $bloqueo;

    }
    public static function modificar_contraseña($id_usuario, $contraseña) {
        // se modifica la contraseña del usuario
        if (modeloPrincipal::UpdateSQL("usuario", "contraseña = '$contraseña'", "id_usuario = '$id_usuario'")) {
            alert_model::alert_mod_success();
        } else { // se muestra un mensaje en caso de que no se pueda modificar los datos
            alert_model::alert_mod_error();
            exit();
        }
    }

    public static function modificar_sesion_usuario($id_usuario, $sesion_activa) {
        // se modifica el estado de la sesion activa/inactiva del usuario
        if (modeloPrincipal::UpdateSQL("usuario", "sesion_activa = '$sesion_activa'", "id_usuario = '$id_usuario'")) {
            alert_model::alert_mod_success();
        } else { // se muestra un mensaje en caso de que no se pueda modificar los datos
            alert_model::alert_mod_error();
            exit();
        }
    }

    public static function modificar_sesion_ultima_sesion_fecha($id_usuario, $fecha_ultima_sesion, $estado_sesion) {
        // se modifica la fecha de la ultima sesion del usuario
        // se actualiza el estado de la sesión del usuario a activa
        if (!modeloPrincipal::UpdateSQL("usuario","ultima_sesion = '$fecha_ultima_sesion', sesion_activa = '$estado_sesion'","id_usuario = $id_usuario")) {
            return exit();
        }
    }

    
    /************************************************************/ 
    /*       funciones de asignación de datos de los usuarios   */
    /************************************************************/ 

    public static function asignar_preguntas_seguridad_usuario() {

        // Obtener la cantidad de preguntas configuradas en el sistema
        $configuracion = modeloPrincipal::consultar("SELECT c_preguntas FROM configuracion");
        if (!$configuracion || mysqli_num_rows($configuracion) == 0) {
            alert_model::alerta_simple('¡Error!', 'No se pudo obtener la configuración de preguntas de seguridad.', 'error');
            exit();
        }
        $cantidad_preguntas = intval(mysqli_fetch_array($configuracion)['c_preguntas']);

        // Obtener el ID del usuario recién registrado
        $id_usuario = self::obtener_id_usuario_recien_registrado();
        if (!$id_usuario) {
            alert_model::alerta_simple('¡Error!', 'No se pudo obtener el ID del usuario recién registrado.', 'error');
            exit();
        }

        // Obtener la información personal del usuario (por ejemplo, cédula) y encriptarla
        $respuesta = self::obtener_info_personal_usuario('cedula', $id_usuario);
        if (!$respuesta) {
            alert_model::alerta_simple('¡Error!', 'No se pudo obtener la información personal del usuario.', 'error');
            exit();
        }
        $cedula_reseteo = trim($respuesta);
        $cedula_reseteo = str_ireplace("V", "", $cedula_reseteo);
        $cedula_reseteo = str_ireplace("E", "", $cedula_reseteo);
        $cedula_reseteo = str_ireplace("-", "", $cedula_reseteo);
        $cedula_reseteo = stripslashes($cedula_reseteo);
        $cedula_reseteo = trim($cedula_reseteo);
        $respuesta_encriptada = modeloPrincipal::encryption($cedula_reseteo);

        // Obtener la cantidad total de preguntas disponibles en el sistema
        $preguntas_disponibles = modeloPrincipal::consultar("SELECT id_seguridad FROM seguridad");
        if (!$preguntas_disponibles || mysqli_num_rows($preguntas_disponibles) == 0) {
            alert_model::alerta_simple('¡Error!', 'No hay preguntas de seguridad disponibles en el sistema.', 'error');
            exit();
        }

        // Convertir las preguntas disponibles en un array
        $ids_preguntas = [];
        while ($row = mysqli_fetch_assoc($preguntas_disponibles)) {
            $ids_preguntas[] = $row['id_seguridad'];
        }

        // Seleccionar preguntas aleatorias y asignarlas al usuario
        $preguntas_asignadas = [];
        for ($i = 1; $i <= $cantidad_preguntas; $i++) {
            do {
                // Seleccionar una pregunta aleatoria
                $id_pregunta = $ids_preguntas[array_rand($ids_preguntas)];
            } while (in_array($id_pregunta, $preguntas_asignadas)); // Evitar duplicados

            // Registrar la pregunta en la base de datos
            $resultado = modeloPrincipal::InsertSQL(
                "preguntas_secretas",
                "id_pregunta, respuesta, numero_pregunta, id_usuario",
                "'$id_pregunta', '$respuesta_encriptada', '$i', '$id_usuario'"
            );

            if (!$resultado) {
                alert_model::alerta_simple('¡Error!', 'No se pudo asignar la pregunta de seguridad al usuario.', 'error');
                exit();
            }

            // Agregar la pregunta a las asignadas
            $preguntas_asignadas[] = $id_pregunta;
        }
    }


    
    /*************************************************************/ 
    /*       funciones de componentes de datos de los usuarios   */
    /*************************************************************/ 
    
    // funcion para crear una lista de los tipos de usuarios
    
    public static function select_tipo_usuario(){

        $lista_tipo_usuarios = modeloPrincipal::consultar("SELECT * FROM tipo_usuario WHERE id_tipo != 1");

        while($row = mysqli_fetch_array($lista_tipo_usuarios)) { 

            echo '<option name="id_tipo" value="'.$row['id_tipo'].'" >'.$row['nombre'].'</option>';

        }
    }

    //  Funcion para pedir una lista de empleados del negocio 
    public static function lista_de_usuarios() {

        $lista_usuario = modeloPrincipal::consultar("SELECT id_usuario, cedula, nombre, apellido, telefono, estado 
            FROM usuario
            WHERE id_tipo != 1 
            ORDER BY nombre ASC");
        
        // se imprimen los resultados de la consulta
        while ( $mostrar = mysqli_fetch_array($lista_usuario)) { ?>    
            <tr>
                <td></td>
                <td><?= $mostrar["cedula"]; ?></td>
                <td><?= $mostrar["nombre"]; ?></td>
                <td><?= $mostrar["apellido"]; ?></td>
                <td><?= $mostrar["telefono"]; ?></td>
                <td scope="row" class="text-center">
                    <form action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="updateAccounUser" >
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $mostrar["id_usuario"]; ?>">
                        
                        <?php if ($mostrar["estado"] === "1") { ?>
                            <input type="hidden" name="modulo" value="activo">
                            <button class="btn btn-success" title="estado del usuario">
                                <i class="zmdi zmdi-check"></i> Activo 
                            </button>
                        
                        <?php }else if ($mostrar["estado"] === "0") { ?>
                            <input type="hidden" name="modulo" value="inactivo">
                            <button class="btn btn-danger">
                                <i class="zmdi zmdi-close"></i> Inactivo 
                            </button>
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php }
    } 

    public static function lista_preguntas_seguridad() {
        $datos = modeloPrincipal::consultar("SELECT * FROM seguridad"); 

        // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($datos)) {
            echo '<option class="" name="select_pregunta" value="'.$row['id_seguridad'].'" selected >'.$row['pregunta'].'</option>';
        }
        mysqli_free_result($datos); 
    }

    

    
    /********************************************************************/ 
    /*       MODULO de verificar / validar datos del usuarios           */
    /********************************************************************/ 
    
    // funcion para verificar coincidencia de contraseña de un usuario

    public static function verificar_coincidencia_de_contraseña($contraseña,$contraseña2){
        if ($contraseña !== $contraseña2) {
            alert_model::alerta_simple('¡Ocurrio un Error!','Las contraseñas no coinciden, por favor verifica e intenta nuevamente','error');
            exit();    
        }
    }


    public static function validar_primer_inicio($id_usuario){

        $primer_inicio = Self::obtener_info_personal_usuario("primer_inicio",$id_usuario);

        if($primer_inicio == '1'){
            echo "<script type='text/javascript'>
                    window.location.href='./mi_perfil.php';
                </script>";
            exit();
        }
    }

    public static function validar_sesion_activa($id_usuario){
        $sesion_activa = Self::obtener_info_personal_usuario("sesion_activa",$id_usuario);
        if($sesion_activa == '0'){
            modeloPrincipal::UpdateSQL("usuario","sesion_activa = '0'","id_usuario = $id_usuario");
            alert_model::alert_redirect('¡Sesión activa detectada!', 'Se ha detectado un intento de inicio de sesión desde otro dispositivo asociado a su cuenta. Para garantizar la seguridad de su información, la sesión actual se cerrará automáticamente en breve.','warning', '../controlador/salir.php');
            exit();
        }
    }
    
    public static function verificar_preguntas_seguridad_alterada($pregunta){
        $pregunta = Self::encryption($pregunta);
        $preguntas_sistema = self::consultar_preguntas_seguridad_por_pregunta("$pregunta");
        
        if (mysqli_num_rows($preguntas_sistema) < '1'){
            alert_model::alerta_condicional("Atención!","Alguna de las preguntas fue alterada de manera incorrecta y no coinciden con las que están registradas en el sistema. Se cerrará tu sesión por motivos de seguridad.","","window.location = '../controlador/salir.php';");
            exit();
        }
    }

    public static function verificar_intento_de_acceso_al_sistema(){
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
            // // Redirigir el acceso a la página sino inició de sesión
            // bitacora::intento_de_acceso_al_sistema_de_manera_incorrecta()
            header('Location: ../');
            exit();
        }
    }

    public static function verificar_primer_inicio(){
        $id_usuario = $_SESSION['id_usuario'];

        $cedula = self::obtener_info_personal_usuario('cedula',$id_usuario);
        $cedula = trim($cedula);
        $cedula = str_ireplace("V", "", $cedula);
        $cedula = str_ireplace("E", "", $cedula);
        $cedula = str_ireplace("-", "", $cedula);
        $cedula = stripslashes($cedula);
        $cedula = trim($cedula);
        $cedula = modeloPrincipal::encryption($cedula);

        $contraseña = self::obtener_info_personal_usuario('contraseña',$id_usuario);

        $respuestas = modeloPrincipal::consultar("SELECT respuesta FROM preguntas_secretas WHERE id_usuario = '$id_usuario'");
        $respuestas = mysqli_fetch_array($respuestas);

        foreach ($respuestas as $key){
            if ($key !== $cedula && $key !== $contraseña) {
                return true;
            }
        }
        return false;
    }

    public static function validar_preguntas_de_seguridad($preguntas,$respuestas) {
        
        //datos verificados modificar

        for ($i = 0; $i < count($preguntas); $i++) { 
            // Verificamos si la pregunta es automática o no
            $j=1;
            // se verifica si se recibieron campos vacios
            
            if($respuestas[$i] == ""){
                alert_model::alerta_simple('¡Atención!','La respuesta nº'.($j+1).' no puede estar vacia','warning');
                exit();
            }
            if($preguntas[$i] == ""){
                alert_model::alerta_simple('¡Atención!','La pregunta nº'.$preguntas[$i].' no puede estar vacia','warning');
                exit();
            }

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0 ]{3,50}$/",$respuestas[$i])) {
                alert_model::alerta_simple('Atención!',"La respuesta nº ".($j+1)." no cumple con el formato establecido",'warning');
                exit();
            }

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ?¿]{8,150}$/",$preguntas[$i])) {
                // si no cumple con el formato establecido se muestra un mensaje de error
                alert_model::alerta_simple('Atención!',"La pregunta nº ".$preguntas[$i]." no cumple con el formato establecido",'warning');
                exit(); // fijar exit() position
            }

            $respuestas[$i] = strtoupper($respuestas[$i]);  

            //lo hice de esta manera porque no me queria agarrar de otra forma la vidacion si lo logran acomodar en un futuro seria bueno jajajajjaja ;D suerte 
            self::verificar_preguntas_seguridad_alterada($preguntas[$i]);
            
        }

    }

    public static function validar_usuario_existe($campos,$tabla,$condicion){
        // se comprueba que no exista un registro con los mismos datos
        modeloPrincipal::validacion_registro_existente($campos,$tabla,$condicion);

    }

    /**********************************************************************************/
    /********************** funciones obtener datos de un usuario  ********************/
    /**********************************************************************************/
    
    // funcion para obtener_info_personal_usuario

    public static function obtener_info_personal_usuario($info,$id_usuario) {
        if ($info == 'id_rol') {
            $id_rol = rol_model::obtener_id_rol_usuario();
            $nombre_rol = rol_model::obtener_nombre_rol_usuario($id_rol);
            $info_usuario[$info] = $nombre_rol;
        }else{
            $info_usuario = mysqli_fetch_array(modeloPrincipal::consultar("SELECT $info FROM usuario WHERE id_usuario = $id_usuario"));
        }

        return $info_usuario[$info];
    }
    // funcion para obtener_info_personal_usuario

    public static function obtener_info_de_un_usuario($info,$id_usuario) {
        if ($info == 'id_rol') {
            $id_rol = modeloPrincipal::consultar("SELECT id_rol FROM usuario WHERE id_usuario = $id_usuario");

            if (!$id_rol) {
                alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se encontró el rol del usuario, por favor verifique e intente nuevamente","error");
            }
            
            $id_rol = mysqli_fetch_array($id_rol);
            $id_rol = $id_rol['id_rol'];

            $nombre_rol = rol_model::obtener_nombre_rol_usuario($id_rol);
            $info_usuario[$info] = $nombre_rol;
        }else{
            $info_usuario = mysqli_fetch_array(modeloPrincipal::consultar("SELECT $info FROM usuario WHERE id_usuario = $id_usuario"));
        }

        return $info_usuario[$info];
    }

    // funcion para obtener el id de un usuario

    public static function obtener_id_usuario_recien_registrado(){
        $id_usaurio = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_usuario) AS id FROM usuario"));
        $id_usaurio = $id_usaurio['id'];
        return $id_usaurio;
    }

    /***************************************************************/ 
    /*       funcion para generar un token para un usuario         */
    /***************************************************************/ 
    public static function generateToken() {
        do {

            // Generar un token de 11 dígitos
            $token = '';
            for ($i = 0; $i < 11; $i++) {
                $token .= mt_rand(0, 9); // Concatenar un número aleatorio entre 0 y 9
            }
            // Verificar si el token ya existe en la base de datos
            $existToken = modeloPrincipal::consultar("SELECT token FROM usuario WHERE token = '$token'");
        } while (mysqli_num_rows($existToken) > 0); // Repetir si el token ya existe
        return $token;
    }

    /***************************************************************/ 
    /*       funcion para obtener el token de un usuario           */
    /***************************************************************/ 
    public static function getToken($id_usuario) {
        
    }

    /**********************************************************************************/
    /********************** funciones para ocultar la contaseña de un usuario  ********************/
    /**********************************************************************************/
    public static function ocultar_contraseña_usuario ($id_usuario, $contraseña = "") {

        if ($contraseña == "") {

            $contraseña = self::obtener_info_personal_usuario('contraseña',$id_usuario); // se obtiene la contraseña del usuario
            $cantidad_caracteres = strlen($contraseña); // obtiene la cantidad de caracteres de la cadena
            $asteriscos = str_repeat("*", $cantidad_caracteres); // obtiene la cantidad de asteriscos a mostrar

        } else {

            $asteriscos = str_repeat("*", strlen($contraseña));

        }

        return $asteriscos; // retorna la cadena oculta
    }

    

    /*********************************************************************************************************/
    /*********************** funciones para el CRUD de la bitácora de registro de información ****************/
    /********************************************************************************************************/

    // funcion para Registra en la bitácora el registro exitoso de un nuevo usuario

    public static function bitacora_registro_nuevo_usuario($nombre, $apellido) {
        $consult = bitacora::nuevo_registro("un nuevo usuario","un nuevo usuario: $nombre $apellido.");
        modeloPrincipal::verificar_consulta($consult,'bitacora');
        return $consult;
    }

    
    public static function bitacora_info_personal_usuario_modificada($cedula_original, $nombre_original, $apellido_original, $correo_original, $direccion_original, $telefono_original, $id_usuario) {
        
        bitacora::bitacora("Modificación del perfil de usuario","El usuario actualizó su información personal\n
        Información original:\n
        Cédula: ".$cedula_original."\n
        Nombre: ".$nombre_original."\n
        Apellido: ".$apellido_original."\n
        Correo: ".$correo_original."\n
        Dirección: ".$direccion_original."\n
        Teléfono: ".$telefono_original."\n

        Información Actual:\n
        Cédula: ".self::obtener_info_personal_usuario('cedula',$id_usuario)."\n
        Nombre: ".self::obtener_info_personal_usuario('nombre',$id_usuario)."\n
        Apellido: ".self::obtener_info_personal_usuario('apellido',$id_usuario)."\n
        Correo: ".self::obtener_info_personal_usuario('correo',$id_usuario)."\n
        Dirección: ".self::obtener_info_personal_usuario('direccion',$id_usuario)."\n
        Teléfono: ".self::obtener_info_personal_usuario('telefono',$id_usuario)."
        ");
    }

    public static function bitacora_modificacion_contraseña() {

        bitacora::bitacora("Modificación exitosa del perfil de usuario.","El usuario actualizó su contraseña.");
    }

    
    public static function bitacora_cambio_estado($estado) {
        
        try {

            if ($estado == 1) {
                $nuevo_estado = 'Activado'; 
                $estado = 'Inactivo';
            } else if ($estado == 0) {
                $nuevo_estado = 'Inactivo'; 
                $estado = 'Activado';
            }

            $bitacora_cambio_estado = bitacora::bitacora("Cambio exitoso del estado.","El usuario modificó el estado de un usuario de: $estado a: $nuevo_estado.");
            
            return $bitacora_cambio_estado;
        } catch (Exception $e) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo guardar la operación realizada en bitácora, por favor intente nuevamente","error");
            exit();
        }
        
    }
    
}
