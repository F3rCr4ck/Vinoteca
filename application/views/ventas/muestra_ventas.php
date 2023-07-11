﻿<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<div class="container">
	<div class="well">
	<br>       
     <?php if (!$ventas_cabecera) { ?>

	<div class="container">
		<div class="well">
			<h1>No se realizaron Ventas</h1>
            <hr>
		</div>
		
	</div>

<?php } else { ?>           
<div class="container">
	<div class="well">
		<h1 class="text-center"><b>Ventas Realizadas</b></h1>
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
				<td><?php echo $row->nombre;  ?></td>
                <td><?php echo $row->apellido;  ?></td>
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
<?php $this->load->view('template/pag_links'); ?>
</section>    
</div>
