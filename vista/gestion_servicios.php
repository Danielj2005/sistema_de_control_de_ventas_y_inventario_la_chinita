<?php 
session_start();

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// se guardan los permisos del rol del usuario que inició sesión
$r_servicio = rol_model::permisos_modulos('r_servicio');
$l_servicio = rol_model::permisos_modulos('l_servicio');
$m_servicio = rol_model::permisos_modulos('m_servicio');

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_servicio + m_servicio + l_servicio');
// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) { ?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<!-- titulo -->
			<title>Gestión de Servicios</title>
			<?php 
				// se incluyen los meta datos 
				include_once("../include/meta_include.php"); 
				// se incluyen los estilos css y sus librerias a la vista
				include_once("../include/css_include.php"); ?>
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
				<h1 class="my-3">Gestión de Servicios </h1> 
				</div>
				<section class="section dashboard">
				<div class="row">
					<div class="col-12">
					<div class="card top-selling">
						<div class="row p-4 text-center <?= $r_servicio == 1 ? '' : 'd-none eraser'; ?> <?= $l_servicio == 0 && $r_servicio == 1 ? 'd-none eraser' : ''; ?>">
						<div class="col-12 col-sm-12 col-md-12 mb-2 row m-0">
							<button id="btn_register" type="button" onclick="toggle()" class="col-12 btn btn-success bi bi-plus">&nbsp;Registrar un nuevo servicio</button>
						</div>
						</div>
						<hr class="<?= $r_servicio == 1 ? '' : 'd-none eraser'; ?> <?= $l_servicio == 0 && $r_servicio == 1 ? 'd-none eraser' : ''; ?>">
						<div class="card-body pb-3">

						<div class="hidden <?= $l_servicio == 1 ? '' : 'd-none eraser'; ?>">
							<h5 class="card-title">Lista de servicios</h5>
							<table class="table table-striped table-responsive datatable" id="example">
							<thead>
								<tr>
								<th class="col text-center"scope="col">#</th>
								<th class="col text-center"scope="col">NOMBRE</th>
								<th class="col text-center"scope="col">PRECIO DE VENTA EN $</th>
								<th class="col text-center <?= $l_servicio == '1' ? '' : 'd-none eraser'; ?>" scope="col">DETALLES</th>
								<th class="col text-center <?= $m_servicio == '1' ? '' : 'd-none eraser'; ?>" scope="col">MODIFICAR</th>
								<th class="col text-center <?= $m_servicio == '1' ? '' : 'd-none eraser'; ?>"scope="col">ESTADO</th>
								</tr>
							</thead>
							<tbody>
								<?php servicio_model::lista(); ?>  
							</tbody>
							</table>
						</div>

						<div class="hidden <?= $l_servicio == 1 ? 'd-none' : ''; ?> <?= $r_servicio == 1 ? '' : 'd-none eraser'; ?>">
							<h3 class="text-center my-3">Registro de servicios</h3>
							<form method="post" action="../controlador/servicio_controlador.php" class="row SendFormAjax p-3" autocomplete="off" data-type-form="save">
							<input type="hidden" name="dolar" id="precioDolar" value="<?= $precio_dolar_actual; ?>">
							<input type="hidden" name="modulo" value="Guardar">

							<div class="col-12 col-sm-12 col-md-12 mb-3">
								<h5 class="card-title"> Datos del Servicio </h5>
								<div class="row mt-2">
								<div class="col-md-6">
									<label class="form-label">Nombre del Servicio</label>
									<div class="col-md-4 input-group">
									<input type="text" class="form-control" placeholder="ingresa el nombre del servicio" name="nombre_platillo" id="nombre_platillo" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<label class="form-label">Descripción</label>
									<input type="text" class="form-control" placeholder="ingresa la descripción" id="descripcion" name="descripcion" required>
								</div>
								</div>
							</div>
							
							<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 row">
								<h5 class="card-title">Productos del servicio</h5>
								<label class="form-label">Producto <span style="color:#f00;">*</span></label>
								<div class="col-12 col-sm-12 col-md-9 mb-3">
									<select name="producto" id="producto_id" class="form-select select">
										<option value="" selected>seleccione una opción</option>
										<?php producto_model::options("1"); ?>
									</select>
								</div>
								<div class="col-12 col-sm-12 col-md-3 mb-3">
									<button type="button" name="btn_producto" class="btn_add btn btn-success bi bi-plus">&nbsp; Añadir producto</button>
								</div>
							</div>

							<div class="col-md-12">
								<div class="table-responsive">
								<h5 class="card-title">Lista de productos seleccionados</h5>
								<table class="table table-striped">
									<thead>
									<tr>
										<th class="col text-center" scope="col">Producto</th>
										<th class="col text-center" scope="col">Cantidad a agregar al servicio</th>
										<th class="col text-center" scope="col">Eliminar</th>
									</tr>
									</thead>
									<tbody id="lista_producto">
									
									</tbody>
								</table>
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 mb-3 mt-5"> 
								<h5 class="card-title">Precio del Servicio</h5>

								<div class="row mt-2">
								<div class="col-12 col-sm-6 col-md-6 mb-3 text-start">
									<label class="form-label">En Dolares ($)</label>
									<input class="form-control" id="precio_dolar_servicio" name="precio_dolar" placeholder="ingresa el precio en $">
								</div>
								<div class="col-12 col-sm-6 col-md-6 mb-3 text-center">
									<label class="form-label">En Bolivares (BS)</label>
									<input class="form-control bg-dark-subtle" readonly id="precio_bolivar_servcio" name="precio_bolivar" placeholder="ingresa el precio en bs">
								</div>
								</div>
							</div>
							
							<div class="col-12 mb-1">
								<div class="form-group">
									<p class="form-p fs-5">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
								<button type="submit" class="btn btn-success">Registra Servicio</button>
							</div>
							</form>
						</div>
						</div>
					</div>
					</div>
				</div>
				</section>
			</main>
		
			<script src="./js/añadir_elemento_lista.js"></script>
			<script>
				// funcion para agregar mas productos al modificar un servicio
				const addProductOnService = () => {
					$.ajax({
						data: '',
						url:  "../include/tr_producto_modificar_servicio.php",
						type:  'post',
						success:function(valores){
							$(`#tableModifyService`).append(valores);
						},
						error: function(){
							Swal.fire("ocurrio un error!","la solicitud no pudo ser procesada","error");
						}
					});
				};
				// funcionalidad para calcular automaticamente el precio en bs de un servicio en base a la tasa del dia
				const input_dolar = document.getElementById('precio_dolar_servicio');
				const input_bs = document.getElementById('precio_bolivar_servcio');
				input_dolar.addEventListener('keyup',(e) => {
					e.preventDefault();
					let tasa = document.getElementById('tasa_dolar').textContent;
					tasa = parseFloat(tasa);
					input_bs.value = (input_dolar.value * tasa).toFixed(2);
				});
				
				// funcion para mostrar y ocultar elementos en proveedores
				const titlex = ['Registrar un nuevo servicio','Ver lista de servicios registrados'];
				const btnToggle = document.getElementById('btn_register');

				const toggle = ()=>{
					btnToggle.classList.toggle('bi-list-columns-reverse');
					btnToggle.classList.toggle('btn-secondary');
					btnToggle.classList.toggle('bi-plus');
					btnToggle.classList.toggle('btn-success');
					btnToggle.textContent = btnToggle.textContent.trim() == titlex[0] ? ' '+titlex[1] : ' '+titlex[0];
					
					const hiddenElements = document.querySelectorAll('.hidden');
					hiddenElements.forEach(element => {
						element.classList.toggle('d-none');
					});
				};

			</script>
			<?php 
				include_once "./modal/plantillaModalCustom.php"; 
				modalCustom ("modal-xl");
				// se incluye el footer / pie de pagina a la vista
				include_once ("../include/footer.php");
				// se incluyen los script de javascript a la vista 
				include_once ("../include/scripts_include.php");
			
				model_user::validar_sesion_activa($id_usuario);

				config_model::verificar_actualizacion_configuracion(); 
			
			?>
			<script>
			
				const selectores = document.getElementById('body_modal');
				selectores.addEventListener('change', ()=>{
					console.log('canhaef');
				});
				
			</script>
		</body>
	</html>
<?php }else{
	// se registran las acciones del usuario en la bitacora y es redirijido al inicio
	bitacora::intento_de_acceso_a_vista_sin_permisos("lista de servicios");
}