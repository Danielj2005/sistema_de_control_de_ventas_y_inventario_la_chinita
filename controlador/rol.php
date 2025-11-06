<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

if (!isset($_POST["modulo"]) || $_POST['modulo'] == "") {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud, asegurese de no alterar la información del sistema","error");
    exit();
}

// modulo a trabajar
$modulo = modeloPrincipal::limpiar_cadena($_POST["modulo"]);

// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloPrincipal::primeraLetraMayus(modeloPrincipal::limpiar_cadena($_POST["nombre_rol"]));
    // vistas del modulo proveedores
    $r_proveedores = $_POST["r_proveedores"] ?? '';
    $m_proveedores = $_POST["m_proveedores"] ?? '';
    $l_proveedores = $_POST["l_proveedores"] ?? '';
    $h_proveedores = $_POST["h_proveedores"] ?? '';

    // vistas del modulo productos
    $r_categoria = $_POST["r_categoria"] ?? '';
    $m_categoria = $_POST["m_categoria"] ?? '';
    $l_categoria = $_POST["l_categoria"] ?? '';

    $r_presentacion = $_POST["r_presentacion"] ?? '';
    $m_presentacion = $_POST["m_presentacion"] ?? '';
    $l_presentacion = $_POST["l_presentacion"] ?? '';

    $r_marca = $_POST["r_marca"] ?? '';
    $m_marca = $_POST["m_marca"] ?? '';
    $l_marca = $_POST["l_marca"] ?? '';

    $r_productos = $_POST["r_productos"] ?? '';
    $l_productos = $_POST["l_productos"] ?? '';

    $r_entrada = $_POST["r_entrada"] ?? '';
    $l_entrada = $_POST["l_entrada"] ?? '';

    // vistas del modulo ventas
    $g_venta = $_POST["g_venta"] ?? '';
    $d_venta = $_POST["d_venta"] ?? '';
    $f_venta = $_POST["f_venta"] ?? '';
    $l_venta = $_POST["l_venta"] ?? '';
    $est_venta = $_POST["est_venta"] ?? '';
    
    // vistas del modulo menú
    $r_servicio = $_POST["r_servicio"] ?? '';
    $l_servicio = $_POST["l_servicio"] ?? '';
    $m_servicio = $_POST["m_servicio"] ?? '';

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = $_POST["r_cliente"] ?? '';
    $m_cliente = $_POST["m_cliente"] ?? '';
    $l_cliente = $_POST["l_cliente"] ?? '';
    $h_cliente = $_POST["h_cliente"] ?? '';
    $f_cliente = $_POST["f_cliente"] ?? '';
    // vista de empleados
    $r_empleado = $_POST["r_empleado"] ?? '';
    $m_empleado = $_POST["m_empleado"] ?? '';
    $l_empleado = $_POST["l_empleado"] ?? '';
    // vista de roles
    $r_rol = $_POST["r_rol"] ?? '';
    $m_rol = $_POST["m_rol"] ?? '';
    $l_rol = $_POST["l_rol"] ?? '';

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = $_POST["m_cant_pregunta_seguridad"] ?? '';
    $m_tiempo_sesion = $_POST["m_tiempo_sesion"] ?? '';
    $m_cant_caracteres = $_POST["m_cant_caracteres"] ?? '';
    $m_cant_simbolos = $_POST["m_cant_simbolos"] ?? '';
    $m_cant_num = $_POST["m_cant_num"] ?? '';
    $intentos_inicio_sesion = $_POST['intentos_inicio_sesion'] ?? '';
    
    // vista de bitácora
    $v_bitacora = $_POST["v_bitacora"] ?? '';
    $m_bitacora = $_POST["m_bitacora"] ?? '';

    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM rol WHERE nombre = '$nombre'")) > 0){
        alert_model::alerta_simple(
            "¡Ocurrió un error inesperado!", 
            "Ya se encuentra Registrado un ROL con ese nombre, por favor verifica e intenta de nuevo", 
            "error"); 
        exit(); 
    }

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre]);
    

    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( 
            "¡Ocurrio un error!", 
        "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", 
        "error");
        exit();
    }

    // datos verificados que se van a Registrar
    try {
        $registrar = rol_model::guardar_permisos_rol(
            $nombre,
            $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores,
            $r_categoria, $m_categoria, $l_categoria,
            $r_presentacion, $m_presentacion, $l_presentacion,
            $r_marca, $m_marca, $l_marca,
            $r_productos, $l_productos, $r_entrada, $l_entrada,
            $g_venta, $d_venta, $f_venta, $l_venta, $est_venta,
            $r_servicio, $l_servicio, $m_servicio,
            $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente,
            $r_empleado, $m_empleado, $l_empleado,
            $r_rol, $m_rol, $l_rol,
            $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion,
            $v_bitacora, $m_bitacora
        );

        if (!$registrar) {
            alert_model::alerta_simple(
                "Ha ocurrido un error!", 
                "ocurrio un error al registrar la información del rol y sus permisos.", 
                "error");
            exit();
        }

    } catch (Exception $e) {
        alert_model::alerta_simple(
            "Ha ocurrido un error!", 
            "ocurrio un error no se pudo registrar el rol y sus permisos.",
            "error");
        exit();
    }
    
    try {

        $id_rol = rol_model::consultar_id_rol_recien_registrado();
        $permisosRol = rol_model::obtenerPermisosRolById($id_rol);
        $text_permisos = rol_model::texto_permisos_vista($permisosRol);

        $mensaje_bitacora = rol_model::generar_bitacora ($text_permisos);

        $bitacora_registrar_rol = bitacora::bitacora("Registro Exitoso de un Rol", 
            '<p class="mb-3 text-primary-emphasis"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario registró un rol con la siguiente información:</p>
            <div class="row align-items-center mb-4 pb-2 border-bottom">

                <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-person-badge me-2"></i>
                        Rol: '.$nombre.'
                    </h5>
                </div>

                <div class="col-12 col-md-6 text-center text-md-end">
                    <h5 class="fw-bold mb-0">
                        Estado: 
                        <span class="badge rounded-pill fs-6 bg-success"> Activo </span>
                    </h5>
                </div>
                
            </div>
            
            <div class="row mb-4 pb-2 border-bottom">
                '.$mensaje_bitacora.'
            </div>
        ');

        if (!$bitacora_registrar_rol) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al guardar la modificación en bitácora.", "error");
            exit();
        }

        alert_model::alert_reg_success();
        exit();
    } catch (Exception $e) {
        alert_model::alert_reg_error();
        exit();
    }
}






