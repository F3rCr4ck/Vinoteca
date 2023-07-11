<div class="content-wrapper">
<section class="content-header">

<div class="container img-thumbnail">
	<?php  
		$session_data = $this->session->userdata('logged_in');
	?>
					<br>
					<br>
					<div class="row">
						<div class="col-md-6">
								
								<img   class="img-thumbnail" src="<?php  echo base_url($imagen); ?>" width="80%" height="80%" >
								
						</div>

	   					<div class="col-md-6">

	   						<div class="row text-center">
								<h1><?php echo $nombre_producto;?></h1>
							</div>
							<br>
							<div class="row">
								<h5><?php echo $descripcion;?></h5>
								
							</div>

							<br>

							<div class="row">
									<h1>$<?php echo $precio_venta;?> </h1>
							</div>
							<br>
							<div class="row">
									<h5>Unidades disponibles: <?php echo $stock;?></h5>
									
						 	</div>
						 	<br>

						 	<div class="row text-center">
						 		<?php if ($session_data) {
						 			echo form_open('Agregar_al_carrito');
		                        			echo form_hidden('id', $id);
		                        			echo form_hidden('nombre_producto', $nombre_producto);
		                        			echo form_hidden('precio_venta', $precio_venta);
		                        			echo form_hidden('stock', $stock);

		                        			$btn = array(
		                            			'class' => 'btn btn-primary',
		                            			'value' => 'Agregar al carrito',
		                            			'name' => 'action'
		                        				);
		                        
		                        			echo form_submit($btn);
		                        			echo form_close();
						 	
						 		}else{?>
						 			<a href="<?php echo base_url ('IniciarSesion');?>">Inicia sesion para agregar productos al carrito.</a>


						 		<?php }?>

						 	   	
						 	  
						 	</div>
						</div>
						
					</div>
					<br>
					<br>
				
				
</div>
		      
  </section>        
  </div>
          