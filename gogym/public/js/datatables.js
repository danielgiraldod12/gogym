function editconf()
    {
    var mensaje;
    var opcion = confirm("¿Estas seguro que deseas editar este usuario?");
    if (opcion == true) {
        mensaje = " ";
	} else {
        mensaje = " ";
        return false;
	}
	document.getElementById("parrafo").innerHTML = mensaje;
}

function deleteconf()
    {
    var mensaje;
    var opcion = confirm("¿Estas seguro que deseas eliminar este usuario?");
    if (opcion == true) {
        mensaje = " ";
	} else {
        mensaje = " ";
        return false;
	}
	document.getElementById("parrafo").innerHTML = mensaje;
}

