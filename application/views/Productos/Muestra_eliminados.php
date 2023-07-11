<div class="content-wrapper">

<section class="content-header">
<?php if (!$productos) { ?>

	<div class="container">
		<div class="well">
			<h1 class="text-center" style="font-family:mifuente;font-size: 70px;">No hay Eliminados</h1>
		</div>	
	</div>

<?php } else { ?>

	<div class="container">
		<div class="well">
			<h1 class="text-center" style="font-family:mifuente;font-size: 60px;">Todos los Eliminados</h1>
		</div>	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre del Producto</th>
					<th>Categoria</th>
					<th>Precio Venta</th>
					<th>Stock</th>
					<th>Eliminado</th>
					<th>Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos->result() as $row){ ?>
				<tr>
					<td><?php echo $row->id_producto;  ?></td>
					<td><?php echo $row->nombre_producto;  ?></td>
					<td><?php echo $row->id_categoria;  ?></td>
					<td><?php echo $row->precio_venta;  ?></td>
					<td><?php echo $row->stock;  ?></td>
					<td><?php echo $row->eliminado;  ?></td>
					<td><a class="btn btn-app bg-info" href="<?php echo base_url("Modificar_producto/$row->id_producto");?>"><i class="fas fa-edit"></i>Modificar</a><a class="btn btn-app bg-success" href="<?php echo base_url("ActivarProducto/$row->id_producto");?>"><i class="fas fa-user-plus"></i>Activar</a>

					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>
</section>
</div>