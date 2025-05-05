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

    // funcion para obtener el id del rol de un usuario

    public static function obtener_id_rol_usuario(){
        $id_usuario = $_SESSION["id_usuario"]; // se recibe el id del usuario que inició sesión
        $id_rol = modeloPrincipal::consultar("SELECT id_rol FROM usuario WHERE id_usuario = $id_usuario");

        if (!$id_rol) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se encontró el rol del usuario, por favor verifique e intente nuevamente","error");
        }
        
        $id_rol = mysqli_fetch_array($id_rol);
        return $id_rol['id_rol'];
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

    
    public static function obtener_permisos_originales_de_rol($id_rol, $type_info) {
        
        // se consulta la bd para obtener los accesos absolutos del rol al los módulos
        $permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));
        
        $datos_originales = rol_model::texto_permisos_vista($permisos);
        try {
            // módulo de inventario
            $modulo_proveedor = self::obtener_texto_de_acceso_modulos($permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'], 4);
            $modulo_producto = self::obtener_texto_de_acceso_modulos($permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'], 6);
            // módulo de venta
            $modulo_venta = self::obtener_texto_de_acceso_modulos($permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'],56);
            // módulo de menu
            $modulo_menu = self::obtener_texto_de_acceso_modulos($permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'],3);
            // módulo de usuario
            $modulo_cliente = self::obtener_texto_de_acceso_modulos($permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'],5);
            $modulo_empleado = self::obtener_texto_de_acceso_modulos($permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'],3);
            $modulo_rol = self::obtener_texto_de_acceso_modulos($permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'],3);
            // módulo de configuración
            $modulo_ajustes = self::obtener_texto_de_acceso_modulos($permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'], 6);


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
                alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al consultar los permisos de acceso al módulo de empleados $modulo_cliente .", "error");
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

        } catch (Exception $e) {
            alert_model::alerta_simple("¡Ocurrio un error","no se pudo obtener los permisos del acceso a las pantallas","error");
            exit();
        }

        return "************* Información $type_info: ************* <br><br>
        ****** Módulo Proveedores   ******<br>
        Acceso al módulo de Proveedores: $modulo_proveedor<br>
        Registrar Nuevos Proveedores: ".$datos_originales['r_proveedores']." <br>
        Modificar Información de Proveedores: ".$datos_originales['m_proveedores']." <br>
        Consultar Lista de Proveedores Registrados: ".$datos_originales['l_proveedores']." <br>
        Visualizar Historial de Compras: ".$datos_originales['h_proveedores']." <br><br>

        ****** Módulo Productos     ******<br>
        Acceso al módulo de Productos: $modulo_producto <br>
        Registrar Nuevas Categorías: ".$datos_originales['r_categoria']." <br>
        Registrar Nuevas Presentaciones: ".$datos_originales['r_presentacion']." <br>
        Registrar Nuevos Productos: ".$datos_originales['r_productos']." <br>
        Consultar Lista de Productos Registrados: ".$datos_originales['l_productos']." <br>
        Registrar Entrada de Productos: ".$datos_originales['r_entrada']." <br>
        Consultar Lista de Entradas de Productos: ".$datos_originales['l_entrada']." <br><br>
        
        ****** Módulo Ventas        ******<br>
        Acceso al módulo de Ventas: $modulo_venta <br>
        Generar Nuevas Ventas: ".$datos_originales['g_venta']." <br>
        Consultar Lista de Ventas Realizadas: ".$datos_originales['l_venta']." <br>
        Visualizar Detalles de Ventas: ".$datos_originales['d_venta']." <br>
        Acceder a Facturas de Ventas: ".$datos_originales['f_venta']." <br>
        Consultar Estadísticas de Ventas: ".$datos_originales['est_venta']." <br><br>

        ****** Módulo Menú          ******<br>
        Acceso al módulo de Servicios: $modulo_menu <br>
        Registrar Nuevos Servicios: ".$datos_originales['r_servicio']." <br>
        Modificar Información de Servicios: ".$datos_originales['l_servicio']." <br>
        Consultar Lista de Servicios Registrados: ".$datos_originales['m_servicio']." <br><br>

        ****** Módulo Clientes      ******<br>
        Acceso al módulo de Clientes: $modulo_cliente <br>
        Registrar Nuevos Client: ".$datos_originales['r_cliente']." <br>
        Modificar Información de Clientes: ".$datos_originales['m_cliente']." <br>
        Consultar Lista de Clientes Reg: ".$datos_originales['l_cliente']." <br>
        Visualizar Historial de Client: ".$datos_originales['h_cliente']." <br>
        Acceder a Facturas de Clientes: ".$datos_originales['f_cliente']." <br><br>

        ****** Módulo Empleados          ******<br>
        Acceso al módulo de Empleados: $modulo_empleado <br>
        Registrar Nuevos Empleados: ".$datos_originales['r_empleado']." <br>
        Modificar Información de Empleados: ".$datos_originales['m_empleado']." <br>
        Consultar Lista de Empleados Registrados: ".$datos_originales['l_empleado']." <br><br>

        ****** Módulo Roles  ******<br>
        Acceso al módulo de Roles: $modulo_rol <br>
        Registrar Nuevos Roles: ".$datos_originales['r_rol']." <br>
        Modificar Información de Roles: ".$datos_originales['m_rol']." <br>
        Consultar Lista de Roles Registrados: ".$datos_originales['l_rol']." <br>

        ****** Módulo Configución del sistema  ******<br>
        Acceso al módulo los Ajustes del Sistema: $modulo_ajustes <br>
        Modificar Cantidad de Preguntas de Seguridad: ".$datos_originales['m_cant_pregunta_seguridad']." <br>
        Modificar Tiempo de Inactividad de Sesión: ".$datos_originales['m_tiempo_sesion']." <br>
        Modificar Cantidad de Caracteres Permitidos: ".$datos_originales['m_cant_caracteres']." <br>
        Modificar Cantidad de Símbolos Permitidos: ".$datos_originales['m_cant_simbolos']." <br>
        Modificar Cantidad de Números Permitidos: ".$datos_originales['m_cant_num']." <br>
        Modificar Intentos de Inicio de Sesión: ".$datos_originales['intentos_inicio_sesion']." <br><br>

        ****** Módulo Bitátora      ******<br>
        Acceso al módulo la Bitácora: ".self::obtener_texto_de_acceso_modulos($permisos['v_bitacora'], 1)." <br>
        Consultar Registros de la Bitácora: ".$datos_originales['v_bitacora']." <br><br><br>
        ";
    }

    public static function obtener_permisos_actuales_de_rol($id_rol, $type_info) {
        $text_mensaje_actual = '';
        
        
        $permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));
        
        $datos_originales = self::texto_permisos_vista($permisos);
        
        // módulo de inventario
        $modulo_proveedor = $permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'];
        $modulo_producto = $permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'];
        // módulo de venta
        $modulo_venta = $permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'];
        // módulo de menu
        $modulo_menu = $permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'];
        // módulo de usuario
        $modulo_cliente = $permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'];
        $modulo_empleado = $permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'];
        $modulo_rol = $permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'];
        // módulo de configuración
        $modulo_ajustes = $permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'];

        $text_mensaje_actual .= "************* Información actualizada: ************* <br><br>
        ****** Módulo Proveedores   ******<br>
        Acceso al módulo de Proveedores: ".self::obtener_texto_de_acceso_modulos($modulo_proveedor, 4)." <br>
        Registrar Nuevos Proveedores: ".$datos_originales['r_proveedores']." <br>
        Modificar Información de Proveedores: ".$datos_originales['m_proveedores']." <br>
        Consultar Lista de Proveedores Registrados: ".$datos_originales['l_proveedores']." <br>
        Visualizar Historial de Compras: ".$datos_originales['h_proveedores']." <br><br>

        ****** Módulo Productos     ******<br>
        Acceso al módulo de Productos: ".self::obtener_texto_de_acceso_modulos($modulo_producto, 6)." <br>
        Registrar Nuevas Categorías: ".$datos_originales['r_categoria']." <br>
        Registrar Nuevas Presentaciones: ".$datos_originales['r_presentacion']." <br>
        Registrar Nuevos Productos: ".$datos_originales['r_productos']." <br>
        Consultar Lista de Productos Registrados: ".$datos_originales['l_productos']." <br>
        Registrar Entrada de Productos: ".$datos_originales['r_entrada']." <br>
        Consultar Lista de Entradas de Productos: ".$datos_originales['l_entrada']." <br><br>
        
        ****** Módulo Ventas        ******<br>
        Acceso al módulo de Ventas: ".self::obtener_texto_de_acceso_modulos($modulo_venta, 5)." <br>
        Generar Nuevas Ventas: ".$datos_originales['g_venta']." <br>
        Consultar Lista de Ventas Realizadas: ".$datos_originales['l_venta']." <br>
        Visualizar Detalles de Ventas: ".$datos_originales['d_venta']." <br>
        Acceder a Facturas de Ventas: ".$datos_originales['f_venta']." <br>
        Consultar Estadísticas de Ventas: ".$datos_originales['est_venta']." <br><br>

        ****** Módulo Menú          ******<br>
        Acceso al módulo de Servicios: ".self::obtener_texto_de_acceso_modulos($modulo_menu, 3)." <br>
        Registrar Nuevos Servicios: ".$datos_originales['r_servicio']." <br>
        Modificar Información de Servicios: ".$datos_originales['l_servicio']." <br>
        Consultar Lista de Servicios Registrados: ".$datos_originales['m_servicio']." <br><br>

        ****** Módulo Clientes      ******<br>
        Acceso al módulo de Clientes: ".self::obtener_texto_de_acceso_modulos($modulo_cliente, 3)." <br>
        Registrar Nuevos Client: ".$datos_originales['r_cliente']." <br>
        Modificar Información de Clientes: ".$datos_originales['m_cliente']." <br>
        Consultar Lista de Clientes Reg: ".$datos_originales['l_cliente']." <br>
        Visualizar Historial de Client: ".$datos_originales['h_cliente']." <br>
        Acceder a Facturas de Clientes: ".$datos_originales['f_cliente']." <br><br>

        ****** Módulo Empleados          ******<br>
        Acceso al módulo de Empleados: ".self::obtener_texto_de_acceso_modulos($modulo_empleado, 3)." <br>
        Registrar Nuevos Empleados: ".$datos_originales['r_empleado']." <br>
        Modificar Información de Empleados: ".$datos_originales['m_empleado']." <br>
        Consultar Lista de Empleados Registrados: ".$datos_originales['l_empleado']." <br><br>

        ****** Módulo Roles  ******<br>
        Acceso al módulo de Roles: ".self::obtener_texto_de_acceso_modulos($modulo_rol, 3)." <br>
        Registrar Nuevos Roles: ".$datos_originales['r_rol']." <br>
        Modificar Información de Roles: ".$datos_originales['m_rol']." <br>
        Consultar Lista de Roles Registrados: ".$datos_originales['l_rol']." <br>

        ****** Módulo Configución del sistema  ******<br>
        Acceso al módulo los Ajustes del Sistema: ".self::obtener_texto_de_acceso_modulos($modulo_ajustes, 6)." <br>
        Modificar Cantidad de Preguntas de Seguridad: ".$datos_originales['m_cant_pregunta_seguridad']." <br>
        Modificar Tiempo de Inactividad de Sesión: ".$datos_originales['m_tiempo_sesion']." <br>
        Modificar Cantidad de Caracteres Permitidos: ".$datos_originales['m_cant_caracteres']." <br>
        Modificar Cantidad de Símbolos Permitidos: ".$datos_originales['m_cant_simbolos']." <br>
        Modificar Cantidad de Números Permitidos: ".$datos_originales['m_cant_num']." <br>
        Modificar Intentos de Inicio de Sesión: ".$datos_originales['intentos_inicio_sesion']." <br><br>

        ****** Módulo Bitátora      ******<br>
        Acceso al módulo la Bitácora: ".self::obtener_texto_de_acceso_modulos($permisos['v_bitacora'], 1)." <br>
        Consultar Registros de la Bitácora: ".$datos_originales['v_bitacora']."";


        return $text_mensaje_actual;

    }
    
}