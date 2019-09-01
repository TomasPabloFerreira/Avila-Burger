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
				var estado = myObj[i].estado;
				switch (estado) {
				  case 1:
					registro.classList.add("table-success");
					var textnode = document.createTextNode("Listo");
					lin.classList.add("fas fa-check-circle mr-2");
					
					break;
				  case 2:
					registro.classList.add("table-info");
					var textnode = document.createTextNode("Preparando");
					lin.classList.add("fas fa-clock mr-2");
					break;
				  case 3:
					registro.classList.add("table-secondary");
					var textnode = document.createTextNode("Preparando");
					lin.classList.add("fas fa-pause-circle mr-2");
					break;
				  default:
					registro.classList.add("table-secondary");
					var textnode = document.createTextNode("Preparando");
					lin.classList.add("fas fa-pause-circle mr-2");
				}
			
				var cell1 = document.createElement("th");
				cell1.scope= "row";
				cell1.innerHTML = myObj[i].id_pedido;
				registro.appendChild(cell1);
				
				var cell2 = document.createElement("th");
				cell2.scope= "row";
				cell2.innerHTML = myObj[i].orden;
				registro.appendChild(cell2);
				
				var cell3 = document.createElement("th");
				var lin = document.createElement("i");
				cell3.appendChild(lin);
				cell3.appendChild(textnode);
				registro.appendChild(cell3);
				
			}
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.send( );
}
