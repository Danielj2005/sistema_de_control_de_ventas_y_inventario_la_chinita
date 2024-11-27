<?php

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// modulo a trabajar
$modulo = modeloPrincipal::limpiar_cadena($_POST["modulo"]);

if($modulo == 'Guardar'){
    $cedula = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
    
    $id_productos = $_POST['producto'];
    $cantidad_productos = $_POST['cantidad_producto'];
    $precios_dolar_productos = $_POST['precio_dolar'];
    $precios_bolivares_productos = $_POST['precio_bolivar'];
    
    $fecha_entrada_auto = date('Y-m-d h:i:s');

    $fecha_entrada = $_POST['fecha_entrada'];    
    $hora_entrada = $_POST['hora_entrada'];    
    
    $fecha_entrada = date('Y-m-d H:i:s', strtotime($fecha_entrada.' '.$hora_entrada));
    
    $existe_proveedor = modeloPrincipal::Consultar("SELECT id_proveedor FROM proveedor 
        WHERE cedula_rif = '$cedula'");
        
    $dolarPrice = $_POST['dolar'];

    if(mysqli_num_rows($existe_proveedor) < 1){

        $cedula = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula']);
        $nombre = modeloPrincipal::limpiar_mayusculas($_POST["nombre_proveedor"]);
        $correo = modeloPrincipal::limpiar_cadena($_POST["correo"]);
        $direccion = modeloPrincipal::limpiar_mayusculas($_POST["direccion"]);
        $telefono = modeloPrincipal::limpiar_cadena($_POST["telefono"]);

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
        if (modeloPrincipal::verificar_datos("[A-Z0-9\-]{7,10}", $cedula)) {
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "El campo CÉDULA / RIF no cumple con el formato establecido",
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
                    text: "El campo NOMBRE no cumple con el formato establecido",
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
                    text: "El campo CORREO no cumple con el formato establecido",
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
                    text: "El campo TEÉLEFONO no cumple con el formato establecido",
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
                });
            </script>';
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
    }

    $id_proveedor = modeloPrincipal::Consultar("SELECT id_proveedor FROM proveedor 
        WHERE cedula_rif = '$cedula'");

    $id_proveedor = mysqli_fetch_array($id_proveedor);
    $id_proveedor = $id_proveedor['id_proveedor'];
    // verificar datos
    if($cedula == "" || $id_productos == "" || $cantidad_productos == "" || $id_proveedor == "" || $precios_bolivares_productos == ""){
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio una error!",
                text: "Exiten Campos obligatorios Que Estan Vacíos",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }

    for($i = 0; $i < COUNT($cantidad_productos); $i++){

        // se registran los datos verificados
        if (modeloPrincipal::InsertSQL( "entrada","id_producto, id_proveedor, precio_compra_dolar, precio_compra_bs, stock_comprado, fecha_entrada, id_dolar","".$id_productos[$i].",$id_proveedor,".$precios_dolar_productos[$i].", ".$precios_bolivares_productos[$i].",".$cantidad_productos[$i].",'$fecha_entrada',$dolarPrice")) {
            modeloPrincipal::UpdateSQL("producto","precio_compra_dolar = ".$precios_dolar_productos[$i].", precio_compra_bs = ".$precios_bolivares_productos[$i].",stock = stock + ".$cantidad_productos[$i].", estatus = 1", "id_producto = ".$id_productos[$i]."");
            echo '<script type="text/javascript">
                swal({
                    title:"¡Registro Exitoso!",
                    text:"Los datos de se Registraron Correctamente",
                    type: "success",
                    confirmButtonText: "Aceptar"
                },
                function(isConfirm){  
                    if (isConfirm) {
                        window.location="../vista/entrada_de_productos.php";
                    } else { 
                        window.location="../vista/entrada_de_productos.php";
                    } 
                });
            </script>';
        }else{ // mensaje de error "no se pudo registrar"
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "los datos no se pudieron registrar, verifique he intente de nuevo",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
    }
}

