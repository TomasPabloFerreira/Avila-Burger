<?php

require ('../config/dbConnection.php');


if(isset($_POST['agregar'])){
	addForm();
}

if(isset($_POST['insert'])){
	$orden = $_POST['orden'];
	insertData($orden,$mysqli);
}

if(isset($_POST['editar'])){
	$id = $_POST['id_pedido'];
	$orden = $_POST['orden'];
	$estado = $_POST['estado'];
	editForm($id,$orden,$estado,$mysqli);
}

if(isset($_POST['update'])){
	$id = $_POST['id_pedido'];
	$orden = $_POST['orden'];
	$estado = $_POST['estado'];
	updateData($id,$orden,$estado,$mysqli);
}

if(isset($_POST['borrar'])){
	$id = $_POST['id_pedido'];
	delete ($id,$mysqli);
}

if(isset($_POST['cambiar-estado'])){
	$id = $_POST['id_pedido'];
	$estado = $_POST['estado'] - 1;

	if($estado > 0) {
		$orden = $_POST['orden'];
		updateData($id,$orden,$estado,$mysqli);
	} else {
		delete($id,$mysqli);
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
function insertData ($orden,$mysqli) {

	$sql = "INSERT INTO pedidos (orden,estado) VALUES ('$orden',3)";

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
function editForm ($id,$orden,$estado,$mysqli) {

	include "header.php";

	?>
	<div class="container">
		<div class="jumbotron">
			<h2> Nuevo pedido </h2>
			<hr>
			<form action="" method="post">

				<input type="hidden" name="id_pedido" value="<?php echo $id ?>" >
				<input type="hidden" name="estado" value="<?php echo $estado ?>">

				<div class="form-group">
					<label for="orden"> Orden </label>
					<input type="text" name="orden" id="orden" class="form-control" 
					value="<?php echo $orden ?>" placeholder="Edite la orden" required>
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
function updateData ($id,$orden,$estado,$mysqli) {

    $sql = "UPDATE pedidos SET orden='$orden', estado='$estado' WHERE id='$id'  ";

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
function delete ($id,$mysqli) {

	$sql = "DELETE FROM pedidos WHERE id='$id' ";
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
