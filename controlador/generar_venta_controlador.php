<?php

session_start();
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

// modulo a trabajar
$modulo = modeloPrincipal::limpiar_cadena($_POST["modulo"]);

if($modulo == 'Guardar'){
    // datos del cliente 
    $id_cliente = $_POST['id_cliente'];
    $cedula_cliente = modeloPrincipal::limpiar_cadena($_POST['nacionalidad'].$_POST['cedula_cliente']); 
    
    // datos de los servicios
    $id_servicios = $_POST['servicios'];
    $cantidad_servicios = $_POST['cantidad_servicio'];
    $precio_servicio_dolar = $_POST['precio_servicio_dolar'];
    $precio_servicio_bolivar = $_POST['precio_servicio_bolivar'];

    // datos  de los productos
    $id_productos = $_POST['producto'];
    $cantidad_productos = $_POST['cantidad_producto'];
    $precios_dolar_productos = $_POST['precio_producto_dolar'];
    $precios_bolivares_productos = $_POST['precio_producto_bolivar'];

    // datos del metodo de pago
    $id_metodo_pago = $_POST['metodo_pago'];
    $cantidad_pago = $_POST['monto_pagar'];
    $referencia_pago = $_POST['num_referencia'];

    // datos de la venta 
    $precio_dolar = $_POST['dolar'];
    $fecha_venta = date('Y-m-d h:i:s');

    $sub_total_dolar = $_POST['sub_total_dolar'];
    $sub_total_bs = $_POST['sub_total_bs'];

    $total_venta_dolar = $_POST['total_dolar_venta_iva'];
    $total_venta_bolivares = $_POST['total_bolivares_venta_iva'];


    // se comprueba que se no hayan datos vacíos
    if ($id_metodo_pago == "" || $cantidad_pago == "" || $total_venta_dolar == "" || $total_venta_bolivares == "") {
        echo '<script type="text/javascript">
            swal({
                title: "¡Ocurrio una error!",
                text: "Debes seleccionar un método de pago y ingresar la cantidad del pago para generar una venta, verifique he intente de nuevo",
                type: "error",
                confirmBottonText: "Aceptar"
            });
        </script>';
        exit();
    }
    
    if($id_servicios[0] == "" && $id_productos[0] == "" ){
        echo '<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "Debes seleccionar un servicio o producto para generar una venta, verifique he intente de nuevo",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
        exit();
    }
    // se verifica que el cliente este registrado de otro modo lo registra
    $existe_cliente = modeloPrincipal::Consultar("SELECT id_cliente FROM cliente WHERE cedula = '$cedula_cliente'");

    if(mysqli_num_rows($existe_cliente) < 1){

        $nombre_cliente = modeloPrincipal::limpiar_mayusculas($_POST['nombre_cliente']);
        $telefono_cliente = modeloPrincipal::limpiar_cadena($_POST['telefono_cliente']);

         // verificar que no se hayan recibido datos en blanco o vacios 
        if($cedula_cliente == "" || $nombre_cliente == "" || $telefono_cliente == ""){
            echo'<script type="text/javascript">
                    swal({
                        title: "¡Ocurrio un error!",
                        text: "Existen campos obligatorios del cliente que están vacíos",
                        type: "error",
                        confirmBottonText: "Aceptar"
                    });
                </script>';
            exit();
        }
        // verificar que los datos cumplen con los parametros de formato
        if (modeloPrincipal::verificar_datos("[A-Z0-9\-]{7,10}", $cedula_cliente)) {
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
        if (modeloPrincipal::verificar_datos("[A-Za-zÁÉÍÚÓáéíóúñÑ ]{3,30}", $nombre_cliente)) {
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "El campo nombre y apellido no cumple con el formato establecido",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if (modeloPrincipal::verificar_datos("[0-9]{11}", $telefono_cliente)) {
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
        if (modeloPrincipal::InsertSQL("cliente","cedula, nombre, telefono","'$cedula_cliente','$nombre_cliente','$telefono_cliente'")) {
            $existe_cliente = modeloPrincipal::Consultar("SELECT id_cliente FROM cliente WHERE cedula = '$cedula_cliente'");
            echo '<script type="text/javascript">
                swal({
                    title:"¡Registro Exitoso!",
                    text:"Los datos del cliente se Registraron Correctamente",
                    type: "success",
                    confirmButtonText: "Aceptar"
                });
            </script>';
        }else{ /* mensaje de error "no se pudo registrar" */
            echo'<script type="text/javascript">
                swal({
                    title: "¡Ocurrio un error!",
                    text: "los datos del cliente no se pudieron registrar, verifique he intente de nuevo ",
                    type: "error",
                    confirmBottonText: "Aceptar"
                });
            </script>';
            exit();
        }
    }
    
    $id_cliente = mysqli_fetch_array($existe_cliente);
    $id_cliente = $id_cliente['id_cliente'];
    $id_usuario = $_SESSION["id_usuario"];

    // ************* se verifica que haya stock para los servicios *************
    if($id_servicios[0] !== "" && $id_productos[0] == "" ){

        // Verificación de si hay suficientes productos para el servicio solicitado
        for ($i = 0; $i < count($id_servicios); $i++) {
            // Obtener la cantidad de productos necesarios para el servicio
            $cantidad_producto_por_servicio = modeloPrincipal::consultar("SELECT id_producto, cantidad FROM detalles_menu WHERE id_menu = ". intval($id_servicios[$i]));
            
            $nombre_servicio = mysqli_fetch_array(modeloPrincipal::consultar("SELECT nombre_platillo FROM menu WHERE id_menu = ". intval($id_servicios[$i])));
            
            // Iterar sobre los productos necesarios
            while ($row_cantidad_producto_por_servicio = mysqli_fetch_array($cantidad_producto_por_servicio)) {

                $id_producto = intval($row_cantidad_producto_por_servicio['id_producto']);
                $cantidad_necesaria = intval($row_cantidad_producto_por_servicio['cantidad']) * intval($cantidad_servicios[$i]);

                $stock_producto_actual = modeloPrincipal::consultar("SELECT nombre_producto, stock FROM producto WHERE id_producto = $id_producto");
                $stock_producto_actual = mysqli_fetch_array($stock_producto_actual);

                if ($stock_producto_actual['stock'] < 0) {
                    modeloPrincipal::UpdateSQL("producto", "stock = 0, status = 0", "id_producto = ".intval($id_producto));
                }

                // Verificar si el stock es suficiente
                if ($stock_producto_actual['stock'] < $cantidad_necesaria) {
                    echo '<script type="text/javascript">
                            swal({
                                title: "¡Ocurrió un error!",
                                text: "El stock del producto `'.$stock_producto_actual['nombre_producto'] . '` se encuentra por debajo de la cantidad necesaria para dar un servicio de `'.$nombre_servicio['nombre_platillo'].'`, el stock actual es de ('.intval($stock_producto_actual['stock']).')",
                                type: "error",
                                confirmButtonText: "Aceptar"
                            });
                    </script>';
                    exit();
                }
                
            }
        }
    }

    // ************* se verifica que el stock sea igual o mayor a la cantidad solicitada *************
    if ($id_servicios[0] == "" && $id_productos[0] !== "" ){
        for ($i = 0; $i < count($id_productos); $i++) {
                
            $stock_producto = modeloPrincipal::consultar("SELECT nombre_producto,stock FROM producto WHERE id_producto = ".$id_productos[$i]."");
            $stock_producto = mysqli_fetch_array($stock_producto);

            if ($stock_producto['stock'] < $cantidad_productos[$i]) {
                echo'<script type="text/javascript">
                        swal({
                            title: "¡Ocurrio un error!",
                            text: "El stock del producto `'.$stock_producto['nombre_producto'] . '` se encuentra por debajo de la cantidad seleccionada, el stock actual es de ('.intval($stock_producto['stock']).')",
                            type: "error",
                            confirmBottonText: "Aceptar"
                        });
                    </script>';
                exit();

            }
            if ($stock_producto['stock'] < 1) {
                modeloPrincipal::UpdateSQL("producto", "stock = 0, estatus = 0", "id_producto = ".$id_productos[$i]."");
            }
        }    
    }

    // verifica que haya referencia y si estan vacias
    for ($i = 0; $i < count($referencia_pago); $i++) {
        if ($referencia_pago[$i] == "") { $referencia_pago[$i] = 0; }
    }

    // se registran los datos verificados
    if (modeloPrincipal::InsertSQL( "venta","fecha_venta, sub_total_dolares, sub_total_bs, monto_total_dolares, monto_total_bolivares, id_usuario, id_cliente","'$fecha_venta',$sub_total_dolar,$sub_total_bs,$total_venta_dolar,$total_venta_bolivares,$id_usuario,$id_cliente")){
        
        // se consulta la id de la venta recien registrada
        $id_venta = modeloPrincipal::consultar("SELECT id_venta from venta");
        $id_venta = mysqli_num_rows($id_venta);

        // ********************** cuendo la venta es solo de servicios ********************** 
        if($id_servicios[0] !== "" && $id_productos[0] == "" ){
            // ****** se regitra la venta de uno o más servicios
            for ($i = 0; $i < count($id_servicios); $i++) {

                modeloPrincipal::InsertSQL("detalles_venta", "id_servicio, cantidad_servicio, precio_servicio_dolares, precio_servicio_bolivares, id_venta","".$id_servicios[$i].",".$cantidad_servicios[$i].",".$precio_servicio_dolar[$i].",".$precio_servicio_bolivar[$i].",$id_venta");

                // Se insertan los detalles de una venta con solo servicios
                $restar_stock_producto = modeloPrincipal::consultar("SELECT D.id_producto, D.cantidad, P.stock 
                    FROM detalles_menu AS D INNER JOIN producto AS P ON D.id_producto = P.id_producto
                    WHERE id_menu = ".$id_servicios[$i]."");

                while ($mostrar = mysqli_fetch_array($restar_stock_producto)) {

                    // Se descuenta del stock
                    modeloPrincipal::UpdateSQL("producto", "stock = stock - ".(intval($mostrar['cantidad']) * intval($cantidad_servicios[$i])), "id_producto = " . intval($mostrar['id_producto']));
                    
                }
            }
            // se registra el metodo de pago
            for($i = 0; $i < COUNT($id_metodo_pago); $i++){
                
                if(intval($id_metodo_pago[$i]) == 1){ $id_metodo_pago[$i] = 'Divisa'; }
                if(intval($id_metodo_pago[$i]) == 2){ $id_metodo_pago[$i] = 'Punto de Venta'; }
                if(intval($id_metodo_pago[$i]) == 3){ $id_metodo_pago[$i] = 'Transferencia / Pago movíl'; }
                if(intval($id_metodo_pago[$i]) == 4){ $id_metodo_pago[$i] = 'Bolivares en Efectivo'; }

                $cantidad_abonada_bolivares = $precio_dolar * $cantidad_pago[$i];

                if($referencia_pago[$i] == 0){

                    // se insertan los detalles del metodo de pago de una venta sin referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                    
                }else{
                    // se insertan los detalles del metodo de pago de una venta con referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, referencia, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$referencia_pago[$i].",".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                
                }
            }
            
            echo '<script type="text/javascript">
                swal({
                    title:"Venta Realizada!",
                    text:"La venta se realizo correctamente",
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
        }

        //  ********************* cuando la venta es solo de productos ********************* 
        if ($id_servicios[0] == "" && $id_productos[0] !== "" ){ 
            // ****** se registra la venta de uno o más productos
            for ($i = 0; $i < count($id_productos); $i++) {
                
                modeloPrincipal::InsertSQL( "detalles_venta","id_producto, cantidad, precio_unidad_dolares, precio_unidad_bolivares, id_venta","".intval($id_productos[$i]).",".intval($cantidad_productos[$i]).",".floatval($precios_dolar_productos[$i]).",".floatval($precios_bolivares_productos[$i]).",$id_venta");
                
                // Se descuenta del stock
                modeloPrincipal::UpdateSQL("producto", "stock = stock - ".$cantidad_productos[$i]."","id_producto = ".$id_productos[$i]."");
        
            }
            
            // se registra el metodo de pago
            for($i = 0; $i < COUNT($id_metodo_pago); $i++){

                if(intval($id_metodo_pago[$i]) == 1){ $id_metodo_pago[$i] = 'Divisa'; }
                if(intval($id_metodo_pago[$i]) == 2){ $id_metodo_pago[$i] = 'Punto de Venta'; }
                if(intval($id_metodo_pago[$i]) == 3){ $id_metodo_pago[$i] = 'Transferencia / Pago movíl'; }
                if(intval($id_metodo_pago[$i]) == 4){ $id_metodo_pago[$i] = 'Bolivares en Efectivo'; }

                $cantidad_abonada_bolivares = $precio_dolar * $cantidad_pago[$i];

                if($referencia_pago[$i] == 0){

                    // se insertan los detalles del  metodo de pago de una venta sin referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                    
                }else{
                     // se insertan los detalles del metodo de pago de una venta con referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, referencia, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$referencia_pago[$i].",".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                
                }
            }
            
            echo '<script type="text/javascript">
                swal({
                    title:"Venta Realizada!",
                    text:"La venta se realizo correctamente",
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
        }

        //  ************** cuando la venta es de servicios y de productos ************** 
        if ($id_servicios[0] !== "" && $id_productos[0] !== "" ){

            // Se insertan los detalles de una venta con servicios y productos
            for ($i = 0; $i < count($id_servicios); $i++) {
                
                // Se insertan los detalles de una venta con solo servicios
                modeloPrincipal::InsertSQL("detalles_venta", "id_servicio, cantidad_servicio, precio_servicio_dolares, precio_servicio_bolivares, id_venta","".$id_servicios[$i].",".$cantidad_servicios[$i].",".$precio_servicio_dolar[$i].",".$precio_servicio_bolivar[$i].",$id_venta");
                
                $restar_stock_producto = modeloPrincipal::consultar("SELECT D.id_producto, D.cantidad, P.stock 
                    FROM detalles_menu AS D INNER JOIN producto AS P ON D.id_producto = P.id_producto
                    WHERE id_menu = ".$id_servicios[$i]."");
            
                while ($mostrar = mysqli_fetch_array($restar_stock_producto)) { // Cambié $consulta a $restar_stock_producto
                   // Se descuenta del stock
                    
                    modeloPrincipal::UpdateSQL("producto", "stock = stock - ".(intval($mostrar['cantidad']) * intval($cantidad_servicios[$i])), "id_producto = " . intval($mostrar['id_producto']));
                
                }
            }

            
            // descuento del stock de los productos
            for ($i = 0; $i < count($id_productos); $i++) {
            
                // se insertan los detalles de una venta 
                modeloPrincipal::UpdateSQL( "detalles_venta","id_producto = ".intval($id_productos[$i]).", cantidad = ".intval($cantidad_productos[$i]).", precio_unidad_dolares = ".floatval($precios_dolar_productos[$i]).", precio_unidad_bolivares = ".floatval($precios_bolivares_productos[$i]).""," id_venta = $id_venta");
                
                // Se descuenta del stock del producto
                modeloPrincipal::UpdateSQL("producto", "stock = stock - ".$cantidad_productos[$i]."","id_producto = ".$id_productos[$i]."");
        
            }

            // se registra el método de pago
            for($i = 0; $i < COUNT($id_metodo_pago); $i++){

                if(intval($id_metodo_pago[$i]) == 1){ $id_metodo_pago[$i] = 'Divisa'; }
                if(intval($id_metodo_pago[$i]) == 2){ $id_metodo_pago[$i] = 'Punto de Venta'; }
                if(intval($id_metodo_pago[$i]) == 3){ $id_metodo_pago[$i] = 'Transferencia / Pago movíl'; }
                if(intval($id_metodo_pago[$i]) == 4){ $id_metodo_pago[$i] = 'Bolivares en Efectivo'; }


                $cantidad_abonada_bolivares = $precio_dolar * $cantidad_pago[$i];

                if($referencia_pago[$i] == 0){
                    // se insertan los detalles del metodo de pago de una venta sin referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                }else{
                    // se insertan los detalles del metodo de pago de una venta con referencia
                    modeloPrincipal::InsertSQL( "detalles_pago","id_venta, metodo_pago, referencia, cantidad_abonada_dolares, cantidad_abonada_bolivares","$id_venta,'".$id_metodo_pago[$i]."',".$referencia_pago[$i].",".$cantidad_pago[$i].",$cantidad_abonada_bolivares");
                }
            }

            echo '<script type="text/javascript">
                swal({
                    title:"Venta Realizada!",
                    text:"La venta se realizo correctamente",
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
        }

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
