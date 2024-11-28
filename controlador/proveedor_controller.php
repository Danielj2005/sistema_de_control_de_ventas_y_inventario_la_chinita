<?php
error_reporting(E_PARSE);
session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// modulo a trabajar
$modulo = $_POST["modulo"];

// modulo para Guardar un registro
if($modulo == "Guardar" ){

    $cedula = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
    $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_proveedor"]);
    $correo = modeloPrincipal::limpiar_cadena($_POST["correo"]);
    $direccion = modeloPrincipal::limpiar_mayusculas($_POST["direccion"]);
    $telefono = modeloPrincipal::limpiar_cadena($_POST["telefono"]);

    /* se consulta la base de datos para verificar que no exista un registro con los mismos datos*/
    if(mysqli_num_rows(modeloPrincipal::consultar("SELECT id_proveedor FROM proveedor WHERE cedula_rif ='$cedula'")) < 1){
        // verificar que no se hayan recibido datos en blanco o vacios 
        if($cedula == "" || $nombre == "" || $correo == "" || $telefono == "" || $direccion == ""){
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "Existen campos obligatorios que están vacíos",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
        // verificar que los datos cumplen con los parametros de formato
        if (modeloPrincipal::verificar_datos("[V|E|J|P][0-9|-]{5,12}", $cedula)) {
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "El campo Cédula / RIF no cumple con el formato establecido",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
        if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}", $nombre)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo Nombre no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\. ]{3,70}", $direccion)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo Dirección no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\.\@]{11,70}", $correo)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo Correo no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloPrincipal::verificar_datos("[0-9]{11}", $telefono)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo Teléfono no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        // los datos verificados se registran en la base de datos
        if (modeloPrincipal::InsertSQL("proveedor","cedula_rif, nombre, correo, direccion, telefono","'$cedula','$nombre','$correo','$direccion','$telefono'")) {
            echo '<script type="text/javascript">
                swal({
                    title:"¡Registro Exitoso!",
                    text:"Los datos del proveedor se Registraron Correctamente",
                    type: "success",
                    confirmButtonText: "Aceptar"
                },
                function(isConfirm){  
                    if (isConfirm) {
                        window.location="../vista/proveedor.php";
                    } else { 
                        window.location="../vista/proveedor.php";
                    } 
                });
            </script>';
            exit();
        }else{ /* mensaje de error "no se pudo registrar" */
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
    }else{ /********** proveedor ya existente no se puede registrar **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya existe este Proveedor Registrado en nuestro sistema, por favor ingresa otra CÉDULA / RIF.", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit();
    }
    
}

// modulo para Modificar un registro
if($modulo == "Modificar"){

    $id_proveedor_modificar = $_POST["id_proveedor_modificar"];
    $cedula = modeloPrincipal::limpiar_mayusculas($_POST["cedula"]);
    $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre"]);
    $correo = modeloPrincipal::limpiar_cadena($_POST["correo"]);
    $direccion = modeloPrincipal::limpiar_mayusculas($_POST["direccion"]);
    $telefono = modeloPrincipal::limpiar_cadena($_POST["telefono"]);

    // verificar que no se hayan recibido datos en blanco o vacios 
    if($cedula == "" || $id_proveedor_modificar == "" || $nombre == "" || $correo == "" || $direccion == "" || $telefono == ""){
        echo '<script type="text/javascript">
                swal({
                    title: "¡Ocurrió un error!",
                    text: "Existen campos obligatorios que están vacíos",
                    type: "error",
                    confirmButtonClass: "btn btn-primary"
                });
            </script>';
        exit();
    }

    if (modeloprincipal::verificar_datos("[V|E|J|P][0-9|-]{5,12}",$cedula)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo cédula no cumple con el formato requerido, el formato debe ser, por ejemplo (V-12345678), datos permitidos (V,E,J,P), por favor verifique e intente de nuevo ",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    // verificar que los datos cumplen con los parametros de formato
    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóú ]{3,40}",$nombre)) {
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo NOMBRE no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    if (modeloPrincipal::verificar_datos("[0-9]{11}",$telefono)) {
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo TELÉFONO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\.\@\_\+\*]{11,70}",$correo)) {
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo CORREO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9 ]{5,70}",$direccion)) {
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo DIRECCIÓN no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    // despues de verificar los datos se modifican
    if (modeloPrincipal::UpdateSQL("proveedor","cedula_rif = '$cedula', nombre = '$nombre', correo = '$correo', telefono = '$telefono', direccion = '$direccion'","id_proveedor = '$id_proveedor_modificar'")) {
        echo '<script type="text/javascript">
            swal({
                title:"¡Modificación Exitosa!",
                text:"Los datos se modificaron  correctamente",
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
        </script>';
        exit();
    } else { /*** mensaje de error "no se pudo registrar ***/
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "Los datos no se modificaron, verifique he intente nuevamente",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
}
