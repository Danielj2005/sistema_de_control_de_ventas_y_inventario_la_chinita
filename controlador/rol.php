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

    $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = rol_model::validar_post_roles("r_proveedores");
    $m_proveedores = rol_model::validar_post_roles("m_proveedores");
    $l_proveedores = rol_model::validar_post_roles("l_proveedores");
    $h_proveedores = rol_model::validar_post_roles("h_proveedores");

    // vistas del modulo productos
    $r_categoria = rol_model::validar_post_roles("r_categoria");
    $m_categoria = rol_model::validar_post_roles("m_categoria");
    $l_categoria = rol_model::validar_post_roles("l_categoria");

    $r_presentacion = rol_model::validar_post_roles("r_presentacion");
    $m_presentacion = rol_model::validar_post_roles("m_presentacion");
    $l_presentacion = rol_model::validar_post_roles("l_presentacion");

    $r_marca = rol_model::validar_post_roles("r_marca");
    $m_marca = rol_model::validar_post_roles("m_marca");
    $l_marca = rol_model::validar_post_roles("l_marca");

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

    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT nombre FROM rol WHERE nombre = '$nombre'")) > 0){
        alert_model::alerta_simple("¡Ocurrió un error inesperado!", "Ya se encuentra Registrado un ROL con ese nombre, por favor verifica e intenta de nuevo", "error"); 
        exit(); 
    }

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$nombre, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $m_categoria, $l_categoria, $r_presentacion, $m_presentacion, $l_presentacion, $r_marca, $m_marca, $l_marca, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $f_venta, $l_venta, $est_venta, $r_servicio, $l_servicio, $m_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $nombre, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, $m_bitacora]);

    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( "¡Ocurrio un error!", "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", "error");
        exit();
    }

    // datos verificados que se van a Registrar
    try {
        $registrar = rol_model::registrar($nombre, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $m_categoria, $l_categoria, $r_presentacion, $m_presentacion, $l_presentacion, $r_marca, $m_marca, $l_marca, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $l_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $l_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, $m_bitacora);

        if (!$registrar) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al registrar la información del rol.", "error");
            exit();
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al registrar la información del rol.", "error");
        exit();
    }
    
    try {
        $id_rol = modeloPrincipal::obtener_id_recien_registrado("id_rol","rol");

        $mensaje_bitacora = rol_model::generar_mensaje_bitacora_de_rol($id_rol,'rol');

        $bitacora_registrar_rol = bitacora::bitacora("Registro exitoso de un rol", "El usuario Registró un rol con la siguiente infromación: <br>
        Nombre del rol: <b>$nombre</b><br>
        Estado: <b>Activo</b><br><br>
        $mensaje_bitacora");

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

    $id_rol = modeloPrincipal::limpiar_cadena($_POST["id_rol"]);
    $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    $estado = modeloPrincipal::limpiar_cadena($_POST["estado_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = rol_model::validar_post_roles("r_proveedores");
    $m_proveedores = rol_model::validar_post_roles("m_proveedores");
    $l_proveedores = rol_model::validar_post_roles("l_proveedores");
    $h_proveedores = rol_model::validar_post_roles("h_proveedores");

    // vistas del modulo productos
    $r_categoria = rol_model::validar_post_roles("r_categoria");
    $m_categoria = rol_model::validar_post_roles("m_categoria");
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
        alert_model::alerta_simple( "¡Ocurrio un error!", "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", "error");
        exit();
    }
    
    $text_mensaje_original = rol_model::generar_mensaje_bitacora_de_rol($id_rol,"original");
    
    try {
        $actualizar = modeloPrincipal::UpdateSQL("rol", "nombre = '$nombre', r_proveedores = $r_proveedores, m_proveedores = $m_proveedores, l_proveedores = $l_proveedores, h_proveedores = $h_proveedores, r_categoria = $r_categoria,  m_categoria = $m_categoria, l_categoria = $l_categoria, r_presentacion = $r_presentacion, m_presentacion = $m_presentacion, l_presentacion = $l_presentacion, r_productos = $r_productos, l_productos = $l_productos, r_entrada = $r_entrada, l_entrada = $l_entrada, g_venta = $g_venta, d_venta = $d_venta, l_venta = $l_venta, f_venta = $f_venta, est_venta = $est_venta, r_servicio = $r_servicio, m_servicio = $m_servicio, l_servicio = $l_servicio, r_cliente = $r_cliente, m_cliente = $m_cliente, l_cliente = $l_cliente, h_cliente = $h_cliente, f_cliente = $f_cliente, r_empleado = $r_empleado, m_empleado = $m_empleado, l_empleado = $l_empleado, r_rol = $r_rol, m_rol = $m_rol, l_rol = $l_rol, m_cant_pregunta_seguridad = $m_cant_pregunta_seguridad, m_tiempo_sesion = $m_tiempo_sesion, m_cant_caracteres = $m_cant_caracteres, m_cant_simbolos = $m_cant_simbolos, m_cant_num = $m_cant_num, intentos_inicio_sesion = $intentos_inicio_sesion, v_bitacora = $v_bitacora, m_bitacora = $m_bitacora, estado = $estado", "id_rol = $id_rol");

        if (!$actualizar) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al actualizar la información del rol seleccionado.", "error");
            exit();
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al modificar la información del rol seleccionado.", "error");
        exit();
    }

    $text_mensaje_actuales = rol_model::generar_mensaje_bitacora_de_rol($id_rol,"actualizada");

    try {

        $bitacora_modificacion_rol = bitacora::bitacora("Modificación exitosa de un rol", "El usuario modificó el rol con la siguiente información:<br> 
        Nombre del rol: <b>$nombre</b><br>
        Estado: <b>".$permisos['estado']."</b> <br><br>
        $text_mensaje_original
        $text_mensaje_actuales
        ");

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
$id_rol = modeloPrincipal::limpiar_cadena($_POST["id_rol"]);
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



