<div class="content-wrapper">
  <section class="content py-5">
 <?php if (!$productos) { ?>

        <div class="container-fluid">
            <div class="well">
                        <h1>Estamos trabajando Disculpe!.</h1>
            </div>  
        </div>
<?php } else { ?>
<div class="container-fluid">
	<h1 class="text-center font-weight-bold" style="font-family:mifuente;font-size: 70px;">Nuestro Catalogo</h1>
  
	<div class="container px-4 px-lg-5 mt-5">
            
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach($productos->result() as $row){ ?>
                    <div class="col mb-5">
                        
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo base_url($row->imagen); ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo trim($row->nombre_producto); ?></h5>
                    
                                <p>
                                        <?php 
                                            if ($row->stock < $row->stock_min && $row->stock > 0) {
                                                echo 'Por debajo del valor minimo: '.$row->stock_min;
                                            } elseif ($row->stock <= 0) {
                                                echo '<span class="badge badge-danger">Sin stock</span>';
                                            }else {
                                                echo '<b class="text-success">Disponible: '.$row->stock.' unidades</b>';
                                            }
                                        ?>
                                </p>

                                <h4>Precio: $ <?php echo $row->precio_venta; ?></h4>
                                </div>
                            </div>
                            <!-- Product actions-->
                                    <p>
                                    <?php 
                                        if ($row->stock > 0){

                                            // Envia los datos en forma de formulario para agregar al carrito
                                            echo form_open('IniciarSesion');
                                            echo form_hidden('id', $row->id_producto);
                                            echo form_hidden('nombre_producto', $row->nombre_producto);
                                            echo form_hidden('precio_venta', $row->precio_venta);
                                            echo form_hidden('stock', $row->stock);
                                    ?>
                                            <div class="text-center">
                                    <?php
                                            $btn = array(
                                                'class' => 'btn compra font-weight-bold',/*compra es un estilo*/
                                                'value' => 'Comprar',/*Nombre*/
                                                'name' => 'action'
                                                );
                                
                                            echo form_submit($btn);
                                            echo form_close();
                                    ?>
                                            </div>
                                    <?php 
                                            

                                        }else{
                                            
                                        }
                                    ?>  
                                    </p>
                            
                        </div>
                    </div>
                    <?php } ?> 

                    <?php $this->load->view('template/pag_links'); ?>

                    <a href="https://api.whatsapp.com/send?phone=+543794722082" class="btn-wsp" target="_blank">
      <i class="fab fa-whatsapp"></i>
  </a>
 </section>
</div>
    <?php } ?>