
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

<div class="container-fluid " >	
    <!--CONTENEDOR-->
    <div class="container-fluid">
      <!--PRIMERA FILA-->

        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-1" > 

          </div>

          <!--SEGUNDA COLUMNA-->

          <div class = "col-xl-10">

			<div class="container">
			<div class="col-sm-10 col-md-10">
				<div class="well">
					<h1>Modificar Usuario</h1>			
				</div>	            

	<?php echo form_open_multipart("verifico_modificar_usuario/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?> 

					<div class="row">

	   					<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Nombre:', 'nombre_usuario'); ?>
								
								<?php echo form_input(['name' => 'nombre_usuario', 
																'id' => 'nombre_usuario', 
																'class' => 'form-control',
																'placeholder' => 'Nombre', 
																'autofocus'=>'autofocus',
																'value'=>"$nombre_usuario"]); ?>
								<?php echo form_error('nombre_usuario'); ?>
							</div>
						</div> 
						<div class="col-md-6">
							<div class="form-group">
									<?php echo form_label('Apellido:', 'apellido_usuario'); ?>	
									<?php echo form_input(['name' => 'apellido_usuario', 
													'id' => 'apellido_usuario', 
													'class' => 'form-control',
													'placeholder' => 'Apellido', 
													'value'=>"$apellido_usuario"]); ?>
									<?php echo form_error('apellido_usuario'); ?>
							</div>

						</div>

					</div>
					<div class="row">

					    <div class="col-md-6">
							<div class="form-group">
									<?php echo form_label('Email:', 'email'); ?>	
									<?php echo form_input(['name' => 'email', 
													'id' => 'email', 
													'class' => 'form-control',
													'placeholder' => 'Email', 
													'value'=>"$email"]); ?>
									<?php echo form_error('email'); ?>
							</div>	
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<?php echo form_label('Usuario:', 'usuario'); ?>			
								<?php echo form_input(['name' => 'usuario', 
													   'id' => 'usuario', 
													   'class' => 'form-control',
													   'placeholder' => 'Usuario',
													   'autofocus'=>'autofocus',
													   'value'=>"$usuario"]); ?>
								<?php echo form_error('usuario'); ?>
							</div>
							
						</div>

					</div>
						
					</div>


					<div class="row">
	   					<div class="col-md-5">
							<div class="form-group">
								<?php echo form_label('Contraseña:', 'pass'); ?>
								<?php echo form_input(['name' => 'pass', 
													'id' => 'pass', 
													'class' => 'form-control',
													'placeholder' => 'Contraseña', 
													'value'=>"$pass"]); ?>
								<?php echo form_error('pass'); ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Perfil ID:', 'perfil_id'); ?>
								<?php echo form_input(['name' => 'perfil_id', 
													'id' => 'perfil_id', 
													'class' => 'form-control',
													'placeholder' => 'Contraseña', 
													'value'=>"$perfil_id"]); ?>
								<?php echo form_error('perfil_id'); ?>
							</div>
						</div>

					</div>

					<div class="row">
	   					<div class="col-md-3">
							<div class="form-group">
								<?php echo form_label('Baja:', 'baja'); ?>
								<?php echo form_input(['name' => 'baja', 
													'id' => 'baja', 
													'class' => 'form-control',
													'placeholder' => 'Baja',
													'value'=>"$baja"]); ?>
								<?php echo form_error('baja'); ?>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3">
							<div class="form-group">
								
								<br>
								<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-warning btn-block'"); ?>
							</div>		
						</div>

					</div>
					
				<?php echo form_close(); ?>
				<div>
		
				</div>
			</div>
			</div>
		          
          </div>

          <!--TERCERA COLUMNA-->
          <div class = "col-xl-1">
              
          </div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
    </div> <!-- CIERRE DEL PRIMER CONTENEDOR -->
    
    <br> <!-- SALTO DE LINEA -->


</section>
</div>

