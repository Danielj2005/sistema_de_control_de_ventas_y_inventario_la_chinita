<?php 
session_start();
// importacion de la conexion a la base de datos y al modelo de usuario

include_once ("../include/modelos_include.php"); // se incluyen los modelos necesarios para la vista

$valores["usuario_bloqueado"] = 0;

// se obtiene la cantidad de preguntas de seguridad que tiene el sistema
$cantidad_preguntas_sistema = mysqli_fetch_array(config_model::consultar("c_preguntas")); 

// se genera un numero aleatorio entre 1 y la cantidad de preguntas de seguridad que tiene el sistema
$numero_pregunta_random = rand(1, intval($cantidad_preguntas_sistema['c_preguntas'])); 


if (!isset($_POST['acceso_recuperar_contraseña']) || $_POST['acceso_recuperar_contraseña'] != "ecDAuKiplp8=") {
	header('Location: ../');
	exit();
}


if (!isset($_POST['correo_recuperar_contraseña']) || empty($_POST['correo_recuperar_contraseña'])) {
	header("Location: ../"); 
	alert_model::alerta_simple('¡Ocurrio un error!','El campo de correo se encuentra vacio, verifique e intente nuevamente','error');
	exit();
}

$correo = $_POST['correo_recuperar_contraseña']; // se obtiene el correo del usuario que desea recuperar la contraseña

$datos_usuario = model_user::consulta_usuario_condicion("id_usuario, bloqueado, suspender","correo = '$correo'");

$datos_usuario = mysqli_fetch_array($datos_usuario); // se obtiene el resultado de la consulta y la guardamos en un array

/** se verifica si el usuario esta bloqueado: 
 * la cuenta es bloqueada luego de tres intentos fallidos de inicio de sesión */
