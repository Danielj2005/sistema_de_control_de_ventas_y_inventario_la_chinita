<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// se guardan los permisos del rol del usuario que inició sesión
$r_entrada = rol_model::permisos_modulos('r_entrada');
$l_entrada = rol_model::permisos_modulos('l_entrada');

// permisos del usuario al módulo entrada de productos
$permisosRol = [
    "r_entrada" => rol_model::permisos_modulos("r_entrada"),
    "l_entrada" => rol_model::permisos_modulos("l_entrada"),
    'total' => rol_model::permisos_modulos("r_entrada + l_entrada")
];

// se evalua que este rol tenga el acceso a esta vista
if ($permisosRol['total'] == 1 || $permisosRol['total'] == 2) {  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- titulo -->
		<title>Entrada de producto</title>
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

			$fecha_actual = date('Y-m-d');

			$tipoCompra = !isset($_POST['tipoCompra']) ? 0 : $_POST['tipoCompra'];

			$fecha1 = !isset($_POST['fecha_inicio']) ? '' : $_POST['fecha_inicio'];
			$fecha2 = !isset($_POST['fecha_fin']) ? '' : $_POST['fecha_fin']; ?>
        
		<main id="main" class="main">
			<div class="pagetitle row">
				<div class="col-12">
					<a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
					<?php 
						// se define y se decide condicionalmente el titulo de la vista
						if ($permisosRol['r_entrada'] == 1 && $permisosRol['l_entrada'] == 1 || $permisosRol['r_entrada'] == 0 && $permisosRol['l_entrada'] == 1 ) : ?>
							<h1 class="tituloUno my-3">Lista de Entradas de Productos</h1>

					<?php endif;
						if ($permisosRol['r_entrada'] == 1 && $permisosRol['l_entrada'] == 0) : ?>

							<h1 class="tituloUno my-3">Registro de Productos Comprados</h1>
					<?php endif; ?>

					<div id="cardEntries" class="col-12 col-sm-12 col-md-6 pagetitle text-center card-body">
						<div class="accordion" id="entriesAccordion">
							<div class="accordion-item text-center justify-content-center align-items-center row">
								<h3 class="accordion-header my-3 col fs-4 text-center">
									<button class="accordion-button collapsed titulosH bg-info-light" type="button" data-bs-toggle="collapse" data-bs-target="#entriesCard" aria-expanded="true" aria-controls="collapseOne">¿Qué es una Entrada de productos?&nbsp;<i class="mx-2 fs-5 bi bi-exclamation-circle-fill"></i></button>
								</h3>

								<div id="entriesCard" aria-expanded="true" aria-controls="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
									<div class="accordion-body row justify-content-center p-0">
										<p class="text-wrap-balance">
											Las entradas de productos al inventario se originan por compras a proveedores o por adquisiciones (compras) realizadas directamente por el personal (por cuenta propia) para cubrir necesidades operacionales urgentes y asegurar la continuidad del servicio al cliente.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section dashboard">
				<div class="row">
					<div class="col-lg-12">
						<div class="card top-selling ">
							<div class="row text-center p-2 align-items-center">

								<?php if ($permisosRol['r_entrada'] == 1 && $permisosRol['l_entrada'] == 1 ): ?>
									<div class="col-12 col-sm-12 col-md-6 mb-2 ">
										<button class="col-12 btnHiddenElements btn btn-success bi bi-plus"> Registrar Entrada</button>
									</div>
								<?php endif; ?>


								<div class="col-12 col-sm-12 mb-2 <?= $permisosRol['r_entrada'] == 0 && $permisosRol['l_entrada'] == 1 ? 'col-md-12 ' : 'col-md-6' ?>">
									<div class="col-12 dropdown">
										<button class="col-12 btn btn-secondary dropdown-toggle bi bi-file-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
											Exportar Entradas
										</button>
										<ul class="dropdown-menu">
											<li> <hr class="dropdown-divider"> </li>
											<li class="p-2 text-center">
												<a class="btn bi bi-file-text btn-outline-success" target="_blank" href="./reportes/lista_entradas.php">&nbsp;Exportar Entradas</a>
											</li>
											<li> <hr class="dropdown-divider"> </li>
											<li> <hr class="dropdown-divider"> </li>
											<li class="p-2 text-center">
												<label class="dropdown-item">Exportar Por Fecha</label>
												<form action="./reportes/lista_detalles_entradas_por_fechas.php" method="post" class="p-2 row mb-3" id="" target="_blank">
													
													<div class="input-group mb-3 justify-content-center">
														<label class="input-group-text text-start control-label">Fecha de inicio &nbsp;<span class="text-danger">*</span></label>
														<input class="reportDates form-control" type="date" id="fechaReporteInicio" name="fechaReporteInicio">
													</div>
													
													<div class="input-group mb-3 justify-content-center">
														<label class="input-group-text text-start control-label">Fecha de fin &nbsp;<span class="text-danger">*</span></label>
														<input class="reportDates form-control" value="<?= date('Y-m-d') ?>" type="date" id="fechaReporteFin" name="fechaReporteFin">
													</div>
													
													<div class="input-group mb-3 justify-content-center">
														<p class="text-wrap-balance showThis d-none alert alert-danger" id="mensajefechaReporteInicio" style="width: fit-content;">
															La Fecha de inicio no puede ser posterior a la Fecha de fin.
															<br>
															Las fechas seleccionadas no pueden ser posteriores a la Fecha actual.
														</p>
													</div>
													<div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
														<button type="submit" class="d-none btn btn-outline-success bi bi-file-text" id="btnReportesFechas">&nbsp; Generar Reporte (PDF)</button>
													</div>
												</form>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<hr>
							<div class="card-body">

								<?php if ($permisosRol['l_entrada'] == 1) : ?>

										<div class="show ">
											<input type="hidden" id="fecha_actual" name="fecha_actual" value="<?= $fecha_actual ?>">

											<form method="post" class="show row m-0 p-0" id="rango_fechas">
												<h5 class="card-title">Historial de Compras</h5>
												
												<div class="col-12 col-sm-12 col-md-12 mb-1">
													<p class="alert alert-info" style="width: fit-content;">
														Selecciona el rango de fechas para consultar el historial de entradas.
													</p>
												</div>

												<div class="col-12 col-sm-12 col-md-5 mb-2">
													<div class="input-group justify-content-center">
														<span class="input-group-text">Fecha de inicio</span>
														<input class="form-control" onchange="dateValidate()" type="date" id="fecha_inicio" name="fecha_inicio">
													</div>
												</div>

												<div class="col-12 col-sm-12 col-md-4 mb-2">
													<div class="input-group justify-content-center">
														<span class="input-group-text">Fecha de fin</span>
														<input class="form-control" onchange="dateValidate()" value="<?= date('Y-m-d') ?>" type="date" id="fecha_fin" name="fecha_fin">
													</div>
												</div>

												<div class="col-12 col-sm-12 col-md-3 mb-2 text-center">
													<button type="submit" disabled class="btn btn-outline-secondary bi bi-search" id="btn_fechas">&nbsp; Buscar por Fecha</button>
												</div>

												<div class="col-12 col-sm-12 col-md-12 mb-3">
													<!-- mensajes -->
													<p class="alert alert-danger d-none" id="mensaje_fecha_iguales" style="width: fit-content;">
														La Fecha de inicio no puede ser posterior a la Fecha de fin.
														<br>
														Las fechas seleccionadas no pueden ser posteriores a la Fecha actual.
													</p>
													<p class="alert alert-secondary <?= ($fecha1 == "" && $fecha2 == "") ? 'd-none' : '' ?>" style="width: fit-content;">
														Historial de Compras
														<br>
														Fecha de inicio: <b> <?php echo date ("d-m-Y",strtotime($fecha1)); ?> </b> 
														<br> 
														Fecha de fin: <b><?php echo date ("d-m-Y",strtotime($fecha2)); ?> </b> 
													</p>
												</div>
											</form>

											
											<form method="post" class="show row m-0 p-0" id="tipo_compra">
												<div class="col-12 col-sm-12 col-md-12 mb-2 text-center">
													<input class="form-control" value="<?= $tipoCompra == 0 ? 1 : 0?>" type="hidden" name="tipoCompra">
													<button type="submit" class="btn btn-outline-<?= $tipoCompra == 0 ? "success" : "danger" ?> bi bi-<?= $tipoCompra == 0 ? "person" : "truck" ?>">&nbsp;<?= $tipoCompra == 0 ? "Ver Adquisiciones Propias" : "Ver Compras a Proveedores" ?></button>
												</div>
											</form>
									
									
											<div class="table-responsive">
												<table class="table table-striped example" id="example">
													<thead>
														<tr>
															<th class="col text-center" scope="col">N.º</th>
															<th class="col text-center" scope="col"><?= $tipoCompra == 1 ? "Cédula" : "Cédula o RIF" ?></th>
															<th class="col text-center" scope="col"><?= $tipoCompra == 1 ? "Usuario" : "Proveedor" ?></th>
															<th class="col text-center" scope="col">Total ($)</th>
															<th class="col text-center" scope="col">Total (Bs.)</th>
															<th class="col text-center" scope="col">Tasa de Cambio</th>
															<th class="col text-center" scope="col">Fecha y Hora</th>
															<th class="col text-center" scope="col">Acciones</th>
														</tr>
													</thead>

													<tbody>
														<?php
															if ($tipoCompra == 1){
																$consulta = modeloPrincipal::consultar("SELECT U.cedula, U.nombre, U.apellido, 
																	E.total_dolar, E.total_bs, E.fecha_entrada, E.id_entrada, D.dolar AS tasa
																	FROM entrada AS E
																	INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
																	INNER JOIN usuario AS U ON U.id_usuario = E.id_usuario 
																	ORDER BY E.fecha_entrada DESC 
																	LIMIT 100
																");
															}else if($tipoCompra == 0){
																$consulta = modeloPrincipal::consultar("SELECT PROV.nombre, PROV.cedula_rif,
																	E.total_dolar, E.total_bs,
																	E.fecha_entrada, E.id_entrada, D.dolar AS tasa
																	FROM entrada AS E
																	INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
																	INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
																	ORDER BY E.fecha_entrada DESC 
																	LIMIT 100
																");
															}else if($fecha1 !== "" && $fecha2 !== ""){
																$consulta = modeloPrincipal::consultar("SELECT PROV.nombre, E.total_dolar, E.total_bs,
																	E.fecha_entrada, E.id_entrada, D.dolar AS tasa
																	FROM entrada AS E 
																	INNER JOIN proveedor AS PROV ON PROV.id_proveedor = E.id_proveedor 
																	INNER JOIN dolar AS D ON D.id_dolar = E.id_dolar 
																	WHERE E.fecha_entrada 
																	BETWEEN DATE('$fecha1') AND DATE('$fecha2') 
																	ORDER BY E.fecha_entrada DESC
																");
															}

															// se guardan los datos en un array y se imprime
															while ( $mostrar = mysqli_fetch_array($consulta)) { ?>    
																<tr>
																	<td class="col text-center"></td>
																	<td class="col text-center"><?= $tipoCompra == 1 ? $mostrar["cedula"] : $mostrar["cedula_rif"] ?></td>
																	<td class="col text-center"><?= $tipoCompra == 1 ? $mostrar["nombre"]." ".$mostrar["apellido"] : $mostrar["nombre"]; ?></td>
																	<td class="col text-center"><?= $mostrar["total_dolar"].' $'; ?></td>
																	<td class="col text-center"><?= $mostrar["total_bs"].' Bs.'; ?></td>
																	<td class="col text-center"><?= $mostrar["tasa"].' Bs.'; ?></td>

																	<td class="col text-center"><?= date('Y-m-d g:i:a',strtotime($mostrar["fecha_entrada"])); ?></td>

																	<?php if (rol_model::verificar_rol('l_entrada') == '1') : ?>
																		<td class="col text-center" scope="col">
																			<div class="d-flex justify-content-center align-items-center gap-2">
																				<div class="col col-auto">
																					<button onclick="btn_show_modal('btn_modal', 'detallesEntrada')" <?= rol_model::verificar_rol('l_entrada') == '1' ? 'data-bs-toggle="modal" data-bs-target="#modal"' : 'disabled' ?> class="btn_modal btn bi bi-eye btn-info" value="<?= modeloPrincipal::encryptionId($mostrar["id_entrada"]); ?>"></button>
																				</div>
																				<div class="col col-auto">
																					<form action="./reportes/lista_detalles_entradas.php" method="post" target="_blank">
																						<input type="hidden" name="UIDE" value="<?= modeloPrincipal::encryptionId($mostrar["id_entrada"]); ?>">
																						<button type="submit" class="btn bi bi-file-text btn-primary">&nbsp;PDF</button>
																					</form>
																				</div>
																			</div>
																		</td>
																	<?php endif; ?>
																</tr>
															<?php } ?>
													</tbody>
												</table>
											</div>
										</div>

								<?php endif;
									if ($permisosRol['r_entrada'] == 1) : ?>

										<div class="show <?= $l_entrada == 1 ? 'd-none' : '' ?>">
											
											<form action="../controlador/registrar_entrada.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
												<input type="hidden" name="id_dolar" id="dolar" value="<?= modeloPrincipal::obtener_id_precio_dolar(); ?>">
												<input type="hidden" name="modulo" value="Guardar">

												<label class="form-label">Tipo de Compra <span style="color:#f00;">*</span></label>
												<div class="col-12 col-md-12 mb-3">
													<select onchange="dataBuyEntries()" name="tipo_compra" id="tipo_compra_id" class="form-select ">
														<option selected disabled>Seleccione una opción</option>
														<option value="adquisicion_propia">Compra Directa (Personal)</option>
														<option value="compra_proveedor">Compra a Proveedor</option>
													</select>
												</div>
												
												<fieldset id="datProvider" class="row m-0 p-0 d-none">
													<h5 class="card-title">Información del Proveedor</h5> 
													<!-- datos del proveedor al que se le compró -->
													<div class="col-12 col-sm-6 col-md-6 mb-3">
														<label class="form-label">Cédula o RIF <span style="color:#f00;">*</span></label>
														<div class="col-md-4 input-group">
															<select class="input-group-text" id="nacionalidad" name="nacionalidad">
																<option value="V-">V</option>
																<option value="R-">RIF</option>
																<option value="J-">J</option>
																<option value="E-">E</option>
															</select>
															<input type="text" class="form-control" minlength="7" maxlength="8" placeholder="ingresa la cédula / RIF" onblur="buscar_proveedor()"; name="cedula" id="cedula">
														</div>
													</div>
	
													<div class="col-12 col-sm-6 col-md-6 mb-3">
														<label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
														<input type="text" class="form-control" minlength="3" maxlength="80" placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor">
													</div>
	
													<div class="col-12 col-sm-6 col-md-6 mb-3">
														<label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
														<input type="text" class="form-control"  minlength="10" maxlength="150" placeholder ="ingresa el correo" id="correo" name="correo">
													</div>
	
													<div class="col-12 col-sm-6 col-md-6 mb-3">
														<label   class="form-label">Teléfono <span style="color:#f00;">*</span></label>
														<input type="text" class="form-control" minlength="11" maxlength="11"  name="telefono" placeholder="ingresa el teléfono" id="telefono">
													</div>
	
													<div class="col-12 col-sm-12 col-md-12 mb-3">
														<label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
														<input type="text" class="form-control" minlength="3" maxlength="250" name="direccion" placeholder="ingresa la dirección" id="direccion">
													</div>
												</fieldset>

												<!-- datos de el (los) producto(s) comprados al proveedor -->

												<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-1 row m-0">
													<h5 class="col-12 col-sm-12 col-md-8 mb-3 card-title">Productos de la Entrada</h5>

													<div class="col-12 col-sm-12 col-md-4 mb-3 text-center">
														<button modal="registrar_producto" url="./modal/producto/registrar.php" type="button" class="btn_modal btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#modal">&nbsp;Registar Nuevo Producto</button>
													</div>

													<label class="form-label">Producto <span style="color:#f00;">*</span></label>
													<div class="col-12 col-md-9 mb-3">
														<select name="producto" id="producto_id" class="select form-select SelectTwo">
															<option selected>Seleccione un producto</option>
															<?php producto_model::options(); ?>
														</select>
													</div>
													
													<div class="col-12 col-sm-12 col-md-3 mb-3">
														<button type="button" name="btn_producto" class="btn btn-success bi bi-plus btn_add">Añadir a la Entrada</button>
													</div>
												</div>
												
												<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-1 row m-0">
													<div class="row justify-content-around">
														<h5 class="card-title col-12 mb-2">Lista de productos</h5>

														<div class="col-12 table-responsive m-0 p-0">
															<table class="table table-borderless table-striped" id="">
																<thead>
																	<tr>
																		<th class="col text-center" scope="col">Producto</th>
																		<th class="col text-center" scope="col">Cantidad</th>
																		<th class="col text-center" scope="col">Costo Unitario ($)</th>
																		<th class="col text-center" scope="col">Costo Unitario (Bs.)</th>
																		<th class="col text-center" scope="col">Precio Venta ($)</th>
																		<th class="col text-center" scope="col">Acción</th>
																	</tr>
																</thead>
																<tbody id="lista_producto"></tbody>
															</table>
														</div>
													</div>
												</div>

												<hr class="divider">

												<div class="col-12 col-sm-12 col-md-6 mt-1 mb-1">
													<div class="input-group mb-3 justify-content-center">
														<label class="input-group-text">Fecha de Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
														<input class="form-control" value="<?= date("Y-m-d"); ?>" required type="date" id="fecha_entrada" name="fecha_entrada">
													</div>
												</div>

												<div class="col-12 col-sm-12 col-md-6 mt-1 mb-1">
													<div class="input-group mb-3 justify-content-center">
														<label class="input-group-text">Hora de Entrada &nbsp; <span style="color:#f00;"> *</span> </label>
														<input class="form-control" value="<?=  $fecha2 = date("H:i:s"); ?>" required type="time" id="hora_entrada" name="hora_entrada">
													</div>
												</div>

												<div class="col-12 col-sm-12 col-md-12 my-3">
													<h5 class="card-title col-12">Inversión Total</h5>
													
													<input id="total_Dolar" type="hidden" class="totalDolar" name="totalDolar">
													<input id="total_Bolivar" type="hidden" class="totalBolivar" name="totalBolivar">

													<table class="table table-striped table-borderless overflow-x-auto">
														<tbody>
															<tr>
																<td class="fs-4 text-success text-center col">Total ($): <strong> <span id="totalDolar">0</span> </strong></td> 
																<td class="fs-4 text-success text-center col">Total (Bs.): <strong> <span id="totalBolivar">0</span> </strong></td> 
															</tr>
														</tbody>
													</table>
												</div>
												
												<div class="col-12 mb-1">
													<div class="form-group">
														<p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
													</div>
												</div>

												<div class="col-12 col-sm-12 col-md-12 mt-1 text-center">
													<button name="insertar" class="btn btn-success">&nbsp;Registrar entrada</button>
												</div>
											</form>
										</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

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

			const btnHiddenElements = document.querySelector('.btnHiddenElements');
			const titles = ['Lista de Entradas de Productos','Registro de Productos Comprados'];
			const titleHead = document.querySelector('.tituloUno');

			btnHiddenElements.addEventListener('click', () => {

				btnHiddenElements.classList.toggle('btn-success');
				btnHiddenElements.classList.toggle('bi-plus');
				btnHiddenElements.classList.toggle('btn-secondary');
				btnHiddenElements.classList.toggle('bi-list-columns-reverse');
				btnHiddenElements.textContent == " Registrar Entrada" ? btnHiddenElements.textContent = " Lista de Entradas" : btnHiddenElements.textContent = " Registrar Entrada";
				
				titleHead.textContent == titles[0] ? titleHead.textContent = titles[1] : titleHead.textContent = titles[0];

				const Elements = document.querySelectorAll('.show');
				Elements.forEach(element => {
					element.classList.toggle('d-none');
				});
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
	</body>
</html>

<?php }else{
	// se registran las acciones del usuario en la bitacora y es redirijido al inicio
	bitacora::intento_de_acceso_a_vista_sin_permisos("lista de entradas");
}