<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_productos + l_productos');

// permisos de las vistas y modulos del sistema 
// la P significa premiso ej. categoriaP (categoria Permiso)
$categoriaP = rol_model::permisos_modulos('r_categoria + m_categoria + l_categoria');
$r_categoriaP = rol_model::permisos_modulos('r_categoria');
$m_categoriaP = rol_model::permisos_modulos('m_categoria');
$l_categoriaP = rol_model::permisos_modulos('l_categoria');

$presentacionP = rol_model::permisos_modulos('r_presentacion + m_presentacion + l_presentacion');
$r_presentacionP = rol_model::permisos_modulos('r_presentacion');
$m_presentacionP = rol_model::permisos_modulos('m_presentacion');
$l_presentacionP = rol_model::permisos_modulos('l_presentacion');

$marcaP = rol_model::permisos_modulos('r_marca + m_marca + l_marca');
$r_marcaP = rol_model::permisos_modulos('r_marca');
$m_marcaP = rol_model::permisos_modulos('m_marca');
$l_marcaP = rol_model::permisos_modulos('l_marca');

$productoP = rol_model::permisos_modulos('r_productos + l_productos');
$r_productoP = rol_model::permisos_modulos('r_productos');
$l_productoP = rol_model::permisos_modulos('l_productos');

// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1 || $rol == 2) {  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- titulo -->
        <title>Gestión de Productos</title> 
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
                <h1 class="text-center titulosH">Gestión de Productos</h1>
            </div>
            <section class="section dashboard">
                <div class="row">      

                    <!-- registro y listado de Categoría -->
                
                    <div id="card_categorias" class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center card-body <?= $categoriaP == 0 ? 'd-none eraser' : ''?>">
                        <div class="accordion" id="categorias_accordion">
                            <div class="accordion-item text-center justify-content-center align-items-center row">
                                <h3 class="accordion-header my-3 col fs-4 text-center">
                                    <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#categoriasCard" aria-expanded="true" aria-controls="collapseOne">
                                        Categorías
                                    </button>
                                </h3>

                                <div id="categoriasCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row">
                                        <form id="añadir_categoria" action="../controlador/categoria_controller.php" method="post" class="SendFormAjax <?= $r_categoriaP == 0 ? 'd-none eraser' : '' ?>" autocomplete="off" data-type-form="save">
                                        
                                            <h5 class="card-title <?= $r_categoriaP == 0 ? 'd-none' : ''?>">Añadir Nueva Categoría</h5>
                                            <input type="hidden" name="modulo" value="Guardar">          
                                            <div class="row mb-3 justify-content-center text-start">
                                                <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                                <div class="col-12 mb-3">
                                                    <input form="añadir_categoria" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="ingresa el nombre" class="form-control" id="input_añadir_categoria" name="nombre_categoria">
                                                </div>
    
                                                <div class="col-12 mb-3 text-start">
                                                    <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                </div>
                                            </div>
                                        </form>
    
                                        <div class="text-center col-12 col-md-6 mb-3 <?= $l_categoriaP == 0 ? 'd-none eraser' : '' ?>" id="ver_listas_categoria">
                                            <button id="btn_ver_listas_categoria" modal="ver_categorias" url="./modal/producto/lista_categoria.php" type="button" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>
    
                                        <div class="text-center col-12 col-md-6 mb-3 <?= $r_categoriaP == 0 ? 'd-none eraser' : '' ?>" id="btn_registrar_categoria">
                                            <button type="submit" form="añadir_categoria" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- registro y listado de presentación -->
                
                    <div id="card_presentacion" class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center card-body <?= $presentacionP == 0 ? 'd-none eraser' : ''?>">
                        <div class="accordion" id="presentacion_accordion">
                            <div class="accordion-item text-center justify-content-center align-items-center row">
                                <h3 class="accordion-header my-3 col fs-4 text-center">
                                    <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#presentacionCard" aria-expanded="true" aria-controls="collapseOne">
                                        Presentación
                                    </button>
                                </h3>
    
                                <div id="presentacionCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row">
                                        <form id="form_presentacion" action="../controlador/presentacion.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                            <h5 class="card-title">Añadir una nueva presentación</h5>
                                            <input type="hidden" name="modulo" value="Guardar">          
                                            <div class="row mb-3">
                                                <div class="col-12 mb-3 text-start">
                                                    <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                                    <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="nombre_presentacion" name="nombre_presentacion">
                                                </div>

                                                <div class="col-12 mb-3 text-start">
                                                    <label class="col-form-label">Descripción <span style="color:#f00;">*</span> </label>
                                                    <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{4,250}" required="" placeholder="ingresa la descripción" class="form-control" id="descripcion_presentacion" name="descripcion_presentacion">
                                                </div>

                                                <div class="col-12 mb-3 text-start">
                                                    <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="text-center col-12 col-md-6 mb-3 <?= $l_presentacionP == 0 ? 'd-none eraser' : ''?>">
                                            <button id="btn_ver_listas_presentacion" type="button" modal="ver_presentaciones" url="./modal/producto/lista_presentacion.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>

                                        <div class="text-center col-12 col-md-6 mb-3 <?= $r_presentacionP == 0 ? 'd-none eraser' : ''?>" id="btn_registrar_presentacion">
                                            <button type="submit" form="form_presentacion" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- registro y listado de Marca -->

                    <div id="card_marcas" class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center card-body <?= $marcaP == 0 ? 'd-none eraser' : ''?>">
                        <div class="accordion" id="marcas_accordion">
                            <div class="accordion-item text-center justify-content-center align-items-center row">
    
                                <h3 class="accordion-header my-3 col fs-4 text-center">
                                    <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#marcasCard" aria-expanded="true" aria-controls="collapseOne">
                                        Marca
                                    </button>
                                </h3>
    
                                <div id="marcasCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row">
                                        <h5 class="card-title">Añadir una nueva Marca</h5>
    
                                        <form id="form_marca" action="../controlador/marca.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                            <input type="hidden" name="modulo" value="Guardar">          
                                            <div class="row mb-3">
                                                <div class="col-12 mb-3 text-start">
                                                    <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                                    <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="id" name="nombre_marca">
                                                </div>
    
                                                <div class="col-12 mb-3 text-start">
                                                    <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                </div>
    
                                            </div>
                                        </form>
    
                                        <div class="text-center col-12 col-md-6 mb-3 <?= $l_marcaP == 0 ? 'd-none eraser' : ''?>">
                                            <button id="btn_ver_listas_marca" type="button" modal="ver_marcas" url="./modal/producto/lista_marcas.php" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                        </div>
    
                                        <div class="text-center col-12 col-md-6 mb-3 <?= $r_marcaP == 0 ? 'd-none eraser' : ''?>" id="btn_registrar_marca">
                                            <button type="submit" form="form_marca" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- registro y listado de productos -->

                    <div class="col-12 mb-3 pagetitle text-center <?= $productoP == 0 ? 'd-none eraser' : ''?>">
                        <div class="card">
                            <div class="card-body row">
                                <h3 id="titleModuleProducts" class="my-3 col-12 fs-4 titulosH">Lista de Productos</h3>
                        
                                <div class="setCol col-md-6 text-center col-12 col-md-4 mb-3 <?= $l_productoP == 0 ? 'd-none eraser' : ''?>">
                                    <button id="btn-toggle" onclick="toggle()" type="button" class="col-12 btn btn-success bi bi-plus"> Registrar Productos</button>
                                </div>

                                <div class="tableRegisterProducts d-none text-center col-12 col-md-4 mb-3 <?= $r_productoP == 0 ? 'd-none eraser' : ''?>">
                                    <button type="button" id="btn_add_card_product" class="col-12 btn btn-success bi bi-plus">&nbsp; Añadir un producto a registrar</button>
                                </div>

                                <div class="setCol col-md-6 text-center col-12 col-md-4 mb-3 row m-0">
                                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_productos.php">Exportar Lista de Productos</a>
                                </div>

                                <form id="registrar_producto" action="../controlador/producto_controlador.php" method="post" class="text-start SendFormAjax row justify-content-around <?= $r_productoP == 0 ? 'd-none eraser' : ''?>" autocomplete="off" data-type-form="save">
                                    <input type="hidden" name="modulo" value="Guardar">
                                    <div class="col-12 mb-1">
                                        <div class="form-group">
                                            <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                        </div>
                                    </div>

                                                                        
                                    <div id="tableListProducts" class="table table-responsive">
                                        <table class="table example mb-3" id="example">
                                            <thead>
                                                <tr>
                                                    <th class="col text-center" scope="col">#</th>
                                                    <th class="col text-center" scope="col">Nombre</th>
                                                    <th class="col text-center" scope="col">Cantidad</th>
                                                    <th class="col text-center" scope="col">Precio de Venta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php producto_model::lista(); ?>  
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="tableRegisterProducts" class="d-none table table-responsive">
                                        <table class="table mb-3">
                                            <thead>
                                                <tr>
                                                    <th class="col text-center" scope="col">Nombre del Producto <span style="color:#f00;"> *</span></th>
                                                    <th class="col text-center" scope="col">Seleccione una Marca <span style="color:#f00;"> * </span> </th>
                                                    <th class="col text-center" scope="col">Seleccione una Presentación <span style="color:#f00;"> * </span> </th>
                                                    <th class="col text-center" scope="col">Seleccione una Categoría <span style="color:#f00;"> * </span> </th>
                                                    <th class="col text-center" scope="col">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableProduct">
                                                <?php //producto_model::lista(); ?>
                                                <tr id="producto_1">
                                                    <td class="text-center">
                                                        <div class="col-12 mb-3">
                                                            <input type="text" class="form-control mb-3" list="datalist_nombre_productos" name="nombre_producto[]" id="input_nombre_producto2" placeholder="Escribe el nombre del producto" autocomplete="off">
                                                            <datalist id="datalist_nombre_productos">
                                                                <?php producto_model::options_nombres_productos(); ?> 
                                                            </datalist>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="col-12 mb-3">
                                                            <input type="text" class="form-control mb-3" list="datalist_marca" name="marcas[]" id="input_nombre_marca" placeholder="Seleccione una Marca" autocomplete="off">
                                                            <datalist id="datalist_marca">
                                                                <?php marca_model::options(); ?>
                                                            </datalist>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="col-12 mb-3">
                                                            <input type="text" class="form-control mb-3" list="datalist_nombre_presentacion" name="presentacion[]" id="input_nombre_presentacion" placeholder="Seleccione una Presentación" autocomplete="off">
                                                            <datalist id="datalist_nombre_presentacion">
                                                                <?php presentacion_model::options(); ?>
                                                            </datalist>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="col-12 mb-3">
                                                            <input type="text" class="form-control mb-3" list="datalist_nombre_categoria" name="categoria[]" id="input_nombre_categoria" placeholder="Seleccione una Categoría" autocomplete="off">
                                                            <datalist id="datalist_nombre_categoria">
                                                                <?php category_model::options(); ?>
                                                            </datalist>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" onclick="document.getElementById(`producto_1`).remove();" class="btn btn-danger bi bi-trash"></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>             

                                <div class="tableRegisterProducts d-none text-center  <?= $r_productoP == 0 ? 'd-none eraser' : ''?>">
                                    <button type="submit" form="registrar_producto" class="btn btn-success bi bi-plus"> Registrar producto(s)</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </main>

        <script type="text/javascript">
            const toggle = ()=> {
                const btnToggle = document.getElementById('btn-toggle');
                btnToggle.classList.toggle('btn-success');
                btnToggle.classList.toggle('btn-secondary');
                btnToggle.classList.toggle('bi-plus');
                btnToggle.classList.toggle('bi-list-columns-reverse');

                const titleBtn = [' Registrar Productos',' Ver lista'];
                btnToggle.textContent = btnToggle.textContent == titleBtn[0] ? titleBtn[1] : titleBtn[0]  ;

                document.getElementById('tableRegisterProducts').classList.toggle('d-none');
                document.getElementById('tableListProducts').classList.toggle('d-none');

                const titleRegister = "Registro de Productos";
                const titleList = "Lista de Productos";
                const titleModule = document.getElementById('titleModuleProducts');
                
                titleModule.textContent == titleList ? titleModule.textContent = titleRegister : titleModule.textContent = titleList;

                document.querySelectorAll('.tableRegisterProducts').forEach(element => {
                    element.classList.toggle('d-none');
                });
                document.querySelectorAll('.setCol').forEach(element => {
                    element.classList.toggle('col-md-6');
                });

            };
        </script>
        <script type="text/javascript" src="./js/añadir_producto.js"></script>
        <?php 
            include_once "./modal/plantillaModalCustom.php"; 
            modalCustom ("modal-xl");
            // se incluye el footer / pie de pagina a la vista
            include_once "../include/footer.php";
            // se incluyen los script de javascript a la vista 
            include_once "../include/scripts_include.php"; 
        
            model_user::validar_sesion_activa($id_usuario);
    
            config_model::verificar_actualizacion_configuracion(); 
            ?>
    </body>
</html>
<?php }else{
    // se registran las acciones del usuario en la bitacora y es redirijido al inicio
    bitacora::intento_de_acceso_a_vista_sin_permisos("lista de productos");
}