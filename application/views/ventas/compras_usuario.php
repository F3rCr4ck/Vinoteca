﻿<div class="content-wrapper">

<section class="content-header">
<div class="container">
	<?php $session_data = $this->session->userdata('logged_in') ?>
	<?php 
		$apellido = $session_data['apellido']
	?>

	<div class="well">
	<br>       
     <?php if (!$ventas_cabecera) { ?>

	<div class="container">
		<div class="well">
			<h1 class="text-center">No has realizado ninguna compra</h1>
            <hr>
		</div>
		
	</div>

<?php } else { ?>           
<div class="container">
	<div class="well">
		<h1 class="text-center"><b>Compras Realizadas.</b></h1>
	</div>	
	<br>
	<table  class="table table-bordered" >
<!--        table table-bordered-->
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
                <th>Apellido</th>
				<th>Fecha</th>
				<th>Total</th>
				<th> </th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($ventas_cabecera->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id_cabecera;  ?></td>
				<td><?php echo $nombre;  ?></td>
                <td><?php echo $apellido;  ?></td>
				<td><?php echo $row->fecha;  ?></td>
				<td>$<?php echo $row->total_venta;  ?></td>
                
				
				<td>
                     <a href="<?php echo base_url("Muestra_detalle/$row->id_cabecera");?>">Detalle</a>
                </td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<?php } ?>
</div>
            </div>
        </div>
</section>    
</div>
