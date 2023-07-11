
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

<div class="container">
	<div class="well">
	<br>       
     <?php if (!$usuarios) { ?>

	<div class="container">
		<div class="well">
			<h1>No hay usuarios registrados</h1>
            <hr>
		</div>
		
	</div>

<?php } else { ?>           
<div class="container">
	<div class="well">
		<h1 class="text-center"style="font-family:mifuente;font-size: 60px;"><b>Usuarios registrados.</b></h1>
	</div>	
	<br>
	<table  class="table table-bordered" >
<!--        table table-bordered-->
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
                <th>Apellido</th>
				<th>Email</th>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Perfil ID</th>
				<th>Baja</th>
				<th class="text-center">Accion</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id_usuario; ?></td>
				<td><?php echo $row->nombre;  ?></td>
                <td><?php echo $row->apellido;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php echo $row->usuario;  ?></td>
				<td><?php echo $row->pass;  ?></td>
				<td><?php echo $row->perfil_id;  ?></td>
				<td><?php echo $row->baja;  ?></td>
				<td>                
               <a class="btn btn-app bg-info" href="<?php echo base_url("modificar_usuario/$row->id_usuario");?>"><i class="fas fa-edit"></i>Modificar</a><a class="btn btn-app bg-danger" href="<?php echo base_url("eliminar_usuario/$row->id_usuario");?>"><i class="fas fa-trash-alt"></i>Eliminar</a></td>
                
				
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

