<?php 

require_once __DIR__ . '/modelo_usuario.php'; // se incluye el modelo principal
require_once __DIR__ . '/alert_model.php'; // se incluye el modelo principal
error_reporting(E_PARSE);

class rol_model extends model_user {
    
    /**********************************************************************************/
    /*************** funciones para verificar permisos de roles de usuario ************/
    /**********************************************************************************/
    // funcion para verificar los permisos de un rol

    public static function verificar_rol($vista){

        $id_rol = self::obtener_id_rol_usuario();
        
        $permiso_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT $vista FROM rol WHERE id_rol = $id_rol"));
        $permiso_rol = $permiso_rol[$vista];
        return $permiso_rol;
    }


    // funcion para verificar los premisos de un modulo del  sistema
    public static function permisos_modulos($vista){
        $id_rol = self::obtener_id_rol_usuario();
        
        $permiso_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT SUM($vista) AS permiso_vista FROM rol WHERE id_rol = $id_rol"));
        $permiso_rol = $permiso_rol['permiso_vista'];
        return $permiso_rol;
    }



    public static function obtenerPermisoRol ($codeRol){
        $id_rol_usuario = self::obtener_id_rol_usuario();
        
        $permiso_rol = modeloPrincipal::consultar("SELECT 1 
            FROM funciones_rol RF 
            JOIN funcion F ON RF.id_funcion = F.id 
            WHERE RF.id_rol = '$id_rol_usuario' AND F.codigo = '$codeRol'");

        $permiso_rol = mysqli_num_rows($permiso_rol) > 0 ? true : false;
        return $permiso_rol;

    }
    

    public static function obtenerSumaPermisoRol ($codeRol){
        $num = null;
        foreach ($codeRol as $key) {
            $num += self::obtenerPermisoRol($key);
        }
        return $num;

    }
    // funcion para obtener el id del rol de un usuario

    public static function obtener_id_rol_usuario(){
        $id_usuario = $_SESSION["id_usuario"]; // se recibe el id del usuario que inició sesión
        $id_rol = modeloPrincipal::consultar("SELECT id_rol FROM usuario WHERE id_usuario = $id_usuario");

        if (!$id_rol) {
            alert_model::alerta_simple(
                "¡Ocurrió un error inesperado!",
                "No se encontró el rol del usuario, por favor verifique e intente nuevamente",
                "error");
        }
        
        $id_rol = mysqli_fetch_array($id_rol)['id_rol'];;
        return $id_rol;
    }

    // funcion para obtener el id del rol de un usuario

    public static function obtener_nombre_rol_usuario($id_rol){
        $nombre_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT nombre FROM rol WHERE id_rol = $id_rol"));
        return $nombre_rol['nombre'];
    }

    // funcion para validar si se esta recibiendo datos por post
    public static function validar_post_roles($post) {

        if (!isset($_POST["$post"]) || $_POST["$post"] == ""){
            return $post = 0;
        }

        if ($_POST["$post"] == '1') {
            return $post = 1;
        }else{
            return alert_model::alerta_condicional("Atención!","Algún datos de los permisos de los roles fue alterado{ ".$_POST["$post"]." }de manera incorrecta y no coinciden con las que están registradas en el sistema. Se cerrará tu sesión por motivos de seguridad.","error","window.location = '../controlador/salir.php';");
        }
    }

    public static function registrar ($nombre, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $m_categoria, $l_categoria, $r_presentacion, $m_presentacion, $l_presentacion, $r_marca, $m_marca, $l_marca, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $l_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $l_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, $m_bitacora) {

        $registrar = modeloPrincipal::InsertSQL("rol", "nombre, r_proveedores, m_proveedores, l_proveedores, h_proveedores, r_categoria, m_categoria, l_categoria, r_presentacion, m_presentacion, l_presentacion, r_productos, r_marca, m_marca, l_marca, l_productos, r_entrada, l_entrada, g_venta, d_venta, l_venta, f_venta, est_venta, r_servicio, m_servicio, l_servicio, r_cliente, m_cliente, l_cliente, h_cliente, f_cliente, r_empleado, m_empleado, l_empleado, r_rol, m_rol, l_rol, m_cant_pregunta_seguridad, m_tiempo_sesion, m_cant_caracteres, m_cant_simbolos, m_cant_num, intentos_inicio_sesion, v_bitacora, m_bitacora, estado", "'$nombre', $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $m_categoria, $l_categoria, $r_presentacion, $m_presentacion, $l_presentacion, $r_marca, $m_marca, $l_marca, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $l_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $l_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, $m_bitacora, 1");

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el rol debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;
    }


    // funcion para validar si se esta recibiendo datos por post
    public static function texto_permisos_vista($permisos) {
        $texto_permisos = [];

        foreach ($permisos as $key => $value) {
            $texto_permisos[$key] = ($value == 1) ? 'Permitido' : 'Denegado';
        }
    
        return $texto_permisos;
    }

    public static function obtener_texto_de_acceso_modulos($permisosVista, $limitePermisos) {
        if ($permisosVista == 0) {
            return 'Sin Acceso';
        } elseif ($permisosVista > 0 && $permisosVista < $limitePermisos) {
            return 'Acceso Parcial';
        } elseif ($permisosVista == $limitePermisos) {
            return 'Acceso Total';
        } else {
            return ''; // Icono por defecto si no coincide con ningún caso
        }
    }

    
    public static function generar_mensaje_bitacora_de_rol($id_rol, $type_info) {
        
        // se consulta la bd para obtener los accesos absolutos del rol al los módulos
        $permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));
        
