<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
            <div class="container-fluid">
                <div class="cart col-xs-sm-md-1h">
                    <div class = "heading">
                        <h2 id="h2" align="center">Productos en tu Carrito</h2>
                    </div>
        
                    <div class="text" align="center"> 

                        <?php  $cart_check = $this->cart->contents();
                        // Si el carrito está vacio, mostrar el siguiente mensaje
                        if (empty($cart_check)) 
                        {
                            echo 'Para agregar productos al carrito, click en "Comprar"';
                        }  
                        ?>    
                    </div>
        
                    <table class="table" border="0" cellpadding="5px" cellspacing="1px">

                        <?php // Todos los items de carrito en "$cart". 
                        if ($cart = $this->cart->contents()):  
                        ?>
                            <tr id= "main_heading" class="bg-success">
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Cancelar Producto</th>
                            </tr>

                        <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
                        echo form_open('Actualizar_carrito');
                            $gran_total = 0;
                            $i = 1;

                            foreach ($cart as $item)://$cart asocio a la variable $item
                                // rowid and subtotal Estos son utilizados internamente por la clase Cart

                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $i++;?> 
                                    </td>
                                    <td>
                                        <?php echo $item['name']; ?>
                                    </td>
                                    <td>
                                        $ <?php echo number_format($item['price'], 2); ?>
                                    </td>
                                    <td>
                                        <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 
                                        'maxlength="3" size="1" style="text-align: right"');?>
                                            
                                    </td>
                                        <?php $gran_total = $gran_total + $item['subtotal']; ?>
                                    <td>
                                        $ <?php echo number_format($item['subtotal'], 2) ?>
                                    </td>
                                    <td> 
                                        <?php // Imagen para quitar un producto del carrito
                                            $path = '<img src= '. base_url('assets/img/Eliminar_del_carrito.png') . ' width="25px" height="20px">';
                                            echo anchor('Eliminar_del_carrito/' . $item['rowid'], $path); 
                                        ?>
                                    </td>

                                </tr>
                            <?php 
                            endforeach; 
                            ?>
                     
                            <tr>
                                <td>
                                    <b>Total: $
                                        <?php //Gran Total
                                        echo number_format($gran_total, 2); 
                                        ?>
                                    </b>
                                </td> 
                                <td colspan="5" align="right">
                                    <!-- Borrar carrito usa mensaje de confirmacion javascript implementado en front/head_view  en la seccion de clientes-->
                                    <a type="button" class ='btn btn-danger btn-md' value="Borrar Carrito" onclick="return borra_carrito()" href="<?php echo base_url('Eliminar_del_carrito/all');?>">Borra Carrito</a>
                                    <!-- Submit boton. Actualiza los datos en el carrito -->
                                    <input type="submit" class ='btn btn-info btn-md' value="Actualizar">
                                    
                                    <!-- " Confirmar orden envia a carrito_controller/muestra_compra  -->
                                    <a type="button" href="<?php echo base_url('Comprar');?>" class ='btn btn-success btn-md'>Confirmar Orden</a>
                                    
                                </td>
                            </tr>
                            <?php echo form_close();
                        endif; ?>
                    </table>
                </div>
            </div>