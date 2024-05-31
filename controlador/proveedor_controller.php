<?php
error_reporting(E_PARSE);

/* archivos de configuración y conexión a la base de datos */

session_start();

include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// modulo a trabajar
$modulo = $_POST["modulo"];
// $opcion = $_POST["opcion"];

// modulo para Guardar un registro
if($modulo === "Guardar" ){

    /*-- se reciben los datos y se guardan en una variables --*/
    $cedula = modeloprincipal::limpiar_cadena($_POST["nacionalidad"].$_POST["cedula"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre"]);
    $apellido = modeloprincipal::limpiar_mayusculas($_POST["apellido"]);
    $correo = modeloprincipal::limpiar_cadena($_POST["correo"]);
    $telefono = modeloprincipal::limpiar_cadena($_POST["telefono"]);
    $tipo_solicitante = modeloprincipal::limpiar_cadena($_POST['tipo_solicitante']);
    $descripcion = '';

    if($tipo_solicitante == 3){

        $pertenece = modeloprincipal::limpiar_cadena($_POST['pertenece']);
        $institucion = modeloprincipal::limpiar_mayusculas($_POST['descripcion']);
    
        // se define el texto de la descripción
        if($pertenece == 0 ){ // descripcion de un solicitante que no pertenece a la unefa
            $pertenece = 'El visitante pertenece a la institucion ';
            $descripcion = $pertenece.$institucion;

        }else if($pertenece == 1){ // descripcion de un solicitante que no pertenece a la unefa
            $pertenece = 'El visitante pertenece a la Comunidad ';
            $descripcion = $pertenece.$institucion;
        }
    }
    
    /* se consulta la base de datos para verificar que no exista un registro con los mismos datos*/
    if(mysqli_num_rows(modeloprincipal::consultar("SELECT id FROM solicitante WHERE cedula = '$cedula'")) < 1){

        // verificar que no se hayan recibido datos en blanco o vacios 
        if($cedula == "" || $nombre == "" || $apellido == "" || $correo == "" || $telefono == "" || $tipo_solicitante == ''){
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
        if (modeloprincipal::verificar_datos("[A-Z0-9\-]{7,10}", $cedula)) {
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "El campo CÉDULA no cumple con el formato establecido",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}", $nombre)) {
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
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}", $apellido)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo APELLIDO no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\.\@]{11,30}", $correo)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo CORREO no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloprincipal::verificar_datos("[0-9]{11}", $telefono)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo TEÉLEFONO no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
       
        // los datos verificados se registran en la base de datos
        if (modeloprincipal::InsertSQL("solicitante","cedula, nombre, apellido, correo, telefono, descripcion, tipo_solicitante","'$cedula','$nombre','$apellido','$correo','$telefono','$descripcion','$tipo_solicitante'")) {
            echo '<script type="text/javascript">
                    swal({
                        title:"¡Registro Exitoso!",
                        text:"Los datos se Registraron Correctamente",
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
    }else{ /********** solicitante ya existente no se puede registrar **********/
        echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Ya existe una Persona Registrada con esta CÉDULA, por favor ingresa otra CÉDULA", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>'; 
        exit();
    }
    
}

// modulo para Modificar un registro
if($modulo === "Modificar"){

    $id = modeloprincipal::limpiar_cadena($_POST["cedula"]);
    $nombre = modeloprincipal::limpiar_mayusculas($_POST["nombre"]);
    $telefono = modeloprincipal::limpiar_cadena($_POST["telefono"]);
    $correo = modeloprincipal::limpiar_cadena($_POST["correo"]);
    $direccion = modeloprincipal::limpiar_mayusculas($_POST['direccion']);

    // verificar que no se hayan recibido datos en blanco o vacios 
    if($nombre == "" || $correo == "" || $direccion == "" || $telefono == ""){
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
    // verificar que los datos cumplen con los parametros de formato
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóú ]{3,30}",$nombre)) {
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
    if (modeloprincipal::verificar_datos("[0-9]{11}",$telefono)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo TELÉFONO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\.\@\_\+\*]{11,30}",$correo)) {
        echo'<script type="text/javascript">
            swal({
                title: "¡Ocurrio un error!",
                text: "El campo CORREO no cumple con el formato establecido",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-\. ]{5,30}",$direccion)) {
        echo'<script type="text/javascript">
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
    if (modeloprincipal::UpdateSQL("proveedor"," nombre = '$nombre', correo = '$correo', telefono = '$telefono', direccion = '$direccion'","cedula_rif = $id")) {
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

?>