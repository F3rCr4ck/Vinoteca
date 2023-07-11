     
     <!-- Default box -->
  <?php  
    $session_data = $this->session->userdata('logged_in');
  ?>
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-4">
              
              <div class="col-12">
                <img src="<?php echo base_url($imagen); ?>" class="product-image" alt="Product Image">
              </div>
          
            </div>
            <div class="col-12 col-sm-6">
              <div class="mt-4">
              <h3 class="my-3"><?php echo $nombre_producto;?></h3>
              <p class="h5 text-success text-bold">Disponibles: <?php echo $stock;?></p>
              <p class="text-bold"><?php echo $descripcion;?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <hr>
            

              <div class="bg-success py-2 px-0">
                <h2 class="text-center">
                  $<?php echo $precio_venta;?>
                </h2>
        
              </div>

              <div class="mt-4">

                  <?php 
                    if (($stock > 0) && ($session_data = $this->session->userdata('logged_in'))) {

                      // Envia los datos en forma de formulario para agregar al carrito
                                  echo form_open('Agregar_al_carrito');
                                  echo form_hidden('id', $id_producto);
                                  echo form_hidden('nombre_producto', $nombre_producto);
                                  echo form_hidden('precio_venta', $precio_venta);
                                  echo form_hidden('stock', $stock);
                      ?>

                      <?php
                                  $btn = array(
                                      'class' => 'btn-lg compra font-weight-bold mt-4',
                                      'value' => 'Agregar',
                                      'name' => 'action'
                                    );
                            
                                  echo form_submit($btn);
                                  echo form_close();
                      ?>

                                    
                </div>

              </div>

            </div>
          </div>

          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active text-bold" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripcion</a>
                
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?php echo $descripcion;?> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

            </div>
          </div>

        </div>
        <!-- /.card-body -->
      <!-- /.card -->
    <?php  }?>  
</section>
</div>
