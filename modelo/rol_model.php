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

        // 3. Iterar sobre todos los resultados y construir el array de claves
        while ($fila = mysqli_fetch_assoc($cantidadTotalFunciones)) {
                
            if (mysqli_num_rows($cantidadTotalFunciones) === mysqli_num_rows($resultado_consulta)) {
                $permisos_usuario["".$fila['codigo'].""] = 1; 
            }else{
                $cantidadTotalFunciones = mysqli_fetch_assoc($cantidadTotalFunciones);

                if ($permisos_usuario["".$fila['codigo'].""] == $cantidadTotalFunciones["".$fila['codigo'].""] ) {
                    $permisos_usuario["".$fila['codigo'].""] = 1; 
                }else{
                    $permisos_usuario["".$fila['codigo'].""] = 0; 
                }
            }
        }

        return $permisos_usuario;
    }


    
    public static function sumaPermisoRol ($claves_a_verificar, $clavesPermisosRoles){
        

        $claves_de_permisos_del_rol = array_keys($clavesPermisosRoles);
        $coincidencias = array_intersect($claves_a_verificar, $claves_de_permisos_del_rol);
        $total_coincidencias = count($coincidencias);
        return $total_coincidencias;
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

        $colores = [
            "Permitido" => "success",
            "Denegado" => "danger"
        ];

        for ($i = 0; $i < count($nombreModulos); $i++) { 
            $text_allow .= '
                <li class="border-bottom mb-1 row justify-content-center">
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

        // permisos del modulo proveedores para bitacora
        $moduloProveedores = "";

        if ($permisos_originales["r_proveedores"] || $permisos_originales["m_proveedores"] || $permisos_originales["l_proveedores"]) {

            $permisos = [
                $permisos_originales["r_proveedores"], 
                $permisos_originales["m_proveedores"], 
                $permisos_originales["l_proveedores"]
            ];

            $proveedores = self::generar_mensaje_de_permisos_por_modulo( ["Registrar","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProveedores = '
                <div class="col-12 col-md-6 mb-2">
                    <p class="card-title">Módulo de Proveedores</p>

                    <ul class="list-group list-group-flush list-unstyled"> '.$proveedores.' </ul>
                </div>
            ';
        }
        
        // permisos del modulo productos para bitacora
        // permisos del modulo categoria
                
        $moduloProductosInicio = '
            <div class="col-12 col-md-6 mb-2">
                <p class="card-title">Módulo de Productos</p>
                <ul class="list-group list-group-flush list-unstyled">
                ';


        $moduloProductosFin = ' 
                </ul>
            </ul>
        </div>';

        if ($permisos_originales["r_categoria"] || $permisos_originales["m_categoria"] || $permisos_originales["l_categoria"]) {

            $permisos = [
                $permisos_originales["r_categoria"], 
                $permisos_originales["m_categoria"], 
                $permisos_originales["l_categoria"]
            ];

            $permisos = self::generar_mensaje_de_permisos_por_modulo( ["Registrar Nuevas","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '
                <li class="fw-bold bg-light text-start">
                    <i class="bi bi-folder-fill me-2 text-secondary"></i>
                    Categorías:
                </li>

                <ul class="list-group list-group-flush"> '.$permisos.'</ul>';
        }
        
        // modulo de presentaciones

        if ($permisos_originales["r_categoria"] || $permisos_originales["m_categoria"] || $permisos_originales["l_categoria"] || $permisos_originales["r_presentacion"] || $permisos_originales["m_presentacion"] || $permisos_originales["l_presentacion"] || $permisos_originales["r_marca"] || $permisos_originales["m_marca"] || $permisos_originales["l_marca"] || $permisos_originales["r_entrada"] || $permisos_originales["l_entrada"] || $permisos_originales["r_productos"] || $permisos_originales["l_productos"]) {

            $permisos = [
                $permisos_originales["r_proveedores"], 
                $permisos_originales["m_proveedores"], 
                $permisos_originales["l_proveedores"]
            ];

            $proveedores = self::generar_mensaje_de_permisos_por_modulo( ["Registrar","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProductosInicio .= '
                <li class="fw-bold bg-light text-start">
                    <i class="bi bi-folder-fill me-2 text-secondary"></i>
                    Categorías:
                </li>

                <ul class="list-group list-group-flush"> '.$permisos.' ';
        }
        

        if ($permisos_originales["r_categoria"] || $permisos_originales["m_categoria"] || $permisos_originales["l_categoria"] || $permisos_originales["r_presentacion"] || $permisos_originales["m_presentacion"] || $permisos_originales["l_presentacion"] || $permisos_originales["r_marca"] || $permisos_originales["m_marca"] || $permisos_originales["l_marca"] || $permisos_originales["r_entrada"] || $permisos_originales["l_entrada"] || $permisos_originales["r_productos"] || $permisos_originales["l_productos"]) {

            $permisos = [
                $permisos_originales["r_proveedores"], 
                $permisos_originales["m_proveedores"], 
                $permisos_originales["l_proveedores"]
            ];

            $proveedores = self::generar_mensaje_de_permisos_por_modulo( ["Registrar","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProveedores = '
                <div class="col-12 col-md-6 mb-2">
                    <p class="card-title">Módulo de Proveedores</p>

                    <ul class="list-group list-group-flush list-unstyled"> '.$proveedores.' </ul>
                </div>
            ';
        }
        

        if ($permisos_originales["r_categoria"] || $permisos_originales["m_categoria"] || $permisos_originales["l_categoria"] || $permisos_originales["r_presentacion"] || $permisos_originales["m_presentacion"] || $permisos_originales["l_presentacion"] || $permisos_originales["r_marca"] || $permisos_originales["m_marca"] || $permisos_originales["l_marca"] || $permisos_originales["r_entrada"] || $permisos_originales["l_entrada"] || $permisos_originales["r_productos"] || $permisos_originales["l_productos"]) {

            $permisos = [
                $permisos_originales["r_proveedores"], 
                $permisos_originales["m_proveedores"], 
                $permisos_originales["l_proveedores"]
            ];

            $proveedores = self::generar_mensaje_de_permisos_por_modulo( ["Registrar","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProveedores = '
                <div class="col-12 col-md-6 mb-2">
                    <p class="card-title">Módulo de Proveedores</p>

                    <ul class="list-group list-group-flush list-unstyled"> '.$proveedores.' </ul>
                </div>
            ';
        }
        

        if ($permisos_originales["r_categoria"] || $permisos_originales["m_categoria"] || $permisos_originales["l_categoria"] || $permisos_originales["r_presentacion"] || $permisos_originales["m_presentacion"] || $permisos_originales["l_presentacion"] || $permisos_originales["r_marca"] || $permisos_originales["m_marca"] || $permisos_originales["l_marca"] || $permisos_originales["r_entrada"] || $permisos_originales["l_entrada"] || $permisos_originales["r_productos"] || $permisos_originales["l_productos"]) {

            $permisos = [
                $permisos_originales["r_proveedores"], 
                $permisos_originales["m_proveedores"], 
                $permisos_originales["l_proveedores"]
            ];

            $proveedores = self::generar_mensaje_de_permisos_por_modulo( ["Registrar","Modificar Información","Consultar Lista"],  $permisos);

            $moduloProveedores = '
                <div class="col-12 col-md-6 mb-2">
                    <p class="card-title">Módulo de Proveedores</p>

                    <ul class="list-group list-group-flush list-unstyled"> '.$proveedores.' </ul>
                </div>
            ';
        }


        $texto = '
            <div class="col-12 text-center mb-3">
                <h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-box-seam me-2"></i> Inventario </h4>
                <div class="row m-0 justify-content-between">
                    '.$moduloProveedores.'
                    '.$moduloProductos.'

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
                                        Registrar Nuevas
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["r_categoria"]].'">'.$permisos_originales["r_categoria"].' </span>
                                    </div>
                                </li>

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Modificar Información
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["m_categoria"]].'">'.$permisos_originales["m_categoria"].' </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["l_categoria"]].'">'.$permisos_originales["l_categoria"].' </span>
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
                                        <span class="text-'.$colores[$permisos_originales["r_presentacion"]].'">'.$permisos_originales["r_presentacion"].' </span>
                                    </div>
                                </li>

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Modificar Información
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["m_presentacion"]].'">'.$permisos_originales["m_presentacion"].' </span>
                                    </div>
                                </li>

                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["l_presentacion"]].'">'.$permisos_originales["l_presentacion"].' </span>
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
                                        <span class="text-'.$colores[$permisos_originales["r_marca"]].'">'.$permisos_originales["r_marca"].' </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Modificar Información
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["m_marca"]].'">'.$permisos_originales["m_marca"].' </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["l_marca"]].'">'.$permisos_originales["l_marca"].' </span>
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
                                        <span class="text-'.$colores[$permisos_originales["r_producto"]].'">'.$permisos_originales["r_producto"].' </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["l_producto"]].'">'.$permisos_originales["l_producto"].' </span>
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
                                        <span class="text-'.$colores[$permisos_originales["r_entrada"]].'">'.$permisos_originales["r_entrada"].' </span>
                                    </div>
                                </li>
                                
                                <li class="border-bottom d-flex justify-content-between align-items-center">
                                    <div class="col-6 text-start">
                                        Consultar Lista
                                    </div>

                                    <div class="col-6 text-end text-wrap-balance">
                                        <span class="text-'.$colores[$permisos_originales["l_entrada"]].'">'.$permisos_originales["l_entrada"].' </span>
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-6 text- mb-3">
                <h4 class="mb-3 text-center text-primary"><i class="bi bi-currency-dollar me-2"></i> Ventas</h4>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Generar Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["g_venta"]].'">'.$permisos_originales["g_venta"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista de Ventas Realizadas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["l_venta"]].'">'.$permisos_originales["l_venta"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Visualizar Detalles de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["d_venta"]].'">'.$permisos_originales["d_venta"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Acceder a Facturas de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["f_venta"]].'">'.$permisos_originales["f_venta"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Estadísticas/Reportes de Ventas
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["est_venta"]].'">'.$permisos_originales["est_venta"].' </span>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="col-12 col-md-6 text-center mb-3">
                <h4 class="mb-3 text-center text-primary"><i class="bi bi-fork-knife me-2"></i> Menú / Servicios </h4>
                
                <ul class="list-group list-group-flush">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["r_servicio"]].'">'.$permisos_originales["r_servicio"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["l_servicio"]].'">'.$permisos_originales["l_servicio"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_servicio"]].'">'.$permisos_originales["m_servicio"].' </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
            
            <div class="col-12 col-md-6 mb-2 ">
                <p class="card-title text-center">Módulo de Clientes</p>

                <ul class="list-group list-group-flush">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Registrar
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["r_cliente"]].'">'.$permisos_originales["r_cliente"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Consultar Lista
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["l_cliente"]].'">'.$permisos_originales["l_cliente"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Modificar Información
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_cliente"]].'">'.$permisos_originales["m_cliente"].' </span>
                        </div>

                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">
                            Visualizar Historial de Compras
                        </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["h_cliente"]].'">'.$permisos_originales["h_cliente"].' </span>
                        </div>

                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Visualizar Facturas de Compras </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["f_cliente"]].'">'.$permisos_originales["f_cliente"].' </span>
                        </div>

                    </li>
                </ul>
            </div>
            
            <div class="col-12 col-md-6 mb-2 ">
                <p class="card-title text-center">Módulo de Empleados</p>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Registrar </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["r_empleado"]].'">'.$permisos_originales["r_empleado"].' </span>
                        </div>
                    </li>

                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Consultar Lista </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["l_empleado"]].'">'.$permisos_originales["l_empleado"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Modificar Información</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_empleado"]].'">'.$permisos_originales["m_empleado"].' </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
            
            <div class="col-12 col-md-12 mb-2">
                <p class="card-title text-center">Módulo de Roles</p>

                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Registrar </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["r_rol"]].'">'.$permisos_originales["r_rol"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start"> Consultar Lista </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["l_rol"]].'">'.$permisos_originales["l_rol"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">  Modificar Información </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_rol"]].'">'.$permisos_originales["m_rol"].' </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
            
            <div class="col-12 mb-2">
                <p class="card-title text-center">Módulo de Ajustes del Sistema</p>
                
                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de preguntas de seguridad </div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_cant_pregunta_seguridad"]].'">'.$permisos_originales["m_cant_pregunta_seguridad"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar tiempo de inactividad de sesión</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_tiempo_sesion"]].'">'.$permisos_originales["m_tiempo_sesion"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de caracteres de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_cant_caracteres"]].'">'.$permisos_originales["m_cant_caracteres"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de símbolos de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_cant_simbolos"]].'">'.$permisos_originales["m_cant_simbolos"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar cantidad de números de contraseña</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_cant_num"]].'">'.$permisos_originales["m_cant_num"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Modificar intentos de inicio de sesión</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["intentos_inicio_sesion"]].'">'.$permisos_originales["intentos_inicio_sesion"].' </span>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="col-12 mb-2 ">
                <p class="card-title text-center">Módulo de Bitácora</p>
                
                <ul class="list-group list-group-flush list-unstyled">
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Consultar Registros de la Bitácora</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["v_bitacora"]].'">'.$permisos_originales["v_bitacora"].' </span>
                        </div>
                    </li>
                    
                    <li class="border-bottom mb-1 row justify-content-center">
                        <div class="col-6 text-start">Consultar Movimientos de un Usuario</div>

                        <div class="col-6 text-end text-wrap-balance">
                            <span class="text-'.$colores[$permisos_originales["m_bitacora"]].'">'.$permisos_originales["m_bitacora"].' </span>
                        </div>
                    </li>
                </ul>
            </div>   
        ';

        return $texto;
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




    
    public static function generar_bitacorsa ($color_text_original, $permisos_originales, $color_text_actual, $permisos_actuales) {


        $texto = '
            <div class="col-12 text-center mb-3">
                <h4 class="d-block mb-3 text-center text-primary"><i class="bi bi-box-seam me-2"></i> Inventario </h4>
                <div class="row m-0 justify-content-between">

                    <div class="col-12 col-md-6 mb-2">
                        <p class="card-title">Módulo de Proveedores</p>

                        <ul class="list-group list-group-flush list-unstyled">
                            <li class="border-bottom mb-1 row justify-content-center">
                                <div class="col-6 text-start">
                                    <label>Registrar</label>
                                </div>
                                <div class="col-6 text-end text-wrap-balance">
                                    <b>De:</b><span class="text-success"> Permitido</span>
                                    a <span class="text-danger"> Denegado </span>
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


}