<?php
include_once 'header.php';
include_once '../config/dbConnection.php';

$sql = "SELECT * FROM pedidos ORDER BY estado ASC,id ASC LIMIT 7";
$query_run = $mysqli->query($sql);

?>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="width:20%">Pedido N°</th>
            <th scope="col" style="width:43%">Orden</th>
            <th scope="col" style="width:25%">Estado</th>
            <th scope="col" style="width:12%">
                <form action="private_form.html" method="post">
                    <button type="submit" name="agregar" class="btn btn-success">
                    <i class="fas fa-plus-square mr-1"></i>Añadir</button>
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

        <!-- Mostrar base de datos ordenada por estado del pedido,
        distintos rows dependiendo de este-->
        <tr class="table-success">
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['orden']; ?></td>
            <td>Listo</td>

            <td>
                <form action="private_form.html" method="post">
                    <input type="hidden" value="1" name="id_pedido">
                    <button class="btn btn-primary" type="submit" name="borrar"><i
                            class="fas fa-check-circle"></i></button>
                    <input type="hidden">
                    <!--Send by post update info-->
                    <button class="btn btn-warning" type="submit" name="editar"><i
                            class="fas fa-pencil-alt"></i></button>
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
                <form action="private_form.html" method="post">
                    <input type="hidden" value="3" name="id_pedido">
                    <button class="btn btn-primary" type="submit" name="actualizar"><i class="fas fa-flag"></i></button>
                    <input type="hidden">
                    <!--Send by post update info-->
                    <button class="btn btn-warning" type="submit" name="editar"><i
                            class="fas fa-pencil-alt"></i></button>
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
                <form action="private_form.html" method="post">
                    <input type="hidden" value="4" name="id_pedido">
                    <button class="btn btn-primary" type="submit" name="actualizar"><i
                            class="fas fa-forward"></i></button>
                    <input type="hidden">
                    <!--Send by post update info-->
                    <button class="btn btn-warning" type="submit" name="editar"><i
                            class="fas fa-pencil-alt"></i></button>
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
