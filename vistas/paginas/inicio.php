<?php



$usuarios = ControladorCustomer::ctrSeleccionarRegistros(null, null);


?>



<table class="table table-striped">
	<thead>
		<tr>
			<th>CustomerID</th>
			<th>CustomerName</th>
			<th>ContactName</th>
			<th>Address</th>
			<th>City</th>
			<th>PostalCode</th>
			<th>Country</th>
		</tr>
	</thead>

	<tbody>

	<?php foreach ($usuarios as $key => $value): ?>

		<tr>
			<td><?php echo $value["customerID"]; ?></td>
			<td><?php echo $value["customerName"]; ?></td>
			<td><?php echo $value["contactName"]; ?></td>
			<td><?php echo $value["address"]; ?></td>
			<td><?php echo $value["city"]; ?></td>
			<td><?php echo $value["postalCode"]; ?></td>
			<td><?php echo $value["country"]; ?></td>



			<td>

			<div class="btn-group">

				<div class="px-1">
				
				<a href="index.php?pagina=editar&customerID=<?php echo $value["customerID"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

				</div>

				<form method="post">

					<input type="hidden" value="<?php echo $value["customerID"]; ?>" name="eliminarRegistro">
					
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

					<?php

						$eliminar = new ControladorCustomer();
						$eliminar -> ctrEliminarRegistro();

					?>

				</form>			

			</div>
				

			</td>
		</tr>
		
	<?php endforeach ?>	
	
	</tbody>
</table>