// modulo para modificar un rol registrado
if($modulo === "Modificar"){

    $id_rol = modeloPrincipal::decryptionId($_POST['UIDR']);
    $id_rol = modeloPrincipal::limpiar_cadena($id_rol);

    $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    $estado = modeloPrincipal::limpiar_cadena($_POST["estado_rol"]);

    // vistas del modulo proveedores
    $r_proveedores = rol_model::validar_post_roles("r_proveedores");
    $m_proveedores = rol_model::validar_post_roles("m_proveedores");
    $l_proveedores = rol_model::validar_post_roles("l_proveedores");
    $h_proveedores = rol_model::validar_post_roles("h_proveedores");

    // vistas del modulo productos
    $l_categoria = rol_model::validar_post_roles("l_categoria");

    $r_presentacion = rol_model::validar_post_roles("r_presentacion");
    $m_presentacion = rol_model::validar_post_roles("m_presentacion");
    $l_presentacion = rol_model::validar_post_roles("l_presentacion");

    $r_productos = rol_model::validar_post_roles("r_productos");
    $l_productos = rol_model::validar_post_roles("l_productos");

    $r_entrada = rol_model::validar_post_roles("r_entrada");
    $l_entrada = rol_model::validar_post_roles("l_entrada");

    // vistas del modulo ventas
    $g_venta = rol_model::validar_post_roles("g_venta");
    $d_venta = rol_model::validar_post_roles("d_venta");
    $f_venta = rol_model::validar_post_roles("f_venta");
    $l_venta = rol_model::validar_post_roles("l_venta");
    $est_venta = rol_model::validar_post_roles("est_venta");
    
    // vistas del modulo menú
    $r_servicio = rol_model::validar_post_roles("r_servicio");
    $l_servicio = rol_model::validar_post_roles("l_servicio");
    $m_servicio = rol_model::validar_post_roles("m_servicio");

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = rol_model::validar_post_roles("r_cliente");
    $m_cliente = rol_model::validar_post_roles("m_cliente");
    $l_cliente = rol_model::validar_post_roles("l_cliente");
    $h_cliente = rol_model::validar_post_roles("h_cliente");
    $f_cliente = rol_model::validar_post_roles("f_cliente");
    // vista de empleados
    $r_empleado = rol_model::validar_post_roles("r_empleado");
    $m_empleado = rol_model::validar_post_roles("m_empleado");
    $l_empleado = rol_model::validar_post_roles("l_empleado");
    // vista de roles
    $r_rol = rol_model::validar_post_roles("r_rol");
    $m_rol = rol_model::validar_post_roles("m_rol");
    $l_rol = rol_model::validar_post_roles("l_rol");

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = rol_model::validar_post_roles("m_cant_pregunta_seguridad");
    $m_tiempo_sesion = rol_model::validar_post_roles("m_tiempo_sesion");
    $m_cant_caracteres = rol_model::validar_post_roles("m_cant_caracteres");
    $m_cant_simbolos = rol_model::validar_post_roles("m_cant_simbolos");
    $m_cant_num = rol_model::validar_post_roles("m_cant_num");
    $intentos_inicio_sesion = rol_model::validar_post_roles('intentos_inicio_sesion');
    // vista de bitácora
    $v_bitacora = rol_model::validar_post_roles("v_bitacora");
    $m_bitacora = rol_model::validar_post_roles("m_bitacora");

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $f_venta, $l_venta, $est_venta, $r_servicio, $l_servicio, $m_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $nombre, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, $m_bitacora]);
    
    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( 
            "¡Ocurrio un error!", 
            "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", 
            "error");
        exit();
    }
    
    $permisosRol = rol_model::obtenerPermisosRolById($id_rol);

    $text_permisos_originales = rol_model::texto_permisos_vista($permisosRol);

    try {

        $actualizar = modeloPrincipal::UpdateSQL(
            "rol", 
            "nombre = '$nombre', r_proveedores = $r_proveedores, m_proveedores = $m_proveedores, l_proveedores = $l_proveedores, h_proveedores = $h_proveedores, r_categoria = $r_categoria,  m_categoria = $m_categoria, l_categoria = $l_categoria, r_presentacion = $r_presentacion, m_presentacion = $m_presentacion, l_presentacion = $l_presentacion, r_productos = $r_productos, l_productos = $l_productos, r_entrada = $r_entrada, l_entrada = $l_entrada, g_venta = $g_venta, d_venta = $d_venta, l_venta = $l_venta, f_venta = $f_venta, est_venta = $est_venta, r_servicio = $r_servicio, m_servicio = $m_servicio, l_servicio = $l_servicio, r_cliente = $r_cliente, m_cliente = $m_cliente, l_cliente = $l_cliente, h_cliente = $h_cliente, f_cliente = $f_cliente, r_empleado = $r_empleado, m_empleado = $m_empleado, l_empleado = $l_empleado, r_rol = $r_rol, m_rol = $m_rol, l_rol = $l_rol, m_cant_pregunta_seguridad = $m_cant_pregunta_seguridad, m_tiempo_sesion = $m_tiempo_sesion, m_cant_caracteres = $m_cant_caracteres, m_cant_simbolos = $m_cant_simbolos, m_cant_num = $m_cant_num, intentos_inicio_sesion = $intentos_inicio_sesion, v_bitacora = $v_bitacora, m_bitacora = $m_bitacora, estado = $estado", 
            "id_rol = $id_rol");

        if (!$actualizar) {
            alert_model::alerta_simple(
                "Ha ocurrido un error!", 
                "ocurrio un error al actualizar la información del rol seleccionado.", 
                "error");
            exit();
        }

    } catch (Exception $e) {
        alert_model::alerta_simple(
            "Ha ocurrido un error!", 
            "ocurrio un error al modificar la información del rol seleccionado.", 
            "error");
        exit();
    }
    

    $permisosRolActual = rol_model::obtenerPermisosRolById($id_rol);

    $text_mensaje_actuales = rol_model::texto_permisos_vista($permisosRolActual);

    $bitacora = rol_model::generar_bitacora($permisosRol, $text_permisos_originales, $permisosRolActual, $text_mensaje_actuales);

    
    try {
        $colorBadge = $permisos['estado'] == 1 ? 'bg-success' : 'bg-danger';
        $textBadge = $permisos['estado'] == 1 ? 'Activo' : 'Inactivo';

        $bitacora_modificacion_rol = bitacora::bitacora("Modificación Exitosa de un Rol", 
        '<p class="mb-3 text-primary-emphasis"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;El usuario modificó el rol con la siguiente información:</p>
            <div class="row align-items-center mb-4 pb-2 border-bottom">

                <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-person-badge me-2"></i>
                        Rol: admin
                    </h5>
                </div>

                <div class="col-12 col-md-6 text-center text-md-end">
                    <h5 class="fw-bold mb-0">
                        Estado: 
                        <span class="badge rounded-pill fs-6 bg-success '.$colorBadge.'"> '.$textBadge.'</span>
                    </h5>
                </div>
                
            </div>
            
            <div class="row mb-4 pb-2 border-bottom">
                '.$bitacora.'
            </div>            
        ');

        if (!$bitacora_modificacion_rol) {
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




/* ----------------- modulo para cambiar el estado de un rol ------------------ */
$id_rol = modeloPrincipal::decryptionId($_POST['UIDR']);
$id_rol = modeloPrincipal::limpiar_cadena($id_rol);
$rol_info = mysqli_fetch_array(modeloPrincipal::consultar("SELECT nombre FROM rol WHERE id_rol = $id_rol"));
$rol_info = $rol_info['nombre'];

if ($modulo === "activo"){

    if(modeloPrincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_rol'")){
        
        bitacora::bitacora("Cambio exitoso del estado de un rol","El usuario cambió el estado del rol con la siguiente información: <br><br>
        <b>***** Información del rol original: *****</b><br><br>
        Nombre del rol:  <b>$rol_info </b><br><br>
        Estado: <b>Activo</b> <br><br>
        <b>***** Información del rol actualizada: *****</b><br><br>
        Nombre del rol:  <b>$rol_info </b><br>
        Estado: <b>Inactivo</b>");

        alert_model::alert_reload("¡Rol Desactivado!","El rol se desactivo exitosamente.","success");
        exit();
    }else{
        alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo realizar la operacion, por favor intente nuevamente","error");
        exit();
    }
}

if ($modulo === "inactivo"){

    if(modeloPrincipal::UpdateSQL("rol","estado = '1'", "id_rol = '$id_rol'")){
        bitacora::bitacora("Cambio exitoso del estado de un rol","El usuario cambió el estado del rol con la siguiente información: <br><br>
        <b>***** Información del rol original: *****</b><br><br>
        Nombre del rol:  <b>$rol_info </b><br><br>
        Estado: <b>Inactivo</b> <br><br>
        <b>***** Información del rol actualizada: *****</b><br><br>
        Nombre del rol:  <b>$rol_info </b><br>
        Estado: <b>Activo</b>");

        alert_model::alert_reload("¡Rol activado!","El rol se activo exitosamente.","success");
        exit();
    }else{
        alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo realizar la operacion, por favor intente nuevamente","error");
        exit();
    } 
}
