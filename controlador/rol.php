<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");
require_once ('../include/datos_usuario_include.php');

// funcion para saber si se recibe o no un datos por post
function validar_post($post) {
    if (!isset($_POST["$post"]) || $_POST["$post"] == ""){
        $post = 0;
    }else{
        $post = modeloprincipal::limpiar_cadena($_POST["$post"]);
    }
    return $post;
}


// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);


// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = validar_post("r_proveedores");
    $m_proveedores = validar_post("m_proveedores");
    $h_proveedores = validar_post("h_proveedores");

    // vistas del modulo productos
    $r_categoria = validar_post("r_categoria");
    $r_presentacion = validar_post("r_presentacion");
    $r_productos = validar_post("r_productos");
    $e_productos = validar_post("e_productos");

    // vistas del modulo ventas
    $g_venta = validar_post("g_venta");
    $d_venta = validar_post("d_venta");
    $f_venta = validar_post("f_venta");
    $est_venta = validar_post("est_venta");
    
    // vistas del modulo menú
    $r_servicio = validar_post("r_servicio");
    $m_servicio = validar_post("m_servicio");

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = validar_post("r_cliente");
    $m_cliente = validar_post("m_cliente");
    $h_cliente = validar_post("h_cliente");
    $f_cliente = validar_post("f_cliente");
    // vista de empleados
    $r_empleado = validar_post("r_empleado");
    $m_empleado = validar_post("m_empleado");
    // vista de roles
    $r_rol = validar_post("r_rol");
    $m_rol = validar_post("m_rol");

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = validar_post("m_cant_pregunta_seguridad");
    $m_tiempo_sesion = validar_post("m_tiempo_sesion");
    $m_cant_caracteres = validar_post("m_cant_caracteres");
    $m_cant_simbolos = validar_post("m_cant_simbolos");
    $m_cant_num = validar_post("m_cant_num");
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
    if($nombre == "" || $r_proveedores == "" || $m_proveedores == "" || $h_proveedores == "" || $r_categoria == "" || $r_presentacion == "" || $r_productos == "" || $e_productos == "" || $g_venta == "" || $d_venta == "" || $f_venta == "" || $est_venta == "" || $r_servicio == "" || $m_servicio == "" || $r_cliente == "" || $m_cliente == "" || $h_cliente == "" || $f_cliente == "" || $r_empleado == "" || $m_empleado == "" || $r_rol == "" || $m_rol == "" || $m_cant_pregunta_seguridad == "" || $m_tiempo_sesion == "" || $m_cant_caracteres == "" || $m_cant_simbolos == "" || $m_cant_num == "" || $v_bitacora == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos o no han sido seleccionados",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    // datos verificados que se van a Registrar
    if (modeloprincipal::InsertSQL("rol", "nombre, r_proveedores, m_proveedores, h_proveedores, r_categoria, r_presentacion, r_productos, e_productos, g_venta, d_venta, f_venta, est_venta, r_servicio, m_servicio, r_cliente, m_cliente, h_cliente, f_cliente, r_empleado, m_empleado, r_rol, m_rol, m_cant_pregunta_seguridad, m_tiempo_sesion, m_cant_caracteres, m_cant_simbolos, m_cant_num, v_bitacora, estado", "'$nombre', $r_proveedores, $m_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $e_productos, $g_venta, $d_venta, $f_venta, $est_venta, $r_servicio, $m_servicio, $r_cliente, $m_cliente, $h_cliente, $f_cliente, $r_empleado, $m_empleado, $r_rol, $m_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $v_bitacora, 1")) {
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

    $id_rol = modeloprincipal::limpiar_mayusculas($_POST["id_rol"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    $estado = modeloprincipal::limpiar_mayusculas($_POST["estado_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = validar_post("r_proveedores");
    $m_proveedores = validar_post("m_proveedores");
    $h_proveedores = validar_post("h_proveedores");

    // vistas del modulo productos
    $r_categoria = validar_post("r_categoria");
    $r_presentacion = validar_post("r_presentacion");
    $r_productos = validar_post("r_productos");
    $e_productos = validar_post("e_productos");

    // vistas del modulo ventas
    $g_venta = validar_post("g_venta");
    $d_venta = validar_post("d_venta");
    $f_venta = validar_post("f_venta");
    $est_venta = validar_post("est_venta");
    
    // vistas del modulo menú
    $r_servicio = validar_post("r_servicio");
    $m_servicio = validar_post("m_servicio");

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = validar_post("r_cliente");
    $m_cliente = validar_post("m_cliente");
    $h_cliente = validar_post("h_cliente");
    $f_cliente = validar_post("f_cliente");
    // vista de empleados
    $r_empleado = validar_post("r_empleado");
    $m_empleado = validar_post("m_empleado");
    // vista de roles
    $r_rol = validar_post("r_rol");
    $m_rol = validar_post("m_rol");

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = validar_post("m_cant_pregunta_seguridad");
    $m_tiempo_sesion = validar_post("m_tiempo_sesion");
    $m_cant_caracteres = validar_post("m_cant_caracteres");
    $m_cant_simbolos = validar_post("m_cant_simbolos");
    $m_cant_num = validar_post("m_cant_num");
    // vista de bitácora
    $v_bitacora = validar_post("v_bitacora");
    

    // verificar datos
    if($nombre == "" || $r_proveedores == "" || $m_proveedores == "" || $h_proveedores == "" || $r_categoria == "" || $r_presentacion == "" || $r_productos == "" || $e_productos == "" || $g_venta == "" || $d_venta == "" || $f_venta == "" || $est_venta == "" || $r_servicio == "" || $m_servicio == "" || $r_cliente == "" || $m_cliente == "" || $h_cliente == "" || $f_cliente == "" || $r_empleado == "" || $m_empleado == "" || $r_rol == "" || $m_rol == "" || $m_cant_pregunta_seguridad == "" || $m_tiempo_sesion == "" || $m_cant_caracteres == "" || $m_cant_simbolos == "" || $m_cant_num == "" || $v_bitacora == ""){
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos o no han sido seleccionados",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$nombre)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    // datos verificados que se van a Registrarcondicion: condicion: condicion: 
    if (modeloprincipal::UpdateSQL("rol", "nombre = '$nombre', r_proveedores = $r_proveedores, m_proveedores = $m_proveedores, h_proveedores = $h_proveedores, r_categoria = $r_categoria, r_presentacion = $r_presentacion, r_productos = $r_productos, e_productos = $e_productos, g_venta = $g_venta, d_venta = $d_venta, f_venta = $f_venta, est_venta = $est_venta, r_servicio = $r_servicio, m_servicio = $m_servicio, r_cliente = $r_cliente, m_cliente = $m_cliente, h_cliente = $h_cliente, f_cliente = $f_cliente, r_empleado = $r_empleado, m_empleado = $m_empleado, r_rol = $r_rol, m_rol = $m_rol, m_cant_pregunta_seguridad = $m_cant_pregunta_seguridad, m_tiempo_sesion = $m_tiempo_sesion, m_cant_caracteres = $m_cant_caracteres, m_cant_simbolos = $m_cant_simbolos, m_cant_num = $m_cant_num, v_bitacora = $v_bitacora, estado = $estado", "id_rol = $id_rol")) {
        echo '<script type="text/javascript">
            swal({
                title:"Modificación Exitosa!",
                text:"Los Datos Se Actualizaron Correctamente",
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

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_rol'")){
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



