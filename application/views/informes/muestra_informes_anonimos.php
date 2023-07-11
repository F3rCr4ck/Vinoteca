<div class="content-wrapper">
 <section class="content"> 

<div class="container">
	<div class="well">
	<br>       
     <?php if (!$informes) { ?>

	<div class="container">
		<div class="well">
			<h1>No Hay consultas.</h1>
            <hr>
		</div>
		
	</div>

<?php } else { ?>
         
<div class="container">
	<div class="well">
		<h1><b>Consultas Realizadas por no Clientes.</b></h1>
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
				<th>Email</th>
				<th>Mensajes</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($informes->result() as $row){ ?>
				<?php if ($row->id_usuario == '0') { ?>
			<tr>
				
				<td><?php echo $row->id_informe;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->apellido;  ?></td>
				<td><?php echo $row->fecha;  ?></td>
				<td><?php echo $row->email;  ?></td>
                <td><?php echo $row->descripcion;  ?></td>
                
			</tr>
		<?php } ?>
			<?php } ?>
		</tbody>
	</table>	            
	<?php } ?>
</div>

            </div>
        </div>
    
</section>
</div>