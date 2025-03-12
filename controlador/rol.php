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
    $l_proveedores = (!isset($_POST["l_proveedores"]) || $_POST["l_proveedores"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_proveedores"]);
    $m_proveedores = (!isset($_POST["m_proveedores"]) || $_POST["m_proveedores"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["m_proveedores"]);
    $h_proveedores = (!isset($_POST["h_proveedores"]) || $_POST["h_proveedores"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["h_proveedores"]);

    // vistas del modulo productos
    $r_categoria = (!isset($_POST["r_categoria"]) || $_POST["r_categoria"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_categoria"]);
    $r_presentacion = (!isset($_POST["r_presentacion"]) || $_POST["r_presentacion"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_presentacion"]);
    $r_productos = (!isset($_POST["r_productos"]) || $_POST["r_productos"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_productos"]);
    $l_productos = (!isset($_POST["l_productos"]) || $_POST["l_productos"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_productos"]);
    $e_productos = (!isset($_POST["e_productos"]) || $_POST["e_productos"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["e_productos"]);

    // vistas del modulo ventas
    $g_venta = (!isset($_POST["g_venta"]) || $_POST["g_venta"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["g_venta"]);
    $l_venta = (!isset($_POST["l_venta"]) || $_POST["l_venta"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_venta"]);
    $d_venta = (!isset($_POST["d_venta"]) || $_POST["d_venta"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["d_venta"]);
    $f_venta = (!isset($_POST["f_venta"]) || $_POST["f_venta"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["f_venta"]);
    $est_venta = (!isset($_POST["est_venta"]) || $_POST["est_venta"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["est_venta"]);
        
    // vistas del modulo menú
    $r_servicio = (!isset($_POST["r_servicio"]) || $_POST["r_servicio"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_servicio"]);
    $l_servicio = (!isset($_POST["l_servicio"]) || $_POST["l_servicio"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_servicio"]);
    $m_servicio = (!isset($_POST["m_servicio"]) || $_POST["m_servicio"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["m_servicio"]);

    // vistas del modulo usuario
    // vista de clientes
    $r_cliente = (!isset($_POST["r_cliente"]) || $_POST["r_cliente"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_cliente"]);
    $l_cliente = (!isset($_POST["l_cliente"]) || $_POST["l_cliente"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_cliente"]);
    $m_cliente = (!isset($_POST["m_cliente"]) || $_POST["m_cliente"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["m_cliente"]);
    $h_cliente = (!isset($_POST["h_cliente"]) || $_POST["h_cliente"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["h_cliente"]);
    $f_cliente = (!isset($_POST["f_cliente"]) || $_POST["f_cliente"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["f_cliente"]);
    // vista de empleados
    $r_empleado = (!isset($_POST["r_empleado"]) || $_POST["r_empleado"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_empleado"]);
    $l_empleado = (!isset($_POST["l_empleado"]) || $_POST["l_empleado"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_empleado"]);
    $m_empleado = (!isset($_POST["m_empleado"]) || $_POST["m_empleado"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["m_empleado"]);
    // vista de roles
    $r_rol = (!isset($_POST["r_rol"]) || $_POST["r_rol"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["r_rol"]);
    $l_rol = (!isset($_POST["l_rol"]) || $_POST["l_rol"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["l_rol"]);
    $m_rol = (!isset($_POST["m_rol"]) || $_POST["m_rol"] == "") ? '0' : modeloprincipal::limpiar_cadena($_POST["m_rol"]);

    // vistas del modulo configuración
    // vista de ajustes del sistema
    $m_cant_pregunta_seguridad = (!isset($_POST["m_cant_pregunta_seguridad"]) || $_POST["m_cant_pregunta_seguridad"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["m_cant_pregunta_seguridad"]);
    $m_tiempo_sesion = (!isset($_POST["m_tiempo_sesion"]) || $_POST["m_tiempo_sesion"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["m_tiempo_sesion"]);
    $m_cant_caracteres = (!isset($_POST["m_cant_caracteres"]) || $_POST["m_cant_caracteres"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["m_cant_caracteres"]);
    $m_cant_simbolos = (!isset($_POST["m_cant_simbolos"]) || $_POST["m_cant_simbolos"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["m_cant_simbolos"]);
    $m_cant_num = (!isset($_POST["m_cant_num"]) || $_POST["m_cant_num"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["m_cant_num"]);
    // vista de bitácora
    $v_bitacora = (!isset($_POST["v_bitacora"]) || $_POST["v_bitacora"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["v_bitacora"]);
    $d_bitacora = (!isset($_POST["d_bitacora"]) || $_POST["d_bitacora"] == "") ? '0' : modeloprincipal::limpiar_mayusculas($_POST["d_bitacora"]);
        

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