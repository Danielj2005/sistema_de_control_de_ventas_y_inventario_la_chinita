<?php
include_once("../../config/ConfigServer.php"); 
include_once("../../modelo/modeloPrincipal.php"); 

$id_rol = $_POST['id'];

$permisos = mysqli_fetch_assoc(modeloprincipal::consultar("SELECT * FROM rol WHERE id_rol = $id_rol"));

$nombre = $permisos['nombre'];
// cantidad de vistas de inventario
$proveedor = $permisos['r_proveedores'] + $permisos['m_proveedores'] + $permisos['l_proveedores'] + $permisos['h_proveedores'];
$producto = $permisos['r_categoria'] + $permisos['r_presentacion'] + $permisos['r_productos'] + $permisos['l_productos'] + $permisos['r_entrada'] + $permisos['l_entrada'];
// cantidad de vistas de venta
$venta = $permisos['g_venta'] + $permisos['d_venta'] + $permisos['f_venta'] + $permisos['l_venta'];
// cantidad de vistas de menu
$menu = $permisos['r_servicio'] + $permisos['m_servicio'] + $permisos['l_servicio'];
// cantidad de vistas de usuario
$cliente = $permisos['r_cliente'] + $permisos['m_cliente'] + $permisos['l_cliente'] + $permisos['h_cliente'] + $permisos['f_cliente'];
$empleado = $permisos['r_empleado'] + $permisos['m_empleado'] + $permisos['l_empleado'];
$rol = $permisos['r_rol'] + $permisos['m_rol'] + $permisos['l_rol'];
// cantidad de vistas de configuración
$ajustes = $permisos['m_cant_pregunta_seguridad'] + $permisos['m_tiempo_sesion'] + $permisos['m_cant_caracteres'] + $permisos['m_cant_simbolos'] + $permisos['m_cant_num'];

