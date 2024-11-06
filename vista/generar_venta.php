<?php 
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
	// Redirigir el acceso a la página sino inició de sesión
	header('Location: ../index.php');
	exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Generar Venta</title>
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
        include_once("../include/sliderbar.php"); ?>
      <main id="main" class="main">
        <div class="pagetitle"> <h1> Generar Venta </h1> </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form id="generar_venta" action="../controlador/generar_venta_controlador.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
                    <input type="hidden" name="dolar" id="dolar" value="<?= $mostrarDolar['dolar']; ?>">
                    
                    <fieldset class="p-3">
                      <legend>Datos del Cliente</legend>
                      <div class="row mb-3">
                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                          <label class="form-label">CÉDULA / RIF <span style="color:#f00;">*</span></label>
                          <div class="col-md-4 input-group">
                            <input type="hidden" name="id_cliente" id="id_cliente">
                            <input type="hidden" name="modulo" value="Guardar">
                            <select class="input-group-text" name="nacionalidad" id="nacionalidad" required>
                              <option value="V-">V</option>
                              <option value="E-">E</option>
                            </select>
                            <input type="text" class="form-control"  placeholder="ingresa la cédula / RIF" onblur="buscar_datos_cliente()"; name="cedula_cliente" id="cedula" required>
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                          <label class="control-label">NOMBRE Y APELLIDO <span style="color:#f00;">*</span></label>
                          <input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,30}" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre_cliente" name="nombre_cliente">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                          <label class="control-label">TELÉFONO <span style="color:#f00;">*</span></label>
                          <input type="text" maxlength="11" pattern="[0-9]{11}" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono_cliente" name="telefono_cliente">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="row mb-3 border p-3"> 
                      <div class="col-md-12 mb-4 row">
                        <legend>SERVICIOS SOLICITADOS</legend>
                        <label for="firstName" class="form-label">Selecciona un servicio</label>
                        <select multiple onchange="añadir_tr_a_tabla('servicios')" class=" Select mb-3 col-12" id="id_servicio" name="servicios[]">
                          <option value="">Selecciona un servicio</option>
    
                          <?php
                            $consulta = modeloPrincipal::consultar("SELECT M.id_menu,M.nombre_platillo FROM producto AS P 
                              INNER JOIN detalles_menu AS D ON D.id_producto = P.id_producto
                              INNER JOIN menu AS M ON M.id_menu = D.id_menu WHERE P.stock > 0 group by M.id_menu;");
    
                            while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
    
                              <option value="<?= $mostrar['id_menu']; ?>" name="<?= $mostrar['nombre_platillo']; ?>"><?= $mostrar['nombre_platillo']; ?></option>
    
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-12">
                        <div class="car">
                          <div class="bor">
                            <h5 class="text-primary">LISTA DE SERVICIOS SOLICITADOS</h5>
                            <div class="table-responsive mb-3"> 
                              <table class="tableMetodo table table-striped border"  id="cart-list">
                                <thead>
                                  <tr>
                                    <th class="col text-center" scope="col">#</th>
                                    <th class="col text-center" scope="col">NOMBRE</th>
                                    <th class="col text-center" scope="col">CANTIDAD</th>
                                    <th class="col text-center" scope="col">PRECIO EN DOLARES</th>
                                    <th class="col text-center" scope="col">PRECIO EN BOLIVARES</th>
                                  </tr>
                                </thead>
                                <tbody id="lista_servicios"> </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>                        
                    <fieldset class="row mb-4 border p-3 border"> 
                      <div class="col-12 mb-4 row mb-3">
                        <legend class="col-12">PRODUCTOS SOLICITADOS</legend> 
                        <label class="form-label col-12">Selecciona un producto</label>
                        <select multiple onchange="añadir_tr_a_tabla('productos')" class="form-select col-12 control Select mb-3" id="id_producto" name="producto[]">
                          <option value="">Selecciona un producto</option>
    
                          <?php
                            $consulta = modeloPrincipal::consultar("SELECT id_producto, nombre_producto FROM producto WHERE stock > 0");
    
                            while ( $mostrar = mysqli_fetch_array($consulta)) { ?>
    
                              <option value="<?= $mostrar['id_producto']; ?>" name="<?= $mostrar['nombre_producto']; ?>"><?= $mostrar['nombre_producto']; ?></option>
    
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-12 col-md-12 mb-3">
                        <h5 class="text-primary">LISTA DE PRODUCTOS SOLICITADOS</h5>
                        <div class="table-responsive mb-3"> 
                          <table class="tableMetodo table table-striped" id="cart-list">
                            <thead>
                              <tr>
                                <th class="col text-center" scope="col">#</th>
                                <th class="col text-center" scope="col">PRODUCTO</th>
                                <th class="col text-center" scope="col">CANTIDAD</th>
                                <th class="col text-center" scope="col">PRECIO EN DOLARES</th>
                                <th class="col text-center" scope="col">PRECIO EN BOLIVARES</th>
                              </tr>
                            </thead>
                            <tbody id="lista_productos"> </tbody>
                          </table>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="mb-4 border p-3 row">
                      <legend>MÉTODO DE PAGO</legend>
                      <div class="col-12 col-md-12 mb-3">
                        <div class="table-responsive mb-4 row mb-3"> 
                          <table class="tableMetodo table table-striped" id="metodos_pago">
                            <thead>
                              <tr>
                                <th class="col text-center" scope="col">MÉTODO SELECCIONADO</th>
                                <th class="col text-center" scope="col">CANTIDAD A PAGAR EN DOLARES ($)</th>
                                <th class="col text-center" scope="col">NÚMERO DE REFERENCIA</th>
                                <th class="col text-center" scope="col">QUITAR</th>
                              </tr>
                            </thead>
                            <tbody id="tabla_metodo_pago"> </tbody>
                          </table>
                        </div>

                      </div>
                      <div class="col-12 col-md-12 mb-3 text-start">
                        <button type="button" class="btn btn-secondary bi bi-plus-circle-dotted bi-plus-lg" onclick="añadir_metodo_pago()"> AGREGAR MÉTODO DE PAGO</button>
                      </div>

                    </fieldset>
                    <fieldset class="row p-3">
                      <legend class="col-12 mb-3 text-primary">CUENTA</legend>
                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
                        <span>MONTO TOTAL (USD)</span>
                        <input class="form-control bg-dark-subtle" id="totalDolar" name="total_dolar_venta" readonly value="0">
                        
                      </div>
                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
                        <span>MONTO TOTAL (BS)</span>
                        <input class="form-control bg-dark-subtle" id="totalBolivar" name="total_bolivares_venta" readonly value="0">
                        
                      </div>
                    </fieldset>
                    <div class="col-12 mb-1">
                      <div class="form-group">
                          <p class="form-p">LOS CAMPOS SON <span style="color:#f00;">*</span> SON OBLIGATORIOS</p>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" form="generar_venta" class="btn btn-success">GENERAR VENTA</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="msjFormSend"></div>
      <script type="text/javascript">
        // función para añadir un metodo de pago 
        let i = 1;
        function añadir_metodo_pago(){
          // este tr será añadido a la tabla 
          let tr = `<tr id="metodo_${i}">
                      <td class="text-center col">
                        <select name="metodo_pago[]" id="metodo_pago_${i}" class="form-select selector_metodo_pago" onchange="habilitar_referencia('metodo_pago_${i}','num_referencia_${i}')">
                          <option value="" selected>SELECCIONE UN MÉTODO DE PAGO</option>
                          <option value="1">Divisa</option>
                          <option value="2">Punto de Venta</option>
                          <option value="3">Transferencia / Pago movíl</option>
                        </select>
                      </td>
                      <td class="text-center col"><input type="text" class="form-control" id="cantidad_${i}" name="monto_pagar[]" value ="0" placeholder="MONTO A PAGAR" required></td>
                      <td class="text-center col"><input type="text" class="form-control bg-dark-subtle" readOnly id="num_referencia_${i}" value="" name="num_referencia[]" maxlength="20" minlength="7" placeholder="número de referencia"></td>
                      <td class="text-center col">
                        <button type="button" class="btn btn-sm btn-danger bi bi-trash" onclick="quitar_metodo(${i++})"></button>
                      </td>
                    </tr>`;
  
          $('#tabla_metodo_pago').append(tr);
        }

        function quitar_metodo(num){
          let tr = document.getElementById(`metodo_${num}`);
          tr.remove();
        }
        // estafuncion sirve para habilitar e inhabilitar el input de el número de referencia de un pago 
        function habilitar_referencia (id_del_selector,input_num_referencia){

          let id_selector = document.getElementById(id_del_selector).value;
          let input_referencia = document.getElementById(input_num_referencia);

          if (id_selector === '3') {
            input_referencia.classList.remove('bg-dark-subtle');
            input_referencia.removeAttribute('readOnly');
          }else{
            input_referencia.classList.add('bg-dark-subtle');
            input_referencia.setAttribute('readOnly','');
          }
        }
      </script>
      <?php 
        // se incluye el footer / pie de pagina a la vista
        include_once("../include/footer.php"); 
        // se incluyen los script de javascript a la vista 
        include_once("../include/scripts_include.php"); ?>
    
    </body>
  </html>
<?php } ?>