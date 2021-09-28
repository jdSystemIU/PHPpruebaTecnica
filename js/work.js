 const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}


const validarFormulario = (e) =>{
	switch(e.target.name){
		case "nombre":
			if(expresiones.nombre.test(e.target.value)){

				document.getElementById('groupNombre').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('groupNombre').classList.add('formulario__grupo-correcto');
			}else{
				document.getElementById('groupNombre').classList.add('formulario__grupo-incorrecto');

			console.log('errornombre');
			}
		break;
		case "email":
			console.log('funciona');
		break;
		
	}
}

inputs.forEach((input)=>{
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
})

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
});