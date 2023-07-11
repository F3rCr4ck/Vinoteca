﻿<div class="content-wrapper">

<section class="content">

<div class="container-fluid " >	

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
					<h1>Modificar Datos</h1>	
					<h6> <b>Acepta imagenes gif, jpg, jpeg, png.</b></h6>
					<h6> <b>Tamaño maximo de la imagen 2MB.</b></h6>		
				</div>	            

				<?php echo form_open_multipart("verifico_modificar_producto/$id_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
					<div class="row">
	   					<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Nombre:', 'nombre_producto'); ?>
								
								<?php echo form_input(['name' => 'nombre_producto', 
																'id' => 'nombre_producto', 
																'class' => 'form-control',
																'placeholder' => 'Nombre', 
																'autofocus'=>'autofocus',
																'value'=>"$nombre_producto"]); ?>
								<?php echo form_error('nombre_producto'); ?>
							</div>
						</div> 

				  </div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?php echo form_label('Descripcion:', 'descripcion'); ?>			
								<?php echo form_input(['name' => 'descripcion', 
													   'id' => 'descripcion', 
													   'class' => 'form-control',
													   'placeholder' => 'Descripcion',
													   'autofocus'=>'autofocus',
													   'value'=>"$descripcion"]); ?>
								<?php echo form_error('descripcion'); ?>
							</div>
							
						</div>
						
					</div>

						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
									<?php echo form_label('Categoria:', 'id_categoria'); ?>	
									<?php echo form_input(['name' => 'id_categoria', 
													'id' => 'id_categoria', 
													'class' => 'form-control',
													'placeholder' => '1- Vino Tinto - 2-Vino Blanco 3-Vino Rosado', 
													'value'=>"$id_categoria"]); ?>
									<?php echo form_error('id_categoria'); ?>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Imagen actual:', 'img_ac'); ?>
								<img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="<?php echo base_url($imagen); ?>" >
							</div>	
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Imagen:', 'imagen'); ?>
								<?php echo form_input(['type' => 'file',
													'name' => 'filename', 
													'id' => 'filename', 
													'class' => 'form-control']); ?> 
								<?php echo form_error('filename'); ?>
								
							</div>		
						</div>
					</div>


					<div class="row">
	   					<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Precio Costo:', 'precio_costo'); ?>
								<?php echo form_input(['name' => 'precio_costo', 
													'id' => 'precio_costo', 
													'class' => 'form-control',
													'placeholder' => 'Precio Costo', 
													'value'=>"$precio_costo"]); ?>
								<?php echo form_error('precio_costo'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Precio Venta:', 'precio_venta'); ?>
								<?php echo form_input(['name' => 'precio_venta', 
													'id' => 'precio_venta', 
													'class' => 'form-control',
													'placeholder' => 'Precio Venta',
													'value'=>"$precio_venta"]); ?>
								<?php echo form_error('precio_venta'); ?>
							</div>
						</div>
					</div>



					<div class="row">
	   					<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Stock:', 'stock'); ?>
								<?php echo form_input(['name' => 'stock', 
													'id' => 'stock', 
													'class' => 'form-control',
													'placeholder' => 'Stock',
													'value'=>"$stock"]); ?>
								<?php echo form_error('stock'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<?php echo form_label('Stock minimo:', 'stock_min'); ?>
								<?php echo form_input(['name' => 'stock_min', 
													'id' => 'stock_min', 
													'class' => 'form-control',
													'placeholder' => 'Stock Minimo',
													'value'=>"$stock_min"]); ?>
								<?php echo form_error('stock_min'); ?>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
						
						</div>

						<div class="col-md-6">
							<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-warning btn-block'"); ?>
						</div>

					</div>

				<?php echo form_close(); ?>
						<br>
					
				
			</div>
			</div>
		          
          </div>

          <!--TERCERA COLUMNA-->
          <div class = "col-xl-1">
              
          </div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
    </div> <!-- CIERRE DEL PRIMER CONTENEDOR -->
    
    <br> <!-- SALTO DE LINEA -->
</div>

</section>
</div>

