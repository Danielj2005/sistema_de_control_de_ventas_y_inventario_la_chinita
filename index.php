<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>INICIO</title>
		<link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vista/css/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="vista/css/login.css">
		<link rel="stylesheet" type="text/css" href="vista/css/sweet-alert.css">
		<style>
			
			
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;    
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
			}
			

			div i{
				top: 1.5em;
				z-index: 2;
				right: 0;
				bottom: 0;
				width: 2rem;
				height: 1.5rem;
				transform: translate(-20%,-60%);
				transform-origin: center;
			}
			.carousel-item img {

				height: 720px !important;
				width: 100%; 
				max-width: 100%;
				background: cover !important;
				background-repeat: no-repeat !important;
				background-size: cover !important;
				background-attachment: fixed !important;

			}
			/* Make images responsive on mobile devices */

			@media only screen and (max-width: 768px) {

				.carousel-item img {

					height: 1080px !important;
					width: 150%; 
					max-width: 150%;
					background: cover !important;
					background-repeat: no-repeat !important;
					background-size: cover !important;
					background-attachment: fixed !important;
			
				}
				div i{
					top: 1.8em;
				}

			}
		</style>
	</head>
<body>
	<div class="row justify-content-center ">
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


		<div class="col-12 position-absolute row justify-content-center">
			<div class="col-10 col-sm-6 col-md-6 bg-black bg-opacity-75 m-5 p-3 pt-4 rounded-4">
				<form method="post" action="controlador/login.php" class="SendFormAjax" data-type-form="load">
					<div class="avatar text-center mb-5">
						<img src="vista/img/logo.png">
						<h2>INICIO DE SESIÓN</h2>
					</div>
					<div class=" mb-3">
						<label>CORREO ELECTRÓNICO</label>
						<input type="text" class="form-control" id="correo" name="correo" placeholder="CORREO ELECTRÓNICO">
					</div>
					<div class="boton mb-3 position-relative">
						<label>CONTRASEÑA</label>
						<input type="password" class="input__field passw form-control" id="pswd" name="contraseña" placeholder="CONTRASEÑA">
						<i class="bi bi-eye input__icon text-black position-absolute h3 m-0"></i>
					</div>
					<div class="row mb-4">
						<div class="col-12 mb-3 text-center">
							<button type="submit" class="btn btn-primary btn-md w-75 mt-4 mx-4">INICIAR SESIÓN</button>
						</div>
						<div class="col-12 mb-3 text-center">
							<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#recuperar_contraseña">
								¿HAS OLVIDADO TU CONTRASEÑA?
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="msjFormSend"></div>
	<!-- modal recuperar contraseña -->
	<div class="modal fade position-absolute" id="recuperar_contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-black bg-opacity-75">
				<form method="post" action="./vista/recuperar_contraseña.php" >
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body ">
						<div class="">
							<label class="mb-3">Ingresa tu correo</label>
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