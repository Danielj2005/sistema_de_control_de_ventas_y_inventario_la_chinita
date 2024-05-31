const formulario = $('#formulario');
const inputs = document.querySelectorAll('#formulario input');
const expresiones = {
	/* usuario */
	usuario: /^[a-zA-Z0-9\_\-]{7,16}$/, // Letras, numeros, guion y guion_bajo
	password: /^.{7,16}$/, // 4 a 12 digitos.
	respuesta_seguridad: /^[a-zA-ZÀ-ÿ\s]{4,20}$/, // 4 a 12 digitos.

	/* datos personales */
	cedula: /^\d{7,8}$/, // 7 - 8 numeros.
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,30}$/, // Letras y espacios, pueden llevar acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{4,30}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{11}$/, // 11 numeros.

	/* datos de una carrera */
	nombre_carrera:/^[a-zA-ZÀ-ÿ\s]{8,60}$/, // Letras y espacios, pueden llevar acentos.

	/* datos de un libro */
	cota: /^[a-zA-Z0-9]{5,6}$/, // 4 numeros.
	titulo: /^[a-zA-Z0-9,À-ÿ\-\s]{4,100}$/, // Letras y espacios, pueden llevar acentos.
	autor:/^[a-zA-ZÀ-ÿ.\-\s]{3,80}$/, // Letras y espacios, pueden llevar acentos.
	editorial:/^[a-zA-ZÀ-ÿ\-\s]{4,70}$/, // Letras y espacios, pueden llevar acentos.
	edicion:/^[a-zA-ZÀ-ÿ\s]{8,25}$/, // Letras y espacios, pueden llevar acentos.
	pais:/^[a-zA-ZÀ-ÿ\-\s]{3,25}$/, // Letras y espacios, pueden llevar acentos.
	año: /^\d{4}$/, // 4 numeros.
	paginas: /^\d{2,5}$/, // de 2 a 5 numeros.
	stock: /^\d{1,4}$/, // de 1 a 4 numeros.
	descripcion:/^[a-zA-ZÀ-ÿ\s]{8,80}$/




}
const campos = {
	/* datos personales */
	cedula: false,nombre: false,correo: false,telefono: false,
	/* datos de carrera */
	cod_carrera: false,	nombre_carrera: false,
	/* datos de usuario */
	usuario: false,	password: false,respuesta_seguridad: false,
	/* datos de un libro */
	cota: false, titulo: false, autor: false, editorial: false, edicion: false,
	pais: false, año: false, paginas: false, stock: false, descripcion: false
}
const validarFormulario = (e) => {
	switch (e.target.name) {
		/* datos personales */
		case "cedula": validarCampo(expresiones.cedula, e.target, 'cedula');	break;
		case "nombre": validarCampo(expresiones.nombre, e.target, 'nombre');	break;
		case "apellido": validarCampo(expresiones.apellido, e.target, 'apellido');	break;
		case "correo": validarCampo(expresiones.correo, e.target, 'correo');	break;
		case "telefono": validarCampo(expresiones.telefono, e.target, 'telefono');	break;
		case "descripcion":	validarCampo(expresiones.descripcion, e.target, 'descripcion');	break;

		/* datos de usuario */
		case "usuario":	validarCampo(expresiones.usuario, e.target, 'usuario');	break;
		case "password":validarCampo(expresiones.password, e.target, 'password');
			validarPassword2(); break;
		case "password2": validarPassword2(); break;
		case "password_actual":	validarCampo(expresiones.password, e.target, 'password_actual'); break;
		case "respuesta_seguridad":
			validarCampo(expresiones.respuesta_seguridad, e.target, 'respuesta_seguridad');
			validar_respuestas(); break;
		case "repetir_respuesta": validar_respuestas(); break;

		/* datos de carrera */
		case "nombre_carrera":validarCampo(expresiones.nombre_carrera, e.target, 'nombre_carrera');	break;

		/* datos de un libro */
		case "cota": validarCampo(expresiones.cota, e.target, 'cota');	break;
		case "titulo": validarCampo(expresiones.titulo, e.target, 'titulo'); break;
		case "autor": validarCampo(expresiones.autor, e.target, 'autor'); break;
		case "editorial": validarCampo(expresiones.editorial, e.target, 'editorial'); break;
		case "edicion": validarCampo(expresiones.edicion, e.target, 'edicion');	break;
		case "pais": validarCampo(expresiones.pais, e.target, 'pais'); break;
		case "año":	validarCampo(expresiones.año, e.target, 'año'); break;
		case "paginas":	validarCampo(expresiones.paginas, e.target, 'paginas'); break;
		case "existencias":	validarCampo(expresiones.stock, e.target, 'existencias'); break;
		
	}
}
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}
const validar_respuestas = () => {
	const input_respuesta_seguridad = document.getElementById('respuesta_seguridad');
	const input_repetir_respuesta = document.getElementById('repetir_respuesta');

	if(input_respuesta_seguridad.value !== input_repetir_respuesta.value){
		document.getElementById(`grupo__repetir_respuesta`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__repetir_respuesta`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__repetir_respuesta .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['respuesta_seguridad'] = false;
	} else {
		document.getElementById(`grupo__repetir_respuesta`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__repetir_respuesta`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__repetir_respuesta .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['respuesta_seguridad'] = true;
	}
}
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});