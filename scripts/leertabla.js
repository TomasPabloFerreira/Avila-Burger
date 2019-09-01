var t = setInterval(leer,2000);

function leeri () {
	var actual;
	leer();
	

}


function leer () {
//Esta funcion va a leer todo lo que este almacenado en la base de datos y lo coloca en una tabla
	var tabla = document.getElementById('mostrar');
//vaciamos la tabla
	
	
// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo leer del servidor. 
	xmlhttp.onreadystatechange = function() {
			
		
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			if (actual !== myObj)
			{		while(tabla.rows.length>0) tabla.deleteRow(0);
					for (var i = 0; i < myObj.length; i++) {
					registro = tabla.insertRow();
					
					
					var estado = myObj[i].estado;
					if(estado == 1)
					{
						registro.classList.add("table-success");
						var textnode = document.createTextNode("Listo");
						var lin = document.createElement("i");
						lin.classList.add("fas");
						lin.classList.add("fa-check-circle");
						lin.classList.add("mr-2");
					}
					if(estado == 2)
					{
						registro.classList.add("table-info");
						var textnode = document.createTextNode("Preparando");
						var lin = document.createElement("i");
						lin.classList.add("fas");
						lin.classList.add("fa-clock");
						lin.classList.add("mr-2");
					}
					if(estado == 3)
					{
						registro.classList.add("table-secondary");
						var textnode = document.createTextNode("En cola");
						var lin = document.createElement("i");
						lin.classList.add("fas");
						lin.classList.add("fa-pause-circle");
						lin.classList.add("mr-2");
					}
					
				
					var cell1 = document.createElement("th");
					cell1.scope= "row";
					cell1.innerHTML = myObj[i].id;
					registro.appendChild(cell1);
					
					var cell2 = document.createElement("th");
					cell2.scope= "row";
					cell2.innerHTML = myObj[i].orden;
					registro.appendChild(cell2);
					
					var cell3 = document.createElement("th");
					
					
					cell3.appendChild(lin);
					cell3.appendChild(textnode);
					registro.appendChild(cell3);
					
				}
				var actual = JSON.parse(this.responseText);
			}

			
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.send( );
}
