<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

require_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

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
						
						<div class="row text-center p-2 justify-content-center">
							<?php if (rol_model::verificar_rol('r_empleado') == '1'): ?>
								<div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
									<button class="col-12 btn btn-success" data-bs-toggle="modal" data-bs-target="#registrar_usuario">Registar un Empleado</button>
								</div>
							<?php endif; ?>

							<div class="col-12 col-sm-12 col-md-6 mb-3 row m-0">
								<a class="col-12 btn btn-secondary" target="_blank" href="./reportes/lista_empleados.php">Exportar Lista de Empleados </a>
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
									<th scope="col">Cédula</th>
									<th scope="col">Nombre y Apellido</th>
									<th scope="col">Teléfono</th>
									<?php if (rol_model::verificar_rol('m_empleado') == '1'): ?>
										<th scope="col" class="text-center">Modificar</th>
										<th scope="col" class="text-center">Estado</th>
									<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php model_user::lista_de_usuarios(); ?>  
								</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>
			</main>
			
			<?php if (rol_model::verificar_rol('m_empleado') == '1'): ?>

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
				
			<?php endif;  if (rol_model::verificar_rol('r_empleado') == '1'): ?>

				<div class="modal fade" id="registrar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-cirle-plus fs-4"></i>Registrar un nuevo Empleado</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body row justify-content-center" id="body_modal"> 
								<form id="registro_empleado" autocomplete="off" action="../controlador/usuario_controller.php" method="post" class="SendFormAjax" data-type-form="save">
									<input type="hidden" name="modulo" value="Guardar">
									<div class="row">

										<div class="mb-3 col-sm-6">
											<label class="control-label">Cédula <span style="color:#f00;">*</span></label>
											<div class="input-group">
												<select name="nacionalidad" class="form-select-sm col-sm-3 input-group-text" aria-label="Default select example">
													<option name="nacionalidad" value="V-">V</option>
													<option name="nacionalidad" value="E-">E</option>
												</select>
												<input class="form-control" required pattern="[0-9]{7,8}" type="text" name="cedula" id="cedula" maxlength="8" placeholder="Ingrese la Cédula">
											</div>
										</div>
								
										<div class="mb-3 col-sm-6 ">
											<label class="control-label">Nombre <span style="color:#f00;">*</span></label>
											<input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,100}" maxlength="100" required="" placeholder="Ingresa el Nombre" class="form-control" id="nombre" name="nombre">
										</div>

										<div class="mb-3 col-sm-6 label-floathing form-group">
											<label class="control-label">Apellido <span style="color:#f00;">*</span></label>
											<input form="registro_empleado" type="text" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú ]{4,100}" maxlength="100" required="" placeholder="Ingrese el Apellido" class="form-control" id="apellido" name="apellido">
										</div>

										<div class="mb-3 col-sm-6 label-floathing form-group">
											<label class="control-label">Correo <span style="color:#f00;">*</span></label>
											<input form="registro_empleado" type="text" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ@.0-9]{11,200}" maxlength="200" required="" placeholder="Ingrese el Correo" class="form-control" id="correo" name="correo">
										</div>

										<div class="mb-3 col-sm-6 label-floathing form-group">
											<label class="control-label">Teléfono <span style="color:#f00;">*</span></label>
											<input form="registro_empleado" type="text" pattern="[0-9]{11}" maxlength="11" required="" placeholder="Ingrese el Teléfono" class="form-control" id="telefono" name="telefono">
										</div>
										
										<div class="mb-3 col-sm-6 label-floathing form-group">
											<label class="control-label">Dirección <span style="color:#f00;">*</span></label>
											<input form="registro_empleado" type="text" maxlength="250" required="" placeholder="Ingrese la Dirección" class="form-control" id="direccion" name="direccion">
										</div>

										<div class="mb-3 col-sm-12 label-floathing">
											<div class="form-group">
												<label class="control-label">Tipo de Usuario <span style="color:#f00;">*</span></label>
												<select  class="form-select" name="id_tipo" id="id_tipo">
													<option disabled="disabled" selected="true" class="form-control" >selecciona una opción</option>
													<?php rol_model::option(); ?>  
												</select>
											</div>
										</div>
									</div>
									<div class="col-12 mb-1">
										<div class="form-group">
											<p class="form-p">Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button form="registro_empleado" type="submit" class="btn btn-success bi bi-plus">&nbsp;Registrar</button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			<?php endif; 
				// se incluye el footer / pie de pagina a la vista
				include_once("../include/footer.php");
				// se incluyen los script de javascript a la vista 
				include_once("../include/scripts_include.php");
				
				model_user::validar_sesion_activa($id_usuario);

				config_model::verificar_actualizacion_configuracion(); 
		
				?>
		</body>
	</html>
<?php }else{
	// se registran las acciones del usuario en la bitacora y es redirijido al inicio
	bitacora::intento_de_acceso_a_vista_sin_permisos("lista de empleados");
}