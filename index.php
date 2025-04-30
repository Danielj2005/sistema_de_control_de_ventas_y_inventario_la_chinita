<?php 
session_start();

$_SESSION['numero_1'] = rand(1, 7);
$_SESSION['numero_2'] = rand(1, 7);
$_SESSION['captcha'] = $_SESSION['numero_1'] + $_SESSION['numero_2'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>INICIO</title>
		<link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vista/css/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="vista/css/sweet-alert.css">
		<link rel="stylesheet" type="text/css" href="vista/css/login.css">
	</head>
	<body>
		<div class="row justify-content-center m-0">

			<!-- galeria de imagenes -->
			<div class="carousel slide z-depth-5 col-12 col-sm-12 col-md-12 col-lg-12" data-bs-ride="carousel" id="myCarousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="vista/img/Designer(10).jpeg" width="100%" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="vista/img/Designer(11).jpeg" width="100%" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="vista/img/Designer(12).jpeg" width="100%" aria-hidden="true" focusable="false">
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

			<!-- fomulario de inicio de sesión -->
			<div class="col-12 position-absolute row justify-content-center">
				<div class="col-10 col-sm-6 col-md-6 glassmorph m-5 p-3 pt-4 rounded-4">
					<form method="post" action="controlador/login.php" class="SendFormAjax" data-type-form="load">
						<div class="row justify-content-center">
							<div class="col-12 avatar text-center mb-3">
								<img src="vista/img/logo.png">
								<h2>Inicio de Sesión </h2>
							</div>
							<div class="col-12 col-sm-12 col-md-12 mb-2">
								<label class="mb-2">Correo Electrónico</label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">@</span>
									<input type="text" class="p-1 form-control" id="correo" name="correo" placeholder="ingresa tú correo" aria-label="email" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 mb-2">
								<label class="mb-2">Contraseña</label>
								
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="bi bi-lock"></i></span>

									<input type="password" class="p-1 input__field passw form-control" id="pswd" name="contraseña" placeholder="Ingresa tu contraseña">
									
									<span class="input-group-text btn btn-secondary">
										<i class="bi bi-eye input__icon" id="eyeIcon"></i>
									</span>
								</div>
							</div>
							
							<!-- Captcha de seguridad -->
							<div class="card col-6 mb-2 text-center border-dark">
								<div class="card-header">
									<p class="card-title">Ingresa el captcha: <?= $_SESSION['numero_1']." + ".$_SESSION['numero_2'] ?></p>
								</div>
								<div class="card-footer">
									<input type="text" id="respuesta_captcha" name="respuesta_captcha" autocomplete="off" min="1" pattern="[0-9]{1,20}" required class="d-block text-center w-100 border border-2 border-dark rounded-3">
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-12 mb-3 text-center">
									<button type="submit" class="btn btn-primary btn-md mt-4 mx-4">iniciar sesión</button>
								</div>
								<div class="col-12 mb-3 text-center">
									<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#recuperar_contraseña">
										¿Problemas para iniciar sesión? Recupera tu acceso
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="msjFormSend"></div>

		<!-- modal recuperar contraseña -->
		<div class="modal fade p-5" id="recuperar_contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content bg-75">
					<form method="post" action="./vista/recuperar_contraseña.php">
						<input type="hidden" name="acceso_recuperar_contraseña" value="ecDAuKiplp8=">
						<div class="modal-header">
							<h1 class="modal-title fs-3 text-black" id="exampleModalLabel"> Recuperar acceso</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="">
								<label class="mb-3 text-black">Correo <span class="text-danger"> * </span></label>
								<input type="text" class="input__field form-control" name="correo_recuperar_contraseña" id="correo_recuperar_contraseña" placeholder="ingresa tu correo">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="vista/js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
		<script src="vista/js/hiddeInput.js"></script>
		<script src="vista/js/SendForm.js"></script>
		<script src="vista/js/sweet-alert.min.js"></script>
	</body>
</html>