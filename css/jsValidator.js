$(function(){
	var $registerName = $("#formulario");

	if($registerName.length){
		$registerName.validate({
			rules:{
				nombre:{
					required: true
				}
			},
			messages:{
				nombre:{
					required: 'Nombre esta vacio'
				}
			}
		})
	}
})