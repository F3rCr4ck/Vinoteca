
            <?php if (!$result) { ?>

                <div class="container-fluid">
                    <div class="well">
                        <h1 class="text-center">No hay resultados para esta busqueda.</h1>
                    </div>  
                </div>
            </section>
            </div>
            <?php } else { ?>

            <div class="container-fluid text-center">
    
                <h2 class="text-center">Productos Encontrados</h2>

                <hr>

                <div class="row text-center justify-content-md-center">
                    <?php foreach($result->result() as $row){ ?>
                        <div class="col-md-3 col-sm-6 hero-feature ">
                            <div class="thumbnail">

                                <img src="<?php echo base_url($row->imagen); ?>" alt="" class="img-responsive img-thumbnail">

                                <div class="caption">
                                    <h4><?php echo trim($row->nombre_producto); ?></h4>

                                    <p>
                                        <?php 
                                            if ($row->stock < $row->stock_min && $row->stock > 0) {
                                                echo 'Por debajo del valor minimo: '.$row->stock_min;
                                            } elseif ($row->stock < 1) {
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
                                            echo form_open('Agregar_al_carrito');
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
                                
                                            echo form_submit($btn);
                                            echo form_close();
                                    ?>
                                            </div>
                                            <br>
                                    <?php 

                                             echo "<a href='info_producto/$row->id_producto' class='btn btn-outline-primary'><b>Mas Info.</b></a>";

                                         } else{
                                            echo "<a href='#' class='btn btn-outline-primary'><b>Mas Info.</b></a>";
                                        }
                                    ?>
                                    </p>
                        
                                </div>
                            </div>
                        </div>
                    <?php } ?>  

                </div>
                <hr>

            </div>

</section>
</div>

 <?php }  ?>