<?php include 'header.php'; ?>

<table class="table table-bordered" onload="leeri();">

	<thead class="thead-dark">
		<tr>
			<th scope="col" style="width:20%">Pedido N°</th>
			<th scope="col" style="width:62%">Orden</th>
			<th scope="col" style="width:18%">Estado</th>
		</tr>
	</thead>

	<tbody id="mostrar">
		<tr class="table-success">
			<th scope="row">12</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-check-circle mr-2"></i>Listo</th>
		</tr>
		<tr class="table-success">
			<th scope="row">13</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-check-circle mr-2"></i>Listo</th>
		</tr>
		<tr class="table-info">
			<th scope="row">14</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-clock mr-2"></i>Preparando</th>
		</tr>
		<tr class="table-info">
			<th scope="row">16</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-clock mr-2"></i>Preparando</th>
		</tr>
		<tr class="table-secondary">
			<th scope="row">15</th>
			<th>Papas fritas + Hamburguesa completa sin aderezo</th>
			<th><i class="fas fa-pause-circle mr-2"></i>En cola</th>
		</tr>
		<tr class="table-secondary">
			<th scope="row">17</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-pause-circle mr-2"></i>En cola</th>
		</tr>
		<tr class="table-secondary">
			<th scope="row">16</th>
			<th>Papas fritas</th>
			<th><i class="fas fa-pause-circle mr-2"></i>En cola</th>
		</tr>

	</tbody>
</table>
</div>

</div>
<script type="text/javascript" src="../scripts/leertabla.js"></script>
</body>

</html>
