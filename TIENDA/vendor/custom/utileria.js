/********************************/
/*			ALEXANDER RDZ		*/
/*		FUNCIONES NECESARIAS	*/
/********************************/

//Funcion para el mostrar u ocultar el menu
function myFunction() {
	var x = document.getElementById("sidebar");
	var y = document.getElementById("main-content");
	if (x.className === "nav-collapse") {
		x.className += " hide-left-bar";
		y.className += " merge-left";
	} else {
		x.className = "nav-collapse";
		y.className = "ng-scope";
	}
}

//MENSAJES DE NOTIFICACION

function fnError(mensaje) {
	"use strict";
	var paramsError = {
		heading: 'Error',
		life: 5000,
		sticky: false,
		theme: 'error',
		icon: 'fa-times'
	};
	$.notific8('destroy');
	$.notific8(mensaje, paramsError);
}

function fnCorrecto(mensaje) {
	"use strict";
	var paramsCorrecto = {
		heading: '¡Exito!',
		life: 5000,
		sticky: false,
		theme: 'success',
		icon: 'fa-check'
	};
	$.notific8('destroy');
	$.notific8(mensaje, paramsCorrecto);
}

function fnAdvertencia(mensaje) {
	"use strict";
	var paramsCorrecto = {
		heading: 'Verificar',
		life: 5000,
		sticky: false,
		theme: 'alert',
		icon: 'fa-exclamation-triangle'
	};
	$.notific8('destroy');
	$.notific8(mensaje, paramsCorrecto);
}

function imagenScroll(nameDiv, urlImg, heigthImg){
	"use strict";
	$("#"+nameDiv+">div").cherryFixedParallax({
			invert: false,
			sourceUrl: urlImg,
			imgHeight: heigthImg+'px'
	});
}

