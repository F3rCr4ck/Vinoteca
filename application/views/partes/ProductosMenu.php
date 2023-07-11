
            <?php if (!$productos) { ?>

                <div class="container-fluid">
                    <div class="well">
                        <h1>No hay productos en esta seccion.</h1>
                    </div>  
                </div>
            </section>
            </div>
            <?php } else { ?>

            <div class="container-fluid text-center">
    
                <h2 class="text-center" style="font-family:mifuente;font-size: 60px;">Todos los Productos</h2>

                <hr>
                
                    </div>

                <div class="row text-center justify-content-md-left">
                    <?php foreach($productos->result() as $row){ ?>
                        <div class="col-md-3 col-sm-6 hero-feature ">
                            <div class="thumbnail">

                                <img src="<?php echo base_url($row->imagen); ?>" alt="" class="img-responsive img-thumbnail">

                                <div class="caption">
                                    <h4><?php echo trim($row->nombre_producto); ?></h4>

                                    <p>
                                        <?php 
                                          if ($row->stock < 1) {
                                                echo '<span class="badge badge-danger">Sin stock</span>';
                                            }else {
                                                echo '<b class="text-success">STOCK: '.$row->stock.' unidades</b>';
                                            }
                                        ?>
                                    </p>

                                    <?php echo '<b class="h3">$ '.$row->precio_venta.'</b>'?>

                                    <p>
                                    <?php 
                                        if (($row->stock > 0) && ($session_data = $this->session->userdata('logged_in'))) {

                                            // Envia los datos en forma de formulario para agregar al carrito
                                            //formulario para cargar archivos.
                                            echo form_open('Agregar_al_carrito');
                                            // campos de entrada ocultos.
                                            echo form_hidden('id', $row->id_producto);
                                            echo form_hidden('nombre_producto', $row->nombre_producto);
                                            echo form_hidden('precio_venta', $row->precio_venta);
                                            echo form_hidden('stock', $row->stock);
                                    ?>
                                            <div>
                                    <?php
                                            $btn = array(
                                                'class' => 'btn compra font-weight-bold',
                                                'value' => 'Comprar',
                                                'name' => 'action'
                                                );
                                        
                                
                                            echo form_submit($btn);//Es un boton
                                            echo form_close();
                                    ?>
                                            </div>
                                            <br>
                                    <?php 

                                            echo "<a href='info_producto/$row->id_producto' class='btn btn-outline-primary'><b>Mas Info.</b></a>";
                                          

                                        }else{
                                            echo "<a href='#' class='btn btn-outline-primary'><b>Mas Info.</b></a>";
                                        }
                                    ?>  
                                    </p>
                        
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php } ?>  

                </div>
                <hr>
<?php $this->load->view('template/pag_links'); ?>
            </div>
  <?php } ?>

<a href="https://api.whatsapp.com/send?phone=+543794722082" class="btn-wsp" target="_blank">
      <i class="fab fa-whatsapp mt-2"></i>
  </a>
</section>

</div>

  
 
 
