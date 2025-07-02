<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo principal
include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_productos + l_productos');

// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1 || $rol == 2) {  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- titulo -->
        <title>Gestión de Inventario Principal</title> 
        <?php 
            // se incluyen los meta datos 
            include_once "../include/meta_include.php"; 
            // se incluyen los estilos css y sus librerias a la vista
            include_once "../include/css_include.php"; ?>
    </head>
    <body>
        <?php 
            // se incluye el header / encabezado a la vista
            include_once "../include/header.php";
            // se incluye el menu lateral a la vista 
            include_once "../include/sliderbar.php"; ?>
        <main id="main" class="main">
            <div class="pagetitle">
                <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            </div>
            <section class="section dashboard">
                <div class="row">      

                    <!-- registro y listado de Categoría -->
                
                    <div class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center">
                        <div class="card">
                            <h1 class="my-3 col">Categoría</h1>

                            <div class="card-body text-start">
                                <h5 class="card-title">Añadir Nueva Categoría</h5>

                                <form id="añadir_categoria" action="../controlador/categoria_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                    <input type="hidden" name="modulo" value="Guardar">          
                                    <div class="row mb-3">
                                        <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                        <div class="col-12 mb-3">
                                            <input form="añadir_categoria" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="ingresa el nombre" class="form-control" id="input_añadir_categoria" name="nombre_categoria">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="button" modal="ver_categorias" url="./modal/producto/lista_categoria.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="submit" form="añadir_categoria" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- registro y listado de presentación -->
                
                    <div class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center">
                        <div class="card">
                            <h1 class="my-3 col">Presentación</h1>
                            <div class="card-body text-start">
                                <h5 class="card-title">Añadir una nueva presentación</h5>
                                <form id="form_presentacion" action="../controlador/presentacion.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                    <input type="hidden" name="modulo" value="Guardar">          
                                    <div class="row mb-3">
                                        <div class="col-12 mb-3">
                                            <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                            <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="nombre_presentacion" name="nombre_presentacion">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="col-form-label">Descripción <span style="color:#f00;">*</span> </label>
                                            <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{4,250}" required="" placeholder="ingresa la descripción" class="form-control" id="descripcion_presentacion" name="descripcion_presentacion">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="button" modal="ver_presentaciones" url="./modal/producto/lista_presentacion.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="submit" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- registro y listado de Marca -->

                    <div class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center">
                        <div class="card">
                            <h1 class="my-3 col">Marca</h1>
                            <div class="card-body text-start">
                                <h5 class="card-title">Añadir una nueva Marca</h5>
                                <form id="form_marca" action="../controlador/marca.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                    <input type="hidden" name="modulo" value="Guardar">          
                                    <div class="row mb-3">
                                        <div class="col-12 mb-3">
                                            <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                            <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="id" name="nombre_marca">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="button" modal="ver_marcas" url="./modal/producto/lista_marcas.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3">
                                            <button type="submit" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- registro y listado de productos -->

                    <div class="col-12 mb-3 pagetitle text-center">
                        <div class="card">
                            <div class="card-body row">
                                <h1 class="my-3 col-12">Productos</h1>
                        
                                <div class="text-center col-12 col-md-6 mb-3">
                                    <button type="button" modal="ver_categorias" url="./modal/producto/lista_categoria.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                </div>

                                <div class="text-center col-12 col-md-6 mb-3">
                                    <button type="button" id="btn_add_card_product" class="btn btn-success bi bi-plus">&nbsp; Añadir un producto a registrar</button>
                                </div>

                                <form id="registrar_producto" action="../controlador/producto_controlador2.php" method="post" class="text-start SendFormAjax row justify-content-around" autocomplete="off" data-type-form="save">
                                    <input type="hidden" name="modulo" value="Guardar">
                                    <div class="col-12 mb-1">
                                        <div class="form-group">
                                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                        </div>
                                    </div>

                                    <div class="card shadow-lg rounded-4 p-2 col-12 col-md-6 row" id="producto_1" style="max-width: 400px; width: 100%;">
                                        <label class="col-form-label card-title">Datos del Producto: </label>
                                        <div class="col-12 col-sm-12 mb-3 row">

                                            <div class="col-sm-12">
                                                <label class="col-form-label col-12 col-md-auto">Nombre del Producto <span style="color:#f00;"> *</span></label>
                                                <input type="text" class="form-control mb-3" list="datalistOptions" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre del producto" autocomplete="off">
                                                
                                                <datalist id="datalistOptions">
                                                    <?php producto_model::options_nombres_productos(); ?> 
                                                </datalist>
                                            </div>
                                        </div>

                                        <!-- selector de Marca  -->
                                        <div class="col-12 col-sm-12 mb-3">
                                            <label class="col-form-label">Selecciona una Marca<span style="color:#f00;">*</span></label>
                                            <div class="col-sm-12">
                                                <select name="id_marca[]" id="id_marca" class="form-select Select<?= $rand ?>">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php marca_model::options(); ?> 
                                                </select>
                                            </div>
                                        </div>

                                        <!-- selector de presentacion  -->
                                        <div class="col-12 mb-3">
                                            <label class="col-form-label">Selecciona una Presentación <span style="color:#f00;">*</span></label>
                                            <div class="col-sm-12">
                                                <select name="id_presentacion[]" id="select_presentacion" class="form-select Select<?= $rand ?>">
                                                    <option value="0">Selecciona una opción</option>
                                                    <?php presentacion_model::options(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- selector de categoría   -->
                                        <div class="col-12 mb-3">
                                            <label class="col-form-label">Selecciona una Categoría <span style="color:#f00;">*</span></label>
                                            <div class="col-sm-12">
                                                <select name="id_categoria[]" id="categoria" class="form-select Select<?= $rand ?>">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php category_model::options(); ?> 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" onclick="document.getElementById(`producto_1`).remove();" class="btn btn-danger bi bi-trash">&nbsp; Eliminar</button>
                                        </div>
                                    </div>
                                </form>             

                                <div class="text-center">
                                    <button type="submit" form="registrar_producto" class="btn btn-success bi bi-plus"> Registrar producto(s)</button>
                                </div>
                            </div>
                        </div>


                        <div class="card top-selling pb-3">
                            <div class="row p-2 text-center">
                                <div class="col-12 col-sm-12 col-md-6 mb-2 row m-0">
                                    <a class="col-12 btn btn-success" <?= rol_model::verificar_rol('r_productos') == 1 ? 'href="./agregar_producto.php"' : 'href="./productos.php" disbled' ?>>Añadir Nuevo Producto</a>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6 mb-2 row m-0">
                                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_productos.php">Exportar Lista de Productos</a>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="card-body pb-0">
                                <div class="bg-seondary" style="width: fit-content;">
                                    <label class="">El significado del texto de color: </label>
                                    <ul id="" class="ps-3 nav-content list-unstyled">
                                        <li> <label> <span class=""> Negro: Cantidad buena de productos en inventario. </span> </label> </li>
                                        <li> <label> <span class="text-warning"> Amarillo: Cantidad media de productos en inventario. </span> </label> </li>
                                        <li> <label> <span class="text-danger"> Rojo: Cantidad baja de productos en inventario. </span> </label> </li>
                                    </ul>
                                </div>

                                <h5 class="card-title">Lista de Productos</h5>
                                <div class="table table-responsive">
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center col" scope="col">#</th>
                                                <th class="text-center col" scope="col">Producto</th>
                                                <th class="text-center col" scope="col">Marca</th>
                                                <th class="text-center col" scope="col">Presentación</th>
                                                <th class="text-center col" scope="col">Categoría</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php producto_model::lista(); ?>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
            
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="body_modal"> </div>
                    <div class="modal-footer">
                        <button id="btn_guardar_modal" type="submit" class="btn btn-success"></button>
                        <button type="button" class="btn btn-secondary" id="close_modal" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="./js/añadir_producto.js"></script>
        <?php 
            // se incluye el footer / pie de pagina a la vista
            include_once "../include/footer.php";
            // se incluyen los script de javascript a la vista 
            include_once "../include/scripts_include.php"; 
        
            model_user::validar_sesion_activa($id_usuario);
    
            config_model::verificar_actualizacion_configuracion(); ?>
    </body>
</html>
<?php }else{
    // se registran las acciones del usuario en la bitacora y es redirijido al inicio
    bitacora::intento_de_acceso_a_vista_sin_permisos("lista de productos");
}