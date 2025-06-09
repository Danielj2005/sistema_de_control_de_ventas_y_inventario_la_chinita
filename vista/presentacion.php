<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::verificar_rol('r_presentacion + m_presentacion + l_presentacion');

// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) {  ?>

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<!-- titulo -->
			<title>Presentación de los Productos</title>
			<?php 
				// se incluyen los meta datos 
				include_once "../include/meta_include.php"; 
				// se incluyen los estilos css y sus librerias a la vista
				include_once "../include/css_include.php"; 
			?>
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
					<h1>
						<a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./productos.php">&nbsp; Volver</a>
						Presentación
					</h1>
				</div>

				<section class="section dashboard">
					<div class="row">
						<div class="col-12 col-sm-7 col-md-7 mb-3">
							<div class="card">
								<div class="card-body p-3 overflow-hidden">
									<h5 class="card-title">Lista de Presentaciones</h5>
									<div class="table table-responsive">
										<table class="table table-borderless table-striped datatable mb-3" id="example">
											<thead>
												<tr>
													<th class="col text-center" scope="col">#</th>
													<th class="col text-center" scope="col">NOMBRE</th>
													<th class="col text-center" scope="col">DESCRIPCIÓN</th>
													<th class="col text-center" scope="col">ESTADO</th>
												</tr>
											</thead>
											<tbody>
												<?php presentacion_model::lista(); ?>  
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-sm-5 col-md-5 mb-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Añadir una nueva presentación</h5>
									<form action="../controlador/presentacion.php" method="post" class="SendFormAjax" autocomplete="off" data-type-form="save">
										<input type="hidden" name="modulo" value="Guardar">          
										<div class="row mb-3">
											<div class="col-12 mb-3">
												<label class="col-form-label">Nombre</label>
												<div class="col-sm-10">
													<input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9 ]{3,50}" required="" placeholder="ingresa el nombre" class="form-control" id="id" name="nombre">
												</div>
											</div>

											<div class="col-12 mb-3">
												<label class="col-form-label">Descripción</label>
												<div class="col-sm-10">
													<input type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,250}" required="" placeholder="ingresa la descripción" class="form-control" id="id" name="descripcion">
												</div>
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-success bi bi-plus">&nbsp; Añadir</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>
		
			<?php 
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
	bitacora::intento_de_acceso_a_vista_sin_permisos("registro de presentación");
}