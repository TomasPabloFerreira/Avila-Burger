<?php

require ('../config/dbConnection.php');

if(isset($_POST['agregar'])){
	addForm();
}

if(isset($_POST['insert'])){
	$id = $_POST['id_pedido'];
	$orden = $_POST['orden'];
	insertData($id,$orden,$mysqli);
}

if(isset($_POST['editar'])){
	$id = $_POST['id_pedido'];
	$orden = $_POST['orden'];
	$estado = $_POST['estado'];
	$clave = $_POST['clave'];
	editForm($id,$orden,$estado,$mysqli,$clave);
}

if(isset($_POST['update'])){
	$id = $_POST['id_pedido'];
	$orden = $_POST['orden'];
	$estado = $_POST['estado'];
	$clave = $_POST['clave'];
	updateData($id,$orden,$estado,$mysqli,$clave);
}

if(isset($_POST['borrar'])){
	$clave = $_POST['clave'];
	delete ($clave,$mysqli);
}

if(isset($_POST['cambiar-estado'])){
	$estado = $_POST['estado'] - 1;
	$clave = $_POST['clave'];

	if($estado > 0) {
		$orden = $_POST['orden'];
		$id = $_POST['id_pedido'];
		updateData($id,$orden,$estado,$mysqli,$clave);
	} else {
		delete($clave,$mysqli);
	}
}

// Shows the add form
function addForm () {

	include "header.php";

	?>
	<div class="container">
		<div class="jumbotron">
			<h2> Nuevo pedido </h2>
			<hr>
			<form action="" method="post">

				<div class="form-group">
					<label for=""> Id del pedido </label>
					<input type="number" name="id_pedido" class="form-control" placeholder="Ingrese el id del pedido" required>
				</div>
				<div class="form-group pb-1">
					<label for=""> Orden </label>
					<input type="text" name="orden" class="form-control" placeholder="Ingrese la orden" required>
				</div>					

				<button type="submit" name="insert" class="btn btn-primary"> Agregar Pedido </button>
				<a href="private_grid.php" class="btn btn-danger"> Atrás </a>

			</form>
		</div>
	</div>    

</div>
</div>
</body>
</html>

<?php

}

// Inserts data into the db
function insertData ($id,$orden,$mysqli) {

	$sql = "INSERT INTO pedidos (id,orden,estado) VALUES ('$id','$orden',3)";

	$query_run = $mysqli->query($sql);

	if($query_run)
	{
		header("location:private_grid.php");
	}
	else
	{
		echo '<script> alert("Data Not Saved"); </script>';
	}

}

// Shows the edit form
function editForm ($id,$orden,$estado,$mysqli,$clave) {

	include "header.php";

	?>
	<div class="container">
		<div class="jumbotron">
			<h2> Editar pedido </h2>
			<hr>
			<form action="" method="post">

				<input type="hidden" name="clave" value="<?php echo $clave ?>">

				<div class="form-group">
					<label for="id_pedido">Id del pedido</label>
					<input type="number" name="id_pedido" class="form-control" value="<?php echo $id ?>" >
				</div>

				<div class="form-group">
					<label for="orden"> Orden </label>
					<input type="text" name="orden" id="orden" class="form-control" 
					value="<?php echo $orden ?>" placeholder="Edite la orden" required>
				</div> 

				<div class="form-group pb-1">
					<label for="estado">Estado</label>
					<?php
					if ($estado == 1) {
						?>
						<select class="form-control" name="estado">
							<option value="1">Listo</option>
							<option value="2">En preparación</option>
							<option value="3">En cola</option>
						</select>
						<?php 
					} else {

						if($estado == 2){
							?>
							<select class="form-control" name="estado">
								<option value="2">En preparación</option>
								<option value="1">Listo</option>
								<option value="3">En cola</option>
							</select>
							<?php
						} else {


							?>
							<select class="form-control" name="estado">
								<option value="3">En cola</option>
								<option value="1">Listo</option>
								<option value="2">En preparación</option>
							</select>
							<?php
						}}
						?>

					</div>

					<button type="submit" name="update" class="btn btn-primary"> Editar Pedido </button>
					<a href="private_grid.php" class="btn btn-danger"> Atrás </a>

				</form>
			</div>
		</div>    

	</div>
</div>
</body>
</html>

<?php

}

// Updates data in the db
function updateData ($id,$orden,$estado,$mysqli,$clave) {

	$sql = "UPDATE pedidos SET id=$id, orden='$orden', estado='$estado' WHERE clave=$clave";

	$query_run = $mysqli->query($sql);

	if($query_run)
	{
		header("location: private_grid.php");
	}
	else
	{
		echo '<script> alert("Data Not Updated"); </script>';
	}
}

// Deletes information from the db
function delete ($clave,$mysqli) {

	$sql = "DELETE FROM pedidos WHERE clave='$clave' ";
	$query_run = $mysqli->query($sql);

	if($query_run)
	{
		header("location: private_grid.php");
	}
	else
	{
		echo '<script> alert("Data Not Deleted"); </script>';
	}
}

?>