if ($datos_usuario["bloqueado"] == 1) {
	$valores["usuario_bloqueado"] = 1; // se reinicia el contador de intentos de inicio de sesión
	$valores = json_encode($valores);
	echo $valores;
    // alert_model::alerta_simple('¡Cuenta bloqueada!','Su cuenta ha sido bloqueada debido a tres intentos fallidos de inicio de sesión, por favor contacte al administrador del sistema para restablecer el acceso.','warning');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cambiar contraseña</title>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="./css/login.css">
		<link rel="stylesheet" type="text/css" href="./css/sweet-alert.css">
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
				<div class="col-10 col-sm-6 col-md-6 m-5 p-3 pt-4 rounded-4 glassmorph text-dark">
					<div class="text-center mb-5">
						<h2>Cambiar Contraseña</h2>
					</div>
					<div class="">
						<?php if(isset($_POST['correo_recuperar_contraseña'])){
								
							$correo = $_POST['correo_recuperar_contraseña'];
				
							$correo = modeloPrincipal::consultar("SELECT id_usuario FROM usuario WHERE correo = '$correo'");
							
							if(mysqli_num_rows($correo) < 1){ ?>  
								<div class="text-center">
									<!-- en caso de que el usuario no exista en el sistema -->
									<label class="label text-danger" style="color: #883333;">Ocurrio un error! </label>
									<p>El documento de identidad que ha ingresado no existe en nuestro sistema. Por favor, verifique que ha escrito correctamente su documento. Si aún tiene problemas, contacte a nuestro equipo de soporte para obtener ayuda.</p>
								</div>
								<div class="input-group">
									<div class="">
										<a href="../index.php" title="Volver">Volver</a>
									</div>
								</div>
						<?php   } 
							$id_usuario = mysqli_fetch_array($correo);
							$id_usuario = $id_usuario['id_usuario'];
							
							$preguntas = modeloPrincipal::consultar("SELECT pregunta FROM seguridad AS S 
								INNER JOIN preguntas_secretas AS P ON P.id_pregunta = S.id_seguridad
								WHERE P.id_usuario = '$id_usuario' AND P.numero_pregunta='$numero_pregunta_random'");
							
							if(mysqli_num_rows($preguntas) > 0){ 
								$pregunta = mysqli_fetch_array($preguntas); ?>  

								<div id="verificar_respuestas" class="w-100 text-center">
									<p style="font-size: 1em;">Por favor complete el siguiente formulario para cambiar su contraseña</p>
									<input form="recuperar_contraseña_preguntas" type="hidden" id="id_usuario" name="id_usuario" value="<?= $id_usuario; ?>">
									<input form="recuperar_contraseña_preguntas" type="hidden" name="modulo" value="verificar_preguntas">
									<input form="recuperar_contraseña_preguntas" type="hidden" id="numero_pregunta" name="numero_pregunta" value="<?= $numero_pregunta_random; ?>">
									<!-- pregunta de seguridad para cambiar contraseña -->
									<div class="mb-4 text-center">
										<label><h6>Su pregunta de seguridad es :<span style="color:#f00;">*</span></h6> </label>
										<p><strong><?= modeloPrincipal::decryption($pregunta['pregunta']); ?></strong></p>
										<input form="recuperar_contraseña_preguntas" class="form-control" type="text" id="respuesta_seguridad" name="respuesta_seguridad" placeholder="Ingresa tu respuesta" required pattern="[A-Za-zÁÉÍÚÓáéíóú ]{3,50}" maxlength="50" title="Respuesta.">
									</div>
									<div class="text-center row">									
										<div class="col-12 mb-4">
											<p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
										</div>
										<div class="col-12 mb-4">
											<button form="recuperar_contraseña_preguntas" onclick="enviar_respuestas_recuperar_contraseña()" type="submit" class="btn btn-primary">Verificar</button>
										</div>
										<div class="col-12 mb-4">
											<a href="../index.php" class="btn btn-link" title="Volver">Volver</a>
										</div>
									</div>
									
								</div>
								<div id="cambiar_contraseña" class="d-none">
									<div class="formulario text-center mb-3">
										<form method="post" action="../controlador/recuperar_contraseña.php" class="SendFormAjax" data-type-form="update">
											<p>Escribe una contraseña nueva</p>
											<div class="text-start mb-4 position-relative" id="grupo__nueva_contraseña">
												<label>Nueva contraseña <span style="color: #f00;">*</span> </label>
												<input type="hidden" name="modulo" value="cambiar_contraseña">
												<input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
												<input required="" placeholder="ingresa la nueva contraseña" class="input__field form-control" autocomplete="off" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{7,16}" type="password" name="nueva_contraseña" id="nueva_contraseña">
												<i class="bi bi-eye input__icon position-absolute h3 m-0 text-black"></i> 
											</div>
											<p class="text-danger d-none input_error formulario__input-error__nueva_contraseña" style="width: 19em;">La contraseña debe tener entre 7 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.</p>
											<div class="text-start mb-4 position-relative" id="grupo__repite_nueva_contraseña2">
												<label>Repita la contraseña <span style="color:#f00;">*</span></label>
												<input required="" placeholder="repite la contraseña" class="input__field form-control" autocomplete="off" pattern="[A-Za-zñÑÁÉÍÚÓáéíóú0-9]{7,16}" type="password"  name="repite_nueva_contraseña2" id="repite_nueva_contraseña2">
												<i class="bi bi-eye input__icon position-absolute h3 m-0 text-black"></i>
											</div>
											<p class="text-danger d-none input_error formulario__input-error__repite_nueva_contraseña2" style="width: 19em;">Las contraseñas no coinciden.</p>
											<div class="text-center mb-3">
												<p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p>
													
												<button type="submit" class="btn btn-primary text-black-hover text-white">Cambiar contraseña</button>
												<div class="my-3">
													<a href="../index.php" class="btn btn-link" title="Volver">Cancelar</a>
												</div>
											</div>

										</form>
									</div>
								</div>
						<?php   } else { ?> 
							<!-- se muestra en caso de el usuario no tenga preguntas de seguridad configuradas -->
							<div class="text-" style="text-align: center;" id="grupo__pregunta">
								<label class="label text-danger" style="color: #883333;">Ocurrio un error! </label>
								<p>Su usuario no tiene preguntas secretas asignadas en nuestro sistema. Por favor, verifique que ha configurado sus preguntas en el perfil de su usuairo. Si aún tiene problemas, contacte a nuestro equipo de soporte para obtener ayuda.</p>
							</div>
							<div class="text-center mb-4">
								<a href="../index.php" class="btn btn-link" title="Volver">Volver</a>
							</div>
						<?php } } else { header("../index.php"); } ?> 
					</div>
				</div>
			</div>
		</div>
		<div class="msjFormSend"></div>
		<script src="./js/jquery-3.6.0.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/SendForm.js"></script>
		<script src="./js/sweet-alert.min.js"></script>
		<script src="./js/recuperar_contraseña.js"></script>
		<script src="./js/hiddeInput.js"></script>
	</body>
</html>