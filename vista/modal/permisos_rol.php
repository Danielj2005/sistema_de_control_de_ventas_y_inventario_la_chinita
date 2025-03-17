<?php
include_once("../../config/ConfigServer.php"); 
include_once("../../modelo/modeloPrincipal.php"); 

$id_rol = $_POST['id'];

$permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));

$nombre = $permisos['nombre'];
// cantidad de vistas de inventario
$proveedor = $permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['h_proveedores'];
$producto = $permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['e_productos'];
// cantidad de vistas de venta
$venta = $permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'];
// cantidad de vistas de menu
$menu = $permisos['r_servicio'] + $permisos['m_servicio'];
// cantidad de vistas de usuario
$cliente = $permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'];
$empleado = $permisos['r_empleado'] + $permisos['m_empleado'];
$rol = $permisos['r_rol'] + $permisos['m_rol'];
// cantidad de vistas de configuración
$ajustes = $permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'];
$bitacora = $permisos['v_bitacora'];

?>
<div class="container-fluid row mb-3 p-3 justify-content-around">
    <!-- vistas de proveedores -->
    <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3 row justify-content-center">
        <div class="col-12 col-md-12 mb-3 row justify-content-around">
            <h3 class="col-6 mb-2 text-center text-capitalize">Nombre del rol: <?= $nombre; ?></h3>
            <h3 class="col-6 mb-2 text-center text-capitalize">Estado del rol: <?= ($permisos['estado'] == 1) ? '<span class="text-success">activo</span>' : '<span class="text-danger">inactivo</span>' ?></h3>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">
                Inventario
                <?php if ($proveedor == 0 && $producto == 0 ) { ?>
                    : <span class="text-warning"> Sin acceso.</span>
                <?php } ?>
            </h4>

            <hr>

            <div class="row p-0 justify-content-around">

                <?php if ($proveedor <= 4 && $proveedor >= 1) { ?>
                    <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h4 class="card-title"> Proveedores </h4>
                        <ul class="nav-content">
                            <?php if ($permisos['r_proveedores'] == 1) { ?>
                                <li>
                                    <span>Registro de proveedores</span>
                                </li>
                            <?php }
                                if ($permisos['l_proveedores'] == 1) { ?>
                                <li>
                                    <span>Lista de proveedores registrados</span>
                                </li>
                            <?php } 
                                if ($permisos['m_proveedores'] == 1) { ?>
                                <li>
                                    <span>Modificar proveedores</span>
                                </li>
                            <?php } 
                                if ($permisos['h_proveedores'] == 1) { ?>
                                <li>
                                    <span>Historial de compras</span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } 

                    if ($producto <= 5 && $producto >= 1) { ?>
                        <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                            <h2 class="card-title"> Productos </h2>
                            <ul class="nav-content">
                                <?php if ($permisos['r_categoria'] == 1) { ?>
                                        <li>
                                            <span>Registro de categoría</span>
                                        </li>
                                <?php } 
                                    if ($permisos['r_presentacion'] == 1) { ?>
                                        <li>
                                            <span>Registro de presentación</span>
                                        </li>
                                <?php } 
                                    if ($permisos['r_productos'] == 1) { ?>
                                        <li>
                                            <span>Registro de productos</span>
                                        </li>
                                <?php } 
                                    if ($permisos['l_productos'] == 1) { ?>
                                        <li>
                                            <span>Lista de productos registrados</span>
                                        </li>
                                <?php } 
                                    if ($permisos['e_productos'] == 1) { ?>
                                        <li>
                                            <span>Entrada de productos</span>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php } ?>
            </div>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-6 mb-3">
            <h4 class="mb-3">
                Ventas
                <?php if ($venta == 0) { ?>
                    : <span class="text-warning"> Sin acceso. </span>
                <?php } ?>
            </h4>

            <hr>

            <?php if ($venta <= 4 && $venta >= 1) { ?>
                <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                    <ul class="nav-content"> 
                        <?php
                            if ($permisos['g_venta'] == 1) { ?>
                                <li>
                                    <span> Generar venta</span>
                                </li>
                        <?php } 
                            if ($permisos['l_venta'] == 1) { ?>
                                <li>
                                    <span>Lista de ventas realizadas</span>
                                </li>
                        <?php } 
                            if ($permisos['d_venta'] == 1) { ?>
                                <li>
                                    <span>Detalles de ventas realizadas</span>
                                </li>
                        <?php } 
                            if ($permisos['f_venta'] == 1) { ?>
                                <li>
                                    <span>Ver facturas de ventas realizadas</span>
                                </li>
                        <?php } 
                            if ($permisos['r_proveedores'] == 1) { ?>
                                <li>
                                    <span>Ver estadísticas de ventas realizadas</span>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>

        <div class="col-12 col-md-6 mb-3">
            <h4 class="mb-3">
                Menú
                <?php if ($menu == 0 ) { ?>
                    : <span class="text-warning"> Sin acceso. </span>
                <?php } ?>
            </h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <?php
                    if ($menu <= 3 && $menu >= 1) { ?>
                        <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                            
                            <ul class="nav-content"> 
                                <?php
                                    if ($permisos['r_servicio'] == 1) { ?>
                                        <li>
                                            <span>Registro de servicio</span>
                                        </li>
                                <?php }
                                    if ($permisos['l_servicio'] == 1) { ?>
                                        <li>
                                            <span>Lista de servicios registrados</span>
                                        </li>
                                <?php }
                                    if ($permisos['m_servicio'] == 1) { ?>
                                        <li>
                                            <span>Modificación de los servicios</span>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php } ?>
            </div>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">
                Usuario
                <?php if ($cliente == 0 && $empleado == 0 && $roles == 0) { ?>
                    : <span class="text-warning"> Sin acceso. </span>
                <?php } ?>
            </h4>

            <hr>

            <div class="row p-0 justify-content-around">

                <?php if ($cliente <= 5 && $cliente >= 1) { ?> 
                
                    <div class="border col-12 col-sm-12 col-md-4 w-auto mb-3 p-2 rounded-3">
                        <h4 class="card-title"> Cliente </h4>
                        <ul class="ul_cliente nav-content"> 
                            <?php
                                if ($permisos['r_cliente'] == 1) { ?>
                                    <li>
                                        <span>Registro de clientes</span>
                                    </li>
                            <?php } 
                                if ($permisos['l_cliente'] == 1) { ?>
                                    <li>
                                        <span>Lista de clientes registrados</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_cliente'] == 1) { ?>
                                    <li>
                                        <span>Modificación de clientes</span>
                                    </li>
                            <?php } 
                                if ($permisos['h_cliente'] == 1) { ?>
                                    <li>
                                        <span>Ver historial de clientes</span>
                                    </li>
                            <?php } 
                                if ($permisos['f_cliente'] == 1) { ?>
                                    <li>
                                        <span>Ver facturas de clientes</span>
                                    </li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } 
                    if ($empleado <= 3 && $empleado >= 1) { ?> 

                    <div class="border col-12 col-sm-12 col-md-4 w-auto mb-3 p-2 rounded-3">
                        <h2 class="card-title">  Empleados (usuarios) </h2>
                        <ul id="" class="nav-content">
                            <?php
                                if ($permisos['r_empleado'] == 1) { ?>
                                    <li>
                                        <span>Registro de empleados</span>
                                    </li>
                            <?php } 
                                if ($permisos['l_empleado'] == 1) { ?>
                                    <li>
                                        <span>Lista de empleados registrados</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_empleado'] == 1) { ?>
                                    <li>
                                        <span>Modificación de empleados</span>
                                    </li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } 
                    if ($rol <= 3 && $rol >= 1) { ?>

                        <div class="border col-12 col-sm-12 col-md-4 w-auto mb-3 p-2 rounded-3">
                            <h2 class="card-title"> Roles </h2>
                            <ul id="" class="nav-content">
                                <?php
                                    if ($permisos['r_rol'] == 1) { ?>
                                        <li>
                                            <span>Registro de roles</span>
                                        </li>
                                <?php } 
                                    if ($permisos['l_rol'] == 1) { ?>
                                        <li>
                                            <span>Lista de roles registrados</span>
                                        </li>
                                <?php } 
                                    if ($permisos['m_rol'] == 1) { ?>
                                        <li>
                                            <span>Modificación de roles</span>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php } ?>
            </div>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">
                Configuración
                <?php if ($cliente == 0 && $empleado == 0 && $roles == 0) { ?>
                    : <span class="text-warning"> Sin acceso. </span>
                <?php } ?>
            </h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <?php if ($ajustes <= 5 && $ajustes >= 1) { ?> 
                
                    <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                        <h4 class="card-title"> Ajustes del sistema </h4>
                        <ul class="nav-content">
                            <?php
                                if ($permisos['m_cant_pregunta_seguridad'] == 1) { ?>
                                    <li>
                                        <span>Modificar cantidad de preguntas de seguridad</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_tiempo_sesion'] == 1) { ?>
                                    <li>
                                        <span>Modificar tiempo de inactividad de sesión</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_cant_caracteres'] == 1) { ?>
                                    <li>
                                        <span>Modificar cantidad de carecteres</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_cant_simbolos'] == 1) { ?>
                                    <li>
                                        <span>Modificar cantidad de símbolos</span>
                                    </li>
                            <?php } 
                                if ($permisos['m_cant_num'] == 1) { ?>
                                    <li>
                                        <span>Modificar cantidad de números</span>
                                    </li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } 
                    if ($bitacora == 1) { ?>
                        <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                            <h2 class="card-title"> Bitácora </h2>
                            <ul  class="nav-content">
                                <?php
                                    if ($permisos['v_bitacora'] == 1) { ?>
                                        <li>
                                            <span>Ver bitácora</span>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>