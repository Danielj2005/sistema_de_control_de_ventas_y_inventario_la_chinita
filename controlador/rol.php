<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// funcion para saber si se recibe o no un datos por post
function validar_post($post) {
    if (!isset($_POST["$post"]) || $_POST["$post"] == ""){
        $post = 0;
    }else{
        $post = modeloprincipal::limpiar_cadena($_POST["$post"]);
    }
    return $post;
}


function info_actual_del_rol($id_rol) {
    // se consulta base de datos para obtener la información actual del rol
    $info_rol = modeloPrincipal::Consultar("SELECT * FROM rol WHERE id_rol = $id_rol");
    $permisos_roles = mysqli_fetch_array($info_rol);
    $nombre_rol = $permisos_roles['nombre'];
    // Iterar sobre el array de permisos
    foreach ($permisos_roles as $key => $value) {
        if ($value == 1 && $permisos_roles[$key] !== "nombre") {
            // Agregar al array de resultados si el valor es 1
            $permisos_roles[$key] = 'Permitido';
        }else{
            $permisos_roles[$key] = 'Denegado';
        }
    }
    

    // se itera sobre el resultado de la consulta para imprimir un mensaje con la información actual del rol
    
    $mensaje = "El usuario modificó el rol con la siguiente información:\n
        Nombre del rol: $nombre_rol\n
        -- Modulo Inventario --\n
        Vistas de Proveedores:
        Registro de Proveedores: ".$permisos_roles['r_proveedores']."\n
        Modificación de Proveedores: ".$permisos_roles['m_proveedores']."\n
        Lista de Proveedores registrados: ".$permisos_roles['l_proveedores']."\n
        Historial de compras a Proveedores: ".$permisos_roles['h_proveedores']."\n\n
        Vistas de Productos:
        Registro de Categorías: ".$permisos_roles['r_categoria']."\n
        Registro de Presentación: ".$permisos_roles['r_presentacion']."\n
        Registro de Productos: ".$permisos_roles['r_productos']."\n
        Lista de Productos: ".$permisos_roles['l_productos']."\n
        Registro de Entrada de Productos: ".$permisos_roles['r_entrada']."\n
        Lista de Entradas registradas: ".$permisos_roles['l_entrada']."\n\n
        Información del servicio actualizada:
        \n\n
        Nombre del rol: $nombre_rol\n
        Estado: Activo.";

    return $mensaje;
    // Devolver el array de resultados
    // mensaje_campos_actual($resultados,$resultados);
}

// function info_nueva_del_rol($nombre,$r_proveedores, $m_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $e_productos, $g_venta, $d_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $r_cliente, $m_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $r_rol, $m_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $v_bitacora, $l_proveedores, $l_productos, $r_entrada, $l_entrada, $l_venta, $l_servicio, $l_cliente, $l_empleado, $l_rol) {
//     // Creación del array multidimensional
//     $info = [
//         'r_proveedores' => $r_proveedores, 'm_proveedores' => $m_proveedores, 'h_proveedores' => $h_proveedores,
    
//         'r_categoria' => $r_categoria, 'r_presentacion' => $r_presentacion, 'r_productos' => $r_productos, 'e_productos' => $e_productos,
    
//         'g_venta' => $g_venta, 'd_venta' => $d_venta, 'f_venta' => $f_venta, 'est_venta' => $est_venta,
    
//         'r_servicio' => $r_servicio, 'm_servicio' => $m_servicio,
    
//         'r_cliente' => $r_cliente, 'm_cliente' => $m_cliente, 'h_cliente' => $h_cliente, 'f_cliente' => $f_cliente,
    
//         'r_empleado' => $r_empleado, 'm_empleado' => $m_empleado,
    
//         'r_rol' => $r_rol, 'm_rol' => $m_rol,
    
//         'm_cant_pregunta_seguridad' => $m_cant_pregunta_seguridad,
    
//         'm_tiempo_sesion' => $m_tiempo_sesion,
    
