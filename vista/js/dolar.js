const API_URL = 'https://dolartoday.com/';

const xhr = new XMLHttpRequest();

function onRequestHandler() {
	if (this.readyState = 4 && this.status = 200 ) {

		//0 no se a llamado al metodo open
		//1 opend, se ha llamado al metodo open
		//2 HEADERS_Resived, se esta lamando al metodo send
		//3 loading, esta cargando, es decir, resiviendo respuesta
		//4 done, se ha completado la open

		console.log(this.response);
	}
}

xhr.addEventListener('load',onRequestHandler);
xhr.open('GET', '${API_URL}/users');
xhr.send();