<?php 
// importacion de la conexion a la base de datos y al modelo principal
include_once("../modelo/modeloPrincipal.php");
/*------- función para mostrar los registros de una tabla -------*/
function consultar_registros($tabla){
        
    $id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario que inicio sesion
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
                <th></th>
                <th><?= $mostrar["cedula"]; ?></th>
                <th><?= $mostrar["nombre"]; ?></th>
                <th><?= $mostrar["apellido"]; ?></th>
                <th><?= $mostrar["telefono"]; ?></th>
                <th scope="col" class="col text-center">
                    <buttom 
                        modal="modificar_empleado" 
                        <?= rol_model::verificar_rol('m_empleado') == '1' ? 'url="./modal/usuario/modificar_empleado.php" data-bs-toggle="modal" data-bs-target="#update_user"' : 'disabled' ?> 
                        value="<?= $mostrar["id_usuario"]; ?>" 
                        class="btn_modal btn btn-warning bi bi-gear">
                    </buttom>
                </th>
                <th scope="col" class="col text-center">
                        <button <?= rol_model::verificar_rol('m_empleado') == '1' ?  '' : 'disabled' ?> 

                            class="btn <?= ($mostrar["estado"] === "1") ? 'btn-success' : 'btn-danger' ?>" > 
                                
                                <i class="zmdi <?= ($mostrar["estado"] === "1") ? 'zmdi-check' : 'zmdi-close' ?>"></i> 

                                <?= ($mostrar["estado"] === "1") ? 'Activo' : 'Inactivo' ?>
                        </button>
                </th>
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
                <td class="col text-center">
                    <button value="<?= $mostrar["id_menu"]; ?>" btn="modificar" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'url="./modal/modificar_servicio.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="<?= rol_model::verificar_rol('m_servicio') == '1' ? 'btn_modal' : '' ?> btn bi bi-gear btn-warning"></button>
                </td>
                <td scope="row" class="text-center">
                    <form action="<?= rol_model::verificar_rol('m_servicio') == '1' ? '../controlador/cambio_estado.php' : './menu.php'?>" method="post" class="SendFormAjax" data-type-form="updateEstado" >
                        
                        <?php if ($mostrar["estatus"] === "1") { ?>

                            <input type="hidden" name="modulo" value="activo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-success" title="estado del servicio" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'type="submit"' : 'disabled' ?> >Activo </button>
                        
                        <?php }else if ($mostrar["estatus"] === "0") { ?>

                            <input type="hidden" name="modulo" value="inactivo">                            
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id" value="<?= $mostrar["id_menu"]; ?>">
                            <button class="btn btn-danger" title="estado del servicio" <?= rol_model::verificar_rol('m_servicio') == '1' ? 'type="submit"' : 'disabled' ?> >Inactivo </button>
                        
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
    
}; 

/*------- fin de la función -------*/