        $datos_originales = rol_model::texto_permisos_vista($permisos);
        
        try {
            // módulo de inventario
            $modulo_proveedor = self::obtener_texto_de_acceso_modulos($permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'], 4);
            $modulo_producto = self::obtener_texto_de_acceso_modulos($permisos['r_categoria'] + $permisos['m_categoria'] + $permisos['l_categoria'] + $permisos['r_presentacion'] + $permisos['m_presentacion'] + $permisos['l_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'], 10);
            // módulo de venta
            $modulo_venta = self::obtener_texto_de_acceso_modulos($permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'],5);
            // módulo de menu
            $modulo_menu = self::obtener_texto_de_acceso_modulos($permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'],3);
            // módulo de usuario
            $modulo_cliente = self::obtener_texto_de_acceso_modulos($permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'],5);
            $modulo_empleado = self::obtener_texto_de_acceso_modulos($permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'],3);
            $modulo_rol = self::obtener_texto_de_acceso_modulos($permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'],3);
            // módulo de configuración
            $modulo_ajustes = self::obtener_texto_de_acceso_modulos($permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'], 6);
            $modulo_bitacora = self::obtener_texto_de_acceso_modulos($permisos['v_bitacora'] + $permisos['m_bitacora'], 2);

            if (!$modulo_proveedor) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de proveedores.", "error");
                exit();
            }
            if (!$modulo_producto) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de productos.", "error");
                exit();
            }
            if (!$modulo_venta) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de venta.", "error");
                exit();
            }
            if (!$modulo_menu) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de servicios.", "error");
                exit();
            }

            if (!$modulo_cliente) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de clientes.", "error");
                exit();
            }
            if (!$modulo_empleado) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de empleados.", "error");
                exit();
            }
            if (!$modulo_rol) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de roles.", "error");
                exit();
            }
            if (!$modulo_ajustes) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de ajustes del sistema.", "error");
                exit();
            }
            if (!$modulo_bitacora) {
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de ajustes del sistema.", "error");
                exit();
            }

        } catch (Exception $e) {
            alert_model::alerta_simple("¡Ocurrio un error","no se pudo obtener los permisos del acceso a las pantallas","error");
            exit();
        }

        return "<b>************* Información $type_info: ************* </b><br><br>
        <b>****** Módulo Proveedores   ******</b><br>
        Acceso al módulo de Proveedores: <b>$modulo_proveedor</b><br>
        Registrar Nuevos Proveedores: <b>".$datos_originales['r_proveedores']."</b> <br>
        Modificar Información de Proveedores: <b>".$datos_originales['m_proveedores']."</b> <br>
        Consultar Lista de Proveedores Registrados: <b>".$datos_originales['l_proveedores']."</b> <br>
        Visualizar Historial de Compras: <b>".$datos_originales['h_proveedores']."</b> <br><br>

        <b>****** Módulo Productos     ******</b><br>
        Acceso al módulo de Productos: <b>$modulo_producto</b> <br> <br>

        Registrar Nuevas Categorías: <b>".$datos_originales['r_categoria']." </b><br>
        Modificar Información de Categorías: <b>".$datos_originales['m_categoria']."</b> <br>
        Consultar Lista de Categorías Registradas: <b>".$datos_originales['l_categoria']." </b><br> <br>

        Registrar Nuevas Presentaciones: <b>".$datos_originales['r_presentacion']." </b><br>
        Modificar Información de Presentaciones: <b>".$datos_originales['m_presentacion']."</b> <br>
        Consultar Lista de Presentaciones Registradas: <b>".$datos_originales['l_presentacion']." </b><br> <br>

        Registrar Nuevos Productos: <b>".$datos_originales['r_productos']." </b><br>
        Consultar Lista de Productos Registrados: <b>".$datos_originales['l_productos']." </b><br> <br>

        Registrar Entrada de Productos: <b>".$datos_originales['r_entrada']." </b><br>
        Consultar Lista de Entradas de Productos: <b>".$datos_originales['l_entrada']." </b><br><br>
        
        <b>****** Módulo Ventas        ******</b><br>
        Acceso al módulo de Ventas:  <b>$modulo_venta </b> <br>
        Generar Nuevas Ventas: <b>".$datos_originales['g_venta']." </b><br>
        Consultar Lista de Ventas Realizadas: <b>".$datos_originales['l_venta']." </b><br>
        Visualizar Detalles de Ventas: <b>".$datos_originales['d_venta']." </b><br>
        Acceder a Facturas de Ventas: <b>".$datos_originales['f_venta']." </b><br>
        Consultar Estadísticas de Ventas: <b>".$datos_originales['est_venta']." </b><br><br>

        <b>****** Módulo Menú          ******</b><br>
        Acceso al módulo de Servicios:  <b>$modulo_menu </b><br>
        Registrar Nuevos Servicios: <b>".$datos_originales['r_servicio']." </b><br>
        Modificar Información de Servicios: <b>".$datos_originales['l_servicio']." </b><br>
        Consultar Lista de Servicios Registrados: <b>".$datos_originales['m_servicio']." </b><br><br>

        <b>****** Módulo Clientes      ******</b><br>
        Acceso al módulo de Clientes:  <b>$modulo_cliente</b><br>
        Registrar Nuevos Clientes: <b>".$datos_originales['r_cliente']." </b><br>
        Modificar Información de Clientes: <b>".$datos_originales['m_cliente']." </b><br>
        Consultar Lista de Clientes Regitrados: <b>".$datos_originales['l_cliente']." </b><br>
        Visualizar Historial de Clientes: <b>".$datos_originales['h_cliente']." </b><br>
        Acceder a Facturas de Clientes: <b>".$datos_originales['f_cliente']." </b><br><br>

        <b>****** Módulo Empleados          ******</b><br>
        Acceso al módulo de Empleados:  <b>$modulo_empleado</b><br>
        Registrar Nuevos Empleados: <b>".$datos_originales['r_empleado']." </b><br>
        Modificar Información de Empleados: <b>".$datos_originales['m_empleado']." </b><br>
        Consultar Lista de Empleados Registrados: <b>".$datos_originales['l_empleado']." </b><br><br>

        <b>****** Módulo Roles  ******</b><br>
        Acceso al módulo de Roles:  <b>$modulo_rol</b><br>
        Registrar Nuevos Roles: <b>".$datos_originales['r_rol']." </b><br>
        Modificar Información de Roles: <b>".$datos_originales['m_rol']." </b><br>
        Consultar Lista de Roles Registrados: <b>".$datos_originales['l_rol']." </b> <br><br>

        <b>****** Módulo Configuración del sistema  ******</b><br>
        Acceso al módulo los Ajustes del Sistema:  <b>$modulo_ajustes</b><br>
        Modificar Cantidad de Preguntas de Seguridad: <b>".$datos_originales['m_cant_pregunta_seguridad']." </b><br>
        Modificar Tiempo de Inactividad de Sesión: <b>".$datos_originales['m_tiempo_sesion']." </b><br>
        Modificar Cantidad de Caracteres Permitidos: <b>".$datos_originales['m_cant_caracteres']." </b><br>
        Modificar Cantidad de Símbolos Permitidos: <b>".$datos_originales['m_cant_simbolos']." </b><br>
        Modificar Cantidad de Números Permitidos: <b>".$datos_originales['m_cant_num']." </b><br>
        Modificar Intentos de Inicio de Sesión: <b>".$datos_originales['intentos_inicio_sesion']." </b><br><br>

        <b>****** Módulo Bitácora      ******</b><br>
        Acceso al módulo la Bitácora: <b>$modulo_bitacora</b><br>
        Consultar Registros de la Bitácora: <b>".$datos_originales['v_bitacora']." </b><br>
        Consultar Movimientos de un Usuario en la Bitácora: <b>".$datos_originales['m_bitacora']." </b><br><br><br>
        ";
    }

    public static function option() {
        
        $permisos = modeloPrincipal::consultar("SELECT id_rol, nombre FROM rol WHERE estado = 1 AND id_rol != 1");
        // $permisos = rol_model::texto_permisos_vista($permisos);

        foreach ($permisos as $key ) {
            echo '<option value="'.modeloPrincipal::encryptionId($key['id_rol']).'">'.$key['nombre'].'</option>';
        }
    }

    Public static function registrar_permisos_rol ($id_rol, $id_funcion, $fecha_asignacion) {

        $registrar = modeloPrincipal::InsertSQL("funciones_rol", "id_rol, id_funcion, fecha_asignacion", "$id_rol, $id_funcion, '$fecha_asignacion'");

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el rol debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;

    }
    
    Public static function modificar_permisos_rol ($id, $id_rol, $id_funcion, $fecha_asignacion) {

        $actualizar = modeloPrincipal::UpdateSQL("funciones_rol", "id_rol = $id_rol, id_funcion = $id_funcion, fecha_asignacion = '$fecha_asignacion'", "id = '$id'");

        if (!$actualizar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el rol debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $actualizar;

    }
}