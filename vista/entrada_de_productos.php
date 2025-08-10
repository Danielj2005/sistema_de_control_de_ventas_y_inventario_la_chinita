<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_entrada + l_entrada');
// se evalua que este rol tenga el acceso a esta vista
if ($rol == 1 || $rol == 2) {  
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Entrada de producto</title>
      <?php 
        // se incluyen los meta datos 
        include_once("../include/meta_include.php"); 
        // se incluyen los estilos css y sus librerias a la vista
        include_once("../include/css_include.php"); ?>
    </head>
    <body>
      <?php 
        // se incluye el header / encabezado a la vista
        include_once("../include/header.php");
        // se incluye el menu lateral a la vista 
        include_once("../include/sliderbar.php"); 
        $fecha_actual = date('Y-m-d');

        $fecha1 = $_POST['fecha_inicio'];
        $fecha2 = $_POST['fecha_fin']; ?>
        
      <main id="main" class="main">
        <div class="pagetitle row">
          <div class="col-12 mb-4">
            <a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
            <h1 class="tituloUno my-3">Lista Entradas de Productos</h1>
            <p class="show alert alert-secondary">Las entradas de productos son por compras a un proveedor.</p>
          
          </div>
        </div>
        <section class="section dashboard">
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card top-selling ">
                <div class="row text-center p-2 align-items-center">
							
                  <div class="col-12 col-sm-12 col-md-6 mb-2 <?= rol_model::verificar_rol('r_entrada') == 1 ? '' : 'd-none eraser' ?>">
                    <button class="col-12 btnHiddenElements btn btn-success bi bi-plus"> Registrar Nueva Entrada</button>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 mb-2">
                    <div class="col-12 dropdown">
                      <button class="col-12 btn btn-secondary dropdown-toggle bi bi-file-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Exportar Entradas
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="./reportes/lista_entradas.php">Lista de todas las Entradas</a></li>
                        <li>
                          <label class="dropdown-item">Lista de Entradas Por Fecha</label>
                          <form action="./reportes/lista_detalles_entradas_por_fechas.php" method="post" class="p-2 row mb-3" id="" target="_blank">
                            <label class="control-label">Desde <span class="text-danger">*</span></label>

                            <div class="input-group mb-3 justify-content-center">
                              <input class="reportDates form-control" type="date" id="fechaReporteInicio" name="fechaReporteInicio">
                            </div>
                            <label class="control-label">Hasta <span class="text-danger">*</span></label>

                            <div class="input-group mb-3 justify-content-center">
                              <input class="reportDates form-control" value="<?= date('Y-m-d') ?>" type="date" id="fechaReporteFin" name="fechaReporteFin">
                            </div>
                            
                            <div class="input-group mb-3 justify-content-center">
                              <p class="showThis alert alert-danger d-none" id="mensajefechaReporteInicio" style="width: fit-content;">La fecha de inicio no puede ser mayor a la fecha de fin y ninguno puede ser mayor a la fecha actual.</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                              <button type="submit" class="d-none btn btn-outline-success bi bi-file-text" id="btnReportesFechas">&nbsp; Generar Reporte</button>
                            </div>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="card-body pb-3">
                  <h5 class="tituloDos card-title">Lista de Compras a un Proveedor</h5>
                  <input type="hidden" id="fecha_actual" name="fecha_actual" value="<?= $fecha_actual ?>">
                  <form method="post" class="show row mb-3" id="rango_fechas">
                    <p class="alert alert-info" style="width: fit-content;">Seleciona un rango de fechas para ver el historial de entradas realizadas dentro de ese rango de fechas</p>
                    
                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Desde</span>
                        <input class="form-control" onchange="dateValidate()" type="date" id="fecha_inicio" name="fecha_inicio">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                      <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Hasta</span>
                        <input class="form-control" onchange="dateValidate()" value="<?= date('Y-m-d') ?>" type="date" id="fecha_fin" name="fecha_fin">
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 mb-3 text-center">
                      <button type="submit" disabled class="btn btn-outline-secondary bi bi-search" id="btn_fechas">&nbsp; Buscar Fecha</button>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 mb-3">
                      <!-- mensajes -->
                      <p class="alert alert-danger d-none" id="mensaje_fecha_iguales" style="width: fit-content;">La fecha de inicio no puede ser mayor a la fecha de fin y ninguno puede ser mayor a la fecha actual.</p>
                      <p class="alert alert-secondary <?= ($fecha1 == "" && $fecha2 == "") ? 'd-none' : '' ?>" style="width: fit-content;">
                        Lista de Entradas Registradas <br>Desde la Fecha: <b> <?php echo date ("d-m-Y",strtotime($fecha1)); ?> </b> <br> Hasta la Fecha: <b><?php echo date ("d-m-Y",strtotime($fecha2)); ?> </b> 
                      </p>
                    </div>
                  </form>
                  
                  <div class="show table-responsive p-3">
                    <table class="table m-auto table-borderless table-striped" id="example">
                      <thead>
                        <tr>
                          <th class="col text-center" scope="col">#</th>
                          <th class="col text-center" scope="col">Proveedor</th>
                          <th class="col text-center" scope="col">Total en $</th>
                          <th class="col text-center" scope="col">Total en BS</th>
                          <th class="col text-center" scope="col">Cotización</th>
                          <th class="col text-center" scope="col">Fecha / Hora</th>
                          <th class="col text-center" scope="col">Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            if($fecha1 == "" && $fecha2 == ""){
                              $consulta = modeloPrincipal::consultar("SELECT PROV.nombre, E.total_dolar, E.total_bs,
                                E.fecha_entrada, E.id_entrada, D.dolar AS tasa
                                FROM entrada AS E 
                                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                                INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
                                ORDER BY E.fecha_entrada DESC LIMIT 100");
                            }else{
                              $consulta = modeloPrincipal::consultar("SELECT PROV.nombre, E.total_dolar, E.total_bs,
                                E.fecha_entrada, E.id_entrada, D.dolar AS tasa
                                FROM entrada AS E 
                                INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
                                INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
                                WHERE E.fecha_entrada 
                                BETWEEN DATE('$fecha1') AND DATE('$fecha2') 
                                ORDER BY E.fecha_entrada DESC");
                            }
                            // se guardan los datos en un array y se imprime
                            while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
                              <tr>
                                  <td class="col text-center"></td>
                                  <td class="col text-center"><?= $mostrar["nombre"]; ?></td>
                                  <td class="col text-center"><?= $mostrar["total_dolar"].' $'; ?></td>
                                  <td class="col text-center"><?= $mostrar["total_bs"].' Bs'; ?></td>
                                  <td class="col text-center"><?= $mostrar["tasa"].' Bs'; ?></td>
                                  <td class="col text-center"><?= date('Y-m-d | g:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>
                                  <td class="text-center col <?= rol_model::verificar_rol('l_entrada') !== '1' ? 'd-none eraser' : '' ; ?> " scope="col">
                                    <div class="row justify-content-center align-items-center">
                                        <button modal="ver_detalles_entrada" <?= rol_model::verificar_rol('l_entrada') == '1' ? 'url="./modal/producto/detalles_entrada.php" data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class=" col col-auto btn_modal btn bi bi-eye btn-info" value="<?= modeloPrincipal::encryptionId($mostrar["id_entrada"]); ?>"></button>
                                        
                                        <form class=" col col-auto" action="./reportes/lista_detalles_entradas.php" method="post" target="_blank">
                                          <input type="hidden" name="UIDE" value="<?= modeloPrincipal::encryptionId($mostrar["id_entrada"]); ?>">
                                          <button type="submit" class="btn bi bi-file-text btn-primary"> PDF</button>
                                        </form>
                                    </div>
                                  </td>
                              </tr>
                            <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="show d-none">
                    <h5 class="card-title">Datos del proveedor</h5> 
                    <form action="../controlador/registrar_entrada.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                      <input type="hidden" name="id_dolar" id="dolar" value="<?= modeloPrincipal::obtener_id_precio_dolar(); ?>">
                      <input type="hidden" name="modulo" value="Guardar">
                      <!-- datos del proveedor al que se le compró -->
                      <div class="col-12 col-sm-6 col-md-6 mb-3">
                        <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                        <div class="col-md-4 input-group">
                          <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                            <option value="V-">V</option>
                            <option value="R-">RIF</option>
                            <option value="J-">J</option>
                            <option value="E-">E</option>
                          </select>
                          <input type="text" class="form-control" minlength="7" maxlength="8" placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula" required>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-6 mb-3">
                        <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                        <input type="text" class="form-control" minlength="3" maxlength="80" placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                      </div>

                      <div class="col-12 col-sm-6 col-md-6 mb-3">
                        <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                        <input type="text" class="form-control"  minlength="10" maxlength="150" placeholder ="ingresa el correo" id="correo" name="correo" required>
                      </div>

                      <div class="col-12 col-sm-6 col-md-6 mb-3">
                        <label   class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                        <input type="text" class="form-control" minlength="11" maxlength="11"  name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                      </div>

                      <div class="col-12 col-sm-12 col-md-12 mb-3">
                        <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                        <input type="text" class="form-control" minlength="3" maxlength="250" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                      </div>

                      <!-- datos de el (los) producto(s) comprados al proveedor -->

                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row m-0">
                        <h5 class="col-12 col-sm-12 col-md-8 mb-3 card-title">Productos a ingresar</h5>

                        <div class="col-12 col-sm-12 col-md-4 mb-3">
                          <button modal="registrar_producto" url="./modal/producto/registrar.php" type="button" class="btn_modal btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#modal">&nbsp; Registar un nuevo producto</button>
                        </div>

                        <label class="form-label">Selecciona uno o más Productos <span style="color:#f00;">*</span></label>
                        <div class="col-12 col-sm-12 col-md-9 mb-3">
                          <select name="producto" id="producto_id" class="form-select Select2 select selector_producto">
                            <option value="" selected>seleccione una opción</option>
                            <?php producto_model::options(); ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 mb-3">
                          <button type="button" name="btn_producto" class="btn btn-success bi bi-plus btn_add">&nbsp; Añadir producto</button>
                        </div>
                      </div>
                      
                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row m-0">
                        <div class="row p-2 justify-content-around">
                          <h5 class="card-title col-12 mb-2">Lista de productos</h5>

                          <div class="col-12 table-responsive">
                            <table class="table table-borderless table-striped" id="">
                              <thead>
                                <tr>
                                  <th class="col text-center" scope="col">Producto</th>
                                  <th class="col text-center" scope="col">Cantidad</th>
                                  <th class="col text-center" scope="col">Precio por unidad en $</th>
                                  <th class="col text-center" scope="col">Precio por unidad en bs</th>
                                  <th class="col text-center" scope="col">Precio de venta en $</th>
                                  <th class="col text-center" scope="col">Eliminar</th>

                                </tr>
                              </thead>
                              <tbody id="lista_producto">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <hr class="divider">

                      <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                        <div class="input-group mb-3 justify-content-center">
                          <label class="input-group-text">Fecha de la Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
                          <input class="form-control" value="<?= date("Y-m-d"); ?>" required type="date" id="fecha_entrada" name="fecha_entrada">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mt-5 mb-4">
                        <div class="input-group mb-3 justify-content-center">
                          <label class="input-group-text">Hora de la Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
                          <input class="form-control" value="<?=  $fecha2 = date("H:i:s"); ?>" required type="time" id="hora_entrada" name="hora_entrada">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-12 my-3">
                        <h5 class="card-title col-12">Total de la inversión</h5>
                          
                        <input id="total_Dolar" type="hidden" class="totalDolar" name="totalDolar">
                        <input id="total_Bolivar" type="hidden" class="totalBolivar" name="totalBolivar">

                        <table class="table table-striped table-borderless overflow-x-auto">
                          <tbody>
                            <tr>
                              <td class="fs-4 text-success text-center col">Total en $: <strong> <span id="totalDolar">0 </span> </strong></td> 
                              <td class="fs-4 text-success text-center col">Total en bs: <strong> <span id="totalBolivar">0 </span> </strong></td> 
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      
                      <div class="col-12 mb-1">
                        <div class="form-group">
                            <p class="form-p fs-5">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 mt-3 mb-3 text-center">
                        <button name="insertar" class="btn btn-success">&nbsp; Registrar entrada</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      <script type="text/javascript">
        const btnHiddenElements = document.querySelector('.btnHiddenElements');
        btnHiddenElements.addEventListener('click', () => {

          btnHiddenElements.classList.toggle('btn-success');
          btnHiddenElements.classList.toggle('bi-plus');
          btnHiddenElements.classList.toggle('btn-secondary');
          btnHiddenElements.classList.toggle('bi-list-columns-reverse');
          btnHiddenElements.textContent == " Registrar Nueva Entrada" ? btnHiddenElements.textContent = " Ver Lista de Entradas" : btnHiddenElements.textContent = " Registrar Nueva Entrada";

          const Elements = document.querySelectorAll('.show');
          Elements.forEach(element => {
            element.classList.toggle('d-none');
          });

          document.querySelector('.tituloDos').classList.toggle('d-none');
          
          const tituloUno = document.querySelector('.tituloUno');

          tituloUno.textContent == "Lista Entradas de Productos" ? tituloUno.textContent = "Registro de Productos Comprados" : tituloUno.textContent = "Lista Entradas de Productos";
          
        });
      </script>


      <script src="./js/añadir_elemento_lista.js"></script>
      <script src="./js/convertir_dolar_bs.js"></script>
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
      <script src="./js/rango_fechas.js"></script>
      <script>$('.Select').select2();</script>
    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("lista de entradas");
}