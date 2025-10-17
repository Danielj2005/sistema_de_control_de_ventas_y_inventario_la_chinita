<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario
include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion


$rol = rol_model::permisos_modulos('r_productos + l_productos + r_categoria + m_categoria + l_categoria + r_presentacion + m_presentacion + l_presentacion + r_marca + m_marca + l_marca');

// permisos del usuario al módulo categoría
$categoria = [
    "r_categoria" => rol_model::permisos_modulos("r_categoria"),
    "m_categoria" => rol_model::permisos_modulos("m_categoria"),
    "l_categoria" => rol_model::permisos_modulos("l_categoria"),
    'total' => rol_model::permisos_modulos("r_categoria + m_categoria + l_categoria")
];

// permisos del usuario al módulo presentacion
$presentacion = [
    "r_presentacion" => rol_model::permisos_modulos("r_presentacion"),
    "m_presentacion" => rol_model::permisos_modulos("m_presentacion"),
    "l_presentacion" => rol_model::permisos_modulos("l_presentacion"),
    'total' => rol_model::permisos_modulos("r_presentacion + m_presentacion + l_presentacion")
];

// permisos del usuario al módulo marcas
$marca = [
    "r_marca" => rol_model::permisos_modulos("r_marca"),
    "m_marca" => rol_model::permisos_modulos("m_marca"),
    "l_marca" => rol_model::permisos_modulos("l_marca"),
    'total' => rol_model::permisos_modulos("r_marca + m_marca + l_marca")
];

// permisos del usuario al módulo productos
$producto = [
    "r_productos" => rol_model::permisos_modulos("r_productos"),
    "l_productos" => rol_model::permisos_modulos("l_productos"),
    'total' => rol_model::permisos_modulos("r_productos + l_productos")
];


function colapseCol ($total_C, $total_P, $total_M) {

    if ($total_C == 0 && $total_P >= 1 && $total_M >= 1 || $total_C >= 1 && $total_P == 0 && $total_M >= 1 || $total_C >= 1 && $total_P >= 1 && $total_M == 0) {
        return ' col-md-6';
    }
    if ($total_C >= 1 && $total_P >= 1 && $total_M >= 1) {
        return ' col-md-4';
    }
    if ($total_C == 0 && $total_P == 0 && $total_M >= 1 || $total_C >= 1 && $total_P == 0 && $total_M == 0 || $total_C == 0 && $total_P >= 1 && $total_M == 0) {
        return ' col-md-12';
    }
}


// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 11) {  
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
            include_once "../include/sliderbar.php";
        ?>
        <main id="main" class="main">
            <div class="pagetitle">
                <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
                <h1 class="text-center titulosH">Gestión de Productos</h1>
            </div>
            <section class="section dashboard">
                <div class="row">      

                    
                    <?php if ($categoria['total'] > 0 ): ?>
                        <!-- registro y listado de Categoría -->

                        <div id="card_categorias" class="col-12 col-sm-12 col-md-4 mb-3 pagetitle text-center card-body <?= colapseCol($categoria['total'], $presentacion['total'], $marca['total']) ?>">
                            <div class="accordion" id="categorias_accordion">
                                <div class="accordion-item text-center justify-content-center align-items-center row">
                                    <h3 class="accordion-header my-3 col fs-4 text-center">
                                        <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#categoriasCard" aria-expanded="true" aria-controls="collapseOne">
                                            Categorías
                                        </button>
                                    </h3>

                                    <div id="categoriasCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body row justify-content-center p-0">
                                            <?php if ($categoria['r_categoria'] == 1 ): ?>
                                                <form id="añadir_categoria" action="../controlador/categoria_controller.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                                
                                                    <h5 class="card-title">Registrar Categoría</h5>
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

                                                <div class="text-center col-12 col-md-6 mb-3" id="btn_registrar_categoria">
                                                    <button type="submit" form="añadir_categoria" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                                </div>
                                            <?php endif; 
                                                if ($categoria['l_categoria'] == 1 ): ?>
                                                    <div class="text-center col-12 col-md-6 mb-3" id="ver_listas_categoria">
                                                        <button onclick="btn_show_modal('btn_modal', 'categoria')" id="btn_ver_listas_categoria" type="button" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                                    </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php endif;
                        if ($presentacion['total'] > 0 ): ?>
                            <!-- registro y listado de presentación -->

                            <div id="card_presentacion" class="col-12 col-sm-12 mb-3 pagetitle text-center card-body <?= colapseCol($categoria['total'], $presentacion['total'], $marca['total']) ?>">
                                <div class="accordion" id="presentacion_accordion">
                                    <div class="accordion-item text-center justify-content-center align-items-center row">
                                        <h3 class="accordion-header my-3 col fs-4 text-center">
                                            <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#presentacionCard" aria-expanded="true" aria-controls="collapseOne">
                                                Presentación
                                            </button>
                                        </h3>
            
                                        <div id="presentacionCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body row justify-content-center p-0">
                                                
                                                <?php if ($presentacion['r_presentacion'] == 1 ): ?>
                                                    <form id="form_presentacion" action="../controlador/presentacion.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                                        <h5 class="card-title">Registrar presentación</h5>
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
                                                    
                                                    <div class="text-center col-12 col-md-6 mb-3" id="btn_registrar_presentacion">
                                                        <button type="submit" form="form_presentacion" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                                    </div>

                                                <?php endif; 
                                                    if ($presentacion['l_presentacion'] == 1 ): ?>

                                                        <div class="text-center col-12 col-md-6 mb-3">
                                                            <button onclick="btn_show_modal('btn_modal', 'presentacion')" type="button" id="btn_ver_listas_presentacion" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                                        </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    <?php endif; 
                        if ($marca['total'] > 0 ): ?>
                            <!-- registro y listado de Marca -->

                            <div id="card_marcas" class="col-12 col-sm-12 mb-3 pagetitle text-center card-body <?= colapseCol ($categoria['total'], $presentacion['total'], $marca['total']); ?>">
                                <div class="accordion" id="marcas_accordion">
                                    <div class="accordion-item text-center justify-content-center align-items-center row">
            
                                        <h3 class="accordion-header my-3 col fs-4 text-center">
                                            <button class="accordion-button collapsed titulosH" type="button" data-bs-toggle="collapse" data-bs-target="#marcasCard" aria-expanded="true" aria-controls="collapseOne">
                                                Marca
                                            </button>
                                        </h3>
            
                                        <div id="marcasCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body row justify-content-center p-0">
                                                <?php if ($marca['r_marca'] == 1 ): ?>
                                                    
                                                    <form id="form_marca" action="../controlador/marca.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                                                        <h5 class="card-title">Registrar Marca</h5>
                                                        <input type="hidden" name="modulo" value="Guardar">          
                                                        <div class="row mb-3">
                                                            <div class="col-12 mb-3 text-start">
                                                                <label class="col-form-label">Nombre <span style="color:#f00;">*</span> </label>
                                                                <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="nombre_marca" name="nombre_marca">
                                                            </div>
                
                                                            <div class="col-12 mb-3 text-start">
                                                                <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                            </div>
                
                                                        </div>
                                                    </form>

                                                    <div class="text-center col-12 col-md-6 mb-3 " id="btn_registrar_marca">
                                                        <button type="submit" form="form_marca" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
                                                    </div>
                                                <?php endif; 
                                                    if ($marca['l_marca'] == 1 ): ?>
                                                        <div class="text-center col-12 col-md-6 mb-3 ">
                                                            <button onclick="btn_show_modal('btn_modal', 'marca')" id="btn_ver_listas_marca" type="button" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Ver lista</button>
                                                        </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    <?php endif;  ?>

                    <!-- registro y listado de productos -->

                    <div class="col-12 mb-3 pagetitle text-center">
                        <div class="card">
                            <div class="card-body row">
                                <h3 id="titleModuleProducts" class="my-3 col-12 fs-4 titulosH">
                                    <?= $producto['l_productos'] == 1 ? 'Lista de Productos' : 'Registro de Productos'?>
                                </h3>

                                
                                <?php if ($producto['r_productos'] == 1 && $producto['l_productos'] == 1 ): ?>
                                    <div class="setCol col-md-6 text-center col-md-4 col-12 mb-3">
                                        <button id="btn-toggle" onclick="toggle()" type="button" class="col-12 btn btn-success bi bi-plus"> Registrar Productos</button>
                                    </div>
                                <?php endif; 

                                    if ($producto['r_productos'] == 1 ): ?>
                                        <div class="tableRegisterProducts text-center col-12 col-md-4 mb-3 <?= $producto['l_productos'] == 0 ? 'col-md-6' : 'd-none'?> ">
                                            <button type="button" id="btn_add_card_product" class="col-12 btn btn-success bi bi-plus">&nbsp; Añadir un producto a la lista</button>
                                        </div>
                                <?php endif; ?>

                                <div class="setCol text-center col-12 col-md-4 mb-3 row m-0 <?= $producto['r_productos'] == 0 ? 'col-md-12' : 'col-md-6'?>">
                                    <a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_productos.php">Exportar Lista de Productos</a>
                                </div>

                                <?php if ($producto['l_productos'] == 1 ): ?>

                                    <div id="tableListProducts" class="justify-content-between align-items-center table table-responsive">
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
                                <?php endif;

                                    if ($producto['r_productos'] == 1 ): ?>

                                        <form id="registrar_producto" action="../controlador/producto_controlador.php" method="post" class="<?= $producto['l_productos'] == 0 ? '' : 'd-none'?> tableRegisterProducts text-start SendFormAjax row justify-content-around" autocomplete="off" data-type-form="save">
                                            <input type="hidden" name="modulo" value="Guardar">
                                            <div class="col-12 mb-1">
                                                <div class="form-group">
                                                    <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                </div>
                                            </div>

                                            <div id="tableRegisterProducts" class="<?= $producto['l_productos'] == 0 ? '' : 'd-none'?> table table-responsive">
                                                <table class="table mb-3">
                                                    <thead>
                                                        <tr>
                                                            <th class="col text-center" scope="col">Nombre del Producto <span style="color:#f00;"> *</span></th>
                                                            <th class="col text-center" scope="col">Selecciona una Marca <span style="color:#f00;"> * </span> </th>
                                                            <th class="col text-center" scope="col">Selecciona una Presentación <span style="color:#f00;"> * </span> </th>
                                                            <th class="col text-center" scope="col">Selecciona una Categoría <span style="color:#f00;"> * </span> </th>
                                                            <th class="col text-center" scope="col">Quitar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableProduct">
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

                                        <div class="tableRegisterProducts text-center <?= $producto['l_productos'] == 0 ? '' : 'd-none'?> ">
                                            <button type="submit" form="registrar_producto" class="btn btn-success bi bi-plus"> Registrar producto(s)</button>
                                        </div>
                                <?php endif; ?>  
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

        <?php 
            include_once "./modal/plantillaModalCustom.php"; 

            modalCustom ("modal-lg");

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