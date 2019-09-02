<?php
include_once 'header.php';
include_once '../config/dbConnection.php';

$sql = "SELECT * FROM pedidos ORDER BY estado ASC,id ASC";
$query_run = $mysqli->query($sql);

?>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="width:15%">Pedido N°</th>
            <th scope="col" style="width:52%">Orden</th>
            <th scope="col" style="width:18%">Estado</th>
            <th scope="col" style="width:15%">
                <form action="private_form.php" method="post">
                    <button type="submit" name="agregar" class="btn btn-success ml-4">
                    <i class="fas fa-plus-square mr-2"></i>Añadir</button>
                </form>
            </th>
        </tr>
    </thead>

    <tbody>

 <?php

 if ($query_run) {

    while($row = mysqli_fetch_array($query_run)){
        if ( $row['estado'] == 1) {
 ?>

        <tr class="table-success">
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['orden']; ?></td>
            <td>Listo</td>

            <td>
                <form action="private_form.php" method="post">

                    <input type="hidden" name="clave" value="<?php echo $row['clave']; ?>" >
                    <input type="hidden" name="id_pedido" value="<?php echo $row['id']; ?>" >
                    <input type="hidden" name="orden" value="<?php echo $row['orden']; ?>">
                    <input type="hidden" name="estado" value="1">

                    <button class="btn btn-primary" type="submit" name="borrar">
                        <i class="fas fa-check-circle"></i></button>
                    <button class="btn btn-warning" type="submit" name="editar">
                        <i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger" type="submit" name="borrar">
                        <i class="far fa-trash-alt"></i></i></button>

                </form>
            </td>
        </tr>
        <?php
        }
        if( $row['estado'] == 2 ){
        ?>
        <tr class="table-info">
        <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['orden']; ?></td>
            <td>En Preparación</td>

            <td>
                <form action="private_form.php" method="post">

                    <input type="hidden" name="clave" value="<?php echo $row['clave']; ?>" >
                    <input type="hidden" name="id_pedido" value="<?php echo $row['id']; ?>" >
                    <input type="hidden" name="orden" value="<?php echo $row['orden']; ?>">
                    <input type="hidden" name="estado" value="2">

                    <button class="btn btn-primary" type="submit" name="cambiar-estado">
                        <i class="fas fa-flag"></i></button>
                    <button class="btn btn-warning" type="submit" name="editar">
                        <i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger" type="submit" name="borrar">
                        <i class="far fa-trash-alt"></i></button>

                </form>
            </td>
        </tr>

        <?php
        }
        if($row['estado'] == 3) {
        ?>

        <tr class="table-secondary">
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['orden']; ?></td>
            <td>En Cola</td>
            <td>
                <form action="private_form.php" method="post">

                    <input type="hidden" name="clave" value="<?php echo $row['clave']; ?>" >
                    <input type="hidden" name="id_pedido" value="<?php echo $row['id']; ?>" >
                    <input type="hidden" name="orden" value="<?php echo $row['orden']; ?>">
                    <input type="hidden" name="estado" value="3">

                    <button class="btn btn-primary" type="submit" name="cambiar-estado">
                        <i class="fas fa-forward"></i></button>
                    <button class="btn btn-warning" type="submit" name="editar">
                        <i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger" type="submit" name="borrar">
                        <i class="far fa-trash-alt"></i></button>

                </form>
            </td>
        </tr>

<?php
} // endif
} // endwhile
?>

    </tbody>
</table>

<?php
} else echo "Error al ejecutar la consulta"; // endif;
?>


</div>

</div>

</body>

</html>
