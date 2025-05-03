<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();
$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

// esta funcion retorna si el rol tiene permiso a las vista
$rol = rol_model::permisos_modulos('r_empleado + m_empleado + l_empleado');

// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) {  ?>

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<!-- titulo -->
			<title>Empleados</title>
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
				<div class="pagetitle">
					<a class="btn btn-outline-secondary bi bi-arrow-bar-left" href="./inicio.php">&nbsp; Volver al inicio</a>
					<h1 class="my-3">Empleados</h1>
				</div>
				<section class="section dashboard">
					<div class="card">
						
						<div class="row text-center p-2">

							<div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">

								<a class="col-12 btn btn-success" 
									href="./<?= rol_model::verificar_rol('r_empleado') == 1 ? 'registrar_empleados.php' : 'lista_empleados.php'?>">
										Registar Empleado
								</a>

							</div>

							<div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">

								<a class="col-12 btn btn-secondary" 
									target="_blank" 
									href="./reportes/lista_empleados.php" 
									class="col-12 btn btn-success">
										Exportar Lista de Empleados
								</a>
							</div>
						</div>
						<hr>
						<div class="card-body pb-3">
						<div class="table-responsive">
							<h5 class="card-title">Lista de Empleados</h5>
							<table class="table datatable table-striped" id="example">
							<thead>
								<tr>
								<th scope="col">#</th>
								<th scope="col">CÉDULA</th>
								<th scope="col">NOMBRE</th>
								<th scope="col">APELLIDO</th>
								<th scope="col">TELÉFONO</th>
								<th scope="col" class="text-center">MODIFICAR</th>
								<th scope="col" class="text-center">ESTADO</th>
								</tr>
							</thead>
							<tbody>
								<?php include("../include/listas_registros_include.php"); consultar_registros('usuario'); ?>  
							</tbody>
							</table>
						</div>
						</div>
					</div>
				</section>
			</main>

			<div class="modal fade" id="update_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modificar o actualizar acceso al sistema del empleado</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body row justify-content-center" id="body_modal"> </div>
							
						<div class="modal-footer">
							<button id="btn_guardar_modal" type="submit" class="btn btn-success">Guardar</button>
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- modal modificar -->
			<script src="./js/modal.js"></script>

			<?php 
				// se incluye el footer / pie de pagina a la vista
				include_once("../include/footer.php");
				// se incluyen los script de javascript a la vista 
				include_once("../include/scripts_include.php");

				config_model::verificar_actualizacion_configuracion(); 
		
				?>
		</body>
	</html>
<?php }else{
	// se registran las acciones del usuario en la bitacora y es redirijido al inicio
	bitacora::intento_de_acceso_a_vista_sin_permisos("lista de empleados");
}