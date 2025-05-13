<?php 
// importacion de la conexion a la base de datos y al modelo principal
include_once("../modelo/modeloPrincipal.php");
/*------- función para mostrar los registros de una tabla -------*/
function consultar_registros($tabla){
        
    $id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario que inicio sesion
    
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