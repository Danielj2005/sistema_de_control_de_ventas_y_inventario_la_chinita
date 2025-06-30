<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

$valores["usuario_bloqueado"] = 0;

if (!isset($_SESSION['ARC']) || $_SESSION['ARC'] !== "ecDAuKiplp8=") {
	header('Location: ../');
	exit();
}

if (!isset($_POST['correo_recuperar_contraseña']) || $_POST['correo_recuperar_contraseña'] == "") {
	header("Location: ../"); 
	exit();
}

// se genera un Número aleatorio entre 1 y la cantidad de Preguntas de seguridad que tiene el sistema
$NP = intval(modeloprincipal::limpiar_cadena($_SESSION['CPS']));

$correo = modeloprincipal::limpiar_cadena($_POST['correo_recuperar_contraseña']); // se obtiene el correo del usuario que desea recuperar la contraseña

$datos_usuario = model_user::consulta_usuario_condicion("id_usuario, bloqueado","correo = '$correo'");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cambiar contraseña</title>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="./css/login.css">
		<link href="img/logo.png" rel="icon">
		<link rel="stylesheet" type="text/css" href="./css/sweetalert2.min.css">

		
		<script src="./js/jquery-3.6.0.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/SendForm.js"></script>
		<script src="./js/sweetalert2.min.js"></script>
		<script src="./js/recuperar_contraseña.js"></script>
		<script src="./js/hiddeInput.js"></script>
		<script>
			$(document).ready(function () {
				SendFormAjax();
			});
		</script>
	</head>
	<body style="color:white;">
		<div class="row justify-content-center">

			<div class="carousel slide z-depth-5 col-12 col-sm-12 col-md-12 col-lg-12" data-bs-ride="carousel" id="myCarousel">

				<div class="carousel-indicators">
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="./img/Designer(10).jpeg" width="100%" height="650px" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="./img/Designer(11).jpeg" width="100%" height="650px" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="./img/Designer(12).jpeg" width="100%" height="650px" aria-hidden="true" focusable="false">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			
			<div class="col-12 position-absolute row justify-content-center">
				<div class="col-10 col-sm-6 col-md-6 m-5 p-3 pt-4 rounded-4 glassmorph">
					<div class="text-center mb-5">
						<h2>Cambiar Contraseña</h2>
					</div>
					<div class="">
						<?php 
							if (mysqli_num_rows($datos_usuario) < 1) {
								alert_model::alert_redirect("Usuario no encontrado!","El Correo que haz ingresado no existe en nuestro sistema. Por favor, verifique que ha escrito correctamente su correo. Si aún tiene problemas, Por favor contacte al administrador del sistema para obtener ayuda.","error","../");
								exit();
							}
							
							// se obtiene el resultado de la consulta y la guardamos en un array
							$datos_usuario = mysqli_fetch_array($datos_usuario); 

							$id_usuario = $datos_usuario['id_usuario'];
							
							$preguntas = modeloPrincipal::consultar("SELECT pregunta 
								FROM seguridad AS S 
								INNER JOIN preguntas_secretas AS P ON P.id_pregunta = S.id_seguridad
								WHERE P.id_usuario = '$id_usuario' AND P.numero_pregunta = '$NP'");
	
							if (mysqli_num_rows($preguntas) < 1) {
								alert_model::alert_redirect("Usuario sin preguntas!","$NP tú usuario no tiene preguntas asignadas. Por favor, verifique que su usuario cuente con alguna pregunta. Si aún tiene problemas, Por favor contacte al administrador del sistema para restablecer el acceso.","error","../");
								exit();
							}

							$pregunta = mysqli_fetch_array($preguntas); ?>  

						<div id="verificar_respuestas" class="w-100 text-center">
							<form id="form_respuestas" method="post" action="../controlador/recuperar_contraseña.php" class="SendFormAjax" data-type-form="load">
								<p style="font-size: 1em;">Por favor complete el siguiente formulario para cambiar su contraseña</p>
								<input form="form_respuestas" type="hidden" id="id_usuario" name="id_usuario" value="<?= $id_usuario; ?>">
								<input form="form_respuestas" type="hidden" name="modulo" value="verificar_preguntas">
								<input form="form_respuestas" type="hidden" id="numero_pregunta" name="numero_pregunta" value="<?= $numero_pregunta_random; ?>">
								<!-- pregunta de seguridad para cambiar contraseña -->
								<div class="mb-4 text-center">
									<h6>Su pregunta de seguridad es :<span style="color:#f00;">*</span></h6>
									<p><strong><?= modeloPrincipal::decryption($pregunta['pregunta']); ?></strong></p>
									<input form="form_respuestas" class="form-control" type="text" id="respuesta_seguridad" name="respuesta_seguridad" placeholder="Ingresa tu respuesta" required pattern="[A-Za-zÁÉÍÚÓáéíóú ]{3,50}" maxlength="50" title="Respuesta.">
								</div>
								<div class="text-center row">									
									<div class="col-12 mb-4">
										<p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
									</div>
									<div class="col-12 mb-4">
										<button form="form_respuestas" type="submit" class="btn btn-success">Verificar</button>
									</div>
						
									<div class="col-12 mb-4">
										<a href="../index.php" class="btn btn-link text-light" title="Volver">Volver</a>
									</div>
								</div>
							</form>
						</div>

						<div id="cambiar_contraseña" class="d-none">
							<div class="formulario text-center mb-3">
								<form method="post" action="../controlador/recuperar_contraseña.php" class="SendFormAjax" data-type-form="update">
									<p>Escribe una contraseña nueva</p>
									<div class="text-start mb-4 position-relative" id="grupo__nueva_contraseña">
										<label class="mb-2">Nueva contraseña <span style="color: #f00;">*</span> </label>
										
										<input type="hidden" name="modulo" value="cambiar_contraseña">
										<input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">

										<div class="input-group mb-3">
											<span class="input-group-text"><i class="bi bi-lock"></i></span>

											<input class="p-1 input__field passw form-control" required="" placeholder="ingresa la nueva contraseña" autocomplete="off" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{3,16}" type="password" name="nueva_contraseña" id="nueva_contraseña">
											
											<button class="input-group-text btn btn-secondary" id="eyeIcon" >
												<i class="bi bi-eye input__icon"></i>
											</button>
										</div>
									</div>
									<p class="text-danger d-none input_error formulario__input-error__nueva_contraseña" style="width: 19em;">La contraseña debe tener entre 7 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.</p>
									
									<div class="text-start mb-4 position-relative" id="grupo__repite_nueva_contraseña2">
										<label class="mb-2">Repita la contraseña <span style="color:#f00;">*</span></label>
										<div class="input-group mb-3">
											<span class="input-group-text"><i class="bi bi-lock"></i></span>

											<input class="p-1 input__field passw form-control" required="" placeholder="repite la contraseña" autocomplete="off" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{3,16}" type="password" name="repite_nueva_contraseña2" id="repite_nueva_contraseña2">
											
											<button class="input-group-text btn btn-secondary" id="eyeIcon" >
												<i class="bi bi-eye input__icon"></i>
											</button>
										</div>
									</div>
									<p class="text-danger d-none input_error formulario__input-error__repite_nueva_contraseña2" style="width: 19em;">Las contraseñas no coinciden.</p>
									
									<div class="text-center mb-3">
										<p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
											
										<button type="submit" class="btn btn-success text-black-hover text-white">Cambiar contraseña</button>
										<div class="my-3">
											<a href="../index.php" class="btn btn-link" title="Volver">Cancelar</a>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="msjFormSend"></div>

		<?php
			
			/** se verifica si el usuario esta bloqueado: 
			 * la cuenta es bloqueada luego de tres intentos fallidos de inicio de sesión */

			if ($datos_usuario["bloqueado"] == 1) {
				alert_model::alert_redirect("¡Cuenta bloqueada!","Su cuenta ha sido bloqueada debido a tres intentos fallidos de inicio de sesión, por favor contacte al administrador del sistema para restablecer el acceso.","warning","./vista/recuperar_contraseña.php");
				exit();
			}
		?>
	</body>
</html>
