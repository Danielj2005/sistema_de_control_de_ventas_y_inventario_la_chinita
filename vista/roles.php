<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario

model_user::validar_primer_inicio($id_usuario); // se valida si es el primer inicio de sesion

$rol = rol_model::permisos_modulos('r_rol + m_rol + l_rol'); // esta funcion retorna si el rol tiene permiso a las vista
// se evalua que este rol tenga el acceso a esta vista
if ($rol >= 1 && $rol <= 3) {  

	$estado = (!isset($_POST['estado_rol'])) ? '1' : $_POST['estado_rol'];

	$consulta = modeloPrincipal::consultar("SELECT id_rol, nombre, estado
		FROM rol WHERE id_rol != 1 AND estado = $estado");
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<!-- titulo -->
			<title>Roles</title> 
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
					<h1 class="my-3">Roles</h1>
				</div>
				<section class="section dashboard">
					<div class="card">
						<div class="row text-center p-2 align-items-center">
							<div class="col-12 col-sm-12 col-md-6 mb-3">
								<a class="col-12 btn btn-success" href="./<?= rol_model::verificar_rol('r_rol') == 1 ? 'registrar_rol.php' : 'roles.php' ?>">
									Registrar un nuevo rol
								</a>
							</div>

							<div class="col-12 col-sm-12 col-md-6 mb-3">
								<form action="./roles.php" method="post">
									<input type="hidden" name="estado_rol" value="<?= ($estado == '0') ? "1" : "0"?>">
									<button type="submit" class="col-12 btn btn-secondary">
										<?= ($estado == '0') ? "Roles activos" : "Roles inactivos"?>
									</button>
								</form>
							</div>
						</div>

						<hr>

						<div class="card-body pb-1">
							<h5 class="card-title">Lista de Roles <?= ($estado == '1') ? "Activos" : "Inactivos"?></h5>
							<div class="table table-responsive">
								<table class="table datatable table-striped" id="example">
									<thead>
										<tr>
										<th class="text-center col" scope="col">#</th>
										<th class="text-center col" scope="col">NOMBRE</th>
										<th class="text-center col" scope="col">VER PERMISOS</th>
										<th class="text-center col" scope="col">MODIFICAR</th>
										<th class="text-center col" scope="col"><?= ($estado == '0') ? 'ACTIVAR' : 'DESACTIVAR'; ?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row = mysqli_fetch_assoc($consulta)) { ?>
												<tr>
													<th class="text-center col" scope="col"></th>
													<th class="text-center col" scope="col"><?= $row['nombre'] ?></th>
													<th class="text-center col" scope="col">
														<button modal="ver_detalles_rol" class="btn_modal btn bi bi-eye btn-info" url="./modal/rol/permisos_rol.php" value="<?= modeloPrincipal::encryptionId($row["id_rol"]); ?>" data-bs-toggle="modal" data-bs-target="#modal"></button>
													</th>
													<?php if (rol_model::verificar_rol('m_rol') == '1') { ?>
														<th class="text-center col" scope="col">
															<button modal="modificar_rol" url="./modal/rol/modificar_rol.php" data-bs-toggle="modal" data-bs-target="#modal" class="btn_modal btn bi bi-gear btn-warning" value="<?= modeloPrincipal::encryptionId($row["id_rol"]); ?>"></button>
														</th>
														<th class="text-center col" scope="col">
															<form action="../controlador/rol.php" method="post" class="SendFormAjax" data-type-form="update_estate">
																<input name="modulo" type="hidden" value="<?= ($estado == '1') ? 'activo' : 'inactivo'; ?>">
																<input name="UIDR" type="hidden" value="<?= modeloPrincipal::encryptionId($row["id_rol"]); ?>">
																<button class="btn bi <?= ($row['estado'] == '0') ? 'bi-check-circle btn-success' : 'bi-x-circle btn-danger'; ?>" ></button>
															</form>
														</th>
													<?php } ?>
												</tr>
										<?php } ?>  
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>
			</main>
			
			<!-- se incluye el script para seleccionar las casillas de verificacion -->
			<script type="text/javascript" src="./js/funcion_seleccionar_casillas.js"></script>

			<?php 
				include_once "./modal/plantillaModalCustom.php"; 
				modalCustom ("modal-xl");
				// se incluye el footer / pie de pagina a la vista
				include_once("../include/footer.php");

				// se incluyen los script de javascript a la vista 
				include_once("../include/scripts_include.php"); 
				
				model_user::validar_sesion_activa($id_usuario);
				
				config_model::verificar_actualizacion_configuracion(); ?>
		</body>
	</html>
<?php }else{
	// se registran las acciones del usuario en la bitacora y es redirijido al inicio
	bitacora::intento_de_acceso_a_vista_sin_permisos('lista de roles');
}