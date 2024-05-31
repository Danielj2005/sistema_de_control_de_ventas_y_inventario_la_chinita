<?php 
// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");


/*------- función para mostrar los registros de una tabla -------*/
function consultar_registros($tabla){
    
    // se consultan los registros dependiendo de la tabla
    if ($tabla === "categoria") {
        // script para crear una lista de categorias
        // se consultan las categorias de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT nombre FROM categoria");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td> </td>
                <td><?= $mostrar["nombre"]; ?></td>
            </tr>
        <?php  } 
    }
        if ($tabla === "categoria_opcion") {
        // script para crear una lista de categorias
        // se consultan las categorias de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT id_categoria, nombre FROM categoria");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
                <option value="<?php echo $mostrar["id_categoria"];?>"><?= $mostrar["nombre"]; ?></option>

        <?php  } 
    }
    if ($tabla === "tipo_usuario") {
        // script para crear una lista de tipos usuarios
        // se consultan las tipos usuarios de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT * FROM $tabla");
       // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($consulta)) {
            echo '<option class="" name="id_tipo" value="'.$row['id_tipo'].'" >'.$row['nombre'].'</option>';
        }
    }
    if($tabla === "seguridad"){
        // script para crear una lista con las preguntas de seguridad
        // se consultan todas las preguntas de seguridad registradas
        $datos = modeloPrincipal::consultar("SELECT * FROM $tabla"); 

        // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($datos)) {
            echo '<option class="" name="select_pregunta" value="'.$row['id_seguridad'].'" selected >'.$row['pregunta'].'</option>';
        }
        mysqli_free_result($datos); 
    }
    if($tabla === 'usuario'){
        // script para crear una lista de usuario
        // se consultan las usuario de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT id_usuario, cedula, nombre, apellido, telefono, estado FROM usuario WHERE id_usuario != '$_SESSION[user_id]' ORDER BY nombre ASC");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
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
    if($tabla === 'producto'){
        // script para crear una lista de productos disponibles
        // consulta de los productos registrados
        $consulta = modeloPrincipal::consultar("SELECT producto.nombre_producto, producto.precio_compra, producto.stock, producto.estatus, categoria.nombre FROM producto, categoria WHERE producto.id_categoria = categoria.id_categoria");

        // $consulta = "SELECT P.nombre_producto, P.id_producto, P.precio_venta, P.stock, C.nombre, E.nombre_status_p FROM producto AS P, categoria AS C, status_p AS E WHERE C.id_categoria = P.id_categoria AND P.id_status_p = E.id_status_p;";
        // $respuesta = mysqli_query($conn, $consulta);

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td><?php echo $mostrar["id_producto"]; ?></td>
                <td><?php echo $mostrar["nombre_producto"]; ?></td>
                <td><?php echo $mostrar["precio_compra"]; ?></td>
                <td><?php echo $mostrar["stock"]; ?></td>
                <td><?php echo $mostrar["nombre"]; ?></td>
                <td><?php echo $mostrar["estatus"]; ?></td>
            </tr>
            
        <?php }
    }
    if($tabla === 'menu'){
        $suma = 1;
        // script para crear una lista de productos disponibles
        // consulta de los productos registrados
        $consulta = modeloPrincipal::consultar("SELECT * FROM menu");

        // $consulta = "SELECT P.nombre_producto, P.id_producto, P.precio_venta, P.stock, C.nombre, E.nombre_status_p FROM producto AS P, categoria AS C, status_p AS E WHERE C.id_categoria = P.id_categoria AND P.id_status_p = E.id_status_p;";
        // $respuesta = mysqli_query($conn, $consulta);

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td><?php echo $suma; ?></td>
                <td><?php echo $mostrar["nombre_platillo"]; ?></td>
                <td><?php echo $mostrar["precio"]; ?></td>
                <td><?php echo $mostrar["descripcion"]; ?></td>
                <td><?php echo $mostrar["estatus"]; ?></td>
            </tr>
            <?php $suma ++; ?>
        <?php }
    }
    if($tabla === "seleccionar_producto"){
        // script para crear una lista con las preguntas de seguridad
        // se consultan todas las preguntas de seguridad registradas
        $datos = modeloPrincipal::consultar("SELECT P.nombre_producto, P.id_producto FROM producto"); 

        // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($datos)) {
            echo '<option class="" name="id_producto" value="'.$row['id_producto'].'" selected >'.$row['nombre_producto'].'</option>';
        }
        mysqli_free_result($datos); 
    }
    if ($tabla === 'proveedor') {
        
        // script para crear una lista de proveedor
        // se consultan las proveedor de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT * FROM proveedor");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td> </td>
                <td><?= $mostrar["cedula_rif"]; ?></td>
                <td><?= $mostrar["nombre"]; ?></td>
                <td><?= $mostrar["correo"]; ?></td>
                <td><?= $mostrar["direccion"]; ?></td>
                <td><?= $mostrar["telefono"]; ?></td>

                <td scope='col' class="text-center">
                    <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?= $mostrar["id_proveedor"]; ?>">
                    <button type="submit" class="btn btn-primary open-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">MODIFICAR</button>
                </td>

                <td scope='col' class="text-center">
                    <form action="historial.php" method="post">
                        <input type="hidden" name="valor" value="<?= $mostrar["id_cliente"]; ?>">
                        <button type="submit" class="btn btn-info">VER HISTORAL</button>
                    </form>
                </td> 
            </tr>
        <?php } 
    }
    if ($tabla === "cliente") {
       
        // script para crear una lista de cliente
        // se consultan las cliente de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT * FROM cliente");

        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td> </td>
                <td><?= $mostrar["cedula"]; ?></td>
                <td><?= $mostrar["nombre"]; ?></td>
                <td><?= $mostrar["telefono"]; ?></td>

                <td scope='col' class="text-center">
                    <form action="cliente_controller.php" method="post">
                        <input type="hidden" id="id_cliente" name="valor" value="<?= $mostrar["id_cliente"]; ?>">
                        <button type="submit" class="btn btn-primary open-modal" >MODIFICAR</button>
                    </form>
                </td>

                <td scope='col' class="text-center">
                    <form action="historial.php" method="post">
                        <input type="hidden" name="valor" value="<?= $mostrar["id_cliente"]; ?>">
                        <button type="submit" class="btn btn-info">VER HISTORAL</button>
                    </form>
                </td> 
            </tr>
        <?php } 
    }
}; 
/*------- fin de la función -------*/