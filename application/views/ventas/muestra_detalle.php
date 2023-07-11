<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<div class="container">
	<div class="well">      
     <?php if (!$ventas_detalle) { ?>

	<div class="container">
		<div class="well">
			<h1>No se realizaron Ventas</h1>
            <hr>
		</div>
		
	</div>

	<?php } else { ?>                  
	<div class="container">
		<div class="well">
			<h1 class="text-center"><b>Detalle de Ventas</b></h1>
        	<hr>
		</div>	
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>id producto </th>
					<th>Nombre producto</th>
              		<th>Descripción</th>
					<th>Cantidad</th>
					<th>Precio Unitario</th>
					<th>Sub Total</th>
				
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas_detalle->result() as $row){ ?>

				<tr>
                	<td><?php echo $row->id_venta;  ?></td>
                	<td><?php echo $row->nombre_producto; ?></td>
					<td><?php echo $row->descripcion;  ?></td>
					<td><?php echo $row->cantidad;  ?></td>
					<td><?php echo $row->precio;  ?></td>
                	<td><?php echo $row->precio * $row->cantidad; ?></td>
				</tr>
           
            
				<?php } ?>
			</tbody>
		</table>
			<?php } ?>
	</div>	            
	 	<br>
	</div>
</div>
</section>
</div>