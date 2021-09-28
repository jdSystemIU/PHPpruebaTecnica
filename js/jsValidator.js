$(function(){
	var $registerName = $("#formulario");

	$.validator.addMethod("noSpace", function(value, element){
		return value == '' || value.trim().length != 0
	}, "Solo contiene espacio en blanco");

	if($registerName.length){
		$registerName.validate({
			rules:{
				nombre:{
					required: true,
					noSpace: true
				},
				email:{
					required: true,
					email: true
				},
				area_id:{
					required: true
				},
				descripcion:{
					required: true
				}

			},
			messages:{
				nombre:{
					required: '	    Nombre es requerido para guardar'
				},
				email:{
					required: '	    Correo electronico es requerido para guardar',
					email: 'Porfavor introduce un email valido'
				},
				area_id:{
					required: '	    El area es un campo requerido'
				},
				descripcion:{
					required: '	    La descripcion es un campo requerido'
				}
			}
		})
	}
})