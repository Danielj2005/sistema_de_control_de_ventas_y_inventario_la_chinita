<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario
include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

$rol = rol_model::permisos_modulos('r_productos + l_productos + l_categoria + r_presentacion + m_presentacion + l_presentacion + r_marca + m_marca + l_marca');

// permisos del usuario al módulo categoría
$categoria = [
    "l_categoria" => rol_model::permisos_modulos("l_categoria"),
    'total' => rol_model::permisos_modulos("m_categoria + l_categoria")
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


// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 9) {  ?>

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
        <body class="toggle-sidebar">
            <?php 
                // se incluye el header / encabezado a la vista
                include_once "../include/header.php";
                // se incluye el menu lateral a la vista 
                include_once "../include/sliderbar.php";
            ?>
            <main id="main" class="main">
                <div class="pagetitle">
                        
                    <a class="btn btn-outline-secondary mb-3" href="./inicio.php">
                        <i class="bi bi-chevron-left"></i> 
                        <span>Volver al Panel Principal</span>
                    </a>
                    <h1 class="text-center titulosH my-2 fs-1">Gestión de Productos</h1>
                </div>
                <section class="section dashboard">
                    <div class="row m-0"> 

                        <?php if ($categoria['l_categoria'] == 1 || $presentacion['total'] > 0 || $marca['total'] > 0): ?>
                            <!-- listado de Categoría -->

                            <div id="card_gestion_productos" class="col-12 col-sm-12 col-md-12 mb-3 pagetitle text-center row m-0 p-0 justify-content-around">

                                <?php if ($categoria['l_categoria'] == 1): ?>
                                    <div id="" class="text-center col-12 col-sm-12 col-md-3 fs-4 border card">
                                        <h3 class="text-center mt-2 titulosH fs-3">Categorías</h3>
                                        <div class="text-center mb-2">
                                            <button modal="listaCategoria" id="btn_ver_listas_categoria" type="button" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Lista de Categorías</button>
                                        </div>
                                    </div>   
                                <?php endif;
                                    if ($presentacion['r_presentacion'] == 1 || $presentacion['l_presentacion'] == 1 ): ?>

                                        <div id="" class="text-center col-12 col-sm-12 col-md-4 fs-4 border card">
                                            <h3 class=" text-center mt-2 titulosH fs-3">Presentaciones</h3>

                                            <div class="justify-content-center text-center mb-2">
                                                <?php if ($presentacion['r_presentacion'] == 1): ?>
                                                        <button modal="registrarPresentacion" data-bs-toggle="modal" data-bs-target="#modal" type="button" class="mb-2 btn_modal btn btn-success bi bi-plus ">&nbsp; Nueva Presentación</button>
                                                <?php endif; 
                                                    if ($presentacion['l_presentacion'] == 1 ): ?>
                                                        <button modal="listaPresentacion" id="btn_ver_listas_presentacion" type="button" class="btn_modal btn btn btn-secondary bi bi-list-task " data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Lista de Presentaciones</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>   
                                <?php endif; 
                                    if ($marca['r_marca'] == 1 || $marca['l_marca'] == 1 ): ?>

                                        <div id="" class="text-center col-12 col-sm-12 col-md-3 fs-4 card border">
                                            <h3 class="text-center mt-2 titulosH fs-3">Marcas</h3>
                                            
                                            <div class="justify-content-around text-center mb-2">
                                                <?php if ($marca['r_marca'] == 1): ?>
                                                        <button modal="registrarMarca" type="button" data-bs-toggle="modal" data-bs-target="#modal" class="mb-2 btn_modal btn btn-success bi bi-plus">&nbsp; Nueva Marca</button>
                                                <?php endif; 
                                                    if ($marca['l_marca'] == 1 ): ?>
                                                        <button modal="listaMarca" id="btn_ver_listas_marca" type="button" class="btn_modal btn btn btn-secondary bi bi-list-columns-reverse" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Lista de Marcas</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>  
                                <?php endif; ?>              
                            </div>
                            
                        <?php endif; ?>

                        <!-- registro y listado de productos -->

                        <div class="col-12 mb-3 pagetitle text-center">
                            <div class="card">
                                <div class="card-body row m-0 p-3">
                                    
                                    <?php if ($producto['r_productos'] == 1 && $producto['l_productos'] == 1 ): ?>
                                        <div class="setCol col-md-6 text-center col-md-4 col-12 mb-3">
                                            <button id="btn-toggle" onclick="toggle()" type="button" class="col-12 btn btn-success bi bi-plus"> Registrar Productos</button>
                                        </div>
                                    <?php endif; 

                                        if ($producto['r_productos'] == 1 ): ?>
                                            <div class="tableRegisterProducts text-center col-12 col-md-4 mb-3 <?= $producto['l_productos'] == 0 ? 'col-md-6' : 'd-none'?> ">
                                                <button type="button" id="btn_add_card_product" class="col-12 btn btn-success bi bi-plus">&nbsp;Agregar a la Lista de Producto</button>
                                            </div>
                                    <?php endif; ?>

                                    <div class="setCol text-center col-12 col-md-4 mb-2 <?= $producto['r_productos'] == 0 ? 'col-md-12' : 'col-md-6'?>">
                                        <div class="col-12 dropdown">
                                            <button class="col-12 btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-file-text"></i>
                                                <span>Exportar Lista (.PDF)</span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li> <hr class="dropdown-divider"> </li>
                                                <li class="p-2 text-center">
                                                    <a class="btn btn-outline-primary" target="_blank" href="./reportes/lista_productos.php">
                                                        <i class="bi bi-file-text"></i> 
                                                        <span>Todos los Productos</span>
                                                    </a>
                                                </li>
                                                <li> <hr class="dropdown-divider"> </li>
                                                <li class="p-2 text-center">
                                                    <form action="./reportes/lista_productos.php" method="post" class="" target="_blank">
														<input type="hidden" name="UUIDS" value="<?= modeloPrincipal::encryptionId("1") ?>">
                                                            
                                                        <button type="submit" class="btn btn-outline-success">
                                                            <i class="bi bi-file-text"></i> 
                                                            <span>Productos Con Stock</span>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li> <hr class="dropdown-divider"> </li>
                                                <li class="p-2 text-center">
                                                    <form action="./reportes/lista_productos.php" method="post" class="" target="_blank">
														<input type="hidden" name="UUIDS" value="<?= modeloPrincipal::encryptionId("0") ?>">
                                                            
                                                        <button type="submit" class="btn btn-outline-danger" >
                                                            <i class="bi bi-file-text"></i> 
                                                            <span>Productos sin Stock</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>
                                    
                                    <h3 id="titleModuleProducts" class="my-3 col-12 fs-3 titulosH"><?= $producto['l_productos'] == 1 ? 'Inventario de Productos' : 'Registro de Productos'?></h3>

                                    <?php if ($producto['l_productos'] == 1 ): ?>

                                        <div id="tableListProducts" class="justify-content-between align-items-center table table-responsive">
                                            <table class="table example mb-3" id="example">
                                                <thead>
                                                    <tr>
                                                        <th class="col text-center" scope="col">N.º</th>
                                                        <th class="col text-center" scope="col">Código</th>
                                                        <th class="col text-center" scope="col">Nombre</th>
                                                        <th class="col text-center" scope="col">Presentación</th>
                                                        <th class="col text-center" scope="col">Marca</th>
                                                        <th class="col text-center" scope="col">Categoría</th>
                                                        <th class="col text-center" scope="col">Stock</th>
                                                        <th class="col text-center" scope="col">Precio de Venta</th>
                                                        <th class="col text-center" scope="col">Última Entrada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php producto_model::lista(); ?>  
                                                </tbody>
                                            </table>
                                        </div>

                                    <?php endif; if ($producto['r_productos'] == 1 ): ?>
                                            <form id="registrar_producto" action="../controlador/producto_controlador.php" method="post" class="<?= $producto['l_productos'] == 0 ? '' : 'd-none'?> tableRegisterProducts text-start SendFormAjax row justify-content-around" autocomplete="off" data-type-form="save">
                                                <input type="hidden" name="id_dolar" id="dolar" value="<?= modeloPrincipal::obtener_id_precio_dolar(); ?>">
                                                <input type="hidden" name="modulo" value="Guardar">
                                                    
                                                <div id="reader" style="display: none;"></div>

                                                <div id="result"></div>

                                                <div class="col-12 mb-1">
                                                    <div class="form-group">
                                                        <p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                                                    </div>
                                                </div>

                                                <div id="tableRegisterProducts" class="<?= $producto['l_productos'] == 0 ? '' : 'd-none'?> table table-responsive">
                                                    <table class="table mb-3">
                                                        <thead>
                                                            <tr>
                                                                <th class="col text-center" scope="col">Código<span style="color:#f00;"> * </span></th>
                                                                <th class="col text-center" scope="col">Nombre <span style="color:#f00;"> * </span></th>
                                                                <th class="col text-center" scope="col">Marca <span style="color:#f00;"> * </span></th>
                                                                <th class="col text-center" scope="col">Presentación <span style="color:#f00;"> * </span></th>
                                                                <th class="col text-center" scope="col">Categoría <span style="color:#f00;"> * </span></th>
                                                                <th class="col text-center" scope="col">Quitar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tableProduct">
                                                            <tr id="producto_1">

                                                                <td class="col text-center">
                                                                    <div class="col-12 mb-3 input-group">
                                                                        <button type="button" id="startButton" class="bi-qr-code-scan input-group-text"></button>
                                                                        <input type="text" class="form-control" name="code[]" id="code" placeholder="Escribe el código del producto" autocomplete="off">
                                                                    </div>
                                                                </td>

                                                                <td class="col text-center">
                                                                    <input type="text" class="form-control mb-3" list="datalist_nombre_productos" name="nombre_producto[]" id="input_nombre_producto2" placeholder="ingresa el nombre" autocomplete="off">
                                                                    <datalist id="datalist_nombre_productos">
                                                                        <?php producto_model::options_nombres_productos(); ?> 
                                                                    </datalist>
                                                                </td>

                                                                <td class="col text-center">
                                                                    <select id="marcas_1" class="form-select mb-3" name="marcas[]" id="input_nombre_marca" >
                                                                        <option selected disabled> Selecciona una opción</option>
                                                                        <?php marca_model::optionsId(); ?>
                                                                    </select>
                                                                </td>

                                                                <td class="col text-center">
                                                                    <select id="presentacion_1" class="form-select mb-3" name="presentacion[]" id="input_nombre_presentacion">
                                                                        <option selected disabled> Selecciona una opción</option>
                                                                        <?php presentacion_model::optionsId(); ?>
                                                                    </select>
                                                                </td>

                                                                <td class="col text-center">
                                                                    <select id="categoria_1" class="form-select mb-3" name="categoria[]">
                                                                        <option selected disabled> Selecciona una opción</option>
                                                                        <?php category_model::optionsId(); ?>
                                                                    </select>
                                                                </td>

                                                                <td class="col text-center">
                                                                    <button type="button" onclick="document.getElementById(`producto_1`).remove();" class="btn btn-outline-danger bi bi-trash"></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>

                                            <div class="tableRegisterProducts text-center <?= $producto['l_productos'] == 0 ? '' : 'd-none'?> ">
                                                <button type="submit" form="registrar_producto" class="btn btn-success bi bi-plus">&nbsp;Registrar Producto(s)</button>
                                            </div>
                                    <?php endif; ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
            <script src="./js/scanQr.js" type="text/javascript"></script>

            <script type="text/javascript">


                // mostrar u ocultar el campo de datos del proveedor segun el tipo de compra seleccionado
                const dataBuyEntries = () => {
                    const tipoCompra = document.querySelector('#tipo_compra_id').value;
                    const datProvider = document.querySelector('#datProvider');

                    if (tipoCompra === 'compra_proveedor' && datProvider.classList.contains('d-none')) {
                        datProvider.classList.remove('d-none');
                    }else{
                        datProvider.classList.add('d-none');
                    }
                };

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
                    const titleList = "Inventario de Productos";
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

                modalCustom();

                // se incluye el footer / pie de pagina a la vista
                include_once "../include/footer.php";
                // se incluyen los script de javascript a la vista 
                include_once "../include/scripts_include.php"; 
            
                model_user::validar_sesion_activa($id_usuario);
        
                config_model::verificar_actualizacion_configuracion(); 
            ?>
            <script src="./js/añadir_producto.js"></script>
        </body>
    </html>

<?php }else{
    // se registran las acciones del usuario en la bitacora y es redirijido al inicio
    bitacora::intento_de_acceso_a_vista_sin_permisos("Gestión de Productos");
}