//         'm_cant_caracteres' => $m_cant_caracteres,
    
//         'm_cant_simbolos' => $m_cant_simbolos,
    
//         'm_cant_num' => $m_cant_num,
    
//         'v_bitacora' => $v_bitacora
    
//     ];
//     $vistas = [
//         'r_proveedores' => 'registro de proveedores', 'm_proveedores' => $m_proveedores,, 'l_proveedores' => $m_proveedores, 'h_proveedores' => $h_proveedores,
    
//         'r_categoria' => $r_categoria, 'r_presentacion' => $r_presentacion, 'r_productos' => $r_productos, 'e_productos' => $e_productos,
    
//         'g_venta' => $g_venta, 'd_venta' => $d_venta, 'f_venta' => $f_venta, 'est_venta' => $est_venta,
    
//         'r_servicio' => $r_servicio, 'm_servicio' => $m_servicio,
    
//         'r_cliente' => $r_cliente, 'm_cliente' => $m_cliente, 'h_cliente' => $h_cliente, 'f_cliente' => $f_cliente,
    
//         'r_empleado' => $r_empleado, 'm_empleado' => $m_empleado,
    
//         'r_rol' => $r_rol, 'm_rol' => $m_rol,
    
//         'm_cant_pregunta_seguridad' => $m_cant_pregunta_seguridad,
    
//         'm_tiempo_sesion' => $m_tiempo_sesion,
    
//         'm_cant_caracteres' => $m_cant_caracteres,
    
//         'm_cant_simbolos' => $m_cant_simbolos,
    
//         'm_cant_num' => $m_cant_num,
    
//         'v_bitacora' => $v_bitacora
    
//     ];

//     // Array para almacenar los resultados
//     $resultados = [];

//     // Iterar sobre el array de permisos
//     foreach ($permiso_rol as $key => $value) {
//         if ($value == 1) {
//             // Agregar al array de resultados si el valor es 1
//             $resultados[$key] = 'permitido';
//         }else{
//             $resultados[$key] = 'denegado';
//         }

//     }

//     // Construir el texto de resultados

//     $texto_resultados = '';

//     foreach ($resultados as $key => $resultado) {

//         $texto_resultados .= "$key: $resultado ";

//     }

//     $mensaje = "\n\nNombre del rol: $nombre \nEstado: Inactivo";
//     // Retornar el texto de resultados

//     return $texto_resultados;
//     // Devolver el array de resultados
//     // mensaje_campos_actual($resultados,$resultados);
// }



function mensaje_campos_actual($permiso_rol, $resultados) {

    // Iterar sobre los campos recibidos

    foreach ($resultados as $key => $value) {

        // Verificar si la llave existe en el array de permisos y si su valor es igual a 1

        if (array_key_exists($key, $permiso_rol) && $permiso_rol[$key] == 1) {

            // Mostrar el mensaje

            echo "$key = $value\n";

        }

    }
}

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);


// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = validar_post("r_proveedores");
    $m_proveedores = validar_post("m_proveedores");
    $l_proveedores = validar_post("l_proveedores");
    $h_proveedores = validar_post("h_proveedores");

    // vistas del modulo productos
    $r_categoria = validar_post("r_categoria");
    $r_presentacion = validar_post("r_presentacion");
    $r_productos = validar_post("r_productos");
    $l_productos = validar_post("l_productos");
    $r_entrada = validar_post("r_entrada");
    $l_entrada = validar_post("l_entrada");

    // vistas del modulo ventas
    $g_venta = validar_post("g_venta");
    $d_venta = validar_post("d_venta");
    $f_venta = validar_post("f_venta");
    $l_venta = validar_post("l_venta");
    $est_venta = validar_post("est_venta");
    
    // vistas del modulo menú
    $r_servicio = validar_post("r_servicio");
    $l_servicio = validar_post("l_servicio");
    $m_servicio = validar_post("m_servicio");

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = validar_post("r_cliente");
    $m_cliente = validar_post("m_cliente");
    $l_cliente = validar_post("l_cliente");
    $h_cliente = validar_post("h_cliente");
    $f_cliente = validar_post("f_cliente");
    // vista de empleados
    $r_empleado = validar_post("r_empleado");
    $m_empleado = validar_post("m_empleado");
    $l_empleado = validar_post("l_empleado");
    // vista de roles
    $r_rol = validar_post("r_rol");
    $m_rol = validar_post("m_rol");
    $l_rol = validar_post("l_rol");

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = validar_post("m_cant_pregunta_seguridad");
    $m_tiempo_sesion = validar_post("m_tiempo_sesion");
    $m_cant_caracteres = validar_post("m_cant_caracteres");
    $m_cant_simbolos = validar_post("m_cant_simbolos");
    $m_cant_num = validar_post("m_cant_num");
    $intentos_inicio_sesion = validar_post('intentos_inicio_sesion');
    // vista de bitácora
    $v_bitacora = validar_post("v_bitacora");
    

    // se comprueba que no exista un registro con los mismos datos
    if(mysqli_num_rows(modeloprincipal::consultar("SELECT nombre FROM rol WHERE nombre = '$nombre'")) > 0){
        /********** No se puede registrar un usuario si ya existe **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya se encuentra Registrado un ROL con ese nombre, por favor verifica e intenta de nuevo", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit(); 
    }

    // verificar datos
    if($nombre == "" || $r_proveedores == "" || $m_proveedores == "" || $h_proveedores == "" || $r_categoria == "" || $r_presentacion == "" || $r_productos == "" || $r_entrada == "" || $g_venta == "" || $d_venta == "" || $f_venta == "" || $est_venta == "" || $r_servicio == "" || $m_servicio == "" || $r_cliente == "" || $m_cliente == "" || $h_cliente == "" || $f_cliente == "" || $r_empleado == "" || $m_empleado == "" || $r_rol == "" || $m_rol == "" || $m_cant_pregunta_seguridad == "" || $m_tiempo_sesion == "" || $m_cant_caracteres == "" || $m_cant_simbolos == "" || $m_cant_num == "" || $v_bitacora == "" || $l_proveedores == "" || $l_productos == "" || $l_entrada == "" || $l_venta == "" || $l_servicio == "" || $l_cliente == "" || $l_empleado == "" || $l_rol == "" || $intentos_inicio_sesion == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    // datos verificados que se van a Registrar
    if (modeloprincipal::InsertSQL("rol", "nombre, r_proveedores, m_proveedores, l_proveedores, h_proveedores, r_categoria, r_presentacion, r_productos, l_productos, r_entrada, l_entrada, g_venta, d_venta, l_venta, f_venta, est_venta, r_servicio, m_servicio, l_servicio, r_cliente, m_cliente, l_cliente, h_cliente, f_cliente, r_empleado, m_empleado, l_empleado, r_rol, m_rol, l_rol, m_cant_pregunta_seguridad, m_tiempo_sesion, m_cant_caracteres, m_cant_simbolos, m_cant_num, intentos_inicio_sesion, v_bitacora, estado", "'$nombre', $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $l_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $l_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, 1")) {
        
        $id_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_rol) AS id_rol FROM rol"));
        $id_rol = $id_rol['id_rol'];

        modeloPrincipal::bitacora("Registro de un rol", "El usuario Registró el rol con la siguiente información:\n\n
        Nombre del rol: ".$permisos_roles['nombre']." \n
        -- Modulo Inventario --\n
        Vistas de Proveedores:
        Registro de Proveedores: ".$permisos_roles['r_proveedores']." \n
        Modificación de Proveedores: ".$permisos_roles['m_proveedores']." \n
        Lista de Proveedores registrados: ".$permisos_roles['l_proveedores']."\n
        Historial de compras a Proveedores: ".$permisos_roles['h_proveedores']."\n\n
        Vistas de Productos:
        Registro de Categorías: ".$permisos_roles['r_categoria']." \n
        Registro de Presentación: ".$permisos_roles['r_presentacion']." \n
        Registro de Productos: ".$permisos_roles['r_productos']." \n
        Lista de Productos: ".$permisos_roles['l_productos']." \n
        Registro de Entrada de Productos: ".$permisos_roles['r_entrada']."\n
        Lista de Entradas registradas: ".$permisos_roles['l_entrada']."\n\n
        Información del servicio actualizada:
        \n\n
        Nombre del rol: ".$permisos_roles['nombre']." \n
        Estado: Activo.");
        
        echo '<script type="text/javascript">
            swal({
                title:"¡Registro Exitoso!",
                text:"Los Datos Se Registraron Correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            },
            function(isConfirm){  
                if (isConfirm) {     
                    location.reload();
                } else {    
                    location.reload();
                } 
            });
            $(".SendFormAjax")[0].reset();
        </script>';
        exit();
    } else { // se muestra un mensaje en caso de que no se pueda Registrar los datos
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron registrar, verifique he intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}

// modulo para modificar un rol registrado
if($modulo === "Modificar"){

    $id_rol = $_POST["id_rol"];
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    $estado = modeloprincipal::limpiar_cadena($_POST["estado_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = validar_post("r_proveedores");
    $m_proveedores = validar_post("m_proveedores");
    $l_proveedores = validar_post("l_proveedores");
    $h_proveedores = validar_post("h_proveedores");

    // vistas del modulo productos
    $r_categoria = validar_post("r_categoria");
    $r_presentacion = validar_post("r_presentacion");
    $r_productos = validar_post("r_productos");
    $l_productos = validar_post("l_productos");
    $r_entrada = validar_post("r_entrada");
    $l_entrada = validar_post("l_entrada");

    // vistas del modulo ventas
    $g_venta = validar_post("g_venta");
    $d_venta = validar_post("d_venta");
    $f_venta = validar_post("f_venta");
    $l_venta = validar_post("l_venta");
    $est_venta = validar_post("est_venta");
    
    // vistas del modulo menú
    $r_servicio = validar_post("r_servicio");
    $l_servicio = validar_post("l_servicio");
    $m_servicio = validar_post("m_servicio");

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = validar_post("r_cliente");
    $m_cliente = validar_post("m_cliente");
    $l_cliente = validar_post("l_cliente");
    $h_cliente = validar_post("h_cliente");
    $f_cliente = validar_post("f_cliente");
    // vista de empleados
    $r_empleado = validar_post("r_empleado");
    $m_empleado = validar_post("m_empleado");
    $l_empleado = validar_post("l_empleado");
    // vista de roles
    $r_rol = validar_post("r_rol");
    $m_rol = validar_post("m_rol");
    $l_rol = validar_post("l_rol");

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = validar_post("m_cant_pregunta_seguridad");
    $m_tiempo_sesion = validar_post("m_tiempo_sesion");
    $m_cant_caracteres = validar_post("m_cant_caracteres");
    $m_cant_simbolos = validar_post("m_cant_simbolos");
    $m_cant_num = validar_post("m_cant_num");
    $intentos_inicio_sesion = validar_post('intentos_inicio_sesion');
    // vista de bitácora
    $v_bitacora = validar_post("v_bitacora");
    
    // verificar datos
    if ($nombre == "" || $r_proveedores == "" || $m_proveedores == "" || $h_proveedores == "" || $r_categoria == "" || $r_presentacion == "" || $r_productos == "" || $g_venta == "" || $d_venta == "" || $f_venta == "" || $est_venta == "" || $r_servicio == "" || $m_servicio == "" || $r_cliente == "" || $m_cliente == "" || $h_cliente == "" || $f_cliente == "" || $r_empleado == "" || $m_empleado == "" || $r_rol == "" || $m_rol == "" || $m_cant_pregunta_seguridad == "" || $m_tiempo_sesion == "" || $m_cant_caracteres == "" || $m_cant_simbolos == "" || $m_cant_num == "" || $v_bitacora == "" || $l_proveedores == "" || $l_productos == "" || $r_entrada == "" || $l_entrada == "" || $l_venta == "" || $l_servicio == "" || $l_cliente == "" || $l_empleado == "" || $l_rol == "" ||  $intentos_inicio_sesion == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    // datos verificados que se van a Registrarcondicion: condicion: condicion: 
    if (modeloprincipal::UpdateSQL("rol", "nombre = '$nombre', r_proveedores = $r_proveedores, m_proveedores = $m_proveedores, l_proveedores = $l_proveedores, h_proveedores = $h_proveedores, r_categoria = $r_categoria, r_presentacion = $r_presentacion, r_productos = $r_productos, l_productos = $l_productos, r_entrada = $r_entrada, l_entrada = $l_entrada, g_venta = $g_venta, d_venta = $d_venta, l_venta = $l_venta, f_venta = $f_venta, est_venta = $est_venta, r_servicio = $r_servicio, m_servicio = $m_servicio, l_servicio = $l_servicio, r_cliente = $r_cliente, m_cliente = $m_cliente, l_cliente = $l_cliente, h_cliente = $h_cliente, f_cliente = $f_cliente, r_empleado = $r_empleado, m_empleado = $m_empleado, l_empleado = $l_empleado, r_rol = $r_rol, m_rol = $m_rol, l_rol = $l_rol, m_cant_pregunta_seguridad = $m_cant_pregunta_seguridad, m_tiempo_sesion = $m_tiempo_sesion, m_cant_caracteres = $m_cant_caracteres, m_cant_simbolos = $m_cant_simbolos, m_cant_num = $m_cant_num, intentos_inicio_sesion = $intentos_inicio_sesion, v_bitacora = $v_bitacora, estado = $estado", "id_rol = $id_rol")) {
        
        modeloPrincipal::bitacora("Modificación de un rol","".info_actual_del_rol($id_rol)."");
        
        echo '<script type="text/javascript">
                swal({
                    title: "Modificación Exitosa!",
                    text: "Los Datos Se Actualizaron Correctamente",
                    type: "success",
                    confirmButtonText: "Aceptar"
                },
                function(isConfirm){  
                    if (isConfirm) {     
                        location.reload();
                    } else {    
                        location.reload();
                    } 
                });
                $(".SendFormAjax")[0].reset();
            </script>';
        exit();
    } else { // se muestra un mensaje en caso de que no se pueda Registrar los datos
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "los datos no se pudieron registrar, verifique he intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}

/* ----------------- modulo para cambiar el estado de un rol ------------------ */
$id_rol = modeloprincipal::limpiar_cadena($_POST["id_rol"]);
$rol_info = mysqli_fetch_array(modeloprincipal::consultar("SELECT nombre FROM rol WHERE id_rol = $id_rol"));
$rol_info = $rol_info['nombre'];

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_rol'")){
        
        modeloPrincipal::bitacora("Cambio de estado de un rol","El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: $rol_info \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: $rol_info \nEstado: Activo");
        
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol Desactivado!", 
                        text:"El rol se desactivo exitosamente.", 
                        type: "success", 
                        confirmButtonText: "Aceptar" 
                    },
                    function(isConfirm){  
                        if (isConfirm) {     
                            location.reload();
                        } else {    
                            location.reload();
                        } 
                    });
                });
            </script>';
        exit();
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo realizar la operacion, por favor intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        exit();
    }
}

if ($modulo === "inactivo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '1'", "id_rol = '$id_rol'")){
        modeloPrincipal::bitacora("Cambio de estado de un rol","El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: $rol_info \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: $rol_info \nEstado: Inactivo");
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol activado!", 
                        text:"El rol se activo exitosamente.", 
                        type: "success", 
                        confirmButtonText: "Aceptar" 
                    },
                    function(isConfirm){  
                        if (isConfirm) {     
                            location.reload();
                        } else {    
                            location.reload();
                        } 
                    });
                });
            </script>';
        exit();
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo realizar la operacion, por favor intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        exit();
    } 
}



