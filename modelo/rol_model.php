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



    public static function obtenerPermisosRol (){

        $id_rol_usuario = self::obtener_id_rol_usuario();

        $resultado_consulta = modeloPrincipal::consultar("SELECT F.codigo
            FROM funciones_rol AS RF  
            JOIN funcion AS F ON RF.id_funcion = F.id 
            WHERE RF.id_rol = '$id_rol_usuario'");

        // 2. Inicializar el array de permisos
        $permisos_usuario = [];

        // 3. Iterar sobre todos los resultados y construir el array de claves
        while ($fila = mysqli_fetch_assoc($resultado_consulta)) {
            // Usa el código de la función (ej: 'l_categoria') como clave y asigna true.
            $permisos_usuario["".$fila['codigo'].""] = 1; 
        }

        return $permisos_usuario;
    }



    public static function obtenerPermisosRolById ($id){

        $cantidadTotalFunciones = modeloPrincipal::consultar("SELECT codigo FROM funcion ORDER BY id");

        $resultado_consulta = modeloPrincipal::consultar("SELECT F.codigo
            FROM funciones_rol AS RF  
            JOIN funcion AS F ON RF.id_funcion = F.id 
            WHERE RF.id_rol = '$id' ORDER BY RF.id");
        
        // 2. Inicializar el array de permisos
        $permisos_usuario = [];

        // Crear un array con los permisos que SÍ tiene el rol
        $permisos_activos = [];

        while ($fila = mysqli_fetch_assoc($resultado_consulta)) {
            $permisos_activos[] = $fila['codigo'];
        }

        // 3. Iterar sobre todos los resultados y construir el array de claves
        while ($fila = mysqli_fetch_assoc($cantidadTotalFunciones)) {
            $codigo_funcion = $fila['codigo'];
            // Si el permiso está en la lista de activos, se marca como 1, si no, como 0.
            if (in_array($codigo_funcion, $permisos_activos)) {
                $permisos_usuario[$codigo_funcion] = 1;
            } else {
                $permisos_usuario[$codigo_funcion] = 0;
            }
        }

        return $permisos_usuario;
    }


    
    public static function sumaPermisoRol ($claves_a_verificar, $clavesPermisosRoles){
        $permisos_encontrados = [];

        foreach ($claves_a_verificar as $clave) {
            // Verifica si la clave existe en los permisos del rol y si su valor es 1 (permitido)
            if (isset($clavesPermisosRoles[$clave]) && $clavesPermisosRoles[$clave] == 1) {
                $permisos_encontrados[$clave] = 1;
            } else {
                $permisos_encontrados[$clave] = 0;
            }
        }
        return $permisos_encontrados;
    }


    
    /**
     * Busca y cuenta las coincidencias de los códigos de permiso solicitados 
     * dentro del array de permisos del rol almacenado en la sesión.
     * * @param array $codeRol Array de códigos de permisos a buscar (ej: ['r_proveedores', 'm_productos']).
     * @return int El número total de coincidencias encontradas.
     */
    public static function obtenerSumaPermisoRol ($codeRol){
        
        // 1. Verificar si la variable de sesión existe y es un array
        if (!isset($_SESSION['permisosRol']) || !is_array($_SESSION['permisosRol'])) {
            // No hay permisos en la sesión, por lo que no hay coincidencias.
            return 0;
        }

        // 2. Obtener el array de permisos del rol desde la sesión
        // Los códigos de permiso del rol se asumen como 'values' en el array.
        // Si los códigos de permiso son las claves (keys) del array:
        $permisos_rol_keys = array_keys($_SESSION['permisosRol']);
        
        // 3. Crear un contador para las coincidencias
        $contador_coincidencias = 0;
        

        // 4. Iterar sobre los códigos de permiso que se están solicitando ($codeRol)
        // y verificar si cada uno existe en el array de permisos de la sesión.

        foreach ($codeRol as $codigo_solicitado) {
            if (in_array($codigo_solicitado, $permisos_rol_keys)) {
                $contador_coincidencias++;
            }
        }
        // 5. Retornar el número total de permisos encontrados
        // Si se buscaron 3 permisos y el rol tiene 2 de ellos, retorna 2.
        return $contador_coincidencias;
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
            return $post = "";
        }

        if ($_POST["$post"] == '1') {
            return $post = 1;
        }else{
            return alert_model::alerta_condicional("Atención!","Algún datos de los permisos de los roles fue alterado{ ".$_POST["$post"]." }de manera incorrecta y no coinciden con las que están registradas en el sistema. Se cerrará tu sesión por motivos de seguridad.","error","window.location = '../controlador/salir.php';");
        }
    }

    /**
     * Registra un nuevo rol y sus permisos asociados.
     * Recibe el nombre del rol y una lista variable de permisos encriptados.
     * Solo los permisos con un valor (ID encriptado) serán guardados.
     */
    public static function guardar_permisos_rol($nombre, ...$permisos_encriptados) {
        
        $registrar = modeloPrincipal::InsertSQL("rol", "nombre, estado", "'$nombre', 1");

        if (!$registrar) {
            alert_model::alerta_simple(
                "¡Ocurrió un error inesperado!",
                "No se pudo registrar el rol debido a un error interno, por favor verifique los datos e intente nuevamente",
                "error");
        }

        $id_rol_recien_registrado = self::consultar_id_rol_recien_registrado();

        foreach ($permisos_encriptados as $permiso_encriptado) {
            // Solo procesamos los permisos que no están vacíos
            if (!empty($permiso_encriptado)) {

                $id_funcion = modeloPrincipal::decryptionId($permiso_encriptado);
                
                if (is_numeric($id_funcion) && $id_funcion > 0) {
                    $registrar_permiso = modeloPrincipal::InsertSQL(
                        "funciones_rol", 
                        "id_rol, id_funcion, fecha_asignacion", 
                        "$id_rol_recien_registrado, $id_funcion, NOW()"
                    );
                    
        
                    if (!$registrar_permiso) {
                        alert_model::alerta_simple(
                            "¡Ocurrió un error inesperado!",
                            "No se pudo registrar el permiso con ID: $id_funcion para el rol. Por favor, intente nuevamente.",
                            "error");
                        return false; // Detenemos la ejecución si un permiso falla
                    }
                }
            }

        }
        // Todos los permisos se registraron correctamente
        return true; 
    }

    /**
     * Modifica un rol y sus permisos.
     * Borra los permisos anteriores y guarda los nuevos.
     */
    public static function modificar_permisos_rol($id_rol, $nombre, $estado, $permisos_nuevos_encriptados) {
        // 1. Actualizar el nombre y estado del rol
        $actualizar_rol = modeloPrincipal::UpdateSQL("rol", "nombre = '$nombre', estado = '$estado'", "id_rol = $id_rol");

        if (!$actualizar_rol) {
            // Manejar error si no se puede actualizar el rol
            return false;
        }

        // 2. Borrar todos los permisos antiguos de ese rol
        modeloPrincipal::DeleteSQL("funciones_rol", "id_rol = $id_rol");

        // 3. Insertar los nuevos permisos
        foreach ($permisos_nuevos_encriptados as $permiso_encriptado) {
            if (!empty($permiso_encriptado)) {
                // El valor del checkbox es el ID de la función, no necesita desencriptación aquí.
                // Asumimos que el valor es el ID directo.
                $id_funcion = modeloPrincipal::limpiar_cadena($permiso_encriptado);
                
                if (is_numeric($id_funcion) && $id_funcion > 0) {
                    $registrar_permiso = modeloPrincipal::InsertSQL(
                        "funciones_rol", 
                        "id_rol, id_funcion, fecha_asignacion", 
                        "$id_rol, $id_funcion, NOW()"
                    );
                    
                    if (!$registrar_permiso) {
                        // Si falla la inserción de un permiso, es mejor detenerse.
                        return false; 
                    }
                }
            }
        }

        // Si todo fue bien
        return true;
    }


    public static function registrar_rol ($nombre) {

        $registrar = modeloPrincipal::InsertSQL("rol", "nombre, estado", "'$nombre', 1");

        if (!$registrar) {
            alert_model::alerta_simple(
                "¡Ocurrió un error inesperado!",
                "No se pudo registrar el rol debido a un error interno, por favor verifique e intente nuevamente",
                "error");
        }
        return $registrar;
    }

    public static function consultar_id_rol_recien_registrado () {
        $id = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_rol) as id FROM rol"))['id'];
        return $id;
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

    public static function generar_mensaje_de_permisos_por_modulo ($nombreModulos, $permisos) {

        $text_allow = "";

        $colores = [ // No necesitas esto aquí, ya que el color se aplica en la llamada
            "Permitido" => "success",
            "Denegado" => "danger"
        ];

        for ($i = 0; $i < count($nombreModulos); $i++) { 
            $text_allow .= '
                <li class="border-bottom mb-1 row justify-content-center mx-0">
                    <div class="col-6 text-start">
                        <label>'.$nombreModulos[$i].'</label>
                    </div>
    
                    <div class="col-6 text-end text-wrap-balance">
                        <span class="text-'.$colores[$permisos[$i]].'">'.$permisos[$i].' </span>
                    </div>
                </li>
            ';
        }

        return $text_allow;
    }

    
    public static function generar_bitacora ($permisos_originales) {

        // Módulo Proveedores
        $moduloProveedores = "";
        if ($permisos_originales["r_proveedores"] == 'Permitido' || $permisos_originales["m_proveedores"] == 'Permitido' || $permisos_originales["l_proveedores"] == 'Permitido' || $permisos_originales["h_proveedores"] == 'Permitido') {
            $permisos = [$permisos_originales["r_proveedores"], $permisos_originales["m_proveedores"], $permisos_originales["l_proveedores"], $permisos_originales["h_proveedores"]];
            $proveedores = self::generar_mensaje_de_permisos_por_modulo(["Registrar","Modificar Información","Consultar Lista", "Ver Historial"], $permisos);
            $moduloProveedores .= '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Proveedores</p><ul class="list-group list-group-flush list-unstyled">'.$proveedores.'</ul></div>';
        }

        // permisos del modulo productos para bitacora
        // permisos del modulo categoria
                
        $moduloProductosInicio = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Productos</p><ul class="list-group list-group-flush list-unstyled">';
        $datoProductos = false;
        $moduloProductosFin = ' </ul> </div>';


        if ($permisos_originales["r_categoria"] == 'Permitido' || $permisos_originales["m_categoria"] == 'Permitido' || $permisos_originales["l_categoria"] == 'Permitido') {

            $permisos = [ $permisos_originales["r_categoria"] ?? "", $permisos_originales["m_categoria"] ?? "", $permisos_originales["l_categoria"] ?? ""];

            $permisosModulo = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '<li class="fw-bold bg-light text-start"><i class="bi bi-folder-fill me-2 text-secondary"></i> Categorías: </li> <ul class="list-group list-group-flush"> '.$permisosModulo.'</ul>';
            
            $datoProductos = true;
        }
        
        // modulo de presentaciones

        if ($permisos_originales["r_presentacion"] == 'Permitido' || $permisos_originales["m_presentacion"] == 'Permitido' || $permisos_originales["l_presentacion"] == 'Permitido') {

            $permisos = [$permisos_originales["r_presentacion"] ?? "", $permisos_originales["m_presentacion"] ?? "", $permisos_originales["l_presentacion"] ?? ""];

            $permisosModulo = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '<li class="fw-bold bg-light text-start"><i class="bi bi-box-fill me-2 text-secondary"></i> Presentaciones:</li> <ul class="list-group list-group-flush"> '.$permisosModulo.'</ul>';

            $datoProductos = true;
        }
        
        // modulo de marca

        if ($permisos_originales["r_marca"] == 'Permitido' || $permisos_originales["m_marca"] == 'Permitido' || $permisos_originales["l_marca"] == 'Permitido') {

            $permisos = [$permisos_originales["r_marca"] ?? "", $permisos_originales["m_marca"] ?? "", $permisos_originales["l_marca"] ?? ""];

            $marcas = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '<li class="fw-bold bg-light text-start"> <i class="bi bi-tags-fill me-2 text-secondary"></i> Marcas: </li> <ul class="list-group list-group-flush">'.$marcas.' </ul>';
            
            $datoProductos = true;
        }
        
        // modulo de productos

        if ($permisos_originales["r_productos"] == 'Permitido' || $permisos_originales["l_productos"] == 'Permitido') {

            $permisos = [ $permisos_originales["r_productos"] ?? "", $permisos_originales["l_productos"] ?? ""];

            $productos = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '<li class="fw-bold bg-light text-start"> <i class="bi bi-bag-fill me-2 text-secondary"></i> Gestión de Productos: </li> <ul class="list-group list-group-flush"> '.$productos.' </ul> ';

            $datoProductos = true;
        }
        
        // modulo de entrada

        if ($permisos_originales["r_entrada"] == 'Permitido' || $permisos_originales["l_entrada"] == 'Permitido') {

            $permisos = [$permisos_originales["r_entrada"] ?? "", $permisos_originales["l_entrada"] ?? ""];

            $entradas = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas", "Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '<li class="fw-bold text-start bg-light">  <i class="bi bi-box-arrow-in-right me-2 text-secondary"></i> Entrada de Productos:</li> <ul class="list-group list-group-flush">'.$entradas.' </ul>';

            $datoProductos = true;
        }

        $texto_final = "";

        if ($moduloProveedores !== "" || $datoProductos) {
            
            $texto_final .= '<div class="col-12 text-center mb-3"> <h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-box-seam me-2"></i> Inventario </h4> <div class="row m-0 justify-content-between">';

            if ($moduloProveedores !== "") { $texto_final .= $moduloProveedores; }

            if ($datoProductos) { $texto_final .= $moduloProductosInicio.$moduloProductosFin; }

            $texto_final .= '</div> </div>';
        }
        
        // Módulo Ventas
        $moduloVentas = "";
        if ($permisos_originales["g_venta"] == 'Permitido' || $permisos_originales["d_venta"] == 'Permitido' || $permisos_originales["l_venta"] == 'Permitido' || $permisos_originales["f_venta"] == 'Permitido' || $permisos_originales["est_venta"] == 'Permitido') {
            $permisos = [$permisos_originales["g_venta"], $permisos_originales["l_venta"], $permisos_originales["d_venta"], $permisos_originales["f_venta"], $permisos_originales["est_venta"]];
            $ventas = self::generar_mensaje_de_permisos_por_modulo(["Generar Ventas", "Consultar Lista", "Ver Detalles", "Ver Facturas", "Ver Estadísticas"], $permisos);
            $moduloVentas = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Ventas</p><ul class="list-group list-group-flush list-unstyled">'.$ventas.'</ul></div>';
        }

        // Módulo Servicios
        $moduloServicios = "";
        if ($permisos_originales["r_servicio"] == 'Permitido' || $permisos_originales["m_servicio"] == 'Permitido' || $permisos_originales["l_servicio"] == 'Permitido') {
            $permisos = [$permisos_originales["r_servicio"], $permisos_originales["m_servicio"], $permisos_originales["l_servicio"]];
            $servicios = self::generar_mensaje_de_permisos_por_modulo(["Registrar", "Modificar", "Consultar Lista"], $permisos);
            $moduloServicios = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Servicios</p><ul class="list-group list-group-flush list-unstyled">'.$servicios.'</ul></div>';
        }


        if ($moduloVentas != "" || $moduloServicios != "") {

            $texto_final .= '<div class="col-12 text-center mb-3"><h4 class="d-block mb-3 text-center text-primary">';
            
            if ($moduloVentas != "" && $moduloServicios != "") {
                $texto_final .= '<i class="bi bi-currency-dollar"></i> Ventas | <i class="bi bi-fork-knife"></i> Menú / Servicios</h4> <div class="row m-0 justify-content-between">'.$moduloVentas.$moduloServicios.'</div></div>';
            }

            if ($moduloVentas != "") {
                $texto_final .= '<i class="bi bi-currency-dollar"></i> Ventas </h4> <div class="row m-0 justify-content-between">'.$moduloVentas.'</div></div>';
            }
            
            if ($moduloServicios != "") {
                $texto_final .= '<i class="bi bi-fork-knife"></i> Menú / Servicios </h4> <div class="row m-0 justify-content-between">'.$moduloServicios.'</div></div>';
            }

        }

        // Módulo Clientes
        $moduloClientes = "";
        if ($permisos_originales["r_cliente"] == 'Permitido' || $permisos_originales["m_cliente"] == 'Permitido' || $permisos_originales["l_cliente"] == 'Permitido' || $permisos_originales["h_cliente"] == 'Permitido' || $permisos_originales["f_cliente"] == 'Permitido') {
            $permisos = [$permisos_originales["r_cliente"], $permisos_originales["m_cliente"], $permisos_originales["l_cliente"], $permisos_originales["h_cliente"], $permisos_originales["f_cliente"]];
            $clientes = self::generar_mensaje_de_permisos_por_modulo(["Registrar", "Modificar", "Consultar Lista", "Ver Historial", "Ver Facturas"], $permisos);
            $moduloClientes = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Clientes</p><ul class="list-group list-group-flush list-unstyled">'.$clientes.'</ul></div>';
        }

        // Módulo Empleados
        $moduloEmpleados = "";
        if ($permisos_originales["r_empleado"] == 'Permitido' || $permisos_originales["m_empleado"] == 'Permitido' || $permisos_originales["l_empleado"] == 'Permitido') {
            $permisos = [$permisos_originales["r_empleado"], $permisos_originales["m_empleado"], $permisos_originales["l_empleado"]];
            $empleados = self::generar_mensaje_de_permisos_por_modulo(["Registrar", "Modificar", "Consultar Lista"], $permisos);
            $moduloEmpleados = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Empleados</p><ul class="list-group list-group-flush list-unstyled">'.$empleados.'</ul></div>';
        }

        // Módulo Roles
        $moduloRoles = "";
        if ($permisos_originales["r_rol"] == 'Permitido' || $permisos_originales["m_rol"] == 'Permitido' || $permisos_originales["l_rol"] == 'Permitido') {
            $permisos = [$permisos_originales["r_rol"], $permisos_originales["m_rol"], $permisos_originales["l_rol"]];
            $roles = self::generar_mensaje_de_permisos_por_modulo(["Registrar", "Modificar", "Consultar Lista"], $permisos);
            $moduloRoles = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Módulo de Roles</p><ul class="list-group list-group-flush list-unstyled">'.$roles.'</ul></div>';
        }

        if ($moduloClientes != "" || $moduloEmpleados != "" || $moduloRoles != "") {
            $texto_final .= '<div class="col-12 text-center mb-3"><h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-people-fill"></i> Usuarios</h4><div class="row m-0 justify-content-between">'.$moduloClientes.$moduloEmpleados.$moduloRoles.'</div></div>';
        }

        // Módulo Ajustes
        $moduloAjustes = "";
        if ($permisos_originales["m_cant_pregunta_seguridad"] == 'Permitido' || $permisos_originales["m_tiempo_sesion"] == 'Permitido' || $permisos_originales["m_cant_caracteres"] == 'Permitido' || $permisos_originales["m_cant_simbolos"] == 'Permitido' || $permisos_originales["m_cant_num"] == 'Permitido' || $permisos_originales["intentos_inicio_sesion"] == 'Permitido') {
            $permisos = [$permisos_originales["m_cant_pregunta_seguridad"], $permisos_originales["m_tiempo_sesion"], $permisos_originales["m_cant_caracteres"], $permisos_originales["m_cant_simbolos"], $permisos_originales["m_cant_num"], $permisos_originales["intentos_inicio_sesion"]];
            $ajustes = self::generar_mensaje_de_permisos_por_modulo(["Cant. Preguntas", "Tiempo Sesión", "Cant. Caracteres", "Cant. Símbolos", "Cant. Números", "Intentos Sesión"], $permisos);
            $moduloAjustes = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Ajustes del Sistema</p><ul class="list-group list-group-flush list-unstyled">'.$ajustes.'</ul></div>';
        }

        // Módulo Bitácora
        $moduloBitacora = "";
        if ($permisos_originales["v_bitacora"] == 'Permitido' || $permisos_originales["m_bitacora"] == 'Permitido') {
            $permisos = [$permisos_originales["v_bitacora"], $permisos_originales["m_bitacora"]];
            $bitacora = self::generar_mensaje_de_permisos_por_modulo(["Ver Bitácora", "Modificar Bitácora"], $permisos);
            $moduloBitacora = '<div class="col-12 col-md-6 mb-2"><p class="card-title">Bitácora</p><ul class="list-group list-group-flush list-unstyled">'.$bitacora.'</ul></div>';
        }

        if ($moduloAjustes != "" || $moduloBitacora != "") {
            $texto_final .= '<div class="col-12 text-center mb-3"><h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-gear-fill"></i> Configuración General</h4><div class="row m-0 justify-content-between">'.$moduloAjustes.$moduloBitacora.'</div></div>';
        }

        return $texto_final;
    }




    Public static function registrar_permisos_rol ($id_rol, $id_funcion, $fecha_asignacion) {

        $registrar = modeloPrincipal::InsertSQL("funciones_rol", "id_rol, id_funcion, fecha_asignacion", "$id_rol, $id_funcion, '$fecha_asignacion'");

        if (!$registrar) {
            alert_model::alerta_simple("¡Ocurrió un error inesperado!","No se pudo registrar el rol debido a un error interno o alteracion de la información a registrar, por favor verifique e intente nuevamente","error");
        }
        return $registrar;

    }
    

    
    public static function generar_bitacorsa ($color_text_original, $permisos_originales, $color_text_actual, $permisos_actuales) {


        $texto = '
            <div class="col-12 text-center mb-3">
                <h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-box-seam me-2"></i> Inventario </h4>
                <div class="row m-0 justify-content-between">

                    <div class="col-12 col-md-6 mb-2">
                                </div>
                            </li>
                            <li class="border-bottom mb-1 row justify-content-center">
                                <div class="col-6 text-start">
                                    <label>Modificar Información</label>
                                </div>
                                <div class="col-6 text-end text-wrap-balance">
                                    <b>De:</b><span class="text-success"> Permitido</span>
                                    a <span class="text-danger"> Denegado </span>
                                </div>
                            </li>
                            <li class="border-bottom mb-1 row justify-content-between">
                                <div class="col-6 text-start">
                                    <label>Consultar Lista</label>
                                </div>
                                <div class="col-6 text-end text-wrap-balance">
                                    <b>De:</b><span class="text-success"> Permitido</span>
                                    a <span class="text-danger"> Denegado </span>
                                </div>
                            </li>
                            <li class="border-bottom mb-1 row justify-content-between">
                                <div class="col-6 text-start">
                                    <label>Visualizar Historial de Compras</label>
                                </div>
                                <div class="col-6 text-end text-wrap-balance">
                                    <b>De:</b><span class="text-success"> Permitido</span>
                                    a <span class="text-danger"> Denegado </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <p class="card-title">Módulo de Productos</p>
                        <ul class="list-group list-group-flush list-unstyled">
                            <li class="fw-bold bg-light text-start">
                                <i class="bi bi-folder-fill me-2 text-secondary"></i>
                                Categorías:
                            </li>

                            <ul class="list-group list-group-flush">
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                            </ul>

                            <li class="fw-bold bg-light text-start">
                                <i class="bi bi-box-fill me-2 text-secondary"></i>
                                Presentaciones:
                            </li>
                            <ul class="list-group list-group-flush">

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                            Registrar Nuevas
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Modificar Información
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                            </ul>

                            
                            <li class="fw-bold bg-light text-start">
                                <i class="bi bi-tags-fill me-2 text-secondary"></i>
                                Marcas:
                            </li>
                            <ul class="list-group list-group-flush">
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Registrar
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Modificar Información
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                            </ul>
                            
                            <li class="fw-bold bg-light text-start">
                                <i class="bi bi-bag-fill me-2 text-secondary"></i>
                                Gestión de Productos:
                            </li>
                            <ul class="list-group list-group-flush">
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Registrar
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b> <span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b> <span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                            </ul>
                            
                            <li class="fw-bold text-start bg-light">
                                <i class="bi bi-box-arrow-in-right me-2 text-secondary"></i>
                                Entrada de Productos:
                            </li>
                            <ul class="list-group list-group-flush">
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Registrar
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b>  <span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <b>De:</b><span class="text-success"> Permitido </span>
                                        a <span class="text-danger"> Denegado </span>
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
            ';
        
        
        
        
        
        $moduloVenta = '
            <div class="col-12 col-md-6 text- mb-3">
                <h4 class="mb-3 text-center text-primary"><i class="bi bi-currency-dollar me-2"></i> Ventas</h4>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Generar Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista de Ventas Realizadas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Visualizar Detalles de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Acceder a Facturas de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Estadísticas/Reportes de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                </ul>
            </div>
        ';

        $moduloMenu = '
            <div class="col-12 col-md-6 text-center mb-3">
                <h4 class="mb-3 text-center text-primary"><i class="bi bi-fork-knife me-2"></i> Menú / Servicios </h4>
                
                <ul class="list-group list-group-flush">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
        ';



        $moduloCliente = '
            <div class="col-12 col-md-6 mb-2 ">
                <p class="card-title text-center">Módulo de Clientes</p>

                <ul class="list-group list-group-flush">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Visualizar Historial de Compras
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Visualizar Facturas de Compras </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                </ul>
            </div>
        ';

        $moduloEmpleado = '
            <div class="col-12 col-md-6 mb-2 ">
                <p class="card-title text-center">Módulo de Empleados</p>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>

                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
        ';



        $moduloRoles = '
            <div class="col-12 col-md-12 mb-2">
                <p class="card-title text-center">Módulo de Roles</p>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
        ';

        $moduloAjustes = '
            <div class="col-12 mb-2">
                <p class="card-title text-center">Módulo de Ajustes del Sistema</p>
                
                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de preguntas de seguridad </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar tiempo de inactividad de sesión</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de caracteres de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de símbolos de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de números de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar intentos de inicio de sesión</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                </ul>
            </div>
        ';


        $moduloBitacora = '
            <div class="col-12 mb-2 ">
                <p class="card-title text-center">Módulo de Bitácora</p>
                
                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Consultar Registros de la Bitácora</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Consultar Movimientos de un Usuario</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <b>De:</b><span class="text-success"> Permitido </span>
                            a <span class="text-danger"> Denegado </span>
                        </div>
                    </li>
                </ul>
            </div>   
        ';



        $moduloVenta = '
                <div class="col-12 text-center text-md-end">
                    <h4 class="mb-3 text-center text-primary"><i class="bi bi-people-fill me-2"></i> Usuarios </h4>
                    <div class="row m-0 justify-content-between">
                    
                    </div>
                </div>

                <div class="col-12 text-center text-md-end">
                    <h4 class="mb-3 text-center text-primary"><i class="bi bi-gear-fill me-2"></i> Configuración General </h4>
                    <div class="row m-0 justify-content-between">
                    
                    </div>    
                </div>
            ';


        return "";
    }

    public static function generar_bitacora_modificacion($permisos_originales, $permisos_actuales) {
        $html_final = "";
        $cambios = [];

        // 1. Identificar todos los permisos que cambiaron
        foreach ($permisos_originales as $key => $valor_original) {
            if (isset($permisos_actuales[$key]) && $permisos_actuales[$key] !== $valor_original) {
                $cambios[$key] = [
                    'de' => $valor_original,
                    'a' => $permisos_actuales[$key]
                ];
            }
        }

        // Si no hay cambios, no se genera nada
        if (empty($cambios)) {
            return '<p class="text-center text-muted">No se realizaron cambios en los permisos.</p>';
        }

        // 2. Agrupar los cambios por módulo (usando el prefijo de la clave)
        $cambios_por_modulo = [];
        $nombres_modulos = [
            'proveedores' => 'Proveedores', 'categoria' => 'Categorías', 'presentacion' => 'Presentaciones',
            'marca' => 'Marcas', 'productos' => 'Productos', 'entrada' => 'Entradas', 'venta' => 'Ventas',
            'servicio' => 'Servicios', 'cliente' => 'Clientes', 'empleado' => 'Empleados', 'rol' => 'Roles',
            'cant' => 'Ajustes', 'tiempo' => 'Ajustes', 'intentos' => 'Ajustes', 'bitacora' => 'Bitácora'
        ];

        foreach ($cambios as $key => $valores) {
            $prefijo = explode('_', $key)[0]; // ej: 'r' de 'r_proveedores' no sirve. Necesito el módulo.
            $nombre_permiso_legible = ucwords(str_replace('_', ' ', $key)); // "R Proveedores"

            // Esto es un poco manual, pero necesario por la estructura de nombres
            $modulo_actual = "Otros";
            if (strpos($key, 'proveedor') !== false) $modulo_actual = 'Proveedores';
            elseif (in_array($prefijo, ['r', 'm', 'l']) && strpos($key, 'categoria') !== false) $modulo_actual = 'Productos (Categorías)';
            elseif (in_array($prefijo, ['r', 'm', 'l']) && strpos($key, 'presentacion') !== false) $modulo_actual = 'Productos (Presentaciones)';
            elseif (in_array($prefijo, ['r', 'm', 'l']) && strpos($key, 'marca') !== false) $modulo_actual = 'Productos (Marcas)';
            elseif (in_array($prefijo, ['r', 'l']) && strpos($key, 'productos') !== false) $modulo_actual = 'Productos (Gestión)';
            elseif (in_array($prefijo, ['r', 'l']) && strpos($key, 'entrada') !== false) $modulo_actual = 'Productos (Entradas)';
            elseif (strpos($key, 'venta') !== false) $modulo_actual = 'Ventas';
            elseif (strpos($key, 'servicio') !== false) $modulo_actual = 'Servicios';
            elseif (strpos($key, 'cliente') !== false) $modulo_actual = 'Clientes';
            elseif (strpos($key, 'empleado') !== false) $modulo_actual = 'Empleados';
            elseif (strpos($key, 'rol') !== false) $modulo_actual = 'Roles';
            elseif (strpos($key, 'seguridad') !== false || strpos($key, 'sesion') !== false || strpos($key, 'caracteres') !== false || strpos($key, 'simbolos') !== false || strpos($key, 'num') !== false) $modulo_actual = 'Ajustes del Sistema';
            elseif (strpos($key, 'bitacora') !== false) $modulo_actual = 'Bitácora';

            $cambios_por_modulo[$modulo_actual][$nombre_permiso_legible] = $valores;
        }

        // 3. Generar el HTML
        foreach ($cambios_por_modulo as $nombre_modulo => $permisos) {
            $html_final .= '<div class="col-12 col-md-6 mb-3"><p class="card-title">'.$nombre_modulo.'</p><ul class="list-group list-group-flush list-unstyled">';
            foreach ($permisos as $nombre_permiso => $cambio) {
                $color_de = $cambio['de'] == 'Permitido' ? 'success' : 'danger';
                $color_a = $cambio['a'] == 'Permitido' ? 'success' : 'danger';
                $html_final .= '<li class="border-bottom mb-1 row justify-content-center mx-0"><div class="col-6 text-start"><label>'.$nombre_permiso.'</label></div><div class="col-6 text-end text-wrap-balance"><b>De:</b><span class="text-'.$color_de.'"> '.$cambio['de'].'</span> a <span class="text-'.$color_a.'"> '.$cambio['a'].' </span></div></li>';
            }
            $html_final .= '</ul></div>';
        }

        return $html_final;
    }

}