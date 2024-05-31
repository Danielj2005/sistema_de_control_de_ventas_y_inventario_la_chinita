<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INICIO</title>
	<link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vista/css/login.css">
	<link rel="stylesheet" type="text/css" href="vista/css/sweet-alert.css">

</head>
<body style="color:white;">

	<div class="container">
		<div class="row justify-content-center">

			<div class="carousel slide z-depth-5" data-bs-ride="carousel" id="myCarousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="vista/img/Designer(10).jpeg"  width="100%" height="510px" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="vista/img/Designer(11).jpeg"  width="100%" height="510px" aria-hidden="true" focusable="false">
					</div>
					<div class="carousel-item">
						<img src="vista/img/Designer(12).jpeg" width="100%" height="510px" aria-hidden="true" focusable="false">
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
			<div class="login">
				<form method="post" action="controlador/login.php" class="SendFormAjax" data-type-form="load">
					<div class="avatar text-center">
						<img src="vista/img/logo.png">
						<h2>INICIO DE SESIÓN</h2>
					</div>
					<div class="md-form mt-5">
						<label>CORREO ELECTRÓNICO</label>
						<input type="text" class="form-control" id="correo" name="correo" placeholder="CORREO ELECTRÓNICO">
						
					</div>
					<br>
					<div class="boton md-form">
						<label>CONTRASEÑA</label>
						<input type="password" class="passw form-control" id="pswd" name="contraseña" placeholder="CONTRASEÑA">
					</div>
					<button type="submit" class="btn btn-primary btn-md w-75 mt-4 mx-4">INICIAR SECCIÓN</button>
					<br>
					<a href="#">¿HAS OLVIDADO TU CONTRASEÑA?</a>
				</form>
				<div class="msjFormSend"></div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript" src="vista/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
	<script src="vista/js/hiddeInput.js"></script>
	<script src="vista/js/SendForm.js"></script>
	<script src="vista/js/sweet-alert.min.js"></script>
</html>