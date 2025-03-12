<?php 
// importacion de la conexion a la base de datos y al modelo principal
include_once ("../config/ConfigServer.php");
include_once("../modelo/modeloPrincipal.php");

/*------- función para mostrar los registros de una tabla -------*/
function consultar_registros($tabla){
    $id_usuario = $_SESSION['user_id'];
        
    // se consultan los registros dependiendo de la tabla
    if ($tabla === "categoria") {
        // script para crear una lista de categorias
        // se consultan las categorias de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT * FROM categoria");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td class="col text-center"> </td>
                <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                <td scope="row" class="text-center">
                    <form action="../controlador/cambio_estado.php" method="post" class="SendFormAjax" data-type-form="updateEstado" >
                        
                        <?php if ($mostrar["estado"] === "1") { ?>

                            <input type="hidden" name="modulo" value="activo">                            
                            <input type="hidden" name="tabla" value="categoria">
                            <input type="hidden" name="id" value="<?= $mostrar["id_categoria"]; ?>">
                            <button <?= ($_SESSION['id_rol'] < "3") ? '' : 'disabled' ?> class="btn btn-success" title="estado de la categoría">Activa </button>
                        
                        <?php }else if ($mostrar["estado"] === "0") { ?>

                            <input type="hidden" name="modulo" value="inactivo">                            
                            <input type="hidden" name="tabla" value="categoria">
                            <input type="hidden" name="id" value="<?= $mostrar["id_categoria"]; ?>">
                            <button <?= ($_SESSION['id_rol'] < "3") ? '' : 'disabled' ?> class="btn btn-danger" title="estado de la categoría">Inactiva </button>
                        
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php  } 
    }

    if ($tabla === "categoria_opcion") {
        // script para crear una lista de categorias
        // se consultan las categorias de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT id_categoria, nombre FROM categoria WHERE estado = 1");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <option value="<?= $mostrar["id_categoria"];?>"><?= $mostrar["nombre"]; ?></option>

        <?php  } 
    }

    // en este apartado se genera un select con los roles
    if ($tabla === "rol") {
        // script para crear una lista de tipos usuarios
        // se consultan las tipos usuarios de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT * FROM rol WHERE id_rol != 1");
       // se imprimen los datos de la consulta 
        while($row = mysqli_fetch_assoc($consulta)) { ?>
            <option class="" name="id_tipo" value="<?= $row['id_rol'] ?>" ><?= $row['nombre'] ?></option>
        <?php }
    }

    if($tabla === 'usuario'){
        // script para crear una lista de usuario
        // se consultan las usuario de la base de datos
        $consulta = modeloPrincipal::consultar("SELECT id_usuario, cedula, nombre, apellido, telefono, estado FROM usuario 
            WHERE id_usuario != '$id_usuario' AND id_rol != 1 ORDER BY nombre ASC");
        // se guardan los datos en un array y se imprime
        while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
            <tr>
                <td></td>
                <td><?= $mostrar["cedula"]; ?></td>
                <td><?= $mostrar["nombre"]; ?></td>
                <td><?= $mostrar["apellido"]; ?></td>
                <td><?= $mostrar["telefono"]; ?></td>
                <td scope="row" class="text-center">
                    <buttom module="modificar_empleado" valor="<?= $mostrar["id_usuario"]; ?>" data-bs-toggle="modal" data-bs-target="#update_user" class="modificar_user btn btn-warning bi bi-gear"></buttom>
                </td>
                <td scope="row" class="text-center">
                    <?php if ($mostrar["estado"] === "1") { ?>
                        
                        <button <?= ($_SESSION['id_rol']  < "3") ? '' : 'disabled' ?> class="btn btn-success" title="estado del usuario">
                            <i class="zmdi zmdi-check"></i> Activo 
                        </button>
                    
                    <?php }else if ($mostrar["estado"] === "0") { ?>

                        <button <?= ($_SESSION['id_rol']  < "3") ? '' : 'disabled' ?> class="btn btn-danger">
                            <i class="zmdi zmdi-close"></i> Inactivo 
                        </button>
                    
                    <?php } ?>
                </td>
            </tr>
        <?php }
    }

    if($tabla === 'producto'){
        // script para crear una lista de productos disponibles
        // consulta de los productos registrados
        $consulta = modeloPrincipal::consultar("SELECT P.codigo, P.nombre_producto, P.precio_compra_dolar, P.precio_compra_bs, P.stock, 
            P.estatus, C.nombre, PS.nombre as nombre_presentacion FROM producto AS P 
            INNER JOIN categoria AS C ON C.id_categoria = P.id_categoria 
            INNER JOIN presentacion AS PS ON PS.id = P.id_presentacion 
            ORDER BY P.id_producto DESC");

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr class="<?php if($mostrar["stock"] == "0"){echo 'text-danger';}else if ($mostrar["stock"] < "5") { echo 'text-warning';} ?>">
                <td class="text-center"></td>
                <td class="text-center"><?= $mostrar["codigo"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre_producto"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre_presentacion"]; ?></td>
                <td class="text-center"><?= $mostrar["precio_compra_dolar"].' $'; ?></td>
                <td class="text-center"><?= $mostrar["precio_compra_bs"].' bs'; ?></td>
                <td class="text-center"><?= $mostrar["stock"]; ?></td>
                <td class="text-center"><?= $mostrar["nombre"]; ?></td>
                <td class="text-center <?= ($mostrar["estatus"] == '1') ? 'text-success':'text-danger'; ?>"><?= ($mostrar["estatus"] == '1') ? 'Activo':'Inactivo'; ?></td>
            </tr>
            
        <?php }
    }
    
    if($tabla === 'menu'){
        //  se consulta base de datos en busca de los servivios rgistrados
        $consulta = modeloPrincipal::consultar("SELECT * FROM menu");

        while ( $mostrar =  mysqli_fetch_assoc($consulta)) { ?>

            <tr>
                <td class="col text-center"> </td>
                <td class="col text-center"><?= $mostrar["nombre_platillo"]; ?></td>
                <td class="col text-center"><?= $mostrar["precio_dolar"].'$'; ?></td>
                <td class="col text-center"><?= strtoupper($mostrar["descripcion"]); ?></td>
                <td scope="row" class="text-center">
                    <form action="../controlador/cambio_estado.php" method="post" class="SendFormAjax" data-type-form="updateEstado" >
                        
                        <?php if ($mostrar["estatus"] === "1") { ?>

                            <input type="hidden" name="modulo" value="activo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-success" title="estado del servicio">Activo </button>
                        
                        <?php }else if ($mostrar["estatus"] === "0") { ?>

                            <input type="hidden" name="modulo" value="inactivo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-danger" title="estado del servicio">Inactivo </button>
                        
                        <?php } ?>
                    </form>
                </td>
            </tr>
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
                <td class="col text-center"></td>
                <td class="col text-center proveedor__<?= $mostrar["id_proveedor"]; ?>"><?= $mostrar["cedula_rif"]; ?></td>
                <td class="col text-center proveedor__<?= $mostrar["id_proveedor"]; ?>"><?= mb_strtoupper($mostrar["nombre"]); ?></td>
                <td class="col text-center proveedor__<?= $mostrar["id_proveedor"]; ?>"><?= $mostrar["correo"]; ?></td>
                <td class="col text-center proveedor__<?= $mostrar["id_proveedor"]; ?>"><?= $mostrar["telefono"]; ?></td>
                <td class="col text-center proveedor__<?= $mostrar["id_proveedor"]; ?>"><?= mb_strtoupper($mostrar["direccion"]); ?></td>

                <td scope='col' class="col text-center">
                    <input type="hidden" id="id_proveedor__<?= $mostrar["id_proveedor"]; ?>" name="id_proveedor" value="<?= $mostrar["id_proveedor"]; ?>">
                    <button type="submit" <?= ($_SESSION['id_rol']  < "3") ? '' : 'disabled' ?> class="btn btn-success bi bi-repeat" onclick="asignar_id_proveedor(<?= $mostrar['id_proveedor']; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                </td>

                <td scope='col' class="col text-center">
                    <button value="<?= $mostrar["id_proveedor"]; ?>" modal="modal_historial_proveedor" modulo="historial_proveedor" class="btn btn-info bi bi-eye detalles_generales" data-bs-toggle="modal" data-bs-target="#historial_proveedor"></button>
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
            <td class="text-center col"> </td>
            <td class="text-center col"><?= $mostrar["cedula"]; ?></td>
            <td class="text-center col"><?= $mostrar["nombre"]; ?></td>
            <td class="text-center col"><?= $mostrar["telefono"]; ?></td>

            <td scope='col' class="text-center col">
                <form action="clienteModificar.php" method="post" class="text-center">
                    <input type="hidden" id="id_cliente" name="valor" value="<?= $mostrar["id_cliente"]; ?>">
                    <button type="submit" <?= $permiso = ($_SESSION['id_rol'] == "1") ? '' : 'disabled'; ?> class="btn btn-success open-modal bi bi-repeat"></button>
                </form>
            </td>

            <td scope='col' class="text-center col">
                <button class="btn btn-info bi bi-eye detalles_generales" value="<?= $mostrar["id_cliente"]; ?>" modal="detalles_historial_cliente" modulo="historial_cliente" data-bs-toggle="modal" data-bs-target="#historial_cliente"></button>
            </td> 
        </tr>
    <?php }
    }
}; 
/*------- fin de la función -------*/