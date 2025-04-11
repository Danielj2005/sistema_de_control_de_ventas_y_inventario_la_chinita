<?php
require "../config/ConfigServer.php";
require "./modeloPrincipal.php";
error_reporting(E_PARSE);

class modelo_usuario extends modeloPrincipal {
    
    /**********************************************************************/ 
    /*                MODULO de listas de usuarios                        */
    /**********************************************************************/ 
    
    // funcion para crear una lista de los tipos de usuarios
    
    public static function lista_tipo_usuarios(){
        $lista_tipo_usuarios = modeloPrincipal::consultar("SELECT * FROM tipo_usuario WHERE id_tipo != 1");
        while($row = mysqli_fetch_array($lista_tipo_usuarios)) { ?>
            <option class="" name="id_tipo" value="<?= $row['id_tipo']; ?>" ><?= $row['nombre']; ?></option>
        <?php 
        }
    }

    //  Funcion para pedir una lista de empleados del negocio 
    public static function lista_de_usuarios() {
        $lista_usuario = modeloPrincipal::consultar("SELECT id_usuario, cedula, nombre, apellido, telefono, estado FROM usuario WHERE id_tipo != 1 ORDER BY nombre ASC");
        // se imprimen los resultados de la consulta
        while ( $mostrar = mysqli_fetch_array($lista_usuario)) { ?>    
            <tr>
                <td></td>
                <td><?= $mostrar["cedula"]; ?></td>
                <td><?= $mostrar["nombre"]; ?></td>
                <td><?= $mostrar["apellido"]; ?></td>
                <td><?= $mostrar["telefono"]; ?></td>
                <td scope="row" class="text-center">
                    <form action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="updateAccounUser" >
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $mostrar["id_usuario"]; ?>">
                        
                        <?php if ($mostrar["estado"] === "1") { ?>
                            <input type="hidden" name="modulo" value="activo">
                            <button class="btn btn-success" title="estado del usuario">
                                <i class="zmdi zmdi-check"></i> Activo 
                            </button>
                        
                        <?php }else if ($mostrar["estado"] === "0") { ?>
                            <input type="hidden" name="modulo" value="inactivo">
                            <button class="btn btn-danger">
                                <i class="zmdi zmdi-close"></i> Inactivo 
                            </button>
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php }
    } 

    /**********************************************************************/ 
    /*                MODULO de preguntas de seguridad                    */
    /**********************************************************************/ 

    public static function lista_preguntas_seguridad() {
        $datos = modeloPrincipal::consultar("SELECT * FROM seguridad"); 

        // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($datos)) {
            echo '<option class="" name="select_pregunta" value="'.$row['id_seguridad'].'" selected >'.$row['pregunta'].'</option>';
        }
        mysqli_free_result($datos); 
    }

    
    /**********************************************************************/ 
    /*                MODULO de registro de usuarios                       */
    /**********************************************************************/ 
    public static function registrar_usuarios($cedula,$nombre,$apellido,$correo,$pass,$telefono,$direccion,$id_tipo) {
        if (modeloprincipal::InsertSQL("usuario", "cedula, nombre, apellido, correo, contraseña, telefono, direccion, id_tipo, estado", "'$cedula', '$nombre', '$apellido', '$correo', '$pass', '$telefono', '$direccion', '$id_tipo',1")) {
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


    
    /**********************************************************************/ 
    /*       MODULO de verificar datos del registro de usuarios           */
    /**********************************************************************/ 
    public static function validar_datos_de_registro_usuario($cedula,$nombre,$apellido,$correo,$contraseña,$contraseña2,$telefono,$direccion) {
        /********** verificar que las contraseñas coinciden **********/
        // se muestra un mensaje de error si las contraseñas no coinciden
        if ($contraseña !== $contraseña2) {
            echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"Las contraseñas no coinciden, por favor verifica e intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';
            exit(); 

        }
        if($cedula == "" || $nombre == "" || $apellido == "" || $correo == "" || $telefono == "" || $contraseña == ""){
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
        if (modeloprincipal::verificar_datos("[A-Za-z0-9-]{7,10}",$cedula)) {
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
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{4,20}",$apellido)) {
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
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,30}",$correo)) {
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
        if (modeloprincipal::verificar_datos("[0-9]{11}",$telefono)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo telefono no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloprincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ0-9- ]{10,50}",$direccion)) {
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
        if (modeloprincipal::verificar_datos("[A-Za-zñÑÁÉÍÚÓáéíóúñÑ0-9\.\*\_\-]{8,16}", modeloprincipal::decryption($contraseña))) {
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "El campo CONTRASEÑA no cumple con el formato establecido",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
    }


    
    /***************************************************************/ 
    /*       funcion para generar un token para un usuario         */
    /***************************************************************/ 
    public static function generateToken() {
        do {

            // Generar un token de 11 dígitos
            $token = '';
            for ($i = 0; $i < 11; $i++) {
                $token .= mt_rand(0, 9); // Concatenar un número aleatorio entre 0 y 9
            }
            // Verificar si el token ya existe en la base de datos
            $existToken = Self::consultar("SELECT token FROM usuario WHERE token = '$token'");
        } while (mysqli_num_rows($existToken) > 0); // Repetir si el token ya existe
        return $token;
    }

    /***************************************************************/ 
    /*       funcion para obtener el token de un usuario           */
    /***************************************************************/ 
    public static function getToken($id_usuario) {
        
    }



}
