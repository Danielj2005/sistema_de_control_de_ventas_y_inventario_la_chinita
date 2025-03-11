<?php 
session_start();
/* archivos de configuracion y conexcion a la base de datos */

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");
require_once ('../include/datos_usuario_include.php');

// modulo a trabajar
$modulo = modeloprincipal::limpiar_cadena($_POST["modulo"]);

// modulo para Guardar un registro de un rol
if($modulo === "Guardar"){

    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre_rol"]);
    // vistas del modulo proveedores
    $r_proveedores = (!isset($_POST["r_proveedores"]) || $_POST["r_proveedores"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_proveedores"]);
    $l_proveedores = modeloprincipal::limpiar_cadena($_POST["l_proveedores"]);
    $m_proveedores = modeloprincipal::limpiar_cadena($_POST["m_proveedores"]);
    $h_proveedores = modeloprincipal::limpiar_cadena($_POST["h_proveedores"]);

    // vistas del modulo productos
    $r_categoria = modeloprincipal::limpiar_cadena($_POST["r_categoria"]);
    $r_presentacion = modeloprincipal::limpiar_cadena($_POST["r_presentacion"]);
    $r_productos = modeloprincipal::limpiar_cadena($_POST["r_productos"]);
    $l_productos = modeloprincipal::limpiar_cadena($_POST["l_productos"]);
    $e_productos = modeloprincipal::limpiar_cadena($_POST["e_productos"]);

    // vistas del modulo ventas
    $g_venta = modeloprincipal::limpiar_cadena($_POST["g_venta"]);
    $l_venta = modeloprincipal::limpiar_cadena($_POST["l_venta"]);
    $d_venta = modeloprincipal::limpiar_cadena($_POST["d_venta"]);
    $f_venta = modeloprincipal::limpiar_cadena($_POST["f_venta"]);
    $est_venta = modeloprincipal::limpiar_cadena($_POST["est_venta"]);
        
    // vistas del modulo menú
    $r_servicio = modeloprincipal::limpiar_cadena($_POST["r_servicio"]);
    $l_servicio = modeloprincipal::limpiar_cadena($_POST["l_servicio"]);
    $m_servicio = modeloprincipal::limpiar_cadena($_POST["m_servicio"]);

    
    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = modeloprincipal::limpiar_cadena($_POST["r_cliente"]);
    $l_cliente = modeloprincipal::limpiar_cadena($_POST["l_cliente"]);
    $m_cliente = modeloprincipal::limpiar_cadena($_POST["m_cliente"]);
    $h_cliente = modeloprincipal::limpiar_cadena($_POST["h_cliente"]);
    $f_cliente = modeloprincipal::limpiar_cadena($_POST["f_cliente"]);
    // vista de empleados
    $r_empleado = modeloprincipal::limpiar_cadena($_POST["r_empleado"]);
    $l_empleado = modeloprincipal::limpiar_cadena($_POST["l_empleado"]);
    $m_empleado = modeloprincipal::limpiar_cadena($_POST["m_empleado"]);
    // vista de roles
    $r_rol = modeloprincipal::limpiar_cadena($_POST["r_rol"]);
    $l_rol = modeloprincipal::limpiar_cadena($_POST["l_rol"]);
    $m_rol = modeloprincipal::limpiar_cadena($_POST["m_rol"]);

    
    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = modeloprincipal::limpiar_mayusculas($_POST["m_cant_pregunta_seguridad"]);
    $m_tiempo_sesion = modeloprincipal::limpiar_mayusculas($_POST["m_tiempo_sesion"]);
    $m_cant_caracteres = modeloprincipal::limpiar_mayusculas($_POST["m_cant_caracteres"]);
    $m_cant_simbolos = modeloprincipal::limpiar_mayusculas($_POST["m_cant_simbolos"]);
    $m_cant_num = modeloprincipal::limpiar_mayusculas($_POST["m_cant_num"]);
    // vista de bitácora
    $v_bitacora = modeloprincipal::limpiar_mayusculas($_POST["v_bitacora"]);
    $d_bitacora = modeloprincipal::limpiar_mayusculas($_POST["d_bitacora"]);
        

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
    if($nombre == "" || $r_proveedores == "" || $l_proveedores == "" || $m_proveedores == "" || $h_proveedores == "" || $r_categoria == "" || $r_presentacion == "" || $r_productos == "" || $l_productos == "" || $e_productos == "" || $g_venta == "" || $l_venta == "" || $d_venta == "" || $f_venta == "" || $est_venta == "" || $r_servicio == "" || $l_servicio == "" || $m_servicio == "" || $r_cliente == "" || $l_cliente == "" || $m_cliente == "" || $h_cliente == "" || $f_cliente == "" || $r_empleado == "" || $l_empleado == "" || $m_empleado == "" || $r_rol == "" || $l_rol == "" || $m_rol == "" || $m_cant_pregunta_seguridad == "" || $m_tiempo_sesion == "" || $m_cant_caracteres == "" || $m_cant_simbolos == "" || $m_cant_num == "" || $v_bitacora == "" || $d_bitacora == ""){
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
    if (modeloprincipal::InsertSQL("rol", "nombre, r_proveedores, l_proveedores, m_proveedores, h_proveedores, r_categoria, r_presentacion, r_productos, l_productos, e_productos, g_venta, l_venta, d_venta, f_venta, est_venta, r_servicio, l_servicio, m_servicio, r_cliente, l_cliente, m_cliente, h_cliente, f_cliente, r_empleado, l_empleado, m_empleado, r_rol, l_rol, m_rol, m_cant_pregunta_seguridad, m_tiempo_sesion, m_cant_caracteres, m_cant_simbolos, m_cant_num, v_bitacora, d_bitacora, estado", "'$nombre', $r_proveedores, $l_proveedores, $m_proveedores, $h_proveedores, $r_categoria, $r_presentacion, $r_productos, $l_productos, $e_productos, $g_venta, $l_venta, $d_venta, $f_venta, $est_venta, $r_servicio, $l_servicio, $m_servicio, $r_cliente, $l_cliente, $m_cliente, $h_cliente, $f_cliente, $r_empleado, $l_empleado, $m_empleado, $r_rol, $l_rol, $m_rol, $m_cant_pregunta_seguridad, $m_tiempo_sesion, $m_cant_caracteres, $m_cant_simbolos, $m_cant_num, $v_bitacora, $d_bitacora, 1")) {
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

/* ----------------- modulo para cambiar el estado de un rol ------------------ */
$id_rol = modeloprincipal::limpiar_cadena($_POST["id_rol"]);

if ($modulo === "activo"){

    if(modeloprincipal::UpdateSQL("rol","estado = '0'", "id_rol = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol Desactivado!", 
                        text:"El rol del sistema se desactivo exitosamente", 
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
    if(modeloprincipal::UpdateSQL("rol","estado = '1'", "id_rol = '$id_usuario'")){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    swal({ 
                        title:"¡Rol activado!", 
                        text:"El rol del sistema se activo exitosamente", 
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