?>
<div class="container-fluid row mb-3 p-3 justify-content-around">
    <input type="hidden" value="<?= $id_rol ?>" name="id_rol">
    <input type="hidden" value="<?= $permisos['estado'] ?>" name="estado_rol">
    <input type="hidden" value="<?= $nombre ?>" name="nombre_rol">
    <input type="hidden" value="Modificar" name="modulo">

    <!-- vistas de proveedores -->
    <div class="col-12 col-sm-12 col-md-12 mb-1 m-0 rounded-3 row justify-content-center">
        <div class="col-12 col-md-12 mb-3 row justify-content-around">
            <h3 class="col-6 mb-2 text-center text-capitalize">Nombre del rol: <?= $nombre; ?></h3>
            <h3 class="col-6 mb-2 text-center text-capitalize">Estado del rol: <?= ($permisos['estado'] == 1) ? '<span class="text-success">activo</span>' : '<span class="text-danger">inactivo</span>' ?></h3>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Inventario</h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                    <h4 class="card-title">
                        <input id="proveedores" class="vista" <?= $proveedor == 4 ? 'checked' : '' ?> type="checkbox" value="proveedores">
                        Proveedores
                    </h4>
                    <ul id="" class="nav-content list-unstyled"> 
                        <li>
                            <input class="proveedores" type="checkbox" <?= $permisos['r_proveedores'] == 1 ? 'checked' : '' ?> value="1" name="r_proveedores">
                            <span>Registro de proveedores</span>
                        </li>
                        <li>
                            <input class="proveedores" type="checkbox" <?= $permisos['m_proveedores'] == 1 ? 'checked' : '' ?> value="1" name="m_proveedores">
                            <span>Modificar proveedores</span>
                        </li>
                        <li>
                            <input class="proveedores" type="checkbox" <?= $permisos['l_proveedores'] == 1 ? 'checked' : '' ?> value="1" name="l_proveedores">
                            <span>Lista de proveedores registrados</span>
                        </li>
                        <li>
                            <input class="proveedores" type="checkbox" <?= $permisos['h_proveedores'] == 1 ? 'checked' : '' ?> value="1" name="h_proveedores">
                            <span>Historial de compras</span>
                        </li>
                    </ul>
                </div>

                <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                    <h2 class="card-title">
                        <input class="vista" type="checkbox" <?= $producto == 6 ? 'checked' : '' ?> value="productos">
                        Productos
                    </h2>
                    <ul id="" class="nav-content list-unstyled">
                        <li>
                            <input name="r_categoria" class="productos" <?= $permisos['r_categoria'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de categoría</span>
                        </li>
                        <br>
                        <li>
                            <input name="r_presentacion" class="productos" <?= $permisos['r_presentacion'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de presentación</span>
                        </li>
                        <br>
                        <li>
                            <input name="r_productos" class="productos" <?= $permisos['r_productos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de productos</span>
                        </li>
                        <li>
                            <input name="l_productos" class="productos" <?= $permisos['l_productos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Lista de productos registrados</span>
                        </li>
                        <br>
                        <li>
                            <input name="r_entrada" class="productos" <?= $permisos['r_entrada'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Entrada de productos</span>
                        </li>
                        <li>
                            <input name="l_entrada" class="productos" <?= $permisos['l_entrada'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Lista de entrada de productos realizadas</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>
        <hr>

        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <h4 class="mb-3">Ventas</h4>
                
                <hr>

                <div class="row m-0 p-0 justify-content-around">
                    <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                            <input  class="vista" value="Ventas" <?= $venta == 5 ? 'checked' : '' ?> type="checkbox">
                            Ventas
                        </h2>
                        <ul id="" class="nav-content list-unstyled"> 
                        
                            <li>
                                <input name="g_venta" class="Ventas" <?= $permisos['g_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                <span>Generar venta</span>
                            </li>
                            <li>
                                <input name="l_venta" class="Ventas" <?= $permisos['l_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                <span>Lista de ventas realizadas</span>
                            </li>


                            <li>
                                <input name="d_venta" class="Ventas" <?= $permisos['d_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                <span>Detalles de ventas realizadas</span>
                            </li>

                            <li>
                                <input name="f_venta" class="Ventas" <?= $permisos['f_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                <span>Ver facturas de ventas realizadas</span>
                            </li>

                            <li>
                                <input name="est_venta" class="Ventas" <?= $permisos['est_venta'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                                <span>Ver estadísticas de ventas realizadas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <h4 class="mb-3"> Menú </h4>
                <hr>
                <div class="row p-0 justify-content-around">

                    <div class="border col-12 col-sm-12 col-md-12 mb-3 p-2 rounded-3">
                        <h2 class="card-title">
                            <input class="vista" type="checkbox" <?= $menu == 3 ? 'checked' : '' ?> value="servicio">
                            Menú
                        </h2>
                        <ul id="" class="nav-content list-unstyled"> 
                            <li>
                                <input name="r_servicio" class="servicio" value="1" type="checkbox" <?= $permisos['r_servicio'] == 1 ? 'checked' : '' ?>>
                                <span>Registro de servicio</span>
                            </li>

                            <li>
                                <input name="m_servicio" class="servicio" value="1" type="checkbox" <?= $permisos['m_servicio'] == 1 ? 'checked' : '' ?>>
                                <span>Modificación de los servicios</span>
                            </li>

                            <li>
                                <input name="l_servicio" class="servicio" value="1" type="checkbox" <?= $permisos['l_servicio'] == 1 ? 'checked' : '' ?>>
                                <span>Lista de servicios registrados</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Usuario</h4>

            <hr>

            <div class="row p-0 justify-content-around">
                <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                    <h4 class="card-title">
                        <input id="cliente" class="vista" type="checkbox" <?= $cliente == 5 ? 'checked' : '' ?> value="cliente">
                        Cliente
                    </h4>
                    <ul class="ul_cliente nav-content list-unstyled"> 
                        <li>
                            <input name="r_cliente" class="cliente" <?= $permisos['r_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de clientes</span>
                        </li>
                        <li>
                            <input name="m_cliente" class="cliente" <?= $permisos['m_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificación de clientes</span>
                        </li>

                        <li>
                            <input name="l_cliente" class="cliente" <?= $permisos['l_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Lista de clientes registrados</span>
                        </li>

                        <li>
                            <input name="h_cliente" class="cliente" <?= $permisos['h_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Ver historial de clientes</span>
                        </li>
                        
                        <li>
                            <input name="f_cliente" class="cliente" <?= $permisos['f_cliente'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Ver facturas de clientes</span>
                        </li>
                    </ul>
                </div>

                <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                    <h2 class="card-title">
                        <input class="vista" type="checkbox" <?= $empleado == 3 ? 'checked' : '' ?> value="empleado">
                        Empleados (usuarios)
                    </h2>
                    <ul id="" class="nav-content list-unstyled">
                        <li>
                            <input name="r_empleado" class="empleado" <?= $permisos['r_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de empleados</span>
                        </li>
                        <li>
                            <input name="m_empleado" class="empleado" <?= $permisos['m_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificación de empleados</span>
                        </li>
                        <li>
                            <input name="l_empleado" class="empleado" <?= $permisos['l_empleado'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Lista de empleados registrados</span>
                        </li>
                    </ul>
                </div>

                <div class="border col-12 col-sm-12 col-md-3 mb-3 p-2 rounded-3">
                    <h2 class="card-title">
                        <input class="vista" type="checkbox" <?= $rol == 3 ? 'checked' : '' ?> value="roles">
                        Roles
                    </h2>
                    <ul id="" class="nav-content list-unstyled">
                        <li>
                            <input name="r_rol" class="roles" <?= $permisos['r_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Registro de roles</span>
                        </li>
                        <li>
                            <input name="m_rol" class="roles" <?= $permisos['m_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificación de roles</span>
                        </li>
                        <li>
                            <input name="l_rol" class="roles" <?= $permisos['l_rol'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Lista de roles registrados</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>
        <hr>

        <div class="col-12 col-md-12 mb-3">
            <h4 class="mb-3">Configuración</h4>
            <hr>
            <div class="row p-0 justify-content-around">
                <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                    <h4 class="card-title">
                        <input class="vista" type="checkbox" <?= $ajustes == 5 ? 'checked' : '' ?> value="ajustes_sistema">
                        Ajustes del sistema
                    </h4>
                    <ul class="ul_cliente nav-content list-unstyled"> 
                        <li>
                            <input name="m_cant_pregunta_seguridad" class="ajustes_sistema" <?= $permisos['m_cant_pregunta_seguridad'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificar cantidad de preguntas de seguridad</span>
                        </li>

                        <li>
                            <input name="m_tiempo_sesion" class="ajustes_sistema" <?= $permisos['m_tiempo_sesion'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificar tiempo de inactividad de sesión</span>
                        </li>

                        <li>
                            <input name="m_cant_caracteres" class="ajustes_sistema" <?= $permisos['m_cant_caracteres'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificar cantidad de carecteres</span>
                        </li>
                    
                        <li>
                            <input name="m_cant_simbolos" class="ajustes_sistema" <?= $permisos['m_cant_simbolos'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificar cantidad de símbolos</span>
                        </li>
                        
                        <li>
                            <input name="m_cant_num" class="ajustes_sistema" <?= $permisos['m_cant_num'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Modificar cantidad de números</span>
                        </li>
                    </ul>
                </div>

                <div class="border col-12 col-sm-12 col-md-5 mb-3 p-2 rounded-3">
                    <h2 class="card-title">
                        <input class="vista" type="checkbox" value="bitacora" <?= ($permisos['v_bitacora'] == 1) ? 'checked' : '' ?>>
                        Bitácora
                    </h2>
                    <ul id="" class="nav-content list-unstyled">
                        <li>
                            <input name="v_bitacora" class="bitacora" <?= $permisos['v_bitacora'] == 1 ? 'checked' : '' ?> value="1" type="checkbox">
                            <span>Ver bitácora</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>