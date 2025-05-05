<?php 
session_start();

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

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

if (!isset($_POST["modulo"]) || $_POST['modulo'] == "") {
    alert_model::alerta_simple("Ocurrio un error!","Ha ocurrido un error al procesar tu solicitud, asegurese de no alterar la información del sistema","error");
    exit();
}

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);


// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = rol_model::validar_post_roles("r_proveedores");
    $m_proveedores = rol_model::validar_post_roles("m_proveedores");
    $l_proveedores = rol_model::validar_post_roles("l_proveedores");
    $h_proveedores = rol_model::validar_post_roles("h_proveedores");

    // vistas del modulo productos
    $r_categoria = rol_model::validar_post_roles("r_categoria");
    $r_presentacion = rol_model::validar_post_roles("r_presentacion");
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

    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$id_rol, $nombre, $estado, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $f_venta, $l_venta, $est_venta, $r_servicio, $l_servicio, $m_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $nombre, $m_cant_num, $intentos_inicio_sesion, $v_bitacora]);
    
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( "¡Ocurrio un error!", "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", "error");
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( "¡Ocurrio un error!", "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", "error");
        exit();
    }

    // datos verificados que se van a Registrar

    if (modeloprincipal::InsertSQL("rol", "nombre, r_proveedores, m_proveedores, l_proveedores, h_proveedores, r_categoria, r_presentacion, r_productos, l_productos, r_entrada, l_entrada, g_venta, d_venta, l_venta, f_venta, est_venta, r_servicio, m_servicio, l_servicio, r_cliente, m_cliente, l_cliente, h_cliente, f_cliente, r_empleado, m_empleado, l_empleado, r_rol, m_rol, l_rol, m_cant_pregunta_seguridad, m_tiempo_sesion, m_cant_caracteres, m_cant_simbolos, m_cant_num, intentos_inicio_sesion, v_bitacora, estado", "'$nombre', $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $l_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $l_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $intentos_inicio_sesion, $v_bitacora, 1")) {
        
        $id_rol = mysqli_fetch_array(modeloPrincipal::consultar("SELECT MAX(id_rol) AS id_rol FROM rol"));
        $id_rol = $id_rol['id_rol'];

        bitacora::bitacora("Registro exitoso de un rol", "El usuario Registró el rol con la siguiente infromación <br>
        Nombre del rol: '$nombre'<br>
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

    $id_rol = modeloprincipal::limpiar_cadena($_POST["id_rol"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    $estado = modeloprincipal::limpiar_cadena($_POST["estado_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = rol_model::validar_post_roles("r_proveedores");
    $m_proveedores = rol_model::validar_post_roles("m_proveedores");
    $l_proveedores = rol_model::validar_post_roles("l_proveedores");
    $h_proveedores = rol_model::validar_post_roles("h_proveedores");

    // vistas del modulo productos
    $r_categoria = rol_model::validar_post_roles("r_categoria");
    $r_presentacion = rol_model::validar_post_roles("r_presentacion");
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
    
    $text_mensaje_original = rol_model::obtener_permisos_originales_de_rol($id_rol,"original");
    // Se verifica que no se hayan recibido campos vacíos.
    modeloPrincipal::validar_campos_vacios([$id_rol, $nombre, $estado, $r_proveedores, $m_proveedores, $l_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $r_entrada, $l_entrada, $g_venta, $d_venta, $f_venta, $l_venta, $est_venta, $r_servicio, $l_servicio, $m_servicio, $r_cliente, $m_cliente, $l_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $l_empleado, $r_rol, $m_rol, $l_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $nombre, $m_cant_num, $intentos_inicio_sesion, $v_bitacora]);

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,20}",$nombre)) {
        alert_model::alerta_simple( "¡Ocurrio un error!", "El campo NOMBRE debe contener entre 3 y 20 caracteres. Por favor, asegúrate de que cumple con este formato.", "error");
        exit();
    }

    
    // se consulta la bd para obtener los accesos absolutos del rol al los módulos
    $permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));
    
    $datos_originales = rol_model::texto_permisos_vista($permisos);
    
    // módulo de inventario
    $modulo_proveedor_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'], 4);
    $modulo_producto_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'], 6);
    // módulo de venta
    $modulo_venta_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'],56);
    // módulo de menu
    $modulo_menu_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'],3);
    // módulo de usuario
    $modulo_cliente_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'],5);
    $modulo_empleado_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'],3);
    $modulo_rol_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'],3);
    // módulo de configuración
    $modulo_ajustes_originales = rol_model::obtener_texto_de_acceso_modulos($permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'], 6);
    
    try {
        $actualizar = modeloprincipal::UpdateSQL("rol", "nombre = '$nombre', r_proveedores = $r_proveedores, m_proveedores = $m_proveedores, l_proveedores = $l_proveedores, h_proveedores = $h_proveedores, r_categoria = $r_categoria, r_presentacion = $r_presentacion, r_productos = $r_productos, l_productos = $l_productos, r_entrada = $r_entrada, l_entrada = $l_entrada, g_venta = $g_venta, d_venta = $d_venta, l_venta = $l_venta, f_venta = $f_venta, est_venta = $est_venta, r_servicio = $r_servicio, m_servicio = $m_servicio, l_servicio = $l_servicio, r_cliente = $r_cliente, m_cliente = $m_cliente, l_cliente = $l_cliente, h_cliente = $h_cliente, f_cliente = $f_cliente, r_empleado = $r_empleado, m_empleado = $m_empleado, l_empleado = $l_empleado, r_rol = $r_rol, m_rol = $m_rol, l_rol = $l_rol, m_cant_pregunta_seguridad = $m_cant_pregunta_seguridad, m_tiempo_sesion = $m_tiempo_sesion, m_cant_caracteres = $m_cant_caracteres, m_cant_simbolos = $m_cant_simbolos, m_cant_num = $m_cant_num, intentos_inicio_sesion = $intentos_inicio_sesion, v_bitacora = $v_bitacora, estado = $estado", "id_rol = $id_rol");
        
        
        if (!$actualizar) {
            alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al actualizar la información del rol seleccionado.", "error");
            exit();
        }

    } catch (Exception $e) {
        alert_model::alerta_simple("Ha ocurrido un error!", "ocurrio un error al modificar la información del rol seleccionado.", "error");
        exit();
    }


    // se consulta la bd para obtener los accesos absolutos del rol al los módulos
    $permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));
    
    $datos_actuales = rol_model::texto_permisos_vista($permisos);
    
    // módulo de inventario
    $modulo_proveedor = rol_model::obtener_texto_de_acceso_modulos($permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'], 4);
    $modulo_producto = rol_model::obtener_texto_de_acceso_modulos($permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'], 6);
    // módulo de venta
    $modulo_venta = rol_model::obtener_texto_de_acceso_modulos($permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'] + $permisos['est_venta'],56);
    // módulo de menu
    $modulo_menu = rol_model::obtener_texto_de_acceso_modulos($permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'],3);
    // módulo de usuario
    $modulo_cliente = rol_model::obtener_texto_de_acceso_modulos($permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'],5);
    $modulo_empleado = rol_model::obtener_texto_de_acceso_modulos($permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'],3);
    $modulo_rol = rol_model::obtener_texto_de_acceso_modulos($permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'],3);
    // módulo de configuración
    $modulo_ajustes = rol_model::obtener_texto_de_acceso_modulos($permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'] + $permisos['intentos_inicio_sesion'], 6);
    
    try {

        $bitacora_modificacion_rol = bitacora::bitacora("Modificación exitosa de un rol", "El usuario modificó el rol con la siguiente información:<br> 
        Información del rol:<br>
        Nombre del rol: $nombre<br>
        Estado: Activo <br><br>
        ************* Información original: ************* <br><br>
        ****** Módulo Proveedores   ******<br>
        Acceso al módulo de Proveedores: $modulo_proveedor_originales<br>
        Registrar Nuevos Proveedores: ".$datos_originales['r_proveedores']." <br>
        Modificar Información de Proveedores: ".$datos_originales['m_proveedores']." <br>
        Consultar Lista de Proveedores Registrados: ".$datos_originales['l_proveedores']." <br>
        Visualizar Historial de Compras: ".$datos_originales['h_proveedores']." <br><br>

        ****** Módulo Productos     ******<br>
        Acceso al módulo de Productos: $modulo_producto_originales <br>
        Registrar Nuevas Categorías: ".$datos_originales['r_categoria']." <br>
        Registrar Nuevas Presentaciones: ".$datos_originales['r_presentacion']." <br>
        Registrar Nuevos Productos: ".$datos_originales['r_productos']." <br>
        Consultar Lista de Productos Registrados: ".$datos_originales['l_productos']." <br>
        Registrar Entrada de Productos: ".$datos_originales['r_entrada']." <br>
        Consultar Lista de Entradas de Productos: ".$datos_originales['l_entrada']." <br><br>
        
        ****** Módulo Ventas        ******<br>
        Acceso al módulo de Ventas: $modulo_venta_originales <br>
        Generar Nuevas Ventas: ".$datos_originales['g_venta']." <br>
        Consultar Lista de Ventas Realizadas: ".$datos_originales['l_venta']." <br>
        Visualizar Detalles de Ventas: ".$datos_originales['d_venta']." <br>
        Acceder a Facturas de Ventas: ".$datos_originales['f_venta']." <br>
        Consultar Estadísticas de Ventas: ".$datos_originales['est_venta']." <br><br>

        ****** Módulo Menú          ******<br>
        Acceso al módulo de Servicios: $modulo_menu_originales <br>
        Registrar Nuevos Servicios: ".$datos_originales['r_servicio']." <br>
        Modificar Información de Servicios: ".$datos_originales['l_servicio']." <br>
        Consultar Lista de Servicios Registrados: ".$datos_originales['m_servicio']." <br><br>

        ****** Módulo Clientes      ******<br>
        Acceso al módulo de Clientes: $modulo_cliente_originales <br>
        Registrar Nuevos Clientes: ".$datos_originales['r_cliente']." <br>
        Modificar Información de Clientes: ".$datos_originales['m_cliente']." <br>
        Consultar Lista de Clientes Regitrados: ".$datos_originales['l_cliente']." <br>
        Visualizar Historial de Clientes: ".$datos_originales['h_cliente']." <br>
        Acceder a Facturas de Clientes: ".$datos_originales['f_cliente']." <br><br>

        ****** Módulo Empleados          ******<br>
        Acceso al módulo de Empleados: $modulo_empleado_originales <br>
        Registrar Nuevos Empleados: ".$datos_originales['r_empleado']." <br>
        Modificar Información de Empleados: ".$datos_originales['m_empleado']." <br>
        Consultar Lista de Empleados Registrados: ".$datos_originales['l_empleado']." <br><br>

        ****** Módulo Roles  ******<br>
        Acceso al módulo de Roles: $modulo_rol_originales <br>
        Registrar Nuevos Roles: ".$datos_originales['r_rol']." <br>
        Modificar Información de Roles: ".$datos_originales['m_rol']." <br>
        Consultar Lista de Roles Registrados: ".$datos_originales['l_rol']." <br>

        ****** Módulo Configuración del sistema  ******<br>
        Acceso al módulo los Ajustes del Sistema: $modulo_ajustes_originales <br>
        Modificar Cantidad de Preguntas de Seguridad: ".$datos_originales['m_cant_pregunta_seguridad']." <br>
        Modificar Tiempo de Inactividad de Sesión: ".$datos_originales['m_tiempo_sesion']." <br>
        Modificar Cantidad de Caracteres Permitidos: ".$datos_originales['m_cant_caracteres']." <br>
        Modificar Cantidad de Símbolos Permitidos: ".$datos_originales['m_cant_simbolos']." <br>
        Modificar Cantidad de Números Permitidos: ".$datos_originales['m_cant_num']." <br>
        Modificar Intentos de Inicio de Sesión: ".$datos_originales['intentos_inicio_sesion']." <br><br>

        ****** Módulo Bitátora      ******<br>
        Acceso al módulo la Bitácora: ".rol_model::obtener_texto_de_acceso_modulos($permisos['v_bitacora'], 1)." <br>
        Consultar Registros de la Bitácora: ".$datos_originales['v_bitacora']." <br><br><br>


        ************* Información original: ************* <br><br>
        ****** Módulo Proveedores   ******<br>
        Acceso al módulo de Proveedores: $modulo_proveedor<br>
        Registrar Nuevos Proveedores: ".$datos_actuales['r_proveedores']." <br>
        Modificar Información de Proveedores: ".$datos_actuales['m_proveedores']." <br>
        Consultar Lista de Proveedores Registrados: ".$datos_actuales['l_proveedores']." <br>
        Visualizar Historial de Compras: ".$datos_actuales['h_proveedores']." <br><br>

        ****** Módulo Productos     ******<br>
        Acceso al módulo de Productos: $modulo_producto <br>
        Registrar Nuevas Categorías: ".$datos_actuales['r_categoria']." <br>
        Registrar Nuevas Presentaciones: ".$datos_actuales['r_presentacion']." <br>
        Registrar Nuevos Productos: ".$datos_actuales['r_productos']." <br>
        Consultar Lista de Productos Registrados: ".$datos_actuales['l_productos']." <br>
        Registrar Entrada de Productos: ".$datos_actuales['r_entrada']." <br>
        Consultar Lista de Entradas de Productos: ".$datos_actuales['l_entrada']." <br><br>
        
        ****** Módulo Ventas        ******<br>
        Acceso al módulo de Ventas: $modulo_venta <br>
        Generar Nuevas Ventas: ".$datos_actuales['g_venta']." <br>
        Consultar Lista de Ventas Realizadas: ".$datos_actuales['l_venta']." <br>
        Visualizar Detalles de Ventas: ".$datos_actuales['d_venta']." <br>
        Acceder a Facturas de Ventas: ".$datos_actuales['f_venta']." <br>
        Consultar Estadísticas de Ventas: ".$datos_actuales['est_venta']." <br><br>

        ****** Módulo Menú          ******<br>
        Acceso al módulo de Servicios: $modulo_menu <br>
        Registrar Nuevos Servicios: ".$datos_actuales['r_servicio']." <br>
        Modificar Información de Servicios: ".$datos_actuales['l_servicio']." <br>
        Consultar Lista de Servicios Registrados: ".$datos_actuales['m_servicio']." <br><br>

        ****** Módulo Clientes      ******<br>
        Acceso al módulo de Clientes: $modulo_cliente <br>
        Registrar Nuevos Clientes: ".$datos_actuales['r_cliente']." <br>
        Modificar Información de Clientes: ".$datos_actuales['m_cliente']." <br>
        Consultar Lista de Clientes Registrados: ".$datos_actuales['l_cliente']." <br>
        Visualizar Historial de Clientes: ".$datos_actuales['h_cliente']." <br>
        Acceder a Facturas de Clientes: ".$datos_actuales['f_cliente']." <br><br>

        ****** Módulo Empleados          ******<br>
        Acceso al módulo de Empleados: $modulo_empleado <br>
        Registrar Nuevos Empleados: ".$datos_actuales['r_empleado']." <br>
        Modificar Información de Empleados: ".$datos_actuales['m_empleado']." <br>
        Consultar Lista de Empleados Registrados: ".$datos_actuales['l_empleado']." <br><br>

        ****** Módulo Roles  ******<br>
        Acceso al módulo de Roles: $modulo_rol <br>
        Registrar Nuevos Roles: ".$datos_actuales['r_rol']." <br>
        Modificar Información de Roles: ".$datos_actuales['m_rol']." <br>
        Consultar Lista de Roles Registrados: ".$datos_actuales['l_rol']." <br>

        ****** Módulo Configuración del sistema  ******<br>
        Acceso al módulo los Ajustes del Sistema: $modulo_ajustes <br>
        Modificar Cantidad de Preguntas de Seguridad: ".$datos_actuales['m_cant_pregunta_seguridad']." <br>
        Modificar Tiempo de Inactividad de Sesión: ".$datos_actuales['m_tiempo_sesion']." <br>
        Modificar Cantidad de Caracteres Permitidos: ".$datos_actuales['m_cant_caracteres']." <br>
        Modificar Cantidad de Símbolos Permitidos: ".$datos_actuales['m_cant_simbolos']." <br>
        Modificar Cantidad de Números Permitidos: ".$datos_actuales['m_cant_num']." <br>
        Modificar Intentos de Inicio de Sesión: ".$datos_actuales['intentos_inicio_sesion']." <br><br>

        ****** Módulo Bitátora      ******<br>
        Acceso al módulo la Bitácora: ".rol_model::obtener_texto_de_acceso_modulos($permisos['v_bitacora'], 1)." <br>
        Consultar Registros de la Bitácora: ".$datos_actuales['v_bitacora']."
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
$id_rol = modeloprincipal::limpiar_cadena($_POST["id_rol"]);
$rol_info = mysqli_fetch_array(modeloprincipal::consultar("SELECT nombre FROM rol WHERE id_rol = $id_rol"));
$rol_info = $rol_info['nombre'];

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_rol'")){
        
        bitacora::bitacora("Cambio de estado de un rol","El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: $rol_info \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: $rol_info \nEstado: Activo");
        
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
        bitacora::bitacora("Cambio de estado de un rol","El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: $rol_info \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: $rol_info \nEstado: Inactivo");
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



