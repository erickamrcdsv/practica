function validar(){
	var nombre, correo, comentario;
	nombre = document.getElementById("nombre").value;
	correo = document.getElementById("correo").value;
	comentario = document.getElementById("comentario").value;
	
	if(nombre == "" || correo == "" || comentario == ""){
		alert("Todos los campos son obligatorios");
		return false;
	}
	else if(nombre.length > 50){
		alert("El nombre es muy largo");
		return false;
	}
	else if(correo.length > 50){
		alert("El correo es muy largo");
		return false;
	}
	else if(comentario.length > 100){
		alert("El comentario es muy largo");
		return false;
	}
}