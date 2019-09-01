var t = setInterval(leer, 2000);
function leer () {
//Esta funcion va a leer todo lo que este almacenado en la base de datos y lo coloca en una tabla
	var tabla = document.getElementById('mostrar');
//vaciamos la tabla
	while(tabla.rows.length>0) tabla.deleteRow(0);
	
// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo leer del servidor. 
	xmlhttp.onreadystatechange = function() {

		
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
// Se supone que recibo un array de objetos donde cada item tiene tres campos. 
			for (var i = 0; i < myObj.length; i++) {
				registro = tabla.insertRow();
				

				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].id_pedido;
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].orden;
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].estado;
			
			}
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.send( );
}
