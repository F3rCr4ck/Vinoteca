<div class="content-wrapper">

<section class="content-header">
  

<div class="container-fluid " >
    <!--CONTENEDOR-->
    <div class="container-fluid " >
      <!--PRIMERA FILA-->
        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-2" > 
              
          </div>
        

          <!--SEGUNDA COLUMNA-->
          <div class = "col-xl-8">

            <?php echo validation_errors(); ?>
      <!-- Genero el formulario para cargar un producto -->

      <div class="well bs-component form-horizontal">
        <h1 class="text-center">Agregar Productos</h1>
        <br>
        <?php echo form_open_multipart('verifico_nuevo_producto', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
        <fieldset>
          
          <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'nombre_producto', 
                          'id' => 'nombre_producto', 
                          'class' => 'form-control',
                          'placeholder' => 'Nombre', 
                          'autofocus'=>'autofocus',
                          'value'=>set_value('nombre_producto')]); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-2 control-label">Descripción</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'descripcion', 
                          'id' => 'descripcion', 
                          'class' => 'form-control',
                          'placeholder' => 'Descripcion', 
                          'autofocus'=>'autofocus',
                          'value'=>set_value('descripcion')]); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Categoría</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'id_categoria', 
                                     'id' => 'id_categoria', 
                                     'class' => 'form-control',
                                     'placeholder' => '1-Vino Tinto - 2-Vino Blanco 3-Vino Rosado', 
                                     'value'=>set_value('id_categoria')]); ?>
            </div>
          </div>


         <div class="form-group">
            <label class="col-lg-2 control-label">Imagen</label>
            <div class="col-lg-10">
              <?php echo form_input(['type' => 'file',
                          'name' => 'filename', 
                          'id' => 'filename', 
                          'class' => 'form-control']); ?> 

            </div>
         </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Precio Costo</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'precio_costo', 
                          'id' => 'precio_costo', 
                          'class' => 'form-control',
                          'placeholder' => 'Precio Costo', 
                          'value'=>set_value('precio_costo')]); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-2 control-label">Precio Venta</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'precio_venta', 
                          'id' => 'precio_venta', 
                          'class' => 'form-control',
                          'placeholder' => 'Precio Venta',
                          'value'=>set_value('precio_venta')]); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-2 control-label">Stock</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'stock', 
                          'id' => 'stock', 
                          'class' => 'form-control',
                          'placeholder' => 'Stock',
                          'value'=>set_value('stock')]); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-2 control-label">Stock Minimo</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'stock_min', 
                          'id' => 'stock_min', 
                          'class' => 'form-control',
                          'placeholder' => 'Stock Minimo',
                          'value'=>set_value('stock_min')]); ?>
            </div>
          </div>



          <div class="col-lg-3 col-lg-offset-5">
            <?php echo form_submit('submit', 'Cargar',"class='btn btn-lg btn-primary btn-block'"); ?> <br>
            <?php echo form_close(); ?>
          </div>
        </fieldset>
        
      </div>
            
              
          </div>

          <!--TERCERA COLUMNA-->
          <div class = " col-xl-2">
              
          </div>

        </div> 
         <!--FIN DE LA PRIMERA FILA-->
    </div> <!-- CIERRE DEL PRIMER CONTENEDOR -->
    
    <br> <!-- SALTO DE LINEA -->
</div>
</section>
</div>

